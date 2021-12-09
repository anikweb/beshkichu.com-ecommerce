<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryForm;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use App\Models\{
    Category,
    Subcategory,
};
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\{
    Str,
};

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth()->user()->can("category view")){
            return view('backend.pages.category.index',[
                'categories' =>Category::latest()->paginate(10),
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
        if(auth()->user()->can("category add")){
            return view('backend.pages.category.create');
        }else{
            return abort(4054);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryForm $request)
    {
        if(auth()->user()->can("category add")){
            $category = new Category;
            $category->name =$request->name;
            $category->slug = Str::slug($request->name);
            $category->save();
            if($request->hasFile('image')){
                $image = $request->file('image');
                $newImageName = Str::slug($category->name).'-'.date('Y_m_d_h_i_s').time().'.'.$image->getClientOriginalExtension();
                // Create Dynamic Folder Start
                $path = public_path('assets/images/layout-2/collection-banner/');
                // Create Dynamic Folder End
                Image::make($image)->save($path.$newImageName);
                $category->image = $newImageName;
                $category->save();
                return back()->with('success','Category Created!');
            }
        }else{
            return abort(4054);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        if(auth()->user()->can("category edit")){
            return view('backend.pages.category.edit',[
               'category' => Category::where('slug',$slug)->first(),
            ]);
        }else{
            return abort(404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        // Validation
        if(auth()->user()->can("category edit")){
            $request->validate([
                "name" => 'required|string|max:20|unique:categories,name,'.$category->id,
            ]);
            // Update
            $category->name = $request->name;
            $category->slug = Str::slug($request->name);
            $category->save();
            if($request->hasFile('image')){
                // return 'paise';
                $oldImage = public_path('assets/images/layout-2/collection-banner/'.$category->image);
                if(file_exists($oldImage)){
                    unlink($oldImage);
                }
                $image = $request->file('image');
                $newImageName = Str::slug($category->name).'-'.date('Y_m_d_h_i_s').time().'.'.$image->getClientOriginalExtension();
                // Create Dynamic Folder Start
                $path = public_path('assets/images/layout-2/collection-banner/');
                // Create Dynamic Folder End
                Image::make($image)->save($path.$newImageName);
                $category->image = $newImageName;
                $category->save();
                return redirect()->route('category.edit',$category->slug)->with('success','Category Updated!');
            }
            return redirect()->route('category.edit',$category->slug)->with('success','Category Updated!');
        }else{
            return abort(404);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        if(auth()->user()->can("category delete")){
            $category = Category::where('slug',$slug)->first();
            if(!Subcategory::where('category_id',$category->id)->exists()){
                if($category->delete()){
                    return back()->with('success','Category Deleted!');
                }else{
                    return back()->with('error','Failed!');
                }
            }else{
                return back()->with('error','Failed! you have created subcategory by using this category');
            }

        }else{
            return abort(404);
        }
    }
}
