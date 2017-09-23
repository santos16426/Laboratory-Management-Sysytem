<?php

namespace App\Http\Controllers;
use App\employeeCount;
use App\serviceCount;
use App\patientCount;
use Illuminate\Http\Request;
use DB;
class AdminController extends Controller
{
    function dashboard()
    {
    	return view('Dashboards.AdminDashboard')
		->with('employeeCount', employeeCount::selectRaw('count(emp_id) as totalCount')->get())
		->with('serviceCount', serviceCount::selectRaw('count(service_id)as totalCount')->get())
		->with('patientCount', patientCount::selectRaw('count(patient_id)as totalCount')->get());
    	
    }

	//Pang debug wag muna alisin
    function empCount()
    {
    	return view('Dashboards.AdminDashboard')
		->with('employeeCount', employeeCount::selectRaw('count(emp_id) as totalCount')->get())
		->with('serviceCount', serviceCount::selectRaw('count(service_id)as totalCount')->get())
		->with('patientCount', patientCount::selectRaw('count(patient_id)as totalCount')->get());	
   }
}
