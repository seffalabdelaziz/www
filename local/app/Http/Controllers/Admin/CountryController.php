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

class CountryController extends Controller
{
    /**
     * Show a list of all of the application's users.
     *
     * @return Response
     */
    public function index()
    {
        $country = DB::table('country')->orderBy('country_name','asc')->get();
        $settings = DB::select('select * from settings where id = ?',[1]);
        return view('admin.country', ['country' => $country, 'settings' => $settings]);
    }
	
	
	public function showform($id) {
	$settings = DB::select('select * from settings where id = ?',[1]);
      $country = DB::select('select * from country where country_id = ?',[$id]);
      return view('admin.edit-country',['country'=>$country, 'settings' => $settings]);
   }
   
   public function formview()

    {

        return view('admin.add-country');

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

        		'country_name' => 'required'

        		
				
				

        	]);
         
		 
				
		$input['country_name'] = Input::get('country_name');
		
       
		
		$rules = array(
		
		
		'country_name' => [
                'required',
                
                Rule::unique('country')->where(function($query) {
                  $query->where('country_name', '=', '');
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

			
		$country_name=$data['country_name'];
		
		
		$image = Input::file('country_badges');
        if($image!="")
		{	
            $settingphoto="/media/";
			
			$filename  = time() . '.' . $image->getClientOriginalExtension();
            
            $path = base_path('images'.$settingphoto.$filename);
			$destinationPath=base_path('images'.$settingphoto);
      
                /*Image::make($image->getRealPath())->resize(200, 200)->save($path);*/
				
				Input::file('country_badges')->move($destinationPath, $filename);
				$savefname=$filename;
		}
        else
		{
			$savefname="";
		}
		
		
		
		
		
		DB::insert('insert into country (country_name,country_badges) values (?,?)', [$country_name,$savefname]);
		
		
			return back()->with('success', 'Record has been created');
        
		
		
		}
		
         
		 
		 
		 
	}
	
	
	
   
   
   protected function pagedata(Request $request)
    {
       
		
		
		
		$this->validate($request, [

        		'country_name' => 'required'

        		
				
				

        	]);
         $data = $request->all();
		 $id = $data['country_id'];
				
		$input['country_name'] = Input::get('country_name');
		
       
		
		$rules = array(
		
		
		'country_name' => [
                'required',
                
                Rule::unique('country')->ignore($id, 'country_id')->where(function($query) {
                  $query->where('country_name', '=', '');
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
		
		
		
		 
		   
		 
		 
		
		
		
		  

			
		$country_name=$data['country_name'];
		$country_id = $data['country_id'];
		
		$current_photo = $data['current_photo'];
		
		$image = Input::file('country_badges');
        if($image!="")
		{	
            $settingphoto="/media/";
			
			$filename  = time() . '.' . $image->getClientOriginalExtension();
            
            $path = base_path('images'.$settingphoto.$filename);
			$destinationPath=base_path('images'.$settingphoto);
      
                /*Image::make($image->getRealPath())->resize(200, 200)->save($path);*/
				
				Input::file('country_badges')->move($destinationPath, $filename);
				$savefname=$filename;
		}
        else
		{
			$savefname=$current_photo;
		}
		
		
		DB::update('update country set country_name="'.$country_name.'",country_badges="'.$savefname.'" where country_id = ?', [$country_id]);
		
		
		
		
			return back()->with('success', 'Record has been updated');
        
		
		
		}
		
		
		
		
		
		
		
    }
   
   
   
   public function deleted($id) 
   {
	
	    $idd = base64_decode($id);
		
		$settings = DB::select('select * from settings where id = ?',[1]);
		  
		  
		
      DB::delete('delete from country where country_id = ?',[$idd]);
	   
      return back();
      
   }
   
   
   
   
   
   protected function delete_all(Request $request)
    {
		
		
	   $data = $request->all();
	   $countryid = $data['country_id'];
	   
	   foreach($countryid as $pid)
	   {
   
   
		  $settings = DB::select('select * from settings where id = ?',[1]);
		  
		 
		  
		  DB::delete('delete from country where country_id = ?',[$pid]);
		   
		  
      
        }
   return back();
   }
   
   
   
   
   
   
   
	
	
	
}