<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class RemoteController extends Controller
{
    function maximumAmount(Request $req)
    {
        $maxinput = $req->checkAmount;
        $amount = $req->amount;
        dd($req);
        if($amount <= $maxinput)
        {
            $isAvailable = true;
        }
        else
        {
            $isAvailable = false;
        }
        echo json_encode(array('valid' => $isAvailable,));
    }

    public function checkEmpType()
    {
    	$firstcheck = DB::table('employee_role_tbl')
    		->where('role_name',$_GET['emptype'])
    		->count();
    		
    	
    	if($firstcheck == 0)
    	{
    		$isAvailable = true;
    	}
    	else
    	{
    		$isAvailable = false;
    	}
    	echo json_encode(array('valid' => $isAvailable,));
    }

    public function checkDept()
    {
        $firstcheck = DB::table('laboratory_tbl')
            ->where('lab_name',$_GET['labname'])
            ->count();
            
        
        if($firstcheck == 0)
        {
            $isAvailable = true;
        }
        else
        {
            $isAvailable = false;
        }
        echo json_encode(array('valid' => $isAvailable,));
    }

    public function checkServgrp()
    {
    	$firstcheck = DB::table('service_group_tbl')
    		->where('servgroup_name',$_GET['servicegroup'])
    		->count();
    		
    	
    	if($firstcheck == 0)
    	{
    		$isAvailable = true;
    	}
    	else
    	{
    		$isAvailable = false;
    	}
    	echo json_encode(array('valid' => $isAvailable,));
    }

    public function checkUsername()
    {
        $firstcheck = DB::table('users')
            ->where('username',$_GET['username'])
            ->count();
            
        
        if($firstcheck == 0)
        {
            $isAvailable = true;
        }
        else
        {
            $isAvailable = false;
        }
        echo json_encode(array('valid' => $isAvailable,));
    }

    public function checkLicense()
    {
        $firstcheck = DB::table('employee_log_tbl')
            ->where('license_no',$_GET['license'])
            ->count();
            
        
        if($firstcheck == 0)
        {
            $isAvailable = true;
        }
        else
        {
            $isAvailable = false;
        }
        echo json_encode(array('valid' => $isAvailable,));
    }

    public function checkEmpcontact()
    {
        $firstcheck = DB::table('employee_log_tbl')
            ->where('emp_contact',$_GET['contact'])
            ->count();
            
        
        if($firstcheck == 0)
        {
            $isAvailable = true;
        }
        else
        {
            $isAvailable = false;
        }
        echo json_encode(array('valid' => $isAvailable,));
    }

    public function checkPatientcontact()
    {
        $firstcheck = DB::table('patient_log_tbl')
            ->where('patient_contact',$_GET['patient_contact'])
            ->count();
            
        
        if($firstcheck == 0)
        {
            $isAvailable = true;
        }
        else
        {
            $isAvailable = false;
        }
        echo json_encode(array('valid' => $isAvailable,));
    }

    public function checkPatientemail()
    {
        $firstcheck = DB::table('patient_log_tbl')
            ->where('patient_email',$_GET['patient_email'])
            ->count();
            
        
        if($firstcheck == 0)
        {
            $isAvailable = true;
        }
        else
        {
            $isAvailable = false;
        }
        echo json_encode(array('valid' => $isAvailable,));
    }

    public function checkServtype()
    {
    	$firstcheck = DB::table('service_type_tbl')
    		->where('service_type_name',$_GET['servTypeName'])
    		->count();
    		
    	
    	if($firstcheck == 0)
    	{
    		$isAvailable = true;
    	}
    	else
    	{
    		$isAvailable = false;
    	}
    	echo json_encode(array('valid' => $isAvailable,));
    }

    public function checkService()
    {
    	$firstcheck = DB::table('service_tbl')
    		->where('service_name',$_GET['srvcname'])
    		->count();
    		
    	
    	if($firstcheck == 0)
    	{
    		$isAvailable = true;
    	}
    	else
    	{
    		$isAvailable = false;
    	}
    	echo json_encode(array('valid' => $isAvailable,));
    }

    public function checkPackage()
    {
    	$firstcheck = DB::table('package_tbl')
    		->where('pack_name',$_GET['packagename'])
    		->count();
    		
    	
    	if($firstcheck == 0)
    	{
    		$isAvailable = true;
    	}
    	else
    	{
    		$isAvailable = false;
    	}
    	echo json_encode(array('valid' => $isAvailable,));
    }

    public function checkCorpName()
    {
    	$firstcheck = DB::table('corporate_accounts_tbl')
    		->where('corp_name',$_GET['companyname'])
    		->count();
    		
    	
    	if($firstcheck == 0)
    	{
    		$isAvailable = true;
    	}
    	else
    	{
    		$isAvailable = false;
    	}
    	echo json_encode(array('valid' => $isAvailable,));
    }

    public function checkContacts()
    {
    	$firstcheck = DB::table('corporate_accounts_tbl')
    		->where('corp_contact',$_GET['contactnumber'])
    		->count();
    		
    	
    	if($firstcheck == 0)
    	{
    		$isAvailable = true;
    	}
    	else
    	{
    		$isAvailable = false;
    	}
    	echo json_encode(array('valid' => $isAvailable,));
    }

    public function checkEmail()
    {
    	$firstcheck = DB::table('corporate_accounts_tbl')
    		->where('corp_email',$_GET['email'])
    		->count();
    		
    	
    	if($firstcheck == 0)
    	{
    		$isAvailable = true;
    	}
    	else
    	{
    		$isAvailable = false;
    	}
    	echo json_encode(array('valid' => $isAvailable,));
    }
    public function checkUpPack()
    {
    	var_dump($_GET['packid']);
    	$firstcheck = DB::table('package_tbl')	
    		->where('pack_name',$_GET['packagename'])
    		->whereNotIn('pack_id',$_GET['packid'])
    		->count();


		if($firstcheck == 0)
    	{
    		$isAvailable = true;
    	}
    	else
    	{
    		$isAvailable = false;
    	}
    	echo json_encode(array('valid' => $isAvailable,));
    }
}
