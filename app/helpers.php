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

function put($url, $callback) {
    return Route::put($url, $callback);
}

function delete($url, $callback) {
	return Route::delete($url, $callback);
}

function getSetting($name) {
    $row = new App\Setting;
    $data = $row->where('s_key', $name)->get(['value'])->first();
    return $data->value; 
}

function getMenus($name) {
    $data = getSetting($name);
    $data = unserialize($data);
    if(isset($data['menu_items'])) 
    {
            for($i=0; $i < count($data['menu_items']); $i++)
            {
                $x = $i+1;
                $assembly[$i] = [ 'link' => $data['menu_items'][$i], 'title' => $data['menu_titles'][$i], 'parent_id' => $data['nestData'][$x]['parent_id'], 'order' => $data['nestData'][$x]['left'] ];
            }
            return $assembly;
    }
    else 
    {
            return 'Menu Empty';
    }
}

function getNav($arr, $options = FALSE, $child = FALSE) 
    {
        $arr = collect($arr);
        $arr = $arr->sortBy(function($item, $key){
            return $item['order'];
        })->toArray();
        
        $str = '';
        $attrs= ($options === TRUE) ? 'class="nav navbar-nav"' : 'class="nav"';
        
        $anchor = '<ul '.$attrs.'>';
        if (count($arr)) 
        {
            $str .= $child == FALSE ? $anchor : '<ul>';
            foreach ($arr as $item)
            {
                $str .= '<li class="top-level">';
                $str .= "<a href='" . $item['link'] . "'>" . $item['title'] . "</a>";

                if (isset($item['children']) && count($item['children']))
                {
                    $str .= $this->ol($item['children'], TRUE);
                }
                    $str .= '</li>'  . PHP_EOL;
            }
            $str .= '</ul>' . PHP_EOL;
        }

        return $str;
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

function convertSize($filesize) {
    $div = $filesize / 1000;
    switch ($div) {
        case ($div <= 1000):
            return round($filesize/1000, 1) . "KB";
            break;
        
        case ($div <= 1000000):
            return round($filesize/1000000, 2) . "MB";
            break;

        default:
            return round($filesize/1000000000, 2) . "GB";
            break;
    }
}


