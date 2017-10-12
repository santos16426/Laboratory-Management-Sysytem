<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use DB;
class LoginController extends Controller
{
	function logout()
	{
		Session::flush();
		return redirect('/');
	}
	function showLoginForm()
	{
		return view('Pages.Login');
	}
    public function doLogin(){
    	$username = $_POST['user'];
    	$password = $_POST['password'];
    	$checkuser = $username ."-" .$password;
    	$access = 0;
    	$checkname = DB::select(DB::raw('SELECT *,CONCAT(username,"-",password) as comp FROM users'));
    	foreach($checkname as $validusers)
    	{
    		if($validusers->comp == $checkuser)
    		{
    			$emp_id = $validusers->emp_id;
    			$type = $validusers->role_id;
    			$displayname = $validusers->display_name;
                if($type!=0)
                {
                    $checkEmp = DB::table('employee_tbl')
                        ->leftjoin('employee_role_tbl','role_id','=','emp_type_id')
                        ->leftjoin('laboratory_tbl','laboratory_tbl.lab_id','=','employee_role_tbl.lab_id')
                        ->where('emp_id',$emp_id)
                        ->where('RoleStatus',1)
                        ->where('LabStatus',1)
                        ->where('EmpStatus',1)->count();
                    if($checkEmp > 0)
                    {
                        $access = 1;
                    }
                    else
                    {
                        $access = 0;
                    }
                }
    			else
                {
                    $access = 1;
                }
    			break;
    		}
    		else
    		{    			
    			$access = 0;
    			
    		}
    	}
    	if($access == 1)
    	{

    		if($type != 0)
    		{
	    		$emp_details = DB::table('employee_tbl')->where('emp_id',$emp_id)->get();
	    		foreach($emp_details as $empdetails)
	    		{
	    			Session::put('emp_id',$empdetails->emp_id);
	    			Session::put('emp_pic',$empdetails->emp_pic);
	    			Session::put('emp_type_id',$empdetails->emp_type_id);
	    			Session::put('display_name',$displayname);
	    		}
    		}
    		else{
    			Session::put('emp_pic','default.jpg');
    			Session::put('emp_type_id',$type);
    			Session::put('display_name',$displayname);
    		}

            $accessmodules = DB::table('employee_useraccess_tbl')->where('emp_type_id',$type)->get();
            foreach($accessmodules as $accessmodules)
            {
                Session::put('addlab',$accessmodules->addlab);
                Session::put('uplab',$accessmodules->uplab);
                Session::put('dellab',$accessmodules->dellab);
                Session::put('addemp',$accessmodules->addemp);
                Session::put('upemp',$accessmodules->upemp);
                Session::put('delemp',$accessmodules->delemp);
                Session::put('addemptype',$accessmodules->addemptype);
                Session::put('upemptype',$accessmodules->upemptype);
                Session::put('delemptype',$accessmodules->delemptype);
                Session::put('editpercent',$accessmodules->editpercent);
                Session::put('addempreb',$accessmodules->addempreb);
                Session::put('delempreb',$accessmodules->delempreb);
                Session::put('addserv',$accessmodules->addserv);
                Session::put('upserv',$accessmodules->upserv);
                Session::put('delserv',$accessmodules->delserv);
                Session::put('addservtype',$accessmodules->addservtype);
                Session::put('upservtype',$accessmodules->upservtype);
                Session::put('delservtype',$accessmodules->delservtype);
                Session::put('addservgrp',$accessmodules->addservgrp);
                Session::put('upservgrp',$accessmodules->upservgrp);
                Session::put('delservgrp',$accessmodules->delservgrp);
                Session::put('addpack',$accessmodules->addpack);
                Session::put('uppack',$accessmodules->uppack);
                Session::put('delpack',$accessmodules->delpack);
                Session::put('addcorp',$accessmodules->addcorp);
                Session::put('upcorp',$accessmodules->upcorp);
                Session::put('delcorp',$accessmodules->delcorp);
                Session::put('addcorppack',$accessmodules->addcorppack);
                Session::put('upcorppack',$accessmodules->upcorppack);
                Session::put('delcorppack',$accessmodules->delcorppack);
                Session::put('addpatient',$accessmodules->addpatient);
                Session::put('availserv',$accessmodules->availserv);
                Session::put('corpbill',$accessmodules->corpbill);
                Session::put('rebatebill',$accessmodules->rebatebill);
                Session::put('addresult',$accessmodules->addresult);
                Session::put('upresult',$accessmodules->upresult);
                Session::put('census',$accessmodules->census);
                Session::put('trans',$accessmodules->trans);
                Session::put('corprep',$accessmodules->corprep);
                Session::put('rebaterep',$accessmodules->rebaterep);
                Session::put('uppatient',$accessmodules->uppatient);
                Session::put('delpatient',$accessmodules->delpatient);
            }
    		Session::put('loggedin',true);
    		return redirect('/Admin/Dashboard');
    	}
    	else
    	{
    		Session::flash('loginfail',true);
			return redirect()->back();
    	}
    	
    }
}
