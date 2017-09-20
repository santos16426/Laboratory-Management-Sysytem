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
}
