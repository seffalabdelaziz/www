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
use Illuminate\Validation\Rule;


class EdituserController extends Controller
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
    
	
	public function showform($id) {
      $users = DB::select('select * from users where id = ?',[$id]);
	  $settings = DB::select('select * from settings where id = ?',[1]);
	  $userid = $id;
      return view('admin.edituser',['users'=>$users, 'userid' => $userid, 'settings' => $settings]);
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
	
	 public function clean($string) 
	{
    
     $string = preg_replace("/[^\p{L}\/_|+ -]/ui","",$string);

    
    $string = preg_replace("/[\/_|+ -]+/", '-', $string);

    
    $string =  trim($string,'-');

    return mb_strtolower($string);
	} 
	

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
	 
	  protected $fillable = ['name', 'email','password','phone'];
	 
    protected function edituserdata(Request $request)
    {
        /*return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);*/
		
		
		
		 $this->validate($request, [

        		'name' => 'required',

        		'email' => 'required|email'

        		
				
				

        	]);
         
		 $data = $request->all();
			
         $id=$data['id'];
        			
		$input['email'] = Input::get('email');
       
		
		$input['name'] = Input::get('name');
		
		$settings = DB::select('select * from settings where id = ?',[1]);
	   
	   $imgsize = $settings[0]->image_size;
		$imgtype = $settings[0]->image_type;
		
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
		
		
		
		'photo' => 'max:'.$imgsize.'|mimes:'.$imgtype
		
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
		  

			/*User::create([
            'name' => $data['name'],
            'email' => $data['email'],
			'admin' => '0',
            'password' => bcrypt($data['password']),
			'phone' => $data['phone']
			
        ]);*/
		$name=$data['name'];
		$email=$data['email'];
		
		
		
		
		$phone=$data['phone'];
		
		
		$currentphoto=$data['currentphoto'];
		
		
		$image = Input::file('photo');
        if($image!="")
		{	
            $userphoto="/media/";
			$delpath = base_path('images'.$userphoto.$currentphoto);
			File::delete($delpath);	
			$filename  = time() . '.' . $image->getClientOriginalExtension();
            
            $path = base_path('images'.$userphoto.$filename);
      
                Image::make($image->getRealPath())->resize(200, 200)->save($path);
				$savefname=$filename;
		}
        else
		{
			$savefname=$currentphoto;
		}			
		
		
		if(!empty($data['password']))
		{
			$password=bcrypt($data['password']);
			$passtxt=$password;
		}
		else
		{
			$passtxt=$data['savepassword'];
		}
		
		
		
		if($id!=1)
		{
			if(!empty($data['wallet']))
			{
			  $wallet = $data['wallet'];
			}
			else
			{
			  $wallet = "";
			}
		}
		else
		{
		  $admin_details = DB::select('select * from users where id = ?',[1]);
		  $wallet = $admin_details[0]->wallet;
		  
		}
		
		
		$admin=$data['usertype'];
		
		
		DB::update('update post set post_email="'.$email.'" where post_type="comment" and post_user_id = ?', [$id]);
		
		
		
		DB::update('update users set name="'.$name.'",user_slug="'.$this->clean($name).'",email="'.$email.'",password="'.$passtxt.'",phone="'.$phone.'",photo="'.$savefname.'",admin="'.$admin.'",wallet="'.$wallet.'" where id = ?', [$id]);
		
		
		
			
			
		
		
		
			return back()->with('success', 'Account has been updated');
        }
		
		
		
		
    }
}
