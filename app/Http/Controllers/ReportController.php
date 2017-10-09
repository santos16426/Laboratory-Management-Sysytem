<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use DateTime;
class ReportController extends Controller
{
    public function __construct()
    {
        date_default_timezone_set('Singapore');
    }
    function corporatereports()
    {
        return view('Reports.CorporateReports');
    }
    function transactionreport()
    {
    	return view('Reports.TransactionReport');
    }
    function dailyCorporateReport(Request $req)
    {
        $day = $req->start_date;
        $date = explode('-',$day);
        $startdate = $date[2] ."-".$date[0]."-".$date[1]." 00:00:00";
        $var = DB::table('corporate_accounts_tbl')
                ->leftjoin('transcorp_tbl','transcorp_tbl.corp_id','=','corporate_accounts_tbl.corp_id')
                ->leftjoin('transaction_tbl','transaction_tbl.trans_id','=','transcorp_tbl.trans_id')
                ->select(DB::raw('COUNT(*) as row_count'),'corp_name')
                ->groupBy('corp_name')
                ->whereDate('trans_date',$startdate)
                ->get();
        $corporate = DB::table('corporate_accounts_tbl')
                ->leftjoin('transcorp_tbl','transcorp_tbl.corp_id','=','corporate_accounts_tbl.corp_id')
                ->leftjoin('transaction_tbl','transaction_tbl.trans_id','=','transcorp_tbl.trans_id')
                ->whereDate('trans_date',$startdate)
                ->count();

        return response()->json([$var,$corporate]);
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
        $totaltransaction  = DB::table('transaction_tbl')
            ->leftjoin('transcorp_tbl','transcorp_tbl.trans_id','=','transaction_tbl.trans_id')
            ->select('transaction_tbl.trans_id','trans_total','charge','trans_date')
            ->whereDate('trans_date',$startdate)->count();

        $corporate = DB::table('transaction_tbl')
            ->leftjoin('patient_tbl','patient_tbl.patient_id','=','trans_patient_id')
            ->leftjoin('transcorp_tbl','transcorp_tbl.trans_id','=','transaction_tbl.trans_id')
            ->select('transaction_tbl.trans_id','trans_total','charge','trans_date')
            ->where('patient_type_id',2)
            ->whereDate('trans_date',$startdate)->count();
        $individual = DB::table('transaction_tbl')
            ->leftjoin('patient_tbl','patient_tbl.patient_id','=','trans_patient_id')
            ->leftjoin('transcorp_tbl','transcorp_tbl.trans_id','=','transaction_tbl.trans_id')
            ->select('transaction_tbl.trans_id','trans_total','charge','trans_date')
            ->where('patient_type_id',1)
            ->whereDate('trans_date',$startdate)->count();
        
        $corporate = ((($totaltransaction-$corporate) / $totaltransaction)*100);
        $individual= ((($totaltransaction-$individual) / $totaltransaction)*100);
    	return response()->json([$total,$var,$corporate,$individual]);
    }
    function weeklyTransactionReport(Request $req)
    {
    	$startdate = $req->startdate;
        $secdate = $req->secdate;
        $thirddate = $req->thirddate;
        $fourthdate = $req->fourthdate;
        $fifthdate = $req->fifthdate;
        $sixdate = $req->sixdate;
    	$enddate = $req->enddate;
    	$var = DB::select(DB::raw('SELECT t.trans_id, t.trans_date,t.trans_total,tc.charge FROM transaction_tbl t LEFT OUTER JOIN transcorp_tbl tc on tc.trans_id = t.trans_id WHERE trans_date >= "'.$startdate.'" AND trans_date <= "'.$enddate.'"'));
        $transtotal = DB::select(DB::raw('SELECT t.trans_id, t.trans_date,t.trans_total,tc.charge FROM transaction_tbl t LEFT OUTER JOIN transcorp_tbl tc on tc.trans_id = t.trans_id LEFT OUTER JOIN patient_tbl p ON p.patient_id = t.trans_patient_id WHERE trans_date >= "'.$startdate.'" AND trans_date <= "'.$enddate.'"'));
        $corporate = DB::select(DB::raw('SELECT t.trans_id, t.trans_date,t.trans_total,tc.charge FROM transaction_tbl t LEFT OUTER JOIN transcorp_tbl tc on tc.trans_id = t.trans_id LEFT OUTER JOIN patient_tbl p ON p.patient_id = t.trans_patient_id WHERE patient_type_id = 2 and trans_date >= "'.$startdate.'" AND trans_date <= "'.$enddate.'"'));
        $individual = DB::select(DB::raw('SELECT t.trans_id, t.trans_date,t.trans_total,tc.charge FROM transaction_tbl t LEFT OUTER JOIN transcorp_tbl tc on tc.trans_id = t.trans_id LEFT OUTER JOIN patient_tbl p ON p.patient_id = t.trans_patient_id WHERE patient_type_id = 1 and trans_date >= "'.$startdate.'" AND trans_date <= "'.$enddate.'"'));
        $individual = count($individual);
        $corporate = count($corporate);
        $totaltransaction = count($transtotal);
        $corporate = ((($totaltransaction-$corporate) / $totaltransaction)*100);
        $individual= ((($totaltransaction-$individual) / $totaltransaction)*100);
        $firsttotal = DB::table('transaction_tbl')
            ->leftjoin('transcorp_tbl','transcorp_tbl.trans_id','=','transaction_tbl.trans_id')
            ->select(DB::raw('SUM(charge) as charge'),DB::raw('SUM(trans_total)as total'))  
            ->whereDate('trans_date',$startdate)->get();
        
        $secondtotal  = DB::table('transaction_tbl')
            ->leftjoin('transcorp_tbl','transcorp_tbl.trans_id','=','transaction_tbl.trans_id')
            ->select(DB::raw('SUM(charge) as charge'),DB::raw('SUM(trans_total)as total'))  
            ->whereDate('trans_date',$secdate)->get();  

        $thirdtotal  = DB::table('transaction_tbl')
            ->leftjoin('transcorp_tbl','transcorp_tbl.trans_id','=','transaction_tbl.trans_id')
            ->select(DB::raw('SUM(charge) as charge'),DB::raw('SUM(trans_total)as total'))  
            ->whereDate('trans_date',$thirddate)->get(); 

        $fourthtotal  = DB::table('transaction_tbl')
            ->leftjoin('transcorp_tbl','transcorp_tbl.trans_id','=','transaction_tbl.trans_id')
            ->select(DB::raw('SUM(charge) as charge'),DB::raw('SUM(trans_total)as total'))  
            ->whereDate('trans_date',$fourthdate)->get(); 

        $fifthtotal  = DB::table('transaction_tbl')
            ->leftjoin('transcorp_tbl','transcorp_tbl.trans_id','=','transaction_tbl.trans_id')
            ->select(DB::raw('SUM(charge) as charge'),DB::raw('SUM(trans_total)as total'))  
            ->whereDate('trans_date',$fifthdate)->get(); 

        $sixtotal  = DB::table('transaction_tbl')
            ->leftjoin('transcorp_tbl','transcorp_tbl.trans_id','=','transaction_tbl.trans_id')
            ->select(DB::raw('SUM(charge) as charge'),DB::raw('SUM(trans_total)as total'))  
            ->whereDate('trans_date',$sixdate)->get(); 

        $seventotal  = DB::table('transaction_tbl')
            ->leftjoin('transcorp_tbl','transcorp_tbl.trans_id','=','transaction_tbl.trans_id')
            ->select(DB::raw('SUM(charge) as charge'),DB::raw('SUM(trans_total)as total'))  
            ->whereDate('trans_date',$enddate)->get(); 
               
    	return response()->json([$var,$firsttotal,$secondtotal,$thirdtotal,$fourthtotal,$fifthtotal,$sixtotal,$seventotal,$totaltransaction,$corporate,$individual]);	
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
        $totaltransaction = DB::table('transaction_tbl')
            ->leftjoin('patient_tbl','patient_id','=','trans_patient_id')
            ->leftjoin('transcorp_tbl','transcorp_tbl.trans_id','=','transaction_tbl.trans_id')
            ->select('transaction_tbl.trans_id','trans_total','charge','trans_date')
            ->whereMonth('trans_date',$req->month)
            ->whereYear('trans_date',$req->year)
            ->count();
        $corporate = DB::table('transaction_tbl')
            ->leftjoin('patient_tbl','patient_id','=','trans_patient_id')
            ->leftjoin('transcorp_tbl','transcorp_tbl.trans_id','=','transaction_tbl.trans_id')
            ->select('transaction_tbl.trans_id','trans_total','charge','trans_date')
            ->where('patient_type_id',2)
            ->whereMonth('trans_date',$req->month)
            ->whereYear('trans_date',$req->year)
            ->count();
        $individual = DB::table('transaction_tbl')
            ->leftjoin('patient_tbl','patient_id','=','trans_patient_id')
            ->leftjoin('transcorp_tbl','transcorp_tbl.trans_id','=','transaction_tbl.trans_id')
            ->select('transaction_tbl.trans_id','trans_total','charge','trans_date')
            ->where('patient_type_id',1)
            ->whereMonth('trans_date',$req->month)
            ->whereYear('trans_date',$req->year)
            ->count();
        $transperday = DB::table('transaction_tbl')
            ->leftjoin('transcorp_tbl','transcorp_tbl.trans_id','=','transaction_tbl.trans_id')
            ->select('trans_total','charge','trans_date')
            ->whereMonth('trans_date',$req->month)
            ->whereYear('trans_date',$req->year)
            ->groupBy('trans_date','charge','trans_total')
            ->get();
        
        $corporate = ((($totaltransaction-$corporate) / $totaltransaction)*100);
        $individual= ((($totaltransaction-$individual) / $totaltransaction)*100);
        return response()->json([$var,$totaltransaction,$corporate,$individual,$transperday]);
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
