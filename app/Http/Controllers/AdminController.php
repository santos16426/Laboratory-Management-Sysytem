<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class AdminController extends Controller
{
    function dashboard()
    {
    	return view('Dashboards.AdminDashboard');
    }
    
}
