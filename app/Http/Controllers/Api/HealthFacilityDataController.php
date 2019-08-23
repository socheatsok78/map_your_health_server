<?php

namespace App\Http\Controllers\Api;

use App\HealthFacilityData;
use App\Http\Requests\HealthFacilityDataRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HealthFacilityDataController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('store');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(HealthFacilityData $facilityData)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(HealthFacilityDataRequest $request)
    {
        $inputs = $request->validated();

        $data = HealthFacilityData::create($inputs);

        return $data;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\HealthFacilityData  $healthFacilityData
     * @return \Illuminate\Http\Response
     */
    public function show(HealthFacilityData $healthFacilityData)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\HealthFacilityData  $healthFacilityData
     * @return \Illuminate\Http\Response
     */
    public function update(HealthFacilityDataRequest $request, HealthFacilityData $healthFacilityData)
    {
        $inputs = $request->validated();

        $data = $healthFacilityData::update($inputs);

        return $data;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\HealthFacilityData  $healthFacilityData
     * @return \Illuminate\Http\Response
     */
    public function destroy(HealthFacilityData $healthFacilityData)
    {
        //
    }
}
