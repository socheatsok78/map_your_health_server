<?php

namespace App\Http\Controllers;

use App\HealthFacilityData;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class HFController extends Controller
{
    /**
     * Displays datatables front end view
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('hf');
    }

    /**
     * Process datatables ajax request.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function hfdata()
    {
        $data = HealthFacilityData::with('facility.facility_type')->with('gazetteer')->get();
        logger($data);
        return Datatables::of($data)->make(true);
    }
}
