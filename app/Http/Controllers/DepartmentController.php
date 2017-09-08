<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class DepartmentController extends Controller
{
    function department()
    {
    	return view('Maintenance.Department');
    }
}
