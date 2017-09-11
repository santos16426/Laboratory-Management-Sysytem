<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
class PackageController extends Controller
{
    function package()
    {
		$servicegroup = DB::table('service_group_tbl')
      ->leftjoin('laboratory_tbl','laboratory_tbl.lab_id','=','service_group_tbl.lab_id')
      ->where('ServGroupStatus',1)
      ->where('LabStatus',1)
      ->get();
		$serviceoffer = DB::table('service_tbl')
		->leftjoin('service_group_tbl','service_group_tbl.servgroup_id','=','service_tbl.service_group_id')
		->leftjoin('service_type_tbl','service_type_tbl.service_type_id','=','service_tbl.service_type_id')
    ->leftjoin('laboratory_tbl','laboratory_tbl.lab_id','=','service_group_tbl.lab_id')
    ->where('service_tbl.ServiceStatus',1)
    ->where('laboratory_tbl.LabStatus',1)
    ->where('service_group_tbl.ServGroupStatus',1)
    ->where('service_type_tbl.ServTypeStatus',1)
    ->orWhere('service_tbl.ServiceStatus',1)
    ->where('laboratory_tbl.LabStatus',null)
    ->where('service_group_tbl.ServGroupStatus',null)
    ->where('service_type_tbl.ServTypeStatus',null)
    ->orWhere('service_tbl.ServiceStatus',1)
    ->where('laboratory_tbl.LabStatus',1)
    ->where('service_group_tbl.ServGroupStatus',1)
    ->where('service_type_tbl.ServTypeStatus',null)
    ->get();
		$packages = DB::table('package_tbl')->get();
		return view('Maintenance.Package',['serviceoffer'=>$serviceoffer,'packages'=>$packages,'servicegroup'=>$servicegroup]);
    }
    public function updatePackage(Request $req){
        $servtype = DB::table('package_tbl')->where('pack_id',$req->id)->get();
        $servoffer = DB::table('package_service_tbl')->where('pack_serv_package_id',$req->id)->get();
        return response()->json([$servtype,$servoffer]); 
    }
    public function viewServiceinPackage(Request $req)
    {
        $var1 = DB::table('package_service_tbl')
                ->leftjoin('service_tbl','service_tbl.service_id','=','package_service_tbl.pack_serv_serv_id')
                ->where('pack_serv_package_id',$req->id)
                ->get();
        return response()->json($var1);
    }
    public function update_package(){
        DB::table('package_tbl')->where('pack_id',$_POST['packid'])->update([
            'pack_name' => $_POST['packagename'],
            'pack_price' => $_POST['packageprice'] ,
            ]);
      $services  = $_POST['services'];
      DB::table('package_service_tbl')->where('pack_serv_package_id',$_POST['packid'])->delete();
      foreach($services as $servid)
      {
        DB::table('package_service_tbl')->insert([
          'pack_serv_package_id'  =>  $_POST['packid'],
          'pack_serv_serv_id'     =>  $servid
        ]);
        DB::table('package_service_log_tbl')->insert([
          'packserv_package_id'  =>  $_POST['packid'],
          'packserv_serv_id'     =>  $servid,
          'updated_at'          =>  date_create('now')
        ]);
      }
      Session::flash('update', true);
      return redirect()->back();
    }  
    public function save_package(){
      $packagename = $_POST['packagename'];
      $services  =$_POST['services'];
      $packageprice = $_POST['packageprice'];
      DB::table('package_tbl')->insert([
        'pack_name' =>  $packagename,
        'pack_price'  =>  $packageprice
      ]);
      $pack_id = DB::table('package_tbl')->select('pack_id')->max('pack_id');
      DB::table('package_log_tbl')->insert([
        'pack_id' =>  $pack_id,
        'pack_name' =>  $packagename,
        'pack_price'  =>  $packageprice,
        'updated_at'  =>  date_create('now')
      ]);
      foreach($services as $servid)
      {
        DB::table('package_service_tbl')->insert([
          'pack_serv_package_id'  =>  $pack_id,
          'pack_serv_serv_id'     =>  $servid
        ]);
        DB::table('package_service_log_tbl')->insert([
          'packserv_package_id'  =>  $pack_id,
          'packserv_serv_id'     =>  $servid,
          'updated_at'          =>  date_create('now')
        ]);
      }
      Session::flash('add', true);
      return redirect()->back();
    }
    public function deletePackage(){
      DB::table('package_tbl')->where('pack_id',$_POST['id'])->update(['status'=>0]);
      Session::flash('delete', true);
      return redirect()->back();
    }
}
