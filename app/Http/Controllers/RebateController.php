<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
class RebateController extends Controller
{
    public function rebatepercent()
    {
		$rebate = DB::table('rebate_tbl')->orderBy('created_at','desc')->get();
		return view('Maintenance.RebatePercentage',['rebate'=>$rebate]);
    }
    function save_rebatePercentage()
    {
		$rebatepercent = $_POST['rebatepercent'];
		DB::table('rebate_tbl')->insert
		([
		'percentage'=>$rebatepercent,
		'created_at'=>date_create('now')
		]);
		Session::flash('add', 'Success!');
		return redirect()->back();
    }
    function emprebate()
    {
		$emp_worebates = DB::table('employee_tbl')
			->leftjoin('rolefields_tbl','rolefields_tbl.role_id','=','employee_tbl.emp_type_id')
			->leftjoin('emp_rebate_tbl','emp_rebate_tbl.emp_id','=','employee_tbl.emp_id')
			->where('employee_tbl.EmpStatus',1)
			->where('rolefields_tbl.rebate',1)
			->where('emp_rebate_tbl.EmpRebStatus',null)
			->where('emp_rebate_tbl.emp_id',null)

			->orwhere('rolefields_tbl.rebate',1)->where('employee_tbl.EmpStatus',1)
			->where('emp_rebate_tbl.EmpRebStatus',0)->select('employee_tbl.emp_id as emp_id','emp_fname','emp_mname','emp_lname')->get();

		$emp_rebates = DB::table('employee_tbl')
			->leftjoin('rolefields_tbl','rolefields_tbl.role_id','=','employee_tbl.emp_type_id')
			->leftjoin('emp_rebate_tbl','emp_rebate_tbl.emp_id','=','employee_tbl.emp_id')
			->leftjoin('employee_role_tbl','employee_role_tbl.role_id','=','employee_tbl.emp_type_id')
			->where('rolefields_tbl.rebate',1)
			->where('employee_tbl.EmpStatus',1)
			->where('emp_rebate_tbl.EmpRebStatus',1)->get();

		return view('Maintenance.EmployeeRebate',['emp_rebates'=>$emp_rebates,'emp_worebates'=>$emp_worebates]);
    }
	public function deleteRebate(){
		DB::table('emp_rebate_tbl')->where('emp_id',$_POST['id'])->update(['EmpRebStatus'=>0]);
		Session::flash('delete', true);
		return redirect()->back();
	}
	public function save_empRebate(){
		$rebate_id = DB::table('rebate_tbl')->where('created_at','>','CURRENT_DATE')->select('rebate_id')->max('rebate_id');
		$emp_id = $_POST['emp_id'];
		$check = DB::table('emp_rebate_tbl')->where('emp_id',$emp_id)->count();
		if($check == 1)
		{
		DB::table('emp_rebate_tbl')
		->update([
		  'rebate_id' =>  $rebate_id
		  ]);
		DB::table('emprebate_log_tbl')
		->insert([
		'emp_id'  =>  $emp_id,
		'rebate_id' =>  $rebate_id,
		'updated_at'  =>  date_create('now')
		]);
		Session::flash('add', true);
		return redirect()->back();
		}
		
	}
}
