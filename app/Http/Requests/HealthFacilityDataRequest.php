<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HealthFacilityDataRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'id' => ['required', 'uuid'],
            'health_facility_id' => ['required', 'integer', 'exists:health_facilities,code'],
            'latitude' => ['required', 'regex:/^-?\d+(\.\d+)?/'],
            'longitude' => ['required', 'regex:/^-?\d+(\.\d+)?/'],
            'altitude' => ['nullable'],
            'accuracy' => ['nullable'],
            'photo' => ['required', 'image'],
            'village_code' => ['required', 'integer'],
            'report_by' => ['required', 'integer'],
        ];
    }
}
