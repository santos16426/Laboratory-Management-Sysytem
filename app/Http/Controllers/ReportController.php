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
    function rebatereports()
    {
        return view('Reports.RebateReports');
    }
    function censusreports()
    {
        return view('Reports.CensusReports');
    }
    function allCensusReports(Request $req)
    {
        $services = DB::table('trans_result_service_tbl')
                    ->leftjoin('transresult_tbl','transresult_tbl.result_id','=','trans_result_service_tbl.result_id')
                    ->leftjoin('service_tbl','service_tbl.service_id','=','trans_result_service_tbl.service_id')
                    ->select('servgroup_name','service_tbl.service_name',DB::raw('COUNT(*) as row_count'))
                    ->groupBy('service_tbl.service_name','servgroup_name')
                    ->where('corppack_id',null)
                    ->get();
        return response()->json([$services]);
    }
    function yearlyCensusReport(Request $req)
    {
        $year = $req->sy;
        $services = DB::table('trans_result_service_tbl')
                    ->leftjoin('transresult_tbl','transresult_tbl.result_id','=','trans_result_service_tbl.result_id')
                    ->leftjoin('service_tbl','service_tbl.service_id','=','trans_result_service_tbl.service_id')
                    ->select('servgroup_name','service_tbl.service_name',DB::raw('COUNT(*) as row_count'))
                    ->groupBy('service_tbl.service_name','servgroup_name')
                    ->where('corppack_id',null)
                    ->whereYear('transresult_tbl.date',$req->year)
                    ->get();
        return response()->json([$services]);
    }
    function monthlyCensusReport(Request $req)
    {
        $month = $req->smm;
        $year = $req->sy;
        $services = DB::table('trans_result_service_tbl')
                    ->leftjoin('transresult_tbl','transresult_tbl.result_id','=','trans_result_service_tbl.result_id')
                    ->leftjoin('service_tbl','service_tbl.service_id','=','trans_result_service_tbl.service_id')
                    ->select('servgroup_name','service_tbl.service_name',DB::raw('COUNT(*) as row_count'))
                    ->groupBy('service_tbl.service_name','servgroup_name')
                    ->where('corppack_id',null)
                    ->whereMonth('transresult_tbl.date',$req->month)
                    ->whereYear('transresult_tbl.date',$req->year)
                    ->get();
        return response()->json([$services]);
    }
    function weeklyCensusReports(Request $req)
    {
        $startdate = $req->startdate;
        $enddate = $req->enddate;
        $services = DB::select('SELECT servgroup_name,service_tbl.service_name, COUNT(*) as row_count FROM trans_result_service_tbl LEFT OUTER JOIN transresult_tbl ON transresult_tbl.result_id = trans_result_service_tbl.result_id LEFT OUTER JOIN service_tbl ON service_tbl.service_id = trans_result_service_tbl.service_id WHERE corppack_id is null AND transresult_tbl.date >= "'.$startdate.'" AND transresult_tbl.date <= "'.$enddate.'" Group by service_tbl.service_name');
        return response()->json([$services]);
    }
    function dailyCensusReport(Request $req)
    {
        $day = $req->start_date;
        $date = explode('-',$day);
        $startdate = $date[2] ."-".$date[0]."-".$date[1]." 00:00:00";
        $services = DB::table('trans_result_service_tbl')
                        ->leftjoin('transresult_tbl','transresult_tbl.result_id','=','trans_result_service_tbl.result_id')
                        ->leftjoin('service_tbl','service_tbl.service_id','=','trans_result_service_tbl.service_id')
                        ->leftjoin('service_group_tbl','servgroup_id','=','service_tbl.service_group_id')
                        ->select('servgroup_name','service_tbl.service_name',DB::raw('COUNT(*) as row_count'))
                        ->groupBy('service_tbl.service_name','servgroup_name')
                        ->where('corppack_id',null)
                        ->whereDate('transresult_tbl.date',$startdate)
                        ->get();
        return response()->json([$services]);
    }
    function corporatereports()
    {
        return view('Reports.CorporateReports');
    }
    function transactionreport()
    {
    	return view('Reports.TransactionReport');
    }
    function dailyRebateReport(Request $req)
    {
        $day = $req->start_date;
        $date = explode('-',$day);
        $startdate = $date[2] ."-".$date[0]."-".$date[1]." 00:00:00";
        $var = DB::table('employee_tbl')
                ->join('trans_emprebate_tbl','trans_emprebate_tbl.emp_id','=','employee_tbl.emp_id')
                ->join('transaction_tbl','transaction_tbl.trans_id','=','trans_emprebate_tbl.trans_id')
                ->join('rebate_tbl','rebate_tbl.rebate_id','=','trans_emprebate_tbl.rebate_id')
                ->join('transcorp_tbl','transcorp_tbl.trans_id','=','transaction_tbl.trans_id')
                ->select(DB::raw('employee_tbl.emp_id ,CONCAT(emp_fname," ",emp_mname," ",emp_lname) as name,((trans_total + IFNULL(charge,0)-home_service)*(percentage/100)) as percentage'))
                ->where('transaction_tbl.trans_id','!=',null)
                ->whereDate('trans_date',$startdate)
                ->groupBy('employee_tbl.emp_id','percentage','emp_fname','emp_mname','emp_lname','trans_total','charge','home_service')
                ->get();
        
        return response()->json([$var]);
    }
    function weeklyRebateReport(Request $req)
    {
        $var = DB::table('employee_tbl')
                ->leftjoin('trans_emprebate_tbl','trans_emprebate_tbl.emp_id','=','employee_tbl.emp_id')
                ->leftjoin('transaction_tbl','transaction_tbl.trans_id','=','trans_emprebate_tbl.trans_id')
                ->leftjoin('rebate_tbl','rebate_tbl.rebate_id','=','trans_emprebate_tbl.rebate_id')
                ->leftjoin('transcorp_tbl','transcorp_tbl.trans_id','=','transaction_tbl.trans_id')
                ->select(DB::raw('employee_tbl.emp_id ,CONCAT(emp_fname," ",emp_mname," ",emp_lname) as name,((trans_total + IFNULL(charge,0))*(percentage/100)) as percentage'))
                ->where('transaction_tbl.trans_id','!=',null)
                ->whereDate('trans_date',$startdate)
                ->get();
        return response()->json([$var]);
    }
    function monthlyRebateReport(Request $req)
    {
        $year = $req->year;
        $month = $req->month;
        $var = DB::table('employee_tbl')
                ->leftjoin('trans_emprebate_tbl','trans_emprebate_tbl.emp_id','=','employee_tbl.emp_id')
                ->leftjoin('transaction_tbl','transaction_tbl.trans_id','=','trans_emprebate_tbl.trans_id')
                ->leftjoin('rebate_tbl','rebate_tbl.rebate_id','=','trans_emprebate_tbl.rebate_id')
                ->leftjoin('transcorp_tbl','transcorp_tbl.trans_id','=','transaction_tbl.trans_id')
                ->select(DB::raw('employee_tbl.emp_id ,CONCAT(emp_fname," ",emp_mname," ",emp_lname) as name,((trans_total + IFNULL(charge,0))*(percentage/100)) as percentage'))
                ->where('transaction_tbl.trans_id','!=',null)
                ->whereMonth('trans_date',$month)
                ->whereYear('trans_date',$year)
                ->get();
        return response()->json([$var]);
    }
    function yearlyRebateReport(Request $req)
    {
        $year = $req->year;
        $var = DB::table('employee_tbl')
                ->leftjoin('trans_emprebate_tbl','trans_emprebate_tbl.emp_id','=','employee_tbl.emp_id')
                ->leftjoin('transaction_tbl','transaction_tbl.trans_id','=','trans_emprebate_tbl.trans_id')
                ->leftjoin('rebate_tbl','rebate_tbl.rebate_id','=','trans_emprebate_tbl.rebate_id')
                ->leftjoin('transcorp_tbl','transcorp_tbl.trans_id','=','transaction_tbl.trans_id')
                ->select(DB::raw('employee_tbl.emp_id ,CONCAT(emp_fname," ",emp_mname," ",emp_lname) as name,((trans_total + IFNULL(charge,0))*(percentage/100)) as percentage'))
                ->where('transaction_tbl.trans_id','!=',null)
                ->whereYear('trans_date',$year)
                ->get();
        return response()->json([$var]);
    }
    function weeklyCorporateReport(Request $req)
    {
        $startdate = $req->startdate;
        $enddate = $req->enddate;
        $secdate = $req->secdate;
        $thirddate = $req->thirddate;
        $fourthdate = $req->fourthdate;
        $fifthdate = $req->fifthdate;
        $sixdate = $req->sixdate;
        $var = DB::table('corporate_accounts_tbl')
                ->leftjoin('transcorp_tbl','transcorp_tbl.corp_id','=','corporate_accounts_tbl.corp_id')
                ->leftjoin('transaction_tbl','transaction_tbl.trans_id','=','transcorp_tbl.trans_id')
                ->select(DB::raw('COUNT(*) as row_count,SUM(charge) as charge'),'corp_name')
                ->groupBy('corp_name')
                ->where('trans_date','>=',$startdate)
                ->where('trans_date','<=',$enddate)
                ->where('charge','!=',0)
                ->get();
    
        return response()->json([$var,]);
    }
    function monthlyCorporateReport(Request $req)
    {
        $year = $req->year;
        $month = $req->month;
        $var = DB::table('corporate_accounts_tbl')
                ->leftjoin('transcorp_tbl','transcorp_tbl.corp_id','=','corporate_accounts_tbl.corp_id')
                ->leftjoin('transaction_tbl','transaction_tbl.trans_id','=','transcorp_tbl.trans_id')
                ->select(DB::raw('COUNT(*) as row_count,SUM(charge) as charge'),'corp_name')
                ->groupBy('corp_name')
                ->whereMonth('trans_date',$month)
                ->whereYear('trans_date',$year)
                ->where('charge','!=',0)
                ->get();
        
        return response()->json([$var,]);
    }
    function yearlyCorporateReport(Request $req)
    {
        $month = $req->month;
        $year = $req->year;
        $var = DB::table('corporate_accounts_tbl')
                ->leftjoin('transcorp_tbl','transcorp_tbl.corp_id','=','corporate_accounts_tbl.corp_id')
                ->leftjoin('transaction_tbl','transaction_tbl.trans_id','=','transcorp_tbl.trans_id')
                ->select(DB::raw('COUNT(*) as row_count,SUM(charge) as charge'),'corp_name')
                ->groupBy('corp_name')
                ->whereYear('trans_date',$year)
                ->where('charge','!=',0)
                ->get();
        
        return response()->json([$var,]);
    }
    function dailyCorporateReport(Request $req)
    {
        $day = $req->start_date;
        $date = explode('-',$day);
        $startdate = $date[2] ."-".$date[0]."-".$date[1]." 00:00:00";
        $var = DB::table('corporate_accounts_tbl')
                ->leftjoin('transcorp_tbl','transcorp_tbl.corp_id','=','corporate_accounts_tbl.corp_id')
                ->leftjoin('transaction_tbl','transaction_tbl.trans_id','=','transcorp_tbl.trans_id')
                ->select(DB::raw('COUNT(*) as row_count,SUM(charge) as charge'),'corp_name')
                ->groupBy('corp_name')
                ->whereDate('trans_date',$startdate)
                ->where('charge','!=',0)
                ->get();
        return response()->json([$var,]);
    }

    function dailyTransactionReport(Request $req)
    {
    	$day = $req->start_date;
    	$date = explode('-',$day);
    	$startdate = $date[2] ."-".$date[0]."-".$date[1]." 00:00:00";
    	$var = DB::table('transaction_tbl')
    		->leftjoin('transcorp_tbl','transcorp_tbl.trans_id','=','transaction_tbl.trans_id')
            ->leftjoin('patient_tbl','patient_id','=','trans_patient_id')
            ->select('transaction_tbl.trans_id','trans_total','charge','trans_date',DB::raw('CONCAT(patient_fname," ",patient_mname," ",patient_lname)as name'))
    		->whereDate('trans_date',$startdate)
            ->orderBy('transaction_tbl.trans_date','desc')
            ->get();

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
        
        $corporate = ((($corporate) / $totaltransaction)*100);
        $individual= ((($individual) / $totaltransaction)*100);
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
        $lastdate = $req->lastdate;
    	
        $var = DB::table('transaction_tbl')
            ->leftjoin('transcorp_tbl','transcorp_tbl.trans_id','=','transaction_tbl.trans_id')
            ->leftjoin('patient_tbl','patient_id','=','trans_patient_id')
            ->select('transaction_tbl.trans_id','trans_total','charge','trans_date',DB::raw('CONCAT(patient_fname," ",patient_mname," ",patient_lname)as name'))
            ->where('trans_date','>=',$startdate)
            ->where('trans_date','<=',$lastdate)
            ->orderBy('transaction_tbl.trans_date','desc')
            ->get();
        $transtotal = DB::table('transaction_tbl')
                        ->leftjoin('transcorp_tbl','transcorp_tbl.trans_id','=','transaction_tbl.trans_id')
                        ->leftjoin('patient_tbl','patient_id','=','trans_patient_id')
                        ->select('transaction_tbl.trans_id','transaction_tbl.trans_date','trans_total','charge','patient_type_id')
                        ->where('trans_date','>=',$startdate)
                        ->where('trans_date','<=',$lastdate)
                        ->get();
        $corporate = DB::table('transaction_tbl')
                        ->leftjoin('transcorp_tbl','transcorp_tbl.trans_id','=','transaction_tbl.trans_id')
                        ->leftjoin('patient_tbl','patient_id','=','trans_patient_id')
                        ->select('transaction_tbl.trans_id','transaction_tbl.trans_date','trans_total','charge')
                        ->where('trans_date','>=',$startdate)
                        ->where('trans_date','<=',$lastdate)
                        ->where('patient_type_id',2)
                        ->get();
        $individual =DB::table('transaction_tbl')
                        ->leftjoin('transcorp_tbl','transcorp_tbl.trans_id','=','transaction_tbl.trans_id')
                        ->leftjoin('patient_tbl','patient_id','=','trans_patient_id')
                        ->select('transaction_tbl.trans_id','transaction_tbl.trans_date','trans_total','charge')
                        ->where('trans_date','>=',$startdate)
                        ->where('trans_date','<=',$lastdate)
                        ->where('patient_type_id',1)
                        ->get();
        $individual = count($individual);
        $corporate = count($corporate);
        $totaltransaction = count($transtotal);
        $corporate = (($corporate / $totaltransaction)*100);
        $individual= (($individual / $totaltransaction)*100);
        
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

    function monthlyTransactionReport(Request $req)
    {
        $var = DB::table('transaction_tbl')
            ->leftjoin('transcorp_tbl','transcorp_tbl.trans_id','=','transaction_tbl.trans_id')
            ->leftjoin('patient_tbl','patient_id','=','trans_patient_id')
            ->select('transaction_tbl.trans_id','trans_total','charge','trans_date',DB::raw('CONCAT(patient_fname," ",patient_mname," ",patient_lname)as name'))
            ->whereMonth('trans_date',$req->month)
            ->whereYear('trans_date',$req->year)
            ->orderBy('transaction_tbl.trans_date','desc')
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
        $startdate = $req->startdate;
        $firstweek = $req->firstweek;
        $secondweek = $req->secondweek;
        $thirdweek = $req->thirdweek;
        $fourthweek = $req->fourthweek;

        $firstweektotal = DB::select(DB::raw('SELECT t.trans_id, t.trans_date,t.trans_total,tc.charge FROM transaction_tbl t LEFT OUTER JOIN transcorp_tbl tc on tc.trans_id = t.trans_id WHERE trans_date >= "'.$startdate.'" AND trans_date <= "'.$firstweek.'"'));
        $secondweektotal = DB::select(DB::raw('SELECT t.trans_id, t.trans_date,t.trans_total,tc.charge FROM transaction_tbl t LEFT OUTER JOIN transcorp_tbl tc on tc.trans_id = t.trans_id WHERE trans_date >= "'.$startdate.'" AND trans_date <= "'.$secondweek.'"'));
        $thirdweektotal = DB::select(DB::raw('SELECT t.trans_id, t.trans_date,t.trans_total,tc.charge FROM transaction_tbl t LEFT OUTER JOIN transcorp_tbl tc on tc.trans_id = t.trans_id WHERE trans_date >= "'.$startdate.'" AND trans_date <= "'.$thirdweek.'"'));

        $fourthweektotal = DB::select(DB::raw('SELECT t.trans_id, t.trans_date,t.trans_total,tc.charge FROM transaction_tbl t LEFT OUTER JOIN transcorp_tbl tc on tc.trans_id = t.trans_id WHERE trans_date >= "'.$startdate.'" AND trans_date <= "'.$fourthweek.'"'));

        $corporate = ((($corporate) / $totaltransaction)*100);
        $individual= ((($individual) / $totaltransaction)*100);
        return response()->json([$var,$totaltransaction,$corporate,$individual,$transperday,$firstweektotal,$secondweektotal,$thirdweektotal,$fourthweektotal]);
    }
    function yearlyTransactionReport(Request $req)
    {
        $var = DB::table('transaction_tbl')
            ->leftjoin('transcorp_tbl','transcorp_tbl.trans_id','=','transaction_tbl.trans_id')
            ->leftjoin('patient_tbl','patient_id','=','trans_patient_id')
            ->select('transaction_tbl.trans_id','trans_total','charge','trans_date',DB::raw('CONCAT(patient_fname," ",patient_mname," ",patient_lname)as name'))
            ->whereYear('trans_date',$req->year)
            ->orderBy('transaction_tbl.trans_date','desc')
            ->get();
        $jan = DB::table('transaction_tbl')
            ->leftjoin('transcorp_tbl','transcorp_tbl.trans_id','=','transaction_tbl.trans_id')
            ->select('transaction_tbl.trans_id','trans_total','charge','trans_date')
            ->whereYear('trans_date',$req->year)
            ->whereMonth('trans_date',1)
            ->get();
        $feb = DB::table('transaction_tbl')
            ->leftjoin('transcorp_tbl','transcorp_tbl.trans_id','=','transaction_tbl.trans_id')
            ->select('transaction_tbl.trans_id','trans_total','charge','trans_date')
            ->whereYear('trans_date',$req->year)
            ->whereMonth('trans_date',2)
            ->get();
        $mar = DB::table('transaction_tbl')
            ->leftjoin('transcorp_tbl','transcorp_tbl.trans_id','=','transaction_tbl.trans_id')
            ->select('transaction_tbl.trans_id','trans_total','charge','trans_date')
            ->whereYear('trans_date',$req->year)
            ->whereMonth('trans_date',3)
            ->get();
        $apr = DB::table('transaction_tbl')
            ->leftjoin('transcorp_tbl','transcorp_tbl.trans_id','=','transaction_tbl.trans_id')
            ->select('transaction_tbl.trans_id','trans_total','charge','trans_date')
            ->whereYear('trans_date',$req->year)
            ->whereMonth('trans_date',4)
            ->get();
        $may = DB::table('transaction_tbl')
            ->leftjoin('transcorp_tbl','transcorp_tbl.trans_id','=','transaction_tbl.trans_id')
            ->select('transaction_tbl.trans_id','trans_total','charge','trans_date')
            ->whereYear('trans_date',$req->year)
            ->whereMonth('trans_date',5)
            ->get();
        $june = DB::table('transaction_tbl')
            ->leftjoin('transcorp_tbl','transcorp_tbl.trans_id','=','transaction_tbl.trans_id')
            ->select('transaction_tbl.trans_id','trans_total','charge','trans_date')
            ->whereYear('trans_date',$req->year)
            ->whereMonth('trans_date',6)
            ->get();
        $july = DB::table('transaction_tbl')
            ->leftjoin('transcorp_tbl','transcorp_tbl.trans_id','=','transaction_tbl.trans_id')
            ->select('transaction_tbl.trans_id','trans_total','charge','trans_date')
            ->whereYear('trans_date',$req->year)
            ->whereMonth('trans_date',7)
            ->get();
        $aug = DB::table('transaction_tbl')
            ->leftjoin('transcorp_tbl','transcorp_tbl.trans_id','=','transaction_tbl.trans_id')
            ->select('transaction_tbl.trans_id','trans_total','charge','trans_date')
            ->whereYear('trans_date',$req->year)
            ->whereMonth('trans_date',8)
            ->get();
        $sept = DB::table('transaction_tbl')
            ->leftjoin('transcorp_tbl','transcorp_tbl.trans_id','=','transaction_tbl.trans_id')
            ->select('transaction_tbl.trans_id','trans_total','charge','trans_date')
            ->whereYear('trans_date',$req->year)
            ->whereMonth('trans_date',9)
            ->get();
        $oct = DB::table('transaction_tbl')
            ->leftjoin('transcorp_tbl','transcorp_tbl.trans_id','=','transaction_tbl.trans_id')
            ->select('transaction_tbl.trans_id','trans_total','charge','trans_date')
            ->whereYear('trans_date',$req->year)
            ->whereMonth('trans_date',10)
            ->get();
        $nov = DB::table('transaction_tbl')
            ->leftjoin('transcorp_tbl','transcorp_tbl.trans_id','=','transaction_tbl.trans_id')
            ->select('transaction_tbl.trans_id','trans_total','charge','trans_date')
            ->whereYear('trans_date',$req->year)
            ->whereMonth('trans_date',11)
            ->get();
        $dec = DB::table('transaction_tbl')
            ->leftjoin('transcorp_tbl','transcorp_tbl.trans_id','=','transaction_tbl.trans_id')
            ->select('transaction_tbl.trans_id','trans_total','charge','trans_date')
            ->whereYear('trans_date',$req->year)
            ->whereMonth('trans_date',12)
            ->get();
        $totaltransaction = DB::table('transaction_tbl')
            ->leftjoin('patient_tbl','patient_id','=','trans_patient_id')
            ->leftjoin('transcorp_tbl','transcorp_tbl.trans_id','=','transaction_tbl.trans_id')
            ->select('transaction_tbl.trans_id','trans_total','charge','trans_date')
            ->whereYear('trans_date',$req->year)
            ->count();
        $corporate = DB::table('transaction_tbl')
            ->leftjoin('patient_tbl','patient_id','=','trans_patient_id')
            ->leftjoin('transcorp_tbl','transcorp_tbl.trans_id','=','transaction_tbl.trans_id')
            ->select('transaction_tbl.trans_id','trans_total','charge','trans_date')
            ->where('patient_type_id',2)
            ->whereYear('trans_date',$req->year)
            ->count();
        $individual = DB::table('transaction_tbl')
            ->leftjoin('patient_tbl','patient_id','=','trans_patient_id')
            ->leftjoin('transcorp_tbl','transcorp_tbl.trans_id','=','transaction_tbl.trans_id')
            ->select('transaction_tbl.trans_id','trans_total','charge','trans_date')
            ->where('patient_type_id',1)
            ->whereYear('trans_date',$req->year)
            ->count();
        $corporate = ((($corporate) / $totaltransaction)*100);
        $individual= ((($individual) / $totaltransaction)*100);
        
        

        return response()->json([$var,$jan,$feb,$mar,$apr,$may,$june,$july,$aug,$sept,$oct,$nov,$dec,$corporate,$individual]);
    }

}
