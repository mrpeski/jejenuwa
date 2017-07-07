<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use nuwa\MarineTraffic\MarineTrafficAPI;

class MainController extends Controller
{		
    public function arrivals() {
    	return view('admin.ship.arrivals');
    }

    public function get_arrivals(MarineTrafficAPI $api, $imo) {
    	$result = $api->arrivals($imo);
    	return view('admin.ship.arrival')->with($result);
    }

    public function track() {
    	return view('admin.ship.location');
    }

    public function get_location(MarineTrafficAPI $api, $imo) {
    	// $result = $api->
    }
}
