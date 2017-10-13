<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use DateTime;
class AdminController extends Controller
{
    public function __construct()
    {
        date_default_timezone_set('Singapore');
    }
    function pagenotfound()
    {
        return view('Pages.PageNotFound');
    }
    function queue()
    {
        return view('Pages.Queueing');
    }
    function dashboard()
    {
        $emp_count = DB::table('employee_tbl')
            ->leftjoin('employee_role_tbl','employee_role_tbl.role_id','=','employee_tbl.emp_type_id')
            ->leftjoin('laboratory_tbl','laboratory_tbl.lab_id','=','employee_role_tbl.lab_id')
            ->where('EmpStatus',1)
            ->where('RoleStatus',1)
            ->where('LabStatus',1)
            ->orWhere('EmpStatus',1)
            ->where('RoleStatus',1)
            ->where('LabStatus',null)
            ->count();
        $service_count = DB::table('service_tbl')
            ->leftjoin('service_group_tbl','service_group_tbl.servgroup_id','=','service_tbl.service_group_id')
            ->leftjoin('service_type_tbl','service_type_tbl.service_type_id','=','service_tbl.service_type_id')
            ->leftjoin('laboratory_tbl','laboratory_tbl.lab_id','=','service_group_tbl.lab_id')
            ->where('ServiceStatus',1)
            ->where('ServGroupStatus',1)
            ->where('ServTypeStatus',1)
            ->where('LabStatus',1)
            ->orWhere('ServiceStatus',1)
            ->where('ServGroupStatus',1)
            ->where('ServTypeStatus',null)
            ->where('LabStatus',1)
            ->orWhere('ServiceStatus',1)
            ->where('ServGroupStatus',null)
            ->where('ServTypeStatus',null)
            ->where('LabStatus',null)
            ->count();
        
        $dayincome =DB::table('transaction_tbl')->whereDate('trans_date',date('Y-m-d'))->sum('trans_total');
        
        $corporate = DB::table('corporate_accounts_tbl')->where('CorpStatus',1)->count();

        $emp_total = 0;
        $total = 0;
        $emppayment = 0;
        $emptotalrebates = DB::select(DB::raw('SELECT empr.emp_id,(t.trans_total * (r.percentage/100)) as percentage,charge FROM trans_emprebate_tbl empr LEFT JOIN rebate_tbl r on empr.rebate_id = r.rebate_id LEFT JOIN employee_tbl e on empr.emp_id = e.emp_id LEFT JOIN transaction_tbl t ON t.trans_id = empr.trans_id LEFT JOIN transcorp_tbl tc ON tc.trans_id = t.trans_id'));
        foreach($emptotalrebates as $empreb)
        {
            $total += $empreb->percentage;
            $total += $empreb->charge;
        }
        $emptotalpayments = DB::table('transrebate_payment_tbl')->get();
        foreach($emptotalpayments as $emppay)
        {
            $emppayment += $emppay->transRebPay_amount;
        }
        $emp_total = $total - $emppayment;
        
        $totalcorp = DB::table('transcorp_tbl')->sum('charge');
        $totaypaycorp = DB::table('transcorp_payment_tbl')->sum('corpPayment_bill');
        $corppay = $totalcorp - $totaypaycorp;
        $reb_id = DB::table('rebate_tbl')->max('rebate_id');
        $rebate = DB::table('rebate_tbl')->where('rebate_id',$reb_id)->select('percentage')->get();
        foreach($rebate as $reb)
        {
            $rebate = $reb->percentage;
        }
        $daytransact= DB::table('transaction_tbl')->whereDate('trans_date',date('Y-m-d'))->count();
        $monthincome =DB::table('transaction_tbl')->whereYear('trans_date',date('Y'))->whereMonth('trans_date',date('m'))->sum('trans_total');
        $unfinish = DB::table('transresult_tbl')->where('status','PENDING')->count();

        $patientcount = DB::table('patient_tbl')->count();
        

        $result_id = DB::table('trans_result_service_tbl')
                        ->leftjoin('transresult_tbl','transresult_tbl.result_id','=','trans_result_service_tbl.result_id')
                        ->where('transresult_tbl.status','PENDING')
                        ->get();
        
        $res_id = [];
        foreach($result_id as $r)
        {
            array_push($res_id,$r->result_id);

        } 
        $transactions = DB::table('transaction_tbl')
            ->leftjoin('patient_tbl','patient_tbl.patient_id','=','transaction_tbl.trans_patient_id')
            ->leftjoin('transresult_tbl','transresult_tbl.trans_id','=','transaction_tbl.trans_id')
            ->whereIn('transresult_tbl.result_id',$res_id)
            ->get();
        
        $totaltransaction = DB::table('trans_result_service_tbl')->select('result_id',DB::raw('COUNT(*) as count_row'))->distinct()->groupBy('result_id')->get();
        $doneTransaction = DB::table('trans_result_service_tbl')->select('result_id',DB::raw('COUNT(*) as count_row'))->distinct()->groupBy('result_id')->where('status','DONE')->get();
        $total = 0;
        $done = 0;

    	return view('Dashboards.AdminDashboard',['patient_count'=>$patientcount,'service_count'=>$service_count,'emp_count'=>$emp_count,'dayincome'=>$dayincome,'corporate'=>$corporate,'emp_total'=>$emp_total,'corppay'=>$corppay,'rebate'=>$rebate,'daytransact'=>$daytransact,'monthincome'=>$monthincome,'unfinish'=>$unfinish,'transactions'=>$transactions,'totaltrans'=>$totaltransaction,'donetrans'=>$doneTransaction,'total'=>$total,'done'=>$done]);
    	
    }
}
