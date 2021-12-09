<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use App\Models\{
    BillingDetails,
    CustomerPersonalInformation,
    Division,
    Order_Deatail,
    Order_Summary,
    User,
};
use Illuminate\Http\Request;
use App\Http\Requests\{
    CustomerPerInfo,
};
use Auth;
use Illuminate\Support\Facades\Hash;
use PDF;

class MyAccountController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','isCustomer','verified']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('frontend.pages.profile.personal_information',[
            'personalInformation' => CustomerPersonalInformation::where('user_id',Auth::user()->id)->first(),
        ]);
    }
    public function indexDeliveredOrder()
    {
       return view('frontend.pages.order.delivered_order',[
            'billings' => BillingDetails::where('user_id',Auth::user()->id)->paginate(),
       ]);
    }
    public function downloadInvoice($billing_id)
    {
        $billing_Details = BillingDetails::find($billing_id);
        $order_summary = Order_Summary::where('billing_id',$billing_Details->id)->first();
        $order_details = Order_Deatail::where('order_summary_id',$order_summary->id)->get();
        // return  $order_details;s
        $pdf = PDF::loadView('frontend.pages.order.invoice', compact('billing_Details','order_details','order_summary'))->setPaper('a4', 'portrait');
        return $pdf->download($order_summary->first()->invoice_no.'.pdf');
    }

    public function indexOrders()
    {
        return view('frontend.pages.order.index',[
            'billings' => BillingDetails::where('user_id',Auth::user()->id)->latest()->paginate(5),
        ]);
    }

    public function editPersonalOnfo($username)
    {
        // return $username;
        return view('frontend.pages.profile.personal_information_edit',[
            'personalInformation' => CustomerPersonalInformation::where('username',$username)->first(),
            'regions' =>Division::orderBy('name','asc')->get(),
        ]);
    }
    public function updatePersonalOnfo(CustomerPerInfo $request)
    {
        // return $request;
        $request->validate([
            'username' => 'required|unique:customer_personal_information,username,'.$request->personal_information_id,

        ]);
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
        $CusPerInfo->save();
        return redirect()->route('my-account.personal.information.edit',$CusPerInfo->username);
    }
    public function indexTrack(){
        return view('frontend.pages.order.track');
    }
    public function TrackOrder($invoice, $mobile){
        $order_summary = Order_Summary::where('invoice_no',$invoice)->first()->billing_details->where('phone',$mobile)->first();
        if($order_summary){
            return response()->json(Order_Summary::where('invoice_no',$invoice)->first());
        }
    }

    public function productDetails($invoice_no){

        $order_summary = Order_Summary::where('invoice_no',$invoice_no)->first();
        if($order_summary->billing_details->street_adress1){
            if(!$order_summary->billing_details->street_adress2){
                $street_address1 = $order_summary->billing_details->street_adress1.',';

            }
        }
        if($order_summary->billing_details->street_adress2){
            if(!$order_summary->billing_details->street_adress1){
                $street_address1 = $order_summary->billing_details->street_adress2.',';
            }
        }
        if(!empty($order_summary->billing_details->street_adress1) && !empty($order_summary->billing_details->street_adress2)){
            $street_address1 = $order_summary->billing_details->street_adress1.$order_summary->billing_details->street_adress2.',';
        }
        if ($order_summary->payment_status==1)
        {
           $payement_status='Unpaid';

        }else{
            $payement_status= 'Paid';
        }
        // <p>Delivery Deadline: '.$order_summary->order_details.'</p>
        $outpot =
        '<h4>Bill To</h4>
        <p>Client:<strong>'.$order_summary->billing_details->user->name.'</strong></p>
        <p>Company:<strong>'.$order_summary->billing_details->company.'</strong></p>
        <p>Address:<strong> '.$street_address1.$order_summary->billing_details->upazila->name.','.$order_summary->billing_details->district->name.'</strong></p>
        <p>Email: <strong>'.$order_summary->billing_details->email.'</strong></p>
        <p>Order Date and time:<strong> '.$order_summary->billing_details->created_at->format('d-M-Y, h:i A').'</strong></p>

        <p>Special Instruction:<strong>'.$order_summary->billing_details->note.'</strong></p>
        <p>Payment Method:<strong>'.Str::upper($order_summary->billing_details->payment_method).'</strong></p>
        <p>Payment Status:<strong> '.$payement_status.'</strong></p>';

        return response()->json($outpot);

    }
    public function productDetailsFull($invoice){
        $order_summary = Order_Summary::where('invoice_no',$invoice)->first()->order_details;
        $order_summarys = Order_Summary::where('invoice_no',$invoice)->first();
        $outpot = '';
        foreach($order_summary as $key => $order){
            $key = $key + 1;
            $outpot .=
                '<tr>
                    <td  width="4%">'.$key.'</td>
                    <td  width="50%">'.$order->product->name.' (sku: '.$order->product->sku.')'.'</td>
                    <td  width="5%">'.$order->size_id.'</td>
                    <td  width="5%">৳'.$order->product->attribute->where('image_gallery_id',$order->image_id)->first()->offer_price.'</td>
                    <td  width="10%">৳'.$order->product->shipping_charge.'</td>
                    <td  width="5%">'.$order->quantity.'</td>

                    <td  width="5">৳'.$order->product->attribute->where('image_gallery_id',$order->image_id)->first()->offer_price *  $order->quantity.'</td>
                </tr>';


        }
        if($order_summarys->discount){
            $outpot .=
                '<tr>
                    <td colspan="6" class="text-right font-weight-bold">Discount</td>
                    <td>'.$order_summarys->discount.'/-</td>
                </tr>';
        }
        if($order_summarys->shipping_fee){
            $outpot .=
                '<tr>
                    <td colspan="6" class="text-right font-weight-bold">Shipping Charge</td>
                    <td>'.$order_summarys->shipping_fee.'/-</td>
                </tr>';
        }
        if($order_summarys->payment_status ==1){
            $outpot .=
                '<tr>
                    <td colspan="6" class="text-right font-weight-bold">Payment</td>
                    <td>
                        Unpaid
                    </td>
                </tr>';
        }
        if($order_summarys->payment_status ==2){
            $outpot .=
                '<tr>
                    <td colspan="6" class="text-right font-weight-bold">Payment</td>
                    <td>
                        Paid
                    </td>
                </tr>';
        }
        if($order_summarys->shipping_fee){
            $totalPrice = $order_summarys->total_price+$order_summarys->shipping_fee;
            $outpot .=
                '<tr>
                    <td colspan="6" class="text-right font-weight-bold">Total</td>
                    <td>
                        '.$totalPrice.'/-
                    </td>
                </tr>';
            
        }else{
            $outpot .=
                '<tr>
                    <td colspan="6" class="text-right font-weight-bold">Total</td>
                    <td>
                        '.$order_summarys->total_price.'/-
                    </td>
                </tr>';
        }

        return response()->json($outpot);

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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function changePassword(){
        // return 'aschi bosss';
        return view('auth.change-password');
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
            return back()->with('success','Password Changed!');
        }else{
            return back()->with('error','Wrong current password');
        }
    }
}
