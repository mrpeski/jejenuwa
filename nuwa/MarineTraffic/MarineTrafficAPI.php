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
        "timespan" => '', 
        "country" => '', 
        "dwt_min" => "", 
        "dwy_max" => "", 
        "shiptype" => "", 
        "protocol" => "json"
    ];

    protected $ops = ["protocol" => "json","mmsi" => ''];
    protected $key = "";

    public function __construct(Client $client)
    {
         $this->client = $client;
         $this->key = $this->key('EAKEY');
    }

    public function arrivals()
    {
        $endpoint = "http://services.marinetraffic.com/api/expectedarrivals/v:3/{$this->key}/";
        $this->options['country'] = 'NG';
        $expected = transform($this->options);
        $expected = $endpoint.$expected;
        $response = $this->client->request('GET', $expected);
        return $response;
    }

    public function vessel($vessel)
    {
        $this->options['imo'] = $vessel; 
        $dir = transform($this->options);
        $this->key = $this->key('SVPKEY');
        $endpoint = "http://services.marinetraffic.com/api/exportvessel/v:5/{$dir}{$this->key}";
        $response = $this->client->request('GET', $endpoint);
        return $response;
    }

    public function balance()
    {
         $check_credit = "http://services.marinetraffic.com/api/exportcredits/{$this->key}";
    }

    private function key($key)
    {
        return env($key);
    }

    private function shiptype($type) {
        return $this->shiptype[$type];
    }

    public function vesselHist($vessel)
    {
        $this->options['imo'] = $vessel; 
        $dir = transform($this->options);
        $this->key = $this->key('SVPKEY');
        $endpoint = "http://services.marinetraffic.com/api/exportvesseltrack/{$dir}{$this->key}";
        $response = $this->client->get($endpoint);
        return $response;
    }

}