<?php
use Illuminate\Support\Facades\Route;
$currentPaths= Route::getFacadeRoot()->current()->uri();	
$url = URL::to("/");
$setid=1;
		$setts = DB::table('settings')
		->where('id', '=', $setid)
		->get();
$default = DB::table('avig_language')
	              ->where('lang_default','=',1)
		           ->get();


$default_cnt = DB::table('avig_language')
	              ->where('lang_default','=',1)
		           ->count();
if(!empty(Cookie::get('lang'))){ $lang = Cookie::get('lang'); } else { if(!empty($default_cnt)){ $lang = $default[0]->lang_code; } else { $lang = "en"; } }	


if (isset($_SERVER['HTTPS']) &&
    ($_SERVER['HTTPS'] == 'on' || $_SERVER['HTTPS'] == 1) ||
    isset($_SERVER['HTTP_X_FORWARDED_PROTO']) &&
    $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https') {
  $protocol = 'https://';
}
else {
  $protocol = 'http://';
}		
?>
<!DOCTYPE html>
<html lang="en">
<head>

    

   @include('style')
	<title><?php echo translate( 25, $lang);?> - <?php echo translate( 466, $lang);?></title>




</head>
<body>

    

   
    @include('header')

    
     
    <div class="promo-area" style="background-image: url(<?php echo $url;?>/local/images/media/<?php echo $setts[0]->site_banner;?>)">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="promo-text">
                        <h2 class="avigher-title bolder fontsize30"><?php echo translate( 466, $lang);?></h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
    
    
    <div class="about-breadcrumb">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo $url;?>"><?php echo translate( 40, $lang);?></a>
                        </li>
                        <li class="breadcrumb-item active"><?php echo translate( 466, $lang);?></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
   
    <main class="checkout-area main-content">
        <div class="container">
        <div class="clearfix height20"></div>
        <div class="row">
                     <div class="col-md-12 col-sm-12">
                    @if(Session::has('success'))

	    <p class="alert alert-success">

	      {{ Session::get('success') }}

	    </p>

	@endif


	
	
 	@if(Session::has('error'))

	    <p class="alert alert-danger">

	      {{ Session::get('error') }}

	    </p>

	@endif
    
   
    
    </div>
	
	
	
	<div>
        @if (count($errors) > 0)
         
        <div class="alert alert-danger">
         
        <ul>
         
        @foreach ($errors->all() as $error)
         
        <li>{{ $error }}</li>
         
        @endforeach
         
        </ul>
         
        </div>
         
        @endif
        </div>
	
    </div>
        
         
         
         <form  role="form" method="POST" action="{{ route('edit-item') }}" id="formID" enctype="multipart/form-data">
         {{ csrf_field() }}
         
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="billing-details">
                    
                    
                    
                    <ul class="nav nav-tabs" role="tablist">
                                        
                                        <?php foreach($language as $languages){?>
                        <li role="presentation" class="<?php if($languages->lang_default==1){?>active<?php } ?>"><a href="#tab_content<?php echo $languages->id;?>" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true"><img src="<?php echo $url; ?>/local/images/media/<?php echo $languages->lang_flag;?>" style="max-width:24px; max-height:24px;"> <?php echo $languages->lang_name;?></a>
                        </li>
                       <?php } ?> 
                                    </ul>
                                    
                                    
                                    <div class="tab-content">
                                    <?php foreach($language as $languagee){
					  if($languagee->lang_code=="en")
					  {
					      
						  $count_en = DB::table('products')
										->where('parent', '=', 0)
										->where('item_id', '=', $edit[0]->item_id)
										
										->count();
						  if(!empty($count_en))
						  {
						  $view = DB::table('products')
										->where('parent', '=', 0)
										->where('item_id', '=', $edit[0]->item_id)
										
										->get();
						  $viewname = $view[0]->item_title;
						  $viewdesc = $view[0]->item_desc;
						  
						  }	
						  else
						  {
						     $viewname = "";
							 $viewdesc = "";
							 
							 
						  }			
								
										
					  }
					  else
					  {
					      $count_other = DB::table('products')
										->where('parent', '=', $edit[0]->item_id)
										->where('lang_code', '=', $languagee->lang_code)
										
										->count();
					      if(!empty($count_other))
						  {
					      $view = DB::table('products')
										->where('parent', '=', $edit[0]->item_id)
										->where('lang_code', '=', $languagee->lang_code)
										
										->get();
						   $viewname = $view[0]->item_title;
						  $viewdesc = $view[0]->item_desc;
						  				
						  }
						  else
						  {
						     $viewname = "";
							 $viewdesc = "";
							  
						  }	
								
					  }
					  
					  ?>
                        <div role="tabpanel" class="tab-pane fade <?php if($languagee->lang_default==1){?>active<?php } ?> in" id="tab_content<?php echo $languagee->id;?>" aria-labelledby="home-tab">
                        
                       <div class="height20"></div>
                        
                         <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
		   <label><?php echo translate( 88, $lang);?> <span class="required">*</span></label>
		    <input type="text" id="item_title" placeholder="" value="<?php echo $viewname;?>" name="item_title[]" class="validate[required]">
            
		  </div>
		
	</div>
    </div>
    
    
    <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
		    <label><?php echo translate( 91, $lang);?> <span class="required">*</span></label>
		    
            <textarea id="id_cazary_full" placeholder="" class="validate[required] form-control" name="item_desc[]" style="width:100% !important; height:300px;"><?php echo html_entity_decode($viewdesc); ?></textarea>
            
            
		  </div>
		
	</div>
    
                        
                                    
                                        </div>
                                        
                                         <input type="hidden" name="code[]" value="<?php echo $languagee->lang_code;?>">
                                        </div>
										<?php } ?>
                                        
                                        
                                        
                                   
