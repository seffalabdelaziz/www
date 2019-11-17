<?php

namespace Responsive\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use URL;
use Mail;
use Cookie;

class BlogController extends Controller
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
  
	 
	 
    public function avigher_index()
    {
       
		


		
		$default = DB::table('avig_language')
	              ->where('lang_default','=',1)
		           ->get();


$default_cnt = DB::table('avig_language')
	              ->where('lang_default','=',1)
		           ->count();
if(!empty(Cookie::get('lang'))){ $lang = Cookie::get('lang'); } else { if(!empty($default_cnt)){ $lang = $default[0]->lang_code; } else { $lang = "en"; } }
		
		
		
        
		$blogs = DB::table('post')
		         ->where('post_status', '=', '1')
				 ->where('post_type', '=', 'blog')
				 ->where('lang_code','=',$lang)
				 ->orderBy('post_id', 'desc')->get();
		
		$blog_count = DB::table('post')
		         	  ->where('post_status', '=', '1')
					  ->where('lang_code','=',$lang)
				 	  ->where('post_type', '=', 'blog')
					  ->count();
		
		$popular_blog = DB::table('post')
		         ->where('post_status', '=', '1')
				 ->where('post_type', '=', 'blog')
				 ->where('lang_code','=',$lang)
				 ->orderBy('post_id', 'desc')
				 ->take(5)
				 ->get();
      
		
		$data = array('blogs' => $blogs, 'blog_count' => $blog_count, 'popular_blog' => $popular_blog);
            return view('blog')->with($data);
    }
	
	
	
	
	public function avigher_blog_comment(Request $request)
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
		$email = $data['email'];
		
		$msg = $data['msg'];
		$post_comment_type = $data['post_comment_type'];
		
		
		$post_parent = $data['post_parent'];
		
		$post_type = $data['post_type'];
		
		$post_user_id = $data['post_user_id'];
		
		
		$comment_date = date("Y-m-d H:i:s");
		
		$status = 0;
		
		
		/*$count = DB::table('post')
		         ->where('post_title', '=', $name)
				 ->where('post_comment_type', '=', $post_comment_type)
				 ->where('post_type', '=', $post_type)
				 ->where('post_status', '=', $status)
				 ->count();
		if($count==0)
		{*/
		
		
		/* slug */
		$str_one = strtolower($name);
		$str_two = preg_replace("/[^a-z0-9_\s-]/", "", $str_one);
		$str_three = preg_replace("/[\s-]+/", " ", $str_two);
		$post_slug = preg_replace("/[\s_]/", "-", $str_three);
		/* end slug */
		
		
		DB::insert('insert into post (	post_title,post_slug,post_desc,post_comment_type,post_type,post_parent,post_email,post_user_id,post_date,post_status) values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)', [$name,$post_slug,$msg,$post_comment_type,$post_type,$post_parent,$email,$post_user_id,$comment_date,$status]);
		/*}*/
		
		
		
		
		$getevents = DB::table('post')
						   ->where('post_id', '=', $post_parent)
						   ->where('post_type', '=', 'blog')
						   ->where('post_status', '=', '1')
						   ->get();
		
		$blog_title = $getevents[0]->post_title;
		$blog_slug = $getevents[0]->post_slug;
			
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
            'site_logo' => $site_logo, 'site_name' => $site_name, 'name' => $name,  'email' => $email, 'msg' => $msg, 'blog_title' => $blog_title, 'blog_slug' => $blog_slug, 'url' => $url
        ];
		
		Mail::send('commentemail', $datas , function ($message) use ($admin_email,$email,$sett_sender_name,$sett_sender_email,$lang)
        {
            $message->subject($this->call_translate( 1072, $lang));
			
            $message->from($sett_sender_email, $sett_sender_name);

            $message->to($sett_sender_email);

        }); 
		
		
		
		
		
		
		
		return redirect()->back()->with('success', $this->call_translate( 961, $lang));
		
		
		
	
	}
	
	
	
	
	
	
	
	public function avigher_singlepost($id)
    {
	
	$default = DB::table('avig_language')
	              ->where('lang_default','=',1)
		           ->get();


$default_cnt = DB::table('avig_language')
	              ->where('lang_default','=',1)
		           ->count();
if(!empty(Cookie::get('lang'))){ $lang = Cookie::get('lang'); } else { if(!empty($default_cnt)){ $lang = $default[0]->lang_code; } else { $lang = "en"; } }
	
	
	$post = DB::table('post')
		         ->where('post_status', '=', '1')
				 ->where('post_type', '=', 'blog')
				 ->where('lang_code','=',$lang)
				  ->where('post_slug', '=', $id)
				  ->get();
				  
				  
	$post_count = DB::table('post')
		         ->where('post_status', '=', '1')
				 ->where('post_type', '=', 'blog')
				 ->where('lang_code','=',$lang)
				  ->where('post_slug', '=', $id)
				  ->count();
				  
	$previous =  DB::table('post')
		         ->where('post_status', '=', '1')
				 ->where('post_type', '=', 'blog')
				 ->where('post_title', '<', $post[0]->post_title)
	             ->max('post_title');
				 
				 
	$previous_link = DB::table('post')
		         ->where('post_status', '=', '1')
				 ->where('post_type', '=', 'blog')
				  ->where('post_title', '=', $previous)
				  ->get();
				  			 
				 
	$next =  DB::table('post')
		         ->where('post_status', '=', '1')
				 ->where('post_type', '=', 'blog')
				 ->where('post_title', '>', $post[0]->post_title)
	             ->min('post_title');	
				 
				 
	$next_link = DB::table('post')
		         ->where('post_status', '=', '1')
				 ->where('post_type', '=', 'blog')
				  ->where('post_title', '=', $next)
				  ->get();			 
				 		 

    $popular_blog = DB::table('post')
		         ->where('post_status', '=', '1')
				 ->where('post_type', '=', 'blog')
				 ->where('lang_code','=',$lang)
				 ->orderBy('post_date', 'desc')
				 ->take(5)
				 ->get();
   		  
				  		  
				  
	$data = array('post' => $post, 'post_count' => $post_count, 'previous' => $previous, 'previous_link' => $previous_link, 'next_link' => $next_link, 'next' => $next, 'popular_blog' => $popular_blog);
	 return view('blog')->with($data);
	
	
	}
	
	
	
	
	
	
}
