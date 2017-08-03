<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use nuwa\MarineTraffic\MarineTrafficAPI;
use Illuminate\Http\Request;

class Location extends Model
{

    protected $fillable = [
        'ship_id', 
        'lat', 
        'lon', 
        'speed', 
        'heading', 
        'course', 
        'status', 
        'marine_time', 
        'dscr'
    ];

    protected $traffic;

    // public function __construct(MarineTrafficAPI $traffic)
    // {
    //         $this->traffic = $traffic;
    //         parent::__construct();
    // }

    public function createNew($mmsi)
    {
        // try {
            $traffic = resolve('nuwa\MarineTraffic\MarineTrafficAPI');
            $response = $traffic->vessel($mmsi);
            $simple_response = $response->getBody()->getContents();
            // return $simple_response;
            $simple = $traffic->parseSimple($simple_response);
            $simple['ship_id'] = $simple['mmsi'];
            $simple['marine_time'] = $simple['timestamp'];
            unset($simple['mmsi']);
            unset($simple['timestamp']);
            // var_dump($simple);
            $this->create($simple);
            return $simple;

        // } catch (\Exception $e) {
        //     return redirect("/admin")->with('message', 'You appear to be offline!');
        // }
    }


    public function getLoc($mmsi) {
        $ship = $this->whereShipId($mmsi);
        return $ship;
    }
    
}
