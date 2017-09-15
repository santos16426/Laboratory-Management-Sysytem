<?php  

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\OrderShipped;
use Mail;
use DB;
class SendMailController extends Controller
{
    /**
     * Show the application sendMail.
     *
     * @return \Illuminate\Http\Response
     */
    public function sendMail()
    {
        $emp = DB::table('employee_tbl')->get();
        foreach($emp as $e)
        {
            $emp_fname = $e->emp_fname;
            $emp_mname = $e->emp_mname;
            $emp_lname = $e->emp_lname;
        }
    	$content = [
    		'title'=> 'Itsolutionstuff.com mail', 
    		'body'=> $emp_fname.' '.$emp_mname.' '.$emp_lname ,
    		'button' => 'Click Here'
    		];

    	$receiverAddress = 'santos16426@gmail.com';

    	Mail::to('santos16426@gmail.com')->send(new OrderShipped($content));

    	dd('mail send successfully');
    }
}