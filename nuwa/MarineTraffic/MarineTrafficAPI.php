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
        "dwt_min" => "", 
        "dwy_max" => "", 
        "shiptype" => "", 
        "protocol" => "json",
        "fromcountry" => '',
    ];

    protected $ops = ["protocol" => "json","mmsi" => ''];
    protected $key = "";

    public function __construct(Client $client)
    {
         $this->client = $client;
         $this->key = $this->getKey('EAKEY');
    }

    public function arrivals()
    {

        $endpoint = "http://services.marinetraffic.com/api/expectedarrivals/v:3/{$this->key}/";
        $options = $this->options;
        $options['portid'] = 'NGLOS';
        $options['shiptype'] = $this->getShip('cargo');
        $expected = transform($options);
        $expected = $endpoint.$expected;
        // dd($expected);
        $response = $this->client->request('GET', $expected);


        return $response;
    }


    public function getShip($val) {
        return $this->shiptype[$val];
    }
    
    public function vessel($vessel)
    {
        $this->options['mmsi'] = $vessel; 
        $dir = transform($this->options);
        $this->key = $this->getKey('SVPKEY');
        $endpoint = "http://services.marinetraffic.com/api/exportvessel/v:5/{$this->key}/{$dir}";
        $response = $this->client->request('GET', $endpoint);
        return $response;
    }

    public function balance()
    {
         $endpoint = "http://services.marinetraffic.com/api/exportcredits/{$this->key}";
         return $this->client->request('GET', $endpoint);
    }

    private function getKey($key)
    {
        return env($key);
    }

    private function shiptype($type) {
        return $this->shiptype[$type];
    }


}