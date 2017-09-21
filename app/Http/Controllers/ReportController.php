<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use DateTime;
class ReportController extends Controller
{
    function transactionreport()
    {
    	return view('Reports.TransactionReport');
    }
    function dailyTransactionReport(Request $req)
    {
    	echo $day = $req->start_date;
    	$date = strtotime($day);
    	echo "           ";
    	echo $newformat = date('Y-m-d',$date);
    	//$var = DB::table('transaction_tbl')->whereDate('trans_date',$date)->get();
    	//dd($var);
    	return response()->json();
    }
}
