<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use DateTime;
use Session;
class AdminController extends Controller
{
    public function __construct()
    {
        date_default_timezone_set('Singapore');
    }
    function pack()
    {
        $package = DB::table('package_tbl')
                    ->join('trans_pack_tbl','trans_pack_tbl.pack_id','=','package_tbl.pack_id')
                    ->select('trans_pack_tbl.pack_name','trans_pack_tbl.pack_price',DB::raw('COUNt(*) as row_count'))
                    ->groupBy('trans_pack_tbl.pack_name','trans_pack_tbl.pack_price')
                    ->where('PackStatus',1)
                    ->orderBy('row_count','desc')
                    ->take(5)
                    ->get();
        return response()->json($package);
    }
    function serv()
    {
        $service =DB::table('trans_result_service_tbl')
                    ->leftjoin('transresult_tbl','transresult_tbl.result_id','=','trans_result_service_tbl.result_id')
                    ->leftjoin('service_tbl','service_tbl.service_id','=','trans_result_service_tbl.service_id')
                    ->select('service_tbl.service_name',DB::raw('COUNT(*) as row_count'),'service_price')
                    ->groupBy('service_tbl.service_name','service_price')
                    ->where('corppack_id',null)
                    ->where('ServiceStatus',1)
                    ->orderBy('row_count','desc')
                    ->take(5)
                    ->get();
        return response()->json($service);
    }
    function corp(Request $req)
    {
        $corporate = DB::table('corporate_accounts_tbl')
                ->leftjoin('transcorp_tbl','transcorp_tbl.corp_id','=','corporate_accounts_tbl.corp_id')
                ->leftjoin('transaction_tbl','transaction_tbl.trans_id','=','transcorp_tbl.trans_id')
                ->select(DB::raw('COUNT(*) as row_count,SUM(charge) as charge'),'corp_name')
                ->groupBy('corp_name')
                ->where('charge','!=',0)
                ->where('CorpStatus',1)
                ->orderBy('row_count','desc')
                ->take(5)
                ->get();
        return response()->json($corporate);
    }
    function patient(Request $req)
    {
        $patient = DB::table('transaction_tbl')
                    ->join('patient_tbl','patient_id','=','trans_patient_id')
                    ->join('patient_type_tbl','ptype_id','=','patient_type_id')
                    ->select('patient_id',DB::raw('CONCAT(patient_fname," ",patient_mname," ",patient_lname) as name'),DB::raw('COUNT(*) as row_count'),'patient_civilstatus','patient_birthdate','age','patient_gender','ptype_name','patient_address')
                    ->where('PatientStatus',1)
                    ->groupBy('patient_id','name','patient_civilstatus','patient_birthdate','age','patient_gender','ptype_name','patient_address')

                    ->orderBy('row_count','desc')
                    ->take(5)
                    ->get();
        
        return response()->json($patient);
    }
    function employee(Request $req)
    {
        $employee = DB::table('employee_tbl')
                        ->leftjoin('trans_emprebate_tbl','trans_emprebate_tbl.emp_id','=','employee_tbl.emp_id')
                        ->leftjoin('transaction_tbl','transaction_tbl.trans_id','=','trans_emprebate_tbl.trans_id')
                        ->leftjoin('rebate_tbl','rebate_tbl.rebate_id','=','trans_emprebate_tbl.rebate_id')
                        ->leftjoin('transcorp_tbl','transcorp_tbl.trans_id','=','transaction_tbl.trans_id')
                        ->select(DB::raw('employee_tbl.emp_id ,CONCAT(emp_fname," ",emp_mname," ",emp_lname) as name,((trans_total + IFNULL(charge,0))*(percentage/100)) as percentage'))
                        ->where('transaction_tbl.trans_id','!=',null)
                        ->take(5)
                        ->get();

        return response()->json($employee);
    }
    function debug()
    {
        $medtech = DB::table('employee_tbl')
                    ->leftjoin('employee_role_tbl','employee_role_tbl.role_id','=','employee_tbl.emp_type_id')
                    ->leftjoin('laboratory_tbl','laboratory_tbl.lab_id','=','employee_role_tbl.lab_id')
                    ->where('role_name','Medical Techonlogist')
                    ->where('EmpStatus',1)                    
                    ->where('RoleStatus',1)
                    ->where('LabStatus',1)
                    ->get();

    }
    function pagenotfound()
    {
        return view('Pages.PageNotFound');
    }
    function query()
    {
        $emptype = DB::table('employee_role_tbl')->leftjoin('laboratory_tbl','laboratory_tbl.lab_id','=','employee_role_tbl.lab_id')->where('RoleStatus',1)->where('LabStatus',1)->get();
        return view('Pages.Query',['emptype'=>$emptype]);
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
        
        $dayincome =DB::table('transaction_tbl')
                        ->leftjoin('transcorp_tbl','transcorp_tbl.trans_id','=','transaction_tbl.trans_id')
                        ->select('trans_total',DB::raw('IFNULL(charge,0) as charge'),'discount')
                        ->where('trans_date',date('Y-m-d'))
                        ->get();
        if(count($dayincome)>0)
        {
            foreach($dayincome as $d)
            {
                $total = $d->trans_total;
                $charge = $d->charge;
                $discount = $d->discount;
                $total += $total;
                $total += $charge;
                $dayincome = ($total - ($total * ($discount/100)));
            }
        }
        else
        {
            $dayincome = 0;
        }
        $monthincome =DB::table('transaction_tbl')
                        ->join('transcorp_tbl','transcorp_tbl.trans_id','=','transaction_tbl.trans_id')
                        ->select('trans_total',DB::raw('IFNULL(charge,0) as charge'),'discount')
                        ->whereYear('trans_date',date('Y'))
                        ->whereMonth('trans_date',date('m'))
                        ->get();

        if(count($monthincome)>0)
        {
            $total = 0;
            foreach($monthincome as $m)
            {
                $total += $m->trans_total;
                $total += $m->charge;
                $monthincome = ($total - ($total * ($m->discount/100)));  
            }

             
        }
        else
        {
            $monthincome = 0;
        }
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
        if(Session::get('emp_id')== 0)

        {
            $transactions = DB::table('transaction_tbl')
                ->leftjoin('patient_tbl','patient_tbl.patient_id','=','transaction_tbl.trans_patient_id')
                ->leftjoin('transresult_tbl','transresult_tbl.trans_id','=','transaction_tbl.trans_id')
                ->where('status','PENDING')
                ->get();
        }
        else
        {
            $transactions = DB::table('transaction_tbl')
            ->leftjoin('patient_tbl','patient_tbl.patient_id','=','transaction_tbl.trans_patient_id')
            ->leftjoin('transresult_tbl','transresult_tbl.trans_id','=','transaction_tbl.trans_id')
            ->whereIn('transresult_tbl.result_id',$res_id)
            ->where('status','PENDING')
            ->get();
        }
        $totaltransaction = DB::table('trans_result_service_tbl')->select('result_id',DB::raw('COUNT(*) as count_row'))->distinct()->groupBy('result_id')->get();
        $doneTransaction = DB::table('trans_result_service_tbl')->select('result_id',DB::raw('COUNT(*) as count_row'))->distinct()->groupBy('result_id')->where('status','DONE')->get();
        $total = 0;
        $done = 0;

    	return view('Dashboards.AdminDashboard',['patient_count'=>$patientcount,'service_count'=>$service_count,'emp_count'=>$emp_count,'dayincome'=>$dayincome,'corporate'=>$corporate,'emp_total'=>$emp_total,'corppay'=>$corppay,'rebate'=>$rebate,'daytransact'=>$daytransact,'monthincome'=>$monthincome,'unfinish'=>$unfinish,'transactions'=>$transactions,'totaltrans'=>$totaltransaction,'donetrans'=>$doneTransaction,'total'=>$total,'done'=>$done]);
    	
    }
}
