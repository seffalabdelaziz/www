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
use Illuminate\Validation\Rule;

class CurrencyController extends Controller
{
    /**
     * Show a list of all of the application's users.
     *
     * @return Response
     */
    public function index()
    {
        $currency = DB::table('currency')->orderBy('currency_id','desc')->get();
        $settings = DB::select('select * from settings where id = ?',[1]);
        return view('admin.currency', ['currency' => $currency, 'settings' => $settings]);
    }
	
	
	public function showform($id) {
      $currency = DB::select('select * from currency where currency_id = ?',[$id]);
      return view('admin.edit-currency',['currency'=>$currency]);
   }
   
   public function formview()

    {

        return view('admin.add-currency');

    }
	
	
	
	public function avigher_contact()
	{
	
	  $contact_count = DB::table('contact_us')
		                  ->orderBy('cont_id','desc')
					      ->count();
	   
	   
	    $contact_view = DB::table('contact_us')
		                 ->orderBy('cont_id','desc')
					     ->get();
					   
		$set_id=1;
		$site_setting = DB::table('settings')->where('id', $set_id)->get();			   

        return view('admin.contact', ['contact_count' => $contact_count, 'contact_view' => $contact_view, 'site_setting' => $site_setting]);
	
	
	}
	
	
	
	public function avigher_contact_delete($id)
	{
	
	
	DB::delete('delete from contact_us where cont_id = ?',[$id]);
	   
      return back();
	
	
	}
	
	
	
	
	
	
	public function clean($string) 
	{
    
     $string = preg_replace("/[^\p{L}\/_|+ -]/ui","",$string);

    
    $string = preg_replace("/[\/_|+ -]+/", '-', $string);

    
    $string =  trim($string,'-');

    return mb_strtolower($string);
	}
	
	
	
	
	
	
	protected function addpagedata(Request $request)
    {
       
		
		
		$this->validate($request, [

        		'currency_code' => 'required'

        		
				
				

        	]);
         
		 
				
		$input['currency_code'] = Input::get('currency_code');
		
       
		
		$rules = array(
		
		
		'currency_code' => [
                'required',
                'max:3',
                Rule::unique('currency')->where(function($query) {
                  $query->where('currency_code', '=', '');
               })
               ]
		
		
		
		
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
		
		
		 

		
		
		  $data = $request->all();

			
		$currency_code=$data['currency_code'];
		
		
		
		
		
		
		
		
		DB::insert('insert into currency (currency_code) values (?)', [$currency_code]);
		
		
			return back()->with('success', 'Code has been created');
        
		
		
		}
		
         
		 
		 
		 
	}
	
	
	
   
   
   protected function pagedata(Request $request)
    {
       
		
		
		
		$this->validate($request, [

        		'currency_code' => 'required'

        		
				
				

        	]);
         $data = $request->all();
		 $id = $data['currency_id'];
				
		$input['currency_code'] = Input::get('currency_code');
		
       
		
		$rules = array(
		
		
		'currency_code' => [
                'required',
                'max:3',
                Rule::unique('currency')->ignore($id, 'currency_id')->where(function($query) {
                  $query->where('currency_code', '=', '');
               })
               ]
		
		
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
		
		
		
		 
		   
		 
		 
		
		
		
		  

			
		$currency_code=$data['currency_code'];
		$currency_id = $data['currency_id'];
		
		
		
		
		DB::update('update currency set currency_code="'.$currency_code.'" where currency_id = ?', [$currency_id]);
		
		
		
		
			return back()->with('success', 'Code has been updated');
        
		
		
		}
		
		
		
		
		
		
		
    }
   
   
   
   public function deleted($id) 
   {
	
	    $idd = base64_decode($id);
		
		$settings = DB::select('select * from settings where id = ?',[1]);
		  
		  $current_symbol = $settings[0]->site_currency;
		
      DB::delete('delete from currency where currency_code!="'.$current_symbol.'" and currency_id = ?',[$idd]);
	   
      return back();
      
   }
   
   
   
   
   
   protected function delete_all(Request $request)
    {
		
		
	   $data = $request->all();
	   $currencyid = $data['currency_id'];
	   
	   foreach($currencyid as $pid)
	   {
   
   
		  $settings = DB::select('select * from settings where id = ?',[1]);
		  
		  $current_symbol = $settings[0]->site_currency;
		  
		  DB::delete('delete from currency where currency_code!="'.$current_symbol.'" and currency_id = ?',[$pid]);
		   
		  
      
        }
   return back();
   }
   
   
   
   
   
   
   
	
	
	
}