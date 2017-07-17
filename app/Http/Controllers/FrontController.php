<?php

namespace App\Http\Controllers;

use App\Page;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {
         return $this->view->make('public.index');
    }

    public function pages($slug) {
    	$page = Page::whereSlug($slug)->first();
    	return view('public.page', ['page' => $page]);
    }
    
}
