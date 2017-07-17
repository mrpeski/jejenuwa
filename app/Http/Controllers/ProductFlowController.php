<?php

namespace App\Http\Controllers;

use App\ProductFlow;
use App\Product;
use App\Location;
use Illuminate\Http\Request;

class ProductFlowController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ProductFlow $flow, Location $loc)
    {
        $latest_IN = $flow->inLatest();
        $latest_OUT = $flow->outLatest();
        $location = $loc->all();
        $data = compact('latest_IN', 'latest_OUT', 'location');
        return view('admin.inventory.flow.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Product $product)
    {
        if ($request->has('out_qty')) 
        {
            if($product->_has($request->input('out'))) 
            {

                 ProductFlow::create(
                    [
                    'user_id'   => \Auth::id(),
                    'product_id' => $request->input('out'),
                    'qty' => $request->input('out_qty'),
                    'type'  => 'OUT',
                    'location_id' => $request->input('destination'),
                    'notes' => $request->input('out_notes')
                     ]
                );
            }

            else {
                return redirect()->back();
            }
        } else {
            ProductFlow::create([
            'user_id'   => \Auth::id(),
            'product_id' => $request->input('in'),
            'qty' => $request->input('in_qty'),
            'notes' => $request->input('in_notes')
        ]);
        }
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ProductFlow  $productFlow
     * @return \Illuminate\Http\Response
     */
    public function show(ProductFlow $productFlow)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProductFlow  $productFlow
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductFlow $productFlow)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProductFlow  $productFlow
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductFlow $productFlow)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProductFlow  $productFlow
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductFlow $productFlow)
    {
        //
    }
}
