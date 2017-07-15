<?php

namespace App\Http\Controllers;

use App\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    protected $setting;

    public function __construct(Setting $setting)
    {
         $this->setting = $setting;
    }

    /**
     * Handles setting page
     *
     * @return void
     */
   public function getSettings() {
		$formData = $this->setting->all()->toArray();
		$data = [];
		foreach ($formData as $item) {
			$data[$item['s_key']] = $item['value'];
		}
        // return $data;
		return view('admin.settings')->with( 'formData', $data );
	}

    /**
     * Handles Save and Update Action
     *
     * @param Request $request
     * @return void
     */
    public function postSettings(Request $request) 
    {
    	$formData = collect($request->input());
    	$formData = $formData->except('_token')->toArray();

    	foreach ($formData as $key => $value) 
    	{
    		$setting = new Setting;
            $data = $setting->where('s_key', $key)->first();
            if( isset($data->s_key) ) {
                // save new key
                $data->value = $value;
                $data->save();
            }
            else {
                //update
                $setting->s_key = $key;
                $setting->value = $value;
                $setting->save();
            }
    		return redirect('admin/settings')->with('message', 'Success');
    	}
    }
}
