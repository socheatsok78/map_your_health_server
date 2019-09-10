<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Commune extends Model
{
    protected $table = 'communes';
    protected $primaryKey = 'code';
    public $incrementing = false;

    public function villages() {
        return $this->hasMany('App\Village','commune_code','code');
    }

    public function district() {
        return $this->belongsTo('App\District', 'district_code','code');
    }
}
