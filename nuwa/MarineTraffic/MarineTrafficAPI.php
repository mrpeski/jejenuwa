<?php

namespace nuwa\MarineTraffic;

use GuzzleHttp\Client;


class MarineTrafficAPI {
    
    protected $shiptype = [
    "fishing" => 2,
    "highSpeedCraft" => 4,
    "passenger" => 6,
    "cargo" => 7,
    "tanker" => 8,
    ];

    protected $options = [
        "timespan" => '20', 
        "portid" => '', 
        "mmsi" => '',
        "msgtype" => '',
        "dwt_min" => "", 
        "dwy_max" => "", 
        "shiptype" => "", 
        "protocol" => "json",
        "fromcountry" => '',
    ];

    protected $nav_stat = [
        "0" => "under way using engine",
        "1" =>  "at anchor",
        "2" => "not under command", 
        "3" => "restricted maneuverability",
        "4" => "constrained by her draught",
        "5" => "moored",
        "6" => "aground", 
        "7" => "engaged in fishing",
        "8" => "under way sailing",
        "9" => "reserved for future amendment of navigational status for ships carrying DG, HS, or MP, or IMO hazard or pollutant category C, high-speed craft (HSC)",
        "10" => "reserved for future amendment of navigational status for ships carrying dangerous goods (DG), harmful substances (HS) or marine pollutants (MP), or IMO hazard or pollutant category A, wing in ground (WIG)",
        "11" => "power-driven vessel towing astern (regional use)",
        "12" => "power-driven vessel pushing ahead or towing alongside (regional use)",
        "13" => "reserved for future use",
        "14" => "AIS-SART (active), MOB-AIS, EPIRB-AIS",
        "15" => "undefined",
        "95" => "Base Station",
        "96" => "Class B",
        "97" => "SAR Aircraft",
        "98" => "Aid to Navigation",
        "99" => "Class B"
    ];
    protected $ops = ["protocol" => "json","mmsi" => ''];
    protected $key = "";

    public function __construct(Client $client)
    {
         $this->client = $client;
         $this->key = $this->getKey('EAKEY');
    }

    public function getShip($val) {
        return $this->shiptype[$val];
    }
    
    public function vessel($vessel, $extended = false)
    {
        $this->options['mmsi'] = $vessel; 
        if($extended) {
            $this->options['msgtype'] = "extended";
        }
        $dir = transform($this->options);
        $this->key = $this->getKey('SVPKEY');
        $endpoint = "http://services.marinetraffic.com/api/exportvessel/v:5/{$this->key}/{$dir}";
        $response = $this->client->request('GET', $endpoint);
        return $response;
    }


    public function parseSimple($response) 
    {
        $response = json_decode($response);
        if(count($response)){
            $res = $response[0];
            list($mmsi, $lat, $lon, $speed, $heading, $course, $status, $timestamp, $dscr) = $res;
            return compact('mmsi', 'lat', 'lon', 'speed', 'heading', 'course', 'status', 'timestamp', 'dscr');
        }
        return "Empty Response";
    }
    

    public function navStatus($arr) {
        $code = $arr['status'];
        return $this->nav_stat[$code];
    }
    

    private function getKey($key)
    {
        return env($key);
    }

    private function shiptype($type) {
        return $this->shiptype[$type];
    }


}