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
use Illuminate\Validation\Rule;
use Cookie;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

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
   
	 
    public function index()
    {
        $userid = Auth::user()->id;
		$editprofile = DB::select('select * from users where id = ?',[$userid]);
		
		
		/* user meta */
		$check_user_meta = DB::table('users_meta')
		        ->where('user_id', '=' , $userid)
				->where('user_meta_key', '=' , "profile_details_status")
		        
				->count();
		if(!empty($check_user_meta))
		{
		   
		    $user_meta_well = DB::table('users_meta')
		        ->where('user_id', '=' , $userid)
				->where('user_meta_key', '=' , "profile_details_status")
		        
				->count();
				
			if(!empty($user_meta_well))
			{	
		   $user_meta = DB::table('users_meta')
		        ->where('user_id', '=' , $userid)
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
		
		
		
		
		
		$check_user_meta_new = DB::table('users_meta')
		        ->where('user_id', '=' , $userid)
				->where('user_meta_key', '=' , "buyers_update_approval")
		        
				->count();
		if(!empty($check_user_meta_new))
		{
		   
		    $user_meta_we = DB::table('users_meta')
		        ->where('user_id', '=' , $userid)
				->where('user_meta_key', '=' , "buyers_update_approval")
		        
				->count();
				
			if(!empty($user_meta_we))
			{	
		   $user_meta_approval = DB::table('users_meta')
		        ->where('user_id', '=' , $userid)
				->where('user_meta_key', '=' , "buyers_update_approval")
		        
				->get();
			$buyers_update_approval = $user_meta_approval[0]->user_meta_value;
			}
			else
			{
			$buyers_update_approval = "";
			}	
		}
		else
		{
		  $buyers_update_approval = "";
		}
		
		
		
		
		
		$check_user_well = DB::table('users_meta')
		        ->where('user_id', '=' , $userid)
				->where('user_meta_key', '=' , "profile_badges_status")
		        
				->count();
		if(!empty($check_user_well))
		{
		   
		    $user_meta_well = DB::table('users_meta')
		        ->where('user_id', '=' , $userid)
				->where('user_meta_key', '=' , "profile_badges_status")
		        
				->count();
				
			if(!empty($user_meta_well))
			{	
		   $user_meta = DB::table('users_meta')
		        ->where('user_id', '=' , $userid)
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
		
		/* user meta */
		
		
		$viewpost = DB::table('post')
		        ->where('post_type', '=' , 'comment')
				->where('post_user_id', '=' , $userid)
		        
				->count();
				
				
		$countries_count = DB::table('country')
		->orderBy('country_name', 'asc')
		->count();		
		
		$data = array('editprofile' => $editprofile, 'viewpost' => $viewpost, 'profile_status' => $profile_status, 'buyers_update_approval' => $buyers_update_approval, 'countries_count' => $countries_count, 'profile_badges' => $profile_badges);
		return view('dashboard')->with($data);
    }
	
	
	
	public function avigher_contact_vendor(Request $request)
	{
	
	$default = DB::table('avig_language')
	              ->where('lang_default','=',1)
		           ->get();


$default_cnt = DB::table('avig_language')
	              ->where('lang_default','=',1)
		           ->count();
if(!empty(Cookie::get('lang'))){ $lang = Cookie::get('lang'); } else { if(!empty($default_cnt)){ $lang = $default[0]->lang_code; } else { $lang = "en"; } }
		
		
	
	    $data = $request->all();
		
		$name = $data['name'];
		
		$phone = $data['phone'];
		$msg = $data['msg'];
		
		$vendor_id = $data['vendor_id'];
		
		
		
		
		$setid=1;
		$setts = DB::table('settings')
		->where('id', '=', $setid)
		->get();
	
	   
	   $url = URL::to("/");
		
		$site_logo=$url.'/local/images/media/'.$setts[0]->site_logo;
		
		$site_name = $setts[0]->site_name;
		
		
		$seller_details = DB::table('users')
		 ->where('id', '=', $vendor_id)
		 ->get();
		
		
		$slug = $seller_details[0]->user_slug;
		
		$seller_email = $seller_details[0]->email;
		
		$user_email = $data['email'];
		
		$data = [
            'slug' => $slug, 'url' => $url, 'site_logo' => $site_logo, 'site_name' => $site_name, 'name' => $name, 'user_email' => $user_email, 'phone' => $phone, 'msg' => $msg, 'seller_email' => $seller_email
        ];
		
		
		 Mail::send('seller_contactmail', $data , function ($message) use ($user_email,$seller_email,$name,$lang)
        {
            $message->subject($this->call_translate( 862, $lang));
			
            $message->from($user_email, $name);

            $message->to($seller_email);

        });  
		
		
		
		return back()->with('success', $this->call_translate( 964, $lang));
		
		
		
		
		
	
	}
	
	
	
	
	
	
	
	public function mycomments()
    {
	$userid = Auth::user()->id;
	
	$viewpost = DB::table('post')
		        ->where('post_type', '=' , 'comment')
				->where('post_user_id', '=' , $userid)
		        
				->get();
				
	$postcount = DB::table('post')
		        ->where('post_type', '=' , 'comment')
				->where('post_user_id', '=' , $userid)
		        
				->count();			
				
	$data = array('viewpost' => $viewpost, 'postcount' => $postcount);
	return view('my-comments')->with($data);
	}
	
	
	public function mycomments_destroy($id) {
		
		
	   
	   DB::delete('delete from post where post_type="comment" and post_id = ?',[$id]);
     
	   
      return back();
      
   }
	
	
	
	
	
	
	
	public function avigher_logout()
	{
		Auth::logout();
       return back();
	}
	
	
	public function avigher_deleteaccount()
	{
		$userid = Auth::user()->id;
		
		
		
		
		
		
	  DB::delete('delete from post where post_type="comment" and post_user_id = ?',[$userid]);
	  
		
		
		DB::delete('delete from users where id!=1 and id = ?',[$userid]);
		return back();
	}
	
	
	public function clean($string) 
	{
    
     $string = preg_replace("/[^\p{L}\/_|+ -]/ui","",$string);

    
    $string = preg_replace("/[\/_|+ -]+/", '-', $string);

    
    $string =  trim($string,'-');

    return mb_strtolower($string);
	} 
	
	 protected function avigher_edituserdata(Request $request)
    {
       
		
		$default = DB::table('avig_language')
	              ->where('lang_default','=',1)
		           ->get();


$default_cnt = DB::table('avig_language')
	              ->where('lang_default','=',1)
		           ->count();
if(!empty(Cookie::get('lang'))){ $lang = Cookie::get('lang'); } else { if(!empty($default_cnt)){ $lang = $default[0]->lang_code; } else { $lang = "en"; } }
		
		
		 $this->validate($request, [

        		'name' => 'required',

        		'email' => 'required|email'

        		
				
				

        	]);
         
		 $data = $request->all();
			
         $id=$data['id'];
        			
		$input['email'] = Input::get('email');
       
		$input['name'] = Input::get('name');
		
		
		$rules = array(
        
       
		
        
		
		
		'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('users')->ignore($id, 'id')->where(function($query)  {
                  $query->where('delete_status', '=', '');
               })
               ],
			   
			   
		'name' => [
                'required',
                'regex:/^[\w-]*$/',
                'max:255',
                Rule::unique('users')->ignore($id, 'id')->where(function($query) {
                  $query->where('delete_status', '=', '');
               })
               ],	   
		
		
		'photo' => 'max:1024|mimes:jpg,jpeg,png',
		'phone' => 'required|max:255|unique:users,phone,'.$id
		
		
        );
		
		
		$messages = array(
            
            'email' => 'The :attribute field is already exists',
            'name' => 'The :attribute field must only be letters and numbers (no spaces)'
			
        );
		
		
		
		
		
		 $validator = Validator::make(Input::all(), $rules, $messages);

		

		if ($validator->fails())
		{
			 $failedRules = $validator->failed();
			 
			return back()->withErrors($validator);
		}
		else
		{ 
		  

		$name=$data['name'];
		$email=$data['email'];
		$password=bcrypt($data['password']);
		
		
		
		$phone=$data['phone'];
		
		
		$currentphoto=$data['currentphoto'];
		
		
		$image = Input::file('photo');
        if($image!="")
		{	
            $userphoto="/media/";
			$delpath = base_path('images'.$userphoto.$currentphoto);
			File::delete($delpath);	
			$filename  = time() . '210.' . $image->getClientOriginalExtension();
            
            $path = base_path('images'.$userphoto.$filename);
      
                Image::make($image->getRealPath())->resize(200, 200)->save($path);
				$savefname=$filename;
		}
        else
		{  
		    if($currentphoto=="")
			{
			$savefname = "";
			}
			else
			{
			$savefname=$currentphoto;
			}
		}
		
		
		
		
		
		
		$currentbanner=$data['currentbanner'];
		
		
		$profile_banner = Input::file('profile_banner');
        if($profile_banner!="")
		{	
            $userphoto="/media/";
			$delpath = base_path('images'.$userphoto.$currentbanner);
			File::delete($delpath);	
			$filenamey  = time() . '65.' . $profile_banner->getClientOriginalExtension();
            
            $pathy = base_path('images'.$userphoto.$filenamey);
      
                Image::make($profile_banner->getRealPath())->resize(1140, 370)->save($pathy);
				$savey=$filenamey;
		}
        else
		{
		    if($currentphoto=="")
			{
			$savey = "";
			}
			else
			{
		 
			$savey=$currentbanner;
			}
		}
		
		
		
		
		
		
		
					
		
		
		if($data['password']!="")
		{
			$passtxt=$password;
		}
		else
		{
			$passtxt=$data['savepassword'];
		}
		
		$admin=$data['usertype'];
		
		if($data['gender']!="")
		{
		    $gendor = $data['gender'];
		}
		else
		{
		   $gendor = $data['save_gender'];
		}
		
		
		if($data['country']!="")
		{
		   $country = $data['country'];
		}
		else
		{
		 $country = "";
		}
		
		if($data['address']!="")
		{
		  $address = $data['address'];
		}
		else
		{
		  $address = "";
		}
		
		if($data['about']!="")
		{
		   $about = $data['about'];
		}
		else
		{
		  $about = "";
		}
		
		
		if(!empty($data['profile_details_status']))
		{
		
		   $check_user_meta =  DB::table('users_meta')
		        				->where('user_id', '=' , $id)
				                ->where('user_meta_key', '=' , 'profile_details_status')
		                        ->count();
			if(!empty($check_user_meta))
			{
			   DB::update('update users_meta set user_meta_value="'.$data['profile_details_status'].'" where user_meta_key="profile_details_status" and user_id = ?', [$id]);
			}
			else
			{
			DB::insert('insert into users_meta (user_id,user_meta_key,user_meta_value) values (?, ?, ?)', [$id,"profile_details_status",$data['profile_details_status']]);
			
			}					
		
		  
		}
		
		
		if(!empty($data['profile_badges_status']))
		{
		
		   $check_user_meta =  DB::table('users_meta')
		        				->where('user_id', '=' , $id)
				                ->where('user_meta_key', '=' , 'profile_badges_status')
		                        ->count();
			if(!empty($check_user_meta))
			{
			   DB::update('update users_meta set user_meta_value="'.$data['profile_badges_status'].'" where user_meta_key="profile_badges_status" and user_id = ?', [$id]);
			}
			else
			{
			DB::insert('insert into users_meta (user_id,user_meta_key,user_meta_value) values (?, ?, ?)', [$id,"profile_badges_status",$data['profile_badges_status']]);
			
			}					
		
		  
		}
		
		
		
		
		
		
		if(!empty($data['buyers_update_approval']))
		{
		
		   $check_user_new =  DB::table('users_meta')
		        				->where('user_id', '=' , $id)
				                ->where('user_meta_key', '=' , 'buyers_update_approval')
		                        ->count();
			if(!empty($check_user_new))
			{
			   DB::update('update users_meta set user_meta_value="'.$data['buyers_update_approval'].'" where user_meta_key="buyers_update_approval" and user_id = ?', [$id]);
			}
			else
			{
			DB::insert('insert into users_meta (user_id,user_meta_key,user_meta_value) values (?, ?, ?)', [$id,"buyers_update_approval",$data['buyers_update_approval']]);
			
			}					
		
		  
		}
		
		
		
		
		DB::update('update post set post_email="'.$email.'" where post_type="comment" and post_user_id = ?', [$id]);
		
		
		
		
		/* seo */
		
		$check_sett_seo = DB::table('settings_meta')
		        ->where('sett_meta_id', '=' , 21)
				->where('sett_meta_key', '=' , "site_seo_slug")
		        
				->count();
		if(!empty($check_sett_seo))
		{
		   
		    $sett_meta_seo = DB::table('settings_meta')
		        ->where('sett_meta_id', '=' , 21)
				->where('sett_meta_key', '=' , "site_seo_slug")
		        
				->count();
				
			if(!empty($sett_meta_seo))
			{	
		   $sett_meta_chat =  DB::table('settings_meta')
		        ->where('sett_meta_id', '=' , 21)
				->where('sett_meta_key', '=' , "site_seo_slug")
		        
				->get();
			$site_seo = $sett_meta_chat[0]->sett_meta_value;
			}
			else
			{
			$site_seo = "";
			}	
		}
		else
		{
		  $site_seo = "";
		}
	   
	   
	   
	   if($site_seo == "no")
	   {
	      $pther = str_replace(" ","-",$name);
	   }
	   else
	   {
	      $pther = $this->clean($name);
	   }
	   
	   
	   
	   /* seo */
		
		
		
		
		DB::update('update users set name="'.$name.'",user_slug="'.$pther.'",email="'.$email.'",password="'.$passtxt.'",phone="'.$phone.'",gender="'.$gendor.'",photo="'.$savefname.'",admin="'.$admin.'",country="'.$country.'",address="'.$address.'",about="'.$about.'",profile_banner="'.$savey.'" where id = ?', [$id]);
		
		
		
			return back()->with('success', $this->call_translate( 967, $lang));
        }
		
		
		
		
    }
	
	
}
