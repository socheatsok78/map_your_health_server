<?php

namespace App;

use App\HealthFacility;
use Illuminate\Database\Eloquent\Model;

class HealthFacilityType extends Model
{

    protected $table = 'health_fac_type';
    protected $primaryKey = 'HFT_Code';
    public $incrementing = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'HFT_Code',
        'HFT_Desc',
        'HFT_Desckh',
    ];
}
