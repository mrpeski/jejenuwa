<?php
namespace nuwa\Guana;

use GuzzleHttp\Client;
use nuwa\Guana\CarrierInterface as Carrier;
use Illuminate\Support\Facades\Cache;
use Symfony\Component\DomCrawler\Crawler;


class Guana
{
	
	protected $headers = array(
        				'User-Agent' => 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/59.0.3071.115 Safari/537.36',
    		);

    protected $raw;
    protected $filtered;
    protected $crawler;
    protected $_extract;
    protected $stuff;

    public function ekho(Carrier $carrier) {
        $client = app("GuzzleHttp\Client");
        if(!Cache::get($carrier->Key())){
            $response = $client->request("GET", $carrier->endpoint(), array('headers' => $this->headers, 'query' => $carrier->queryStrings()));
            $res = $response->getBody()->getContents();
            Cache::put($carrier->Key(),$res, 60);
        }
        $this->raw = Cache::get($carrier->Key());
        $this->crawler = new Crawler($this->raw);
        return $this;
    }
    

    public function raw() {
        return $this->raw;
    }
    

    public function spit($filter) {
		$filthy = $this->crawler->filter($filter);
        $stuff = $filthy->each(function (Crawler $node, $i) {
            return trim($node->text());
        });
        $this->stuff = $stuff;
		return $this;
    }

    public function get($data, $filter=NULL) {
        $crawler = $this->crawler;
        if($filter) {
            $crawler = $this->crawler->filter($filter);
        }
        $this->_extract = $crawler->extract($data);
        return $this;
    }


    public function trim() {
        $pattern = "/[^\s]/";
        return $this->_extract;
        $trimmed = explode("\n", trim($this->_extract[0]));
        $clean = preg_grep($pattern, $trimmed);
        return dd(array_values($clean));
    }
    
    public function loadOn(){

        $filtered = collect($this->stuff)->filter(function($value){
            return str_contains($value, 'Load');
        });
        return (array_values($filtered->all()));

    }


    public function check() {
        return str_contains('Load');
    }
    

    public function dates() {
        $pattern = "/\d{2}\s(Jan|Feb|Mar|Apr|May|Jun|Jul|Aug|Sept|Oct|Nov|Dec)\s[0-9]{6}\:[0-9]{2}/";
        $trimmed = explode("\n", trim($this->_extract[0]));
        $clean = preg_grep($pattern, $trimmed);
        return array_values($clean);
    }
    
    
}