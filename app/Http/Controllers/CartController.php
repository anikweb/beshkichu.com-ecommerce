<?php

namespace App\Http\Controllers;

use App\Http\Requests\CartAddForm;
use App\Models\Cart;
use App\Models\Voucher;
use App\Models\Product;
use App\Models\Product_Attribute;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Carbon\Carbon;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $cookieId = Cookie::get('beshkichu_com');

        return view('frontend.pages.cart.index',[
            'carts' =>Cart::where('cookie_id',$cookieId)->get(),
        ]);
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
    public function store(CartAddForm $request)
    {
        // return $request;
        if(!$request->size_id){
            return back()->with('size_error','Image and size must be selected simultaneously.');
        }
        $cookie_id = Cookie::get('beshkichu_com');
        if(Cart::where('cookie_id',$cookie_id)->where('product_id',$request->product_id)->where('image_id',$request->image_id)->where('size_id',$request->size_id)->exists()){
            Cart::where('cookie_id',$cookie_id)->where('product_id',$request->product_id)->where('image_id',$request->image_id)->where('size_id',$request->size_id)->increment('quantity',$request->quantity);
            return redirect()->route('cart.index')->with('success','Cart Added!');
        }else{
            Cart::create($request->except('_tocken')+[
                'cookie_id' => $cookie_id,
                'size_id' => $request->size_id,
            ]);
            return redirect()->route('cart.index')->with('success','Cart Added!');
        }
        return 'added';

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cart $cart)
    {
        return $cart;
    }
    public function cartDelete($cart_id)
    {
        Cart::where('cookie_id',Cookie::get('beshkichu_com'))->find($cart_id)->delete();
        return back();
    }
    public function cartDeleteAll()
    {
        // return 'hello';
        $carts = Cart::where('cookie_id',Cookie::get('beshkichu_com'))->get();
        foreach ($carts as  $cart) {
           $cart->delete();
        }
        return back();
    }
    public function cartRemoveVoucher()
    {
        session()->forget('s_discount');
        session()->forget('s_voucher');
        return redirect()->route('cart.index');
    }
    public function quantityUpdate($id,$quantity)
    {
        $cookieId = Cookie::get('beshkichu_com');
        $cart = Cart::where('cookie_id',$cookieId)->find($id);
        $cart->quantity = $quantity;
        $cart->save();

        $product = Product_Attribute::where('product_id',$cart->product_id)->where('image_gallery_id',$cart->image_id)->first()->offer_price;

        return response()->json($product);

    }
    public function totalPriceCart($id)
    {
        // $cookieId = Cookie::get('beshkichu_com');
        // $carts = Cart::where('cookie_id',$cookieId);

        // $s = 's';
        // foreach ($carts as $key => $cart) {
        //     $s =  $s.'ff';
        // }
        // // $s = 'd';
        // // $s = Product_Attribute::where('product_id',$cart->product_id);

        // return response()->json($s);

    }
}
