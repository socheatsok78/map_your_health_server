<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gazetteer extends Model
{
    protected $table = 'gazetteer';
    protected $primaryKey = 'code';
    public $incrementing = false;

    public function village() {
        return $this->hasOne('App\Village','code','code');
    }

}
