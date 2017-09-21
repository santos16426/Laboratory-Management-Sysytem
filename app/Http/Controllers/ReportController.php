<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class ReportController extends Controller
{
    function transactionreport()
    {
    	return view('Reports.TransactionReport');
    }
    function dailyTransactionReport(Request $req)
    {
    	$var = DB::table('')
    	return response()->json($var);
    }
}
