<?php

namespace App\Http\Controllers;

use App\Ambulance;
use App\Hospital;

class DashboardController extends Controller
{

    const  LAZY_CONFIG  = [
        "url_path" => ""
    ];

    public function get()
    {
        static $route_name = "home";
        return $this->getHome();
    }

    public function getHome()
    {
        static $route_name = "home";
        $data['hospitals'] = Hospital::all(); 
        $data['ambulances'] = Ambulance::all(); 
        return view('dashboard')->with($data);
    }
}
