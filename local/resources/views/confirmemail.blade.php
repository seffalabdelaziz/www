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
?>
<!DOCTYPE html>
<html lang="en">
<head>

    

   @include('style')
   <title><?php echo translate( 25, $lang);?> - <?php echo translate( 385, $lang);?></title>
	




</head>
<body class="index">

    

    <!-- fixed navigation bar -->
    @include('header')

	
    
    <div class="promo-area" style="background-image: url(<?php echo $url;?>/local/images/media/<?php echo $setts[0]->site_banner;?>)">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="promo-text">
                        <h2 class="avigher-title bolder fontsize30"><?php echo translate( 385, $lang);?></h2>
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
                        
                        <li class="breadcrumb-item active"><?php echo translate( 385, $lang);?></li>
                        
                    </ol>
                </div>
            </div>
        </div>
    </div> 
    
    

    
     
     
     <main class="checkout-area main-content">
<div class="clearfix height20"></div>
        <div class="container">





    <div class="row">
	
	
	
	
	
	
	
	
	
	
	<div class="">
    <div class="">
     
        <div class="col-md-12 text-center">
        <h3>
            <?php echo translate( 388, $lang);?> <a href="<?php echo $url;?>/login" style="color:#0000FF;"><?php echo translate( 391, $lang);?></a> <?php echo translate( 394, $lang);?>
    </h3>
        </div>
         
    </div>
</div>
	
	</div>
</div>
<div class="clearfix"></div>
</main>
	
	
	

      @include('footer')
</body>
</html>