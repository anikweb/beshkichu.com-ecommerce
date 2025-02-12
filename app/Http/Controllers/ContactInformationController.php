<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactInfomationAddForm;
use Illuminate\Http\Request;
use App\Models\{
    contact_information,
    contact_mobile,
    Division,
    GoogleMap,
};

class ContactInformationController extends Controller
{

    public function index()
    {

        if(auth()->user()->can('contact information edit')){
            return view('backend.pages.contact_information.index',[
                'divisions' => Division::orderBy('name','asc')->get(),
                'contact_mobiles' => contact_mobile::latest()->get(),
                'contact_information' => contact_information::latest()->first(),
            ]);
        }else{
            return abort(404);
        }
    }
    public function update(ContactInfomationAddForm $request)
    {
        // return $request;
        if(auth()->user()->can('contact information edit')){
            $contact = contact_information::find($request->contact_id);
            $contact->email = $request->email;
            $contact->phone = $request->phone;
            $contact->division_id= $request->region_id;
            $contact->district_id= $request->district_id;
            $contact->upazila_id= $request->upazila_id;
            $contact->street_address = $request->street_address;
            $contact->zip_code = $request->zip_code;
            $contact->save();

            foreach (contact_mobile::all() as $mobile) {
                $arraySearch = in_array($mobile->id,$request->mobileId);
                if($arraySearch != 1){
                    $mobile->delete();
                }
            }

            foreach ($request->mobileId as $key => $mobileId) {
                if($mobileId != ''){
                    $contact_mobile =contact_mobile::find($mobileId);
                    $contact_mobile->number = $request->mobile[$key];
                    $contact_mobile->save();
                }else{
                    if($request->mobile[$key] != null){
                        $contact_mobile = new contact_mobile;
                        $contact_mobile->number = $request->mobile[$key];
                        $contact_mobile->save();
                    }

                }
             }
             return back();
        }else{
            return abort(404);
        }
    }
    public function indexGoogleMap()
    {
        if(auth()->user()->can('contact information edit')){
            return view('backend.pages.contact_information.google_map',[
                'map' => GoogleMap::find(1),
            ]);
        }else{
            return abort(404);
        }
    }
    public function updateGoogleMap(Request $request)
    {
        if(auth()->user()->can('contact information edit')){
            // return $request;
            $map = GoogleMap::find(1);
            if($request->title){
                $map->title = $request->title;
            }
            if($request->embed_code){
                $map->embed_code = $request->embed_code;
            }
            if(empty($request->title) && empty($request->embed_code)){

                return back()->with('error','You did not made any change!');
            }
            $map->save();
            return back()->with('success','Google Map Updated!');
        }else{
            return abort(404);
        }
    }
}
