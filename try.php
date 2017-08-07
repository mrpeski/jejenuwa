<?php
$curl = curl_init("http://services.marinetraffic.com/api/exportvessel/v:5/{token}/timespan:20/mmsi:310627000");

curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

curl_setopt($curl, CURLOPT_HTTPHEADER, array('User-Agent: php-c', 'Content-type: application/json'));

$response = curl_exec($curl);
$info = curl_getinfo($curl);

print_r($info);

echo "-----------------";

echo $response;

curl_close($curl);
