<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PageFormRequest;
use App\Page;

class PagesController extends Controller
{
    protected $page;


    public function __construct(Page $page) {
        // $this->middleware('auth')->except(['show', 'index']);
        $this->page = $page;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = Page::all();
        return view('admin.page.index')->with('pages', $pages);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $this->authorize('create', Page::class);
        return view('admin.page.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PageFormRequest $request)
    {
        $page = $this->page->create([   
            'title' => $request->title, 
            'body' => $request->body,
            'user_id' => auth()->id() ?: 0 ]);
        

        return redirect('admin/pages')->with('message', 'Success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        try {
            $page = $this->page->whereTitle($slug)->firstorfail();
            return view('public/page')->with('page', $page);
        }   catch(Exception $e){
            return 'caught';
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $page = $this->page->findorfail($id);
        return view('admin.page.edit')->with('page', $page);
    }


    public function preview($id) {
        $page = $this->page->findorfail($id);
        return view('admin.page.preview', compact('page'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PageFormRequest $request, $id)
    {
        $page = $this->page->findorfail($id);
        $page->update([
            'title' => request('title'),
            'body' => request('body'),
        ]);

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $page = $this->page->findorfail($id);
        $page->delete();
        return redirect()->back();
    }
}
