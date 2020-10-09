<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hospital;
use Illuminate\Support\Facades\Session;

class HospitalController extends Controller
{

    const  LAZY_CONFIG  = [
        "url_path" => "hospital", //path prefix
    ];

    public function __construct()
    {
        $this->middleware("auth");
    }

    public function postAddHospital(Request $r)
    {
        $hospital = new Hospital();
        $hospital->create($r->all('name', 'city', 'divition', 'phone', 'address', 'today_test_count', 'total_test_count', 'available_seat'));

        return redirect('/home')->with(['message' => 'Hospital Successfully Added', 'class' => 'success']);
    }

    public function getHos($hospital_id)
    {
        session(['hospital_id' => $hospital_id]);
        $data['hospital'] = Hospital::find($hospital_id);
        return response()->json($data);
    }

    public function postEditHospital(Request $r)
    {
        Hospital::where('id', session('hospital_id'))->update($r->all('name', 'city', 'divition', 'phone', 'address', 'today_test_count', 'total_test_count', 'available_seat'));

        return redirect('/home')->with(['message' => 'Hospital Successfully Edited', 'class' => 'success']);
    }

    public function postDelete($id)
    {
        Hospital::find($id)->delete();
        return redirect()->route('home')->with(['message'=>"Hospital Delected.",'class'=>'success']);
    }
}
