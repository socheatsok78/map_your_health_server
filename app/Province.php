<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    protected $table = 'provinces';
    protected $primaryKey = 'code';
    public $incrementing = false;

    public function districts() {
        return $this->hasMany('App\District', 'province_code','code');
    }

    public function communes() {
        return $this->hasManyThrough('App\Commune',
            'App\District',
            'province_code',
            'commune_code',
            'code',
            'code');
    }
}
