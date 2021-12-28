<?php

namespace App\Http\Controllers;

use App\Exports\MonthlySelesReport;
use App\Models\Order_Summary;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ReportController extends Controller
{
    public function monthlySelesExport(){
        if(auth()->user()->can('report management')){
            return Excel::download(new MonthlySelesReport(),'MonthlyReport.xlsx');
        }else{
            return abort(404);
        }
    }
    public function index(){
        if(auth()->user()->can('report management')){
            return view('backend.pages.report.index');
        }else{
            return abort(404);
        }

    }
    public function search(Request $request){
        if(auth()->user()->can('report management')){
            // return $request;
            $orders = Order_Summary::whereYear('created_at',$request->year)->whereMonth('created_at',$request->month)->get();
            return view('backend.pages.report.index',compact('orders'));
        }else{
            return abort(404);
        }
    }
}
