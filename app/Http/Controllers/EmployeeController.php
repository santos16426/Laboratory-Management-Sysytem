<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
class EmployeeController extends Controller
{
    function emptype()
    {
    	$labs = DB::table('laboratory_tbl')->where('LabStatus',1)->get();
    	$emptype = DB::table('employee_role_tbl')
    		->leftjoin('laboratory_tbl','laboratory_tbl.lab_id','=','employee_role_tbl.lab_id')
    		->get();
    	return view('Maintenance.EmployeeType',['emptype'=> $emptype,'labs'=>$labs]);
    }
    function  emp()
    {
    	$emp1 = DB::table('employee_tbl')
    		->leftjoin('employee_role_tbl','employee_role_tbl.role_id','=','employee_tbl.emp_type_id')
    		->leftjoin('medtech_rank','rank_id','=','emp_medtech_rank_id')
    		->leftjoin('laboratory_tbl','laboratory_tbl.lab_id','=','employee_role_tbl.lab_id')
    		->get();
        $empTypes = DB::table('employee_role_tbl')
        	->leftjoin('laboratory_tbl','laboratory_tbl.lab_id','=','employee_role_tbl.lab_id')
        	->where('laboratory_tbl.LabStatus',1)
        	->where('RoleStatus',1)
        	->orWhere('LabStatus',null)
        	->where('RoleStatus',1)
        	->get();
        $ranks = DB::table('medtech_rank')->get();
        return view('Maintenance.Employee',['emp1' => $emp1,'empTypes'=> $empTypes,'ranks'=>$ranks] );
    	
    }
    public function updateEmployeeType(Request $req){
    	$emptype = DB::table('employee_role_tbl')->where('role_id',$req->id)->get();
    	return response()->json($emptype);
    }
    public function save_empType(){
    	$lab_id = $_POST['lab_id'];

		$x = array();
		$x[0]=0;
		$x[1]=0;
		$x[2]=0;
		$x[3]=0;
		$x[4]=0;
		$x[5]=0;
		$x[6]=0;
		if (isset($_POST['number'])) {
		$x[0]=1;
		}
		if (isset($_POST['account'])) {
		$x[1]=1;
		$x[2]=1;  
		}
		if (isset($_POST['license'])) {
		$x[3]=1;
		}
		if (isset($_POST['rank'])) {
		$x[4]=1;
		}
		if (isset($_POST['address'])) {
		$x[5]=1;
		}
		if (isset($_POST['rebate'])) {
		$x[6]=1;
		}
		if($lab_id == "Null")
		{
			$lab_id = null;
		}
		DB::table('employee_role_tbl')
			->insert([
				'role_name'=>$_POST['emptype'],
				'lab_id'=>$lab_id
			]);
		$role_id = DB::table('employee_role_tbl')
			->select('role_id')
			->max('role_id');
		DB::table('rolefields_tbl')
			->insert([
				'role_id'=>$role_id,
				'address'=>$x[5],
				'rank'=>$x[4],
				'username'=>$x[1],
				'password'=>$x[2],
				'contact'=>$x[0],
				'license'=>$x[3],
				'rebate'=>$x[6]
			]);
		Session::flash('add', 'true');
	return redirect()->back();
   	}
	public function update_empType(){
		$upemptype_id = $_POST['upemptype_id'];
		$updateemptype = $_POST['updateemptype'];
		DB::table('employee_role_tbl')
			->where('role_id',$upemptype_id)
			->update([
				'role_name'=>$updateemptype
			]);
		Session::flash('update', 'true');
		return redirect()->back();
	}
	public function deleteEmployeeType(){
		DB::table('employee_role_tbl')
			->where('role_id',$_POST['id'])
			->update([
				'RoleStatus'=>0
			]);
		Session::flash('delete', 'true');
		return redirect()->back();
    }
    public function getFields(Request $req){
      $var1 = DB::table('rolefields_tbl')->where('role_id',$req->ID)->get();
      return response()->json($var1);
    }
    public function updateEmpDetails(Request $req){
      
      $empdata = DB::select(DB::raw("SELECT * FROM employee_tbl e JOIN rolefields_tbl r ON r.role_id = e.emp_type_id LEFT OUTER JOIN medtech_rank m on m.rank_id =e.emp_medtech_rank_id WHERE e.emp_id = $req->id"));

      return response()->json($empdata);
    }
    public function viewEmpDetails(Request $req){
      
      $empdata = DB::select(DB::raw("SELECT * FROM employee_tbl e JOIN rolefields_tbl r ON r.role_id = e.emp_type_id LEFT OUTER JOIN medtech_rank m on m.rank_id =e.emp_medtech_rank_id WHERE e.emp_id = $req->id"));

      return response()->json($empdata);
    }
    public function update_employee(){

		$empid = ($_POST['update_emp_id'])*1;
		$emp_type = $_POST['update_emp_type'];
		$checkfields = DB::table('rolefields_tbl')->where('role_id',$emp_type)->get();
		$firstname = $_POST['firstname'];
		$middlename = $_POST['middlename'];
		$lastname = $_POST['lastname'];
		$rank_id = null;
		$address = null;
		$contact = null;
		$license = null;
		$username = null;
		$password = null;
	     
		if($checkfields[0]->address==1){
			$address = $_POST['address'];
		}

		if($checkfields[0]->license==1){
			$license = $_POST['license'];

		}
		if($checkfields[0]->contact==1){
			$contact = $_POST['contact'];
		}
		if($checkfields[0]->rank==1)
		{
			$rank_id = $_POST['rank_id'];
		}
		$file_name_new = $_POST['defaultemp'];
		if(isset($_FILES['emp_pic']))
		{

			$file = $_FILES['emp_pic'];
			$file_error = $file['error'];
			// File properties
			$file_name = $file['name'];
			$file_tmp = $file['tmp_name'];
			$file_size = $file['size'];

			//Work out the file extension
			$file_ext = explode('.',$file_name);
			$file_ext = strtolower(end($file_ext));

			$allowed = array('jpg','png','jpeg','bmp');
			if(in_array($file_ext,$allowed))
			{
			    if($file_error === 0)
			    {
			        if($file_size <= 2097152)
			        {
			            $file_name_new = uniqid('',true) . '.' . $file_ext;
			            $file_destination = 'Employee_images/' . $file_name_new;
			           	move_uploaded_file($file_tmp, $file_destination);
			        }
			    }
			}
		} 
		DB::table('employee_tbl')->where('emp_id',$empid)
		->update([
			'emp_fname'=>$firstname,
			'emp_mname'=>$middlename,
			'emp_lname'=>$lastname,
			'emp_address'=>$address,
			'license_no'=>$license,
			'emp_contact'=>$contact,
			'emp_medtech_rank_id'=>$rank_id,
			'emp_pic'=>$file_name_new
		]);

      

		DB::table('employee_log_tbl')->insert
		([
			'emp_id'=>$empid,
			'emp_fname'=>$firstname,
			'emp_mname'=>$middlename,
			'emp_lname'=>$lastname,
			'emp_address'=>$address,
			'license_no'=>$license,
			'emp_contact'=>$contact,
			'emp_medtech_rank_id'=>$rank_id,
			'updated_at'=>date_create('now'),
			'emp_pic'=>$file_name_new
		]);
    	Session::flash('update', 'true');
    	return redirect()->back();
    }
	public function save_employee(){
		$file_name_new = "default.jpg";
		if(isset($_FILES['emp_pic']))
		{
			$file = $_FILES['emp_pic'];
	        $file_error = $file['error'];
	        // File properties
	        $file_name = $file['name'];
	        $file_tmp = $file['tmp_name'];
	        $file_size = $file['size'];

	        //Work out the file extension
	        $file_ext = explode('.',$file_name);
	        $file_ext = strtolower(end($file_ext));

	        $allowed = array('jpg','png','jpeg','bmp');
	        if(in_array($file_ext,$allowed))
	        {
	            if($file_error === 0)
	            {
	                if($file_size <= 2097152)
	                {
	                    $file_name_new = uniqid('',true) . '.' . $file_ext;
	                    $file_destination = 'Employee_images/' . $file_name_new;
	                   	move_uploaded_file($file_tmp, $file_destination);
	                }
	            }
	        }
		}

		$emp_type = $_POST['emp_type'];
		$checkfields = DB::table('rolefields_tbl')->where('role_id',$emp_type)->get();
		$emp_type = $_POST['emp_type'];
		$firstname = $_POST['firstname'];
		$middlename = $_POST['middlename'];
		$lastname = $_POST['lastname'];
		$rank_id = null;
		$address = null;
		$contact = null;
		$license = null;
		$username = null;
		$password = null;
		$createaccountctr = null;

		if($checkfields[0]->rank==1){
		$rank_id = $_POST['rank_id'];
		}
		if($checkfields[0]->address==1){
		$address = $_POST['address'];
		}

		if($checkfields[0]->license==1){
		$license = $_POST['license'];

		}
		if($checkfields[0]->contact==1){
		$contact = $_POST['contact'];

		}
		if($checkfields[0]->username==1){
		$username = $_POST['username'];
		$createaccountctr = 1;

		}
		if($checkfields[0]->password==1){
		$password = $_POST['password'];
		$confirmpass = $_POST['confirmpass'];

		}
		DB::table('employee_tbl')->insert
		([
		'emp_pic'=>$file_name_new,
		'emp_fname'=>$firstname,
		'emp_mname'=>$middlename,
		'emp_lname'=>$lastname,
		'emp_type_id'=>$emp_type,
		'emp_medtech_rank_id'=>$rank_id,
		'emp_address'=>$address,
		'license_no'=>$license,
		'emp_contact'=>$contact
		]);

		$empid = DB::table('employee_tbl')->select('emp_id')->max('emp_id');

		DB::table('employee_log_tbl')->insert
		([
		'emp_pic'=>$file_name_new,
		'emp_id'=>$empid,
		'emp_fname'=>$firstname,
		'emp_mname'=>$middlename,
		'emp_lname'=>$lastname,
		'emp_address'=>$address,
		'license_no'=>$license,
		'emp_contact'=>$contact,
		'emp_medtech_rank_id'=>$rank_id,
		'updated_at'=>date_create('now')
		]);

		if($createaccountctr <> null)
		{
		$getEmpData = DB::table('employee_tbl')->select('emp_id')->max('emp_id');
		DB::table('users')->insert(
		[
		'username'  =>  $username,
		'password'  =>  ($password),
		'role_id'   =>  $emp_type,
		'display_name'  =>  $firstname,
		'created_at'  =>  date_create('now'),
		'updated_at'  =>  date_create('now'),
		'emp_id'  =>  $getEmpData
		]
		);
		}
		Session::flash('add', 'true');
		return redirect()->back();

	}
	public function deleteEmployee(){
      DB::table('employee_tbl')->where('emp_id',$_POST['id'])->update(['EmpStatus'=>0]);
      Session::flash('delete',true);
      return redirect()->back();
    }
}
