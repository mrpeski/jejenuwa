<?php
namespace nuwa\Guana;

use nuwa\Guana\CarrierInterface;

abstract class Carrier implements CarrierInterface
{
	protected $endpoint;

	protected $name;
	protected $cacheKey;

	protected $query_strings;

	// public function __construct($name)
	// {
	// 	return $this->name = $name;
	// }


	public function endpoint() {
		return $this->endpoint;
	}

	public function setIdentifier($value)
	{
		$key = $this->identifier;
		$this->query_strings[$key] = $value;
		$this->setCacheKey($value);
	}

	public function setCacheKey($value){
		$this->cacheKey = $value;
	}

	public function key(){
		return $this->cacheKey;
	}
	
	public function queryStrings()
	{
		return $this->query_strings;
	}
	
}