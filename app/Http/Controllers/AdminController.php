<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
class AdminController extends Controller
{
    public function __construct()
    {
        date_default_timezone_set('Singapore');
    }
    function pagenotfound()
    {
        return view('Pages.PageNotFound');
    }
    function queue()
    {
        return view('Pages.Queueing');
    }
    function dashboard()
    {
        $emp_count = DB::table('employee_tbl')
            ->leftjoin('employee_role_tbl','employee_role_tbl.role_id','=','employee_tbl.emp_type_id')
            ->leftjoin('laboratory_tbl','laboratory_tbl.lab_id','=','employee_role_tbl.lab_id')
            ->where('EmpStatus',1)
            ->where('RoleStatus',1)
            ->where('LabStatus',1)
            ->orWhere('EmpStatus',1)
            ->where('RoleStatus',1)
            ->where('LabStatus',null)
            ->count();
        $service_count = DB::table('service_tbl')
            ->leftjoin('service_group_tbl','service_group_tbl.servgroup_id','=','service_tbl.service_group_id')
            ->leftjoin('service_type_tbl','service_type_tbl.service_type_id','=','service_tbl.service_type_id')
            ->leftjoin('laboratory_tbl','laboratory_tbl.lab_id','=','service_group_tbl.lab_id')
            ->where('ServiceStatus',1)
            ->where('ServGroupStatus',1)
            ->where('ServTypeStatus',1)
            ->where('LabStatus',1)
            ->orWhere('ServiceStatus',1)
            ->where('ServGroupStatus',1)
            ->where('ServTypeStatus',null)
            ->where('LabStatus',1)
            ->orWhere('ServiceStatus',1)
            ->where('ServGroupStatus',null)
            ->where('ServTypeStatus',null)
            ->where('LabStatus',null)
            ->count();
        $patientcount = DB::table('patient_tbl')->count();
        
    	return view('Dashboards.AdminDashboard',['patient_count'=>$patientcount,'service_count'=>$service_count,'emp_count'=>$emp_count]);
    	
    }
}
