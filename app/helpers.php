<?php
    function cartsItem(){
        return  App\Models\Cart::where('cookie_id',Cookie::get('beshkichu_com'))->get();
    }
    function wishlistItem(){
        return  App\Models\Wishlist::where('cookie_id',Cookie::get('beshkichu_com'))->get();
    }
    function basicSettings(){
        return App\Models\BasicSetting::first();
    }
    function category(){
        return App\Models\Category::orderBy('name','asc')->get();
    }
    function contactInformation(){
        return App\Models\contact_information::first();
    }
    function contactMobile(){
        return App\Models\contact_mobile::all();
    }
    function personalInfo(){
        return App\Models\CustomerPersonalInformation::where('user_id',Auth::user()->id)->first();
    }

?>
