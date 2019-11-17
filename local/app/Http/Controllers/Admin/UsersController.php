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

class UsersController extends Controller
{
    /**
     * Show a list of all of the application's users.
     *
     * @return Response
     */
    public function index()
    {
        $users = DB::table('users')
		         ->where('delete_status','=','')
		         ->orderBy('id','desc')
				 ->get();
				 
		$settings = DB::table('settings')
		         ->where('id','=',1)
		         ->get();		 

        return view('admin.users', ['users' => $users, 'settings' => $settings]);
    }
	
	
	protected function delete_all(Request $request)
    {
		
		
	   $data = $request->all();
	   $userid = $data['userid'];
	   
	   foreach($userid as $uid)
	   {
		   
		  DB::delete('delete from post where post_type="comment" and post_user_id!=1 and post_user_id = ?',[$uid]);
		   
		   
		   DB::update('update products set delete_status="deleted" where user_id!=1 and user_id = ?',[$uid]); 
		   
		   DB::update('update users set delete_status="deleted" where id!=1 and id = ?',[$uid]);
		   
		   
	   }
	   
      return back();
		
	}
	
	
	public function destroy($id) {
		
		
	   
	   DB::delete('delete from post where post_type="comment" and post_user_id = ?',[$id]);
      
	   
	  DB::update('update products set delete_status="deleted" where user_id!=1 and user_id = ?',[$id]);  
	   
	  DB::update('update users set delete_status="deleted" where id!=1 and id = ?',[$id]); 
	   
      return back();
      
   }
	
}