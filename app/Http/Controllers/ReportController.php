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
    	$day = $req->start_date;
    	$date = explode('-',$day);
    	$startdate = $date[2] ."-".$date[0]."-".$date[1]." 00:00:00";
    	$var = DB::table('transaction_tbl')
    		->leftjoin('transcorp_tbl','transcorp_tbl.trans_id','=','transaction_tbl.trans_id')
    		->whereDate('trans_date',$startdate)->get();
    	
    	return response()->json($var);
    }
    function weeklyTransactionReport(Request $req)
    {
    	$startdate = $req->startdate;
    	$enddate = $req->enddate;
    	$var = DB::select(DB::raw('SELECT t.trans_id, t.trans_date,t.trans_total,tc.charge FROM transaction_tbl t LEFT OUTER JOIN transcorp_tbl tc on tc.trans_id = t.trans_id WHERE trans_date >= "'.$startdate.'" AND trans_date <= "'.$enddate.'"'));
    	return response()->json($var);	
    }
}
