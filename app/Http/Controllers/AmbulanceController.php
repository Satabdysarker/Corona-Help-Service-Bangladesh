<?php

namespace App\Http\Controllers;

use App\Ambulance;
use Illuminate\Http\Request;

class AmbulanceController extends Controller
{
    const  LAZY_CONFIG  = [
        "url_path" => "ambulance", //path prefix
    ];

    public function __construct()
    {
        $this->middleware("auth");
    }

    // public function get($ambulance_id)
    // {
    //     // static $route_name = "home";
    //     return "hello";
    // }

    public function postAddAmbulance(Request $r)
    {
        $ambulance = new Ambulance();
        $ambulance->create($r->all('name', 'city', 'divition', 'hospital_name', 'phone', 'address'));

        return redirect('/home')->with(['message' => 'Ambulance Information Successfully Added', 'class' => 'success']);
    }

    public function getAmbu($ambu_id)
    {
        session(['ambu_id' => $ambu_id]);
        $data['ambulance'] = Ambulance::find($ambu_id);
        return response()->json($data);
    }

    public function postEdit(Request $r)
    {
        Ambulance::where('id', session('ambu_id'))->update($r->all('name', 'city', 'divition', 'hospital_name', 'phone', 'address'));
        return redirect('/home')->with(['message' => 'Ambulance Successfully Edited', 'class' => 'success']);
    }

    public function postDelete($id)
    {
        Ambulance::find($id)->delete();
        return redirect()->route('home')->with(['message' => "Hospital Delected.", 'class' => 'success']);
    }
}
