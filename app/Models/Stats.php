<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stats extends Model
{
    protected $table = 'STATS';
    public $timestamps = false;
    protected $fillable = ['date_s', 'view', 'good_uuid'];
}
