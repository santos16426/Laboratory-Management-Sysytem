<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;

class LaboratoryController extends Controller
{
    function lab()
    {
    	$table = DB::table('laboratory_tbl')->get();
    	return view('Maintenance.Laboratory',['table'=>$table]);
    }
    function save_Lab()
    {
    	$labname = $_POST['labname'];
    	DB::table('laboratory_tbl')
    		->insert([
    			'lab_name'	=>	$labname
    		]);
    	Session::flash('add',true);
    	return redirect()->back();
    }
    function deleteLaboratory()
    {
        DB::table('laboratory_tbl')->where('lab_id',$_POST['id'])->update(['LabStatus'=>0]);
        Session::flash('delete', true);
        return redirect()->back();
    }
    function updateLab(Request $req)
    {
        $var1= DB::table('laboratory_tbl')
            ->where('lab_id',$req->id)
            ->get();

        return response()->json($var1);
    }
    function update_laboratory()
    {
        $uplab_id = $_POST['uplab_id'];
        $uplab_name = $_POST['uplab_name'];
        DB::table('laboratory_tbl')
            ->where('lab_id',$uplab_id)
            ->update([
                'lab_name'  =>  $uplab_name
            ]);
        Session::flash('update', true);
        return redirect()->back();
    }
}
