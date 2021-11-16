<?php

namespace App\Http\Controllers;

use App\Models\CustomerPersonalInformation;
use App\Models\Division;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class BackendUserController extends Controller
{
    public function index()
    {
        return view('backend.pages.account_info.profile',[
            'users' => CustomerPersonalInformation::where('user_id',Auth::user()->id)->first(),
        ]);
    }

    public function indexChooseAction(Request $request)
    {
        if($request->action == 1){
            return redirect()->route('backend.user.edit');
        }elseif($request->action == 2){
            return redirect()->route('backend.change.password');
        }
    }
    public function changePassword(){
        return view('backend.pages.account_info.change_password');
    }
    public function changePasswordUpdate(Request $request){
        // return $request;
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|same:confirm_password',
            'confirm_password' => 'required',
        ]);
        $user = Auth::user();
        if(Hash::check($request->current_password,$user->password)){
            $user->password = Hash::make($request->new_password);
            $user->save();
            return reidrec()->with('success','Password Changed!');
        }else{
            return back()->with('error','Wrong current password');
        }
    }
    public function edit(){
        return view('backend.pages.account_info.edit',[
            'users' => CustomerPersonalInformation::where('user_id',Auth::user()->id)->first(),
            'regions' =>Division::orderBy('name','asc')->get(),
        ]);
    }
    public function update(Request $request){
        // return $request;
        $request->validate([
            'username' => 'required|unique:customer_personal_information,username,'.$request->personal_information_id,

        ]);
        // return $request;
        $user = User::find(Auth::user()->id);

        $user->name = $request->name;
        // $user->email = $request->email;
        $user->save();
        $CusPerInfo = CustomerPersonalInformation::where('user_id',Auth::user()->id)->first();
        $CusPerInfo->username = $request->username;
        $CusPerInfo->mobile = $request->mobile;
        $CusPerInfo->birth_date = $request->birth_date;
        $CusPerInfo->region_id = $request->region_id;
        $CusPerInfo->district_id = $request->district_id;
        $CusPerInfo->upazila_id = $request->upazila_id;
        $CusPerInfo->street_address1 = $request->street_address1;
        $CusPerInfo->street_address2 = $request->street_address2;
        $CusPerInfo->gender = $request->gender;
        $CusPerInfo->zip_code = $request->zip_code;
        $CusPerInfo->save();

        return redirect()->route('backend.user')->with('success','Updated!');
    }
}
