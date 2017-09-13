<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
class TransactionController extends Controller
{
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
}
