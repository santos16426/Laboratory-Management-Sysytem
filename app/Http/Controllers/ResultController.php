<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;

class ResultController extends Controller
{
     public function resultdashboard(){
        $servgroup = DB::table('service_group_tbl')->where('ServGroupStatus',1)->get();
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
        return view('Transaction.AddLayout',['id'=>$id,'gid'=>$gid]);
    }

    public function ecg(){
        $trans_id = $_GET['id'];
        $patientinfo = DB::table('transaction_tbl')
            ->leftjoin('patient_tbl','patient_tbl.patient_id','=','transaction_tbl.trans_patient_id')
            ->where('trans_id',$trans_id)
            ->get();
        return view('Transaction.ecg',['patientinfo'=>$patientinfo]);
    }
    public function ultra(){
        $trans_id = $_GET['id'];
        $patientinfo = DB::table('transaction_tbl')
            ->leftjoin('patient_tbl','patient_tbl.patient_id','=','transaction_tbl.trans_patient_id')
            ->where('trans_id',$trans_id)
            ->get();
        return view('Transaction.ultra',['patientinfo'=>$patientinfo]);
    }
    public function xray(){
        $trans_id = $_GET['id'];
        $patientinfo = DB::table('transaction_tbl')
            ->leftjoin('patient_tbl','patient_tbl.patient_id','=','transaction_tbl.trans_patient_id')
            ->where('trans_id',$trans_id)
            ->get();
        return view('Transaction.xray',['patientinfo'=>$patientinfo]);
    }
    public function medicalReport()
    {
        $trans_id = $_GET['id'];
        $patientinfo = DB::table('transaction_tbl')
            ->leftjoin('patient_tbl','patient_tbl.patient_id','=','transaction_tbl.trans_patient_id')
            ->where('trans_id',$trans_id)
            ->get();

        return view('Transaction.medicalReport',['patientinfo'=>$patientinfo]);
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
}
