<?php

use nuwa\MarineTraffic\MarineTrafficAPI;
use Illuminate\Session\Store;
use Illuminate\Support\Str;
use Illuminate\Routing\UrlGenerator;
use App\Location;

use Illuminate\Http\Request;

use GuzzleHttp\Client;


// Route::get('/', '');
get('/', ['as' => 'index' , 'uses' => 'FrontController@index']);
get('/pages/{id}', [ 'as' => 'Front_pages', 'uses' => 'FrontController@pages']);

//311013800 // 
get('/{id}', function(){
	return view('public.track');
})->where('id', '[0-9]+');

get('/vessel/{mmsi}', ['as' => 'Vessel_pos', function(Location $loc, $mmsi){
	$response = $loc->createNew($mmsi);
	return $response;
}]);

get('/loc/{mmsi}', function(Location $loc, $mmsi) {
	return $loc->getLoc($mmsi)->get();
});

post('/guana', ['as' => 'guana', 'uses' => 'Services\SearchController@search']);


get('/random/{id?}', function($id = 4) {
    $id = Str::random($id);
    session()->put('tested', $id);
    return $id;
});



Route::group(['prefix' => 'admin', 'middleware' => 'can:dash'], function()
{

get('/', ['as' =>'dash', 'uses' => function(){
    return view('admin.dashboard');
}]);

// Pages Routes
get('/pages', ['as' => 'Page_index', 'uses' => 'PagesController@index']);
get('/pages/create', ['as' => 'Page_create', 'uses'=>'PagesController@create'])->middleware('can:create,App\Page');
post('/pages/create', ['as' => 'Page_store', 'uses' => 'PagesController@store'])->middleware('can:create,App\Page');
get('/pages/{id}', ['as' => 'Page_edit', 'uses'=>'PagesController@edit'])->middleware('can:edit,App\Page');
get('/pages/{id}/preview', ['as' => 'Page_preview', 'uses'=>'PagesController@preview']);
patch('/pages/{id}', ['as' => 'Page_update', 'uses'=> 'PagesController@update'])->middleware('can:update,App\Page');
delete('/pages/{id}', ['as' => 'Page_delete', 'uses'=> 'PagesController@destroy'])->middleware('can:delete,App\Page');

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

// Inventory
get('/inventory', ['as' => 'Product_index', 'uses' => 'ProductController@index']);
get('/inventory/add', ['as' => 'Product_create', 'uses' => 'ProductController@create']);
get('/inventory/flow', ['as' => 'Product_flow', 'uses' => 'ProductFlowController@index']);
post('/inventory/flow', ['as' => 'Product_flow', 'uses' => 'ProductFlowController@store']);
post('/inventory/location', ['as' => 'Location_store', 'uses' => 'LocationController@store']);

// Warehouse
get('warehouses', ['as' => 'Warehouse_index', 'uses' => 'WarehouseController@index']);
get('warehouses/create', ['as' => 'Warehouse_create', 'uses' => 'WarehouseController@create']);
post('warehouse/create', ['as' => 'Warehouse_store', 'uses' => 'WarehouseController@store']);
get('warehouse/{warehouse}', ['as' => 'Warehouse_edit', 'uses' => 'WarehouseController@edit']);
post('warehouse/{warehouse}', ['as' => 'Warehouse_update', 'uses' => 'WarehouseController@update']);


// User Routes
get('/staff', ['as' => 'Staff_index', 'uses' => 'UserController@index']);
get('/staff/{id}', ['as' => 'Staff_page', 'uses' => 'UserController@show']);
post('/staff/{id}', ['as' => 'Staff_update', 'uses' => 'UserController@update']);


// Trash Bin Routes
get('/bin', ['as' => 'Bin_index', 'uses' => 'BinController@index']);
post('/bin/{id}', ['as' => 'Bin_restore', 'uses' => 'BinController@restore']);
delete('/bin/{id}', ['as' => 'Bin_delete', 'uses' => 'BinController@destroy']);

// Settings Routes
get('/setting', ['as' => 'Setting_index', 'uses' => 'SettingController@getSettings']);
post('/setting', ['as' => 'Setting_post', 'uses' => 'SettingController@postSettings']);

get('/menu', ['as' => 'Menu_index', 'uses' => 'MenuController@index']);
get('/menu/get', ['as' => 'Ajax_Menu_get', 'uses' => 'MenuController@getMenus']);
post('/menu', ['as' => 'Menu_store', 'uses' => 'MenuController@newMenu']);
post('menu/save', ['as' => 'Menu_update', 'uses' => 'MenuController@store']);


});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
