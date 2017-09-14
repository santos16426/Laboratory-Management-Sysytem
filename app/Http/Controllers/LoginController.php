<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
class LoginController extends Controller
{
    public function doLogin(){
    	if(Auth::attempt(['username'=> $_POST['user'],'password'=> $_POST['password']])){
    		return redirect('/Admin/Dashboard');
    	}
    	else
    	{
    		return redirect('/');
    	}
    }
}
