<?php

namespace App\Http\Controllers;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\{
    Order_Summary,
    User,
    Product_Attribute,
    UniqueVisitors,
};
use Illuminate\Http\Request;
use Carbon\Carbon;
class DashboardController extends Controller
{
    public function index(){
        if(auth()->user()->roles->first()->name != 'Customer'){

            $users = User::all();
            return view('backend.dashboard',[
                'new_order' => Order_Summary::where('payment_status',1)->get(),
                'pickup_order' => Order_Summary::where('current_status',1)->get(),
                'users' => $users,
                 'customerRole' => User::role('Customer')->get(),
                'yearReport' => Order_Summary::whereYear('created_at',date('Y'))->get(),
                'monthReport' => Order_Summary::whereMonth('created_at',date('m'))->get(),
                // Year Report Start
                'janMonthTotalReport' => Order_Summary::whereYear('created_at',date('Y'))->whereMonth('created_at',01)->get(),
                'febMonthTotalReport' => Order_Summary::whereYear('created_at',date('Y'))->whereMonth('created_at',02)->get(),
                'marMonthTotalReport' => Order_Summary::whereYear('created_at',date('Y'))->whereMonth('created_at',03)->get(),
                'aprMonthTotalReport' => Order_Summary::whereYear('created_at',date('Y'))->whereMonth('created_at',04)->get(),
                'mayMonthTotalReport' => Order_Summary::whereYear('created_at',date('Y'))->whereMonth('created_at',05)->get(),
                'junMonthTotalReport' => Order_Summary::whereYear('created_at',date('Y'))->whereMonth('created_at',06)->get(),
                'julMonthTotalReport' => Order_Summary::whereYear('created_at',date('Y'))->whereMonth('created_at',07)->get(),
                'augMonthTotalReport' => Order_Summary::whereYear('created_at',date('Y'))->whereMonth('created_at',8)->get(),
                'sepMonthTotalReport' => Order_Summary::whereYear('created_at',date('Y'))->whereMonth('created_at',9)->get(),
                'octMonthTotalReport' => Order_Summary::whereYear('created_at',date('Y'))->whereMonth('created_at',10)->get(),
                'novMonthTotalReport' => Order_Summary::whereYear('created_at',date('Y'))->whereMonth('created_at',11)->get(),
                'decMonthTotalReport' => Order_Summary::whereYear('created_at',date('Y'))->whereMonth('created_at',12)->get(),
                // Year Report End
                'day1Report' => Order_Summary::whereYear('created_at',date('Y'))->whereMonth('created_at',date('m'))->whereDay('created_at',1)->get(),
                'day2Report' => Order_Summary::whereYear('created_at',date('Y'))->whereMonth('created_at',date('m'))->whereDay('created_at',2)->get(),
                'day3Report' => Order_Summary::whereYear('created_at',date('Y'))->whereMonth('created_at',date('m'))->whereDay('created_at',3)->get(),
                'day4Report' => Order_Summary::whereYear('created_at',date('Y'))->whereMonth('created_at',date('m'))->whereDay('created_at',4)->get(),
                'day5Report' => Order_Summary::whereYear('created_at',date('Y'))->whereMonth('created_at',date('m'))->whereDay('created_at',5)->get(),
                'day6Report' => Order_Summary::whereYear('created_at',date('Y'))->whereMonth('created_at',date('m'))->whereDay('created_at',6)->get(),
                'day7Report' => Order_Summary::whereYear('created_at',date('Y'))->whereMonth('created_at',date('m'))->whereDay('created_at',7)->get(),
                'day8Report' => Order_Summary::whereYear('created_at',date('Y'))->whereMonth('created_at',date('m'))->whereDay('created_at',8)->get(),
                'day9Report' => Order_Summary::whereYear('created_at',date('Y'))->whereMonth('created_at',date('m'))->whereDay('created_at',9)->get(),
                'day10Report' => Order_Summary::whereYear('created_at',date('Y'))->whereMonth('created_at',date('m'))->whereDay('created_at',10)->get(),
                'day11Report' => Order_Summary::whereYear('created_at',date('Y'))->whereMonth('created_at',date('m'))->whereDay('created_at',11)->get(),
                'day12Report' => Order_Summary::whereYear('created_at',date('Y'))->whereMonth('created_at',date('m'))->whereDay('created_at',12)->get(),
                'day13Report' => Order_Summary::whereYear('created_at',date('Y'))->whereMonth('created_at',date('m'))->whereDay('created_at',13)->get(),
                'day14Report' => Order_Summary::whereYear('created_at',date('Y'))->whereMonth('created_at',date('m'))->whereDay('created_at',14)->get(),
                'day15Report' => Order_Summary::whereYear('created_at',date('Y'))->whereMonth('created_at',date('m'))->whereDay('created_at',15)->get(),
                'day16Report' => Order_Summary::whereYear('created_at',date('Y'))->whereMonth('created_at',date('m'))->whereDay('created_at',16)->get(),
                'day17Report' => Order_Summary::whereYear('created_at',date('Y'))->whereMonth('created_at',date('m'))->whereDay('created_at',17)->get(),
                'day18Report' => Order_Summary::whereYear('created_at',date('Y'))->whereMonth('created_at',date('m'))->whereDay('created_at',18)->get(),
                'day19Report' => Order_Summary::whereYear('created_at',date('Y'))->whereMonth('created_at',date('m'))->whereDay('created_at',19)->get(),
                'day20Report' => Order_Summary::whereYear('created_at',date('Y'))->whereMonth('created_at',date('m'))->whereDay('created_at',20)->get(),
                'day21Report' => Order_Summary::whereYear('created_at',date('Y'))->whereMonth('created_at',date('m'))->whereDay('created_at',21)->get(),
                'day22Report' => Order_Summary::whereYear('created_at',date('Y'))->whereMonth('created_at',date('m'))->whereDay('created_at',22)->get(),
                'day23Report' => Order_Summary::whereYear('created_at',date('Y'))->whereMonth('created_at',date('m'))->whereDay('created_at',23)->get(),
                'day24Report' => Order_Summary::whereYear('created_at',date('Y'))->whereMonth('created_at',date('m'))->whereDay('created_at',24)->get(),
                'day25Report' => Order_Summary::whereYear('created_at',date('Y'))->whereMonth('created_at',date('m'))->whereDay('created_at',25)->get(),
                'day26Report' => Order_Summary::whereYear('created_at',date('Y'))->whereMonth('created_at',date('m'))->whereDay('created_at',26)->get(),
                'day27Report' => Order_Summary::whereYear('created_at',date('Y'))->whereMonth('created_at',date('m'))->whereDay('created_at',27)->get(),
                'day28Report' => Order_Summary::whereYear('created_at',date('Y'))->whereMonth('created_at',date('m'))->whereDay('created_at',28)->get(),
                'day29Report' => Order_Summary::whereYear('created_at',date('Y'))->whereMonth('created_at',date('m'))->whereDay('created_at',29)->get(),
                'day30Report' => Order_Summary::whereYear('created_at',date('Y'))->whereMonth('created_at',date('m'))->whereDay('created_at',30)->get(),
                'day31Report' => Order_Summary::whereYear('created_at',date('Y'))->whereMonth('created_at',date('m'))->whereDay('created_at',31)->get(),
                // Unique Visitors
                'uniqueVisitors' =>UniqueVisitors::get(),

                // 'monthlyReport' => date('Y-m-d'),
            ]);
        }else{
            return redirect()->route('frontend');
        }
    }
    function getColorSizeId($cid,$pid){
        $sizes = Product_Attribute::where('product_id',$pid)->where('color_id',$cid)->get();
        $outpot = '';
        foreach ($sizes as $key => $size) {
            $outpot =  $outpot.'<label class="btn btn-default text-center"><input class="sizeCheck" data-ofrPrice="'.$size->offer_price.'" data-rprice="'.$size->regular_price.'" type="radio" name="color_option" id="color_option_b1" autocomplete="off"><span class="text-xl">'.$size->size_id.'</span><br></label>';
            // $outpot = $size->size_id;
        }
        // rPrice

        return response()->json($outpot);
    }
}
