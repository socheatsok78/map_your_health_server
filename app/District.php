<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{

    protected $table = 'districts';
    protected $primaryKey = 'code';
    public $incrementing = false;

    public function communes() {
        return $this->hasMany('App\Commune','district_code','code');
    }

    public function province() {
        return $this->belongsTo('App\Province', 'province_code', 'code');
    }
}
