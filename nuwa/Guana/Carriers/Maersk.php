<?php
namespace nuwa\Guana\Carriers;

use nuwa\Guana\Carrier;

class Maersk extends Carrier
{
	protected $endpoint = "https://my.maerskline.com/tracking/search";

	protected $query_strings = array("searchNumber" => "");

	protected $identifier = "searchNumber";

}