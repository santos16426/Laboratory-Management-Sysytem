<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
class CorporateAccountController extends Controller
{
    public function update_corpPackage()
    {
      $corpid = $_POST['corpid'];
      $corpPack_id = $_POST['corpPack_id'];
      $uppackname = $_POST['uppackname'];
      $uppackprice = $_POST['uppackprice'];
      $upservices = $_POST['upservices'];
      $upexam = $_POST['upexam'];
      $gender = 3;
      $age =  'All' ;
      if(isset($_POST['gender']))
      {
        $gender = $_POST['gender'];
      }
      if(isset($_POST['age']))
      {
        $age = $_POST['age'];
      }
      DB::table('corp_package_tbl')
        ->where('corpPack_id',$corpPack_id)
        ->update([
          'corpPack_name'=>$uppackname,
          'price'=>$uppackprice,
          'corp_id'=>$corpid,
          'age'=>$age,
          'gender'=>$gender,
          'physical_exam'=>$upexam
      ]);
      
      DB::table('corp_package_log_tbl')
        ->insert([
          'corpPack_name'=>$uppackname,
          'corpPack_id'=>$corpPack_id,
          'price'=>$uppackprice,
          'corp_id'=>$corpid,
          'age'=>$age,
          'gender'=>$gender,
          'updated_at'=>date_create('now'),
          'physical_exam'=>$upexam
      ]);
      foreach($upservices as $ps)
      {
        DB::table('corp_packserv_tbl')
          ->insert([
            'corpPack_id' =>  $corpPack_id,
            'service_id'  =>  $ps
          ]);
        DB::table('corp_packserv_log_tbl')
          ->insert([
            'corpPack_id' =>  $corpPack_id,
            'service_id'  =>  $ps,
            'updated_at'  =>  date_create('now')
          ]);
      }
      Session::flash('add',true);
      return redirect('/Maintenance/Corporate/CreatePackage?corp_id='.$corpid);
    }
    public function updateCorporatePackage(Request $req)
    {
       $servoffer = DB::table('corp_packserv_tbl')
            ->leftjoin('corp_package_tbl','corp_package_tbl.corpPack_id','=','corp_packserv_tbl.corpPack_id')
            ->leftjoin('corporate_accounts_tbl','corporate_accounts_tbl.corp_id','=','corp_package_tbl.corp_id')
            ->where('corp_package_tbl.corpPack_id',$req->id)
            ->get();
        // $servoffer = DB::table('corporate_accounts_tbl')->where('corp_id',$req->id)->get();
        return response()->json($servoffer);
    }
    function deleteCorporatePackage()
    {
      $id = $_POST['id'];
      DB::table('corp_package_tbl')->where('corpPack_id',$id)->update([
        'CorpPackStatus'=>0
      ]);
      Session::flash('delete',true);
      return redirect('/Maintenance/Corporate/CreatePackage?corp_id='.$id);
    }
    function save_corpPackage()
    {
      $corp_id = $_POST['corp_id'];
      $packname = $_POST['packname'];
      $packprice = $_POST['packprice'];
      $services = $_POST['services'];
      $exam = $_POST['exam'];
      $gender = 3;
      $age =  'All' ;
      if(isset($_POST['gender']))
      {
        $gender = $_POST['gender'];
      }
      if(isset($_POST['age']))
      {
        $age = $_POST['age'];
      }
      DB::table('corp_package_tbl')
        ->insert([
          'corpPack_name'=>$packname,
          'price'=>$packprice,
          'corp_id'=>$corp_id,
          'age'=>$age,
          'gender'=>$gender,
          'physical_exam'=>$exam
      ]);
      $corpPack_id = DB::table('corp_package_tbl')->select('corpPack_id')->max('corpPack_id');
      DB::table('corp_package_log_tbl')
        ->insert([
          'corpPack_name'=>$packname,
          'corpPack_id'=>$corpPack_id,
          'price'=>$packprice,
          'corp_id'=>$corp_id,
          'age'=>$age,
          'gender'=>$gender,
          'updated_at'=>date_create('now'),
          'physical_exam'=>$exam
      ]);
      foreach($services as $ps)
      {
        DB::table('corp_packserv_tbl')
          ->insert([
            'corpPack_id' =>  $corpPack_id,
            'service_id'  =>  $ps
          ]);
        DB::table('corp_packserv_log_tbl')
          ->insert([
            'corpPack_id' =>  $corpPack_id,
            'service_id'  =>  $ps,
            'updated_at'  =>  date_create('now')
          ]);
      }
      Session::flash('add',true);
      return redirect('/Maintenance/Corporate/CreatePackage?corp_id='.$corp_id);
    }

    function createpackage()
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

