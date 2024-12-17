<?php

namespace App\Http\Controllers;

use App\Models\Goods;
use App\Models\Stats;
use App\Models\User;
use Illuminate\Http\Request;

class CAPI extends Controller
{
    public function add_user(Request $request){
        $uuid4 = $request->input('uuid4');
        $name = $request->input('last_name');
        $prenom = $request->input('first_name');
        $email = $request->input('email');
        $tel = $request->input('phone');
        $password = $request->input('password');
        $type = $request->input('type');

        User::create([
            'name' => $name,
            'prenom' => $prenom,
            'email' => $email,
            'password' => bcrypt($password),
            'tel' => $tel,
            'uuid' => $uuid4,
            'type' => $type,
        ]);

        if($type == 3){
            $user = User::where('uuid', $uuid4)->first();
            $token = $user->createToken('GrimmoWeb')->plainTextToken;
            return response()->json(['bearer' => $token], 200);
        }
        return response()->json(["data"=>$request->all()], 200);
    }
    public function add_good(Request $request){
        /*$g = new Goods();*/

        $data = ['id_bien' => $request->input('uuid'),
            'rue_bien' => $request->input('address'),
            'ville_bien' => $request->input('city'),
            'cpostal_bien' => $request->input('cp'),
            'type_bien' => $request->input('type_good'),
            'surface_bien' => $request->input('surface'),
            'nbr_piece_bien' => $request->input('nbr_room'),
            'prix' =>  $request->input('price'),
            'louable_achetable' => $request->input('commendable_purshasable'),
            'uid_user' => $request->input('uid_client'),
            'image' => $request->input('img'),
            'titre' => $request->input('titre')];

        Goods::create($data);
        return response()->json(["data"=>$request->all()], 200);
    }

    public function delete_good(Request $request){
        Goods::where('id_bien', $request->input('uuid'))->delete();

        return response()->json(["data"=>$request->all()], 200);
    }

    public function delete_user(Request $request){
        User::where('uuid', $request->input('uuid'))
            ->delete();

        return response()->json(["data"=>$request->input('uuid')], 200);
    }

    public function edit(Request $request){
        if($request->input('type') == 0){
            Goods::where('id_bien', $request->input('uuid'))->update([$request->input('column_name') => $request->input('value')]);
        }else{
            User::where('uuid', $request->input('uuid'))->update([$request->input('column_name') => $request->input('value')]);
        }

        return response()->json(["data"=>$request->all()], 200);

    }

    public function get_good_stats(Request $request){
        $goods = Goods::where('id_bien', $request->input('uuid'))->first();

        if(!isset($goods)){
            return response()->json(["data"=>[]], 200);
        }

        $stats = $goods->get_stats;
        return response()->json(["data"=>$stats], 200);
    }

}
