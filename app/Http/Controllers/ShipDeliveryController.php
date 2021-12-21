<?php

namespace App\Http\Controllers;

use App\Models\ShipDelivery;
use Illuminate\Http\Request;

class ShipDeliveryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth()->user()->can('site settings edit')){
            return view('backend.pages.ship_delivery.index',[
                'ship' => ShipDelivery::find(1),
            ]);
        }else{
            return abort('404');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ShipDelivery  $shipDelivery
     * @return \Illuminate\Http\Response
     */
    public function show(ShipDelivery $shipDelivery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ShipDelivery  $shipDelivery
     * @return \Illuminate\Http\Response
     */
    public function edit($ship)
    {
        if(auth()->user()->can('site settings edit')){
            return view('backend.pages.ship_delivery.edit',[
                'shipping' => ShipDelivery::find($ship),
            ]);
        }else{
            return abort('404');
        }
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ShipDelivery  $shipDelivery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ShipDelivery $shipDelivery)
    {
        if(auth()->user()->can('site settings edit')){
            $ship = ShipDelivery::find($request->shipping_id);
            $ship->description = $request->description;
            $ship->save();
            return redirect()->route('shipping-and-delivery.index')->with('success','Shipping and delivery updated!');
        }else{
            return abort('404');
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ShipDelivery  $shipDelivery
     * @return \Illuminate\Http\Response
     */
    public function destroy(ShipDelivery $shipDelivery)
    {
        //
    }
}
