<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
class WebController extends Controller
{
    function resservform(){
        $serv_id = $_POST['redserv_id'];
        DB::table('service_tbl')
            ->where('service_id',$serv_id)
            ->update([
             'status'=> 1
             
        ]);
        return redirect()->back();
    }
    function delservform(){

        $serv_id = $_POST['delserv_id'];
        DB::table('service_tbl')
            ->where('service_id',$serv_id)
            ->update([
             'status'=> 0
             
        ]);
        return redirect()->back();
    }

    function resform(){
        $doc_id = $_POST['resdoc_id'];
        DB::table('doctor_tbl')
            ->where('doctor_id',$doc_id)
            ->update([
             'status'=> 1
             
        ]);
        return redirect()->back();
    }
    function delform(){

        $doc_id = $_POST['deldoc_id'];
        DB::table('doctor_tbl')
            ->where('doctor_id',$doc_id)
            ->update([
             'status'=> 0
             
        ]);
        return redirect()->back();
    }
    function mewform(){
        $docname = $_POST['newdocname'];
        $specialization = $_POST['newspecialization'];
        $contact = $_POST['newcontact'];
        
        DB::table('doctor_tbl')
            ->insert([
              'doctor_name'=>$docname,
              'specialization'=>$specialization,
              'contact'=>$contact
             
        ]);
        return redirect()->back();
    }

    function upform(){
        $docname = $_POST['docname'];
        $specialization = $_POST['specialization'];
        $contact = $_POST['contact'];
        $doc_id = $_POST['doc_id'];
        DB::table('doctor_tbl')
            ->where('doctor_id',$doc_id)
            ->update([
              'doctor_name'=>$docname,
              'specialization'=>$specialization,
              'contact'=>$contact
             
        ]);
        return redirect()->back();
    }
    function upservform(){
        $serv_name = $_POST['serv_name'];
       
        $serv_id = $_POST['serv_id'];
        DB::table('service_tbl')
            ->where('service_id',$serv_id)
            ->update([
              'service_name'=>$serv_name
             
        ]);
        return redirect()->back();
    }
    function getService(Request $req){
        $var = DB::table('service_tbl')->where('service_id',$req->id)->get();
        return response()->json($var);
    }
    function mewservform(){
        $serv_name = $_POST['newserv_name'];
       
        DB::table('service_tbl')
            ->insert([
              'service_name'=>$serv_name
             
        ]);
        return redirect()->back();
    }
    function getDoctor(Request $req){
        $var = DB::table('doctor_tbl')->where('doctor_id',$req->id)->get();
        return response()->json($var);
    }
    function doctors(){
        $table = DB::table('doctor_tbl')->get();
        return view('Website.doctors',['table'=>$table]);
    }
    function service(){
        $table = DB::table('service_tbl')->get();
        return view('Website.service',['table'=>$table]);
    }
    function logged(){
        $table = DB::table('save_table')->leftjoin('doctor_tbl','doctor_tbl.doctor_id','=','save_table.doctor')->get();
        var_dump($table);
        Session::put('login',true);
        return view('Website.GetFiles',['table'=>$table]);
    }
    function save(){
        $service = $_POST['service'];
        $fname = $_POST['fname'];
        $mname = $_POST['mname'];
        $lname = $_POST['lname'];
        $contact = $_POST['contact'];
        $age = $_POST['age'];
        $location = $_POST['location'];
        $date = $_POST['date'];
        $doctor = $_POST['doctor'];
        DB::table('save_table')->insert
        ([
            'full_name' => $fname. ' '. $mname. ' ' .$lname,
            'age' => $age,
            'address'=>$location,
            'sched_date'=>date_create($date),
            'doctor'=>$doctor,
            'contact'=>$contact
        ]);
        $max = DB::table('save_table')->select('tran_id')->max('tran_id');
        for($x = 0; $x < count($service); $x++){
            DB::table('trans_service_tbl')->insert
            ([
                'trans_id'=>$max,
                'service_id'=>$service[$x]
            ]);
        }
        Session::flash('success',true);
        return redirect()->back();

    }
    public function Website()
    {
        $service = DB::table('service_tbl')->where('status',1)->get();
        $doctors = DB::table('doctor_tbl')->where('status',1)->get();
    	return view('Website.website',['service'=>$service, 'doctor'=>$doctors]);
    }
    function GetFiles()
    {
       
       $table = DB::table('save_table')->leftjoin('doctor_tbl','doctor_tbl.doctor_id','=','save_table.doctor')->get();
       $service = DB::table('service_tbl')->leftjoin('trans_service_tbl','trans_service_tbl.service_id','=','service_tbl.service_id')->get();
        return view('Website.GetFiles',['table'=>$table,'service'=>$service]);
    }
    function changepass()
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
            $newpass = $_POST['newpass'];
            $confirmpass = $_POST['confirmpass'];
            if($newpass == $confirmpass)
            {
                DB::table('patient_tbl')->where('claimCode',$code)->update(['webPass'=>$newpass]);
                Session::flash('success','Successfully change your password, Please log in');
                return redirect()->back();
            }
            else
            {
                Session::flash('failupdate','New password and confirm password mismatch');
                return redirect()->back();
            }
        }
        else
        {
            Session::flash('failupdate','Patient not found');
            return redirect()->back();
        }
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
                Session::flash('success',true);
                return view('Website.patientresult',['transactions'=>$transactions,'patientinfo'=>$patientinfo]);
        }
        else
        {
            Session::flash('incorrect','Code and password mismatch');
            return redirect()->back();
        }
    }
}

