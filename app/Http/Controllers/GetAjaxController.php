<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{
    District,
    Upazila,
};


class GetAjaxController extends Controller
{
    public function __construct(){
        $this->middleware(['auth','verified']);
    }
    //Getting District by ajax for checkout billing
    public function getDistrict($division_id)
    {
        // return response('paisi');
        $district = District::where('division_id',$division_id)->get();
        return response()->json($district);
    }
    //Getting Upazila by ajax for checkout billing
    public function getUpazila($district_id)
    {
        $upazila = Upazila::where('district_id',$district_id)->get();
        return response()->json($upazila);
    }
}
