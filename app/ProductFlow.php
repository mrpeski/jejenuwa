<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductFlow extends Model
{
	protected $table = 'products_flow';
    protected $fillable = ['user_id', 'product_id', 'qty', 'location', 'notes', 'type'];


    public function scopeInLatest($query)
    {
        return $query->where([['location_id', '=', '0'], ['type', '=', 'IN']])->take('5')->get();
    }

    public function scopeOutLatest($query)
    {
        return $query->where([['location_id', '=', '0'], ['type', '=', 'OUT']])->take('5')->get();
    }


    public function author() {
    	return $this->belongsTo('App\User', 'user_id');
    }

       
}
