<?php

$_handle = fopen("olx.txt", "r");
/* Enter your code here. Read input from STDIN. Print output to STDOUT */

$upp = fgets($_handle);

// Partition Sales and Queries
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

// split values to upper and lower bounds
function parse_($arr) {
	foreach ($arr as $index=>$arg) {
		@list($lower, $upper) = array_map('intval', explode('.', $arg));
		$query[$index] = compact('lower', 'upper');
	}
            $d_lower = $query['day_s']['lower'];
			$d_upper = $query['day_s']['upper'];
			$prod = $query['prod_c']['lower'];
			$category = $query['prod_c']['upper'];
			$state = $query['state_r']['lower'];
			$province = $query['state_r']['upper'];
    return compact('d_lower', 'd_upper', 'prod', 'category', 'state', 'province');
}

function sales_by_day($q, $s) {
            extract(parse_($q));
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
					// var_dump($item);
					// return;
					if($item['day_s'] == $d_lower) 
					{
						$arr['days'][$d_lower][] = $item;
					}
				}
			}
			return $arr;
}

function refine_cat($q, $all) {
    extract(parse_($q));
	// var_dump(parse_($q));
	// return;
    if($prod == -1) {
        return $all;
    } 
	if($d_upper && $category != NULL) {
		$arr = [];
			foreach($all['days'] as $item => $val) {
				// $val = parse_($val);
				if($category == $val['category'] && $prod == $val['prod']) {

					$arr[] = $val;
				}
			}
			return $arr;
		} else if($d_upper && NULL == $category) {
				$arr = [];
				foreach($all['days'] as $item => $val) {
					// var_dump($val);
					foreach ($val as $needle) {
						$boom = parse_($needle);
						// var_dump($boom);
						if($prod == $boom['prod']) {
							$arr[] = $val;
						}
					}
					return $arr;
				}
		} else {
			$arr = [];
				foreach($all['days'] as $val) {
					var_dump($all); return;
					foreach ($val as $han => $needle) {
						$boom = parse_($needle);
						// var_dump($boom);
						if($prod == $boom['prod']) {
							$arr[] = $val;
						}
					}
					// return $arr;
				}
				return $arr;
			}
        return $arr;
    }

function refine_state($cat) {
    return $cat;
}

function query_list($q, $s) {
	foreach ($s as $item) {
		if($q['i'] < $item['i']) 
		{
			return 0;
		} else {	
			
            $by_days = sales_by_day($q, $s);
                        
            $cat = refine_cat($q, $by_days);
            return $cat;
            
            }
		}
	}

$result = query_list($queries[4], $sale);

var_dump($result);





?>

