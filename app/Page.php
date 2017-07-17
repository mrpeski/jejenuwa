<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Page extends Model
{
    use SoftDeletes;
    
    protected $fillable = ['title', 'body', 'file_path', 'user_id', 'slug'];

    protected $dates = ['deleted_at'];

  

    public function path()
    {
        return 'admin/pages/'.$this->title;
    }

    public static function boot() {
        parent::boot();

        static::creating( function($page) {
        $slug = str_slug($page->title);
            if (static::whereSlug($slug)->exists()) {
                // Handle duplicate slug
                $page->slug = $slug . '-' . uniqid();
                return;
            }
            $page->slug = $slug;
        });

        static::updating( function($page) {
        if(!$page->slug) {
            $slug = str_slug($page->title);
                if (static::whereSlug($slug)->exists()) {
                    // Handle duplicate slug
                    $page->slug = $slug . '-' . uniqid();
                    return;
                }
                $page->slug = $slug;
            }
        });
    }
    
}
