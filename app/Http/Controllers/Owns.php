<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use App\Models\Goods;
use App\Models\Stats;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;

class Owns extends Controller
{
    public function show_my_owns(){
        $goods = $this->get_my_goods();
        return view('myowns.myowns', compact('goods',));
    }

    public function get_my_goods(){
        if (session()->has('user_uuid')){
            $user = User::where('uuid', session('user_uuid'))->first();
            $goods = $user->my_goods;

            return $goods;
        }

        return [];
    }

    public function get_goods_search(Request $request){
        $stop_words = ['dans', 'à', 'le', 'la', 'les', 'de', 'du', 'des', 'en', 'pour', 'avec', 'une', 'un', 'sur'];

        $search_value = $request->input('search_value');
        $words = preg_split('/\s+/', $search_value);

        $filtered_words = array_filter($words, function($word) use ($stop_words) {
            return !in_array(strtolower($word), $stop_words);
        });

        $query = Goods::query();
        foreach($filtered_words as $word){
            $query->where("titre", "like", "%".$word."%");
        }
        $goods = $query->get();
        return redirect('/')->with('goods', $goods);
    }

    public function show_favorite(){
        $goods = $this->get_favorites_goods();
        return view('favorite.favorite', compact('goods'));
    }

    public function get_favorites_goods(){
        if (session()->has('user_uuid')){
            $user = User::where('uuid', session('user_uuid'))->first();
            $fav = $user->my_favorites;
            $goods = [];

            foreach($fav as $item){
                $goods[] = Goods::where('id_bien', $item->good_uuid)->first();
            }

            return $goods;
        }

        return [];
    }

    public function get_good($id){
        $good = Goods::where('id_bien', $id)->first();
        return $good;
    }

    public function check_favorite($id){
        if (session()->has('user_uuid')){
            $user = User::where('uuid', session('user_uuid'))->first();
            $fav = $user->my_favorites;

            foreach($fav as $item){
                if($item->good_uuid == $id){
                    return true;
                }
            }
        }

        return false;
    }

    public function show_good_spec($id){
        $good = $this->get_good($id);

        $stats = $good->get_stats;

        $currentDate = Carbon::now();

        $filteredStats = $stats->filter(function ($stat) use ($currentDate) {
            return Carbon::parse($stat->date_s)->month == $currentDate->month
                && Carbon::parse($stat->date_s)->year == $currentDate->year;
        })->first();

        if(!isset($filteredStats)){
            $data = ['date_s' => Carbon::now()->toDateString(), 'view' => 1, 'good_uuid' => $id];
            Stats::create($data);
        }else{
            Stats::where('good_uuid', $id)->whereMonth('date_s', '=', Carbon::now()->month)
                ->whereYear('date_s', '=', Carbon::now()->year)->update(['view' => $filteredStats->view + 1]);
        }

        $isFavorite = $this->check_favorite($id);

        $currentYear = $currentDate->year;

        $statsForYear = $stats->filter(function ($stat) use ($currentYear) {
            return Carbon::parse($stat->date_s)->year == $currentYear;
        });

        $viewsPerMonth = [];
        $month_average_view = 0;

        for ($month = 1; $month <= 12; $month++) {
            $view = $statsForYear->filter(function ($stat) use ($month) {
                return Carbon::parse($stat->date_s)->month == $month;
            })->sum('view');
            $viewsPerMonth[$month] = $view;
            $month_average_view += $view;
        }

        $month_average_view /= 12;
        $month_average_view = round($month_average_view, 2);

        return view('owns_spec.owns_spec', compact('good', 'isFavorite', 'viewsPerMonth', 'currentYear' , 'month_average_view'));
    }

    public function add_favorite_good(Request $request){
        if (session()->has('user_uuid')){
            $data = [
                'user_uuid' => session('user_uuid'),
                'good_uuid' => $request->input('value')
            ];

            Favorite::create($data);
        }

        if(str_contains(url()->previous(), 'my_own')){
            return redirect('/my_own/'. $request->input('value'));
        }else{
            return redirect('/own/'. $request->input('value'));
        }

    }

    public function remove_favorite_good(Request $request){
        if (session()->has('user_uuid')){
            Favorite::where('user_uuid', session('user_uuid'))
                ->where('good_uuid', $request->input('value'))
                ->delete();
        }
        if(str_contains(url()->previous(), 'my_own')){
            return redirect('/my_own/'. $request->input('value'));
        }else{
            return redirect('/own/'. $request->input('value'));
        }
    }

}
