<?php

namespace App\Http\Controllers;

use App\Models\BillingDetails;
use App\Models\Order_Summary;
use App\Models\Order_Deatail;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;
use PDF;

class OrderController extends Controller
{
    public function index(){
        if(auth()->user()->can('order management')){
            return view('backend.pages.orders.picup_in_progress',[
                'orders' => Order_Summary::where('current_status',1)->latest()->get(),
            ]);
        }else{
            return abort(404);
        }
    }
    public function upgradeToShipped($invoice_no){
        if(auth()->user()->can('order management')){
            // return $invoice_no;
            $order_summary = Order_Summary::where('invoice_no',$invoice_no)->first();
            $order_summary->current_status = 2;
            $order_summary->save();
            return redirect()->route('dashboard.orders.details',$invoice_no)->with('success','Order '.$invoice_no.' upgraded to shipped');
        }else{
            return abort(404);
        }
    }
    public function indexShipped(){
        if(auth()->user()->can('order management')){
            return view('backend.pages.orders.shipped',[
                'orders' => Order_Summary::where('current_status',2)->latest()->get(),
                ]);
        }else{
            return abort(404);
        }
    }
    public function upgradeToOutForDelivery($invoice_no){
        if(auth()->user()->can('order management')){
            // return $invoice_no;
            $order_summary = Order_Summary::where('invoice_no',$invoice_no)->first();
            $order_summary->current_status = 3;
            $order_summary->save();
            return redirect()->route('dashboard.orders.details',$invoice_no)->with('success','Order '.$invoice_no.' upgraded to out for delivery');;
        }else{
            return abort(404);
        }
    }
    public function indexOutForDelivered(){
        if(auth()->user()->can('order management')){
            return view('backend.pages.orders.out_for_delivered',[
                'orders' => Order_Summary::where('current_status',3)->latest()->get(),
                ]);
        }else{
            return abort(404);
        }
    }
    public function upgradeToDelivered($invoice_no){
        if(auth()->user()->can('order management')){
            return $invoice_no;

        }else{
            return abort(404);
        }
    }
    public function indexDelivered(){
        if(auth()->user()->can('order management')){
            return view('backend.pages.orders.delivered',[
                'orders' => Order_Summary::where('current_status',4)->latest()->get(),
            ]);
        }else{
            return abort(404);
        }
    }
    public function indexDetails($invoice_no){
        if(auth()->user()->can('order management')){
            // return $invoice_no;
            return view('backend.pages.orders.details',[
                'order' => Order_Summary::where('invoice_no',$invoice_no)->first(),
            ]);
        }else{
            return abort(404);
        }
    }
    public function cancelOrder($invoice_no){
        if(auth()->user()->can('order management')){
            // return $invoice_no;
            $order_summary = Order_Summary::where('invoice_no',$invoice_no)->first();
            $order_summary->current_status = 5;
            $order_summary->save();
            return redirect()->route('dashboard.orders.details',$invoice_no)->with('success','Order '.$invoice_no.' canceled! ');;
        }else{
            return abort(404);
        }
    }
    public function indexCanceled(){
        if(auth()->user()->can('order management')){
            return view('backend.pages.orders.canceled',[
                'orders' => Order_Summary::where('current_status',5)->latest()->get(),
            ]);
        }else{
            return abort(404);
        }
    }
    public function addShippingCharge(Request $request){
        if(auth()->user()->can('order management')){

            $order_summary =  Order_Summary::where('invoice_no',$request->invoice_no)->first();
            $order_summary->shipping_fee = $request->total_shipping_charge;
            $order_summary->current_status = 4;
            $order_summary->delivered_date = Carbon::now();
            $order_summary->payment_status = 2;
            $order_summary->save();

            return redirect()->route('dashboard.orders.details',$request->invoice_no)->with('success','Order '.$request->invoice_no.' upgraded to delivered');

        }else{
            return abort(404);
        }
    }
    public function downloadInvoice($billing_id)
    {
        // return $billing_id;
        $billing_Details = BillingDetails::find($billing_id);
        $order_summary = Order_Summary::where('billing_id',$billing_Details->id)->first();
        $order_details = Order_Deatail::where('order_summary_id',$order_summary->id)->get();

        $pdf = PDF::loadView('backend.pages.orders.invoice', compact('billing_Details','order_details','order_summary'))->setPaper('a4', 'portrait');
        return $pdf->download($order_summary->invoice_no.'.pdf');
    }

}
