<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
class ServiceController extends Controller
{
    function servgroup()
    {
		$serviceGroups = DB::table('service_group_tbl')->where('status',1)->get();
		return view('Maintenance.ServiceGroup',['serviceGroups'=>$serviceGroups]);
    }
    public function updateServGroup(Request $req){
    	$servgroup = DB::table('service_group_tbl')->where('servgroup_id',$req->id)->where('status',1)->get();
    	return response()->json($servgroup);
    }
    public function deleteServiceGroup(){
      DB::table('service_group_tbl')->where('servgroup_id',$_POST['id'])->update(['status'=>0]);
      Session::flash('delete',true);
      return redirect()->back();
    }
    public function save_servGroup(){
    $servGroupName = ucfirst($_POST['servicegroup']);
    DB::table('service_group_tbl')->insert([
      'servgroup_name'=>$servGroupName
      ]);
    $servgroup_id = DB::table('service_group_tbl')->select('servGroup_id')->max('servgroup_id');

    DB::table('servgroup_log_tbl')->insert([
      'servgroup_id'  =>  $servgroup_id,
      'servgroup_name'  =>  $servGroupName,
      'updated_at'    =>  date_create('now')
    ]);
		Session::flash('add',true);
      
    return redirect()->back();
    }
    public function update_servGroup(){
    	$upservice_id = $_POST['upservice_id'];
    	$upservicegroup = $_POST['upservicegroup'];
    	DB::table('service_group_tbl')->
      where('servgroup_id',$upservice_id)->
      update([
        'servgroup_name'=>$upservicegroup
      ]);
      DB::table('servgroup_log_tbl')->insert([
        'servgroup_id'=>$upservice_id,
        'servgroup_name'=>$upservicegroup,
        'updated_at'=>date_create('now')
      ]);
      Session::flash('update', true);
    	return redirect()->back();
    }
    function servtype()
    {
			$serviceGroup = DB::table('service_group_tbl')->where('status',1)->get();
			$serviceType = DB::table('service_group_tbl')->join('service_type_tbl','service_type_tbl.service_type_group_id','=','service_group_tbl.servgroup_id')->where('service_type_tbl.status',1)->where('service_group_tbl.status',1)->get();
			return view('Maintenance.ServiceType',['serviceType'=>$serviceType,'serviceGroup'=>$serviceGroup]);
    }
    public function updateServType(Request $req){
    	$servtype = DB::table('service_type_tbl')->where('service_type_id',$req->id)->where('status',1)->get();
    	return response()->json($servtype);	
    }
    public function deleteServiceType(){
      DB::table('service_type_tbl')->where('service_type_id',$_POST['id'])->update(['status'=>0]);
      Session::flash('delete', true);
      return redirect()->back();
    }
    public function save_servType(){
      $servGroup_id = $_POST['servGroup_id'];
      $servTypeName = $_POST['servTypeName'];
      $servtype_id = 0;
      DB::table('service_type_tbl')
      	->insert([
      			'service_type_name'=>$servTypeName,
      			'service_type_group_id'=>$servGroup_id
      		]);
      $servtype_id = DB::table('service_type_tbl')->select('service_type_id')->max('service_type_id');

      DB::table('service_type_log_tbl')
      	->insert([
      			'updated_at'	=>	date_create('now'),
      			'service_type_id'	=>$servtype_id,
      			'service_type_name'=>$servTypeName
      		]);
      Session::flash('add', true);      
      return redirect()->back();
    }
    function serv()
    {
      $groupdropdown = DB::table('service_group_tbl')->where('status',1)->get();
        $typedropdown = DB::table('service_group_tbl')->join('service_type_tbl','service_type_tbl.service_type_group_id','=','service_group_tbl.servgroup_id')->get();
        
        $service = DB::table('service_tbl')
        ->leftjoin('service_group_tbl','service_group_tbl.servgroup_id','=','service_tbl.service_group_id')
        ->leftjoin('service_type_tbl','service_type_tbl.service_type_id','=','service_tbl.service_type_id')
        ->where('service_tbl.status',1)
        ->where('service_group_tbl.status',1)
        ->where('service_type_tbl.status',1)
        ->orWhere('service_tbl.status',1)
        ->where('service_group_tbl.status',null)
        ->where('service_type_tbl.status',null)
        ->orWhere('service_tbl.status',1)
        ->where('service_group_tbl.status',1)
        ->where('service_type_tbl.status',null)
        ->get();

      return view('Maintenance.Service',['service'=>$service,'groupdropdown'=>$groupdropdown,'typedropdown'=>$typedropdown]);
      
    }
    public function getServiceType(Request $req){
      $var = DB::table('service_type_tbl')->where('service_type_group_id',$req->ID)->get();
      return response()->json($var);
    }
    public function getService(Request $req){
      $var = DB::table('service_tbl')->where('service_id',$req->ID)->get();
      return response()->json($var);
    }
    public function update_servType(){
      $upservtypeid = $_POST['upservTypeId'];
      $upservTypeName = $_POST['upservTypeName'];
      DB::table('service_type_tbl')->where('service_type_id',$upservtypeid)->update(['service_type_name'=>$upservTypeName]);
      DB::table('service_type_log_tbl')->insert([
        'service_type_id'=>$upservtypeid,
        'service_type_name'=>$upservTypeName,
        'updated_at'=>date_create('now')
      ]);
      Session::flash('update', true);
      return redirect()->back();
    }
    public function deleteService(){
      DB::table('service_tbl')->where('service_id',$_POST['id'])->update(['status'=>0]);
      Session::flash('delete', true);
      return redirect()->back();
    }
    public function save_Service(){
      $srvcname = $_POST['srvcname'];
      $srvcgrp_id = $_POST['srvcgrp_id'];
      $srvctyp_id = $_POST['srvctyp_id'];
      $srvc_price = $_POST['srvc_price'];
      $med_request = "No";
      if(isset($_POST['med_req']))
      {
        $med_request = $_POST['med_req'];
      }
      if($srvcgrp_id==0){
        $srvcgrp_id=null;
      }
      if($srvctyp_id==0){
        $srvctyp_id=null;
      }
      DB::table('service_tbl')->insert
      ([
        'medical_request'=>$med_request,
        'service_name'=>$srvcname,
        'service_group_id'=>$srvcgrp_id,
        'service_type_id'=>$srvctyp_id,
        'service_price'=>$srvc_price
      ]);
      $service_id = DB::table('service_tbl')->select('service_id')->max('service_id');
      DB::table('service_log_tbl')->insert(
        [
          'service_name'=>$srvcname,
          'service_id'=>$service_id,
          'service_price'=>$srvc_price,
          'updated_at'=>date_create('now')
        ]);
      Session::flash('add', true);
       return redirect()->back();
    }
    public function update_service(){
      DB::table('service_tbl')->where('service_id',$_POST['srvcid'])->update([
            'service_name' => $_POST['srvcname'],
            'service_price' => $_POST['srvc_price'],
            ]);
      DB::table('service_log_tbl')
        ->insert([
            'service_id'  =>  $_POST['srvcid'],
            'service_name' => $_POST['srvcname'],
            'service_price' => $_POST['srvc_price'],
            'updated_at'  => date_create('now')
          ]);
      Session::flash('update', true);
      return redirect()->back();
    }
}
