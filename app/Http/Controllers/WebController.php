<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
class WebController extends Controller
{
    public function Website()
    {
    	return view('Website.website');
    }
   
    function login()
    {
        $code = $_POST['code'];
        $name = $_POST['name'];
        $combination =$code.'-'.$name;

        $check = DB::table('patient_tbl')->select(DB::raw("CONCAT(claimCode,'-',webPass)as checkacc"))->get();
        foreach($check as $check)
        {
            if($check->checkacc == $combination)
            {
                $access = 1; 
                break;
            }
            else
            {
                $access = 0;
            }
        }
        if($access == 1)
        {
            $patientinfo = DB::table('patient_tbl')->where('claimCode',$code)->get();
                foreach($patientinfo as $get)
                {
                    $patient_id = $get->patient_id;
                }
                $transactions = DB::table('transaction_tbl')
                            ->leftjoin('transresult_tbl','transresult_tbl.trans_id','=','transaction_tbl.trans_id')
                            ->where('transresult_tbl.status','DONE')
                            ->where('trans_patient_id',$patient_id)
                            ->get();
                return view('Website.patientresult',['transactions'=>$transactions,'patientinfo'=>$patientinfo]);
        }
        else
        {
            return redirect()->back();
        }
    }
}

