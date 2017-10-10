<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;

class ResultController extends Controller
{
    public function __construct()
    {
        date_default_timezone_set('Singapore');
    }
    function printMedserv2()
    {
        $result_id = Session::get('result_id');
        $service_id = Session::get('service_ids');
        $getTrans_id = DB::table('transresult_tbl')->where('result_id',$result_id)->get();
        foreach($getTrans_id as $trans)
        {
            $trans_id = $trans->trans_id;
        }
        $getPatient = DB::table('transaction_tbl')
                        ->leftjoin('patient_tbl','patient_tbl.patient_id','=','trans_patient_id')
                        ->where('trans_id',$trans_id)
                        ->get();
        $corp_name = "N/A";
        $getGroupName = DB::table('service_tbl')
                            ->leftjoin('service_group_tbl','servgroup_id','=','service_group_id')
                            ->whereIn('service_id',$service_id)
                            ->get();
        foreach($getGroupName as $group)
        {
            $group_name = $group->servgroup_name;
        }
        foreach($getPatient as $pid)
        {
            $trans_date = date('F jS, Y',strtotime($pid->trans_date));
            $patient_id = $pid->patient_id;
            if($pid->patient_corp_id != null)
            {
                $getCorpName = DB::table('corporate_accounts_tbl')->where('corp_id',$pid->patient_corp_id)->get();
                foreach($getCorpName as $corp)
                {
                    $corp_name = $corp->corp_name;
                }
            }
        }
        $service_results = DB::table('trans_result_service_tbl')->whereIn('service_id',$service_id)->where('result_id',$result_id)->get();
        return view('Transaction.ResultLayout.MedicalService2',['service_results'=>$service_results,'group_name'=>$group_name,'corp_name'=>$corp_name,'getPatient'=>$getPatient,'trans_date'=>$trans_date]);
    }
    function save_Medserv2()
    {
        $service_ids = $_POST['service_id'];
        $result_id = $_POST['result_id'];
        $file = $_FILES['medtech_img'];
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
                    $medtechsign = uniqid('',true) . '.' . $file_ext;
                    $file_destination = 'Employee_signatures/' . $medtechsign;
                    move_uploaded_file($file_tmp, $file_destination);
                }
            }
        }
        $patho = $_FILES['pathologist_img'];
        $patho_error = $patho['error'];
        // File properties
        $patho_name = $patho['name'];
        $patho_tmp = $patho['tmp_name'];
        $patho_size = $patho['size'];

        //Work out the file extension
        $patho_ext = explode('.',$patho_name);
        $patho_ext = strtolower(end($patho_ext));

        $allowed = array('jpg','png','jpeg','bmp');
        if(in_array($patho_ext,$allowed))
        {
            if($patho_error === 0)
            {
                if($patho_size <= 2097152)
                {
                    $pathosign = uniqid('',true) . '.' . $patho_ext;
                    $patho_destination = 'Employee_signatures/' . $pathosign;
                    move_uploaded_file($patho_tmp, $patho_destination);
                }
            }
        }
        for ($i=0; $i < count($service_ids); $i++) { 
            DB::table('trans_result_service_tbl')
                ->where('service_id',$service_ids[$i])
                ->where('result_id',$result_id)
                ->update([
                    'Medserv2_printdate'=>date_create('now'),
                    'Medserv2_intresult'=>$_POST['intresult'.$service_ids[$i]],
                    'Medserv2_intunit'=>$_POST['intunit'.$service_ids[$i]],
                    'Medserv2_intref'=>$_POST['intref'.$service_ids[$i]],
                    'Medserv2_conresult'=>$_POST['conresult'.$service_ids[$i]],
                    'Medserv2_conunit'=>$_POST['conunit'.$service_ids[$i]],
                    'Medserv2_conref'=>$_POST['conref'.$service_ids[$i]],
                    'Medserv2_medtech_img'=>$medtechsign,
                    'Medserv2_medtech'=>$_POST['medtech'],
                    'Medserv2_pathologist_img'=>$pathosign,
                    'Medserv2_pathologist'=>$_POST['pathologist'],
                ]);
        }
        Session::put('printResult',true);
        Session::put('result_id',$result_id);
        Session::put('service_ids',$service_ids);

        return redirect('/Transactions/ResultLayout/MedicalService2');
    }
    function getLicense(Request $req)
    {
        $emp_id = $req->id;
        $emp = DB::table('employee_tbl')->where('emp_id',$emp_id)->get();
        foreach($emp as $e)
        {
            $license = $e->license_no;
        }
        return response()->json($license);
    }
     public function resultdashboard(){
        $emp_type_id = Session::get('emp_type_id');
        $lab_id = DB::table('employee_role_tbl')->select('lab_id')->where('role_id',$emp_type_id)->get();
        foreach($lab_id as $lab)
        {
            $labid = $lab->lab_id;
        }
        $servgroup = DB::table('service_group_tbl')
                        ->leftjoin('laboratory_tbl','laboratory_tbl.lab_id','=','service_group_tbl.lab_id')
                        ->where('service_group_tbl.lab_id',$labid)
                        ->where('ServGroupStatus',1)
                        ->get();
        return view('Transaction.ResultDashboard',['servgroup'=>$servgroup]);
    }
    public function uploadresults()
    {
        $transactions = DB::table('transaction_tbl')
                            ->leftjoin('patient_tbl','patient_tbl.patient_id','=','transaction_tbl.trans_patient_id')
                            ->leftjoin('transresult_tbl','transresult_tbl.trans_id','=','transaction_tbl.trans_id')
                            ->where('transresult_tbl.status','PENDING')
                            ->get();

        return view('Transaction.UploadOfResults',['transactions'=>$transactions]);
    }
    public function getTransactionperGroup(Request $req)
    {

        $serv_group_id = $req->id;
        $result_id = DB::table('trans_result_service_tbl')
                        ->leftjoin('transresult_tbl','transresult_tbl.result_id','=','trans_result_service_tbl.result_id')
                        ->where('transresult_tbl.status','PENDING')
                        ->where('trans_result_service_tbl.service_group_id',$serv_group_id)
                        ->get();
        $res_id = array();
        foreach($result_id as $r)
        {
            $res_id[] = $r->result_id;
        }

        $trans_table = DB::table('transaction_tbl')
            ->leftjoin('patient_tbl','patient_tbl.patient_id','=','transaction_tbl.trans_patient_id')
            ->leftjoin('transresult_tbl','transresult_tbl.trans_id','=','transaction_tbl.trans_id')
            ->whereIn('transresult_tbl.result_id',$res_id)
            ->get();
        return response()->json($trans_table);
    }
    public function AddLayout()
    {
        $id = $_GET['trans_id'];
        $gid = $_GET['group_id'];
        $servid = [];
        $enableLayout = array(
            'result_medserv1'   => 0,
            'result_medserv2'   => 0,
            'result_ecg'        => 0,
            'result_xray'       => 0,
            'result_ultra'      => 0,
            'result_drug'       => 0
        );
        $result_id = DB::table('transresult_tbl')->select('result_id')->where('trans_id',$id)->get();
        foreach($result_id as $re)
        {
            $resultid = $re->result_id;
        }
        $serv_id = DB::table('trans_result_service_tbl')->select('service_id')->where('result_id',$resultid)->where('service_group_id',$gid)->get();
        foreach($serv_id as $servs)
        {
            array_push($servid,$servs->service_id);
        }
        $services = DB::table('service_tbl')->whereIn('service_id',$servid)->get();
        foreach($services as $check)
        {
            if($check->result_medserv1 == 1)
            {
                $enableLayout['result_medserv1'] =1;
            }
            if($check->result_medserv2 == 1)
            {
                $enableLayout['result_medserv2'] =1;
            }
            if($check->result_ecg == 1)
            {
                $enableLayout['result_ecg'] =1;
            }
            if($check->result_xray == 1)
            {
                $enableLayout['result_xray'] =1;
            }
            if($check->result_ultra == 1)
            {
                $enableLayout['result_ultra'] =1;
            }
            if($check->result_drug == 1)
            {
                $enableLayout['result_drug'] = 1;
            }
        }
        $corp = DB::table('transcorp_tbl')->where('trans_id',$id)->get();
        if(count($corp)>0)
        {
            foreach($corp as $corp)
            {
                $corpPack_id = $corp->corpPack_id;
            }
            $check = DB::table('corp_package_tbl')->where('corpPack_id',$corpPack_id)->get();
            foreach($check as $exam)
            {
                if($exam->physical_exam == 1)
                {
                    $physicalexam = 1;
                }
                else
                {
                    $physicalexam=0;
                }
            }
        }
        else
        {
            $physicalexam = 0;
        }
        
        
        return view('Transaction.AddLayout',['id'=>$id,'gid'=>$gid,'enableLayout'=>$enableLayout,'physicalexam'=>$physicalexam]);
    }

    function medrequest(){
        return view ('Result.MedicalRequest');
    }
    function ecg(){
        return view ('Result.Ecg');
    }
     function ultra(){
        return view ('Result.Ultrasound');
    }
    function xray(){
        return view ('Result.Xray');
    }
    function medservice(){
        $trans_id = $_GET['trans_id'];
        $group_id = $_GET['group_id'];  
        $patientinfo = DB::table('transaction_tbl')
                        ->leftjoin('patient_tbl','patient_tbl.patient_id','=','transaction_tbl.trans_patient_id')
                        ->where('trans_id',$trans_id)
                        ->get();
        foreach($patientinfo as $p)
        {
            $corp_id = $p->patient_corp_id;
            if($corp_id != null)
            {
                $corpn = DB::table('corporate_accounts_tbl')->where('corp_id',$corp_id)->get();
                foreach ($corpn as $cor) {
                    $corp_name = $cor->corp_name;
                }
            }
            else
            {
                $corp_name = "N/A";
            }
        }
        $ref_id = DB::table('trans_emprebate_tbl')
                    ->leftjoin('employee_tbl','employee_tbl.emp_id','=','trans_emprebate_tbl.emp_id')
                    ->where('trans_id',$trans_id)->get();
        if(count($ref_id)>0)
        {
            foreach($ref_id as $emp)
            {
                $empReb_name = $emp->emp_fname . " " . $emp->emp_mname . "" . $emp->emp_lname;
            }
        }
        else
        {
            $empReb_name = "N/A";
        }
        $trans_date = DB::table('transaction_tbl')->where('trans_id',$trans_id)->get();
        foreach($trans_date as $d)
        {
            $trans_date=$d->trans_date;
        }
        $tdate = date('F jS, Y',strtotime($trans_date));
        $date = date('F jS, Y',strtotime('now'));
        $resultd = DB::table('transresult_tbl')->where('trans_id',$trans_id)->get();
        foreach($resultd as $r)
        {
            $result_id = $r->result_id;
        }
        $services = DB::table('trans_result_service_tbl')
                        ->leftjoin('service_tbl','service_tbl.service_id','=','trans_result_service_tbl.service_id')
                        ->where('service_tbl.service_group_id',$group_id)
                        ->where('result_id',$result_id)
                        ->where('result_medserv1',1)
                        ->get();
        $medtech = DB::table('employee_tbl')
                    ->leftjoin('employee_role_tbl','employee_role_tbl.role_id','=','employee_tbl.emp_type_id')
                    ->leftjoin('laboratory_tbl','laboratory_tbl.lab_id','=','employee_role_tbl.lab_id')
                    ->where('role_name','Medical Techonologist')
                    ->get();
        $patho = DB::table('employee_tbl')
                    ->leftjoin('employee_role_tbl','employee_role_tbl.role_id','=','employee_tbl.emp_type_id')
                    ->leftjoin('laboratory_tbl','laboratory_tbl.lab_id','=','employee_role_tbl.lab_id')
                    ->where('role_name','Pathologist')
                    ->get();
        
        return view ('Result.MedicalService',['patient'=>$patientinfo,'tdate'=>$tdate,'datenow'=>$date,'empReb_name'=>$empReb_name,'corp_name'=>$corp_name,'services'=>$services,'medtech'=>$medtech,'patho'=>$patho,'result_id'=>$result_id]);
    }
    function medservice2(){

        $trans_id = $_GET['trans_id'];
        $group_id = $_GET['group_id'];  
        $patientinfo = DB::table('transaction_tbl')
                        ->leftjoin('patient_tbl','patient_tbl.patient_id','=','transaction_tbl.trans_patient_id')
                        ->where('trans_id',$trans_id)
                        ->get();
        foreach($patientinfo as $p)
        {
            $corp_id = $p->patient_corp_id;
            if($corp_id != null)
            {
                $corpn = DB::table('corporate_accounts_tbl')->where('corp_id',$corp_id)->get();
                foreach ($corpn as $cor) {
                    $corp_name = $cor->corp_name;
                }
            }
            else
            {
                $corp_name = "N/A";
            }
        }
        $ref_id = DB::table('trans_emprebate_tbl')
                    ->leftjoin('employee_tbl','employee_tbl.emp_id','=','trans_emprebate_tbl.emp_id')
                    ->where('trans_id',$trans_id)->get();
        if(count($ref_id)>0)
        {
            foreach($ref_id as $emp)
            {
                $empReb_name = $emp->emp_fname . " " . $emp->emp_mname . "" . $emp->emp_lname;
            }
        }
        else
        {
            $empReb_name = "N/A";
        }
        $trans_date = DB::table('transaction_tbl')->where('trans_id',$trans_id)->get();
        foreach($trans_date as $d)
        {
            $trans_date=$d->trans_date;
        }
        $tdate = date('F jS, Y',strtotime($trans_date));
        $date = date('F jS, Y',strtotime('now'));
        $resultd = DB::table('transresult_tbl')->where('trans_id',$trans_id)->get();
        foreach($resultd as $r)
        {
            $result_id = $r->result_id;
        }
        $services = DB::table('trans_result_service_tbl')
                        ->leftjoin('service_tbl','service_tbl.service_id','=','trans_result_service_tbl.service_id')
                        ->where('service_tbl.service_group_id',$group_id)
                        ->where('result_id',$result_id)
                        ->where('result_medserv2',1)
                        ->get();
        $medtech = DB::table('employee_tbl')
                    ->leftjoin('employee_role_tbl','employee_role_tbl.role_id','=','employee_tbl.emp_type_id')
                    ->leftjoin('laboratory_tbl','laboratory_tbl.lab_id','=','employee_role_tbl.lab_id')
                    ->where('role_name','Medical Techonologist')
                    ->get();
        $patho = DB::table('employee_tbl')
                    ->leftjoin('employee_role_tbl','employee_role_tbl.role_id','=','employee_tbl.emp_type_id')
                    ->leftjoin('laboratory_tbl','laboratory_tbl.lab_id','=','employee_role_tbl.lab_id')
                    ->where('role_name','Pathologist')
                    ->get();
        return view ('Result.MedicalService2',['patient'=>$patientinfo,'tdate'=>$tdate,'datenow'=>$date,'empReb_name'=>$empReb_name,'corp_name'=>$corp_name,'services'=>$services,'medtech'=>$medtech,'patho'=>$patho,'result_id'=>$result_id]);
    }
    function drugtest(){
        return view ('Result.DrugTest');
    }
    // public function ecg(){
    //     $trans_id = $_GET['id'];
    //     $patientinfo = DB::table('transaction_tbl')
    //         ->leftjoin('patient_tbl','patient_tbl.patient_id','=','transaction_tbl.trans_patient_id')
    //         ->where('trans_id',$trans_id)
    //         ->get();
    //     return view('Transaction.ecg',['patientinfo'=>$patientinfo]);
    // }
    // public function ultra(){
    //     $trans_id = $_GET['id'];
    //     $patientinfo = DB::table('transaction_tbl')
    //         ->leftjoin('patient_tbl','patient_tbl.patient_id','=','transaction_tbl.trans_patient_id')
    //         ->where('trans_id',$trans_id)
    //         ->get();
    //     return view('Transaction.ultra',['patientinfo'=>$patientinfo]);
    // }
    // public function xray(){
    //     $trans_id = $_GET['id'];
    //     $patientinfo = DB::table('transaction_tbl')
    //         ->leftjoin('patient_tbl','patient_tbl.patient_id','=','transaction_tbl.trans_patient_id')
    //         ->where('trans_id',$trans_id)
    //         ->get();
    //     return view('Transaction.xray',['patientinfo'=>$patientinfo]);
    // }
    // public function medicalReport()
    // {
    //     $trans_id = $_GET['id'];
    //     $patientinfo = DB::table('transaction_tbl')
    //         ->leftjoin('patient_tbl','patient_tbl.patient_id','=','transaction_tbl.trans_patient_id')
    //         ->where('trans_id',$trans_id)
    //         ->get();

    //     return view('Transaction.medicalReport',['patientinfo'=>$patientinfo]);
    // }
    public function PatientTransaction()
    {
        $trans_id = $_GET['id'];
        $result_id = DB::table('transresult_tbl')->select('result_id')->where('trans_id',$trans_id)->get();
        $table = DB::table('trans_resultfiles_tbl')
                    ->leftjoin('transaction_tbl','transaction_tbl.trans_id','=','trans_resultfiles_tbl.trans_id')
                    ->leftjoin('transresult_tbl','transresult_tbl.result_id','=','trans_resultfiles_tbl.result_id')
                    ->leftjoin('patient_tbl','patient_tbl.patient_id','=','transaction_tbl.trans_patient_id')
                    ->where('trans_resultfiles_tbl.trans_id',$trans_id)
                    ->get();
        foreach($result_id as $s)
        {
            $result_id = $s->result_id;
        }
        return view('Transaction.PatientTransaction',['trans_id'=>$trans_id,'result_id'=>$result_id,'table'=>$table]);
    }
    public function uploadResultFile()
    {
        $trans_id = $_POST['transaction_id'];
        $result_id= $_POST['result_id'];

        $file = $_FILES['file'];
        $file_error = $file['error'];
        // File properties
        $file_name = $file['name'];
        $file_tmp = $file['tmp_name'];
        $file_size = $file['size'];

        //Work out the file extension
        $file_ext = explode('.',$file_name);
        $file_ext = strtolower(end($file_ext));

        $allowed = array('pdf','jpg','png');
        if(in_array($file_ext,$allowed))
        {
            if($file_error === 0)
            {
                if($file_size <= 2097152)
                {
                    $file_name_new = uniqid('',true) . '.' . $file_ext;
                    $file_destination = 'PatientResults/' . $file_name_new;

                    if(move_uploaded_file($file_tmp, $file_destination))
                    {
                        
                         DB::table('trans_resultfiles_tbl')->insert([
                            'trans_id'  =>  $trans_id,
                            'result_id' =>  $result_id,
                            'date'      =>  date_create('now'),
                            'file'      =>  $file_name_new
                        ]);
                    }
                }
            }
        }
       
    return redirect()->back();
    }
     public function uploadFileResuls()
    {
        $trans_id = $_GET['id'];
        DB::table('transresult_tbl')
            ->where('trans_id',$trans_id)
            ->update([
                'status'=>'DONE'
                ]);
        Session::flash('title', 'Success!');
        Session::flash('type', "success");
        Session::flash('message',"All files are successfully uploaded");
        return redirect()->back();
    }
}
