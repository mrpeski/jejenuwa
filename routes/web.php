<?php

use nuwa\MarineTraffic\MarineTrafficAPI;
use Illuminate\Session\Store;
use Illuminate\Support\Str;


// Route::get('/', '');
get('/', ['as' => 'index' , 'uses' => 'FrontController@index']);

get('/random/{id?}', function($id = 4) {
    $id = Str::random($id);
    session()->put('tested', $id);
    return $id;
});



Route::group(['prefix' => 'admin', 'middleware' => 'can:dash'], function()
{

// Pages Routes
get('/pages', ['as' => 'Page_index', 'uses' => 'PagesController@index']);
get('/pages/create', ['as' => 'Page_create', 'uses'=>'PagesController@create']);
post('/pages/create', ['as' => 'Page_store', 'uses' => 'PagesController@store']);
get('/pages/{id}', ['as' => 'Page_edit', 'uses'=>'PagesController@edit']);
patch('/pages/{id}', ['as' => 'Page_update', 'uses'=> 'PagesController@update']);
delete('/pages/{id}', ['as' => 'Page_delete', 'uses'=> 'PagesController@destroy']);

// Media Routes
get('/media', ['as' => 'Media_index', 'uses' => 'MediaController@index']);
get('/media/{type}/{name}', ['as' => 'Media_show', 'uses' => 'MediaController@show'])->where(['type' => 'image|doc|video']);
post('/media', ['as' => 'Media_upload', 'uses' => 'MediaController@store']);

// Ship Routes
get('/ship', ['as' => 'Ship_index', 'uses' => 'ShipController@index']);
get('/ship/{type}/{name}', ['as' => 'Ship_show', 'uses' => 'ShipController@show'])->where(['type' => 'cargo|tanker']);
post('/ship', ['as' => 'Ship_store', 'uses' => 'ShipController@store']);

// Business Logic
get('/track', ['as' => 'Ship_track', 'uses' => 'MainController@track']);
get('/arrivals', ['as' => 'Ship_arrivals', 'uses' => 'MainController@arrivals']);


// User Routes
get('/staff', ['as' => 'Staff_index', 'uses' => 'MediaController@index']);
get('/staff/{name}', ['as' => 'Staff_show', 'uses' => 'MediaController@show'])->where(['type' => 'image|doc|video']);
post('/staff', ['as' => 'Staff_create', 'uses' => 'MediaController@create']);
delete('/staff/{name}', ['as' => 'Staff_delete', 'uses' => 'MediaController@destroy']);

// Trash Bin Routes
get('/bin', ['as' => 'Bin_index', 'uses' => 'BinController@index']);
post('/bin/{id}', ['as' => 'Bin_restore', 'uses' => 'BinController@restore']);
delete('/bin/{id}', ['as' => 'Bin_delete', 'uses' => 'BinController@destroy']);

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');