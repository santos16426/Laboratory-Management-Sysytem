<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class WebController extends Controller
{
    public function Website()
    {
    	return view('website.website');
    }
    public function proceedPatientResult()
    {
        $code = $_POST['code'];
        $lname = $_POST['name'];
        $check = DB::table('patient_tbl')->where('claimCode',$code)->where('patient_lname',$lname)->count();
        if($check == 1)
        {
            $patientinfo = DB::table('patient_tbl')->where('claimCode',$code)->where('patient_lname',$lname)->get();
            foreach($patientinfo as $get)
            {
                $patient_id = $get->patient_id;
            }
            $transactions = DB::table('transaction_tbl')
                        ->leftjoin('transresult_tbl','transresult_tbl.trans_id','=','transaction_tbl.trans_id')
                        ->where('transresult_tbl.status','DONE')
                        ->where('trans_patient_id',$patient_id)
                        ->get();
            return view('website.patientresult',['transactions'=>$transactions,'patientinfo'=>$patientinfo]);
        }
        else
        {
             return view('website.website');   
        }
    	
    }
}