      $corp_id = $_GET['corp_id'];
      $corp_name = DB::table('corporate_accounts_tbl')->where('corp_id',$corp_id)->select('corp_name')->get();
      foreach($corp_name as $c)
      {
        $corp_name = $c->corp_name;
      }
      $table = DB::table('corp_package_tbl')->where('corp_id',$corp_id)->get();
      return view('Maintenance.CreateCorporatePackage',['corp_name'=>$corp_name,'table'=>$table,'serviceoffer'=>$serviceoffer,'servicegroup'=>$servicegroup,'corp_id'=>$corp_id]);
    }
    function corp()
    {
			$corporates = DB::table('corporate_accounts_tbl')->get();
			return view('Maintenance.Corporate',['corporates'=>$corporates]);
    }
    public function getTotalPrice(Request $req)
    {
      $var1 = DB::table('service_tbl')->select(DB::raw('SUM(service_price) as total'))->whereIn('service_id',$req->id)->get();
      return response()->json($var1);
    }
    public function updateCorporate(Request $req){

        // $servoffer = DB::table('corp_packserv_tbl')
        //     ->leftjoin('corp_package_tbl','corp_package_tbl.corpPack_id','=','corp_packserv_tbl.corpPack_id')
        //     ->leftjoin('corporate_accounts_tbl','corporate_accounts_tbl.corp_id','=','corp_package_tbl.corp_id')
        //     ->where('corp_package_tbl.corp_id',$req->id)
        //     ->get();
        $servoffer = DB::table('corporate_accounts_tbl')->where('corp_id',$req->id)->get();
        return response()->json($servoffer); 
    }
    public function update_Corporate(){
      // $upserv = $_POST['upservices'];
      $upcompanyname  = $_POST['upcompname'];
      $upcontactperson  = $_POST['upcontactperson'];
      $upcontactnumber  = $_POST['upcontactnumber'];
      $upemail  = $_POST['upemail'];
      $upcorpid = ($_POST['upcorpid'])+0;

      DB::table('corporate_accounts_tbl')->where('corp_id',$_POST['upcorpid'])->update([
            'corp_name' => $upcompanyname,
            'corp_contactperson' => $upcontactperson,
            'corp_contact' => $upcontactnumber,
            'corp_email' => $upemail,
            ]);
      DB::table('corporate_accounts_log_tbl')
        ->insert([
          'corp_id' =>  $_POST['upcorpid'],
          'corp_name' => $upcompanyname,
          'corp_contactperson' => $_POST['upcontactperson'],
          'corp_contact' => $_POST['upcontactnumber'],
          'corp_email' => $_POST['upemail'],
          'updated_at'  =>  date_create('now')
        ]);
      // DB::table('corp_package_tbl')
      //   ->update([
      //     'price' =>  $_POST['uppackprice']
      //   ]);
      // DB::table('corp_package_log_tbl')
      //   ->insert([
      //     'corp_id' => $_POST['upcorpid'],
      //     'price' =>  $_POST['uppackprice'],
      //     'updated_at'  => date_create('now')
      //   ]);
      // $id = DB::table('corp_package_tbl')->select('corpPack_id')->where('corp_package_tbl.corp_id',$upcorpid)->get();
      // foreach ($id as $i)
      // {
      //   $corpPack_id = $i->corpPack_id;
      // }
      // DB::table('corp_packserv_tbl')
      //   ->where('corpPack_id',$corpPack_id)
      //   ->delete();
      // foreach($upserv as $ups)
      // {
      //   DB::table('corp_packserv_tbl')
      //   ->insert([
      //     'corpPack_id' => $corpPack_id,
      //     'service_id'  => $ups
      //   ]);
      //   DB::table('corp_packserv_log_tbl')
      //   ->insert([
      //     'corpPack_id' => $corpPack_id,
      //     'service_id'  => $ups,
      //     'updated_at'  => date_create('now')
      //   ]);
      // }
      Session::flash('update', true);
      return redirect()->back();
    }
    public function save_corp(){
      $companyname  = $_POST['companyname'];
      $contactperson  = $_POST['contactperson'];
      $contactnumber  = $_POST['contactnumber'];
     
      $email  = $_POST['email'];
      
      DB::table('corporate_accounts_tbl')->insert([
        'corp_name' =>  $companyname,
        'corp_contact'  =>  $contactnumber,
        'corp_email'  =>  $email,
        'corp_contactperson'  =>$contactperson
      ]);
      $corp_id = DB::table('corporate_accounts_tbl')->select('corp_id')->max('corp_id');

      DB::table('corporate_accounts_log_tbl')->insert([
        'corp_id' =>  $corp_id,
        'corp_name' =>  $companyname,
        'corp_contact'  =>  $contactnumber,
        'corp_email'  =>  $email,
        'corp_contactperson'  =>$contactperson,
        'updated_at'  =>  date_create('now')
      ]);
      // $packprice = $_POST['packprice'];
      // $services = $_POST['services'];
      // DB::table('corp_package_tbl')
      //   ->insert([
      //     'corp_id' =>  $corp_id,
      //     'price' =>  $packprice,
      //     'status'  =>  1
      //   ]);
      // DB::table('corp_package_log_tbl')
      //   ->insert([
      //     'corp_id' =>  $corp_id,
      //     'price' =>  $packprice,
      //     'updated_at'  => date_create('now')
      //   ]);
      // $corpPack_id = DB::table('corp_package_tbl')->select('corpPack_id')->max('corpPack_id');
      // foreach($services as $ps)
      // {
      //   DB::table('corp_packserv_tbl')
      //     ->insert([
      //       'corpPack_id' =>  $corpPack_id,
      //       'service_id'  =>  $ps
      //     ]);
      //   DB::table('corp_packserv_log_tbl')
      //     ->insert([
      //       'corpPack_id' =>  $corpPack_id,
      //       'service_id'  =>  $ps,
      //       'updated_at'  =>  date_create('now')
      //     ]);
      // }
      Session::flash('add', true);
      return redirect()->back();
    }
    public function deleteCorporate(){
      DB::table('corporate_accounts_tbl')->where('corp_id',$_POST['id'])->update(['CorpStatus'=>0]);
      Session::flash('delete',true);
      return redirect()->back();
    }
}
