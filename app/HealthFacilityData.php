<?php

namespace App;

use App\HealthFacility;
use Illuminate\Database\Eloquent\Model;

class HealthFacilityData extends Model
{
    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'health_facility_id',
        'longitude',
        'latitude',
        'altitude',
        'accuracy',
        'photo',
        'village_code',
        'report_by',
    ];

    public function facility()
    {
        return $this->belongsTo(HealthFacility::class, 'health_facility_id', 'code');
    }
}
