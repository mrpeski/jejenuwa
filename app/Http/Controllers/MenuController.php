<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Page;
use App\Setting;

class MenuController extends Controller
{
    public function index(Setting $setting)
    {
        $menus = $setting->where('s_key', 'like', 'menu%')->get();

        $menus->map(function($item, $key)
        {
             return $item->value = unserialize($item->value);
        });
        
        $menus = $menus->all();

        $allpages = Page::all()->toArray();
        return view('admin.menu')->with(['menus' => $menus, 'allpages' => $allpages]);
    }

    public function getMenus(Request $request) {
        return getMenus($request->name);
    }

    public function newMenu( Request $request, Setting $setting) 
	{
		$name = $request->all()['new_menu'];
		$machine_name = 'menu' . mt_rand(2,500);
		$setting->create(['s_key' => $machine_name, 'value' => serialize(['menu_name' => $name ])]);
		return redirect()->back();
	}

    
    public function store(Request $request, Setting $setting) 
	{
		$arr = $request->except('_token');
		$setting = new Setting;

		if(count($arr)) 
		{
        $data = $setting->where('s_key', $arr['menu_list_'])->first();
            if( (bool) $data && ! isset($data['menu_items'])) 
            {
            	$raw = unserialize($data->value);
            	$raw['menu_items'] = $arr['menu_items'];
            	$raw['menu_titles'] = $arr['menu_titles'];
            	$raw['menu_loc'] = $arr['loc'];
            	$raw['nestData'] = $arr['nestData'];
                $data->value = serialize($raw);
                $data->save();

                return redirect()->back()->with('message', 'Success');
            }
            else 
            {
            	return session('message', 'Error. Please Choose a Menu to work with!');
            }	
        }
	}
}
