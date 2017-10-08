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
