<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use DateTime;
class ReportController extends Controller
{
    function corporatereports()
    {
        return view('Reports.CorporateReports');
    }
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
            ->select('transaction_tbl.trans_id','trans_total','charge','trans_date')
    		->whereDate('trans_date',$startdate)->get();

    	$total = DB::table('transaction_tbl')
            ->leftjoin('transcorp_tbl','transcorp_tbl.trans_id','=','transaction_tbl.trans_id')
            ->select(DB::raw('SUM(charge) as charge'),DB::raw('SUM(trans_total)as total'))  
            ->whereDate('trans_date',$startdate)->get();
    	return response()->json([$total,$var]);
    }
    function weeklyTransactionReport(Request $req)
    {
    	$startdate = $req->startdate;
    	$enddate = $req->enddate;
    	$var = DB::select(DB::raw('SELECT t.trans_id, t.trans_date,t.trans_total,tc.charge FROM transaction_tbl t LEFT OUTER JOIN transcorp_tbl tc on tc.trans_id = t.trans_id WHERE trans_date >= "'.$startdate.'" AND trans_date <= "'.$enddate.'"'));
    	return response()->json($var);	
    }
    function allTransactionReport()
    {
    	$var = DB::table('transaction_tbl')
    		->leftjoin('transcorp_tbl','transcorp_tbl.trans_id','=','transaction_tbl.trans_id')
    		->select('transaction_tbl.trans_id','trans_total','charge','trans_date')
    		->get();
		return response()->json($var);
    }
    function monthlyTransactionReport(Request $req)
    {
        $var = DB::table('transaction_tbl')
            ->leftjoin('transcorp_tbl','transcorp_tbl.trans_id','=','transaction_tbl.trans_id')
            ->select('transaction_tbl.trans_id','trans_total','charge','trans_date')
            ->whereMonth('trans_date',$req->month)
            ->whereYear('trans_date',$req->year)
            ->get();
        return response()->json($var);
    }
    function yearlyTransactionReport(Request $req)
    {
        $var = DB::table('transaction_tbl')
            ->leftjoin('transcorp_tbl','transcorp_tbl.trans_id','=','transaction_tbl.trans_id')
            ->select('transaction_tbl.trans_id','trans_total','charge','trans_date')
            ->whereYear('trans_date',$req->year)
            ->get();
        return response()->json($var);
    }
    function rangeTransactionReport(Request $req)
    {
        $startdate = $req->startdate;
        $enddate = $req->enddate;
        $var = DB::select(DB::raw('SELECT t.trans_id, t.trans_date,t.trans_total,tc.charge FROM transaction_tbl t LEFT OUTER JOIN transcorp_tbl tc on tc.trans_id = t.trans_id WHERE trans_date >= "'.$startdate.'" AND trans_date <= "'.$enddate.'"'));
        return response()->json($var);  
    }
}
