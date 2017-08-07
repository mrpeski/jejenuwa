<?php
namespace nuwa\Guana;

use Illuminate\Support\Str;

/**
* 
*/
class Container
{
	protected $number;

	protected $carrier;
	protected $carrierCode;

	protected $lookup = array(
			"mswu"		=> 	"Maersk",
			"cclu"		=> 	"Cosco",
			"uplo"		=>	"UPL",
		);

	public function __construct($number)
	{
		$this->number = $number;
		$this->carrierCode();
		return $this;
	}

	public function carrierCode() {
		$this->carrierCode = Str::substr($this->number, 0, 4);
		return $this;
	}

		
	public function carrier() {
		$code = $this->carrierCode;
		if (isset($this->lookup[$code])){
			$carrier = $this->lookup[$code];
			$carrier = app($carrier);
			return $carrier;
		} else {
			throw new \Exception("Carrier not supportted!", 1);
		}
	}

	public function endpoint() {
		return $this->carrier()->endpoint();
	}

}
