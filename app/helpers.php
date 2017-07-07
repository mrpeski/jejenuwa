<?php

function get($url, $callback) {
	return Route::get($url, $callback);
}

function post($url, $callback) {
	return Route::post($url, $callback);
}

function patch($url, $callback) {
	return Route::patch($url, $callback);
}

function delete($url, $callback) {
	return Route::delete($url, $callback);
}

function transform($arr) {
    $str='';
    foreach(array_keys($arr) as $needle){
        if(isset($arr[$needle]) && $arr[$needle] != '')
        {
            $str .= $needle.':'.$arr[$needle].'/';
        }
    };
    return $str;
}

function checkSum($numbers){
    $arr = str_split($numbers);
    if (count($arr) !== 16) { echo 'Expects a 16 digits number'; return; }
    $checkDigit = array_pop($arr);
    $base = array_slice($arr, 0, 15);
    $base_length  = count($base) - 1;

    foreach ( xrange(0, $base_length, 2) as $index) {
        $doubled = $base[$index]*2;
        $val = ($doubled % 10 < 0) ? $doubled : array_sum(str_split($doubled));
        $base[$index] = $val;
    }
    $base = array_map('intval', $base);
    $sum = array_sum($base);

    $total = $sum + $checkDigit;

    if($total % 10 == 0) {
        return "true";
    } else {
        return "false";
    }

}

function xrange($start, $limit, $step = 1) {
    if ($start < $limit) {
        if ($step <= 0) {
            throw new LogicException('Step must be +ve');
        }

        for ($i = $start; $i <= $limit; $i += $step) {
            yield $i;
        }
    } else {
        if ($step >= 0) {
            throw new LogicException('Step must be -ve');
        }

        for ($i = $start; $i >= $limit; $i += $step) {
            yield $i;
        }
    }
}

