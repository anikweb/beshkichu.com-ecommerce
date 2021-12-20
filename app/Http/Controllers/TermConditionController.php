<?php

namespace App\Http\Controllers;

use App\Models\TermCondition;
use Illuminate\Http\Request;

class TermConditionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth()->user()->can('site settings edit')){
            return view('backend.pages.term_condition.index',[
                'terms' => TermCondition::find(1),
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
     * @param  \App\Models\TermCondition  $termCondition
     * @return \Illuminate\Http\Response
     */
    public function show(TermCondition $termCondition)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TermCondition  $termCondition
     * @return \Illuminate\Http\Response
     */
    public function edit(TermCondition $termCondition)
    {
        if(auth()->user()->can('site settings edit')){
            $termCondition = TermCondition::find(1);
            return view('backend.pages.term_condition.edit',compact('termCondition'));
        }else{
            return abort('404');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TermCondition  $termCondition
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TermCondition $termCondition)
    {
        if(auth()->user()->can('site settings edit')){
            $termCondition = TermCondition::find($request->terms_id);
            $termCondition->description = $request->description;
            $termCondition->save();
            return redirect()->route('terms-and-conditions.index')->with('success','Terms & Conditions Updated!');
        }else{
            return abort('404');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TermCondition  $termCondition
     * @return \Illuminate\Http\Response
     */
    public function destroy(TermCondition $termCondition)
    {
        //
    }
}
