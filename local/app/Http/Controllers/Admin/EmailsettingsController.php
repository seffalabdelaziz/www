<?php

namespace Responsive\Http\Controllers\Admin;


use Responsive\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

use Responsive\Http\Requests;
use Illuminate\Http\Request;
use Responsive\User;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use File;
use Image;


class EmailsettingsController extends Controller
{
    
   

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('admin');
    }
    
	
	public function showform() {
      $msettings = DB::select('select * from settings where id = ?',[1]);
	  $currency=array("USD","CZK","DKK","HKD","HUF","ILS","JPY","MXN","NZD","NOK","PHP","PLN","SGD","SEK","CHF","THB","AUD","CAD","EUR","GBP","AFN","DZD",
							"AOA","XCD","ARS","AMD","AWG","SHP","AZN","BSD","BHD","BDT","INR");
		
		$withdraw=array("paypal","instamojo");
		
		
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
		
		
		
		
		
		
	  $data=array('msettings'=>$msettings, 'currency' => $currency, 'withdraw' => $withdraw, 'sett_sender_name' => $sett_sender_name, 'sett_sender_email' => $sett_sender_email);
      return view('admin.email-settings')->with($data);
   }
	
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users'
            
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
	 
	  protected $fillable = ['name', 'email','password','phone'];
	 
    protected function editsettings(Request $request)
    {
       
		
		
		
		
         
		 $data = $request->all();
			
         
		
		
		
		 $rules = array(
               
		
		
		
        );
		
		$messages = array(
            
           
			
        );
		
		$validator = Validator::make(Input::all(), $rules, $messages);
		
		
		
		if ($validator->fails())
		{
			$failedRules = $validator->failed();
			 
			return back()->withErrors($validator);
		}
		else
		{ 
		
		
		
		
		
		if($data['sender_name']!="")
		{
		
		   $check_user_sname =  DB::table('settings_meta')
		        				->where('sett_meta_id', '=' , 22)
				                ->where('sett_meta_key', '=' , 'sender_name')
		                        ->count();
			if(!empty($check_user_sname))
			{
			   DB::update('update settings_meta set sett_meta_value="'.$data['sender_name'].'" where sett_meta_key="sender_name" and sett_meta_id = ?', [22]);
			}
			else
			{
			DB::insert('insert into settings_meta (sett_meta_id,sett_meta_key,sett_meta_value) values (?, ?, ?)', [22,"sender_name",$data['sender_name']]);
			
			}					
		
		  
		}
		
		
		
		
		if($data['sender_email']!="")
		{
		
		   $check_user_semail =  DB::table('settings_meta')
		        				->where('sett_meta_id', '=' , 23)
				                ->where('sett_meta_key', '=' , 'sender_email')
		                        ->count();
			if(!empty($check_user_semail))
			{
			   DB::update('update settings_meta set sett_meta_value="'.$data['sender_email'].'" where sett_meta_key="sender_email" and sett_meta_id = ?', [23]);
			}
			else
			{
			DB::insert('insert into settings_meta (sett_meta_id,sett_meta_key,sett_meta_value) values (?, ?, ?)', [23,"sender_email",$data['sender_email']]);
			
			}					
		
		  
		}
		
		
		
		
		
		
			return back()->with('success', 'Email Settings has been updated');
        
		
		}
		
		
    }
}
