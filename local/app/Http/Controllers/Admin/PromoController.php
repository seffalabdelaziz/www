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

class PromoController extends Controller
{
    /**
     * Show a list of all of the application's users.
     *
     * @return Response
     */
    public function index()
    {
        $translate_1 = DB::table('avig_translate')
		         ->where('id','=',1)
				 ->get();
        $translate_2 = DB::table('avig_translate')
		         ->where('id','=',4)
				 ->get();
				 
		$translate_3 = DB::table('avig_translate')
		         ->where('id','=',7)
				 ->get();
		$translate_4 = DB::table('avig_translate')
		         ->where('id','=',10)
				 ->get();		 
		$translate_5 = DB::table('avig_translate')
		         ->where('id','=',13)
				 ->get();
		$translate_6 = DB::table('avig_translate')
		         ->where('id','=',16)
				 ->get();	
				 
		$translate_7 = DB::table('avig_translate')
		         ->where('id','=',19)
				 ->get();	
		$translate_8 = DB::table('avig_translate')
		         ->where('id','=',22)
				 ->get();	
				 
		$edit_setting = DB::table('settings')
		         ->where('id','=',1)
				 ->get();		 
				 
				 	 	 	 		 		 
        return view('admin.promo', ['translate_1' => $translate_1, 'translate_2' => $translate_2, 'translate_3' => $translate_3, 'translate_4' => $translate_4, 'translate_5' => $translate_5, 'translate_6' => $translate_6, 'translate_7' => $translate_7, 'translate_8' => $translate_8, 'edit_setting' => $edit_setting]);
    }
	
	
	
	
	
	
	
	
	
	
	
	protected function promodata(Request $request)
    {
       
		
		
		$data = $request->all();
		
		if(!empty($data['promo_icon_1'])){ $promo_icon_1 = $data['promo_icon_1']; } else { $promo_icon_1 = ""; }
		if(!empty($data['promo_title_1'])){ $promo_title_1 = $data['promo_title_1']; } else { $promo_title_1 = ""; }
		if(!empty($data['promo_desc_1'])){ $promo_desc_1 = $data['promo_desc_1']; } else { $promo_desc_1 = ""; }
		
		
		if(!empty($data['promo_icon_2'])){ $promo_icon_2 = $data['promo_icon_2']; } else { $promo_icon_2 = ""; }
		if(!empty($data['promo_title_2'])){ $promo_title_2 = $data['promo_title_2']; } else { $promo_title_2 = ""; }
		if(!empty($data['promo_desc_2'])){ $promo_desc_2 = $data['promo_desc_2']; } else { $promo_desc_2 = ""; }
		
		
		if(!empty($data['promo_icon_3'])){ $promo_icon_3 = $data['promo_icon_3']; } else { $promo_icon_3 = ""; }
		if(!empty($data['promo_title_3'])){ $promo_title_3 = $data['promo_title_3']; } else { $promo_title_3 = ""; }
		if(!empty($data['promo_desc_3'])){ $promo_desc_3 = $data['promo_desc_3']; } else { $promo_desc_3 = ""; }
		
		
		if(!empty($data['promo_icon_4'])){ $promo_icon_4 = $data['promo_icon_4']; } else { $promo_icon_4 = ""; }
		if(!empty($data['promo_title_4'])){ $promo_title_4 = $data['promo_title_4']; } else { $promo_title_4 = ""; }
		if(!empty($data['promo_desc_4'])){ $promo_desc_4 = $data['promo_desc_4']; } else { $promo_desc_4 = ""; }
		
		
		
		DB::update('update settings set promo_icon_1="'.$promo_icon_1.'",promo_icon_2="'.$promo_icon_2.'",promo_icon_3="'.$promo_icon_3.'",promo_icon_4="'.$promo_icon_4.'",promo_title_1="'.$promo_title_1.'",promo_title_2="'.$promo_title_2.'",promo_title_3="'.$promo_title_3.'",promo_title_4="'.$promo_title_4.'",promo_desc_1="'.$promo_desc_1.'",promo_desc_2="'.$promo_desc_2.'",promo_desc_3="'.$promo_desc_3.'",promo_desc_4="'.$promo_desc_4.'" where id = ?', [1]);
		
		
		
		
			return back()->with('success', 'Promo content has been updated');
        
		
		
		
		
         
		 
		 
		 
	}
	
	
	
   
   
   
	
}