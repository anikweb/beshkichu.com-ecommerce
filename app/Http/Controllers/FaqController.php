<?php

namespace App\Http\Controllers;

use App\Http\Requests\faqAddForm;
use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth()->user()->can('faq view')){
            return view('backend.pages.faq.index',[
                'faqs' => Faq::latest()->paginate(10),
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
        if(auth()->user()->can('faq add')){
            return view('backend.pages.faq.create');
        }else{
            return abort('404');
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(faqAddForm $request)
    {
        if(auth()->user()->can('faq add')){
            $faq = new Faq;
            $faq->title = $request->title;
            $faq->summary = $request->summary;
            $faq->save();
            return redirect()->route('faq.index')->with('success','FAQ Created!');
        }else{
            return abort('404');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function show(Faq $faq)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function edit(Faq $faq)
    {
        if(auth()->user()->can('faq edit')){
            return view('backend.pages.faq.edit',[
                'faq' => $faq,
            ]);
        }else{
            return abort('404');
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function update(faqAddForm $request, Faq $faq)
    {
        if(auth()->user()->can('faq edit')){
            $faq->title = $request->title;
            $faq->summary = $request->summary;
            $faq->save();
            return back()->with('success','FAQ UPDATED!');
        }else{
            return abort('404');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function destroy(Faq $faq)
    {
        if(auth()->user()->can('faq trash')){
            if($faq->delete()){
                return back()->with('success','FAQ Deleted!');
            }else{
                return back()->with('error','Failed!');
            }
        }else{
            return abort('404');
        }
    }
    public function indexTrash()
    {
        if(auth()->user()->can('faq trash view')){
            return view('backend.pages.faq.trash',[
                'faqs' =>Faq::onlyTrashed()->orderBy('deleted_at','desc')->paginate(10),
            ]);
        }else{
            return abort('404');
        }
    }
    public function restoreTrash($id)
    {
        if(auth()->user()->can('faq trash restore')){
            $faq = FAQ::onlyTrashed()->find($id);
            $faq->restore();
            return back()->with('success','FAQ restored!');
        }else{
            return abort('404');
        }

    }
    public function permanetDestroyTrash(Request $request)
    {
        if(auth()->user()->can('faq trash delete')){
            $faq = Faq::onlyTrashed()->find($request->faq_id);
            $faq->forceDelete();
            return back()->with('success','FAQ permanently deleted!');
        }else{
            return abort('404');
        }
    }
}
