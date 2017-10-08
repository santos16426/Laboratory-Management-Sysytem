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

    		if($type == 0)
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
            $access = DB::table('employee_useraccess_tbl')->where('emp_type_id',$type)->get();
            foreach($access as $access)
            {
                Session::put('addlab',$access->addlab);
                Session::put('uplab',$access->uplab);
                Session::put('dellab',$access->dellab);
                Session::put('addemp',$access->addemp);
                Session::put('upemp',$access->upemp);
                Session::put('delemp',$access->delemp);
                Session::put('addemptype',$access->addemptype);
                Session::put('upemptype',$access->upemptype);
                Session::put('delemptype',$access->delemptype);
                Session::put('editpercent',$access->editpercent);
                Session::put('addempreb',$access->addempreb);
                Session::put('delempreb',$access->delempreb);
                Session::put('addserv',$access->addserv);
                Session::put('upserv',$access->upserv);
                Session::put('delserv',$access->delserv);
                Session::put('addservtype',$access->addservtype);
                Session::put('upservtype',$access->upservtype);
                Session::put('delservtype',$access->delservtype);
                Session::put('addservgrp',$access->addservgrp);
                Session::put('upservgrp',$access->upservgrp);
                Session::put('delservgrp',$access->delservgrp);
                Session::put('addpack',$access->addpack);
                Session::put('uppack',$access->uppack);
                Session::put('delpack',$access->delpack);
                Session::put('addcorp',$access->addcorp);
                Session::put('upcorp',$access->upcorp);
                Session::put('delcorp',$access->delcorp);
                Session::put('addcorppack',$access->addcorppack);
                Session::put('upcorppack',$access->upcorppack);
                Session::put('delcorppack',$access->delcorppack);
                Session::put('addpatient',$access->addpatient);
                Session::put('availserv',$access->availserv);
                Session::put('corpbill',$access->corpbill);
                Session::put('rebatebill',$access->rebatebill);
                Session::put('addresult',$access->addresult);
                Session::put('upresult',$access->upresult);
                Session::put('census',$access->census);
                Session::put('trans',$access->trans);
                Session::put('corprep',$access->corprep);
                Session::put('rebaterep',$access->rebaterep);
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
