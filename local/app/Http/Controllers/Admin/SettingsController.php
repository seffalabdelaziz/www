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


class SettingsController extends Controller
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
      $settings = DB::select('select * from settings where id = ?',[1]);
	  
	  
	  $view_list =  DB::table('currency')
	                ->orderBy('currency_code','asc')
		            ->get();
	  
	  $currency=$view_list;
		
		
		
		/* user meta */
		$check_sett_meta = DB::table('settings_meta')
		        ->where('sett_meta_id', '=' , 1)
				->where('sett_meta_key', '=' , "site_feature_item_count")
		        
				->count();
		if(!empty($check_sett_meta))
		{
		   
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
			$sett_feature_item = "";
			}	
		}
		else
		{
		  $sett_feature_item = "";
		}
		
		
		
		
		$check_sett_meta_two = DB::table('settings_meta')
		        ->where('sett_meta_id', '=' , 2)
				->where('sett_meta_key', '=' , "site_back_to_top")
		        
				->count();
		if(!empty($check_sett_meta_two))
		{
		   
		    $sett_meta_well_two = DB::table('settings_meta')
		        ->where('sett_meta_id', '=' , 2)
				->where('sett_meta_key', '=' , "site_back_to_top")
		        
				->count();
				
			if(!empty($sett_meta_well_two))
			{	
		   $sett_meta_two =  DB::table('settings_meta')
		        ->where('sett_meta_id', '=' , 2)
				->where('sett_meta_key', '=' , "site_back_to_top")
		        
				->get();
			$site_back_to_top = $sett_meta_two[0]->sett_meta_value;
			}
			else
			{
			$site_back_to_top = "";
			}	
		}
		else
		{
		  $site_back_to_top = "";
		}
		
		
		
		
		
		
		$check_sett_meta_three = DB::table('settings_meta')
		        ->where('sett_meta_id', '=' , 3)
				->where('sett_meta_key', '=' , "site_google_analytics")
		        
				->count();
		if(!empty($check_sett_meta_three))
		{
		   
		    $sett_meta_well_three = DB::table('settings_meta')
		        ->where('sett_meta_id', '=' , 3)
				->where('sett_meta_key', '=' , "site_google_analytics")
		        
				->count();
				
			if(!empty($sett_meta_well_three))
			{	
		   $sett_meta_three =  DB::table('settings_meta')
		        ->where('sett_meta_id', '=' , 3)
				->where('sett_meta_key', '=' , "site_google_analytics")
		        
				->get();
			$site_google_analytics = $sett_meta_three[0]->sett_meta_value;
			}
			else
			{
			$site_google_analytics = "";
			}	
		}
		else
		{
		  $site_google_analytics = "";
		}
		
		
		
		
		
		$check_sett_meta_four = DB::table('settings_meta')
		        ->where('sett_meta_id', '=' , 4)
				->where('sett_meta_key', '=' , "site_customer_feedback")
		        
				->count();
		if(!empty($check_sett_meta_four))
		{
		   
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
			$site_customer_feedback = $sett_meta_four[0]->sett_meta_value;
			}
			else
			{
			$site_customer_feedback = "";
			}	
		}
		else
		{
		  $site_customer_feedback = "";
		}
		
		
		
		
		$check_sett_meta_chat = DB::table('settings_meta')
		        ->where('sett_meta_id', '=' , 15)
				->where('sett_meta_key', '=' , "site_live_chat")
		        
				->count();
		if(!empty($check_sett_meta_chat))
		{
		   
		    $sett_meta_well_chat = DB::table('settings_meta')
		        ->where('sett_meta_id', '=' , 15)
				->where('sett_meta_key', '=' , "site_live_chat")
		        
				->count();
				
			if(!empty($sett_meta_well_chat))
			{	
		   $sett_meta_chat =  DB::table('settings_meta')
		        ->where('sett_meta_id', '=' , 15)
				->where('sett_meta_key', '=' , "site_live_chat")
		        
				->get();
			$site_live_chat = $sett_meta_chat[0]->sett_meta_value;
			}
			else
			{
			$site_live_chat = "";
			}	
		}
		else
		{
		  $site_live_chat = "";
		}
		
		
		
		
		
		
		
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
		
		
		
		
		
		
		$check_sett_trans = DB::table('settings_meta')
		        ->where('sett_meta_id', '=' , 35)
				->where('sett_meta_key', '=' , "site_translation")
		        
				->count();
		if(!empty($check_sett_trans))
		{
		   
		    $sett_meta_seo = DB::table('settings_meta')
		        ->where('sett_meta_id', '=' , 35)
				->where('sett_meta_key', '=' , "site_translation")
		        
				->count();
				
			if(!empty($sett_meta_seo))
			{	
		   $sett_meta_chat =  DB::table('settings_meta')
		        ->where('sett_meta_id', '=' , 35)
				->where('sett_meta_key', '=' , "site_translation")
		        
				->get();
			$site_translation = $sett_meta_chat[0]->sett_meta_value;
			}
			else
			{
			$site_translation = "";
			}	
		}
		else
		{
		  $site_translation = "";
		}
		
		
		
		
		
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
		
		
		/* user meta */
		
		$translate_01 = DB::table('avig_translate')
		         ->where('id','=',25)
				 ->get();
		
		$translate_02 = DB::table('avig_translate')
		         ->where('id','=',28)
				 ->get();
				 
		$translate_03 = DB::table('avig_translate')
		         ->where('id','=',31)
				 ->get();		 
				 
		
		$translate_04 = DB::table('avig_translate')
		         ->where('id','=',34)
				 ->get();
		
		$translate_05 = DB::table('avig_translate')
		         ->where('id','=',37)
				 ->get();
		
	  $data=array('settings'=>$settings, 'currency' => $currency, 'sett_feature_item' => $sett_feature_item, 'site_back_to_top' => $site_back_to_top, 'site_google_analytics' => $site_google_analytics, 'site_customer_feedback' => $site_customer_feedback, 'site_live_chat' => $site_live_chat, 'site_seo' => $site_seo, 'translate_01' => $translate_01, 'translate_02' => $translate_02, 'translate_03' => $translate_03, 'translate_04' => $translate_04, 'translate_05' => $translate_05, 'site_translation' => $site_translation, 'site_feature_view' => $site_feature_view, 'site_preview_iframe' => $site_preview_iframe);
      return view('admin.settings')->with($data);
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
			
         
		$site_name=$data['site_name'];
		
		
		$imgsize=$data['image_size'];
		$imgtype=$data['image_type'];
		
		
		
		
		
		
		
		 $rules = array(
               
		'site_logo' => 'max:'.$imgsize.'|mimes:'.$imgtype,
		'site_favicon' => 'max:'.$imgsize.'|mimes:'.$imgtype,
		'site_banner' => 'max:'.$imgsize.'|mimes:'.$imgtype,
		'site_loading_url' => 'max:'.$imgsize.'|mimes:'.$imgtype
		
		
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
		
		$currentlogo=$data['currentlogo'];
		
		
		$image = Input::file('site_logo');
        if($image!="")
		{	
            $settingphoto="/media/";
			$delpath = base_path('images'.$settingphoto.$currentlogo);
			File::delete($delpath);	
			$filename  = time() . '.' . $image->getClientOriginalExtension();
            
            $path = base_path('images'.$settingphoto.$filename);
			$destinationPath=base_path('images'.$settingphoto);
      
                /*Image::make($image->getRealPath())->resize(200, 200)->save($path);*/
				
				Input::file('site_logo')->move($destinationPath, $filename);
				$savefname=$filename;
		}
        else
		{
			$savefname=$currentlogo;
		}	




		$currentfav = $data['currentfav'];
		
		
		
		$images = Input::file('site_favicon');
        if($images!="")
		{	
            $settingphotos="/media/";
			$delpaths = base_path('images'.$settingphotos.$currentfav);
			File::delete($delpaths);	
			$filenames  = time() . '.' . $images->getClientOriginalExtension();
            
            $paths = base_path('images'.$settingphotos.$filenames);
			$destinationPaths=base_path('images'.$settingphotos);
      
                Image::make($images->getRealPath())->resize(24, 24)->save($paths);
				
				/* Input::file('site_logo')->move($destinationPath, $filename);*/
				$savefav=$filenames;
		}
        else
		{
			$savefav=$currentfav;
		}
		
		
		
		$currentban = $data['currentban'];
		
		
		$banimages = Input::file('site_banner');
        if($banimages!="")
		{	
            $settingbanphotos="/media/";
			$delpathes = base_path('images'.$settingbanphotos.$currentban);
			File::delete($delpathes);	
			$banfilenames  = time() . '.' . $banimages->getClientOriginalExtension();
            
            $banpaths = base_path('images'.$settingbanphotos.$banfilenames);
			$destinationbanPaths=base_path('images'.$settingbanphotos);
      
                /*Image::make($banimages->getRealPath())->resize(1920, 500)->save($banpaths);*/
				Input::file('site_banner')->move($destinationbanPaths, $banfilenames);
				
				$savefavs=$banfilenames;
		}
        else
		{
			$savefavs=$currentban;
		}
		
		
		
		
		
		
		
		
		
		if(!empty($data['currency']))
		{
		  $currency = $data['currency'];
		}
		else
		{
		 $currency = "";
		}
		
		
		
		$currentloading = $data['save_loading_url'];
		$loadurl = Input::file('site_loading_url');
        if($loadurl!="")
		{	
            $loadphotos="/media/";
			$delpathee = base_path('images'.$loadphotos.$currentloading);
			File::delete($delpathee);	
			$banfilenamee  = time() . '.' . $loadurl->getClientOriginalExtension();
            
            $banpathe = base_path('images'.$loadphotos.$banfilenamee);
			$destinationbanPathe=base_path('images'.$loadphotos);
      
                /*Image::make($loadurl->getRealPath())->resize(791, 547)->save($banpathe);*/
				
				 Input::file('site_loading_url')->move($destinationbanPathe, $banfilenamee);
				$savefavee=$banfilenamee;
		}
        else
		{
			$savefavee=$currentloading;
		}
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		$site_desc=$data['site_desc'];
		$site_keyword=$data['site_keyword'];
		
		
		
		
		if($data['site_desc']!="")
		{
			$desctxt=$site_desc;
		}
		else
		{
			$desctxt=$data['save_desc'];
		}
		
		
		if($data['site_keyword']!="")
		{
			$keytxt=$site_keyword;
		}
		else
		{
			$keytxt=$data['save_key'];
		}
		
		
		
		if($data['site_address']!="")
		{
			$siteaddress=$data['site_address'];
		}
		else
		{
			$siteaddress=$data['save_address'];
		}
		
		
		
		
		
		$fb = $data['site_facebook'];
		
		if($data['site_facebook']!="")
		{
			$facebook = $fb;
		}
		else
		{
			$facebook = $data['save_facebook'];
		}
		
		$twi = $data['site_twitter'];
		
		if($data['site_twitter']!="")
		{
			$twitter = $twi;
		}
		else
		{
			$twitter = $data['save_twitter'];
		}
		
		
		
		
		$gpl = $data['site_gplus'];
		
		if($data['site_gplus']!="")
		{
			$gplus = $gpl;
		}
		else
		{
			$gplus = $data['save_gplus'];
		}
		
		
		
		$pin = $data['site_pinterest'];
		
		if($data['site_pinterest']!="")
		{
			$pinterest = $pin;
		}
		else
		{
			$pinterest = $data['save_pinterest'];
		}
		
		
		
		
		$ins = $data['site_instagram'];
		
		if($data['site_instagram']!="")
		{
			$instagram = $ins;
		}
		else
		{
			$instagram = $data['save_instagram'];
		}
		
		
		$copys = $data['site_copyright'];
		
		if($data['site_copyright']!="")
		{
			$copyrights = $copys;
		}
		else
		{
			$copyrights = $data['save_copyright'];
		}
		
		
		
		
		$site_post = $data['site_post_per'];
		
		if($data['site_post_per']!="")
		{
			$sitepost = $site_post;
		}
		else
		{
			$sitepost = 0;
		}
		
		
		if($data['site_comment_per']!="")
		{
			$site_comment_per = $data['site_comment_per'];
		}
		else
		{
			$site_comment_per = 0;
		}
		
		
		if($data['site_latest_item']!="")
		{
		   $site_latest_item = $data['site_latest_item'];
		}
		else
		{
		  $site_latest_item = 0;
		}
		
		
		if($data['site_latest_item_count']!="")
		{
		   $site_latest_item_count = $data['site_latest_item_count'];
		}
		else
		{
		   $site_latest_item_count = 0;
		}
		
		
		
		
		
		
		
		
		/*$header_type = $data['header_type'];
		
		if($data['header_type']!="")
		{ 
		  $headertype = $header_type;
		}
		else
		{
		  $headertype = $data['save_header_type'];
		}*/
		
		
		
		
		$map_api = $data['site_map_api'];
		
		if($data['site_map_api']!="")
		{ 
		  $mapapi = $map_api;
		}
		else
		{
		  $mapapi = $data['save_map_api'];
		}
		
		$site_loading = $data['site_loading'];
		
		
		
		$site_email = $data['site_email'];
		$site_phone = $data['site_phone'];
		
		
		if(!empty($data['site_banner_heading']))
		{
		   $site_banner_heading = $data['site_banner_heading'];
		}
		else
		{
		$site_banner_heading = "";
		}
		
		
		if(!empty($data['site_banner_subheading']))
		{
		  $site_banner_subheading = $data['site_banner_subheading'];
		}
		else
		{
		  $site_banner_subheading = "";
		}
		
		
		
		if(!empty($data['site_primary_color']))
		{
		   $site_primary_color = $data['site_primary_color'];
		}
		else
		{
		   $site_primary_color = "";
		}
		
		
		
		if(!empty($data['site_secondary_color']))
		{
		  $site_secondary_color = $data['site_secondary_color'];
		}
		else
		{
		   $site_secondary_color = "";
		}
		
		
		
		if(!empty($data['site_button_color']))
		{
		  $site_button_color = $data['site_button_color'];
		}
		else
		{
		   $site_button_color = "";
		}
		
		
		
		if(!empty($data['site_link_color']))
		{
		  $site_link_color = $data['site_link_color'];
		}
		else
		{
		   $site_link_color = "";
		}
		
		
		
		if(!empty($data['min_price_range']))
		{
		   $min_price_range = $data['min_price_range'];
		}
		else
		{
		   $min_price_range = "";
		}
		
		
		
		if(!empty($data['max_price_range']))
		{
		   $max_price_range = $data['max_price_range'];
		}
		else
		{
		   $max_price_range = "";
		}
		
		
		
		if(!empty($data['site_footer_newsletter']))
		{
		   $site_footer_newsletter = $data['site_footer_newsletter'];
		}
		else
		{
		  $site_footer_newsletter = "";
		}
		
		
		if(!empty($data['site_blog_visible']))
		{
		  $site_blog_visible = $data['site_blog_visible'];
		}
		else
		{
		   $site_blog_visible = "";
		}
		
		
		
		if(!empty($data['site_blog_per']))
		{
		   $site_blog_per = $data['site_blog_per'];
		}
		else
		{
		  $site_blog_per = "";
		}
		
		
		
		
		if($data['site_feature_item_count']!="")
		{
		
		   $check_user_meta =  DB::table('settings_meta')
		        				->where('sett_meta_id', '=' , 1)
				                ->where('sett_meta_key', '=' , 'site_feature_item_count')
		                        ->count();
			if(!empty($check_user_meta))
			{
			   DB::update('update settings_meta set sett_meta_value="'.$data['site_feature_item_count'].'" where sett_meta_key="site_feature_item_count" and sett_meta_id = ?', [1]);
			}
			else
			{
			DB::insert('insert into settings_meta (sett_meta_id,sett_meta_key,sett_meta_value) values (?, ?, ?)', [1,"site_feature_item_count",$data['site_feature_item_count']]);
			
			}					
		
		  
		}
		
		
		
		if($data['site_back_to_top']!="")
		{
		
		   $check_user_meta =  DB::table('settings_meta')
		        				->where('sett_meta_id', '=' , 2)
				                ->where('sett_meta_key', '=' , 'site_back_to_top')
		                        ->count();
			if(!empty($check_user_meta))
			{
			   DB::update('update settings_meta set sett_meta_value="'.$data['site_back_to_top'].'" where sett_meta_key="site_back_to_top" and sett_meta_id = ?', [2]);
			}
			else
			{
			DB::insert('insert into settings_meta (sett_meta_id,sett_meta_key,sett_meta_value) values (?, ?, ?)', [2,"site_back_to_top",$data['site_back_to_top']]);
			
			}					
		
		  
		}
		
		
		if($data['site_google_analytics']!="")
		{
		
		   $check_user_meta =  DB::table('settings_meta')
		        				->where('sett_meta_id', '=' , 3)
				                ->where('sett_meta_key', '=' , 'site_google_analytics')
		                        ->count();
			if(!empty($check_user_meta))
			{
			   DB::update('update settings_meta set sett_meta_value="'.htmlentities($data['site_google_analytics']).'" where sett_meta_key="site_google_analytics" and sett_meta_id = ?', [3]);
			}
			else
			{
			DB::insert('insert into settings_meta (sett_meta_id,sett_meta_key,sett_meta_value) values (?, ?, ?)', [3,"site_google_analytics",htmlentities($data['site_google_analytics'])]);
			
			}					
		
		  
		}
		
		
		
		
		
		if($data['site_customer_feedback']!="")
		{
		
		   $check_user_meta =  DB::table('settings_meta')
		        				->where('sett_meta_id', '=' , 4)
				                ->where('sett_meta_key', '=' , 'site_customer_feedback')
		                        ->count();
			if(!empty($check_user_meta))
			{
			   DB::update('update settings_meta set sett_meta_value="'.$data['site_customer_feedback'].'" where sett_meta_key="site_customer_feedback" and sett_meta_id = ?', [4]);
			}
			else
			{
			DB::insert('insert into settings_meta (sett_meta_id,sett_meta_key,sett_meta_value) values (?, ?, ?)', [4,"site_customer_feedback",$data['site_customer_feedback']]);
			
			}					
		
		  
		}
		
		
		
		
		
		if($data['site_live_chat']!="")
		{
		
		   $check_user_meta =  DB::table('settings_meta')
		        				->where('sett_meta_id', '=' , 15)
				                ->where('sett_meta_key', '=' , 'site_live_chat')
		                        ->count();
			if(!empty($check_user_meta))
			{
			   DB::update('update settings_meta set sett_meta_value="'.htmlentities($data['site_live_chat']).'" where sett_meta_key="site_live_chat" and sett_meta_id = ?', [15]);
			}
			else
			{
			DB::insert('insert into settings_meta (sett_meta_id,sett_meta_key,sett_meta_value) values (?, ?, ?)', [15,"site_live_chat",htmlentities($data['site_live_chat'])]);
			
			}					
		
		  
		}
		
		
		
		
		
		
		
		if($data['site_seo_slug']!="")
		{
		
		   $check_user_meta =  DB::table('settings_meta')
		        				->where('sett_meta_id', '=' , 21)
				                ->where('sett_meta_key', '=' , 'site_seo_slug')
		                        ->count();
			if(!empty($check_user_meta))
			{
			   DB::update('update settings_meta set sett_meta_value="'.$data['site_seo_slug'].'" where sett_meta_key="site_seo_slug" and sett_meta_id = ?', [21]);
			}
			else
			{
			DB::insert('insert into settings_meta (sett_meta_id,sett_meta_key,sett_meta_value) values (?, ?, ?)', [21,"site_seo_slug",htmlentities($data['site_seo_slug'])]);
			
			}					
		
		  
		}
		
		
		
		
		
		
		if($data['site_translation']!="")
		{
		
		   $check_user_meta =  DB::table('settings_meta')
		        				->where('sett_meta_id', '=' , 35)
				                ->where('sett_meta_key', '=' , 'site_translation')
		                        ->count();
			if(!empty($check_user_meta))
			{
			   DB::update('update settings_meta set sett_meta_value="'.$data['site_translation'].'" where sett_meta_key="site_translation" and sett_meta_id = ?', [35]);
			}
			else
			{
			DB::insert('insert into settings_meta (sett_meta_id,sett_meta_key,sett_meta_value) values (?, ?, ?)', [35,"site_translation",htmlentities($data['site_translation'])]);
			
			}					
		
		  
		}
		
		
		
		
		if($data['site_feature_view']!="")
		{
		
		   $check_user_meta =  DB::table('settings_meta')
		        				->where('sett_meta_id', '=' , 36)
				                ->where('sett_meta_key', '=' , 'site_feature_view')
		                        ->count();
			if(!empty($check_user_meta))
			{
			   DB::update('update settings_meta set sett_meta_value="'.$data['site_feature_view'].'" where sett_meta_key="site_feature_view" and sett_meta_id = ?', [36]);
			}
			else
			{
			DB::insert('insert into settings_meta (sett_meta_id,sett_meta_key,sett_meta_value) values (?, ?, ?)', [36,"site_feature_view",htmlentities($data['site_feature_view'])]);
			
			}					
		
		  
		}
		
		
		
		
		
		if($data['site_preview_iframe']!="")
		{
		
		   $check_user_meta =  DB::table('settings_meta')
		        				->where('sett_meta_id', '=' , 37)
				                ->where('sett_meta_key', '=' , 'site_preview_iframe')
		                        ->count();
			if(!empty($check_user_meta))
			{
			   DB::update('update settings_meta set sett_meta_value="'.$data['site_preview_iframe'].'" where sett_meta_key="site_preview_iframe" and sett_meta_id = ?', [37]);
			}
			else
			{
			DB::insert('insert into settings_meta (sett_meta_id,sett_meta_key,sett_meta_value) values (?, ?, ?)', [37,"site_preview_iframe",htmlentities($data['site_preview_iframe'])]);
			
			}					
		
		  
		}
		
		
		DB::update('update settings set site_name="'.$site_name.'",site_desc="'.$desctxt.'",site_keyword="'.$keytxt.'",site_address="'.$siteaddress.'",	site_phone="'.$site_phone.'",site_email="'.$site_email.'",
		site_facebook="'.$facebook.'",site_twitter="'.$twitter.'",site_gplus="'.$gplus.'",site_pinterest="'.$pinterest.'",site_instagram="'.$instagram.'",
		site_logo="'.$savefname.'",site_favicon="'.$savefav.'",
		site_copyright="'.$copyrights.'",	site_post_per="'.$sitepost.'",
		site_map_api="'.$mapapi.'",site_loading="'.$site_loading.'",site_loading_url="'.$savefavee.'",site_currency="'.$currency.'",site_banner="'.$savefavs.'",site_banner_heading="'.$site_banner_heading.'",site_banner_subheading="'.$site_banner_subheading.'",site_primary_color="'.$site_primary_color.'",site_secondary_color="'.$site_secondary_color.'",site_button_color="'.$site_button_color.'",site_link_color="'.$site_link_color.'",min_price_range="'.$min_price_range.'",max_price_range="'.$max_price_range.'",site_latest_item="'.$site_latest_item.'",site_latest_item_count="'.$site_latest_item_count.'",site_comment_per="'.$site_comment_per.'",site_footer_newsletter="'.$site_footer_newsletter.'",site_blog_visible="'.$site_blog_visible.'",site_blog_per="'.$site_blog_per.'" where id = ?', [1]);
		
			return back()->with('success', 'Settings has been updated');
        
		
		}
		
		
    }
}
