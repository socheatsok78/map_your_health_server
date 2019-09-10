<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Village extends Model
{
    protected $table = 'villages';
    protected $primaryKey = 'code';
    public $incrementing = false;

    public function commune() {
        return $this->belongsTo('App\Commune', 'commune_code','code');
    }

    public function gazetteer() {
        return $this->hasOne('App\Gazetteer','code','code');
    }
}