</div>
                       
                       
                            
                     <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                    <label><?php echo translate( 946, $lang);?> <span class="required">*</span></label>
                                        <input type="text" id="item_slug" placeholder="" name="item_slug" value="<?php echo $edit[0]->item_slug;?>" class="validate[required]">
                                    </div>
                                </div>
                                
                                
                                
                            </div>       
                            
                            
                            
                            
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                    <label><?php echo translate( 94, $lang);?> <span class="required">*</span></label>
                                        
                                       <select name="item_type" id="item_type" class="validate[required]">
                                        <option value=""><?php echo translate( 97, $lang);?></option>
                                        <option value="yes" <?php if($free_status=="yes"){?> selected <?php } ?>><?php echo translate( 100, $lang);?></option>
                                        <option value="no" <?php if($free_status=="no"){?> selected <?php } ?>><?php echo translate( 103, $lang);?></option>
                                        </select> 
                                    </div>
                                </div>
                                
                            </div>
                            
                            
                            
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                    <label><?php echo translate( 106, $lang);?> <span class="required">*</span></label>
                                        <input type="text" id="regular_price_six_month" placeholder="" name="regular_price_six_month" value="<?php if(!empty($viewcount)){ echo $edit[0]->regular_price_six_month; } ?>" class="validate[required,custom[integer],min[1]]">
                                    </div>
                                </div>
                                
                                <div class="col-sm-6">
                                    <div class="form-group">
                                    <label><?php echo translate( 109, $lang);?></label>
                                        <input type="text" id="regular_price_one_year" placeholder="" name="regular_price_one_year" value="<?php if(!empty($viewcount)){ if(!empty($edit[0]->regular_price_one_year)){ echo $edit[0]->regular_price_one_year; } } ?>" class="validate[custom[integer],min[1]]">
                                    </div>
                                </div>
                                
                            </div>
                            
                            
                            
                            
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                    <label><?php echo translate( 112, $lang);?></label>
                                        <input type="text" id="extended_price_six_month" placeholder="" name="extended_price_six_month" value="<?php if(!empty($viewcount)){ if(!empty($edit[0]->extended_price_six_month)){ echo $edit[0]->extended_price_six_month; } } ?>" class="validate[custom[integer],min[1]]">
                                    </div>
                                </div>
                                
                                <div class="col-sm-6">
                                    <div class="form-group">
                                    <label><?php echo translate( 115, $lang);?></label>
                                        <input type="text" id="extended_price_one_year" placeholder="" name="extended_price_one_year" value="<?php if(!empty($viewcount)){ if(!empty($edit[0]->extended_price_one_year)){ echo $edit[0]->extended_price_one_year;  } } ?>" class="validate[custom[integer],min[1]]">
                                    </div>
                                </div>
                                
                            </div>
                            
                            
                            
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                    <label><?php echo translate( 118, $lang);?> <span class="required">*</span></label>
                                        <select name="high_resolution" class="validate[required]">
                                        <option value="">Select</option>
                                        <option value="Yes" <?php if(!empty($viewcount)){ if($edit[0]->high_resolution=="Yes"){?> selected <?php } } ?>>Yes</option>
                                        <option value="No" <?php if(!empty($viewcount)){ if($edit[0]->high_resolution=="No"){?> selected <?php } } ?>>No</option>
                                        </select>
                                    </div>
                                </div>
                                
                            </div>
                            
                            
                            
                            
                            
                             <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                    <label><?php echo translate( 121, $lang);?> <span class="required">*</span></label>
                            <select multiple="multiple" name="compatible_browser[]" id="compatible_browser" class="validate[required]">
                            <?php foreach($browser as $browse){?>
                            
                             <?php 
				  if(!empty($viewcount)){
				  $sel=explode(",",$edit[0]->compatible_browser);
				  }
				   ?>
                            
                            <option value="<?php echo $browse;?>" <?php if(!empty($viewcount)){ if(in_array($browse,$sel)){?> selected <?php } } ?>><?php echo $browse;?></option>
                            <?php } ?>
                            </select>
                            
                           </div>
                                </div>
                                
                            </div>
                            
                            
                          <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                    <label><?php echo translate( 157, $lang);?> <span class="required">*</span></label>
                                        <input type="text" id="file_included" placeholder="" name="file_included" class="validate[required]" value="<?php if(!empty($viewcount)){ echo $edit[0]->file_included; } ?>">
                                        <span class="fontsize12"><?php echo translate( 160, $lang);?></span>
                                    </div>
                                </div>
                                
                            </div>  
                            
                            
                            
                            
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                    <?php if($protocol == "http://"){ $linker = "https://"; } else { $linker = "http://"; } ?>
                                    
                                    <label><?php echo translate( 163, $lang);?></label>
                                    
                                        <input type="text" id="demo_url" placeholder="" name="demo_url" value="<?php if(!empty($viewcount)){ echo $edit[0]->demo_url; } ?>" class="validate[required,custom[url]] text-input">
                                        
                                        <span style="color:#FF0033; font-size:12px;">( <?php echo translate( 1090, $lang);?> :  <?php echo $protocol;?>www.yourwebsite.com ) 
                                        <b style="color:#009900;"><?php echo translate( 1128, $lang);?> - <?php echo $linker;?></b>
                                        </span>
                                        
                                    </div>
                                </div>
                                
                            </div>  
                            
                            
                            
                              <input type="hidden" name="item_token" value="<?php if(!empty($viewcount)){ echo $edit[0]->item_token; } ?>">
                            <input type="hidden" name="item_id" value="<?php if(!empty($viewcount)){ echo $edit[0]->item_id; } ?>">
                            
                             <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                    <label><?php echo translate( 166, $lang);?> <span class="required">*</span></label>
                                        
                                       <select name="support_item" class="validate[required]">
                                        <option value=""><?php echo translate( 97, $lang);?></option>
                                        <option value="Yes" <?php if(!empty($viewcount)){ if($edit[0]->support_item=="Yes"){?> selected <?php } } ?>><?php echo translate( 100, $lang);?></option>
                                        <option value="No" <?php if(!empty($viewcount)){ if($edit[0]->support_item=="No"){?> selected <?php } } ?>><?php echo translate( 103, $lang);?></option>
                                        </select> 
                                    </div>
                                </div>
                                
                            </div>
                            
                             
                            
                            
                            
                       

                    </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="billing-details">
                        
                        
                       
                        
                        
                        
                        <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                    <label><?php echo translate( 169, $lang);?> <span class="required">*</span></label>
                                        
                                       <select name="future_update" class="validate[required]">
                                        <option value=""><?php echo translate( 97, $lang);?></option>
                                        <option value="Yes" <?php if(!empty($viewcount)){ if($edit[0]->future_update=="Yes"){?> selected <?php } } ?>><?php echo translate( 100, $lang);?></option>
                                        <option value="No" <?php if(!empty($viewcount)){ if($edit[0]->future_update=="No"){?> selected <?php } } ?>><?php echo translate( 103, $lang);?></option>
                                        </select> 
                                    </div>
                                </div>
                                
                            </div>
                       
                            
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                    <label><?php echo translate( 172, $lang);?></label>
                                        <input type="number" id="unlimited_download" placeholder="" name="unlimited_download" value="<?php if(!empty($viewcount)){ echo $edit[0]->unlimited_download; } ?>">
                                        <span class="fontsize12"><?php echo translate( 175, $lang);?></span>
                                    </div>
                                </div>
                                
                            </div>
                            
                            
                            
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                    <label><?php echo translate( 178, $lang);?> <span class="required">*</span></label>
                            <select multiple="multiple" name="item_category[]" id="item_category" class="validate[required]">
                            <?php 
							if(!empty($category_count))
							{
							$category = DB::table('category')
										->where('delete_status','=','')
										->where('cat_type','=','default')
										->where('lang_code','=',$lang)
										->where('status','=',1)
										->orderBy('cat_name', 'asc')->get();
							foreach($category as $view){
							if($lang == "en")
						  {
						    $cat_id = $view->id; 
						  }
						  else
						  {
						     $cat_id = $view->parent;
						  }
							?>
                            <?php 
				  if(!empty($viewcount)){
				  $sel=explode(",",$edit[0]->category);
				  }
				   ?>
                            
                            <option value="<?php echo $cat_id;?>_cat" class="bold" <?php if(!empty($viewcount)){ if(in_array($cat_id.'_cat',$sel)){?> selected <?php } } ?>><?php echo $view->cat_name;?></option>
                            <?php 
						  $subcount = DB::table('subcategory')
							->where('delete_status','=','')
							->where('status','=',1)
							->where('cat_id','=',$cat_id)
							->where('lang_code','=',$lang)
							->where('subcat_type','=','default')
							->orderBy('subcat_name', 'asc')->count();
							if(!empty($subcount)){
							$subcategory = DB::table('subcategory')
							->where('delete_status','=','')
							->where('status','=',1)
							->where('lang_code','=',$lang)
							->where('cat_id','=',$cat_id)
							->where('subcat_type','=','default')
							->orderBy('subcat_name', 'asc')->get();
							foreach($subcategory as $subview){
							if($lang == "en")
						  {
						    $subcat_id = $subview->subid; 
						  }
						  else
						  {
						     $subcat_id = $subview->parent;
						  }	
					      ?>
                          
                           <?php 
				  if(!empty($viewcount)){
				  $ssel=explode(",",$edit[0]->category);
				  }
				   ?>
                            <option value="<?php echo $subcat_id;?>_subcat" <?php if(!empty($viewcount)){ if(in_array($subcat_id.'_subcat',$ssel)){?> selected <?php } } ?>> - <?php echo $subview->subcat_name;?></option>
                            
                            
                            <?php } } } } ?>
                            </select>
                           </div>
                                </div>
                                
                            </div>
                            
                            
                            
                            
                            
                            
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                    <label><?php echo translate( 181, $lang);?></label>
                            <select multiple="multiple" name="item_framework[]" id="item_framework" class="">
                            <?php 
							if(!empty($framework_count))
							{
							$category = DB::table('category')
										->where('delete_status','=','')
										->where('lang_code','=',$lang)
										->where('status','=',1)
										->where('cat_type','=','framework')
										->orderBy('cat_name', 'asc')->get();
							foreach($category as $view){
							if($lang == "en")
						  {
						    $cat_id = $view->id; 
						  }
						  else
						  {
						     $cat_id = $view->parent;
						  }
							?>
                            <?php 
				  if(!empty($viewcount)){
				  $sel=explode(",",$edit[0]->framework_category);
				  }
				   ?>
                            
                            <option value="<?php echo $cat_id;?>_cat" class="bold" <?php if(!empty($viewcount)){ if(in_array($cat_id.'_cat',$sel)){?> selected <?php } } ?>><?php echo $view->cat_name;?></option>
                            <?php 
						  $subcount = DB::table('subcategory')
							->where('delete_status','=','')
							->where('status','=',1)
							->where('lang_code','=',$lang)
							->where('cat_id','=',$cat_id)
							->where('subcat_type','=','framework')
							->orderBy('subcat_name', 'asc')->count();
							if(!empty($subcount)){
							$subcategory = DB::table('subcategory')
							->where('delete_status','=','')
							->where('status','=',1)
							->where('lang_code','=',$lang)
							->where('cat_id','=',$cat_id)
							->where('subcat_type','=','framework')
							->orderBy('subcat_name', 'asc')->get();
							foreach($subcategory as $subview){
							
							if($lang == "en")
						  {
						    $subcat_id = $subview->subid; 
						  }
						  else
						  {
						     $subcat_id = $subview->parent;
						  }	
					      ?>
                          
                           <?php 
				  if(!empty($viewcount)){
				  $ssel=explode(",",$edit[0]->framework_category);
				  }
				   ?>
                            <option value="<?php echo $subcat_id;?>_subcat" <?php if(!empty($viewcount)){ if(in_array($subcat_id.'_subcat',$ssel)){?> selected <?php } } ?>> - <?php echo $subview->subcat_name;?></option>
                            
                            
                            <?php } } } } ?>
                            </select>
                           </div>
                                </div>
                                
                            </div>
                            
                            
                            
                            
                            
                            
                            
                           <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                    <label><?php echo translate( 184, $lang);?> <span class="required">*</span></label>
                                        <input type="file" id="item_thumbnail" placeholder="" name="item_thumbnail" class="<?php if(!empty($viewcount)){ if(empty($edit[0]->item_thumbnail)){?>validate[required]<?php } } ?>">
                                        (200 X 200px)<br/>
                                        <?php if(!empty($viewcount)){ if(!empty($edit[0]->item_thumbnail)){?>
                                        <img src="<?php echo $url;?>/local/images/media/<?php echo $edit[0]->item_thumbnail;?>" alt="" style="max-width:100px;">
                                       
                                        <?php } } ?>
                                        @if ($errors->has('item_thumbnail'))
                                    <span class="help-block" style="color:red;">
                                        <strong>{{ $errors->first('item_thumbnail') }}</strong>
                                    </span>
                                @endif
                                    </div>
                                </div>
                                
                            </div> 
                            <input type="hidden" name="current_thumb" value="<?php if(!empty($viewcount)){ if(!empty($edit[0]->item_thumbnail)){?><?php echo $edit[0]->item_thumbnail;?><?php } } ?>">
                            
                            
                            
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                    <label>	<?php echo translate( 187, $lang);?> <span class="required">*</span></label>
                                        <input type="file" id="preview_image" placeholder="" name="preview_image" class="<?php if(!empty($viewcount)){ if(empty($edit[0]->preview_image)){?>validate[required]<?php } } ?>">
                                        (600 X 450px)<br/>
                                        <?php if(!empty($viewcount)){ if(!empty($edit[0]->preview_image)){?>
                                        <img src="<?php echo $url;?>/local/images/media/<?php echo $edit[0]->preview_image;?>" alt="" style="max-width:100px;">
                                       
                                        <?php } } ?>
                                        
                                        @if ($errors->has('preview_image'))
                                    <span class="help-block" style="color:red;">
                                        <strong>{{ $errors->first('preview_image') }}</strong>
                                    </span>
                                @endif
                                    </div>
                                </div>
                                
                            </div>
                            
                            <input type="hidden" name="current_preview" value="<?php if(!empty($viewcount)){ if(!empty($edit[0]->preview_image)){?><?php echo $edit[0]->preview_image;?><?php } } ?>">
                            
                            
                            
                            
                            
                            <?php
						  $viewimg_counter = DB::table('product_images')
		                              ->where('item_token', '=' , $edit[0]->item_token)
				                      ->count();
									  
						  ?>
                            
                            <div class="row">
                            <div class="col-sm-12">
		
			<div class="form-group">
		    <label class="info-title" for="exampleInputTitle"><?php echo translate( 190, $lang);?></label>
		    <input type="file" placeholder="" name="image[]" class="" accept="image/*" multiple>
						  @if ($errors->has('image'))
                                    <span class="help-block" style="color:red;">
                                        <strong>{{ $errors->first('image') }}</strong>
                                    </span>
                                @endif
                                <div class="clearfix"></div>
                      <?php if(!empty($viewcount)){?>
                      
                      <?php
					  $viewimg_count = DB::table('product_images')
		                              ->where('item_token', '=' , $edit[0]->item_token)
				                      ->count();
	
	                   
	
					  if(!empty($viewimg_count)){
					  $viewimg_get = DB::table('product_images')
		                              ->where('item_token', '=' , $edit[0]->item_token)
				                      ->get();
					  foreach($viewimg_get as $gallery){?>
                      
                      <div class="col-md-3" style="margin-bottom:15px;">
                      <?php if(!empty($gallery->image)){?>
                      <img src="<?php echo $url;?>/local/images/media/<?php echo $gallery->image;?>" width="80" height="80" border="0" alt="">
                      <a href="<?php echo $url;?>/edit-item/delete/<?php echo $gallery->item_img_id;?>/<?php echo base64_encode($gallery->image);?>" onClick="return confirm('Are you sure you want to delete');"><img src="<?php echo $url;?>/local/images/delete.png" width="24" border="0" alt=""></a>
                      </div>
                      
                      <?php } } } } ?>
                      <div class="clearfix"></div>
                      
            
		  </div>
		
	</div>
                            
        </div>                    
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                    <label><?php echo translate( 193, $lang);?> <span class="required">*</span></label>
                                        <input type="file" id="main_file" placeholder="" name="main_file" class="<?php if(!empty($viewcount)){ if(empty($edit[0]->main_file)){?>validate[required]<?php } } ?>">
                                        <span class="fontsize12">( ZIP - format only )</span>
                                        <?php if(!empty($viewcount)){ if(!empty($edit[0]->main_file)){?>
                                        <a href="<?php echo $url;?>/local/images/media/<?php echo $edit[0]->main_file;?>" download> <?php echo $edit[0]->main_file;?>
                                        </a>
                                        <?php } } ?>
                                        @if ($errors->has('main_file'))
                                    <span class="help-block" style="color:red;">
                                        <strong>{{ $errors->first('main_file') }}</strong>
                                    </span>
                                @endif
                                    </div>
                                </div>
                                
                            </div>
                            
                            
                            
                            
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                    <label><?php echo translate( 199, $lang);?></label>
                                        <input type="file" id="video_file" placeholder="" name="video_file" class="">
                                        <span class="fontsize12"><?php echo translate( 202, $lang);?></span>
                                        <?php if(!empty($video_status)){?>
                                    <a href="<?php echo $url;?>/local/images/media/<?php echo $video_status;?>" download> <?php echo $video_status;?>
                                        </a>    
                                        <input type="hidden" name="current_video" value="<?php echo $video_status;?>">
                                        <?php } ?>
                                        @if ($errors->has('video_file'))
                                    <span class="help-block" style="color:red;">
                                        <strong>{{ $errors->first('video_file') }}</strong>
                                    </span>
                                @endif
                                    </div>
                                </div>
                                
                            </div>
                            
                            
                            
                            
                            
                            <input type="hidden" name="current_file" value="<?php if(!empty($viewcount)){ if(!empty($edit[0]->main_file)){?><?php echo $edit[0]->main_file;?><?php } } ?>">
                            
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                    <label><?php echo translate( 205, $lang);?></label>
                                        <textarea id="item_tags" placeholder="" rows="5" name="item_tags"><?php if(!empty($viewcount)){ echo $edit[0]->item_tags; } ?></textarea>
                                        <span class="fontsize12"><?php echo translate( 208, $lang);?></span>
                                    </div>
                                </div>
                                
                            </div>
                            
                            
                            
                       

                    </div>
                </div>
                
                
                
                
         
                
            </div>
            
            <div class="row">
                                <div class="col-md-12">
                                <a href="<?php echo $url;?>/my-items" class="resetbtn"><?php echo translate( 211, $lang);?></a>
                                    <button class="custom-btn"><?php echo translate( 463, $lang);?></button>
                                    
                                </div>
                            </div>
          </form>


        </div>
    </main>

	
    
      @include('footer')
</body>
</html>