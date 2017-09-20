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
}
