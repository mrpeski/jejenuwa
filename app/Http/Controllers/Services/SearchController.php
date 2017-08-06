<?php

namespace App\Http\Controllers\Services;

use nuwa\Guana\Guana;
use nuwa\Guana\Container;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SearchController extends Controller
{
	protected $number;

    public function search(Guana $guana, Request $request)
    {
    	$this->number = $request->input('goods_id');
        $carrier 	= 	$this->setQueryString();
		$domsrc 	= 	$guana->ekho($carrier)->spit(".transport-plan-details table")->loadOn();
		$mapped = collect($domsrc)->map(function($value){
			return preg_replace("/\s+/", ' ', $value);
		});
		$domsrc = $mapped->all();
		return view('public.result', compact('domsrc'));
	}


	public function setQueryString() {
		$con = new Container($this->number);
		$carrier = $con->carrier();
        $carrier->setIdentifier($this->number);
        return $carrier;
	}
	
}
