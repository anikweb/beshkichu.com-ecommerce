<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Cookie;
use App\Models\{
    Category,
    Product,
    Product_Attribute,
    Slider,
    Wishlist,
};
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index(){
        if(Cookie::get('beshkichu_com') == ''){
            $cookie_name = 'beshkichu_com';
            $cookie_value = time().'-'.Str::random(10);
            $cookie_duration = 43200;
            Cookie::queue($cookie_name, $cookie_value, $cookie_duration);
        }
        return view('frontend.home',[
            'productAll' => Product::limit(8)->get(),
            'productNew' => Product::latest()->limit(8)->get(),
            'wishlistProduct' =>Wishlist::all(),
            'sliders' =>Slider::where('status',1)->latest()->get(),
            'categories' =>Category::orderBy('name','asc')->get(),
        ]);
    }
    public function productView(){
        return view('frontend.pages.product.product_list',[
            'productAll' => Product::latest()->get(),
            'productLatest' => Product::latest()->paginate(10),
        ]);
    }
    public function productViewByCatgory($slug){
        $Category = Category::where('slug',$slug)->first();
        // $Category->product->get();
        // return $Category->id;
        return view('frontend.pages.product.category_product',[
            'category' =>  Category::where('slug',$slug)->first(),
            'productLatest' =>  Product::where('category_id',$Category->id)->latest()->paginate(10),
        ]);
    }
    public function productSingle($slug){

        return view('frontend.pages.product.product_single',[
            'product' => Product::where('slug',$slug)->first(),
        ]);
    }
    public function wishlistIndex(){

        $siteCookie = Cookie::get('beshkichu_com');

        return view('frontend.pages.wishlist',[

            'wishlists' => Wishlist::where('cookie_id',$siteCookie)->latest()->paginate(10),
        ]);
    }
    public function wishliststore($product_id){
            $siteCookie = Cookie::get('beshkichu_com');
            $wishlistCheck =  Wishlist::where('cookie_id',$siteCookie)->where('product_id',$product_id)->first();
            if($wishlistCheck){
                $wishlistCheck->delete();
                return response('deleted');
            }else{
                $wishlist = new Wishlist;
                $wishlist->cookie_id =$siteCookie;
                $wishlist->product_id =$product_id;
                $wishlist->save();
                return response()->json($wishlist);

            }


    }
    public function wishlistRemove($id){
        // return $id;
        $siteCookie = Cookie::get('beshkichu_com');
        $wishlistCheck =  Wishlist::where('cookie_id',$siteCookie)->where('product_id',$id)->first();
        $wishlistCheck->delete();
        return back()->with('success','Deleted!');
    }
    function getColorSizeId($cid,$pid){
        $sizes = Product_Attribute::where('product_id',$pid)->where('color_id',$cid)->get();
        $outpot = '';
        foreach ($sizes as $key => $size) {
            $outpot =  $outpot.'<li  class="sizeCheck sizeCheck'.$size->size_id.'"  data-rPrice="'.$size->regular_price.'"  data-size="'.$size->size_id.'" data-price="'.$size->offer_price.'">'.$size->size_id;
        }
        // <ul>

        // </ul>
        return response()->json($outpot);

    }

}
