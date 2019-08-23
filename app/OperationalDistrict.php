<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OperationalDistrict extends Model
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
        "name_en",
        "name_kh",
        "province_code",
        "status",
        "start_date",
        "end_date",
        "created_date",
        "created_by",
        "modified_date",
        "modified_by",
    ];
}
