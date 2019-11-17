<?php namespace Responsive\Http\Controllers\Admin;

use Responsive\Http\Controllers\Admin\AdminController;
/*use App\Article;
use App\ArticleCategory;
use App\User;
use App\Photo;
use App\PhotoAlbum;*/
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;

class DashboardController extends AdminController {

    public function __construct()
    {
        parent::__construct();
        view()->share('type', '');
    }

	public function index()
	{
        $title = "Dashboard";
		
		$total_user = DB::table('users')
		              ->where('delete_status','=','')
		              ->where('id','!=','1')
			           ->count();


        $blog_cnt = DB::table('post')
		        ->where('post_type', '=' , 'blog')
				->where('lang_code','=','en')
				->where('post_status', '=' , '1')
		        ->orderBy('post_id','desc')
				->limit(3)->offset(0)
				->count();
				
			 $top_items_count = DB::table('products')
				->where('delete_status', '=', '')
				->where('lang_code','=','en')
				->where('item_status', '=', 1)
				->orderBy('item_id', 'desc')
				->limit(3)->offset(0)
				->count();	
				
				
           $items_count = DB::table('products')
				->where('delete_status', '=', '')
				->where('item_status', '=', 1)
				->where('lang_code','=','en')
				->orderBy('item_id', 'desc')->count();	
		
         $blog = DB::table('post')
		        ->where('post_type', '=' , 'blog')
				->where('post_status', '=' , '1')
				->where('lang_code','=','en')
		        ->orderBy('post_id','desc')
				->limit(3)->offset(0)
				->get();
		
		
        $total_blog = DB::table('post')
			           ->where('post_type','=', 'blog')
					   ->where('lang_code','=','en')
					   ->count();
					   
					   
		$total_comment = DB::table('post')
			           ->where('post_type','=', 'comment')
					   ->count();

         
					  
				$set_id=1;
		$setting = DB::table('settings')->where('id', $set_id)->get();	   
		
		$users = DB::table('users')
		         ->where('id','!=','1')
		         ->orderBy('id','desc')
				 ->limit(4)->offset(0)
				 ->get();
				 
			
				 
				

       $pages = DB::table('pages')
		         ->where('lang_code','=','en')
				 ->count();	

       $newsletter = DB::table('newsletter')
		         
				 ->count();	

				 
		
		$data = array('total_user' => $total_user, 'total_blog' => $total_blog, 'setting' => $setting, 'users' => $users,
		'pages' => $pages, 'newsletter' => $newsletter, 'total_comment' => $total_comment, 'blog' => $blog, 'blog_cnt' => $blog_cnt, 'items_count' => $items_count,'top_items_count' => $top_items_count);
		
		return view('admin.index')->with($data);
		
		
		
		
	}
}