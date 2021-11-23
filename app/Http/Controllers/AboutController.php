<?php

namespace App\Http\Controllers;

use App\Http\Requests\AboutSummaryAddForm;
use App\Models\About;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;

class AboutController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth()->user()->can('about edit')){
            return view('backend.pages.about.index',[
                'about' => About::first(),
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
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function show(About $about)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function edit(About $about)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, About $about)
    {
        if(auth()->user()->can('about edit')){
            $request->validate([
                'summary' => 'required',
            ]);
            $about->summary = $request->summary;
            $about->save();
            return back()->with('success','Summary Updated!');
        }else{
            return abort(404);
        }

    }
    public function imageUpdate(Request $request)
    {
        if(auth()->user()->can('about edit')){
            $request->validate([
                'image' => 'required|mimes:png,jpg,svg,webp,giff,jpeg',
            ]);
            $about = About::find($request->about_id);
            if($request->hasFile('image')){

                $oldImage = public_path('assets/images/about-image/'.$about->image);
                if(file_exists($oldImage)){
                    unlink($oldImage);
                }
                $image = $request->file('image');
                $newImageName = 'about'.date('Y_m_d_h_i_s').time().'.'.$image->getClientOriginalExtension();
                $path = public_path('assets/images/about-image/');
                Image::make($image)->save($path.$newImageName,80);
                $about->image = $newImageName;
                $about->save();
                return back()->with('success','Image Updated!');
            }else{
                return back()->with('error','Failed to update image!');
            }
        }else{
            return abort(404);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function destroy(About $about)
    {
        //
    }
}
