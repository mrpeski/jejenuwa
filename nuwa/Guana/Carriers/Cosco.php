<?php
namespace nuwa\Guana\Carriers;

use nuwa\Guana\Carrier;

class Cosco extends Carrier
{
	protected $endpoint = "http://elines.coscoshipping.com/NewEBWeb/public/cargoTracking/cargoTracking.xhtml";
	
	protected $query_strings = array("CARGO_TRACKING_NUMBER_TYPE"=> "BILLOFLADING",
		"CARGO_TRACKING_NUMBER"=> "");
	
	protected $identifier = "CARGO_TRACKING_NUMBER";
}