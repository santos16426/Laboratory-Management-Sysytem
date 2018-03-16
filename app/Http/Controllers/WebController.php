<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
class WebController extends Controller
{
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
            'service_id' => $service,
            'full_name' => $fname. ' '. $mname. ' '.$lname,
            'age' => $age,
            'address'=>$location,
            'sched_date'=>date_create($date),
            'doctor'=>$doctor,
            'contact'=>$contact
        ]);
        Session::flash('success',true);
        return redirect()->back();

    }
    public function Website()
    {
    	return view('Website.website');
    }
    function GetFiles()
    {
       
        $table = DB::table('save_table')->get();
        return view('Website.GetFiles',['table'=>$table]);
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

