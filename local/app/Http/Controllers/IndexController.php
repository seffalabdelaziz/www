<?php

namespace Responsive\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use URL;
use Mail;
use Session;
use Carbon\Carbon;
use Auth;
use Cookie;

class IndexController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
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
	 
	public function confirmation($it)
	{
		
		DB::update('update users set confirmation="1" where confirm_key="'.$it.'"');
		return view('confirmemail');
		
	} 
	
	public function view_former()
	{
		return view('confirmemail');
	}
	 
	 
	 
	public function resend_email($email_address)
	{
	
	$default = DB::table('avig_language')
	              ->where('lang_default','=',1)
		           ->get();


$default_cnt = DB::table('avig_language')
	              ->where('lang_default','=',1)
		           ->count();
if(!empty(Cookie::get('lang'))){ $lang = Cookie::get('lang'); } else { if(!empty($default_cnt)){ $lang = $default[0]->lang_code; } else { $lang = "en"; } }
		
		
	
	$email_id = base64_decode($email_address);
	
	
	$confirm_count = DB::table('users')
		               ->where('email', '=', $email_id)
					   ->where('delete_status','=','')
					   ->where('confirmation','=',0)
					   ->where('provider','=','')
	                   ->count();
	if($confirm_count == 1)
	{
	
	    $get_data = DB::table('users')
		               ->where('email', '=', $email_id)
					   ->where('delete_status','=','')
					   ->where('confirmation','=',0)
					   ->where('provider','=','')
	                   ->get();
					   
					   
		$keyval = $get_data[0]->confirm_key;
		$name = $get_data[0]->name;
		$email = $email_id;
		
		$setid=1;
		$setts = DB::table('settings')
		->where('id', '=', $setid)
		->get();
		
		
		$admin_idd=1;
		
		$admin_email = DB::table('users')
                ->where('id', '=', $admin_idd)
                ->get();
		
		$url = URL::to("/");
		
		$site_logo=$url.'/local/images/media/'.$setts[0]->site_logo;
		
		$site_name = $setts[0]->site_name;
		
		$adminemail = $admin_email[0]->email;
		
		$adminname = $admin_email[0]->name;
		
		
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
            'name' => $name, 'email' => $email, 'keyval' => $keyval, 'site_logo' => $site_logo,
			'site_name' => $site_name, 'url' => $url
        ];
		
		Mail::send('confirm_mail', $datas , function ($message) use ($adminemail,$adminname,$email,$sett_sender_name,$sett_sender_email,$lang)
        {
		
		
		
		
            $message->subject($this->call_translate( 985, $lang));
			
            $message->from($sett_sender_email, $sett_sender_name);

            $message->to($email);

        }); 
		
		
		
					   
		return redirect('login')->with('success', $this->call_translate( 988, $lang));			   
					   
	
	
	
	}
	else
	{
        
        return redirect('login')->with('error', $this->call_translate( 991, $lang));
    }
	
	
	
	
	
	
	}
	 
	 
	 
	
	public function view_user($slug)
	{
	
	  $default = DB::table('avig_language')
	              ->where('lang_default','=',1)
		           ->get();


$default_cnt = DB::table('avig_language')
	              ->where('lang_default','=',1)
		           ->count();
if(!empty(Cookie::get('lang'))){ $lang = Cookie::get('lang'); } else { if(!empty($default_cnt)){ $lang = $default[0]->lang_code; } else { $lang = "en"; } }
	
	
	
	  $user = DB::table('users')
		 ->where('user_slug', '=', $slug)
		
		 ->get();
		$author_country = $user[0]->country; 
		 
	 $items_count = DB::table('products')
				->where('delete_status', '=', '')
				->where('user_id','=',$user[0]->id)
				->where('lang_code','=',$lang)
				->where('item_status', '=', 1)
				->orderBy('item_id', 'desc')
				->count();	
				
				
	$check_user_meta = DB::table('users_meta')
		        ->where('user_id', '=' , $user[0]->id)
				->where('user_meta_key', '=' , "profile_details_status")
		        
				->count();
		if(!empty($check_user_meta))
		{
		   
		    $user_meta_well = DB::table('users_meta')
		        ->where('user_id', '=' , $user[0]->id)
				->where('user_meta_key', '=' , "profile_details_status")
		        
				->count();
				
			if(!empty($user_meta_well))
			{	
		   $user_meta = DB::table('users_meta')
		        ->where('user_id', '=' , $user[0]->id)
				->where('user_meta_key', '=' , "profile_details_status")
		        
				->get();
			$profile_status = $user_meta[0]->user_meta_value;
			}
			else
			{
			$profile_status = "";
			}	
		}
		else
		{
		  $profile_status = "";
		}
			
			
			
			
			
	$check_user_well = DB::table('users_meta')
		        ->where('user_id', '=' , $user[0]->id)
				->where('user_meta_key', '=' , "profile_badges_status")
		        
				->count();
		if(!empty($check_user_well))
		{
		   
		    $user_meta_well = DB::table('users_meta')
		        ->where('user_id', '=' , $user[0]->id)
				->where('user_meta_key', '=' , "profile_badges_status")
		        
				->count();
				
			if(!empty($user_meta_well))
			{	
		   $user_meta = DB::table('users_meta')
		        ->where('user_id', '=' , $user[0]->id)
				->where('user_meta_key', '=' , "profile_badges_status")
		        
				->get();
			$profile_badges = $user_meta[0]->user_meta_value;
			}
			else
			{
			$profile_badges = "";
			}	
		}
		else
		{
		  $profile_badges = "";
		}
		
		
		
		
		 
		$country_count = DB::table('country')
		->where('country_id', '=', $author_country)
		->count();
		if(!empty($country_count))
		{
		 $country_get = DB::table('country')
					->where('country_id', '=', $author_country)
					->get();
		 $country_view = $country_get[0]->country_badges;			
		$country_text = $country_get[0]->country_name;			
		}
		else
		{
		$country_view = "";
		$country_text = "";
		}
		
				
							
				
	$siteid=1;
    $site_setting=DB::select('select * from settings where id = ?',[$siteid]);				 
		 
		 $uu = $user[0]->id;
		 
		 
		 
		 $check_sett_sells = DB::table('settings_meta')
		        ->where('sett_meta_id', '=' , 40)
				->where('sett_meta_key', '=' , "minimum_sells")
		        
				->count();
		if(!empty($check_sett_sells))
		{
		   
		    $sett_meta_well = DB::table('settings_meta')
		        ->where('sett_meta_id', '=' , 40)
				->where('sett_meta_key', '=' , "minimum_sells")
		        
				->count();
				
			if(!empty($sett_meta_well))
			{	
		   $sett_meta =  DB::table('settings_meta')
		        ->where('sett_meta_id', '=' , 40)
				->where('sett_meta_key', '=' , "minimum_sells")
		        
				->get();
			$minimum_sells = $sett_meta[0]->sett_meta_value;
			}
			else
			{
			$minimum_sells = "";
			}	
		}
		else
		{
		  $minimum_sells = "";
		}
		 
		 
		 
		$proders_details = DB::table('product_orders')
						->where('item_user_id','=',$uu)
						->where('status','=','completed')
						->where('approval_status','=','payment released to vendor')
				        ->count(); 
						
			$last_six = date("Y-m-d", strtotime("-6 months"));			
			$trends_details = DB::table('products')
						->where('last_update','>',$last_six)
						->where('user_id','=',$uu)
						->where('delete_status','=','')
				        ->count();	
						
						
						
		/* author level */
		
		
		$collector_details = DB::table('product_orders')
						->where('user_id','=',$uu)
						->where('status','=','completed')
						->where('approval_status','=','payment released to vendor')
				        ->count();
		
		
		
		$sold_details_count = DB::table('product_orders')
						->where('item_user_id','=',$uu)
						->where('status','=','completed')
						->where('approval_status','=','payment released to vendor')
				        ->count();	
			if(!empty($sold_details_count))
			{					
			$sold_details = DB::table('product_orders')
						->where('item_user_id','=',$uu)
						->where('status','=','completed')
						->where('approval_status','=','payment released to vendor')
				        ->get();
				$sold_price = 0; 		
				foreach($sold_details as $sold)
				{
				   $sold_price += $sold->vendor_amount;
				}			
						
			}
			else
			{
			   $sold_price = 0;
			}
		
		$check_sett_one = DB::table('settings_meta')
		        ->where('sett_meta_id', '=' , 41)
				->where('sett_meta_key', '=' , "author_level_one")
		        
				->count();
		if(!empty($check_sett_one))
		{
		   
		    $sett_meta_well = DB::table('settings_meta')
		        ->where('sett_meta_id', '=' , 41)
				->where('sett_meta_key', '=' , "author_level_one")
		        
				->count();
				
			if(!empty($sett_meta_well))
			{	
		   $sett_meta =  DB::table('settings_meta')
		        ->where('sett_meta_id', '=' , 41)
				->where('sett_meta_key', '=' , "author_level_one")
		        
				->get();
			$author_level_one = $sett_meta[0]->sett_meta_value;
			}
			else
			{
			$author_level_one = "";
			}	
		}
		else
		{
		  $author_level_one = "";
		}
		
		 
		
		$check_sett_two = DB::table('settings_meta')
		        ->where('sett_meta_id', '=' , 42)
				->where('sett_meta_key', '=' , "author_level_two")
		        
				->count();
		if(!empty($check_sett_two))
		{
		   
		    $sett_meta_well = DB::table('settings_meta')
		        ->where('sett_meta_id', '=' , 42)
				->where('sett_meta_key', '=' , "author_level_two")
		        
				->count();
				
			if(!empty($sett_meta_well))
			{	
		   $sett_meta =  DB::table('settings_meta')
		        ->where('sett_meta_id', '=' , 42)
				->where('sett_meta_key', '=' , "author_level_two")
		        
				->get();
			$author_level_two = $sett_meta[0]->sett_meta_value;
			}
			else
			{
			$author_level_two = "";
			}	
		}
		else
		{
		  $author_level_two = "";
		}
		
		
		
		
		$check_sett_three = DB::table('settings_meta')
		        ->where('sett_meta_id', '=' , 43)
				->where('sett_meta_key', '=' , "author_level_three")
		        
				->count();
		if(!empty($check_sett_three))
		{
		   
		    $sett_meta_well = DB::table('settings_meta')
		        ->where('sett_meta_id', '=' , 43)
				->where('sett_meta_key', '=' , "author_level_three")
		        
				->count();
				
			if(!empty($sett_meta_well))
			{	
		   $sett_meta =  DB::table('settings_meta')
		        ->where('sett_meta_id', '=' , 43)
				->where('sett_meta_key', '=' , "author_level_three")
		        
				->get();
			$author_level_three = $sett_meta[0]->sett_meta_value;
			}
			else
			{
			$author_level_three = "";
			}	
		}
		else
		{
		  $author_level_three = "";
		}
		
		 
		
		$check_sett_four = DB::table('settings_meta')
		        ->where('sett_meta_id', '=' , 44)
				->where('sett_meta_key', '=' , "author_level_four")
		        
				->count();
		if(!empty($check_sett_four))
		{
		   
		    $sett_meta_well = DB::table('settings_meta')
		        ->where('sett_meta_id', '=' , 44)
				->where('sett_meta_key', '=' , "author_level_four")
		        
				->count();
				
			if(!empty($sett_meta_well))
			{	
		   $sett_meta =  DB::table('settings_meta')
		        ->where('sett_meta_id', '=' , 44)
				->where('sett_meta_key', '=' , "author_level_four")
		        
				->get();
			$author_level_four = $sett_meta[0]->sett_meta_value;
			}
			else
			{
			$author_level_four = "";
			}	
		}
		else
		{
		  $author_level_four = "";
		}
		
		
		
		
		$check_sett_five = DB::table('settings_meta')
		        ->where('sett_meta_id', '=' , 45)
				->where('sett_meta_key', '=' , "author_level_five")
		        
				->count();
		if(!empty($check_sett_five))
		{
		   
		    $sett_meta_well = DB::table('settings_meta')
		        ->where('sett_meta_id', '=' , 45)
				->where('sett_meta_key', '=' , "author_level_five")
		        
				->count();
				
			if(!empty($sett_meta_well))
			{	
		   $sett_meta =  DB::table('settings_meta')
		        ->where('sett_meta_id', '=' , 45)
				->where('sett_meta_key', '=' , "author_level_five")
		        
				->get();
			$author_level_five = $sett_meta[0]->sett_meta_value;
			}
			else
			{
			$author_level_five = "";
			}	
		}
		else
		{
		  $author_level_five = "";
		}
		
		
		
		
		$check_sett_six = DB::table('settings_meta')
		        ->where('sett_meta_id', '=' , 46)
				->where('sett_meta_key', '=' , "author_level_six")
		        
				->count();
		if(!empty($check_sett_six))
		{
		   
		    $sett_meta_well = DB::table('settings_meta')
		        ->where('sett_meta_id', '=' , 46)
				->where('sett_meta_key', '=' , "author_level_six")
		        
				->count();
				
			if(!empty($sett_meta_well))
			{	
		   $sett_meta =  DB::table('settings_meta')
		        ->where('sett_meta_id', '=' , 46)
				->where('sett_meta_key', '=' , "author_level_six")
		        
				->get();
			$author_level_six = $sett_meta[0]->sett_meta_value;
			}
			else
			{
			$author_level_six = "";
			}	
		}
		else
		{
		  $author_level_six = "";
		}
		
		
		
		$check_sett_level_one = DB::table('settings_meta')
		        ->where('sett_meta_id', '=' , 47)
				->where('sett_meta_key', '=' , "collector_level_one")
		        
				->count();
		if(!empty($check_sett_level_one))
		{
		   
		    $sett_meta_well = DB::table('settings_meta')
		        ->where('sett_meta_id', '=' , 47)
				->where('sett_meta_key', '=' , "collector_level_one")
		        
				->count();
				
			if(!empty($sett_meta_well))
			{	
		   $sett_meta =  DB::table('settings_meta')
		        ->where('sett_meta_id', '=' , 47)
				->where('sett_meta_key', '=' , "collector_level_one")
		        
				->get();
			$collector_level_one = $sett_meta[0]->sett_meta_value;
			}
			else
			{
			$collector_level_one = "";
			}	
		}
		else
		{
		  $collector_level_one = "";
		}
		
		 
		
		$check_sett_level_two = DB::table('settings_meta')
		        ->where('sett_meta_id', '=' , 48)
				->where('sett_meta_key', '=' , "collector_level_two")
		        
				->count();
		if(!empty($check_sett_level_two))
		{
		   
		    $sett_meta_well = DB::table('settings_meta')
		        ->where('sett_meta_id', '=' , 48)
				->where('sett_meta_key', '=' , "collector_level_two")
		        
				->count();
				
			if(!empty($sett_meta_well))
			{	
		   $sett_meta =  DB::table('settings_meta')
		        ->where('sett_meta_id', '=' , 48)
				->where('sett_meta_key', '=' , "collector_level_two")
		        
				->get();
			$collector_level_two = $sett_meta[0]->sett_meta_value;
			}
			else
			{
			$collector_level_two = "";
			}	
		}
		else
		{
		  $collector_level_two = "";
		}
		
		
		
		
		$check_sett_level_three = DB::table('settings_meta')
		        ->where('sett_meta_id', '=' , 49)
				->where('sett_meta_key', '=' , "collector_level_three")
		        
				->count();
		if(!empty($check_sett_three))
		{
		   
		    $sett_meta_well = DB::table('settings_meta')
		        ->where('sett_meta_id', '=' , 49)
				->where('sett_meta_key', '=' , "collector_level_three")
		        
				->count();
				
			if(!empty($sett_meta_well))
			{	
		   $sett_meta =  DB::table('settings_meta')
		        ->where('sett_meta_id', '=' , 49)
				->where('sett_meta_key', '=' , "collector_level_three")
		        
				->get();
			$collector_level_three = $sett_meta[0]->sett_meta_value;
			}
			else
			{
			$collector_level_three = "";
			}	
		}
		else
		{
		  $collector_level_three = "";
		}
		
		 
		
		$check_sett_level_four = DB::table('settings_meta')
		        ->where('sett_meta_id', '=' , 50)
				->where('sett_meta_key', '=' , "collector_level_four")
		        
				->count();
		if(!empty($check_sett_level_four))
		{
		   
		    $sett_meta_well = DB::table('settings_meta')
		        ->where('sett_meta_id', '=' , 50)
				->where('sett_meta_key', '=' , "collector_level_four")
		        
				->count();
				
			if(!empty($sett_meta_well))
			{	
		   $sett_meta =  DB::table('settings_meta')
		        ->where('sett_meta_id', '=' , 50)
				->where('sett_meta_key', '=' , "collector_level_four")
		        
				->get();
			$collector_level_four = $sett_meta[0]->sett_meta_value;
			}
			else
			{
			$collector_level_four = "";
			}	
		}
		else
		{
		  $collector_level_four = "";
		}
		
		
		
		
		$check_sett_level_five = DB::table('settings_meta')
		        ->where('sett_meta_id', '=' , 51)
				->where('sett_meta_key', '=' , "collector_level_five")
		        
				->count();
		if(!empty($check_sett_level_five))
		{
		   
		    $sett_meta_well = DB::table('settings_meta')
		        ->where('sett_meta_id', '=' , 51)
				->where('sett_meta_key', '=' , "collector_level_five")
		        
				->count();
				
			if(!empty($sett_meta_well))
			{	
		   $sett_meta =  DB::table('settings_meta')
		        ->where('sett_meta_id', '=' , 51)
				->where('sett_meta_key', '=' , "collector_level_five")
		        
				->get();
			$collector_level_five = $sett_meta[0]->sett_meta_value;
			}
			else
			{
			$collector_level_five = "";
			}	
		}
		else
		{
		  $collector_level_five = "";
		}
		
		
		
		
		$check_sett_level_six = DB::table('settings_meta')
		        ->where('sett_meta_id', '=' , 52)
				->where('sett_meta_key', '=' , "collector_level_six")
		        
				->count();
		if(!empty($check_sett_level_six))
		{
		   
		    $sett_meta_well = DB::table('settings_meta')
		        ->where('sett_meta_id', '=' , 52)
				->where('sett_meta_key', '=' , "collector_level_six")
		        
				->count();
				
			if(!empty($sett_meta_well))
			{	
		   $sett_meta =  DB::table('settings_meta')
		        ->where('sett_meta_id', '=' , 52)
				->where('sett_meta_key', '=' , "collector_level_six")
		        
				->get();
			$collector_level_six = $sett_meta[0]->sett_meta_value;
			}
			else
			{
			$collector_level_six = "";
			}	
		}
		else
		{
		  $collector_level_six = "";
		}
		
		/* author level */
		
						
			/* referred level */
		
		
		$referred_details = DB::table('users')
						->where('referred_by','=',$uu)
				        ->count();
		
		$check_sett_ref_one = DB::table('settings_meta')
		        ->where('sett_meta_id', '=' , 53)
				->where('sett_meta_key', '=' , "referred_level_one")
		        
				->count();
		if(!empty($check_sett_ref_one))
		{
		   
		    $sett_meta_well = DB::table('settings_meta')
		        ->where('sett_meta_id', '=' , 53)
				->where('sett_meta_key', '=' , "referred_level_one")
		        
				->count();
				
			if(!empty($sett_meta_well))
			{	
		   $sett_meta =  DB::table('settings_meta')
		        ->where('sett_meta_id', '=' , 53)
				->where('sett_meta_key', '=' , "referred_level_one")
		        
				->get();
			$referred_level_one = $sett_meta[0]->sett_meta_value;
			}
			else
			{
			$referred_level_one = "";
			}	
		}
		else
		{
		  $referred_level_one = "";
		}
		
		 
		
		$check_sett_ref_two = DB::table('settings_meta')
		        ->where('sett_meta_id', '=' , 54)
				->where('sett_meta_key', '=' , "referred_level_two")
		        
				->count();
		if(!empty($check_sett_ref_two))
		{
		   
		    $sett_meta_well = DB::table('settings_meta')
		        ->where('sett_meta_id', '=' , 54)
				->where('sett_meta_key', '=' , "referred_level_two")
		        
				->count();
				
			if(!empty($sett_meta_well))
			{	
		   $sett_meta =  DB::table('settings_meta')
		        ->where('sett_meta_id', '=' , 54)
				->where('sett_meta_key', '=' , "referred_level_two")
		        
				->get();
			$referred_level_two = $sett_meta[0]->sett_meta_value;
			}
			else
			{
			$referred_level_two = "";
			}	
		}
		else
		{
		  $referred_level_two = "";
		}
		
		
		
		
		$check_sett_ref_three = DB::table('settings_meta')
		        ->where('sett_meta_id', '=' , 55)
				->where('sett_meta_key', '=' , "referred_level_three")
		        
				->count();
		if(!empty($check_sett_ref_three))
		{
		   
		    $sett_meta_well = DB::table('settings_meta')
		        ->where('sett_meta_id', '=' , 55)
				->where('sett_meta_key', '=' , "referred_level_three")
		        
				->count();
				
			if(!empty($sett_meta_well))
			{	
		   $sett_meta =  DB::table('settings_meta')
		        ->where('sett_meta_id', '=' , 55)
				->where('sett_meta_key', '=' , "referred_level_three")
		        
				->get();
			$referred_level_three = $sett_meta[0]->sett_meta_value;
			}
			else
			{
			$referred_level_three = "";
			}	
		}
		else
		{
		  $referred_level_three = "";
		}
		
		 
		
		$check_sett_ref_four = DB::table('settings_meta')
		        ->where('sett_meta_id', '=' , 56)
				->where('sett_meta_key', '=' , "referred_level_four")
		        
				->count();
		if(!empty($check_sett_ref_four))
		{
		   
		    $sett_meta_well = DB::table('settings_meta')
		        ->where('sett_meta_id', '=' , 56)
				->where('sett_meta_key', '=' , "referred_level_four")
		        
				->count();
				
			if(!empty($sett_meta_well))
			{	
		   $sett_meta =  DB::table('settings_meta')
		        ->where('sett_meta_id', '=' , 56)
				->where('sett_meta_key', '=' , "referred_level_four")
		        
				->get();
			$referred_level_four = $sett_meta[0]->sett_meta_value;
			}
			else
			{
			$referred_level_four = "";
			}	
		}
		else
		{
		  $referred_level_four = "";
		}
		
		
		
		
		$check_sett_ref_five = DB::table('settings_meta')
		        ->where('sett_meta_id', '=' , 57)
				->where('sett_meta_key', '=' , "referred_level_five")
		        
				->count();
		if(!empty($check_sett_ref_five))
		{
		   
		    $sett_meta_well = DB::table('settings_meta')
		        ->where('sett_meta_id', '=' , 57)
				->where('sett_meta_key', '=' , "referred_level_five")
		        
				->count();
				
			if(!empty($sett_meta_well))
			{	
		   $sett_meta =  DB::table('settings_meta')
		        ->where('sett_meta_id', '=' , 57)
				->where('sett_meta_key', '=' , "referred_level_five")
		        
				->get();
			$referred_level_five = $sett_meta[0]->sett_meta_value;
			}
			else
			{
			$referred_level_five = "";
			}	
		}
		else
		{
		  $referred_level_five = "";
		}
		
		
		
		
		$check_sett_ref_six = DB::table('settings_meta')
		        ->where('sett_meta_id', '=' , 58)
				->where('sett_meta_key', '=' , "referred_level_six")
		        
				->count();
		if(!empty($check_sett_ref_six))
		{
		   
		    $sett_meta_well = DB::table('settings_meta')
		        ->where('sett_meta_id', '=' , 58)
				->where('sett_meta_key', '=' , "referred_level_six")
		        
				->count();
				
			if(!empty($sett_meta_well))
			{	
		   $sett_meta =  DB::table('settings_meta')
		        ->where('sett_meta_id', '=' , 58)
				->where('sett_meta_key', '=' , "referred_level_six")
		        
				->get();
			$referred_level_six = $sett_meta[0]->sett_meta_value;
			}
			else
			{
			$referred_level_six = "";
			}	
		}
		else
		{
		  $referred_level_six = "";
		}
		
		
		/* referred level */
		
					
									
		 
	$data = array('user' => $user, 'items_count' => $items_count, 'site_setting' => $site_setting, 'uu' => $uu, 'profile_status' => $profile_status, 'profile_badges' => $profile_badges, 'country_view' => $country_view, 'country_text' => $country_text, 'minimum_sells' => $minimum_sells, 'proders_details' => $proders_details, 'trends_details' => $trends_details, 'sold_price' => $sold_price, 'author_level_one' => $author_level_one, 'author_level_two' => $author_level_two, 'author_level_three' => $author_level_three, 'author_level_four' => $author_level_four, 'author_level_five' => $author_level_five, 'author_level_six' => $author_level_six, 'collector_details' => $collector_details, 'collector_level_one' => $collector_level_one, 'collector_level_two' => $collector_level_two, 'collector_level_three' => $collector_level_three, 'collector_level_four' => $collector_level_four, 'collector_level_five' => $collector_level_five, 'collector_level_six' => $collector_level_six,'referred_details' => $referred_details, 'referred_level_one' => $referred_level_one, 'referred_level_two' => $referred_level_two, 'referred_level_three' => $referred_level_three, 'referred_level_four' => $referred_level_four, 'referred_level_five' => $referred_level_five, 'referred_level_six' => $referred_level_six);	 
	  
	  return view('user')->with($data);
	  
	  
	  
	
	}
	
	
	public function avigher_subscribe(Request $request) 
	{
	   $default = DB::table('avig_language')
	              ->where('lang_default','=',1)
		           ->get();


$default_cnt = DB::table('avig_language')
	              ->where('lang_default','=',1)
		           ->count();
if(!empty(Cookie::get('lang'))){ $lang = Cookie::get('lang'); } else { if(!empty($default_cnt)){ $lang = $default[0]->lang_code; } else { $lang = "en"; } }
	
	
	
        $data = $request->all();
		$email=$data['email'];
		 $site_logo=$data['site_logo'];
		 
		 $site_url=$data['site_url'];
		 
		 $activated = $data['activated'];
		
		$site_name=$data['site_name'];
		$count = DB::table('newsletter')
		 ->where('email', '=', $email)
		
		 ->count();
		 
		 
		 
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
		
		
		 
	     if($count==0)
		 {
			 DB::insert('insert into newsletter (email,activated) values (?, ?)',[$email,$activated]);
			 $get = DB::table('newsletter')
               ->where('email', '=', $email)
			   ->where('activated', '=', $activated)
                ->get();
				$get_id = $get[0]->id;
			 
			 Mail::send('newsletter', ['email' => $email,
			 'site_logo' => $site_logo, 'site_name' => $site_name, 'activated' => $activated, 'site_url' => $site_url, 'get_id' => $get_id], function ($message) use ($site_name,$sett_sender_name,$sett_sender_email,$lang)
            {
            $message->subject($this->call_translate( 994, $lang));
			
            $message->from($sett_sender_email, $sett_sender_name);
			
			

            $message->to(Input::get('email'));

            });
			
			
			Mail::send('newsletter', ['email' => $email,
			 'site_logo' => $site_logo, 'site_name' => $site_name, 'activated' => $activated, 'site_url' => $site_url, 'get_id' => $get_id], function ($message) use ($site_name,$sett_sender_name,$sett_sender_email,$lang)
            {
            $message->subject($this->call_translate( 994, $lang));
			
            $message->from($sett_sender_email, $sett_sender_name);
			
			

            $message->to($sett_sender_email);

            });
			
			
			
			 
		 }
		 else
		 {
			 return redirect()->back()->with('nletter_error', $this->call_translate( 997, $lang));
			 
			 
		 }
		 
		 return redirect()->back()->with('nletter_success', $this->call_translate( 1000, $lang));	 
		 
        
        
    }
		
	
	
	
	
	public function avigher_search(Request $request)
	{
	    $data = $request->all();
		$search=$data['search'];
		
		$data = array('search' => $search);
            return view('search')->with($data);
	   
	}
	
	
	
	public function view_item($item_id,$slug)
	{
	
	
	$default = DB::table('avig_language')
	              ->where('lang_default','=',1)
		           ->get();


$default_cnt = DB::table('avig_language')
	              ->where('lang_default','=',1)
		           ->count();
if(!empty(Cookie::get('lang'))){ $lang = Cookie::get('lang'); } else { if(!empty($default_cnt)){ $lang = $default[0]->lang_code; } else { $lang = "en"; } }
	
	$url = URL::to("/");
	
	if($lang == "en")
	{
		$texter = "item_id"; 
	}
	else
	{
		$texter = "parent";
	}	
	
	$items_count = DB::table('products')
				->where('delete_status', '=', '')
				->where('item_status', '=', 1)
				->where('lang_code','=',$lang)
				->where($texter,'=',$item_id)
				->count();
				
				
				
	if(!empty($items_count))
	{
	
   
   $items = DB::table('products')
				->where('delete_status', '=', '')
				->where('item_status', '=', 1)
				->where('lang_code','=',$lang)
				->where($texter,'=',$item_id)
				->get();
				
				
		$items_news = DB::table('products')
				->where('delete_status', '=', '')
				->where('item_status', '=', 1)
				->where('lang_code','=','en')
				->where('item_id','=',$item_id)
				->get();	
				
				
  $item_title = $items[0]->item_title;
  $item_img = $items[0]->preview_image;	
  if($item_img!="")
  {
      $img_url = $url."/local/images/media/".$item_img;
  }
  else
  {
     $img_url = $url."/local/images/noimage.jpg";
  }	
  
  $item_desc = $items[0]->item_desc;
  $demo_url = $items[0]->demo_url;	
  $first_update = date("d F y", strtotime($items[0]->first_update));	
  $last_update = date("d F y", strtotime($items[0]->last_update));
  
  $high_resolution = $items[0]->high_resolution;
  $compatible_browser = $items[0]->compatible_browser;
  
  $file_included = $items[0]->file_included;
  
  $item_tags = $items[0]->item_tags;
  
  $sales = $items[0]->sales;
  
  $item_token = $items[0]->item_token;
  
  $item_slug = $items[0]->item_slug;
  
  
  if(!empty($items[0]->category))
					  {
					  $category_id = $items[0]->category;
					  
					  
                      $pieces = explode(",", $category_id);
					  $category_name ="";
                      foreach($pieces as $view)
					  {
					      $split = explode("_",$view);
						  $cid = $split[0];
						  $ctype = $split[1];
						  
						  if($lang == "en")
						  {
						    $texter = "id"; 
							$gain = "subid";
						  }
						  else
						  {
						     $texter = "parent";
							 $gain = "parent";
						  }	
						  if($ctype=="cat")
						  {
						      $category_first_new = DB::table('category')
									            ->where($texter,'=',$cid)
												->where('lang_code','=',$lang)
									            ->count();
							  if(!empty($category_first_new))
							  {
							  $category_first = DB::table('category')
									            ->where($texter,'=',$cid)
												->where('lang_code','=',$lang)
									            ->get();
							  $category_name .= $category_first[0]->cat_name.', ';
							  }
							  else
							  {
							     $category_name = "";
							  }
						  }
						  else if($ctype=="subcat")
						  {
						      
							   $category_firstt_new = DB::table('subcategory')
									            ->where($gain,'=',$cid)
												->where('lang_code','=',$lang)
									            ->count();
												
							  if(!empty($category_firstt_new))
							  {					
							  $category_first = DB::table('subcategory')
									            ->where($gain,'=',$cid)
												->where('lang_code','=',$lang)
									            ->get();
							  $category_name .= $category_first[0]->subcat_name.', ';
							  }
							  else
							  {
							  $category_name = "";
							  }
						  }
						  else
						  {
						     $category_name="";
						  }
						  
						  
					  }
					  
					  }
					  else
					  {
					     $category_name="";
					  }
					  
					  
			
			
			
		if(!empty($items[0]->framework_category))
					  {
					  $category_id = $items[0]->framework_category;
					  
					  
                      $pieces = explode(",", $category_id);
					  $framework_name ="";
                      foreach($pieces as $view)
					  {
					      $split = explode("_",$view);
						  $cid = $split[0];
						  $ctype = $split[1];
						  
						  if($lang == "en")
						  {
						    $texter = "id"; 
							$gain = "subid";
						  }
						  else
						  {
						     $texter = "parent";
							 $gain = "parent";
						  }	
						  if($ctype=="cat")
						  {
						      $category_first = DB::table('category')
									            ->where($texter,'=',$cid)
									            ->get();
							  $framework_name .= $category_first[0]->cat_name.', ';
						  }
						  else if($ctype=="subcat")
						  {
						      $category_first = DB::table('subcategory')
									            ->where($gain,'=',$cid)
									            ->get();
							  $framework_name .= $category_first[0]->subcat_name.', ';
						  }
						  else
						  {
						     $framework_name="";
						  }
						  
						  
					  }
					  
					  }
					  else
					  {
					     $framework_name="";
					  }
					  
					  
		
			
			
			
			
			
			
			
			
			
			
					  
					  
   
					  
		$item_future_update = $items[0]->future_update;			  
        $item_support_item = $items[0]->support_item;
		$regular_price_six_month = $items[0]->regular_price_six_month;
		$regular_price_one_year = $items[0]->regular_price_one_year;
		$extended_price_six_month = $items[0]->extended_price_six_month;
		$extended_price_one_year = $items[0]->extended_price_one_year;
		
		$item_user_id = $items[0]->user_id;
		$item_id = $items[0]->item_id;
		$item_gain = $items_news[0]->item_id;
		
		
		
		$related_cnt = DB::table('products')
				->where('delete_status', '=', '')
				->where('item_status', '=', 1)
				->where('item_id','!=',$item_id)
				->where('lang_code','=',$lang)
				->where('user_id','=',$item_user_id)
				->take(3)
				->count();	
				
			
			$today_date = date("Y-m-d");	
			$featured_count = DB::table('products')
				->where('item_featured', '=', 1)
				->where('item_id','=',$item_id)
				->where('delete_status', '=', '')
				->where('item_status', '=', 1)
				->where('featured_enddate', '>=', $today_date)
				->count();	
					
				
				
			$collector_details = DB::table('product_orders')
						->where('user_id','=',$item_user_id)
						->where('status','=','completed')
						->where('approval_status','=','payment released to vendor')
				        ->count();	
						
		
		
		
		$author_details = DB::table('users')
						->where('id','=',$item_user_id)
				        ->get();
						
			$proders_details = DB::table('product_orders')
						->where('item_user_id','=',$item_user_id)
						->where('status','=','completed')
						->where('approval_status','=','payment released to vendor')
				        ->count();
						
						
										
						
			$last_six = date("Y-m-d", strtotime("-6 months"));			
			$trends_details = DB::table('products')
						->where('last_update','>',$last_six)
						->where('user_id','=',$item_user_id)
						->where('delete_status','=','')
				        ->count();					
						
		
        $author = $author_details[0]->name;
		$author_slug = $author_details[0]->user_slug;
		$author_email = $author_details[0]->email;
		$author_photo = $author_details[0]->photo;
		$author_country = $author_details[0]->country;
		$datter = $author_details[0]->created_at;
		 
		
		
		$comment_count = DB::table('product_comment')
						->where('item_token','=',$item_token)
						->where('item_id','=',$item_id)
				        ->count();
						
						
						
		if(Auth::check()) 
				   {
				   $user_logged_details = DB::table('users')
										->where('id','=',Auth::user()->id)
										->get();
										
					$user_photo_url = $user_logged_details[0]->photo;
					
					
					$check_available = DB::table('product_comment')
										->where('comm_user_id','=',Auth::user()->id)
										->where('item_user_id','=',$item_user_id)
										->where('item_id','=',$item_id)
										->where('item_token','=',$item_token)
										->where('comm_parent','=',0)
										->count();
					
										
				   }
				   else
				   {
				   $user_photo_url = "";
				   $check_available = 0;
				   }				
						
						
		
		

		}
		else
		{
		  $item_title = "";
		  $img_url = "";
		  $item_desc = "";
		  $demo_url = "";
		  $first_update = "";
		  $last_update = "";
		  $category_name="";
		  $high_resolution = "";
		  $compatible_browser="";
		  $file_included="";
		  $item_tags="";
		  $item_token = "";
		  $item_future_update = "";
		  $item_support_item = "";
		  $regular_price_one_year = "";
		  $extended_price_six_month = "";
		  $extended_price_one_year = "";
		  $regular_price_six_month="";
		  $item_user_id = "";
		  $item_id = "";
		  $item_gain = "";
		  $sales = 0;
		  $author = "";
		  $author_slug = "";
		  $author_email = "";
		  $author_country = "";
		  $comment_count = 0;
		  $user_photo_url = "";
		  $check_available = 0;
		  $item_slug = "";
		  $author_photo = "";
		  $related_cnt = "";
		  $framework_name = "";
		  
		  $datter="";
		 
		  
		}
		
		
		$check_user_well = DB::table('users_meta')
		        ->where('user_id', '=' , $item_user_id)
				->where('user_meta_key', '=' , "profile_badges_status")
		        
				->count();
		if(!empty($check_user_well))
		{
		   
		    $user_meta_well = DB::table('users_meta')
		        ->where('user_id', '=' , $item_user_id)
				->where('user_meta_key', '=' , "profile_badges_status")
		        
				->count();
				
			if(!empty($user_meta_well))
			{	
		   $user_meta = DB::table('users_meta')
		        ->where('user_id', '=' , $item_user_id)
				->where('user_meta_key', '=' , "profile_badges_status")
		        
				->get();
			$profile_badges = $user_meta[0]->user_meta_value;
			}
			else
			{
			$profile_badges = "";
			}	
		}
		else
		{
		  $profile_badges = "";
		}
		
		
		
		
		 
		$country_count = DB::table('country')
		->where('country_id', '=', $author_country)
		->count();
		if(!empty($country_count))
		{
		 $country_get = DB::table('country')
					->where('country_id', '=', $author_country)
					->get();
		 $country_view = $country_get[0]->country_badges;			
		$country_text = $country_get[0]->country_name;			
		}
		else
		{
		$country_view = "";
		$country_text = "";
		}
		
					
		
         $setid=1;
		$setts = DB::table('settings')
		->where('id', '=', $setid)
		->get();
		
		
		
		
		
		$review_count_03 = DB::table('product_rating')
							->where('item_id', '=', $item_gain)
							->count();
														
														if(!empty($review_count_03))
														{
														$review_value_03 = DB::table('product_rating')
																	   ->where('item_id', '=', $item_gain)
																	   ->get();
														
														
														$over_03 = 0;
														$fine_value_03 = 0;
														foreach($review_value_03 as $review){
														if($review->rating==1){$value1 = $review->rating*1;} else { $value1 = 0; }
												if($review->rating==2){$value2 = $review->rating*2;} else { $value2 = 0; }
												if($review->rating==3){$value3 = $review->rating*3;} else { $value3 = 0; }
												if($review->rating==4){$value4 = $review->rating*4;} else { $value4 = 0; }
												if($review->rating==5){$value5 = $review->rating*5;} else { $value5 = 0; }
												
												$fine_value_03 += $value1 + $value2 + $value3 + $value4 + $value5;
												
										
											  $over_03 +=$review->rating;
											  
											  
											  
														}
														if(!empty(round($fine_value_03/$over_03))){ $roundeding_03 = round($fine_value_03/$over_03); } else {
												  $roundeding_03 = 0; }	
														
														
														}
				
				                       if(!empty($review_count_03))
				                               {
	                                           if(!empty($roundeding_03)){
	
	                                           if($roundeding_03==1){ $rateus_new_03 ='
                                                <p class="review-icon">
                                                   
                                                    <i class="fa fa-star my_yellow" aria-hidden="true"></i>
                                                    
                                                    
													<i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i> ('.$review_count_03.')
                                                </p>';
												}
												if($roundeding_03==2){ $rateus_new_03 ='
                                                <p class="review-icon">
                                                   
                                                    <i class="fa fa-star my_yellow" aria-hidden="true"></i>
                                                    <i class="fa fa-star my_yellow" aria-hidden="true"></i>
                                                   
													
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i> ('.$review_count_03.')
                                                </p>';
												}
												
												if($roundeding_03==3){ $rateus_new_03 ='
                                                <p class="review-icon">
                                                   
                                                    <i class="fa fa-star my_yellow" aria-hidden="true"></i>
                                                    <i class="fa fa-star my_yellow" aria-hidden="true"></i>
													<i class="fa fa-star my_yellow" aria-hidden="true"></i>
                                                   
													
                                                    
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i> ('.$review_count_03.')
                                                </p>';
												}
												
												if($roundeding_03==4){ $rateus_new_03 ='
                                                <p class="review-icon">
                                                    
                                                    <i class="fa fa-star my_yellow" aria-hidden="true"></i>
                                                    <i class="fa fa-star my_yellow" aria-hidden="true"></i>
													<i class="fa fa-star my_yellow" aria-hidden="true"></i>
													<i class="fa fa-star my_yellow" aria-hidden="true"></i> 
                                                    
											                                                
                                                    
                                                    <i class="fa fa-star" aria-hidden="true"></i> ('.$review_count_03.')
                                                </p>';
												}
												
												if($roundeding_03==5){ $rateus_new_03 ='
                                                <p class="review-icon">
                                                    
                                                    <i class="fa fa-star my_yellow" aria-hidden="true"></i>
                                                    <i class="fa fa-star my_yellow" aria-hidden="true"></i>
													<i class="fa fa-star my_yellow" aria-hidden="true"></i>
													<i class="fa fa-star my_yellow" aria-hidden="true"></i>
													 <i class="fa fa-star my_yellow" aria-hidden="true"></i> ('.$review_count_03.')
                                                    
											    </p>';
												}
												
												
												}
											    else if(empty($roundeding_03)){  $rateus_new_03 = '
												<p class="review-icon">
                                                    
													<i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
													<i class="fa fa-star" aria-hidden="true"></i>
													<i class="fa fa-star" aria-hidden="true"></i>
													 <i class="fa fa-star" aria-hidden="true"></i> ('.$review_count_03.')
											    </p>';
												}
												
												} else { $rateus_new_03 = ""; }
												
												
												
												$rateus_empty_03 = '
												<p class="review-icon">
                                                    
													<i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
													<i class="fa fa-star" aria-hidden="true"></i>
													<i class="fa fa-star" aria-hidden="true"></i>
													 <i class="fa fa-star" aria-hidden="true"></i> ('.$review_count_03.')
											    </p>';
								 
		
		$sale_count = DB::table('product_orders')
							->where('item_id', '=', $item_gain)
							->where('status', '=', 'completed')
							->count();
		
		$item_rate_count = DB::table('product_rating')
							->where('item_id', '=', $item_id)
							->count();	
							
			
			
			
			
			$check_sett_sells = DB::table('settings_meta')
		        ->where('sett_meta_id', '=' , 40)
				->where('sett_meta_key', '=' , "minimum_sells")
		        
				->count();
		if(!empty($check_sett_sells))
		{
		   
		    $sett_meta_well = DB::table('settings_meta')
		        ->where('sett_meta_id', '=' , 40)
				->where('sett_meta_key', '=' , "minimum_sells")
		        
				->count();
				
			if(!empty($sett_meta_well))
			{	
		   $sett_meta =  DB::table('settings_meta')
		        ->where('sett_meta_id', '=' , 40)
				->where('sett_meta_key', '=' , "minimum_sells")
		        
				->get();
			$minimum_sells = $sett_meta[0]->sett_meta_value;
			}
			else
			{
			$minimum_sells = "";
			}	
		}
		else
		{
		  $minimum_sells = "";
		}
			
			
			
		$check_sett_iframe = DB::table('settings_meta')
		        ->where('sett_meta_id', '=' , 37)
				->where('sett_meta_key', '=' , "site_preview_iframe")
		        
				->count();
		if(!empty($check_sett_iframe))
		{
		   
		    $sett_meta_seo = DB::table('settings_meta')
		        ->where('sett_meta_id', '=' , 37)
				->where('sett_meta_key', '=' , "site_preview_iframe")
		        
				->count();
				
			if(!empty($sett_meta_seo))
			{	
		   $sett_meta_chat =  DB::table('settings_meta')
		        ->where('sett_meta_id', '=' , 37)
				->where('sett_meta_key', '=' , "site_preview_iframe")
		        
				->get();
			$site_preview_iframe = $sett_meta_chat[0]->sett_meta_value;
			}
			else
			{
			$site_preview_iframe = "";
			}	
		}
		else
		{
		  $site_preview_iframe = "";
		}
		
		
		
		
		/* author level */
		
		
		$sold_details_count = DB::table('product_orders')
						->where('item_user_id','=',$item_user_id)
						->where('status','=','completed')
						->where('approval_status','=','payment released to vendor')
				        ->count();	
			if(!empty($sold_details_count))
			{					
			$sold_details = DB::table('product_orders')
						->where('item_user_id','=',$item_user_id)
						->where('status','=','completed')
						->where('approval_status','=','payment released to vendor')
				        ->get();
				$sold_price = 0; 		
				foreach($sold_details as $sold)
				{
				   $sold_price += $sold->vendor_amount;
				}			
						
			}
			else
			{
			   $sold_price = 0;
			}
		
		$check_sett_one = DB::table('settings_meta')
		        ->where('sett_meta_id', '=' , 41)
				->where('sett_meta_key', '=' , "author_level_one")
		        
				->count();
		if(!empty($check_sett_one))
		{
		   
		    $sett_meta_well = DB::table('settings_meta')
		        ->where('sett_meta_id', '=' , 41)
				->where('sett_meta_key', '=' , "author_level_one")
		        
				->count();
				
			if(!empty($sett_meta_well))
			{	
		   $sett_meta =  DB::table('settings_meta')
		        ->where('sett_meta_id', '=' , 41)
				->where('sett_meta_key', '=' , "author_level_one")
		        
				->get();
			$author_level_one = $sett_meta[0]->sett_meta_value;
			}
			else
			{
			$author_level_one = "";
			}	
		}
		else
		{
		  $author_level_one = "";
		}
		
		 
		
		$check_sett_two = DB::table('settings_meta')
		        ->where('sett_meta_id', '=' , 42)
				->where('sett_meta_key', '=' , "author_level_two")
		        
				->count();
		if(!empty($check_sett_two))
		{
		   
		    $sett_meta_well = DB::table('settings_meta')
		        ->where('sett_meta_id', '=' , 42)
				->where('sett_meta_key', '=' , "author_level_two")
		        
				->count();
				
			if(!empty($sett_meta_well))
			{	
		   $sett_meta =  DB::table('settings_meta')
		        ->where('sett_meta_id', '=' , 42)
				->where('sett_meta_key', '=' , "author_level_two")
		        
				->get();
			$author_level_two = $sett_meta[0]->sett_meta_value;
			}
			else
			{
			$author_level_two = "";
			}	
		}
		else
		{
		  $author_level_two = "";
		}
		
		
		
		
		$check_sett_three = DB::table('settings_meta')
		        ->where('sett_meta_id', '=' , 43)
				->where('sett_meta_key', '=' , "author_level_three")
		        
				->count();
		if(!empty($check_sett_three))
		{
		   
		    $sett_meta_well = DB::table('settings_meta')
		        ->where('sett_meta_id', '=' , 43)
				->where('sett_meta_key', '=' , "author_level_three")
		        
				->count();
				
			if(!empty($sett_meta_well))
			{	
		   $sett_meta =  DB::table('settings_meta')
		        ->where('sett_meta_id', '=' , 43)
				->where('sett_meta_key', '=' , "author_level_three")
		        
				->get();
			$author_level_three = $sett_meta[0]->sett_meta_value;
			}
			else
			{
			$author_level_three = "";
			}	
		}
		else
		{
		  $author_level_three = "";
		}
		
		 
		
		$check_sett_four = DB::table('settings_meta')
		        ->where('sett_meta_id', '=' , 44)
				->where('sett_meta_key', '=' , "author_level_four")
		        
				->count();
		if(!empty($check_sett_four))
		{
		   
		    $sett_meta_well = DB::table('settings_meta')
		        ->where('sett_meta_id', '=' , 44)
				->where('sett_meta_key', '=' , "author_level_four")
		        
				->count();
				
			if(!empty($sett_meta_well))
			{	
		   $sett_meta =  DB::table('settings_meta')
		        ->where('sett_meta_id', '=' , 44)
				->where('sett_meta_key', '=' , "author_level_four")
		        
				->get();
			$author_level_four = $sett_meta[0]->sett_meta_value;
			}
			else
			{
			$author_level_four = "";
			}	
		}
		else
		{
		  $author_level_four = "";
		}
		
		
		
		
		$check_sett_five = DB::table('settings_meta')
		        ->where('sett_meta_id', '=' , 45)
				->where('sett_meta_key', '=' , "author_level_five")
		        
				->count();
		if(!empty($check_sett_five))
		{
		   
		    $sett_meta_well = DB::table('settings_meta')
		        ->where('sett_meta_id', '=' , 45)
				->where('sett_meta_key', '=' , "author_level_five")
		        
				->count();
				
			if(!empty($sett_meta_well))
			{	
		   $sett_meta =  DB::table('settings_meta')
		        ->where('sett_meta_id', '=' , 45)
				->where('sett_meta_key', '=' , "author_level_five")
		        
				->get();
			$author_level_five = $sett_meta[0]->sett_meta_value;
			}
			else
			{
			$author_level_five = "";
			}	
		}
		else
		{
		  $author_level_five = "";
		}
		
		
		
		
		$check_sett_six = DB::table('settings_meta')
		        ->where('sett_meta_id', '=' , 46)
				->where('sett_meta_key', '=' , "author_level_six")
		        
				->count();
		if(!empty($check_sett_six))
		{
		   
		    $sett_meta_well = DB::table('settings_meta')
		        ->where('sett_meta_id', '=' , 46)
				->where('sett_meta_key', '=' , "author_level_six")
		        
				->count();
				
			if(!empty($sett_meta_well))
			{	
		   $sett_meta =  DB::table('settings_meta')
		        ->where('sett_meta_id', '=' , 46)
				->where('sett_meta_key', '=' , "author_level_six")
		        
				->get();
			$author_level_six = $sett_meta[0]->sett_meta_value;
			}
			else
			{
			$author_level_six = "";
			}	
		}
		else
		{
		  $author_level_six = "";
		}
		
		
		
		
		
		
		
		
		
		$check_sett_level_one = DB::table('settings_meta')
		        ->where('sett_meta_id', '=' , 47)
				->where('sett_meta_key', '=' , "collector_level_one")
		        
				->count();
		if(!empty($check_sett_level_one))
		{
		   
		    $sett_meta_well = DB::table('settings_meta')
		        ->where('sett_meta_id', '=' , 47)
				->where('sett_meta_key', '=' , "collector_level_one")
		        
				->count();
				
			if(!empty($sett_meta_well))
			{	
		   $sett_meta =  DB::table('settings_meta')
		        ->where('sett_meta_id', '=' , 47)
				->where('sett_meta_key', '=' , "collector_level_one")
		        
				->get();
			$collector_level_one = $sett_meta[0]->sett_meta_value;
			}
			else
			{
			$collector_level_one = "";
			}	
		}
		else
		{
		  $collector_level_one = "";
		}
		
		 
		
		$check_sett_level_two = DB::table('settings_meta')
		        ->where('sett_meta_id', '=' , 48)
				->where('sett_meta_key', '=' , "collector_level_two")
		        
				->count();
		if(!empty($check_sett_level_two))
		{
		   
		    $sett_meta_well = DB::table('settings_meta')
		        ->where('sett_meta_id', '=' , 48)
				->where('sett_meta_key', '=' , "collector_level_two")
		        
				->count();
				
			if(!empty($sett_meta_well))
			{	
		   $sett_meta =  DB::table('settings_meta')
		        ->where('sett_meta_id', '=' , 48)
				->where('sett_meta_key', '=' , "collector_level_two")
		        
				->get();
			$collector_level_two = $sett_meta[0]->sett_meta_value;
			}
			else
			{
			$collector_level_two = "";
			}	
		}
		else
		{
		  $collector_level_two = "";
		}
		
		
		
		
		$check_sett_level_three = DB::table('settings_meta')
		        ->where('sett_meta_id', '=' , 49)
				->where('sett_meta_key', '=' , "collector_level_three")
		        
				->count();
		if(!empty($check_sett_three))
		{
		   
		    $sett_meta_well = DB::table('settings_meta')
		        ->where('sett_meta_id', '=' , 49)
				->where('sett_meta_key', '=' , "collector_level_three")
		        
				->count();
				
			if(!empty($sett_meta_well))
			{	
		   $sett_meta =  DB::table('settings_meta')
		        ->where('sett_meta_id', '=' , 49)
				->where('sett_meta_key', '=' , "collector_level_three")
		        
				->get();
			$collector_level_three = $sett_meta[0]->sett_meta_value;
			}
			else
			{
			$collector_level_three = "";
			}	
		}
		else
		{
		  $collector_level_three = "";
		}
		
		 
		
		$check_sett_level_four = DB::table('settings_meta')
		        ->where('sett_meta_id', '=' , 50)
				->where('sett_meta_key', '=' , "collector_level_four")
		        
				->count();
		if(!empty($check_sett_level_four))
		{
		   
		    $sett_meta_well = DB::table('settings_meta')
		        ->where('sett_meta_id', '=' , 50)
				->where('sett_meta_key', '=' , "collector_level_four")
		        
				->count();
				
			if(!empty($sett_meta_well))
			{	
		   $sett_meta =  DB::table('settings_meta')
		        ->where('sett_meta_id', '=' , 50)
				->where('sett_meta_key', '=' , "collector_level_four")
		        
				->get();
			$collector_level_four = $sett_meta[0]->sett_meta_value;
			}
			else
			{
			$collector_level_four = "";
			}	
		}
		else
		{
		  $collector_level_four = "";
		}
		
		
		
		
		$check_sett_level_five = DB::table('settings_meta')
		        ->where('sett_meta_id', '=' , 51)
				->where('sett_meta_key', '=' , "collector_level_five")
		        
				->count();
		if(!empty($check_sett_level_five))
		{
		   
		    $sett_meta_well = DB::table('settings_meta')
		        ->where('sett_meta_id', '=' , 51)
				->where('sett_meta_key', '=' , "collector_level_five")
		        
				->count();
				
			if(!empty($sett_meta_well))
			{	
		   $sett_meta =  DB::table('settings_meta')
		        ->where('sett_meta_id', '=' , 51)
				->where('sett_meta_key', '=' , "collector_level_five")
		        
				->get();
			$collector_level_five = $sett_meta[0]->sett_meta_value;
			}
			else
			{
			$collector_level_five = "";
			}	
		}
		else
		{
		  $collector_level_five = "";
		}
		
		
		
		
		$check_sett_level_six = DB::table('settings_meta')
		        ->where('sett_meta_id', '=' , 52)
				->where('sett_meta_key', '=' , "collector_level_six")
		        
				->count();
		if(!empty($check_sett_level_six))
		{
		   
		    $sett_meta_well = DB::table('settings_meta')
		        ->where('sett_meta_id', '=' , 52)
				->where('sett_meta_key', '=' , "collector_level_six")
		        
				->count();
				
			if(!empty($sett_meta_well))
			{	
		   $sett_meta =  DB::table('settings_meta')
		        ->where('sett_meta_id', '=' , 52)
				->where('sett_meta_key', '=' , "collector_level_six")
		        
				->get();
			$collector_level_six = $sett_meta[0]->sett_meta_value;
			}
			else
			{
			$collector_level_six = "";
			}	
		}
		else
		{
		  $collector_level_six = "";
		}
		
		/* author level */
		
		
		
		/* referred level */
		
		
		$referred_details = DB::table('users')
						->where('referred_by','=',$item_user_id)
				        ->count();
		
		$check_sett_ref_one = DB::table('settings_meta')
		        ->where('sett_meta_id', '=' , 53)
				->where('sett_meta_key', '=' , "referred_level_one")
		        
				->count();
		if(!empty($check_sett_ref_one))
		{
		   
		    $sett_meta_well = DB::table('settings_meta')
		        ->where('sett_meta_id', '=' , 53)
				->where('sett_meta_key', '=' , "referred_level_one")
		        
				->count();
				
			if(!empty($sett_meta_well))
			{	
		   $sett_meta =  DB::table('settings_meta')
		        ->where('sett_meta_id', '=' , 53)
				->where('sett_meta_key', '=' , "referred_level_one")
		        
				->get();
			$referred_level_one = $sett_meta[0]->sett_meta_value;
			}
			else
			{
			$referred_level_one = "";
			}	
		}
		else
		{
		  $referred_level_one = "";
		}
		
		 
		
		$check_sett_ref_two = DB::table('settings_meta')
		        ->where('sett_meta_id', '=' , 54)
				->where('sett_meta_key', '=' , "referred_level_two")
		        
				->count();
		if(!empty($check_sett_ref_two))
		{
		   
		    $sett_meta_well = DB::table('settings_meta')
		        ->where('sett_meta_id', '=' , 54)
				->where('sett_meta_key', '=' , "referred_level_two")
		        
				->count();
				
			if(!empty($sett_meta_well))
			{	
		   $sett_meta =  DB::table('settings_meta')
		        ->where('sett_meta_id', '=' , 54)
				->where('sett_meta_key', '=' , "referred_level_two")
		        
				->get();
			$referred_level_two = $sett_meta[0]->sett_meta_value;
			}
			else
			{
			$referred_level_two = "";
			}	
		}
		else
		{
		  $referred_level_two = "";
		}
		
		
		
		
		$check_sett_ref_three = DB::table('settings_meta')
		        ->where('sett_meta_id', '=' , 55)
				->where('sett_meta_key', '=' , "referred_level_three")
		        
				->count();
		if(!empty($check_sett_ref_three))
		{
		   
		    $sett_meta_well = DB::table('settings_meta')
		        ->where('sett_meta_id', '=' , 55)
				->where('sett_meta_key', '=' , "referred_level_three")
		        
				->count();
				
			if(!empty($sett_meta_well))
			{	
		   $sett_meta =  DB::table('settings_meta')
		        ->where('sett_meta_id', '=' , 55)
				->where('sett_meta_key', '=' , "referred_level_three")
		        
				->get();
			$referred_level_three = $sett_meta[0]->sett_meta_value;
			}
			else
			{
			$referred_level_three = "";
			}	
		}
		else
		{
		  $referred_level_three = "";
		}
		
		 
		
		$check_sett_ref_four = DB::table('settings_meta')
		        ->where('sett_meta_id', '=' , 56)
				->where('sett_meta_key', '=' , "referred_level_four")
		        
				->count();
		if(!empty($check_sett_ref_four))
		{
		   
		    $sett_meta_well = DB::table('settings_meta')
		        ->where('sett_meta_id', '=' , 56)
				->where('sett_meta_key', '=' , "referred_level_four")
		        
				->count();
				
			if(!empty($sett_meta_well))
			{	
		   $sett_meta =  DB::table('settings_meta')
		        ->where('sett_meta_id', '=' , 56)
				->where('sett_meta_key', '=' , "referred_level_four")
		        
				->get();
			$referred_level_four = $sett_meta[0]->sett_meta_value;
			}
			else
			{
			$referred_level_four = "";
			}	
		}
		else
		{
		  $referred_level_four = "";
		}
		
		
		
		
		$check_sett_ref_five = DB::table('settings_meta')
		        ->where('sett_meta_id', '=' , 57)
				->where('sett_meta_key', '=' , "referred_level_five")
		        
				->count();
		if(!empty($check_sett_ref_five))
		{
		   
		    $sett_meta_well = DB::table('settings_meta')
		        ->where('sett_meta_id', '=' , 57)
				->where('sett_meta_key', '=' , "referred_level_five")
		        
				->count();
				
			if(!empty($sett_meta_well))
			{	
		   $sett_meta =  DB::table('settings_meta')
		        ->where('sett_meta_id', '=' , 57)
				->where('sett_meta_key', '=' , "referred_level_five")
		        
				->get();
			$referred_level_five = $sett_meta[0]->sett_meta_value;
			}
			else
			{
			$referred_level_five = "";
			}	
		}
		else
		{
		  $referred_level_five = "";
		}
		
		
		
		
		$check_sett_ref_six = DB::table('settings_meta')
		        ->where('sett_meta_id', '=' , 58)
				->where('sett_meta_key', '=' , "referred_level_six")
		        
				->count();
		if(!empty($check_sett_ref_six))
		{
		   
		    $sett_meta_well = DB::table('settings_meta')
		        ->where('sett_meta_id', '=' , 58)
				->where('sett_meta_key', '=' , "referred_level_six")
		        
				->count();
				
			if(!empty($sett_meta_well))
			{	
		   $sett_meta =  DB::table('settings_meta')
		        ->where('sett_meta_id', '=' , 58)
				->where('sett_meta_key', '=' , "referred_level_six")
		        
				->get();
			$referred_level_six = $sett_meta[0]->sett_meta_value;
			}
			else
			{
			$referred_level_six = "";
			}	
		}
		else
		{
		  $referred_level_six = "";
		}
		
		
		/* referred level */
		
		
								
				
	$data = array('items_count' => $items_count, 'item_id' => $item_id, 'item_title' => $item_title, 'img_url' => $img_url, 'item_desc' => $item_desc, 'demo_url' => $demo_url, 'first_update' => $first_update, 'last_update' => $last_update, 'category_name' => $category_name, 'high_resolution' => $high_resolution, 'compatible_browser' => $compatible_browser, 'file_included' => $file_included, 'item_tags' => $item_tags, 'item_token' => $item_token, 'sales' => $sales, 'item_future_update' => $item_future_update, 'item_support_item' => $item_support_item, 'regular_price_six_month' => $regular_price_six_month, 'regular_price_one_year' => $regular_price_one_year, 'extended_price_six_month' => $extended_price_six_month, 'extended_price_one_year' => $extended_price_one_year, 'item_user_id' => $item_user_id, 'item_id' => $item_id, 'url' => $url, 'setts' => $setts, 'review_count_03' => $review_count_03, 'rateus_new_03' => $rateus_new_03, 'rateus_empty_03' => $rateus_empty_03, 'sale_count' => $sale_count, 'item_rate_count' => $item_rate_count, 'author' => $author, 'author_slug' => $author_slug, 'author_email' => $author_email, 'comment_count' => $comment_count, 'user_photo_url' => $user_photo_url, 'check_available' => $check_available, 'item_slug' => $item_slug, 'author_photo' => $author_photo, 'related_cnt' => $related_cnt, 'framework_name' => $framework_name, 'item_gain' => $item_gain, 'profile_badges' => $profile_badges, 'country_view' => $country_view, 'country_text' => $country_text,  'datter' => $datter, 'proders_details' => $proders_details, 'minimum_sells' => $minimum_sells, 'site_preview_iframe' => $site_preview_iframe, 'trends_details' => $trends_details, 'sold_price' => $sold_price, 'author_level_one' => $author_level_one, 'author_level_two' => $author_level_two, 'author_level_three' => $author_level_three, 'author_level_four' => $author_level_four, 'author_level_five' => $author_level_five, 'author_level_six' => $author_level_six, 'collector_details' => $collector_details, 'collector_level_one' => $collector_level_one, 'collector_level_two' => $collector_level_two, 'collector_level_three' => $collector_level_three, 'collector_level_four' => $collector_level_four, 'collector_level_five' => $collector_level_five, 'collector_level_six' => $collector_level_six, 'featured_count' => $featured_count, 'referred_details' => $referred_details, 'referred_level_one' => $referred_level_one, 'referred_level_two' => $referred_level_two, 'referred_level_three' => $referred_level_three, 'referred_level_four' => $referred_level_four, 'referred_level_five' => $referred_level_five, 'referred_level_six' => $referred_level_six);				
	return view('item')->with($data);
	
	}
	
	
	
	 
    public function avigher_index()
    {
       
		

		$default = DB::table('avig_language')
						  ->where('lang_default','=',1)
						   ->get();
		
		
		$default_cnt = DB::table('avig_language')
						  ->where('lang_default','=',1)
						   ->count();
		if(!empty(Cookie::get('lang'))){ $lang = Cookie::get('lang'); } else { if(!empty($default_cnt)){ $lang = $default[0]->lang_code; } else { $lang = "en"; } }	
		
		
		$today_date = date("Y-m-d");
		
		
       
		$about = DB::table('pages')
		->where('page_id', '=', '1')
		->get();
		
		
		$blogs = DB::table('post')
				->where('post_type', '=', 'blog')
				->where('lang_code','=',$lang)
				->orderBy('post_id', 'desc')
				->take(3)
				->get();
				
		$blogs_cnt = DB::table('post')
				->where('post_type', '=', 'blog')
				->where('lang_code','=',$lang)
				->orderBy('post_id', 'desc')
				->take(3)
				->count();
				
			
			
			$sett_meta_well = DB::table('settings_meta')
		        ->where('sett_meta_id', '=' , 1)
				->where('sett_meta_key', '=' , "site_feature_item_count")
		        
				->count();
				
			if(!empty($sett_meta_well))
			{	
		   $sett_meta =  DB::table('settings_meta')
		        ->where('sett_meta_id', '=' , 1)
				->where('sett_meta_key', '=' , "site_feature_item_count")
		        
				->get();
			$sett_feature_item = $sett_meta[0]->sett_meta_value;
			}
			else
			{
			$sett_feature_item = 3;
			}
			
			
			
			
			
			$sett_meta_well_four = DB::table('settings_meta')
		        ->where('sett_meta_id', '=' , 4)
				->where('sett_meta_key', '=' , "site_customer_feedback")
		        
				->count();
				
			if(!empty($sett_meta_well_four))
			{	
		   $sett_meta_four =  DB::table('settings_meta')
		        ->where('sett_meta_id', '=' , 4)
				->where('sett_meta_key', '=' , "site_customer_feedback")
		        
				->get();
			$site_feed = $sett_meta_four[0]->sett_meta_value;
			}
			else
			{
			$site_feed = "";
			}
			
			
			
			
				
			
			
				
			
		$featured_count = DB::table('products')
				->where('item_featured', '=', 1)
				->where('lang_code','=',$lang)
				->where('delete_status', '=', '')
				->where('item_status', '=', 1)
				->where('featured_enddate', '>=', $today_date)
				->orderBy('item_id', 'desc')->take($sett_feature_item)->count();							
				
		$rate_count = DB::table('product_rating')
				      ->orderBy('rating', 'desc')
				      ->groupBy('item_id')
				      ->take(10)
					  ->count();
				
					
	 	$items_counted = DB::table('products_meta')
		        
				->where('item_meta_key', '=' , "item_type")
				->where('item_meta_value', '=' , "yes")
				->orderBy('item_meta_id','desc')
		        ->limit(6)
				->count();
		
      $siteid=1;
		$site_setting=DB::select('select * from settings where id = ?',[$siteid]);
		
		 
		 
		 $check_sett_view = DB::table('settings_meta')
		        ->where('sett_meta_id', '=' , 36)
				->where('sett_meta_key', '=' , "site_feature_view")
		        
				->count();
		if(!empty($check_sett_view))
		{
		   
		    $sett_meta_seo = DB::table('settings_meta')
		        ->where('sett_meta_id', '=' , 36)
				->where('sett_meta_key', '=' , "site_feature_view")
		        
				->count();
				
			if(!empty($sett_meta_seo))
			{	
		   $sett_meta_chat =  DB::table('settings_meta')
		        ->where('sett_meta_id', '=' , 36)
				->where('sett_meta_key', '=' , "site_feature_view")
		        
				->get();
			$site_feature_view = $sett_meta_chat[0]->sett_meta_value;
			}
			else
			{
			$site_feature_view = "";
			}	
		}
		else
		{
		  $site_feature_view = "";
		}
		
		
		
		$data = array('about' => $about,   'blogs' => $blogs, 'blogs_cnt' => $blogs_cnt, 'site_setting' => $site_setting, 'featured_count' => $featured_count, 'rate_count' => $rate_count,  'sett_feature_item' => $sett_feature_item, 'site_feed' => $site_feed, 'items_counted' => $items_counted, 'site_feature_view' => $site_feature_view);
            return view('index')->with($data);
    }
	
	
	
	public function view_all_featured_items()
	{
	
	$default = DB::table('avig_language')
						  ->where('lang_default','=',1)
						   ->get();
		
		
		$default_cnt = DB::table('avig_language')
						  ->where('lang_default','=',1)
						   ->count();
		if(!empty(Cookie::get('lang'))){ $lang = Cookie::get('lang'); } else { if(!empty($default_cnt)){ $lang = $default[0]->lang_code; } else { $lang = "en"; } }	
		
	
	   $today_date = date("Y-m-d");
	   $featured_count = DB::table('products')
				->where('item_featured', '=', 1)
				->where('lang_code','=',$lang)
				->where('delete_status', '=', '')
				->where('item_status', '=', 1)
				->where('featured_enddate', '>=', $today_date)
				->orderBy('item_id', 'desc')->count();	
				
	$siteid=1;
    $site_setting=DB::select('select * from settings where id = ?',[$siteid]);			
	
	$data = array('site_setting' => $site_setting, 'featured_count' => $featured_count);
            return view('featured-items')->with($data);
	}
	
	
	
	public function view_all_items()
	{
	   
	    $default = DB::table('avig_language')
	              ->where('lang_default','=',1)
		           ->get();


$default_cnt = DB::table('avig_language')
	              ->where('lang_default','=',1)
		           ->count();
if(!empty(Cookie::get('lang'))){ $lang = Cookie::get('lang'); } else { if(!empty($default_cnt)){ $lang = $default[0]->lang_code; } else { $lang = "en"; } }
	   
	   $items_count = DB::table('products')
				->where('delete_status', '=', '')
				->where('lang_code', '=', $lang)
				->where('item_status', '=', 1)
				->orderBy('item_id', 'desc')->count();	
				
	$siteid=1;
    $site_setting=DB::select('select * from settings where id = ?',[$siteid]);			
	
	$data = array('site_setting' => $site_setting, 'items_count' => $items_count);
            return view('all-items')->with($data);
	}
	
	
	public function view_free_items()
	{
	   $default = DB::table('avig_language')
	              ->where('lang_default','=',1)
		           ->get();


$default_cnt = DB::table('avig_language')
	              ->where('lang_default','=',1)
		           ->count();
if(!empty(Cookie::get('lang'))){ $lang = Cookie::get('lang'); } else { if(!empty($default_cnt)){ $lang = $default[0]->lang_code; } else { $lang = "en"; } }
	   
	$items_count = DB::table('products_meta')
		        
				->where('item_meta_key', '=' , "item_type")
				->where('item_meta_value', '=' , "yes")
				->orderBy('item_meta_id','desc')
		        
				->count();			
				
				
				
				
	$siteid=1;
    $site_setting=DB::select('select * from settings where id = ?',[$siteid]);			
	
	$data = array('site_setting' => $site_setting, 'items_count' => $items_count);
            return view('free-items')->with($data);
	}
	
	
	
	
	
	public function view_search_category($search,$tag,$category)
	{
	
	$default = DB::table('avig_language')
						  ->where('lang_default','=',1)
						   ->get();
		
		
		$default_cnt = DB::table('avig_language')
						  ->where('lang_default','=',1)
						   ->count();
		if(!empty(Cookie::get('lang'))){ $lang = Cookie::get('lang'); } else { if(!empty($default_cnt)){ $lang = $default[0]->lang_code; } else { $lang = "en"; } }
	
	
	$new_items_count = DB::table('products')
		            ->where('delete_status','=','')
					->where('item_status', '=', 1)
					->where('lang_code','=',$lang)
					->orderBy('item_id', 'desc')
					->count();
					
					
	   $popular_items_count = DB::table('products')
		            ->where('delete_status','=','')
					->where('item_status', '=', 1)
					->where('lang_code','=',$lang)
					->orderBy('downloaded', 'desc')
					->count();
					
					
		$min_price_count = 	DB::table('products')
		            ->where('delete_status','=','')
					->where('item_status', '=', 1)
					->orderBy('regular_price_six_month', 'asc')
					->take(1)
					->count();
					
					
		$max_price_count = 	DB::table('products')
		            ->where('delete_status','=','')
					->where('item_status', '=', 1)
					->orderBy('regular_price_six_month', 'desc')
					->take(1)
					->count();	
					
					
					
	                    $cate_count = DB::table('category')
								 ->where('delete_status','=','')
								 ->where('status','=',1)
								 ->where('lang_code','=',$lang)
								->where('cat_type','=','default')
								 ->orderBy('cat_name','asc')
								 ->count();
								 
					$frame_count = DB::table('category')
								 ->where('delete_status','=','')
								 ->where('status','=',1)
								 ->where('lang_code','=',$lang)
								->where('cat_type','=','framework')
								 ->orderBy('cat_name','asc')
								 ->count();				 
								 
										
	   
	   $list = "";
	   $siteid=1;
	   $category = "";
       $site_setting=DB::select('select * from settings where id = ?',[$siteid]);	
	   $data = array('site_setting' => $site_setting, 'list' => $list, 'new_items_count' => $new_items_count, 'popular_items_count' => $popular_items_count, 'min_price_count' => $min_price_count, 'max_price_count' => $max_price_count, 'cate_count' => $cate_count, 'search' => $search, 'category' => $category, 'tag' => $tag, 'frame_count' => $frame_count);
	
	    return view('search')->with($data);
	
	
	}
	
	
	
	
	public function view_search_text($search,$text)
	{
	   
	   
	   $default = DB::table('avig_language')
						  ->where('lang_default','=',1)
						   ->get();
		
		
		$default_cnt = DB::table('avig_language')
						  ->where('lang_default','=',1)
						   ->count();
		if(!empty(Cookie::get('lang'))){ $lang = Cookie::get('lang'); } else { if(!empty($default_cnt)){ $lang = $default[0]->lang_code; } else { $lang = "en"; } }
	
	   
	   $new_items_count = DB::table('products')
		            ->where('delete_status','=','')
					->where('item_status', '=', 1)
					->where('lang_code','=',$lang)
					->orderBy('item_id', 'desc')
					->count();
					
					
	   $popular_items_count = DB::table('products')
		            ->where('delete_status','=','')
					->where('item_status', '=', 1)
					->where('lang_code','=',$lang)
					->orderBy('downloaded', 'desc')
					->count();
					
					
		$min_price_count = 	DB::table('products')
		            ->where('delete_status','=','')
					->where('item_status', '=', 1)
					->orderBy('regular_price_six_month', 'asc')
					->take(1)
					->count();
					
					
		$max_price_count = 	DB::table('products')
		            ->where('delete_status','=','')
					->where('item_status', '=', 1)
					->orderBy('regular_price_six_month', 'desc')
					->take(1)
					->count();	
					
					
					
	                    $cate_count = DB::table('category')
								 ->where('delete_status','=','')
								 ->where('status','=',1)
								 ->where('lang_code','=',$lang)
								->where('cat_type','=','default')
								 ->orderBy('cat_name','asc')
								 ->count();
								 
								 
								 
						 $frame_count = DB::table('category')
								 ->where('delete_status','=','')
								 ->where('status','=',1)
								 ->where('lang_code','=',$lang)
								->where('cat_type','=','framework')
								 ->orderBy('cat_name','asc')
								 ->count();		 
								 
								 
										
	   
	   $list = "";
	   $siteid=1;
	   $tag = "";
	   $category = "";
       $site_setting=DB::select('select * from settings where id = ?',[$siteid]);	
	   $data = array('site_setting' => $site_setting, 'list' => $list, 'new_items_count' => $new_items_count, 'popular_items_count' => $popular_items_count, 'min_price_count' => $min_price_count, 'max_price_count' => $max_price_count, 'cate_count' => $cate_count, 'search' => $search, 'text' => $text, 'tag' => $tag, 'category' => $category, 'frame_count' => $frame_count);
	
	    return view('search')->with($data);
	}
	
	
	
	
	
	
	
	
	
	
	
	public function view_search()
	{
	   $default = DB::table('avig_language')
						  ->where('lang_default','=',1)
						   ->get();
		
		
		$default_cnt = DB::table('avig_language')
						  ->where('lang_default','=',1)
						   ->count();
		if(!empty(Cookie::get('lang'))){ $lang = Cookie::get('lang'); } else { if(!empty($default_cnt)){ $lang = $default[0]->lang_code; } else { $lang = "en"; } }	
		
	   
	   $new_items_count = DB::table('products')
		            ->where('delete_status','=','')
					->where('item_status', '=', 1)
					 ->where('lang_code','=',$lang)
					->orderBy('item_id', 'desc')
					->count();
					
					
	   $popular_items_count = DB::table('products')
		            ->where('delete_status','=','')
					->where('item_status', '=', 1)
					 ->where('lang_code','=',$lang)
					->orderBy('downloaded', 'desc')
					->count();
					
					
		$min_price_count = 	DB::table('products')
		            ->where('delete_status','=','')
					->where('item_status', '=', 1)
					->orderBy('regular_price_six_month', 'asc')
					->take(1)
					->count();
					
					
		$max_price_count = 	DB::table('products')
		            ->where('delete_status','=','')
					->where('item_status', '=', 1)
					->orderBy('regular_price_six_month', 'desc')
					->take(1)
					->count();	
					
					
					
	                    $cate_count = DB::table('category')
								 ->where('delete_status','=','')
								 ->where('status','=',1)
								  ->where('lang_code','=',$lang)
								->where('cat_type','=','default')
								 ->orderBy('cat_name','asc')
								 ->count();
								 
								 
						$frame_count = DB::table('category')
								 ->where('delete_status','=','')
								 ->where('status','=',1)
								  ->where('lang_code','=',$lang)
								->where('cat_type','=','framework')
								 ->orderBy('cat_name','asc')
								 ->count();		 
								 
										
	   
	   $list = "";
	   $siteid=1;
	   $search = "";
	   $text= "";
	   $tag = "";
	    $category = "";
       $site_setting=DB::select('select * from settings where id = ?',[$siteid]);	
	   $data = array('site_setting' => $site_setting, 'list' => $list, 'new_items_count' => $new_items_count, 'popular_items_count' => $popular_items_count, 'min_price_count' => $min_price_count, 'max_price_count' => $max_price_count, 'cate_count' => $cate_count, 'search' => $search, 'text' => $text, 'tag' => $tag, 'category' => $category, 'frame_count' => $frame_count);
	
	    return view('search')->with($data);
	}
	
	
	public function view_list_search($list)
	{
	
	    $default = DB::table('avig_language')
						  ->where('lang_default','=',1)
						   ->get();
		
		
		$default_cnt = DB::table('avig_language')
						  ->where('lang_default','=',1)
						   ->count();
		if(!empty(Cookie::get('lang'))){ $lang = Cookie::get('lang'); } else { if(!empty($default_cnt)){ $lang = $default[0]->lang_code; } else { $lang = "en"; } }
	
	    $new_items_count = DB::table('products')
		            ->where('delete_status','=','')
					->where('item_status', '=', 1)
					->where('lang_code','=',$lang)
					->orderBy('item_id', 'desc')
					->count();
					
					
	   $popular_items_count = DB::table('products')
		            ->where('delete_status','=','')
					->where('item_status', '=', 1)
					->where('lang_code','=',$lang)
					->orderBy('downloaded', 'desc')
					->count();
					
					
		$min_price_count = 	DB::table('products')
		            ->where('delete_status','=','')
					->where('item_status', '=', 1)
					->orderBy('regular_price_six_month', 'asc')
					->take(1)
					->count();
					
					
		$max_price_count = 	DB::table('products')
		            ->where('delete_status','=','')
					->where('item_status', '=', 1)
					->orderBy('regular_price_six_month', 'desc')
					->take(1)
					->count();	
					
					
		$cate_count = DB::table('category')
								 ->where('delete_status','=','')
								 ->where('status','=',1)
								 ->where('lang_code','=',$lang)
								->where('cat_type','=','default')
								 ->orderBy('cat_name','asc')
								 ->count();
								 
								 
		$frame_count = DB::table('category')
								 ->where('delete_status','=','')
								 ->where('status','=',1)
								 ->where('lang_code','=',$lang)
								->where('cat_type','=','framework')
								 ->orderBy('cat_name','asc')
								 ->count();							 
								 			
							
					
	
		$siteid=1;
		$search = "";
	   $text= "";
	   $tag = "";
	    $category = "";
		$site_setting=DB::select('select * from settings where id = ?',[$siteid]);	
	
	   $data = array('site_setting' => $site_setting, 'list' => $list, 'new_items_count' => $new_items_count, 'popular_items_count' => $popular_items_count, 'min_price_count' => $min_price_count, 'max_price_count' => $max_price_count, 'cate_count' => $cate_count, 'search' => $search, 'text' => $text, 'tag' => $tag, 'category' => $category, 'frame_count' => $frame_count);
            return view('search')->with($data);
	}
	
	
	
	public function newsletter_activate($id)
	{
	   
	    $default = DB::table('avig_language')
						  ->where('lang_default','=',1)
						   ->get();
		
		
		$default_cnt = DB::table('avig_language')
						  ->where('lang_default','=',1)
						   ->count();
		if(!empty(Cookie::get('lang'))){ $lang = Cookie::get('lang'); } else { if(!empty($default_cnt)){ $lang = $default[0]->lang_code; } else { $lang = "en"; } }	
		
	   
	   
	   $count = DB::table('newsletter')
		 ->where('id', '=', $id)
		 ->where('activated', '=', '0')
		 ->count();
		 
		 if($count == 1)
		 {
		    DB::update('update newsletter set activated="1" where id = ?', [$id]);
		Session::flash('message', $this->call_translate( 1003, $lang));
		return view('thankyou');
		 }
		 else
		 {
		    Session::flash('error', $this->call_translate( 997, $lang));
			return view('thankyou_error');
			
		 }
		 
	   /*return redirect()->back()->with('message', 'Your subscription has been confirmed! Thank you!');*/	
	   
	   
			
	}
	
	
	
	
	
	
	
	
	
	
	
}
