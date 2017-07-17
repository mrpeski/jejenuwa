<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Product extends Model
{
    protected $fillable = ['name', 'qty', 'location'];

    public function _has($sku)
    {
    	$find = DB::table('products')->where('id', $sku)->first();

         return (bool) $find;
    }
}
