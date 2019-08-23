<?php

namespace App;

use App\HealthFacility;
use Illuminate\Database\Eloquent\Model;

class HealthFacilityType extends Model
{
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
