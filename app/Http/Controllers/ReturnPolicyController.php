<?php

namespace App\Http\Controllers;

use App\Models\ReturnPolicy;
use Illuminate\Http\Request;

class ReturnPolicyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth()->user()->can('site settings edit')){
            return view('backend.pages.return_policy.index',[
                'returnPolicy' => ReturnPolicy::find(1),
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
     * @param  \App\Models\ReturnPolicy  $returnPolicy
     * @return \Illuminate\Http\Response
     */
    public function show(ReturnPolicy $returnPolicy)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ReturnPolicy  $returnPolicy
     * @return \Illuminate\Http\Response
     */
    public function edit(ReturnPolicy $returnPolicy)
    {
        if(auth()->user()->can('site settings edit')){
            return view('backend.pages.return_policy.edit',compact('returnPolicy'));
        }else{
            return abort('404');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ReturnPolicy  $returnPolicy
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ReturnPolicy $returnPolicy)
    {
        if(auth()->user()->can('site settings edit')){
            $returnPolicy->description = $request->description;
            $returnPolicy->save();
            return redirect()->route('return-policy.index')->with('success','Return Policy Updated');
        }else{
            return abort('404');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ReturnPolicy  $returnPolicy
     * @return \Illuminate\Http\Response
     */
    public function destroy(ReturnPolicy $returnPolicy)
    {
        //
    }
}
