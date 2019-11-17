<?php

namespace Responsive\Http\Controllers;

use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

use File;
use Image;
use URL;
use Mail;
use Carbon\Carbon;
use Cookie;

class EarningsController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }
	
	
	
	public function call_translate($id,$lang) 
   {
   
    $default = DB::table('avig_language')
	              ->where('lang_default','=',1)
		           ->get();


$default_cnt = DB::table('avig_language')
	              ->where('lang_default','=',1)
		           ->count();
if(!empty(Cookie::get('lang'))){ $lang = Cookie::get('lang'); } else { if(!empty($default_cnt)){ $lang = $default[0]->lang_code; } else { $lang = "en"; } }
     
   					
	if($lang == "en")
	{
	$translate = DB::table('avig_translate')
		            
					->where('lang_code', '=', $lang)
					->where('id', '=', $id)
					->get();
					
		$translate_cnt = DB::table('avig_translate')
		            
					->where('lang_code', '=', $lang)
					->where('id', '=', $id)
					->count();			
	}
	else
	{
	$translate = DB::table('avig_translate')
		            
					->where('lang_code', '=', $lang)
					->where('parent', '=', $id)
					->get();
					
		$translate_cnt = DB::table('avig_translate')
		            
					->where('lang_code', '=', $lang)
					->where('parent', '=', $id)
					->count();			
	}				
	if(!empty($translate_cnt))
	{
					return $translate[0]->name;
	}
	else
	{
	  return "";
	}
}
   
	
	public function view_earnings()
	{
	
	   $logged = Auth::user()->id;
		 
		 
		 $set_id=1;
		$site_setting = DB::table('settings')->where('id', $set_id)->get();
		
		$get_users_stage1 = DB::table('users')
		          ->where('id','=', $logged)
				  ->get();
				  
				  
						
								
								
		$complete_withdraw_cnt = DB::table('product_withdraw')
		                        ->where('user_id','=', $logged)
		          				->count();
								
								
	
	   $data=array('site_setting' => $site_setting, 'get_users_stage1' => $get_users_stage1, 'complete_withdraw_cnt' => $complete_withdraw_cnt, 'logged' => $logged);
	   return view('my-earnings')->with($data);
	}
	
	
	
	
	public function avigher_post_data(Request $request) 
	{
	
	$default = DB::table('avig_language')
	              ->where('lang_default','=',1)
		           ->get();


$default_cnt = DB::table('avig_language')
	              ->where('lang_default','=',1)
		           ->count();
if(!empty(Cookie::get('lang'))){ $lang = Cookie::get('lang'); } else { if(!empty($default_cnt)){ $lang = $default[0]->lang_code; } else { $lang = "en"; } }
		
		
	
	$data = $request->all();
	$withdraw_amount = $data['withdraw_amount'];
	$withdraw_type = $data['withdraw_type'];
	if(!empty($data['paypal_id'])){ $paypal_id = $data['paypal_id']; } else { $paypal_id = ""; }
	if(!empty($data['stripe_id'])) { $stripe_id = $data['stripe_id']; } else { $stripe_id = ""; }
	if(!empty($data['bank_acc_no'])) { $bank_acc_no = $data['bank_acc_no']; } else { $bank_acc_no = ""; }
	if(!empty($data['bank_name'])) { $bank_name = $data['bank_name']; } else { $bank_name = ""; }
	if(!empty($data['ifsc_code'])) { $ifsc_code = $data['ifsc_code']; } else  { $ifsc_code = ""; }
	
	if(!empty($data['paytm_id'])) { $paytm_id = $data['paytm_id']; } else  { $paytm_id = ""; }
	$withdraw_status = "pending";
	$logged = Auth::user()->id;
	
	$set_id=1;
	$setting = DB::table('settings')->where('id', $set_id)->get();
		if($setting[0]->withdraw_amt > $withdraw_amount)
		{
			return back()->with('werror', $this->call_translate( 970, $lang));
		}
		else
		{
		
		
		
		
		
		$url = URL::to("/");
		
		$site_logo=$url.'/local/images/media/'.$setting[0]->site_logo;
		
		$site_name = $setting[0]->site_name;
		
		$currency = $setting[0]->site_currency;
		
		$user_email = Auth::user()->email;
		$username = Auth::user()->name;
		
		$aid=1;
		$admindetails = DB::table('users')
		 ->where('id', '=', $aid)
		 ->get();
		
		$admin_email = $admindetails[0]->email;
	   
		$admin_name = $admindetails[0]->name;
		
		
		
			if($data['available_amount'] >= $withdraw_amount)
			{
			
			
			$clear_balance = $data['available_amount'] - $withdraw_amount;
			
			DB::update('update users set wallet="'.$clear_balance.'" where id = ?', [Auth::user()->id]);
			
			
			DB::insert('insert into product_withdraw (user_id,withdraw_amount,withdraw_payment_type,paypal_id,stripe_id,bank_account_no,bank_info,bank_ifsc,paytm_no,withdraw_status) values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)', [$logged,$withdraw_amount,$withdraw_type,$paypal_id,$stripe_id,$bank_acc_no,$bank_name,$ifsc_code,$paytm_id,$withdraw_status]);
			
			
			
			
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
		
		
			
			
			
			$datas = [
            'withdraw_amount' => $withdraw_amount, 'withdraw_type' => $withdraw_type, 'paypal_id' => $paypal_id, 'stripe_id' => $stripe_id,
			'bank_acc_no' => $bank_acc_no, 'bank_name' => $bank_name, 'ifsc_code' => $ifsc_code, 'paytm_id' => $paytm_id, 'currency' => $currency, 'site_logo' => $site_logo, 'site_name' => $site_name
        ];
			
			
			Mail::send('withdraw_email', $datas , function ($message) use ($admin_email,$admin_name,$sett_sender_name,$sett_sender_email,$lang)
        {
            $message->subject($this->call_translate( 1075, $lang));
			
            $message->from($sett_sender_email,$sett_sender_name);

            $message->to($sett_sender_email);
			

        }); 
			
			
			
			
			
			
			return back()->with('wsuccess', $this->call_translate( 973, $lang));
			
			}
			else
			{
			   return back()->with('werror', $this->call_translate( 976, $lang));
			}
			 
		}
	
	
	
		return back();		  
	
	
	}
	
	
	
	
	
	
	
	
	
	
	 
	
	
}
