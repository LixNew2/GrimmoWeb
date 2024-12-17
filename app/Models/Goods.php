<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Goods extends Model
{
    protected $table = 'BIENS';
    public $timestamps = false;
    protected $fillable = ['id_bien', 'rue_bien', 'ville_bien', 'cpostal_bien', 'type_bien', 'surface_bien', 'nbr_piece_bien', 'prix', 'louable_achetable', 'uid_user', 'image', 'titre'];

    public function get_stats(){
        return $this->hasMany(Stats::class, 'good_uuid', 'id_bien');
    }
}
