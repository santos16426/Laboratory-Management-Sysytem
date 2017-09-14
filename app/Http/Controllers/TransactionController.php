<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
class TransactionController extends Controller
{
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
            $patitent_age = $s->age;
            $patient_gender = $s->patient_gender;
        }
        $corpid=0;
        if($ptype_id == 2)
        {
            $corpid = $corp_id;
        }
        $corppackage = DB::table('corp_package_tbl')->where('corp_id',$corpid)->where('CorpPackStatus',1)->get();

        return view('Transaction.MedicalService',['patientinfo'=>$patientinfo,'service'=>$service,'emp_rebates'=>$emp_rebates,'ptype_id'=>$ptype_id,'servicegroup'=>$servicegroup,'package'=>$package,'corp'=>$corp,'corppackage'=>$corppackage,'patitent_age'=>$patitent_age,'patient_gender'=>$patient_gender]);
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
