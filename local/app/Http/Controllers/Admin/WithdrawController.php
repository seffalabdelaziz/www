<?php

namespace Responsive\Http\Controllers\Admin;



use File;
use Image;
use URL;
use Mail;
use Responsive\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

use Responsive\Http\Requests;
use Illuminate\Http\Request;
use Responsive\User;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;

class WithdrawController extends Controller
{
    /**
     * Show a list of all of the application's users.
     *
     * @return Response
     */
	 
	public function avigher_withdraw()
	{
	
	     $withdraw_count = DB::table('product_withdraw')
		                  ->orderBy('wid','desc')
					      ->count();
	   
	   
	    $withdraw_view = DB::table('product_withdraw')
		                 ->orderBy('wid','desc')
					     ->get();
					   
		$set_id=1;
		$site_setting = DB::table('settings')->where('id', $set_id)->get();			   

        return view('admin.withdraw', ['withdraw_count' => $withdraw_count, 'withdraw_view' => $withdraw_view, 'site_setting' => $site_setting]);
	
	
	
	} 
	
	
	
	public function avigher_delete_withdraw_data($delete,$id)
	{
	
	DB::delete('delete from product_withdraw where wid = ?',[$id]);
	
	return back();
	
	}
	
	 
	 
   
	
	public function avigher_pending_withdraw_data($id)
	{
	
	   $wid = base64_decode($id);
	    $pending_view_count = DB::table('product_withdraw')
		               ->where('withdraw_status','=','pending')
					   ->where('wid','=',$wid)
		               ->count();
					   
		if(!empty($pending_view_count))
		{
		
		 $pending_view = DB::table('product_withdraw')
		               ->where('withdraw_status','=','pending')
					   ->where('wid','=',$wid)
		               ->get();
					   
		$withdraw_amount = $pending_view[0]->withdraw_amount;
	    $withdraw_type = $pending_view[0]->withdraw_payment_type;
		$paypal_id = $pending_view[0]->paypal_id;			   
		$stripe_id = $pending_view[0]->stripe_id;
		$bank_acc_no = $pending_view[0]->bank_account_no;
		$bank_name = $pending_view[0]->bank_info;	
		$ifsc_code = $pending_view[0]->bank_ifsc;
		
		
		$user_detail = DB::table('users')
		               ->where('id','=',$pending_view[0]->user_id)
		               ->get();
		
		
		$set_id=1;
		$setting = DB::table('settings')->where('id', $set_id)->get();
		
		
		$url = URL::to("/");
		
		$site_logo=$url.'/local/images/media/'.$setting[0]->site_logo;
		
		$site_name = $setting[0]->site_name;
		
		$currency = $setting[0]->site_currency;
		
		$user_email = $user_detail[0]->email;
		$username = $user_detail[0]->name;
		
		$aid=1;
		$admindetails = DB::table('users')
		 ->where('id', '=', $aid)
		 ->get();
		
		$admin_email = $admindetails[0]->email;
		$admin_name = $admindetails[0]->name;
		
		
		$datas = [
            'withdraw_amount' => $withdraw_amount, 'withdraw_type' => $withdraw_type, 'paypal_id' => $paypal_id, 'stripe_id' => $stripe_id,
			'bank_acc_no' => $bank_acc_no, 'bank_name' => $bank_name, 'ifsc_code' => $ifsc_code, 'currency' => $currency, 'site_logo' => $site_logo, 'site_name' => $site_name, 'username' => $username, 'user_email' => $user_email
        ];
		
		
		
		$check_sett_sname = DB::table('settings_meta')
		        ->where('sett_meta_id', '=' , 22)
				->where('sett_meta_key', '=' , "sender_name")
		        
				->count();
		if(!empty($check_sett_sname))
		{
		   
		    $sett_meta_well = DB::table('settings_meta')
		        ->where('sett_meta_id', '=' , 22)
				->where('sett_meta_key', '=' , "sender_name")
		        
				->count();
				
			if(!empty($sett_meta_well))
			{	
		   $sett_meta =  DB::table('settings_meta')
		        ->where('sett_meta_id', '=' , 22)
				->where('sett_meta_key', '=' , "sender_name")
		        
				->get();
			$sett_sender_name = $sett_meta[0]->sett_meta_value;
			}
			else
			{
			$sett_sender_name = "";
			}	
		}
		else
		{
		  $sett_sender_name = "";
		}
		
		
		
		
		
		$check_sett_semail = DB::table('settings_meta')
		        ->where('sett_meta_id', '=' , 23)
				->where('sett_meta_key', '=' , "sender_email")
		        
				->count();
		if(!empty($check_sett_semail))
		{
		   
		    $sett_meta_well = DB::table('settings_meta')
		        ->where('sett_meta_id', '=' , 23)
				->where('sett_meta_key', '=' , "sender_email")
		        
				->count();
				
			if(!empty($sett_meta_well))
			{	
		   $sett_meta =  DB::table('settings_meta')
		        ->where('sett_meta_id', '=' , 23)
				->where('sett_meta_key', '=' , "sender_email")
		        
				->get();
			$sett_sender_email = $sett_meta[0]->sett_meta_value;
			}
			else
			{
			$sett_sender_email = "";
			}	
		}
		else
		{
		  $sett_sender_email = "";
		}
		
		
		
		
		
		DB::update('update product_withdraw set withdraw_status="completed" where wid = ?', [$wid]);
			
			
			Mail::send('admin.withdraw_email', $datas , function ($message) use ($admin_email,$user_email,$username,$admin_name,$sett_sender_name,$sett_sender_email)
        {
            $message->subject('Withdrawal request is approved');
			
            $message->from($sett_sender_email,$sett_sender_name);

            $message->to($user_email);
			

        }); 
			
		
		
					   
		
		
		
		}			   
					   
					   
		return back();			   
	
	
	}
	
	
	
	
	
}