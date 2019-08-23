<?php

namespace App;

use App\HealthFacilityType;
use App\OperationalDistrict;
use Illuminate\Database\Eloquent\Model;

class HealthFacility extends Model
{
    const CREATED_AT = 'created_date';
    const UPDATED_AT = 'modified_date';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        "code",
        "ref_code",
        "label",
        "label_old",
        "name_en",
        "name_kh",
        "name_en2",
        "name_kh2",
        "od_code",
        "type",
        "level",
        "status",
        "village_code",
        "latitude",
        "longitude",
        "altitude",
        "start_date",
        "end_date",
        "created_date",
        "created_by",
        "modified_date",
        "modified_by",
    ];

    /**
     * Get the facility's type
     *
     * @return void
     */
    public function facility_type()
    {
        return $this->hasOne(HealthFacilityType::class, 'HFT_Code', 'type');
    }

    /**
     * Get the facility's operational district
     *
     * @return void
     */
    public function operational_district()
    {
        return $this->hasOne(OperationalDistrict::class, 'code', 'od_code');
    }
}
