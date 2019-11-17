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

class OrdersController extends Controller
{
    /**
     * Show a list of all of the application's users.
     *
     * @return Response
     */
    public function index()
    {
        $edit_orders_count = DB::table('product_orders')->where('delete_status','=','')->count();
		$setid=1;
		$setts = DB::table('settings')
		->where('id', '=', $setid)
		->get();

        return view('admin.orders', ['edit_orders_count' => $edit_orders_count, 'setts' => $setts]);
    }
	
	
	public function orders_dispute_delete($delete,$dispute_id)
	{
	   
	   
	   DB::update('update product_refund set delete_status="deleted" where dispute_id = ?',[$dispute_id]); 
	   return back();
	 
	}
	
	
	
	public function orders_refund($dispute_id,$order_id,$purchase_token,$admin_commission,$vendor_commission)
	{
	    $set_id=1;
		$site_setting = DB::table('settings')->where('id', $set_id)->get();
	    			
						
		
		$get_order_count = DB::table('product_orders')
						->where('purchase_token', '=', $purchase_token)	
						->where('ord_id', '=', $order_id)
						->count();
						
		if(!empty($get_order_count))
		{								
		$get_order = DB::table('product_orders')
						->where('purchase_token', '=', $purchase_token)	
						->where('ord_id', '=', $order_id)
						->get();
						
						
		$user_check = 	DB::table('users')
						->where('id', '=', $get_order[0]->item_user_id)
						->get();
						
		/*$wallet_balance = $user_check[0]->wallet;
		
			$credit_amt = 	$wallet_balance + $vendor_commission;
			
			
			
			
			
			DB::update('update users set wallet="'.$credit_amt.'" where id = ?', [$get_order[0]->item_user_id]); 
			
			
			$admin_check = 	DB::table('users')
						->where('id', '=', 1)
						->get();
			$admin_wallet = $admin_check[0]->wallet;
			$admin_amount = $admin_commission;
			
			$admin_credit = $admin_wallet + $admin_amount;
					
			DB::update('update users set wallet="'.$admin_credit.'" where id = ?', [1]);*/			
		
			$admin_amount = $admin_commission;
			
			DB::update('update product_orders set approval_status="payment released to vendor" where purchase_token="'.$purchase_token.'" and ord_id = ?', [$order_id]); 
			
			
			DB::update('update product_refund set dispute_status="payment released to vendor" where purchase_token="'.$purchase_token.'" and dispute_id = ?', [$dispute_id]); 
			$setid=1;
		$setts = DB::table('settings')
		->where('id', '=', $setid)
		->get();
		
		$currency = $setts[0]->site_currency;
		
		$url = URL::to("/");
		
		$site_logo=$url.'/local/images/media/'.$setts[0]->site_logo;
		
		$site_name = $setts[0]->site_name;
		
		
		$aid=1;
		$admindetails = DB::table('users')
		 ->where('id', '=', $aid)
		 ->first();
		
		$admin_email = $admindetails->email;
		$admin_name = $admindetails->name;
			
			
			$user_email = $user_check[0]->email;
			
			$fine_amount = $admin_amount + $vendor_commission;
			
			$datas = [
            'user_email' => $user_email, 'url' => $url, 'purchase_token' => $purchase_token, 'vendor_commission' => $vendor_commission, 'admin_amount' => $admin_amount, 'fine_amount' => $fine_amount, 'site_logo' => $site_logo, 'site_name' => $site_name, 'currency' => $currency
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
		
		
		
		
		
		Mail::send('admin.order_vendor_mail', $datas , function ($message) use ($admin_email,$user_email,$admin_name,$sett_sender_name,$sett_sender_email)
        {
            $message->subject('Payment credited to your wallet');
			
            $message->from($sett_sender_email, $sett_sender_name);

            $message->to($user_email);

        }); 
		
		
		
							
						
						
		}				
						
		return back();			
	
	
	}
	
	
	public function order_delete($delete,$order_id)
	{
	
	$set_id=1;
		$site_setting = DB::table('settings')->where('id', $set_id)->get();
		
		DB::update('update product_orders set delete_status="deleted" where ord_id = ?',[$order_id]); 
	
	   
      return back();	
	
	}
	
	
	public function orders_buyer_refund($dispute_id,$order_id,$purchase_token,$buyer_amount)
	{
	
	 $set_id=1;
		$site_setting = DB::table('settings')->where('id', $set_id)->get();
		
		
		$get_order_count = DB::table('product_orders')
						->where('purchase_token', '=', $purchase_token)	
						->where('ord_id', '=', $order_id)
						->count();
						
		if(!empty($get_order_count))
		{								
		$get_order = DB::table('product_orders')
						->where('purchase_token', '=', $purchase_token)	
						->where('ord_id', '=', $order_id)
						->get();
						
						
		$user_check = 	DB::table('users')
						->where('id', '=', $get_order[0]->user_id)
						->get();
						
		$wallet_balance = $user_check[0]->wallet;
		
			$credit_amt = 	$wallet_balance + $buyer_amount;
			
			
			
			
			
			DB::update('update users set wallet="'.$credit_amt.'" where id = ?', [$get_order[0]->user_id]); 
			
			
			
			
			DB::update('update product_orders set approval_status="payment refunded to buyer" where purchase_token="'.$purchase_token.'" and ord_id = ?', [$order_id]); 
			
			
			DB::update('update product_refund set dispute_status="payment refunded to buyer" where purchase_token="'.$purchase_token.'" and dispute_id = ?', [$dispute_id]); 
			
			$get_rating = DB::table('product_rating')
						->where('item_id', '=', $get_order[0]->item_id)	
						->where('user_id', '=', $get_order[0]->user_id)
						->count();
			if(!empty($get_rating))
			{
			   
			   DB::delete('delete from product_rating where item_id="'.$get_order[0]->item_id.'" and user_id = ?',[$get_order[0]->user_id]);
			   
			}
			
			
			$vendor_minus = $get_order[0]->vendor_amount;
			$admin_minus = $get_order[0]->admin_amount;
			
			$get_vendor_details = DB::table('users')
						->where('id', '=', $get_order[0]->item_user_id)
						->get();
			$vendor_old_balance = $get_vendor_details[0]->wallet - 	$vendor_minus;
					
			DB::update('update users set wallet="'.$vendor_old_balance.'" where id = ?', [$get_order[0]->item_user_id]); 
			
			
			
			$get_admin_detail =  DB::table('users')
						->where('id', '=', 1)
						->get();
						
			$admin_old_balance = $get_admin_detail[0]->wallet - $admin_minus;		
			DB::update('update users set wallet="'.$admin_old_balance.'" where id = ?', [1]); 
			
			$setid=1;
		$setts = DB::table('settings')
		->where('id', '=', $setid)
		->get();
		
		$currency = $setts[0]->site_currency;
		
		$url = URL::to("/");
		
		$site_logo=$url.'/local/images/media/'.$setts[0]->site_logo;
		
		$site_name = $setts[0]->site_name;
		
		
		$aid=1;
		$admindetails = DB::table('users')
		 ->where('id', '=', $aid)
		 ->first();
		
		$admin_email = $admindetails->email;
		$admin_name = $admindetails->name;
			
			
			$user_email = $user_check[0]->email;
			
			$fine_amount = $buyer_amount;
			
			$datas = [
            'user_email' => $user_email, 'url' => $url, 'purchase_token' => $purchase_token, 'fine_amount' => $fine_amount, 'site_logo' => $site_logo, 'site_name' => $site_name, 'currency' => $currency
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
		
		
		
		
		
		Mail::send('admin.order_buyer_mail', $datas , function ($message) use ($admin_email,$user_email,$admin_name,$sett_sender_name,$sett_sender_email)
        {
            $message->subject('Payment refunded to your wallet');
			
            $message->from($sett_sender_email, $sett_sender_name);

            $message->to($user_email);

        }); 
		
		
		
							
						
						
		}				
		
		
		return back();
		
		
		
		
		
	
	}
	
	
	
	
	
	
	
	
	
	public function view_orders($ord_id)
	{
	
	  $view_orders = DB::table('product_orders')->where('ord_id','=',$ord_id)->get();
	  $item_id = $view_orders[0]->item_id;
					  $product_details = DB::table('products')->where('item_id','=',$item_id)->get();
					  
					  
		$buyer_id = $view_orders[0]->user_id;
					  $buyer_details = DB::table('users')->where('id','=',$buyer_id)->get();
					  
					  $vendor_id = $view_orders[0]->item_user_id;
					  $vendor_details = DB::table('users')->where('id','=',$vendor_id)->get();
					  
					  
		$setid=1;
		$setts = DB::table('settings')
		->where('id', '=', $setid)
		->get();			  			  

        return view('admin.order_details', ['view_orders' => $view_orders, 'product_details' => $product_details, 'buyer_details' => $buyer_details, 'vendor_details'=> $vendor_details, 'setts' => $setts]);
	
	}
	
	
	
	public function payment_approval($ord_id)
	{
	
	
	  $view_orders = DB::table('product_orders')->where('ord_id','=',$ord_id)->get();
	  
	  if(empty($view_orders[0]->approval_status))
	  {
	  
	  $buyer_id = $view_orders[0]->user_id;
					  $buyer_details = DB::table('users')->where('id','=',$buyer_id)->get();
					  
					  $vendor_id = $view_orders[0]->item_user_id;
					  $vendor_details = DB::table('users')->where('id','=',$vendor_id)->get();
					  
					  $vendor_balance = $vendor_details[0]->wallet;
					  $vendor_amount = $view_orders[0]->vendor_amount;
					  
					  $total_vendor = $vendor_balance + $vendor_amount;
					  
					DB::update('update users set wallet="'.$total_vendor.'" where id = ?', [$vendor_id]); 
					
					$aid=1;
		$admindetails = DB::table('users')
		 ->where('id', '=', $aid)
		 ->first();
					
					$admin_balance =  $admindetails->wallet;
					$admin_amount = $view_orders[0]->admin_amount;
					
					$total_admin = $admin_balance + $admin_amount;
					
					DB::update('update users set wallet="'.$total_admin.'" where id = ?', [1]);
					
					
					DB::update('update product_orders set approval_status="payment released to vendor" where ord_id = ?', [$ord_id]);  
					
				$purchase_id = $view_orders[0]->purchase_token;	
					
					
		$setid=1;
		$setts = DB::table('settings')
		->where('id', '=', $setid)
		->get();
		
		$url = URL::to("/");
		
		$site_logo=$url.'/local/images/media/'.$setts[0]->site_logo;
		
		$site_name = $setts[0]->site_name;
		
		
		
		
		$admin_email = $admindetails->email;
		$admin_name = $admindetails->name;
		
		$vendor_email = $vendor_details[0]->email;
		
		
		$datas = [
            'vendor_email' => $vendor_email, 'url' => $url,  'site_logo' => $site_logo, 'site_name' => $site_name, 'admin_name' => $admin_name, 'purchase_id' => $purchase_id, 'ord_id' => $ord_id
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
		
		
		
		
		
		
		
		Mail::send('admin.item_payment_approval', $datas , function ($message) use ($admin_email,$admin_name,$vendor_email,$sett_sender_name,$sett_sender_email)
        {
            $message->subject('Payment received on your wallet');
			
            $message->from($sett_sender_email, $sett_sender_name);

            $message->to($vendor_email);

        }); 
					
					  
					  
	return back();
	
	}
	else
	{
	   return back();
	
	}
	
	
	
	
	}
	
	
	
	
	
}