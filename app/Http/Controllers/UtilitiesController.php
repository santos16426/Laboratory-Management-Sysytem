<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
class UtilitiesController extends Controller
{
    function reactivation()
    {
    	return view('Utilities.Reactivation');
    }
    function companydetails()
    {
    	return view('Utilities.CompanyDetails');
    }
}
