<?php

namespace Responsive\Http\Controllers\Admin;



use File;
use Image;
use Responsive\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

use Responsive\Http\Requests;
use Illuminate\Http\Request;
use Responsive\User;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;

class RefundController extends Controller
{
    /**
     * Show a list of all of the application's users.
     *
     * @return Response
     */
    public function index()
    {
        $refund_count = DB::table('product_refund')
		                ->where('delete_status','=','')
		                ->orderBy('dispute_id','desc')
					   ->count();
		$setid=1;
		$setts = DB::table('settings')
		->where('id', '=', $setid)
		->get();			   

        return view('admin.refund', ['refund_count' => $refund_count, 'setts' => $setts]);
    }
	
	
	
	public function rating_index()
	{
	
	$rating_count = DB::table('product_rating')
		                ->orderBy('rate_id','desc')
					   ->count();
		$setid=1;
		$setts = DB::table('settings')
		->where('id', '=', $setid)
		->get();			   

        return view('admin.rating', ['rating_count' => $rating_count, 'setts' => $setts]);
	
	
	}
	
	
	
	
	public function rating_delete($rate_id)
	 {
		
		
      DB::delete('delete from product_rating where rate_id = ?',[$rate_id]);
	   
      return back();
      
   }
	
}