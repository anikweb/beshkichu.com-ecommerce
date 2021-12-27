<?php

namespace App\Http\Controllers;

use App\Exports\MonthlySelesReport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ReportController extends Controller
{
    public function monthlySelesExport(){
        return Excel::download(new MonthlySelesReport(),'MonthlyReport.xlsx');
    }
}
