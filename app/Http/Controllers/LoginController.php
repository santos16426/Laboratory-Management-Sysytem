<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use DB;
class LoginController extends Controller
{
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
    		return redirect('/Admin/Dashboard');
    	}
    	else
    	{
    		Session::flash('loginfail',true);
			return redirect()->back();
    	}
    	
    }
}
