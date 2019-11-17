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
use Mail;
use Auth;
use Crypt;
use URL;

class ProductsController extends Controller
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
	 
	public function fstaus($token,$f_status)
	{
	   $setid=1;
		$setts = DB::table('settings')
		->where('id', '=', $setid)
		->get();
		$featured_days = $setts[0]->featured_days;
		$featured_price = $setts[0]->featured_price;
		
		$start_date = date("Y-m-d");
	$end_date = date('Y-m-d', strtotime(' + '.$featured_days.' days'));
	
	$orderupdate = DB::table('products')
						->where('item_token', '=', $token)
						
						->update(['item_featured' => 1, 'featured_startdate' => $start_date, 'featured_enddate' => $end_date, 'featured_days' => $featured_days,      'featured_price' => $featured_price]);
		 
		 return back();
	
	} 
	 
	 
	 
	 public function status($token,$sid,$id,$user_id) 
	{
   
     DB::update('update products set item_status="'.$sid.'" where item_token = ?',[$token]);
	  
	  
	  if($sid==1)
	   {
	   $user = DB::table('users')
						->where('id', '=', $user_id)
						->get();
						
						
		$item = 	DB::table('products')
						->where('item_token', '=', $token)
						->get();
						
		$item_name = $item[0]->item_title;
		$slug = $item[0]->item_slug;						
						
						
	   $user_email = $user[0]->email;
	   
	   
	   
	   $setid=1;
		$setts = DB::table('settings')
		->where('id', '=', $setid)
		->get();
		
		$url = URL::to("/");
		
		$site_logo=$url.'/local/images/media/'.$setts[0]->site_logo;
		
		$site_name = $setts[0]->site_name;
		
		
		$aid=1;
		$admindetails = DB::table('users')
		 ->where('id', '=', $aid)
		 ->first();
		
		$admin_email = $admindetails->email;
		$admin_name = $admindetails->name;
		
		$datas = [
            'user_email' => $user_email, 'url' => $url, 'item_name' => $item_name, 'id' => $id, 'slug' => $slug, 'site_logo' => $site_logo, 'site_name' => $site_name, 'admin_name' => $admin_name
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
		
		
		
		
		
		
		Mail::send('admin.item_approval_mail', $datas , function ($message) use ($admin_email,$user_email,$sett_sender_name,$sett_sender_email)
        {
            $message->subject('Your item is approved');
			
            $message->from($sett_sender_email, $sett_sender_name);

            $message->to($user_email);

        }); 
		
		}
		 
		
	  
	  
	  
	   
      return back();
   
   
     }
	 
	 
	 
	 public function avigher_technologies_index()
	{
	   
	   
	   $items_count = DB::table('products')
		            ->where('delete_status','=','')
					->where('lang_code','=','en')
					->orderBy('item_id', 'desc')
					->count();
	   
			   
			   
		$setid=1;
		$setting = DB::table('settings')
		->where('id', '=', $setid)
		->get();
		   
		$data = array('items_count' => $items_count, 'setting' => $setting);	   
	   return view('admin.products')->with($data);
	}
	 
	 
	 
    public function avigher_technologies_single($token)
	{
	
	    $single_items = DB::table('products')
		                      ->where('item_token','=',$token)
							  ->get();
							  
	    $setid=1;
		$setting = DB::table('settings')
		->where('id', '=', $setid)
		->get();
		   
		$data = array('single_items' => $single_items, 'setting' => $setting);	   
	   return view('admin.product_more')->with($data);
	
	}
	
	
	
	 public function deleted($token) 
	 {
	
        
	  DB::update('update products set delete_status="deleted" where item_token = ?', [$token]);
	   
      return back();
      
   }
   
   
   
   protected function delete_all(Request $request)
    {
		
		
	   $data = $request->all();
	   $token = $data['token'];
	   
	   foreach($token as $key)
	   {
   
   
		 DB::update('update products set delete_status="deleted" where item_token = ?', [$key]); 
		  
		  
		   
		  
      
        }
   return back();
   }
   
   
   
	
	
	
	
	
	
}
