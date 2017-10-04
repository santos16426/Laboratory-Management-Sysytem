<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
class UtilitiesController extends Controller
{
	function activatecorppack()
	{
		DB::table('corp_package_tbl')->where('corpPack_id',$_POST['id'])->update(['CorpPackStatus'=>1]);
		Session::flash('reactivate',true);
		return redirect()->back();
	}
	function activecorp()
	{
		DB::table('corporate_accounts_tbl')->where('corp_id',$_POST['id'])->update(['CorpStatus'=>1]);
      	Session::flash('reactivate',true);
      	return redirect()->back();
	}
	function activatePack()
	{
		DB::table('package_tbl')->where('pack_id',$_POST['id'])->update(['PackStatus'=>1]);
      	Session::flash('reactivate', true);
      	return redirect()->back();
	}
	function activateServGroup()
	{
		DB::table('service_group_tbl')->where('servgroup_id',$_POST['id'])->update(['ServGroupStatus'=>1]);
	      Session::flash('reactivate',true);
	      return redirect()->back();
	}
	function activateServtype()
	{
		DB::table('service_type_tbl')->where('service_type_id',$_POST['id'])->update(['ServTypeStatus'=>1]);
      	Session::flash('reactivate', true);
      	return redirect()->back();
	}
	function activateServ()
	{
		DB::table('service_tbl')->where('service_id',$_POST['id'])->update(['ServiceStatus'=>1]);
		Session::flash('reactivate', true);
		return redirect()->back();
	}	
	function activateEmp()
	{
		DB::table('employee_tbl')->where('emp_id',$_POST['id'])->update(['EmpStatus'=>1]);
      	Session::flash('reactivate',true);
      	return redirect()->back();
	}
	function activateEmpType()
	{
		DB::table('employee_role_tbl')->where('role_id',$_POST['id'])->update(['RoleStatus'=>1]);
		Session::flash('reactivate', 'true');
		return redirect()->back();
	}
	function activateLab()
	{
		DB::table('laboratory_tbl')->where('lab_id',$_POST['id'])->update(['LabStatus'=>1]);
        Session::flash('reactivate', true);
        return redirect()->back();
	}

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
