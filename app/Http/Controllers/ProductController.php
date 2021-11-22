<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use App\Models\{
    Category,
    Product,
    Product_Attribute,
    ProductColor,
    ProductImageGallery,
    ProductReturn,
    ProductSize,
    productSizeAttribute,
    productWarranty,
    Subcategory,
};
use App\Http\Requests\{
    ProductAddForm,
    ProductEditForm,
    attributeAddForm,
    attributeEditForm,
};
use Intervention\Image\Facades\{
    Image,
};


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth()->user()->can('product view')){
            return view('backend.pages.products.index',[
                'products' =>Product::latest()->paginate(10),
            ]);
        }else{
            return abort(404);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(auth()->user()->can('product add')){
            return view('backend.pages.products.create',[
                'categories' =>Category::orderBy('name','asc')->get(),
                'warranties' => productWarranty::latest()->get(),
                'returns' => ProductReturn::all(),
                'colors' =>ProductColor::orderBy('name','asc')->get(),
                'sizes' =>ProductSize::orderBy('name','asc')->get(),
            ]);
        }else{
            return abort(404);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductAddForm $request)
    {

        if(auth()->user()->can('product add')){
            // return $request;
            $product = new Product;
            $product->name =  $request->name;
            // $product->slug = Str::slug($request->name);
            $slugName  = Str::slug($request->name);
            if(Product::where('slug',$slugName)->first()){
                $product->slug = $slugName.'-'.time();
            }else{
                $product->slug = $slugName;
            }
            $product->thumbnail = 'default.jpg';
            $product->category_id = $request->category_id;
            $product->subcategory_id = $request->subcategory_id;
            $product->brand = $request->brand;
            $product->main_upper_material = $request->main_upper_material;
            $product->outsole_material = $request->outsole_material;
            $product->gender = $request->gender;
            $product->summary = $request->summary;
            $product->description =  $request->description;
            $product->sku = Str::title(uniqid());
            $product->origin = $request->origin;
            $product->warranty = $request->warranty;
            $product->return = $request->return;
            $product->authentic =$request->authentic;
            $product->promotions = $request->promotions;
            $product->shipping_charge =$request->shipping_charge;
            $product->delivery_deadline = $request->delivery_deadline_min.'-'.$request->delivery_deadline_max;
            $product->save();

            if($request->hasFile('thumbnail')){
                $thumbnail = $request->file('thumbnail');
                $newThumbnailName = Str::slug($product->name).'-'.date('Y_m_d').'.'.$thumbnail->getClientOriginalExtension();
                // Create Dynamic Folder Start
                $path = public_path('assets/images/product').'/'.$product->created_at->format('Y/m/d/').$product->id.'/thumbnail/';
                File::makeDirectory($path, $mode = 0777, true, true);
                // Create Dynamic Folder End
                Image::make($thumbnail)->save($path.$newThumbnailName);
                $product->thumbnail = $newThumbnailName;
                $product->save();
            }
            return redirect()->route('product.index')->with('success','Product Added');
        }else{
            return abort(404);
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        if(auth()->user()->can('product view')){
            return view('backend.pages.products.show',[
               'product' => Product::where('slug',$slug)->first(),

            ]);
        }else{
            return abort(404);
        }

    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        if(auth()->user()->can('product edit')){
            return view('backend.pages.products.edit',[
                'product' =>Product::where('slug',$slug)->first(),
                'categories' =>Category::orderBy('name','asc')->get(),
                'warranties' => productWarranty::latest()->get(),
                'returns' => ProductReturn::all(),
                'colors' =>ProductColor::orderBy('name','asc')->get(),
                'sizes' =>ProductSize::orderBy('name','asc')->get(),
            ]);
        }else{
            return abort(404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductEditForm $request, Product $product)
    {
        if(auth()->user()->can('product edit')){
            $product->name =  $request->name;
            $product->category_id = $request->category_id;
            $product->subcategory_id = $request->subcategory_id;
            $product->brand = $request->brand;
            $product->main_upper_material = $request->main_upper_material;
            $product->outsole_material = $request->outsole_material;
            $product->gender = $request->gender;
            $product->summary = $request->summary;
            $product->description =  $request->description;
            $product->origin = $request->origin;
            $product->warranty = $request->warranty;
            $product->return = $request->return;
            $product->authentic =$request->authentic;
            $product->promotions = $request->promotions;
            $product->sku = uniqid();
            $product->save();

            if($request->hasFile('thumbnail')){
                $oldImage = asset('assets/images/product').'/'.$product->created_at->format('Y/m/d/').$product->id.'/thumbnail/'.$product->thumbnail;
                if(file_exists($oldImage)){
                    unlink($oldImage);

                }
                $thumbnail = $request->file('thumbnail');
                $newThumbnailName = Str::slug($product->name).'-'.date('Y_m_d').'.'.$thumbnail->getClientOriginalExtension();
                // Create Dynamic Folder Start
                $path = public_path('assets/images/product').'/'.$product->created_at->format('Y/m/d/').$product->id.'/thumbnail/';
                File::makeDirectory($path, $mode = 0777, true, true);
                // Create Dynamic Folder End
                Image::make($thumbnail)->save($path.$newThumbnailName);
                $product->thumbnail = $newThumbnailName;
                $product->save();
            }
            return redirect()->route('product.edit',$product->slug)->with('success','Updated');
        }else{
            return abort(404);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
    public function getSubcategory($cat_id)
    {
        $subcategory = Subcategory::where('category_id',$cat_id)->get();
        return response()->json($subcategory);
    }
    public function indexAttribute($product_slug)
    {
        if(auth()->user()->can('product view')){
            $product = Product::where('slug',$product_slug)->first();
            return view('backend.pages.products.attribute',[
                'product' => $product,
                'attributes' =>Product_Attribute::where('product_id',$product->id)->paginate(5),
            ]);
        }else{
            return abort(404);
        }
    }
    public function AttributeStore(attributeAddForm $request)
    {
        if(auth()->user()->can('product add')){

            $product = Product::find($request->product_id);
            $imageGalleryDB = new ProductImageGallery;
            $imageGalleries = $request->file('image_galleries');

            $newImageGalleriesName = Str::slug($product->name).'-'.date('Y_m_d').'_'.time().'.'.$imageGalleries->getClientOriginalExtension();

            // Create Dynamic Folder Start
            $path1 = public_path('assets/images/product').'/'.$product->created_at->format('Y/m/d/').$product->id.'/image_galleries/';
            File::makeDirectory($path1, $mode = 0777, true, true);

            // Create Dynamic Folder End
            Image::make($imageGalleries)->save($path1.$newImageGalleriesName);

            $imageGalleryDB->product_id = $product->id;
            $imageGalleryDB->name = $newImageGalleriesName;
            $imageGalleryDB->save();

            $productAttribute = new Product_Attribute;
            $productAttribute->product_id = $product->id;
            $productAttribute->image_gallery_id =  $imageGalleryDB->id;
            $productAttribute->regular_price = $request->rPrice;
            $productAttribute->offer_price = $request->ofrPrice;
            $productAttribute->save();

            foreach ($request->size_id as $key => $size_id) {
                $productSize = new productSizeAttribute;
                $productSize->attribute_id = $productAttribute->id;
                $productSize->size_id = $size_id;
                $productSize->save();
            }

            return back()->with('success','new attribute added');
        }else{
            return abort(404);
        }

    }
    public function editAttribute($attribute_id)
    {
        if(auth()->user()->can('product edit')){
            $attribute = Product_Attribute::find($attribute_id);
            return view('backend.pages.products.edit_attribute',compact('attribute'));
        }else{
            return abort(404);
        }
    }

    public function updateAttribute(attributeEditForm $request)
    {
        if(auth()->user()->can('product edit')){
            $product = Product::find($request->product_id);
            $productAttribute = Product_Attribute::find($request->attribute_id);
            $imageGalleryDB = ProductImageGallery::find($productAttribute->image->id);
            $imageGalleries = $request->file('image_galleries');
            if($request->hasFile('image_galleries')){
                $oldImage = public_path('assets/images/product').'/'.$product->created_at->format('Y/m/d/').$product->id.'/image_galleries/'.$imageGalleryDB->name;

                if(file_exists($oldImage)){
                    unlink($oldImage);
                    // return 'ase';
                }
                $newImageGalleriesName = Str::slug($product->name).'-'.date('Y_m_d').'_'.time().'.'.$imageGalleries->getClientOriginalExtension();

                // Create Dynamic Folder Start
                $path1 = public_path('assets/images/product').'/'.$product->created_at->format('Y/m/d/').$product->id.'/image_galleries/';
                Image::make($imageGalleries)->save($path1.$newImageGalleriesName,60);
                $imageGalleryDB->name = $newImageGalleriesName;
                $imageGalleryDB->save();

            }
            $productAttribute->image_gallery_id =  $imageGalleryDB->id;
            $productAttribute->regular_price = $request->rPrice;
            $productAttribute->offer_price = $request->ofrPrice;
            $productAttribute->save();

            foreach ($productAttribute->size as $key => $sizes) {
                // echo $sizes.'<br/>';
                // $productSize =productSizeAttribute::where('attribute_id',$productAttribute->size);
                // $productSize->attribute_id = $productAttribute->id;
                // $productSize->size_id = $size_id;
                // $productSize->save();
                $sizes->delete();
            }
            if($request->size_id){
                foreach ($request->size_id as $key => $size_id) {
                    $productSize = new productSizeAttribute;
                    $productSize->attribute_id = $productAttribute->id;
                    $productSize->size_id = $size_id;
                    $productSize->save();
                }
            }
            return back()->with('success','Attribute updated');
        }else{
            return abort(404);
        }
    }
}
