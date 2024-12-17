<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    protected $table = 'FAVORITE';
    public $timestamps = false;
    protected $fillable = ['user_uuid', 'good_uuid'];
}
