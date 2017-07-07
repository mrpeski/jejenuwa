<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Page extends Model
{
    use SoftDeletes;
    
    protected $fillable = ['title', 'body', 'image_path', 'user_id'];

    protected $dates = ['deleted_at'];


    public function path()
    {
        return 'admin/pages/'.$this->title;
    }

    
}
