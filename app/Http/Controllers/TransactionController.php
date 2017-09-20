<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
class TransactionController extends Controller
{
    function viewrebatetrans()
    {
        $emp_id = $_GET['emp_id'];
        $empdetails = DB::table('employee_tbl')
            ->leftjoin('employee_role_tbl','employee_role_tbl.role_id','=','employee_tbl.emp_type_id')
            ->leftjoin('rolefields_tbl','rolefields_tbl.role_id','=','employee_role_tbl.role_id')
            ->where('emp_id',$emp_id)
            ->get();
        $transactions = DB::table('trans_emprebate_tbl')->where('emp_id',$emp_id)->get();
        return view ('Transaction.ViewEmployeeRebateTrans',['transactions'=>$transactions,'empdetails'=>$empdetails]);
    }
    function rebatebilling()
    {
        $emp_rebates = DB::table('employee_tbl')
            ->leftjoin('rolefields_tbl','rolefields_tbl.role_id','=','employee_tbl.emp_type_id')
            ->leftjoin('emp_rebate_tbl','emp_rebate_tbl.emp_id','=','employee_tbl.emp_id')
            ->leftjoin('employee_role_tbl','employee_role_tbl.role_id','=','employee_tbl.emp_type_id')
            ->where('rolefields_tbl.rebate',1)
            ->where('employee_tbl.EmpStatus',1)
            ->where('emp_rebate_tbl.EmpRebStatus',1)->get();
        $getRebateTransaction = DB::table('trans_emprebate_tbl')->get();
        $rebates = DB::select(DB::raw('SELECT empr.emp_id,(t.trans_total * (r.percentage/100)) as percentage FROM trans_emprebate_tbl empr LEFT JOIN rebate_tbl r on empr.rebate_id = r.rebate_id LEFT JOIN employee_tbl e on empr.emp_id = e.emp_id LEFT JOIN transaction_tbl t ON t.trans_id = empr.trans_id '));
        $total = 0;
        return view('Transaction.RebateBilling',['emp_rebate'=>$emp_rebates,'rebateTransaction'=>$getRebateTransaction,'rebates'=>$rebates,'total'=>$total]);
    }
    function saveCorporatePayment()
    {
        $corp_id = $_POST['corp_id'];
        $amount = $_POST['amount'];
        $file_name_new = "default.jpg";
        if(isset($_FILES['payment_img']))
        {
            $file = $_FILES['payment_img'];
            $file_error = $file['error'];
            // File properties
            $file_name = $file['name'];
            $file_tmp = $file['tmp_name'];
            $file_size = $file['size'];

            //Work out the file extension
            $file_ext = explode('.',$file_name);
            $file_ext = strtolower(end($file_ext));

            $allowed = array('jpg','png','jpeg','bmp');
            if(in_array($file_ext,$allowed))
            {
                if($file_error === 0)
                {
                    if($file_size <= 2097152)
                    {
                        $file_name_new = uniqid('',true) . '.' . $file_ext;
                        $file_destination = 'CorporatePayments/' . $file_name_new;
                        move_uploaded_file($file_tmp, $file_destination);
                    }
                }
            }
        }
        DB::table('transcorp_payment_tbl')
            ->insert([
                'corpPayment_date'  =>  date_create('now'),
                'corpPayment_bill'  =>  $amount,
                'corp_id'           =>  $corp_id,
                'corpPayment_img'   =>  $file_name_new
            ]);
        Session::flash('paid',true);
        return redirect()->back();
    }
    function encoderesults()
    {
        return view('Transaction.EncodingOfResults');
    }
    function uploadresults()
    {
        return view('Transaction.UploadOfResults');
    }
    function viewCorpTrans()
    {
        $corp_id = $_GET['corp_id'];
        $corporatedetails = DB::table('corporate_accounts_tbl')->where('corp_id',$corp_id)->get();
        $table = DB::table('transcorp_tbl')
            ->leftjoin('transaction_tbl','transaction_tbl.trans_id','=','transcorp_tbl.trans_id')
            ->leftjoin('patient_tbl','patient_tbl.patient_id','=','transaction_tbl.trans_patient_id')
            ->where('corp_id',$corp_id)
            ->get();
        $payments = DB::table('transcorp_payment_tbl')->where('corp_id',$corp_id)->get();
        return view('Transaction.ViewCorporateTrans',['corporate'=>$corporatedetails,'transactions'=>$table,'payments'=>$payments]);
    }
    function corpbilling()
    {
        $balance = 0;
        $payments = 0;
        $bill = 0;
        $corporates = DB::table('corporate_accounts_tbl')
                        ->distinct()
                        ->get();
        $corppack_ids = DB::table('transcorp_tbl')->whereNotIn('charge',[0])->get();
        $corppayments = DB::table('transcorp_payment_tbl')->get();

        return view('Transaction.CorporateBilling',['corporates'=>$corporates,'packprice'=>$corppack_ids,'balance'=>$balance,'payments'=>$corppayments,'corppay'=>$payments,'bill'=>$bill]);   
    }
    public function retrieveReciept(Request $req)
    {
        $transaction_details = DB::table('transaction_tbl')->where('trans_id',$req->ID)->get();
        foreach($transaction_details as $td)
        {
            $emp_id = $td->issuedBy_emp_id;
            $patient_id = $td->trans_patient_id;
        }
        $ref_id = DB::table('trans_emprebate_tbl')->select('emp_id')->where('trans_id',$req->ID)->get();
        $rid = 0;
        foreach($ref_id as $rid)
        {
            $rid = $rid->emp_id;
        }
        $referring_name = DB::select(DB::raw('SELECT CONCAT(emp_fname," ",emp_mname," ",emp_lname ) as Name FROM employee_tbl  WHERE emp_id = '.$rid));
        $emp_name = DB::select(DB::raw('SELECT CONCAT(emp_fname," ",emp_mname," ",emp_lname ) as Name FROM employee_tbl  WHERE emp_id = '.$emp_id));
        $patient_name = DB::select(DB::raw('SELECT CONCAT(patient_fname," ",patient_mname," ",patient_lname ) as Name FROM patient_tbl WHERE patient_id ='.$patient_id));
        $claimCode = DB::table('patient_tbl')->select('claimCode')->where('patient_id',$patient_id)->get();

        $result_id = DB::table('transresult_tbl')->select('result_id')->where('trans_id',$patient_id)->get();
        foreach($result_id as $result_id)
        {
            $result_id = $result_id->result_id;
        }
        $services = DB::table('trans_serv_tbl')
            ->where('trans_id',$req->ID)
            ->get();
        $corpPack_id = DB::table('transcorp_tbl')->select('corpPack_id')->where('trans_id',$req->ID)->get();
        $corpPackage = array();
        $corpPackCharge = array();
        foreach($corpPack_id as $corppid)
        {
            $corpPack_id = $corppid->corpPack_id;
            $corpPackCharge = DB::table('transcorp_tbl')
                ->leftjoin('corp_package_tbl','corp_package_tbl.corp_id','=','transcorp_tbl.corp_id')
                ->leftjoin('corporate_accounts_tbl','corporate_accounts_tbl.corp_id','=','transcorp_tbl.corp_id')
                ->where('corp_package_tbl.corpPack_id',$corpPack_id)
                ->where('trans_id',$req->ID)
                ->get();
                

            $corpPackage =  DB::table('corp_packserv_tbl')
                                ->leftjoin('service_tbl','service_tbl.service_id','=','corp_packserv_tbl.service_id')
                                ->leftjoin('service_group_tbl','service_group_tbl.servgroup_id','=','service_tbl.service_group_id')
                                ->leftjoin('service_type_tbl','service_type_tbl.service_type_id','=','service_tbl.service_type_id')
                                ->leftjoin('laboratory_tbl','laboratory_tbl.lab_id','=','service_group_tbl.lab_id')
                                ->leftjoin('corp_package_tbl','corp_package_tbl.corpPack_id','=','corp_packserv_tbl.corpPack_id')
                                ->leftjoin('corporate_accounts_tbl','corporate_accounts_tbl.corp_id','=','corp_package_tbl.corp_id')
                                ->where('service_tbl.ServiceStatus',1)
                                ->where('laboratory_tbl.LabStatus',1)
                                ->where('service_group_tbl.ServGroupStatus',1)
                                ->where('service_type_tbl.ServTypeStatus',1)
                                ->where('corp_package_tbl.corpPack_id',$corpPack_id)
                                ->orWhere('service_tbl.ServiceStatus',1)
                                ->where('laboratory_tbl.LabStatus',null)
                                ->where('service_group_tbl.ServGroupStatus',null)
                                ->where('service_type_tbl.ServTypeStatus',null)
                                ->where('corp_package_tbl.corpPack_id',$corpPack_id)
                                ->orWhere('service_tbl.ServiceStatus',1)
                                ->where('laboratory_tbl.LabStatus',1)
                                ->where('service_group_tbl.ServGroupStatus',1)
                                ->where('service_type_tbl.ServTypeStatus',null)
                                ->where('corp_package_tbl.corpPack_id',$corpPack_id)
                                ->distinct()
                                ->get();
        }
        
        $companyPackage = DB::table('trans_pack_tbl')
                            ->leftjoin('package_tbl','package_tbl.pack_id','=','trans_pack_tbl.pack_id')
                            ->where('trans_id',$req->ID)
                            ->get();
        foreach($companyPackage as $compackage)
        {
            $pack_id = $compackage->pack_id;
        }
        $packageServ = [];
        if(count($companyPackage)>0)
        {$packageServ = DB::table('package_service_tbl')
                                ->leftjoin('service_tbl','service_tbl.service_id','=','package_service_tbl.pack_serv_serv_id')
                                ->where('pack_serv_package_id',$pack_id)
                                ->get();}
        return response()->json([$transaction_details,$emp_name,$patient_name,$claimCode,$referring_name,$services,$corpPackCharge,$corpPackage,$companyPackage,$packageServ]);
    } 
    public function proceed_Payment(){
        $file_name_new = "default.jpg";

        if(isset($_FILES['medical_certificate']))
        {
            $file = $_FILES['medical_certificate'];
            $file_error = $file['error'];
            // File properties
            $file_name = $file['name'];
            $file_tmp = $file['tmp_name'];
            $file_size = $file['size'];

            //Work out the file extension
            $file_ext = explode('.',$file_name);
            $file_ext = strtolower(end($file_ext));

            $allowed = array('jpg','png','jpeg','bmp');
            if(in_array($file_ext,$allowed))
            {
                if($file_error === 0)
                {
                    if($file_size <= 2097152)
                    {
                        $file_name_new = uniqid('',true) . '.' . $file_ext;
                        $file_destination = 'Medical_services/' . $file_name_new;
                        move_uploaded_file($file_tmp, $file_destination);
                    }
                }
            }
        }
        
        if(Session::has('emp_id'))
        {
            $issuedBy = Session::get('emp_id');
        }
        else
        {
            $issuedBy = DB::table('employee_tbl')->where('EmpStatus',1)->select('emp_id')->max('emp_id');

        }

        $patient_id = $_POST['patient_id'] ;
        $patient_type_id = $_POST['patient_type_id'];
        $package_total = 0;
        $service_total = 0;
        $serv_id = [];      
        $stotal=0;
        $current_date = date('m/d/Y');
        $empRebate_id = null;
        $name="N/A";
        $patientinfo = DB::table('patient_tbl')
            ->where('patient_id',$patient_id)
            ->get();
        
        
        if(isset($_POST['medservice_id'])){
            $medservice_id=$_POST['medservice_id']; 
            $service = DB::table('service_tbl')
                ->whereIn('service_id',$medservice_id)
                ->get();

            $stotal = DB::table('service_tbl')
                ->select(DB::raw('SUM(service_price) as total_price'))
                ->whereIn('service_id',$medservice_id)
                ->get();
        
        foreach($stotal as $stotal)
        {
            $service_total = $stotal->total_price;
        }
        }
        
        $gtotal = $service_total+$package_total;

        
        
    $totalpriceinput = $_POST['totalpriceinput'];

    $paymentinput = $_POST['paymentinput'];
    if($paymentinput == null)
    {
        $paymentinput= 0;
    }
        DB::table('transaction_tbl')
                ->insert([
                    'medical_certificate'=>$file_name_new,
                    'trans_total'   =>  $totalpriceinput,
                    'trans_date'    =>  date_create('now'),
                    'trans_patient_id'  =>  $patient_id,
                    'issuedBy_emp_id'   =>  $issuedBy,
                    'trans_change'  =>  ($paymentinput - $totalpriceinput),
                    'trans_payment' =>  $paymentinput
                ]);
        $trans_id = DB::table('transaction_tbl')
                        ->select('trans_id')
                        ->max('trans_id');

       

        if($_POST['emp_id'] != 'null')
        {
            $emprebate_id = $_POST['emp_id'];
            $rebate_id = DB::table('rebate_tbl')->select('rebate_id')->max('rebate_id');
            DB::table('trans_emprebate_tbl')
                ->insert([
                    'emp_id'    =>  $emprebate_id,
                    'trans_id'  =>  $trans_id,
                    'rebate_id' =>  $rebate_id,
                    'date'      =>  date_create('now')
                ]);
        }
        DB::table('transresult_tbl')
            ->insert([
                'trans_id'  =>  $trans_id,
                'date'      =>  date_create('now')
            ]);

        $result_id = DB::table('transresult_tbl')
            ->select('result_id')
            ->max('result_id');
        
        if(isset($_POST['payWhere']))
        {
            $charge = $_POST['payWhere'];
            $corppackage_id = $_POST['corppackage_id'];
            if($charge == 0)
            {
                $corpcharge = 0;
            }
            else{
                $packagePrice = DB::table('corp_package_tbl')->where('corpPack_id',$corppackage_id)->select('price')->get();
                foreach($packagePrice as $ps)
                {
                    $packagePrice = $ps->price;
                }
                $corpcharge = $packagePrice;
            }
            
            $corp_id = $_POST['corp_id'];
            DB::table('transcorp_tbl')
                ->insert([
                    'corpPack_id'=>$corppackage_id,
                    'trans_id'  =>  $trans_id,
                    'date'    =>  date_create('now'),
                    'corp_id'   => $corp_id,
                    'charge'  =>  $corpcharge

            ]);
            $corpPack_id = $_POST['corppackage_id'];
            $srv = DB::table('corp_packserv_tbl')
                ->leftjoin('service_tbl','service_tbl.service_id','=','corp_packserv_tbl.service_id')
                ->leftjoin('service_group_tbl','service_group_tbl.servgroup_id','=','service_tbl.service_group_id')
                ->leftjoin('service_type_tbl','service_type_tbl.service_type_id','=','service_tbl.service_type_id')
                ->leftjoin('laboratory_tbl','laboratory_tbl.lab_id','=','service_group_tbl.lab_id')
                ->where('service_tbl.ServiceStatus',1)
                ->where('laboratory_tbl.LabStatus',1)
                ->where('service_group_tbl.ServGroupStatus',1)
                ->where('service_type_tbl.ServTypeStatus',1)
                ->orWhere('service_tbl.ServiceStatus',1)
                ->where('laboratory_tbl.LabStatus',null)
                ->where('service_group_tbl.ServGroupStatus',null)
                ->where('service_type_tbl.ServTypeStatus',null)
                ->orWhere('service_tbl.ServiceStatus',1)
                ->where('laboratory_tbl.LabStatus',1)
                ->where('service_group_tbl.ServGroupStatus',1)
                ->where('service_type_tbl.ServTypeStatus',null)
                ->where('corpPack_id',$corpPack_id)
                ->pluck('corp_packserv_tbl.service_id');

            $srv_details = DB::table('service_tbl')
                ->whereIn('service_id',$srv)
                ->get();
            
            foreach($srv_details as $srv_details)
            {
                $corpservice_id = $srv_details->service_id;
                $corpgroup_id = $srv_details->service_group_id;
                $corpservice_name = $srv_details->service_name;
                DB::table('trans_result_service_tbl')
                    ->insert([
                        'service_id'    =>  $corpservice_id,
                        'service_name'  =>  $corpservice_name,
                        'date'          =>  date_create('now'),
                        'result_id'     =>  $result_id,
                        'service_group_id'  =>  $corpgroup_id
                    ]);

            }
            
           

        }
        if(isset($_POST['package_id']))
        {
            $comp_id = $_POST['package_id'];
            $companypackage_id = [];
            foreach ($comp_id as $comPack_id) {
             array_push($companypackage_id,$comPack_id * 1);    
            }
            
            $comPackageDetails = DB::table('package_tbl')
                ->whereIn('pack_id',$companypackage_id)->get();

            foreach($comPackageDetails as $compackaged)
            {
                $pprice = $compackaged->pack_price;
                $ppack_name = $compackaged->pack_name;
                $ppid = $compackaged->pack_id;
                DB::table('trans_pack_tbl')
                    ->insert([
                        'trans_id'  =>  $trans_id,
                        'pack_id'   =>  $ppid,
                        'pack_price'    =>  $pprice,
                        'pack_name' =>  $ppack_name
                    ]);

                $servicePackage = DB::table('package_service_tbl')
                    ->leftjoin('package_tbl','package_tbl.pack_id','=','package_service_tbl.pack_serv_package_id')
                    ->leftjoin('service_tbl','service_tbl.service_id','=','package_service_tbl.pack_serv_serv_id')
                    ->where('pack_serv_package_id',$ppid)
                    ->get();
                foreach($servicePackage as $packservice)
                {
                    DB::table('trans_result_service_tbl')
                        ->insert([
                            'service_id'    =>  $packservice->pack_serv_serv_id,
                            'service_name'  =>  $packservice->service_name,
                            'date'          =>  date_create('now'),
                            'result_id'     =>  $result_id,
                            'service_group_id'  =>  $packservice->service_group_id

                        ]);
                }
            }
            $companypackserv = DB::table('package_service_tbl')
                ->whereIn('pack_serv_package_id',$companypackage_id)
                ->get();

            foreach($companypackserv as $cps)
            {
                $companypackservice_id = $cps->pack_serv_serv_id;
                $companypackservicedetails = DB::table('service_tbl')->where('service_id',$companypackservice_id)->get();
                foreach($companypackservicedetails as $cpsdetails)
                {
                    $comservice_id = $cpsdetails->service_id;
                    $comservgroup_id = $cpsdetails->service_group_id;
                    $comservname = $cpsdetails->service_name;
                    DB::table('trans_result_service_tbl')
                        ->insert([
                            'service_id'    =>  $comservice_id,
                            'service_name'  =>  $comservname,
                            'date'          =>  date_create('now'),
                            'result_id'     =>  $result_id,
                            'service_group_id'  =>  $comservgroup_id
                        ]);
                }
            }
            
                
            

        }
        if(isset($_POST['medservice_id']))
        {
            $serv_id = $_POST['medservice_id'];
            $serv = DB::table('service_tbl')
                ->whereIn('service_id',$serv_id)
                ->get();
            foreach ($serv as $serv) {
                $serviceid = $serv->service_id;
                $groupid = $serv->service_group_id;
                $servicename = $serv->service_name;
                $serviceprice = $serv->service_price;
                DB::table('trans_result_service_tbl')
                    ->insert([
                        'service_id'    =>  $serviceid,
                        'service_name'  =>  $servicename,
                        'date'          =>  date_create('now'),
                        'result_id'     =>  $result_id,
                        'service_group_id'  =>  $groupid
                   ]);
                DB::table('trans_serv_tbl')
                     ->insert([
                            'trans_id'  =>  $trans_id,
                            'serv_id'   =>  $serviceid,
                            'serv_name' =>  $servicename,
                            'service_price' =>  $serviceprice
                        ]);
            }
        }
        
        Session::flash('transaction',true);
        $transactionDetails = DB::table('transaction_tbl')->get();
        $transaction_id=0;
        $employee_id = 0;
        $patient_id = 0;
        $payment = 0;
        $change = 0;
        $total = 0;
        $trans_date = "";
        foreach($transactionDetails as $t)
        {
            $transaction_id = $t->trans_id;
            $employee_id = $t->issuedBy_emp_id;
            $patient_id = $t->trans_patient_id;
            $payment = $t->trans_payment;
            $change = $t->trans_change;
            $total = $t->trans_total;
            $trans_date = $t->trans_date;
        }
        
        Session::flash('trans_id',$transaction_id);
        return redirect('/Admin/Dashboard');
    
    }
    public function getCompanyPackage(Request $req)
    {
        $package = DB::table('package_tbl')
            ->where('pack_id',$req->id)
            ->get();
        return response()->json($package);
    }
    public function getDataService(Request $req){
        $servicedetails = DB::table('service_tbl')
            ->leftjoin('service_group_tbl','service_group_tbl.servgroup_id','=','service_tbl.service_group_id')
            ->where('service_id',$req->id)
            ->get();
        return response()->json($servicedetails);
    }
    public function getDataPackage(Request $req){
        $packagedetails = DB::table('corp_package_tbl')
            ->leftjoin('corporate_accounts_tbl','corporate_accounts_tbl.corp_id','=','corp_package_tbl.corp_id')
            ->where('corp_package_tbl.corpPack_id',$req->id)
            ->get();
        return response()->json($packagedetails);
    }
    public function medicalservice(){
        $pid = $_GET['patient_id'];

        $emp_rebates = DB::table('employee_tbl')
            ->leftjoin('rolefields_tbl','rolefields_tbl.role_id','=','employee_tbl.emp_type_id')
            ->leftjoin('emp_rebate_tbl','emp_rebate_tbl.emp_id','=','employee_tbl.emp_id')
            ->leftjoin('employee_role_tbl','employee_role_tbl.role_id','=','employee_tbl.emp_type_id')
            ->leftjoin('laboratory_tbl','laboratory_tbl.lab_id','=','employee_role_tbl.lab_id')
            ->where('rolefields_tbl.rebate',1)
            ->where('EmpRebStatus',1)
            ->where('EmpStatus',1)
            ->where('LabStatus',1)
            ->where('RoleStatus',1)
            ->orWhere('rebate',1)
            ->where('EmpRebStatus',1)
            ->where('EmpStatus',1)
            ->where('LabStatus',null)
            ->where('RoleStatus',1)
            ->get();

        $patientinfo = DB::table('patient_tbl')
            ->leftjoin('patient_type_tbl','patient_type_tbl.ptype_id','=','patient_tbl.patient_type_id')
            ->where('patient_tbl.PatientStatus',1)
            ->where('patient_id',$pid)->get();
        $corp = DB::table('corporate_accounts_tbl')->where('CorpStatus',1)->get();
        $package = DB::table('package_tbl')
            ->where('PackStatus',1)
            ->get();

        $servicegroup = DB::table('service_group_tbl')
            ->leftjoin('laboratory_tbl','laboratory_tbl.lab_id','=','service_group_tbl.lab_id')
            ->where('ServGroupStatus',1)
            ->where('LabStatus',1)
            ->get();

        $service = DB::table('service_tbl')
            ->leftjoin('service_group_tbl','service_group_tbl.servgroup_id','=','service_tbl.service_group_id')
            ->leftjoin('service_type_tbl','service_type_tbl.service_type_id','=','service_tbl.service_type_id')
            ->leftjoin('laboratory_tbl','laboratory_tbl.lab_id','=','service_group_tbl.lab_id')
            ->where('ServiceStatus',1)
            ->where('ServTypeStatus',1)
            ->where('ServGroupStatus',1)
            ->where('LabStatus',1)

            ->orWhere('ServiceStatus',1)
            ->where('ServTypeStatus',null)
            ->where('ServGroupStatus',1)
            ->where('LabStatus',1)

            ->orWhere('ServiceStatus',1)
            ->where('ServTypeStatus',null)
            ->where('ServGroupStatus',null)
            ->where('LabStatus',null)
            ->get();
        foreach($patientinfo as $s)
        {
            $ptype_id = $s->patient_type_id;
            $corp_id = $s->patient_corp_id;
            $patient_age = $s->age;
            $patient_gender = $s->patient_gender;
        }
        $corpid=0;
        if($ptype_id == 2)
        {
            $corpid = $corp_id;
        }
        $corppackage = DB::table('corp_package_tbl')->where('corp_id',$corpid)->where('CorpPackStatus',1)->get();

        return view('Transaction.MedicalService',['patientinfo'=>$patientinfo,'service'=>$service,'emp_rebates'=>$emp_rebates,'ptype_id'=>$ptype_id,'servicegroup'=>$servicegroup,'package'=>$package,'corp'=>$corp,'corppackage'=>$corppackage,'patient_age'=>$patient_age,'patient_gender'=>$patient_gender]);
    }
    function patient()
    {
    	$patienttype = DB::table('patient_type_tbl')
            ->where('status',1)
            ->get();

    	$corps = DB::table('corporate_accounts_tbl')
            ->where('CorpStatus',1)
            ->get();

    	$table = DB::table('patient_tbl')
            ->join('patient_type_tbl','patient_type_tbl.ptype_id','=','patient_tbl.patient_type_id')
            ->get();

    	return view('Transaction.PatientList',['patienttype'=>$patienttype,'corps'=>$corps,'table'=>$table]);
    }
    public function save_patient(){
      $patient_email = $_POST['patient_email'];
      $patienttype = $_POST['patienttype'];
      $patient_fname  = $_POST['patient_fname'];
      $patient_mname  = $_POST['patient_mname'];
      $patient_lname  = $_POST['patient_lname'];
      $patient_address  = $_POST['patient_address'];
      $patient_contact  = $_POST['patient_contact'];
      $patient_civil = $_POST['civil_status'];
      $birthday = $_POST['birthday'];
      $age  = $_POST['age'];
      $gender = $_POST['gender'];
      $addcorpid= null;
      if($patienttype == 2){
        $addcorpid  = $_POST['addcorpid'];
      }
       $code = "";
       function randStr($length){
        $allCharacters = "1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZ";

        $allCharacters = str_shuffle($allCharacters);
        $randomKey = substr($allCharacters, 0, $length);
        
        return $randomKey;
        }

        $randomChar = randStr(4);
        $year = date('Y');

        $code = $year.'-'.$randomChar;
        $exit = 1;
        
        while($exit == 1)
        {
        $checkCode = DB::table('patient_tbl')
            ->select('claimCode')
            ->where('claimCode',$code)->get();
            

        if(count($checkCode)>0)
        {
            
            $randomChar = randStr(4);
            $year = date('Y');
            $code = $year.'-'.$randomChar;   
            
        }
        else
        {
            $exit = 0;
        }
        }
      DB::table('patient_tbl')->insert([
        'patient_fname' =>  $patient_fname,
        'patient_mname' =>  $patient_mname,
        'patient_lname' =>  $patient_lname,
        'patient_address' =>  $patient_address,
        'patient_contact' =>  $patient_contact,
        'patient_birthdate' =>  $birthday,
        'age'   =>  $age,
        'patient_gender'  =>  $gender,
        'patient_type_id' =>  $patienttype,
        'patient_corp_id' =>  $addcorpid,
        'patient_civilstatus'=>$patient_civil,
        'claimCode' =>  $code,
        'patient_email'=>$patient_email
      ]);

      $patient_id = DB::table('patient_tbl')
        ->select('patient_id')
        ->max('patient_id');
        

      DB::table('patient_log_tbl')->insert([
        'patient_id'    =>  $patient_id,
        'patient_fname' =>  $patient_fname,
        'patient_mname' =>  $patient_mname,
        'patient_lname' =>  $patient_lname,
        'patient_address' =>  $patient_address,
        'patient_contact' =>  $patient_contact,
        'patient_birthdate' =>  $birthday,
        'age'   =>  $age,
        'patient_gender'  =>  $gender,
        'patient_type_id' =>  $patienttype,
        'patient_corp_id' =>  $addcorpid,
        'patient_civilstatus'=>$patient_civil,
        'updated_at'    =>  date_create('now'),
        'patient_email'=>$patient_email
      ]);
       Session::flash('add', true);
      return redirect()->back();
    }
}
