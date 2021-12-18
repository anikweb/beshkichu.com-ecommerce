<?php

namespace App\Http\Controllers;

use App\Models\ProductRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use Auth;

class ProductRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('frontend.pages.product_request.index');
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
        $request->validate([
            'product_name' => 'required',
            'details' => 'required',
            'quantity' => 'required',
            'valid_to' => 'required',
            'image' => 'required|mimes:png,jpg,jpeg,svg,webp',
        ]);
        $product = new ProductRequest;
        $product->user_id = Auth::user()->id;
        $product->request_id = Str::random(8);
        $product->status = 1;
        $product->email = $request->email;
        $product->mobile = $request->mobile;
        $product->product_name = $request->product_name;
        $product->details = $request->details;
        $product->quantity = $request->quantity;
        $product->valid_to = $request->valid_to;
        $product->save();
        if($request->hasFile('image')){
            $image = $request->file('image');
            $newImageName = Str::slug($product->product_name).'-'.date('Y_m_d_h_i_s').time().'.'.$image->getClientOriginalExtension();
            // Create Dynamic Folder Start
            $path = public_path('assets/images/product-request').'/'.$product->created_at->format('Y/m/d').'/'.$product->id.'/';
            File::makeDirectory($path, $mode = 0777, true, true);
            // Create Dynamic Folder End
            Image::make($image)->save($path.$newImageName);
            $product->image = $newImageName;
            $product->save();
            return redirect()->route('frontend.requested.product.index')->with('success','Success');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductRequest  $productRequest
     * @return \Illuminate\Http\Response
     */
    public function show(ProductRequest $productRequest)
    {
        return view('frontend.pages.product_request.show',compact('productRequest'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductRequest  $productRequest
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductRequest $productRequest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProductRequest  $productRequest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductRequest $productRequest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductRequest  $productRequest
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductRequest $productRequest)
    {
        //
    }
}
