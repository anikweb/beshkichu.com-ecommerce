<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogAddForm;
use App\Models\blog;
use App\Models\Category;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;
use Auth;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.pages.blog.index',[
            'blogs' =>blog::latest()->paginate('10'),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.blog.create',[
            'categories' => Category::orderBy('name','asc')->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BlogAddForm $request)
    {
        $blog  = new blog;
        $blog->user_id = Auth::user()->id;
        $blog->category_id = $request->category_id;
        $blog->title = $request->title;
        $blog->slug = Str::slug($request->title);
        $blog->description = $request->description;
        $blog->save();

        if($request->hasFile('feature_image')){
            // $oldImage = public_path('assets/images/blog/'.$blog->image);
            // if(file_exists($oldImage)){
            //     unlink($oldImage);
            // }
            $image = $request->file('feature_image');
            $newImageName = Str::slug($blog->title).'_'.date('Y_m_d_h_i_s').time().'.'.$image->getClientOriginalExtension();
            $path = public_path('assets/images/blog/');
            Image::make($image)->save($path.$newImageName,80);
            $blog->image = $newImageName;
            $blog->save();
            return back()->with('success','Image Updated!');
        }else{
            return back()->with('error','Failed to update image!');
        }

        return 'added';
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(blog $blog)
    {
        return view('backend.pages.blog.edit',[
            'categories' => Category::orderBy('name','asc')->get(),
            'blog' => $blog,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(BlogAddForm $request, blog $blog)
    {
        $blog->category_id = $request->category_id;
        $blog->title = $request->title;
        $blog->slug = Str::slug($request->title);
        $blog->description = $request->description;

        if($request->hasFile('feature_image')){
            $oldImage = public_path('assets/images/blog/'.$blog->image);
            if(file_exists($oldImage)){
                unlink($oldImage);
            }
            $image = $request->file('feature_image');
            $newImageName = Str::slug($blog->title).'_'.date('Y_m_d_h_i_s').time().'.'.$image->getClientOriginalExtension();
            $path = public_path('assets/images/blog/');
            Image::make($image)->save($path.$newImageName,80);
            $blog->image = $newImageName;

        }
        $blog->save();
        return redirect()->route('blog.index')->with('success','Blog Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(blog $blog)
    {
        $blog->delete();
        return back()->with('success','Blog Deleted!');
    }
}
