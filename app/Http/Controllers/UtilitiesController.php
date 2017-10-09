<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
class UtilitiesController extends Controller
{
	public function __construct()
    {
        date_default_timezone_set('Singapore');
    }
	function save_userAccess()
	{

		$addlab = 0;
		$uplab = 0;
		$dellab = 0;
		$addemp = 0;
		$upemp = 0;
		$delemp = 0;
		$addemptype = 0;
		$upemptype = 0;
		$delemptype = 0;
		$editpercent = 0;
		$addempreb = 0;
		$delempreb = 0;
		$addserv = 0;
		$upserv = 0;
		$delserv = 0;
		$addservtype = 0;
		$upservtype = 0;
		$delservtype = 0;
		$addservgrp = 0;
		$upservgrp = 0;
		$delservgrp = 0;
		$addpack = 0;
		$uppack = 0;
		$delpack = 0;
		$addcorp = 0;
		$upcorp = 0;
		$delcorp = 0;
		$addcorppack = 0;
		$upcorppack = 0;
		$delcorppack = 0;
		$addpatient = 0;
		$availserv = 0;
		$corpbill = 0;
		$rebatebill = 0;
		$addresult = 0;
		$upresult = 0;
		$census = 0;
		$trans = 0;
		$corprep = 0;
		$rebaterep = 0;
		$uppatient = 0;
		$delpatient = 0;


		if(isset($_POST['addlab']))
		{
			$addlab = 1;
		}
		if(isset($_POST['uplab']))
		{
			$uplab = 1;
		}
		if(isset($_POST['dellab']))
		{
			$dellab = 1;
		}
		if(isset($_POST['addemp']))
		{
			$addemp = 1;
		}
		if(isset($_POST['upemp']))
		{
			$upemp = 1;
		}
		if(isset($_POST['delemp']))
		{
			$delemp = 1;
		}
		if(isset($_POST['addemptype']))
		{
			$addemptype = 1;
		}
		if(isset($_POST['upemptype']))
		{
			$upemptype = 1;
		}
		if(isset($_POST['delemptype']))
		{
			$delemptype = 1;
		}
		if(isset($_POST['editpercent']))
		{
			$editpercent = 1;
		}
		if(isset($_POST['addempreb']))
		{
			$addempreb = 1;
		}
		if(isset($_POST['delempreb']))
		{
			$delempreb = 1;
		}
		if(isset($_POST['addserv']))
		{
			$addserv = 1;
		}
		if(isset($_POST['upserv']))
		{
			$upserv = 1;
		}
		if(isset($_POST['delserv']))
		{
			$delserv = 1;
		}
		if(isset($_POST['addservtype']))
		{
			$addservtype = 1;
		}
		if(isset($_POST['upservtype']))
		{
			$upservtype = 1;
		}
		if(isset($_POST['delservtype']))
		{
			$delservtype = 1;
		}
		if(isset($_POST['addservgrp']))
		{
			$addservgrp = 1;
		}
		if(isset($_POST['upservgrp']))
		{
			$upservgrp = 1;
		}
		if(isset($_POST['delservgrp']))
		{
			$delservgrp = 1;
		}
		if(isset($_POST['addpack']))
		{
			$addpack = 1;
		}
		if(isset($_POST['uppack']))
		{
			$uppack = 1;
		}
		if(isset($_POST['delpack']))
		{
			$delpack = 1;
		}
		if(isset($_POST['addcorp']))
		{
			$addcorp = 1;
		}
		if(isset($_POST['upcorp']))
		{
			$upcorp = 1;
		}
		if(isset($_POST['delcorp']))
		{
			$delcorp = 1;
		}
		if(isset($_POST['addcorppack']))
		{
			$addcorppack = 1;
		}
		if(isset($_POST['upcorppack']))
		{
			$upcorppack = 1;
		}
		if(isset($_POST['delcorppack']))
		{
			$delcorppack = 1;
		}
		if(isset($_POST['addpatient']))
		{
			$addpatient = 1;
		}	
		if(isset($_POST['uppatient']))
		{
			$uppatient = 1;
		}
		if(isset($_POST['delpatient']))
		{
			$delpatient = 1;
		}
		if(isset($_POST['availserv']))
		{
			$availserv = 1;
		}
		if(isset($_POST['corpbill']))
		{
			$corpbill = 1;
		}
		if(isset($_POST['rebatebill']))
		{
			$rebatebill = 1;
		}
		if(isset($_POST['addresult']))
		{
			$addresult = 1;
		}
		if(isset($_POST['upresult']))
		{
			$upresult = 1;
		}
		if(isset($_POST['census']))
		{
			$census = 1;
		}
		if(isset($_POST['trans']))
		{
			$trans = 1;
		}
		if(isset($_POST['corprep']))
		{
			$corprep = 1;
		}
		if(isset($_POST['rebaterep']))
		{
			$rebaterep = 1;
		}
		if(($_POST['emp_type_id']== 0))
			{
				Session::put('addlab',$addlab);
				Session::put('uplab',$uplab);
				Session::put('dellab',$dellab);
				Session::put('addemp',$addemp);
				Session::put('upemp',$upemp);
				Session::put('delemp',$delemp);
				Session::put('addemptype',$addemptype);
				Session::put('upemptype',$upemptype);
				Session::put('delemptype',$delemptype);
				Session::put('editpercent',$editpercent);
				Session::put('addempreb',$addempreb);
				Session::put('delempreb',$delempreb);
				Session::put('addserv',$addserv);
				Session::put('upserv',$upserv);
				Session::put('delserv',$delserv);
				Session::put('addservtype',$addservtype);
				Session::put('upservtype',$upservtype);
				Session::put('delservtype',$delservtype);
				Session::put('addservgrp',$addservgrp);
				Session::put('upservgrp',$upservgrp);
				Session::put('delservgrp',$delservgrp);
				Session::put('addpack',$addpack);
				Session::put('uppack',$uppack);
				Session::put('delpack',$delpack);
				Session::put('addcorp',$addcorp);
				Session::put('upcorp',$upcorp);
				Session::put('delcorp',$delcorp);
				Session::put('addcorppack',$addcorppack);
				Session::put('upcorppack',$upcorppack);
				Session::put('delcorppack',$delcorppack);
				Session::put('addpatient',$addpatient);
				Session::put('availserv',$availserv);
				Session::put('corpbill',$corpbill);
				Session::put('rebatebill',$rebatebill);
				Session::put('addresult',$addresult);
				Session::put('upresult',$upresult);
				Session::put('census',$census);
				Session::put('trans',$trans);
				Session::put('corprep',$corprep);
				Session::put('rebaterep',$rebaterep);
			}
		DB::table('employee_useraccess_tbl')->where('emp_type_id',$_POST['emp_type_id'])->update([
			'addlab'=>$addlab,
			'uplab'=>$uplab,
			'dellab'=>$dellab,
			'addemp'=>$addemp,
			'upemp'=>$upemp,
			'delemp'=>$delemp,
			'addemptype'=>$addemptype,
			'upemptype'=>$upemptype,
			'delemptype'=>$delemptype,
			'editpercent'=>$editpercent,
			'addempreb'=>$addempreb,
			'delempreb'=>$delempreb,
			'addserv'=>$addserv,
			'upserv'=>$upserv,
			'delserv'=>$delserv,
			'addservtype'=>$addservtype,
			'upservtype'=>$upservtype,
			'delservtype'=>$delservtype,
			'addservgrp'=>$addservgrp,
			'upservgrp'=>$upservgrp,
			'delservgrp'=>$delservgrp,
			'addpack'=>$addpack,
			'uppack'=>$uppack,
			'delpack'=>$delpack,
			'addcorp'=>$addcorp,
			'upcorp'=>$upcorp,
			'delcorp'=>$delcorp,
			'addcorppack'=>$addcorppack,
			'upcorppack'=>$upcorppack,
			'delcorppack'=>$delcorppack,
			'addpatient'=>$addpatient,
			'uppatient'=>$uppatient,
			'delpatient'=>$delpatient,
			'availserv'=>$availserv,
			'corpbill'=>$corpbill,
			'rebatebill'=>$rebatebill,
			'addresult'=>$addresult,
			'upresult'=>$upresult,
			'census'=>$census,
			'trans'=>$trans,
			'corprep'=>$corprep,
			'rebaterep'=>$rebaterep
		]);
		Session::flash('update',true);
		return redirect()->back();
	}
	function retrieveAccess(Request $req)
	{
		$emp_type_id = $req->emp_type_id;
		$var = DB::table('employee_useraccess_tbl')->where('emp_type_id',$emp_type_id)->get();
		return response()->json($var);
	}
	function Useraccess(){
		$adminaccess = DB::table('employee_useraccess_tbl')->where('emp_type_id',0)->get();
		$useraccess = DB::table('employee_useraccess_tbl')
			->leftjoin('employee_role_tbl','employee_role_tbl.role_id','=','emp_type_id')
			->leftjoin('laboratory_tbl','laboratory_tbl.lab_id','=','employee_role_tbl.lab_id')
			->where('RoleStatus',1)
			->where('LabStatus',1)
			->whereNotIn('emp_type_id',[0])
			->orWhere('RoleStatus',1)
			->where('LabStatus',null)
			->whereNotIn('emp_type_id',[0])
			
			->get();
        return view ('Utilities.UserAccess',['admin'=>$adminaccess,'users'=>$useraccess]);
    }
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
