<?php

namespace Responsive\Http\Controllers\Admin;


use Responsive\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

use Responsive\Http\Requests;
use Illuminate\Http\Request;
use Responsive\User;
use File;
use Image;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class AdduserController extends Controller
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
    public function formview()

    {

        return view('admin.adduser');

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
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
	 
	  protected $fillable = ['name', 'email','password','phone'];
	  
	  
	  
	  public function clean($string) 
	{
    
     $string = preg_replace("/[^\p{L}\/_|+ -]/ui","",$string);

    
    $string = preg_replace("/[\/_|+ -]+/", '-', $string);

    
    $string =  trim($string,'-');

    return mb_strtolower($string);
	} 
	
	
	 
    protected function adduserdata(Request $request)
    {
        /*return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);*/
		
		
		
		 $this->validate($request, [

        		'name' => 'required',

        		'email' => 'required|email',

        		'password' => 'required'
				
				

        	]);
         
		 
				
		$input['email'] = Input::get('email');
		
		$input['name'] = Input::get('name');
       $settings = DB::select('select * from settings where id = ?',[1]);
	   
	   $imgsize = $settings[0]->image_size;
	   $imgtype = $settings[0]->image_type;
		
		/* $rules = array('email' => 'unique:users,email');*/
		
		 $data = $request->all();
		$rules = array(
        
       
		
       
		
		'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('users')->where(function($query) {
                  $query->where('delete_status', '=', '');
               })
               ],
			   
			   
		'name' => [
                'required',
                'regex:/^[\w-]*$/',
                'max:255',
                Rule::unique('users')->where(function($query) {
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
		
		
		$image = Input::file('photo');
		if($image!="")
		 {
		 
            $filename  = time() . '.' . $image->getClientOriginalExtension();
            $userphoto="/media/";
            $path = base_path('images'.$userphoto.$filename);
 
        
                Image::make($image->getRealPath())->resize(200, 200)->save($path);
               /* $user->image = $filename;
                $user->save();*/
			$namef=$filename;	
			}
		 else
		 {
			 $namef="";
		 }	
		

		
		 

			/*User::create([
            'name' => $data['name'],
            'email' => $data['email'],
			'admin' => '0',
            'password' => bcrypt($data['password']),
			'phone' => $data['phone']
			
        ]);*/
		$name=$data['name'];
		$email=$data['email'];
		$password=bcrypt($data['password']);
		$phone=$data['phone'];
		$confirmation = 1;
		$admin=$data['usertype'];
		$confirm_key =  uniqid();
		$gender='';
		
		
		
		DB::insert('insert into users (name,user_slug,email,password,phone,photo,admin,gender,confirmation,confirm_key) values (?, ?,?, ?,?,?,?, ?,?,?)', [$name,$this->clean($name),$email,$password,$phone,$namef,$admin,$gender,$confirmation,$confirm_key]);
		
		
			return back()->with('success', 'Account has been created');
        }
		
		
		
		
    }
}
