<?php

namespace App;

use App\HealthFacility;
use App\Traits\UsePhotoStorage;
use Illuminate\Database\Eloquent\Model;

class HealthFacilityData extends Model
{
    use UsePhotoStorage;

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * The "type" of the primary key ID.
     *
     * @var string
     */
    protected $keyType = 'string';

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
        'id',
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

    /**
     * Retrieve the model for a bound value.
     *
     * @param  mixed  $value
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function resolveRouteBinding($value)
    {
        logger('resolveRouteBinding');
        return $this->where('id', '=', $value)->first() ?? abort(404);
    }

    public function gazetteer() {
        return $this->hasOne('App\Gazetteer','code','village_code');
    }
}
