<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model
{
    protected $fillable = ['name', 'address', 'phone_1', 'phone_2', 'city'];
    protected $table = 'warehouse';


 //    public function getRouteKeyName()
	// {
	//     // return 'id';
	// }
    

}
