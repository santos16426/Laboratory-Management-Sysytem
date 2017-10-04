<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
class UtilitiesController extends Controller
{
    function reactivation()
    {
    	$lab = DB::table('laboratory_tbl')->where('LabStatus',0)->get();
    	$emptype = DB::table('employee_role_tbl')
    		->leftjoin('laboratory_tbl','laboratory_tbl.lab_id','=','employee_role_tbl.lab_id')
    		->where('RoleStatus',0)
    		->get();
    	$emp = DB::table('employee_tbl')->where('EmpStatus',0)->get();
    	$servgroup = DB::table('service_group_tbl')->where('ServGroupStatus',0)->get();
    	$servtype = DB::table('service_type_tbl')->where('ServTypeStatus',0)->get();
    	$serv = DB::table('service_tbl')->where('ServiceStatus',0)->get();
    	$pack = DB::table('package_tbl')->where('PackStatus',0)->get();
    	$corp = DB::table('corporate_accounts_tbl')->where('CorpStatus',0)->get();
    	$corppack = DB::table('corp_package_tbl')
    		->leftjoin('corporate_accounts_tbl','corporate_accounts_tbl.corp_id','=','corp_package_tbl.corp_id')
    		->where('CorpPackStatus',0)->get();
    	return view('Utilities.Reactivation',['lab'=>$lab,'emptype'=>$emptype,'emp'=>$emp,'servgroup'=>$servgroup,'servtype'=>$servtype,'serv'=>$serv,'pack'=>$pack,'corp'=>$corp,'corppack'=>$corppack]);
    }
    function companydetails()
    {
    	return view('Utilities.CompanyDetails');
    }
}
