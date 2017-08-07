<?php
namespace nuwa\Guana\Carriers;

use nuwa\Guana\Carrier;

class UPL extends Carrier
{
	protected $endpoint = "http://upl.example.com";
	
	protected $query_strings = array("UPL_NUMBER"=> "");
	
	protected $identifier = "UPL_NUMBER";
}