<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Page;

class MenuController extends Controller
{
    public function index()
    {
        
        $allpages = Page::all()->toArray();
        $menus = [];
         return view('admin.menu')->with(['menus' => $menus, 'allpages' => $allpages]);
    }
}
