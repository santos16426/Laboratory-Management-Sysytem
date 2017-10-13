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
        ini_set('memory_limit','256M');
    }
    function printxray()
    {
        $result_id = Session::get('result_id');
        $service_id = Session::get('service_id');
        $getTrans_id = DB::table('transresult_tbl')->where('result_id',$result_id)->get();
        foreach($getTrans_id as $trans)
        {
            $trans_id = $trans->trans_id;
        }
        $labd = DB::table('service_tbl')
                    ->leftjoin('service_group_tbl','servgroup_id','=','service_group_id')
                    ->where('service_id',$service_id)
                    ->get();
        foreach($labd as $lab)
            {
                $lab_id = $lab->lab_id;
            }
        $getPatient = DB::table('transaction_tbl')
                        ->leftjoin('patient_tbl','patient_tbl.patient_id','=','trans_patient_id')
                        ->where('trans_id',$trans_id)
                        ->get();
       $service = DB::table('trans_result_service_tbl')
                    ->where('result_id',$result_id)
                    ->where('service_id',$service_id)
                    ->get();
        foreach($service as $services)
        {
            $date = $services->xray_date;
        }
        $empname = DB::table('employee_tbl')->select(DB::raw('Concat(emp_fname," ",emp_mname," ",emp_lname) as name'),'emp_id','license_no')->get();
        return view('Transaction.ResultLayout.Xray',['patientinfo'=>$getPatient,'trans_id'=>$trans_id,'service'=>$service,'lab_id'=>$lab_id,'date'=>$date,'emp'=>$empname]);
    }
    function printdrug()
    {
        $result_id = Session::get('result_id');
        $getTrans_id = DB::table('transresult_tbl')->where('result_id',$result_id)->get();
        $service_id = Session::get('service_id');

        foreach($getTrans_id as $trans)
        {
            $trans_id = $trans->trans_id;
            $trans_date = date('F jS, Y h:i a',strtotime($trans->date));
        }

        $datenow = date('F jS, Y h:i a',strtotime('now'));
        $getPatient = DB::table('transaction_tbl')
                        ->leftjoin('patient_tbl','patient_tbl.patient_id','=','trans_patient_id')
                        ->where('trans_id',$trans_id)
                        ->get();
       $service = DB::table('trans_result_service_tbl')
                    ->where('result_id',$result_id)
                    ->where('service_id',$service_id)
                    ->get();
        $empname = DB::table('employee_tbl')->select(DB::raw('Concat(emp_fname," ",emp_mname," ",emp_lname) as name'),'emp_id')->get();
        return view('Transaction.ResultLayout.DrugTest',['patientinfo'=>$getPatient,'trans_id'=>$trans_id,'trans_date'=>$trans_date,'datenow'=>$datenow,'service'=>$service,'empname'=>$empname]);
    }
    function save_drugtest()
    {

        $file = $_FILES['picture_img'];
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
                    $file_destination = 'DrugTest_img/' . $file_name_new;
                    move_uploaded_file($file_tmp, $file_destination);
                }
            }
        }
        DB::table('trans_result_service_tbl')
            ->where('result_id',$_POST['result_id'])
            ->whereIn('service_id',$_POST['service_id'])
            ->update([
                'Drug_picture_img'=>$file_name_new,
                'Drug_reportid'=>$_POST['reportid'],
                'Drug_ccf'=>$_POST['ccf'],
                'Drug_test'=>$_POST['test'],
                'Drug_purpose'=>$_POST['purpose'],
                'Drug_reqparties'=>$_POST['reqparties'],
                'Drug_drugmet1'=>$_POST['drugmet1'],
                'Drug_drugmet2'=>$_POST['drugmet2'],
                'Drug_result1'=>$_POST['result1'],
                'Drug_result2'=>$_POST['result2'],
                'Drug_remarks1'=>$_POST['remarks1'],
                'Drug_remarks2'=>$_POST['remarks2'],
                'Drug_referred1'=>$_POST['referred1'],
                'Drug_referred2'=>$_POST['referred2']
            ]);
        Session::put('printResult',true);
        Session::put('result_id',$_POST['result_id']);
        Session::put('service_id',$_POST['service_id']);
        return redirect('/Transactions/ResultLayout/DrugTest');
    }
    function save_xray()
    {
        $file = $_FILES['radiologic_img'];
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
                    $radiologic_img = uniqid('',true) . '.' . $file_ext;
                    $file_destination = 'Employee_signatures/' . $radiologic_img;
                    move_uploaded_file($file_tmp, $file_destination);
                }
            }
        }
        $radiologist = $_FILES['radiologist_img'];
        $radiologist_error = $radiologist['error'];
        // File properties
        $radiologist_name = $radiologist['name'];
        $radiologist_tmp = $radiologist['tmp_name'];
        $radiologist_size = $radiologist['size'];

        //Work out the file extension
        $radiologist_ext = explode('.',$radiologist_name);
        $radiologist_ext = strtolower(end($radiologist_ext));

        $allowed = array('jpg','png','jpeg','bmp');
        if(in_array($radiologist_ext,$allowed))
        {
            if($radiologist_error === 0)
            {
                if($radiologist_size <= 2097152)
                {
                    $radiologistsign = uniqid('',true) . '.' . $radiologist_ext;
                    $radiologist_destination = 'Employee_signatures/' . $radiologistsign;
                    move_uploaded_file($radiologist_tmp, $radiologist_destination);
                }
            }
        }

        DB::table('trans_result_service_tbl')
            ->where('result_id',$_POST['result_id'])
            ->whereIn('service_id',[$_POST['service_id']])
            ->update([
                'xray_date'=>date_create('now'),
                'xray_title'=>$_POST['title'],
                'xray_findings'=>$_POST['findings'],
                'xray_radiologic'=>$_POST['radiologic'],
                'xray_radiologic_img'=>$radiologic_img,
                'xray_radiologist'=>$_POST['radiologist'],
                'xray_radiologist_img'=>$radiologistsign
            ]);
        Session::put('printResult',true);
        Session::put('result_id',$_POST['result_id']);
        Session::put('service_id',$_POST['service_id']);
        return redirect('/Transactions/ResultLayout/Xray');
    }
    function printultrasound()
    {
        $result_id = Session::get('result_id');
        $service_id = Session::get('service_id');
        $labd = DB::table('service_tbl')
                    ->leftjoin('service_group_tbl','servgroup_id','=','service_group_id')
                    ->where('service_id',$service_id)
                    ->get();
        foreach($labd as $lab)
            {
                $lab_id = $lab->lab_id;
            }
        $getTrans_id = DB::table('transresult_tbl')->where('result_id',$result_id)->get();
        foreach($getTrans_id as $trans)
        {
            $trans_id = $trans->trans_id;
        }
        $getPatient = DB::table('transaction_tbl')
                        ->leftjoin('patient_tbl','patient_tbl.patient_id','=','trans_patient_id')
                        ->where('trans_id',$trans_id)
                        ->get();
        $service = DB::table('trans_result_service_tbl')
                    ->leftjoin('employee_tbl','emp_id','=','ultra_sonologist')
                    ->whereIn('service_id',[$service_id])
                    ->where('result_id',$result_id)
                    ->get();
        foreach($service as $services)
        {
            $date = $services->ultra_date;
        }

        return view('Transaction.ResultLayout.Ultrasound',['date'=>$date,'patientinfo'=>$getPatient,'trans_id'=>$trans_id,'lab_id'=>$lab_id,'service'=>$service]);
    }
    function printECG()
    {
        $result_id = Session::get('result_id');
        $service_id = Session::get('service_id');
        $getTrans_id = DB::table('transresult_tbl')->where('result_id',$result_id)->get();
        foreach($getTrans_id as $trans)
        {
            $trans_id = $trans->trans_id;
        }
        $getPatient = DB::table('transaction_tbl')
                        ->leftjoin('patient_tbl','patient_tbl.patient_id','=','trans_patient_id')
                        ->where('trans_id',$trans_id)
                        ->get();
        $service = DB::table('trans_result_service_tbl')
                    ->leftjoin('employee_tbl','emp_id','=','Ecg_doctor')
                    ->where('service_id',$service_id)
                    ->where('result_id',$result_id)
                    ->get();
        return view('Transaction.ResultLayout.ECG',['patientinfo'=>$getPatient,'trans_id'=>$trans_id,'service'=>$service]);
    }
    function save_ultrasound()
    {
        $file = $_FILES['sono_signature'];
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
                    $sono_signature = uniqid('',true) . '.' . $file_ext;
                    $file_destination = 'Employee_signatures/' . $sono_signature;
                    move_uploaded_file($file_tmp, $file_destination);
                }
            }
        }
        DB::table('trans_result_service_tbl')
            ->whereIn('service_id',[$_POST['service_id']])
            ->where('result_id',$_POST['result_id'])
            ->update([
                'ultra_title'=>$_POST['title'],
                'ultra_impression'=>$_POST['impression'],
                'ultra_sonologist'=>$_POST['sonologist'],
                'ultra_sonologist_img'=>$sono_signature,
                'ultra_date'=>date_create('now')
            ]);
        Session::put('printResult',true);
        Session::put('result_id',$_POST['result_id']);
        Session::put('service_id',$_POST['service_id']);
        return redirect('/Transactions/ResultLayout/Ultrasound');
    }
    function save_ecg()
    {
        
        $service_id = $_POST['service_id'];
        $result_id = $_POST['result_id'];

        $file = $_FILES['ecg_image'];
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
                    $ecg_image = uniqid('',true) . '.' . $file_ext;
                    $file_destination = 'Result_ECG/' . $ecg_image;
                    move_uploaded_file($file_tmp, $file_destination);
                }
            }
        }
        DB::table('trans_result_service_tbl')
            ->where('service_id',$service_id)
            ->where('result_id',$result_id)
            ->update([
               'Ecg_ecgno'=>$_POST['ecgno'],
               'Ecg_rate'=>$_POST['rate'],
               'Ecg_ppr'=>$_POST['ppr'],
               'Ecg_qrs'=>$_POST['qrs'],
               'Ecg_qtqtc'=>$_POST['qtqtc'],
               'Ecg_doctor'=>$_POST['doctor'],
               'Ecg_pqrs'=>$_POST['pqrst'],
               'Ecg_minesota'=>$_POST['minesota'],
               'Ecg_diagnosis'=>$_POST['diagnosis'],
               'Ecg_ecg_image'=>$ecg_image

            ]);
            Session::put('printResult',true);
            Session::put('result_id',$result_id);
            Session::put('service_id',$service_id);
            return redirect('/Transactions/ResultLayout/ECG');
    }
    function printMedreq()
    {
        $result_id = Session::get('result_id');
        $corppack_id = Session::get('corppack_id');
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
        $details = DB::table('trans_result_service_tbl')->where('corppack_id',$corppack_id)->where('result_id',$result_id)->get();
        foreach($details as $emp_id)
        {
            $physician = $emp_id->medreq_examphysician;
            $eval = $emp_id->medreq_evaluated;
        }
        $physicianName = DB::table('employee_tbl')->where('emp_id',$physician)->get();
        $evalName = DB::table('employee_tbl')->where('emp_id',$eval)->get();
        return view('Transaction.ResultLayout.MedicalRequest',['corp_name'=>$corp_name,'getPatient'=>$getPatient,'trans_date'=>$trans_date,'details'=>$details,'physicianName'=>$physicianName,'evalName'=>$evalName]);
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
        foreach($service_results as $med)
        {
            $med_id = $med->medserv1_medtech;
            $path_id = $med->medserv1_pathologist;
        }
        $getMedtech = DB::table('employee_tbl')->where('emp_id',$med_id)->get();
        $getPatho = DB::table('employee_tbl')->where('emp_id',$path_id)->get();
        return view('Transaction.ResultLayout.MedicalService2',['service_results'=>$service_results,'group_name'=>$group_name,'corp_name'=>$corp_name,'getPatient'=>$getPatient,'trans_date'=>$trans_date,'getMedtech'=>$getMedtech,'getPatho'=>$getPatho]);
    }
    function printMedserv1()
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
        foreach($service_results as $med)
        {
            $med_id = $med->medserv1_medtech;
            $path_id = $med->medserv1_pathologist;
        }
        $getMedtech = DB::table('employee_tbl')->where('emp_id',$med_id)->get();
        $getPatho = DB::table('employee_tbl')->where('emp_id',$path_id)->get();
        return view('Transaction.ResultLayout.MedicalService',['service_results'=>$service_results,'group_name'=>$group_name,'corp_name'=>$corp_name,'getPatient'=>$getPatient,'trans_date'=>$trans_date,'getMedtech'=>$getMedtech,'getPatho'=>$getPatho]);
    }
    function save_medreq()
    {
        $corppack_id = $_POST['corppack_id'];
        $result_id = $_POST['result_id'];
        DB::table('trans_result_service_tbl')
            ->where('corppack_id',$corppack_id)
            ->where('result_id',$result_id)
            ->update([
                'medreq_dateofexam'=> date_create('now'),
                'medreq_examphysician'=>$_POST['examphysician'],
                'medreq_evaluated'=>$_POST['eval'],
                'medreq_history'=>$_POST['history'],
                'medreq_datediag'=>date_create($_POST['datediag']),
                'medreq_illness'=>$_POST['illness'],
                'medreq_medication'=>$_POST['medication'],
                'medreq_remarks1'=>$_POST['remark1'],
                'medreq_famhisto1'=>$_POST['famhisto1'],
                'medreq_famhisto2'=>$_POST['famhisto2'],
                'medreq_smoker'=>$_POST['smoker'],
                'medreq_sticks'=>$_POST['sticks'],
                'medreq_remarks2'=>$_POST['remarks2'],
                'medreq_packyears'=>$_POST['packyears'],
                'medreq_alcohol'=>$_POST['alcohol'],
                'medreq_bottles'=>$_POST['bottles'],
                'medreq_remarks3'=>$_POST['remarks3'],
                'medreq_shots'=>$_POST['shots'],
                'medreq_obstetric1'=>$_POST['obstetric1'],
                'medreq_obstetric2'=>$_POST['obstetric2'],
                'medreq_visual'=>$_POST['visual'],
                'medreq_temp'=>$_POST['temp'],
                'medreq_height'=>$_POST['height'],
                'medreq_weight'=>$_POST['weight'],
                'medreq_pulse'=>$_POST['pulse'],
                'medreq_bloodpressure'=>$_POST['bloodpressure'],
                'medreq_genapp'=>$_POST['genapp'],
                'medreq_eyes'=>$_POST['eyes'],
                'medreq_ear'=>$_POST['ear'],
                'medreq_neck'=>$_POST['neck'],
                'medreq_breast'=>$_POST['breast'],
                'medreq_chest'=>$_POST['chest'],
                'medreq_heart'=>$_POST['heart'],
                'medreq_abdomen'=>$_POST['abdomen'],
                'medreq_exanal'=>$_POST['exanal'],
                'medreq_exgen'=>$_POST['exgen'],
                'medreq_extermities'=>$_POST['extermities'],
                'medreq_cbc'=>$_POST['cbc'],
                'medreq_fecalysis'=>$_POST['fecalysis'],
                'medreq_urinalysis'=>$_POST['urinalysis'],
                'medreq_xray'=>$_POST['xray'],
                'medreq_drugtest'=>$_POST['drugtest'],
                'medreq_assess'=>$_POST['assess'],
            ]);
            Session::put('printResult',true);
            Session::put('result_id',$result_id);
            Session::put('corppack_id',$corppack_id);

        return redirect('/Transactions/ResultLayout/MedicalRequest');
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
    function save_Medserv1()
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
                    'medserv1_printdate'=>date_create('now'),
                    'medserv1_result'=>$_POST['result'.$service_ids[$i]],
                    'medserv1_medtech_img'=>$medtechsign,
                    'medserv1_medtech'=>$_POST['medtech'],
                    'medserv1_pathologist_img'=>$pathosign,
                    'medserv1_pathologist'=>$_POST['pathologist'],
                ]);
        }
        Session::put('printResult',true);
        Session::put('result_id',$result_id);
        Session::put('service_ids',$service_ids);

        return redirect('/Transactions/ResultLayout/MedicalService');
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
        if(Session::get('emp_type_id')== 0)
        {
            $servgroup = DB::table('service_group_tbl')
                            ->leftjoin('laboratory_tbl','laboratory_tbl.lab_id','=','service_group_tbl.lab_id')
                            ->where('ServGroupStatus',1)
                            ->get();
        }
        else
        {
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
        }
        return view('Transaction.ResultDashboard',['servgroup'=>$servgroup]);
    }
    
    public function getTransactionperGroup(Request $req)
    {

        $serv_group_id = $req->id;
        $result_id = DB::table('trans_result_service_tbl')
                        ->leftjoin('transresult_tbl','transresult_tbl.result_id','=','trans_result_service_tbl.result_id')
                        ->where('transresult_tbl.status','PENDING')
                        ->where('trans_result_service_tbl.service_group_id',$serv_group_id)
                        ->where('trans_result_service_tbl.status','PENDING')
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
                if($exam->physical_exam == 2)
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
        $corppack_id = DB::table('trans_result_service_tbl')
                        ->select('corppack_id')
                        ->where('result_id',$result_id)
                        ->where('service_id',null)
                        ->get();
        $doctor = DB::table('employee_tbl')
                    ->leftjoin('employee_role_tbl','employee_role_tbl.role_id','=','employee_tbl.emp_type_id')
                    ->leftjoin('laboratory_tbl','laboratory_tbl.lab_id','=','employee_role_tbl.lab_id')
                    ->where('role_name','Doctor')
                    ->where('EmpStatus',1)                    
                    ->where('RoleStatus',1)
                    ->where('LabStatus',1)
                    ->get();
        
        
        return view ('Result.MedicalRequest',['patient'=>$patientinfo,'tdate'=>$tdate,'datenow'=>$date,'empReb_name'=>$empReb_name,'corp_name'=>$corp_name,'corppack_id'=>$corppack_id,'doctor'=>$doctor,'result_id'=>$result_id]);
    }
    function ecg(){
        $trans_id = $_GET['trans_id'];
        $group_id = $_GET['group_id']; 
        $resultd = DB::table('transresult_tbl')->where('trans_id',$trans_id)->get();
        foreach($resultd as $r)
        {
            $result_id = $r->result_id;
        }
        $services = DB::table('trans_result_service_tbl')
                        ->leftjoin('service_tbl','service_tbl.service_id','=','trans_result_service_tbl.service_id')
                        ->where('service_tbl.service_group_id',$group_id)
                        ->where('result_id',$result_id)
                        ->where('result_ecg',1)
                        ->distinct()
                        ->get();
        $patientinfo = DB::table('transaction_tbl')
                        ->leftjoin('patient_tbl','patient_tbl.patient_id','=','transaction_tbl.trans_patient_id')
                        ->where('trans_id',$trans_id)
                        ->get();
        $doctor = DB::table('employee_tbl')
                    ->leftjoin('employee_role_tbl','employee_role_tbl.role_id','=','employee_tbl.emp_type_id')
                    ->leftjoin('laboratory_tbl','laboratory_tbl.lab_id','=','employee_role_tbl.lab_id')
                    ->where('role_name','Doctor')
                    ->where('EmpStatus',1)                    
                    ->where('RoleStatus',1)
                    ->where('LabStatus',1)
                    ->get();
        return view ('Result.Ecg',['patient'=>$patientinfo,'doctors'=>$doctor,'services'=>$services,'result_id'=>$result_id]);
    }
     function ultra(){
        $emp_type_id = Session::get('emp_type_id');
        $getLab_id = DB::table('employee_role_tbl')
                        ->leftjoin('laboratory_tbl','laboratory_tbl.lab_id','=','employee_role_tbl.lab_id')
                        ->where('role_id',$emp_type_id)
                        ->get();
        foreach($getLab_id as $lab)
        {
            $lab_id = $lab->lab_id;
        }
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
                        ->where('result_ultra',1)
                        ->distinct()
                        ->get();
        $sonologist = DB::table('employee_tbl')
                        ->leftjoin('employee_role_tbl','role_id','=','emp_type_id')
                        ->where('role_name','Sonologist')
                        ->where('EmpStatus',1)                    
                        ->where('RoleStatus',1)
                        ->where('LabStatus',1)
                        ->get();
        return view ('Result.Ultrasound',['patient'=>$patientinfo,'tdate'=>$tdate,'datenow'=>$date,'empReb_name'=>$empReb_name,'corp_name'=>$corp_name,'result_id'=>$result_id,'lab_id'=>$lab_id,'sonologist'=>$sonologist,'services'=>$services]);
    
    }
    function xray(){
        $emp_type_id = Session::get('emp_type_id');
        $getLab_id = DB::table('employee_role_tbl')
                        ->leftjoin('laboratory_tbl','laboratory_tbl.lab_id','=','employee_role_tbl.lab_id')
                        ->where('role_id',$emp_type_id)
                        ->get();
        foreach($getLab_id as $lab)
        {
            $lab_id = $lab->lab_id;
        }
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
        $radtech = DB::table('employee_tbl')
                    ->leftjoin('employee_role_tbl','role_id','=','emp_type_id')
                    ->leftjoin('laboratory_tbl','laboratory_tbl.lab_id','=','employee_role_tbl.lab_id')
                    ->where('role_name','Radio Technologist')
                    ->where('EmpStatus',1)                    
                    ->where('RoleStatus',1)
                    ->where('LabStatus',1)
                    ->get();
        $radiologist = DB::table('employee_tbl')
                    ->leftjoin('employee_role_tbl','role_id','=','emp_type_id')
                    ->leftjoin('laboratory_tbl','laboratory_tbl.lab_id','=','employee_role_tbl.lab_id')
                    ->where('role_name','Radiologist')
                    ->where('EmpStatus',1)                    
                    ->where('RoleStatus',1)
                    ->where('LabStatus',1)
                    ->get();
        $services = DB::table('trans_result_service_tbl')
                        ->leftjoin('service_tbl','service_tbl.service_id','=','trans_result_service_tbl.service_id')
                        ->where('service_tbl.service_group_id',$group_id)
                        ->where('result_id',$result_id)
                        ->where('result_xray',1)
                        ->distinct()
                        ->get();
        return view ('Result.Xray',['patient'=>$patientinfo,'tdate'=>$tdate,'datenow'=>$date,'empReb_name'=>$empReb_name,'corp_name'=>$corp_name,'result_id'=>$result_id,'lab_id'=>$lab_id,'radtech'=>$radtech,'radiologist'=>$radiologist,'services'=>$services]);
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
                        ->distinct()
                        ->get();
        $medtech = DB::table('employee_tbl')
                    ->leftjoin('employee_role_tbl','employee_role_tbl.role_id','=','employee_tbl.emp_type_id')
                    ->leftjoin('laboratory_tbl','laboratory_tbl.lab_id','=','employee_role_tbl.lab_id')
                    ->where('role_name','Medical Techonologist')
                    ->where('EmpStatus',1)                    
                    ->where('RoleStatus',1)
                    ->where('LabStatus',1)
                    ->get();
        $patho = DB::table('employee_tbl')
                    ->leftjoin('employee_role_tbl','employee_role_tbl.role_id','=','employee_tbl.emp_type_id')
                    ->leftjoin('laboratory_tbl','laboratory_tbl.lab_id','=','employee_role_tbl.lab_id')
                    ->where('role_name','Pathologist')
                    ->where('EmpStatus',1)                    
                    ->where('RoleStatus',1)
                    ->where('LabStatus',1)
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
                        ->distinct()
                        ->get();
        $medtech = DB::table('employee_tbl')
                    ->leftjoin('employee_role_tbl','employee_role_tbl.role_id','=','employee_tbl.emp_type_id')
                    ->leftjoin('laboratory_tbl','laboratory_tbl.lab_id','=','employee_role_tbl.lab_id')
                    ->where('role_name','Medical Techonologist')
                    ->where('EmpStatus',1)                    
                    ->where('RoleStatus',1)
                    ->where('LabStatus',1)
                    ->get();
        $patho = DB::table('employee_tbl')
                    ->leftjoin('employee_role_tbl','employee_role_tbl.role_id','=','employee_tbl.emp_type_id')
                    ->leftjoin('laboratory_tbl','laboratory_tbl.lab_id','=','employee_role_tbl.lab_id')
                    ->where('EmpStatus',1)                    
                    ->where('RoleStatus',1)
                    ->where('LabStatus',1)
                    ->where('role_name','Pathologist')
                    ->get();
        return view ('Result.MedicalService2',['patient'=>$patientinfo,'tdate'=>$tdate,'datenow'=>$date,'empReb_name'=>$empReb_name,'corp_name'=>$corp_name,'services'=>$services,'medtech'=>$medtech,'patho'=>$patho,'result_id'=>$result_id]);
    }
    function drugtest(){
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
        $tdate = date('F jS, Y h:i a',strtotime($trans_date));
        $date = date('F jS, Y h:i a',strtotime('now'));
        $resultd = DB::table('transresult_tbl')->where('trans_id',$trans_id)->get();
        foreach($resultd as $r)
        {
            $result_id = $r->result_id;
        }
        $services = DB::table('trans_result_service_tbl')
                        ->leftjoin('service_tbl','service_tbl.service_id','=','trans_result_service_tbl.service_id')
                        ->where('service_tbl.service_group_id',$group_id)
                        ->where('result_id',$result_id)
                        ->where('result_drug',1)
                        ->distinct()
                        ->get();
        $emp = DB::table('employee_tbl')
                    ->leftjoin('employee_role_tbl','employee_role_tbl.role_id','=','employee_tbl.emp_type_id')
                    ->leftjoin('laboratory_tbl','laboratory_tbl.lab_id','=','employee_role_tbl.lab_id')
                    ->where('role_name','Analyst')
                    ->where('EmpStatus',1)                    
                    ->where('RoleStatus',1)
                    ->where('LabStatus',1)
                    ->get();

        return view ('Result.DrugTest',['patient'=>$patientinfo,'tdate'=>$tdate,'datenow'=>$date,'empReb_name'=>$empReb_name,'corp_name'=>$corp_name,'services'=>$services,'result_id'=>$result_id,'emp'=>$emp]);
    }
    public function uploadresults()
    {
        // $transactions = DB::table('transaction_tbl')
//                     ->leftjoin('patient_tbl','patient_tbl.patient_id','=','transaction_tbl.trans_patient_id')
//                     ->leftjoin('transresult_tbl','transresult_tbl.trans_id','=','transaction_tbl.trans_id')
//                     ->where('transresult_tbl.status','PENDING')
//                     ->get();
        $emp_type_id = Session::get('emp_type_id');
        $getLab = DB::table('employee_role_tbl')
                            ->leftjoin('laboratory_tbl','employee_role_tbl.lab_id','=','laboratory_tbl.lab_id')
                            ->leftjoin('service_group_tbl','service_group_tbl.lab_id','=','laboratory_tbl.lab_id')
                            ->where('role_id',$emp_type_id)
                            ->get();
        $group_id = [];
        foreach($getLab as $lab)
        {
            $lab_id = $lab->lab_id;
            array_push($group_id,$lab->servgroup_id);
        }

        $result_id = DB::table('trans_result_service_tbl')
                        ->leftjoin('transresult_tbl','transresult_tbl.result_id','=','trans_result_service_tbl.result_id')
                        ->where('transresult_tbl.status','PENDING')
                        ->whereIn('trans_result_service_tbl.service_group_id',$group_id)
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
        $nooffiles = DB::table('trans_resultfiles_tbl')->select('result_id',DB::raw('COUNT(*) as count_row'))->distinct()->groupBy('result_id')->where('status',1)->get();
        
        $totaltransaction = DB::table('trans_result_service_tbl')->select('result_id',DB::raw('COUNT(*) as count_row'))->distinct()->groupBy('result_id')->get();
        $doneTransaction = DB::table('trans_result_service_tbl')->select('result_id',DB::raw('COUNT(*) as count_row'))->distinct()->groupBy('result_id')->where('status','DONE')->get();
        $total = 0;
        $done = 0;
         return view('Transaction.UploadOfResults',['transactions'=>$transactions,'totaltrans'=>$totaltransaction,'donetrans'=>$doneTransaction,'total'=>$total,'done'=>$done,'nooffiles'=>$nooffiles]);
    }
    public function PatientTransaction()
    {
        $trans_id = $_GET['id'];
        $result_id = DB::table('transresult_tbl')->select('result_id')->where('trans_id',$trans_id)->get();
        $table = DB::table('trans_resultfiles_tbl')
                    ->leftjoin('transaction_tbl','transaction_tbl.trans_id','=','trans_resultfiles_tbl.trans_id')
                    ->leftjoin('transresult_tbl','transresult_tbl.result_id','=','trans_resultfiles_tbl.result_id')
                    ->leftjoin('patient_tbl','patient_tbl.patient_id','=','transaction_tbl.trans_patient_id')
                    ->where('trans_resultfiles_tbl.trans_id',$trans_id)
                    ->where('trans_resultfiles_tbl.status',1)
                    ->get();
        foreach($result_id as $s)
        {
            $result_id = $s->result_id;
        }
        $getResult_id = DB::table('transresult_tbl')->where('trans_id',$trans_id)->get();
        foreach($getResult_id as $res)
        {
            $result_id = $res->result_id;
        }
        $service_id = [];
        $getServices = DB::table('trans_result_service_tbl')->where('status','PENDING')->where('result_id',$result_id)->where('corppack_id',null)->get();
        foreach($getServices as $servid)
        {
            array_push($service_id,$servid->service_id);
        }
        $corppack_id = DB::table('trans_result_service_tbl')
                        ->select('corppack_id')
                        ->where('result_id',$result_id)
                        ->where('service_id',null)
                        ->get();
        $physicalexam = 0;
        if(count($corppack_id)>0)
        {
            $physicalexam = 1;
        }
        $emp_type_id = Session::get('emp_type_id');
        $getLab_id = DB::table('employee_role_tbl')
                        ->where('role_id',$emp_type_id)
                        ->get();
        foreach($getLab_id as $lab)
        {
            $lab_id = $lab->lab_id;
        }
        $services = DB::table('service_tbl')
                    ->leftjoin('service_group_tbl','servgroup_id','=','service_group_id')
                    ->whereIn('service_id',$service_id)
                    ->where('lab_id',$lab_id)
                    ->get();
        
            $result_medserv1 = 0;
            $result_medserv2 = 0;
            $result_ecg      = 0;
            $result_xray     = 0;
            $result_ultra    = 0;
            $result_drug     = 0;
        
        foreach($services as $check)
        {
            if($check->result_medserv1 == 1)
            {
                $result_medserv1=1;
            }
            if($check->result_medserv2 == 1)
            {
                $result_medserv2 = 1;
            }
            if($check->result_ecg == 1)
            {
                $result_ecg = 1;
            }
            if($check->result_xray == 1)
            {
                $result_xray = 1;
            }
            if($check->result_ultra == 1)
            {
                $result_ultra = 1;
            }
            if($check->result_drug == 1)
            {
                $result_drug = 1;
            }
        }

        return view('Transaction.PatientTransaction',['trans_id'=>$trans_id,'result_id'=>$result_id,'table'=>$table,'physicalexam'=>$physicalexam,'result_medserv1'=>$result_medserv1,'result_medserv2'=>$result_medserv2,'result_ecg'=>$result_ecg,'result_xray'=>$result_xray,'result_ultra'=>$result_ultra,'result_drug'=>$result_drug,'services'=>$services,'corppack_id'=>$corppack_id]);
    }
    public function delete_resultfile()
    {
        $file_id = $_POST['file_id'];
        $getTransResult_id = DB::table('trans_resultfiles_tbl')->where('file_id',$file_id)->get();
        foreach($getTransResult_id as $ids)
        {
            $trans_id = $ids->trans_id;
            $result_id = $ids->result_id;
            $result_type = $ids->result_type;
        }
        if($result_type == 'Medical Request')
        {
            DB::table('trans_result_service_tbl')
                ->where('result_id',$result_id)
                ->where('service_id',null)
                ->update([
                    'status'=>'PENDING'
                ]);

            DB::table('trans_resultfiles_tbl')->where('file_id',$file_id)->update(['status'=>0]);
        }
        if($result_type == 'Medical Service 1')
        {
            DB::table('trans_result_service_tbl')
                ->leftjoin('service_tbl','service_tbl.service_id','=','trans_result_service_tbl.service_id')
                ->where('result_medserv1',1)
                ->where('result_id',$result_id)
                ->update([
                    'status'=>'PENDING'
                ]);
                DB::table('trans_resultfiles_tbl')->where('file_id',$file_id)->update(['status'=>0]);
        }
        if($result_type == 'Medical Service 2')
        {
            DB::table('trans_result_service_tbl')
                ->leftjoin('service_tbl','service_tbl.service_id','=','trans_result_service_tbl.service_id')
                ->where('result_medserv2',1)
                ->where('result_id',$result_id)
                ->update([
                    'status'=>'PENDING'
                ]);
                DB::table('trans_resultfiles_tbl')->where('file_id',$file_id)->update(['status'=>0]);
        }
        if($result_type == 'ECG')
        {
            DB::table('trans_result_service_tbl')
                ->leftjoin('service_tbl','service_tbl.service_id','=','trans_result_service_tbl.service_id')
                ->where('result_ecg',1)
                ->where('result_id',$result_id)
                ->update([
                    'status'=>'PENDING'
                ]);
                DB::table('trans_resultfiles_tbl')->where('file_id',$file_id)->update(['status'=>0]);
        }
        if($result_type == 'Xray')
        {
            DB::table('trans_result_service_tbl')
                ->leftjoin('service_tbl','service_tbl.service_id','=','trans_result_service_tbl.service_id')
                ->where('result_xray',1)
                ->where('result_id',$result_id)
                ->update([
                    'status'=>'PENDING'
                ]);
                DB::table('trans_resultfiles_tbl')->where('file_id',$file_id)->update(['status'=>0]);
        }
        if($result_type == 'Ultrasound')
        {
            DB::table('trans_result_service_tbl')
                ->leftjoin('service_tbl','service_tbl.service_id','=','trans_result_service_tbl.service_id')
                ->where('result_ultra',1)
                ->where('result_id',$result_id)
                ->update([
                    'status'=>'PENDING'
                ]);
                DB::table('trans_resultfiles_tbl')->where('file_id',$file_id)->update(['status'=>0]);
        }
        if($result_type == 'Drug Test')
        {
            DB::table('trans_result_service_tbl')
                ->leftjoin('service_tbl','service_tbl.service_id','=','trans_result_service_tbl.service_id')
                ->where('result_drug',1)
                ->where('result_id',$result_id)
                ->update([
                    'status'=>'PENDING'
                ]);
                DB::table('trans_resultfiles_tbl')->where('file_id',$file_id)->update(['status'=>0]);
        }
        Session::flash('delete',true);
        return redirect()->back();
    }
    public function uploadResultFile()
    {
           
        $trans_id = $_POST['transaction_id'];
        $result_id= $_POST['result_id'];
        $result_layout = $_POST['result_layout'];
        if($result_layout == 'medreq')
        {
            $result_type = "Medical Request";
            if(isset($_POST['corppack_id']))
            {
                DB::table('trans_result_service_tbl')->where('result_id',$result_id)->where('corppack_id',$_POST['corppack_id'])
                    ->update([
                        'status'=>'DONE'
                    ]);
            }
        }
        if($result_layout == 'medserv1')
        {
            $result_type = "Medical Service 1";
            if(isset($_POST['service_id']))
            {
                $service_id = [];
                DB::table('trans_result_service_tbl')->where('result_id',$result_id)->whereIn('service_id',$_POST['service_id'])
                    ->update([
                        'status'=>'DONE'
                    ]);
            }
        }
        if($result_layout == 'medserv2')
        {
            $result_type = "Medical Service 2";
            if(isset($_POST['service_id']))
            {
                DB::table('trans_result_service_tbl')->where('result_id',$result_id)->whereIn('service_id',$_POST['service_id'])
                    ->update([
                        'status'=>'DONE'
                    ]);
            }
        }
        if($result_layout == 'ecg')
        {
            $result_type = "ECG";
            if(isset($_POST['service_id']))
            {
                DB::table('trans_result_service_tbl')->where('result_id',$result_id)->whereIn('service_id',$_POST['service_id'])
                    ->update([
                        'status'=>'DONE'
                    ]);
            }
        }
        if($result_layout == 'xray')
        {
            $result_type = "Xray";
            if(isset($_POST['service_id']))
            {
                DB::table('trans_result_service_tbl')->where('result_id',$result_id)->whereIn('service_id',$_POST['service_id'])
                    ->update([
                        'status'=>'DONE'
                    ]);
            }
        }
        if($result_layout == 'ultra')
        {
            $result_type = 'Ultrasound';
            if(isset($_POST['service_id']))
            {
                DB::table('trans_result_service_tbl')->where('result_id',$result_id)->whereIn('service_id',$_POST['service_id'])
                    ->update([
                        'status'=>'DONE'
                    ]);
            }
        }
        if($result_layout == 'drug')
        {
            $result_type = "Drug Test";
            if(isset($_POST['service_id']))
            {
                DB::table('trans_result_service_tbl')->where('result_id',$result_id)->whereIn('service_id',$_POST['service_id'])
                    ->update([
                        'status'=>'DONE'
                    ]);
            } 
        }

        $file = $_FILES['file'];
        $file_error = $file['error'];
        // File properties
        $file_name = $file['name'];
        $file_tmp = $file['tmp_name'];
        $file_size = $file['size'];

        //Work out the file extension
        $file_ext = explode('.',$file_name);
        $file_ext = strtolower(end($file_ext));

        $allowed = array('pdf','jpg','png','txt','doc','docx','xlsx','ppt','pptx');
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
                            'result_type'=>$result_type,
                            'trans_id'  =>  $trans_id,
                            'result_id' =>  $result_id,
                            'date'      =>  date_create('now'),
                            'file'      =>  $file_name_new
                        ]);
                    }
                }
            }
        }
        Session::flash('add',true);
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
