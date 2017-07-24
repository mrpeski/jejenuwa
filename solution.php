<?php

$_handle = fopen("olx.txt", "r");

$upp = fgets($_handle);

for( $i=0; $i < $upp; $i++ ) {
    $line = fgets($_handle);
    @list($type, $day_s, $prod_c, $state_r) = explode(" ", $line);
    $struct[] = compact('type', 'day_s', 'prod_c', 'state_r');
    if($type == "Q") {
    	$queries[] = compact('day_s', 'prod_c', 'state_r', 'i');
    } elseif ($type == "S") {
    	$sale[] = compact('day_s', 'prod_c', 'state_r', 'i');
    }

}
fclose($_handle);
// var_dump($sale);
$result = query_list($queries[7], $sale);

var_dump($result);

function parse_($arr) {
	foreach ($arr as $index=>$arg) {
		@list($lower, $upper) = array_map('intval', explode('.', $arg));
		$arr[$index] = compact('lower', 'upper');
	}
	return $arr;
}

function query_list($q, $s) {
	foreach ($s as $item) {
		if($q['i'] < $item['i']) 
		{
			return 0;
		} else {	
			// Return partitioned array.
			$query = parse_($q);
			$d_lower = $query['day_s']['lower'];
			$d_upper = $query['day_s']['upper'];
			$prod = $query['prod_c']['lower'];
			$category = $query['prod_c']['upper'];
			$state = $query['state_r']['lower'];
			$province = $query['state_r']['upper'];
			if($d_upper != NULL) 
			{
				for($i=$d_lower; $i <= $d_upper; $i++) 
				{
					foreach($s as $item) 
					{
						if($item['day_s'] == $i) 
						{
							$arr['days'][$i][] = $item;
						}
					}
				}
			} 
			else 
			{
				foreach($s as $item) 
				{
					if($item['day_s'] == $lower) 
					{
						$arr['day'][$lower][] = $item;
					}
				}
			}
			// if(!is_null($category)){
			// 	foreach ($arr as $key => $value) {
			// 		if($value['prod_c']['upper'] = $category) {
			// 			$arr['category'] = $item;
			// 		} elseif($category == -1) {
			// 			$arr['products'];
			// 		}
			// 	}
			// }
			return $arr;
		}
	}

}

