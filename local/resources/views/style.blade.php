<?php
/*
Theme Name: DigitKart
Theme URI: http://avigher.com
Author: Avigher Technologies
Author URI: http://avigher.com
Description: DigitKart
Version: 6.0
*/
?>
 <?php 
 use Illuminate\Support\Facades\Route;
$currentPaths= Route::getFacadeRoot()->current()->uri();
 $url = URL::to("/"); 
 $setid=1;
		$setts = DB::table('settings')
		->where('id', '=', $setid)
		->get();

		
		
		$name = Route::currentRouteName();
 if($currentPaths=="/")
 {
	 $pagetitle="Home";
	 $activemenu = "/";
 }
 else 
 {
	 $pagetitle=$currentPaths;
	 $activemenu = $currentPaths;
 }
 

 ?>

       
<?php 

$sett_meta_google = DB::table('settings_meta')
		        ->where('sett_meta_id', '=' , 3)
				->where('sett_meta_key', '=' , "site_google_analytics")
		        
				->count();
				
			if(!empty($sett_meta_google))
			{	
		   $sett_meta =  DB::table('settings_meta')
		        ->where('sett_meta_id', '=' , 3)
				->where('sett_meta_key', '=' , "site_google_analytics")
		        
				->get();
			$sett_google = $sett_meta[0]->sett_meta_value;
			}
			else
			{
			$sett_google = "";
			}
			function translate($id,$lang) 
{					
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
			?>
	 <meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no">
  
	 <!-- css stylesheets -->
	 <?php if(!empty($setts[0]->site_favicon)){?>
	 <link rel="icon" type="image/x-icon" href="<?php echo $url.'/local/images/media/'.$setts[0]->site_favicon;?>" />
	 <?php } else { ?>
	 <link rel="icon" type="image/x-icon" href="<?php echo $url.'/local/images/noimage.jpg';?>" />
	 <?php } ?>
	
     <meta name="description" content="<?php echo $setts[0]->site_desc;?>">
  <meta name="keywords" content="<?php echo $setts[0]->site_keyword;?>">
  <meta name="author" content="<?php echo $setts[0]->site_name;?>">
     
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo $url;?>/local/resources/views/theme/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo $url;?>/local/resources/views/theme/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo $url;?>/local/resources/views/theme/css/main_menu.css">
    
    <link rel="stylesheet" href="<?php echo $url;?>/local/resources/views/theme/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo $url;?>/local/resources/views/theme/css/responsive.css">
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

      <?php if(!empty($sett_google)){ echo html_entity_decode($sett_google); } ?> 
    
    
  <script src="<?php echo $url;?>/local/resources/views/theme/js/jquery.min.js"></script>       
        
    
<link rel="stylesheet" href="<?php echo $url;?>/local/resources/views/theme/css/validationEngine.jquery.css" type="text/css"/>
<?php /*********** Loader *******/?>

    


 <script type="text/javascript">
$(window).load(function() {
    $(".loader").fadeOut("slow");
});





$(document).ready(function() {
        
   /* activate the carousel */
   $("#modal-carousel").carousel({interval:false});

   /* change modal title when slide changes */
   $("#modal-carousel").on("slid.bs.carousel",       
   function () {
        $(".modal-title")
        .html($(this)
        .find(".active img")
        .attr("title"));
   });

   /* when clicking a thumbnail */
   $(".row .thumbnail").click(function(){
    var content = $(".carousel-inner");
    var title = $(".modal-title");
  
    content.empty();  
    title.empty();
  
  	var id = this.id;  
     var repo = $("#img-repo .item");
     var repoCopy = repo.filter("#" + id).clone();
     var active = repoCopy.first();
  
    active.addClass("active");
    title.html(active.find("img").attr("title"));
  	content.append(repoCopy);

    // show the modal
  	$("#modal-gallery").modal("show");
  });

});
</script>

<script src='https://www.google.com/recaptcha/api.js'></script>

<?php /********* End Loader********/ ?>



<?php /* search */ ?>

<script src="<?php echo $url;?>/local/resources/views/theme/sort/jplist.core.min.js"></script>
		
		
		<script src="<?php echo $url;?>/local/resources/views/theme/sort/jplist.sort-bundle.min.js"></script>
        
        <script src="<?php echo $url;?>/local/resources/views/theme/sort/jplist.textbox-filter.min.js"></script>
	
       <script src="<?php echo $url;?>/local/resources/views/theme/sort/jplist.filter-toggle-bundle.min.js"></script>
    
		
		<script>
		$('document').ready(function(){
		
			$('#demo').jplist({				
				itemsBox: '.list' 
				,itemPath: '.list-item' 
				,panelPath: '.jplist-panel'	
				//,debug: true
			});
			
			$('#demo').jplist({				
				itemsBox: '.list1' 
				,itemPath: '.list-item1' 
				,panelPath: '.jplist-panel'	
				//,debug: true
			});
			
			
			$('#demo').jplist({				
				itemsBox: '.list2' 
				,itemPath: '.list-item2' 
				,panelPath: '.jplist-panel'	
				//,debug: true
			});
			
			
			
			$('#demo').jplist({				
				itemsBox: '.list3' 
				,itemPath: '.list-item3' 
				,panelPath: '.jplist-panel'	
				//,debug: true
			});
			
			
		});
		
		
		
		
		
		
		
		
	</script>
    
<?php /* tooltip */?>

<?php /* social share */?>

<script src="<?php echo $url;?>/local/resources/views/theme/js/jquery.social.min.js"></script>

<?php /* social share */?>

<?php /* product item social share */?>
<script src="<?php echo $url;?>/local/resources/views/theme/share/jquery.simpleSocialShare.min.js"></script>

<?php /* product item social share */?>


 <style type="text/css">
<?php  if($lang == "ar"){
?>


body
{
direction:rtl;
text-align:right !important;

}
.owl-carousel,
.bx-wrapper { direction: ltr !important; }
.owl-carousel .owl-item {  }

.cart-details
{
right:0px;
}
.main-menu ul li ul.sub-menu,.dropdown-menu
{
text-align:right !important;
}
.product-name
{
text-align:left;
}
.homenew
{
text-align:right !important;
}

.product-tab li:first-child::after
{
display:none;
}


@media (min-width: 1200px) and (max-width: 1920px) {

.pos_move
{
margin-left:100px;
position:relative;
}

.col-md-1, .col-md-2, .col-md-3, .col-md-4, .col-md-5, .col-md-6, .col-md-7, .col-md-8, .col-md-9, .col-md-10, .col-md-11, .col-md-12
{
float:right;
}

.col-sm-1, .col-sm-2, .col-sm-3, .col-sm-4, .col-sm-5, .col-sm-6, .col-sm-7, .col-sm-8, .col-sm-9, .col-sm-10, .col-sm-11, .col-sm-12
{
float:right;
}

.ntip .col-md-4,.ntip .col-md-8
{
float:left;
}
.carousel-inner .col-sm-3
{
float:right;
}





}
@media (max-width: 768px) { 

.list-item.box
{
float:right;
}
.latest_item_grid
{
margin-right:0px !important;
}
.latest_item_grid img
{
max-width:90px;
height: 90px;
    object-fit: cover;
}
.col-md-2.ntip_trigger_new
{
    float: right;
    margin-bottom: 10px;
	padding-left: 5px;
    padding-right: 5px;
}
.col-md-2.ntip_trigger_new img
{
width:70px;
height: 70px;
    object-fit: cover;
}
.mbers img
{
width:105px !important;
height:105px !important;
object-fit: cover;
min-width:105px !important;
}
.single-promo
{
min-height:180px;
}

}


#quote-carousel .carousel-indicators
{
display:none;
}


.mean-container a.meanmenu-reveal
{
    left: 0 !important;
    right: auto !important;
}

.read-more-date
{
text-align:left;
}
.subscribe-form > button
{
left:0px;
}
#gotop
{
left:2em !important;
}
.nav-tabs>li
{
float:right;
}


<?php } else { ?>

@media (max-width: 768px) { 
.single-promo
{
min-height:180px;
}
#quote-carousel .carousel-indicators
{
display:none;
}
.list-item.box
{
float:left;
}
.latest_item_grid
{
margin-right:0px !important;
}
.latest_item_grid img
{
max-width:90px;
height: 90px;
    object-fit: cover;
}
.col-md-2.ntip_trigger_new
{
    float: left;
    margin-bottom: 10px;
	padding-left: 5px;
    padding-right: 5px;
}
.col-md-2.ntip_trigger_new img
{
width:70px;
height: 70px;
    object-fit: cover;
}
.mbers img
{
width:105px !important;
height:105px !important;
object-fit: cover;
min-width:105px !important;
}

}

body
{
direction:ltr;
text-align:left !important;

}
.owl-carousel,
.bx-wrapper { direction: ltr !important; }
.owl-carousel .owl-item { direction: ltr !important; }

<?php } ?>


<?php if($activemenu != "/"){?>

.carousel-control.left,.carousel-control.right{
  background-image:none;
  
  width:5%;
  
  position: absolute;
  
  top: 50%;
  font-size:30px;
 
  
}

<?php } ?>


.ntip {
	color: #fff;
	background:#333333;
	display:none; /*--Hides by default--*/
	width:500px;
	height:350px;
	position:absolute;	z-index:1000;
	-webkit-border-radius: 3px;
	-moz-border-radius: 3px;
	border-radius: 3px;
}
.ntip img
{
width:470px;
    
    height: 240px;
    object-fit: cover;
	margin-top:10px;
}

.ntip .titleitem
{
text-align:left;
color:#FFFFFF;
font-size:19px;
font-weight:bold;
margin-top:20px;
white-space: nowrap;
overflow:hidden;
    text-overflow: ellipsis;
}
.ntip .currrency
{
text-align:right;
color:#FFFFFF;
font-size:30px;
font-weight:bold;
margin-top:50px;

}

.ntip .authorr 
{
color:#686868;
font-size:11px;
text-align:left !important;
}

.ntip .authorr_right 
{
color:#686868;
font-size:11px;
text-align:right !important;
}







</style>


<script type="text/javascript">

$(document).ready(function() {
	//Tooltips
	$(".ntip_trigger").hover(function(){
		tip = $(this).find('.ntip');
		tip.show(); //Show tooltip
	}, function() {
		tip.hide(); //Hide tooltip		  
	}).mousemove(function(e) {
		var mousex = e.pageX + 10; //Get X coodrinates
		var mousey = e.pageY + 10; //Get Y coordinates
		var tipWidth = tip.width(); //Find width of tooltip
		var tipHeight = tip.height(); //Find height of tooltip
		
		//Distance of element from the right edge of viewport
		var tipVisX = $(window).width() - (mousex + tipWidth);
		//Distance of element from the bottom of viewport
		var tipVisY = $(window).height() - (mousey + tipHeight);
		  
		if ( tipVisX < 10 ) { //If tooltip exceeds the X coordinate of viewport
			mousex = e.pageX - tipWidth - 10;
		} if ( tipVisY < 10 ) { //If tooltip exceeds the Y coordinate of viewport
			mousey = e.pageY - tipHeight - 10;
		} 
		tip.css({  top: mousey + 'px', left: mousex + 'px' });
	});
	
	
	
	
	
	
	
});




</script>

<?php /* tooltip */?>
   
   
    
<script type="text/javascript">
$(function() {
$("#btnclick").click(function() {
var searchv = document.getElementById("searchtext").value; 
if(searchv!="")
{
var url = '<?php echo $url;?>/search/search/'+searchv;
$(location).attr('href', url);
}
else
{
$(location).attr('href', '<?php echo $url;?>/search');
}


})
});



function valueChanged()
{


    if($('.enable_ship').is(":checked"))   
        $(".ship_details").show();
    else
        $(".ship_details").hide();
}
</script>
    

      
 <link rel="stylesheet" href="<?php echo $url;?>/local/resources/views/theme/css/jquery-ui.css" />
    <script src="<?php echo $url;?>/local/resources/views/theme/js/jquery-ui.js"></script>
<?php /******* search ******/?>    

<?php /********** pagination *******/?>

 
    <script type="text/javascript" src="<?php echo $url;?>/local/resources/views/theme/pagination/cPager.js"></script>
    

<?php /******* pagination **********/?>


<?php /* text editor */ ?>


<link rel="stylesheet" type="text/css" href="<?php echo $url;?>/local/resources/views/editor/style.css" />
		
		<script type="text/javascript" src="<?php echo $url;?>/local/resources/views/editor/cazary.min.js"></script>
		<script type="text/javascript">
(function($, window)
{
	$(function($)
	{
		
		$("textarea#id_cazary_full").cazary({
			commands: "FULL"
		});
	});
})(jQuery, window);
		</script>
      
  
<?php /* text editor */?>




<style type="text/css">


@font-face {
  font-family: 'm_bold';
  src: url('<?php echo $url;?>/local/resources/views/theme/fonts/Montserrat-Bold.eot?#iefix') format('embedded-opentype'),  url('<?php echo $url;?>/local/resources/views/theme/fonts/Montserrat-Bold.woff') format('woff'), url('<?php echo $url;?>/local/resources/views/theme/fonts/Montserrat-Bold.ttf')  format('truetype'), url('<?php echo $url;?>/local/resources/views/theme/fonts/Montserrat-Bold.svg#Montserrat-Bold') format('svg');
  font-weight: normal;
  font-style: normal;
}




@font-face {
  font-family: 'm_regular';
  src: url('<?php echo $url;?>/local/resources/views/theme/fonts/Montserrat-Regular.eot?#iefix') format('embedded-opentype'),  url('<?php echo $url;?>/local/resources/views/theme/fonts/Montserrat-Regular.woff') format('woff'), url('<?php echo $url;?>/local/resources/views/theme/fonts/Montserrat-Regular.ttf')  format('truetype'), url('<?php echo $url;?>/local/resources/views/theme/fonts/Montserrat-Regular.svg#Montserrat-Regular') format('svg');
  font-weight: normal;
  font-style: normal;
}




@font-face {
  font-family: 'm_light';
  src: url('<?php echo $url;?>/local/resources/views/theme/fonts/Montserrat-Light.eot?#iefix') format('embedded-opentype'),  url('<?php echo $url;?>/local/resources/views/theme/fonts/Montserrat-Light.woff') format('woff'), url('<?php echo $url;?>/local/resources/views/theme/fonts/Montserrat-Light.ttf')  format('truetype'), url('<?php echo $url;?>/local/resources/views/theme/fonts/Montserrat-Light.svg#Montserrat-Light') format('svg');
  font-weight: normal;
  font-style: normal;
}



.searchhome input[type="text"]
{
    height: 50px;
    border-radius: 3px 0px 0px 3px;
    color: #666666;
    font-size: 16px;
    padding: 0 50px 0 20px;
	width:100%;
}
.searchhome input[type="button"]
{
background-color: <?php echo $setts[0]->site_secondary_color;?>;
    background: -webkit-linear-gradient(<?php echo $setts[0]->site_primary_color;?>,<?php echo $setts[0]->site_secondary_color;?>);
    background: linear-gradient(<?php echo $setts[0]->site_primary_color;?>,<?php echo $setts[0]->site_secondary_color;?>);
    font-weight:600;
    color: #fff;
    border: 1px solid <?php echo $setts[0]->site_secondary_color;?>;
    padding: 12px 35px;
    margin: 0;
    display: inline-block;
    border-radius: 0px 3px 3px 0px;;
    text-shadow: 0 -1px 1px rgba(0,0,0,.2);
    box-sizing: border-box;
    -webkit-transition: color .2s,background-color .2s,box-shadow .2s,border .2s;
    transition: color .2s,background-color .2s,box-shadow .2s,border .2s;
}



body {
    font-size: 16px;
    line-height: 24px;
    
    color: #666666;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
    text-rendering: optimizeLegibility;
	overflow-x:hidden;
}
h1,
h2,
h3,
h4,
h5,
h6 {
    margin: 0 0 15px;
    font-weight: 700;
    color: #000000;
    line-height: 24px;
}
html,
body {
    height: 100%;
}
img {
    max-width: 100%;
    height: auto;
    -o-object-fit: cover;
    object-fit: cover;
}
a:focus {
    outline: 0 solid;
	
}
a:focus,
a:hover {
    color: <?php echo $setts[0]->site_button_color;?>;
}
a,
a:hover,
a:focus {
    text-decoration: none;
    outline: none;
    -webkit-transition: all 0.4s ease 0s;
    transition: all 0.4s ease 0s;
}
input,
textarea,select {
    
    color: #4a4a4a;
    padding: 10px;
    border: 1px solid #ebebeb;
	width:100%;
}
input {
    
    
}


.jplist-panel input[type="checkbox"]
{
width:auto !important;
}


.overflow-wrap
{

overflow-wrap: break-word;
}

input:focus,
textarea:focus {
    outline: 0 none;
}
label {
    font-weight: normal;
}
::-moz-placeholder {
    Firefox 19 + color: #666666;
    opacity: 1;
}

.weight400
{
font-weight:400 !important;
text-transform:lowercase;
}


.home_banner h2
{
font-family: 'm_bold';
color:#FFFFFF;

font-size:50px;
line-height:50px;
}

.avigher-intro {
font-family: 'm_regular';
    color:#FFFFFF;
   
    line-height: 30px;
    padding: 0 60px;
    margin-bottom: 43px;
    font-size: 25px;
}



.no-padding {
    padding: 0;
}
.section-padding {
    padding: 80px 0;
}
.section-intro {
    margin: 0 auto;
    max-width: 575px;
    text-align: center;
}
.section-title {
    font-size: 30px;
    margin-bottom: 20px;
    text-transform: uppercase;
	line-height:40px;
}
.section-intro p {
    line-height: 24px;
    margin-bottom: 55px;
}

.product-button {
    text-align: center;
    margin-top: 30px;
}


.featurebtn
{
background:#1A76D3;
border-radius: 4px;
    color: #fff;
    display: inline-block;
    font-weight: 500;
    font-size: 14px;
    border: 0 none;
    padding: 7px 15px 7px 15px;
    text-transform:capitalize;
    -webkit-transform: translate(0, 0);
    transform: translate(0, 0);
    -webkit-transition: all .3s ease;
    transition: all .3s ease;
}

.featurebtn:hover,.featurebtn:focus
{
color:#fff;
}


.resetbtn
{
background:#1A76D3;
border-radius: 4px;
    color: #fff;
    display: inline-block;
    font-weight: 500;
    font-size: 14px;
    border: 0 none;
    padding: 7px 15px 7px 15px;
    text-transform:capitalize;
    -webkit-transform: translate(0, 0);
    transform: translate(0, 0);
    -webkit-transition: all .3s ease;
    transition: all .3s ease;
	max-width:80px;

}
.resetbtn:hover,.resetbtn:focus
{
color:#fff;
}

.link
{
color:<?php echo $setts[0]->site_link_color;?> !important;
}
.link:hover,.link:focus
{
text-decoration:none;
color:<?php echo $setts[0]->site_link_color;?> !important;
}




.custom-btn_review {
    background: <?php echo $setts[0]->site_button_color;?> none repeat scroll 0 0;
    border-radius: 4px;
    color: #fff;
    display: inline-block;
    font-weight: 500;
    font-size: 14px;
    border: 0 none;
    padding: 7px 15px 7px 15px;
    text-transform:capitalize;
    -webkit-transform: translate(0, 0);
    transform: translate(0, 0);
    -webkit-transition: all .3s ease;
    transition: all .3s ease;
    
}

.custom-btn_review:hover,custom-btn_review:focus {
    color: #fff !important;
	outline:none !important;
}
.custom-btn_review:active {
    outline:none !important;
    color: #fff;
}





.custom-btn {
    background: <?php echo $setts[0]->site_button_color;?> none repeat scroll 0 0;
    border-radius: 4px;
    color: #fff !important;
    display: inline-block;
    font-weight: 500;
    font-size: 14px;
    border: 0 none;
    padding: 7px 15px 7px 15px;
    text-transform:capitalize;
    -webkit-transform: translate(0, 0);
    transform: translate(0, 0);
    -webkit-transition: all .3s ease;
    transition: all .3s ease;
    
}

.custom-btn:hover,custom-btn:focus {
    color: #fff !important;
	outline:none !important;
}
.custom-btn:active {
    outline:none !important;
    color: #fff !important;
}
.custom-btn.violet {
    background: <?php echo $setts[0]->site_button_color;?> none repeat scroll 0 0;
    -webkit-box-shadow: 0px 4px 0px #460fa9;
    box-shadow: 0px 4px 0px #460fa9;
    color: #fff;
}
.custom-btn.violet:active {
    -webkit-box-shadow: 0px 0px 0px #460fa9;
    box-shadow: 0px 0px 0px #460fa9;
}
.product-meta > ul,
.service-list ul,
.p-demo-social ul,
.prodect-information ul,
.post-social ul,
.article-s-list ul,
.article-pagination ul,
.check-order ul,
.top-menu > ul,
.board-item,
.n-product-list ul,
.product-tab,
.view-tab ul {
    padding: 0;
    margin: 0;
    list-style: none;
}
/* HEADER TOP */

.header-top {
	background-image: linear-gradient(120deg, #8a56e9 0%, #f44336 100%);
    background-position: center;
    background-size: cover;
    padding: 6px 0;
}
.n-sticker {
    position: relative;
}
.n-sticker ul {
    padding: 0;
    margin: 0;
    list-style: none;
}
.n-sticker::before {
    position: absolute;
    left: 0px;
    top: 0px;
    content: "\f09e";
    font-size: 14px;
    font-family: fontawesome;
    color: #fff;
}
#sticker-item li {
    color: #fff;
    margin-left: 10px;
    white-space: nowrap;
    text-overflow: ellipsis;
}


.product-info .product-name a
{
white-space: nowrap; 
    overflow: hidden;
    text-overflow: ellipsis;
}


.ticker {
    background-color: transparent;
    border: 0 none;
    width: 95%;
    padding: 1px 0px 0px 0px;
    font-size: 14px;
    font-weight: 500;
}
.h-phone > p {
    color: #fff;
    font-size: 14px;
    font-weight: 500;
    margin: 0;
    text-align: right;
}
/* Header Bootom */

.board-item {
    text-align: right;
}
.board-item > li {
    display: inline-block;
    padding: 22px 0;
    text-align: right;
    margin-left: 20px;
    font-size: 14px;
}
.board-item > li:first-child > a {
    color: #ffffff;
	

}
.price-cart i,.dropdown i
{
font-size:16px !important;
}
.board-item > li:first-child a span {
    display: inline-block;
    padding: 1px 5px;
    border-radius: 50%;
    background: <?php echo $setts[0]->site_button_color;?>;
    line-height: 17px;
    margin-left: 5px;
	font-size:11px !important;
	top:-2px !important;
	position:relative;
}
.board-item > li:nth-child(2n) a {
    color: #f44336;
    font-weight: 500;
    text-transform: uppercase;
}
.board-item li:nth-child(2n) a i {
    margin-right: 5px;
}
.user-menu li a:hover {
    color: <?php echo $setts[0]->site_button_color;?>;
}
.board-item .btn-filled {
    border: 0 none;
    background: <?php echo $setts[0]->site_button_color;?>;
    padding: 7px 12px;
    color: #fff;
    text-transform: uppercase;
    font-weight: 700;
    border-radius: 0px;
}
.board-item .btn-filled i {
    margin-right: 5px;
}
.user-menu ul {
    text-align: right;
}
.user-menu li {
    padding: 30px 8px;
}
.search-menu {
    position: absolute;
    right: 0;
    top: 7px;
    width: 195px;
}
.search-menu input {
    height: 30px;
    background: #707070;
    border-radius: 0px;
    color: #fff;
    border: 0 none;
    font-size: 13px;
}
.search-menu input::-webkit-input-placeholder {
    color: #fff;
}
.search-menu input:-ms-input-placeholder {
    color: #fff;
}
.search-menu input::placeholder {
    color: #fff;
}
.search-menu button {
    position: absolute;
    right: 5px;
    top: 2px;
    background: none;
    border: 0 none;
    color: #fff;
}
/* =============================
4.2 CART LOG-IN CSS 
================================*/

.cart-login > ul {
    list-style: outside none none;
    margin: 0;
    padding: 0;
}
.cart-login li {
    display: inline-block;
}
.cart-login > li {
    padding: 40px 2px;
}
.cart-login > ul > li > a {
    color: #353535;
    display: block;
    font-size: 14px;
    line-height: 20px;
    padding: 40px 20px;
    text-transform: uppercase;
}
.cart-login li a > span {
    margin-right: 2px;
    color: #f44336;
}
.cart-login li.price-cart > a {
    padding-left: 10px;
}
.board-item {
    position: relative;
}
.cart-details {
    background: #fff none repeat scroll 0 0;
    display: none;
    left: 0px;
    list-style: outside none none;
    margin: 0;
    padding: 0;
    position: absolute;
    width: 300px;
    z-index: 12;
	top:80%;
	border-radius:0px 0px 5px 5px;
	
}
.cart-details > li {
   
    padding: 10px;
    display: block;
}
.cart-img > img {
    height: 65px;
    width: 100px;
}
.cart-img,
.cart-info,
.cart-del {
    float: left;
}
.cart-info a {
    font-size: 14px;
    color: #353535;
}
.cart-info {
    margin: 0 10px;
    text-align: left;
    width: 47%;
}
.cart-info h4 {
    font-size: 14px;
    margin: 0;
    text-transform: capitalize;
    font-weight: 500;
}
.cart-info > span {
    font-size: 14px;
}
.cart-del a {
    color: <?php echo $setts[0]->site_button_color;?>;
}
.cart-details h5 {
    float: left;
    font-size: 18px;
    text-transform: capitalize;
    margin: 0;
}
.cart-details p {
    font-weight: 700;
    padding-right: 20px;
    text-align: right;
    font-size: 20px;
    margin: 0;
}
.cart-login .custom-btn {
    margin: 0 5px;
    padding: 8px 15px;
    background: <?php echo $setts[0]->site_button_color;?>;
    color: #fff;
    -webkit-box-shadow: none;
    box-shadow: none;
}
.cart-login .custom-btn {
    background: #F44336;
}
.userboard .modal-dialog {
    width: 500px;
}
.userboard .modal-dialog {
    text-align: left;
}
.userboard .modal-dialog {
    text-align: left;
}
.userboard .modal-header {
    background: #f5f5f5 none repeat scroll 0 0;
    text-align: center;
    border-radius: 3px;
    padding: 20px 30px;
}
.userboard .modal-content {
    border-radius: 3px;
    top: 85px;
}
.userboard .modal-body {
    padding: 10px 50px 20px;
}
.userboard .modal-body > h2 {
    margin: 20px 0 30px;
    text-align: center;
    text-transform: capitalize;
}
.userboard .modal-body .btn-filled {
    height: 50px;
    margin-top: 30px;
    width: 100%;
}
/*===========================================
4. MAIN MENU AREA
=============================================*/

.header-area {
    background: #fff;
}
.main-menu-area {
    position: relative;
    width: 100%;
    background-color: <?php echo $setts[0]->site_secondary_color;?>;
}

.user-board-area
{
background:<?php echo $setts[0]->site_primary_color;?>;
padding:10px;
}


.logo {
    height: 38px;
    padding: 18px 0;
    width: 184px;
}
.main-menu ul,
.user-menu ul {
    list-style: outside none none;
    margin: 0;
    padding: 0;
    float: none;
}
.main-menu li,
.user-menu li {
    float: none;
    position: relative;
    display: inline-block;
}
.main-menu li > a,
.user-menu li a {
    color: #ffffff !important;
    display: block;
    font-size: 13px;
    line-height: 20px;
    font-weight: 500;
    text-transform:capitalize;
}
.main-menu li > a {
    
    padding: 12px 10px;
}
.main-menu nav > ul > li:last-child a {
    
   
}
.main-menu ul li ul.sub-menu li:last-child {
    border-bottom: none;
}
/*===========================================
4.1 SUB MENU AREA
=============================================*/

.main-menu ul li ul.sub-menu {
    background: #fff none repeat scroll 0 0;
    opacity: 0;
    position: absolute;
    text-align: left;
    top: 100px;
    -webkit-transition: all 0.4s ease 0s;
    transition: all 0.4s ease 0s;
    visibility: hidden;
    width: 200px;
    z-index: 9999;
    pointer-events: none;
	border-radius:0px 0px 5px 5px;
	
	-webkit-box-shadow: 0 3px 10px rgba(0,0,0,0.3);
    box-shadow: 0 3px 10px rgba(0,0,0,0.3);
}
.main-menu ul li ul.sub-menu li {
    float: none;
    display: block;
   
    padding-bottom: 0;
    
	font-size:13px;
	
}
.main-menu ul li ul.sub-menu li  a{
color:<?php echo $setts[0]->site_primary_color;?> !important;
}


.dropdown > a
{
color:#fff !important;
text-transform:capitalize !important;
}
.dropdown .dropdown-menu li a
{
padding: 8px 15px !important;
text-transform:capitalize;
color:<?php echo $setts[0]->site_primary_color;?>;
}



.menu-2 .main-menu ul li ul.sub-menu li,
.menu-2 .main-menu .mega-menu li a {
    border-bottom: 1px solid #ebebeb;
}
.main-menu ul li ul.sub-menu li:last-child {
    border-bottom: none;
}
.main-menu ul li ul.sub-menu li:hover {
    background:#E6E6E6;
	color:<?php echo $setts[0]->site_primary_color;?>;
}

.main-menu ul li ul.sub-menu li:last-child:hover
{
border-radius:0px 0px 5px 5px;
}
.main-menu ul ul li > a {
    font-weight: 400;
    padding: 8px 15px;
}
.main-menu li:hover > .sub-menu {
    opacity: 1;
    -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=100)";
    top: 100%;
    visibility: visible;
    pointer-events: auto;
}
.main-menu ul li ul.sub-menu > li:hover > a {
    padding-left: 28px;
    color: #fff;
}
.menu-2 ul li ul.mega-menu > li > a:hover {
    color: #fff;
}
.main-menu li > li:hover > a {
    color: #fff;
}
/* For Caret css */

.main-menu ul > li > a:after {
    margin-left: 5px;
    content: '\f107';
    font-family: "FontAwesome";
}
.main-menu .sub-menu a:after {
    position: absolute;
    right: 10px;
    content: "\f105";
    font-family: "FontAwesome";
}
.main-menu li > a:only-child:after {
    margin-left: 0;
    content: '';
}
.main-menu ul li:last-child a:after {
    /*content: "";
    margin: auto;*/
}
/* GRAND CHILD MENU */

.main-menu ul li .sub-menu .sub-menu {
    display: block;
    position: absolute;
    left: 200px;
    top: 0;
    width: 100%;
    opacity: 0;
    -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";
}
.main-menu ul li ul.sub-menu li:hover .sub-menu {
    opacity: 1;
    -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=100)";
}
/* MEGA MENU */

.main-menu .mega-menu {
    background: #272829 none repeat scroll 0 0;
    left: 0;
    padding: 10px 20px;
    position: absolute;
    top: 100px;
    width: 650px;
    z-index: 99;
    opacity: 0;
    -webkit-transform-origin: 0 0 0;
    transform-origin: 0 0 0;
    pointer-events: none;
    -webkit-backface-visibility: hidden;
    backface-visibility: hidden;
    -webkit-transition: .4s;
    transition: .4s;
}
.menu-2 .main-menu .mega-menu {
    background: #fff;
    text-align: left;
}
.main-menu ul > li:hover .mega-menu {
    top: 100%;
    opacity: 1;
    visibility: visible;
    pointer-events: auto;
}
.main-menu .mega-menu li {
    width: 23%;
    margin-right: 10px;
    float: left;
}
.main-menu .mega-menu li:last-child {
    margin: 0;
}
.main-menu .mega-menu li a {
    display: block;
    padding: 10px 0;
    border-bottom: 1px solid rgba(37, 32, 32, 0.5);
    text-transform: capitalize;
}
.main-menu .mega-menu > li:hover > a:hover {
    padding-left: 0;
}
.main-menu .mega-menu > li:hover > a:hover {
    padding-left: 10px;
    background: <?php echo $setts[0]->site_button_color;?>;
}
.main-menu .mega-menu li > a:after {
    content: "";
}
.main-menu .mega-menu li a:last-child {
	border: none;
}
/* ================================
4.3 MOBILE MENU
===================================*/

.mobile-menu-area {
    display: none;
    padding: 0 60px;
}
.mean-container {
    overflow-x: hidden;
}
.mean-container .mean-bar {
    background: <?php echo $setts[0]->site_primary_color;?>;
}
.mean-container .mean-nav {
    position: relative;
    top: 10px;
    border-bottom: 1px solid #eee;
    background: #272829
}
.m-logo {
    left: 30px;
    padding: 0;
    position: absolute;
    top: 10px;
    z-index: 9999999;
}
.mobile-menu .m-logo img {
    height: 40px;
}
.mean-container .mean-bar {
    padding: 10px 0;
}
.mean-container a.meanmenu-reveal span,
.mean-container .mean-nav ul li a:hover {
    background: <?php echo $setts[0]->site_button_color;?>;
}
.mean-container .mean-nav ul li a:hover .mean-nav ul li a.mean-expand {
    color: #fff;
}
.mean-container .mean-nav ul li a.mean-expand:hover {
    background: transparent none repeat scroll 0 0;
    color: #353535;
}
.mean-container .mean-nav ul li a:hover {
    color: <?php echo $setts[0]->site_button_color;?>;
}
.mean-container .mean-nav ul li a,
.mean-container .mean-nav ul li li a {
    border-top: 1px solid rgba(37, 32, 32, 0.5);
    opacity: 1;
    -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=100)";
}
.mean-container a.meanmenu-reveal {
    color: <?php echo $setts[0]->site_button_color;?>;
    top: 10px;
}
.mean-container .mean-nav ul li a,
.mean-container .mean-nav ul li li a {
    color: #fff;
    font-size: 14px;
    line-height: 20px;
    font-weight: 500;
}
.mean-container .mean-nav ul li a:hover {
    color: #fff;
}
.mean-container .mean-nav ul li a.mean-expand {
    border-color: transparent!important;
    line-height: 32px;
    padding: 9px !important;
    background: transparent;
}
/* ===============================================
5. avigher AREA
==================================================*/

.avigher-area {
    background-size: cover;
}
.avigher-wrap {
    margin: 0 auto;
    
    padding: 50px 0;
    text-align: center;
}
.avigher-title {
    color: #fff !important;
    font-size: 35px;
	line-height:40px;
}
.bolder
{
font-family: 'm_bold';
}
.fontsize10
{
font-size:10px !important;
}
.fontsize11
{
font-size:11px !important;
}
.fontsize12
{
font-size:12px !important;
}
.fontsize13
{
font-size:13px !important;
}
.fontsize14
{
font-size:14px !important;
}
.fontsize15
{
font-size:15px !important;
}
.fontsize16
{
font-size:16px !important;
}
.fontsize17
{
font-size:17px !important;
}
.fontsize17
{
font-size:17px !important;
}
.fontsize18
{
font-size:18px !important;
}

.fontsize19
{
font-size:19px !important;
}

.fontsize20
{
font-size:20px !important;
}

.fontsize21
{
font-size:21px !important;
}

.fontsize22
{
font-size:22px !important;
}
.fontsize23
{
font-size:23px !important;
}
.fontsize24
{
font-size:24px !important;
}

.fontsize25
{
font-size:25px !important;
}

.fontsize30
{
font-size:30px !important;
}

.fontsize35
{
font-size:35px !important;
}


.fontsize40
{
font-size:40px !important;
}

.fontsize45
{
font-size:45px !important;
}


.fontsize50
{
font-size:50px !important;
}

.fontsize55
{
font-size:55px !important;
}
.fontsize60
{
font-size:60px !important;
}

.fontsize65
{
font-size:65px !important;
}


.fontsize70
{
font-size:70px !important;
}


.fontsize75
{
font-size:75px !important;
}


.item-search {
    max-width: 750px;
    margin: 0 auto;
    position: relative;
}
.item-search::after {
    position: absolute;
    right: 25px;
    content: "\f002";
    top: 18px;
    font-family: fontawesome;
    font-size: 22px;
}
.item-search input {
    height: 60px;
    border-radius: 7px;
    color: #666666;
    font-size: 16px;
    padding: 0 50px 0 20px;
}
/* =======================================
6. FEATURE PRODUCT AREA
==========================================*/

.feature-product-area.section-padding {
    padding: 80px 0 50px;
}
.item-demo,
.single-new {
    background: #fff none repeat scroll 0 0;
    box-shadow: 0 0 15px 0 rgba(0, 0, 0, 0.15);
    -webkit-box-shadow: 0 0 15px 0 rgba(0, 0, 0, 0.15);
    -moz-box-shadow: 0 0 15px 0 rgba(0, 0, 0, 0.15);
    margin: 0px 0 30px;
    -webkit-transition: .4s;
    transition: .4s;
}
.single-new {
    -webkit-transition: auto;
    transition: auto;
}
.item-demo:hover,
.single-new:hover {
    box-shadow: 0 0 12px 0 rgba(0, 0, 0, 0.2);
    -webkit-box-shadow: 0 0 12px 0 rgba(0, 0, 0, 0.2);
    -moz-box-shadow: 0 0 12px 0 rgba(0, 0, 0, 0.2);
}
.item-demo figure,
.single-new figure {
    position: relative;
}
.item-demo figure > img {
    width: 100%;
    height: 220px;
}
.item-demo .product-caption,
.single-new .product-caption {
    -webkit-backface-visibility: hidden;
    backface-visibility: hidden;
    background-color: rgba(255, 255, 255, .6);
    bottom: 0;
    height: auto;
    left: 0;
    opacity: 0;
    -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";
    padding: 0;
    position: absolute;
    top: 0;
    -webkit-transition: all .6s ease-in-out;
    transition: all .6s ease-in-out;
    width: 100%;
}
.caption-cel {
    display: table;
    height: 100%;
    text-align: center;
    width: 100%;
}
.product-link {
    display: table-cell;
    vertical-align: middle;
}
.product-link > div {
    display: inline-block;
}
.product-link > div a {
    color: #fff;
    padding: 8px 12px;
    display: inline-block;
}
.product-link div div {
    background: <?php echo $setts[0]->site_button_color;?> !important;
    font-size: 14px;
    color: #fff;
    font-weight: 500;
    border-radius: 0px;
}
.product-link div div:first-child {
    margin: 0 0 5px;
    background: #363a40;
}
.product-link .link-green {
    background: #2da9dc
}
.product-link span i {
    margin-left: 5px;
}
.item-demo:hover .product-caption,
.single-new:hover .product-caption {
    opacity: 1;
    -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=100)";
}
.product-info {
    padding: 20px;
}
.product-name {
    font-size: 16px;
    margin-bottom: 0;
    overflow: hidden;
    padding-right: 50px;
    position: relative;
    text-overflow: ellipsis;
    white-space: nowrap;
}
.product-name a {
    color: #666666;
}
.product-name a:hover {
    color: <?php echo $setts[0]->site_button_color;?>;
}
.product-name span {
    color: <?php echo $setts[0]->site_button_color;?>;
    font-size: 24px;
    font-weight: 700;
    position: absolute;
    right: 0;
}
.p-author a {
    color: #9c9c9c;
    font-size: 14px;
}
.product-meta {
    border-top: 1px solid #ebebeb;
    padding-top: 8px;
    margin-top: 20px;
}
.product-meta span {
    color: #a5a5a5;
    font-weight: 700;
}
.product-meta span:first-child {
    margin-right: 10px;
}
.meta-download i,
.meta-love i,
.meta-rating i:last-child,
.meta-type i {
    margin-right: 5px;
}
.meta-rating {
    float: right;
}
.meta-rating i {
    color: #ffb400;
}
/* ========================================
7. NEW PRODUCT AREA
===========================================*/

.new-product-area {
    background: #f5f5f5;
}
.single-new {
    width: 30.33%;
    float: left;
    overflow: hidden;
    margin: 0 15px 30px;
    position: relative;
}
.n-product-list {
    text-align: center;
    margin: 10px 0 35px;
}
.n-product-list li {
    display: inline-block;
    padding: 0 8px 0px;
}
.n-product-list li a {
    font-weight: 700;
    color: #868686;
    text-transform: uppercase;
}
/* SERVICE-1 AREA START */

.service-entry {
    text-align: center;
    padding: 50px 25px;
    margin-top: 30px;
    box-shadow: 0 0 10px 0 rgba(0, 0, 0, 0.10);
    -webkit-box-shadow: 0 0 10px 0 rgba(0, 0, 0, 0.10);
    -moz-box-shadow: 0 0 10px 0 rgba(0, 0, 0, 0.10);
}
.service-entry.color-1 {
    border-top: 3px solid <?php echo $setts[0]->site_button_color;?>;
}
.service-entry.color-2 {
    border-top: 3px solid #f9a825;
}
.service-entry.color-3 {
    border-top: 3px solid #304ffe;
}
.service-entry.color-4 {
    border-top: 3px solid #00c853;
}
.service-entry.color-5 {
    border-top: 3px solid #43a047;
}
.service-entry.color-6 {
    border-top: 3px solid #ff6d00;
}
.service-entry.color-7 {
    border-top: 3px solid #f44336;
}
.service-entry.color-8 {
    border-top: 3px solid #2da9dc;
}
.service-headline {
    font-size: 18px;
    font-weight: 400;
    margin-top: 15px;
}
.survice-button {
    margin-top: 60px;
    text-align: center;
}
.survice-button .custom-btn {
    padding: 17px 17px;
}
/* CHOOSE US AREA */

.choose-us-area {
    background: #ffffff;
}
.choose-wrap {
    margin-top: 50px;
}
.choose-entry {
    text-align: center;
    padding: 40px 60px;
    color: #fff;
}
.choose-entry.color-1 {
    background: <?php echo $setts[0]->site_button_color;?>
}
.choose-entry.color-2 {
    background: #f9a825
}
.choose-entry.color-3 {
    background: #2da9dc
}
.choose-info h4 {
    font-size: 20px;
    margin: 20px 0 10px;
    color: #fff;
}
.choose-icon {
    width: 50px;
    height: 50px;
    display: inline-table;
    text-align: center;
    background: #fff;
    border-radius: 50%;
}
.choose-icon i {
    display: table-cell;
    vertical-align: middle;
}
.color-1 .choose-icon i {
    color: <?php echo $setts[0]->site_button_color;?>
}
.color-2 .choose-icon i {
    color: #f9a825
}
.color-3 .choose-icon i {
    color: #2da9dc
}
.choose-us-area .owl-nav div {
    color: #abaaaa;
    font-size: 26px;
}
.choose-us-area .owl-nav div.owl-next {
    left: auto;
    right: -85px;
}
/* ==============================
9. CLIENT AREA
===================================*/

.client-area {
    padding: 100px 0;
    background-size: cover;
    border-top: 6px solid #ffeb3b;
}
.client-area.overly-bg:before {
    background: #494d4e none repeat scroll 0 0;
    opacity: 0.95;
}
.quote-thumb > img {
    border: 10px solid #e2d1ff;
    border-radius: 50%;
    height: 130px;
    width: 130px !important;
    display: inline !important;
}
.single-quote {
    text-align: center;
    max-width: 695px;
    margin: 0 auto;
}
.quote-thumb {
    padding-bottom: 30px;
}
.single-quote > p {
    color: #fff;
    line-height: 24px;
    margin-bottom: 15px;
}
.client-name h5 {
    color: #fff;
    font-size: 18px;
    margin-bottom: 0;
    text-transform: uppercase;
    line-height: 24px;
}
.client-name > span {
    color: #fff;
    font-size: 14px;
    line-height: 24px;
}
.client-area .owl-nav div,
.choose-us-area .owl-nav div {
    display: inline-table;
    height: 48px;
    left: -50px;
    padding: 0;
    position: absolute;
    top: 45%;
    -webkit-transition: all 0.4s ease 0s;
    transition: all 0.4s ease 0s;
    width: 48px;
    text-align: center;
    background: transparent;
}
.choose-us-area .owl-nav div {
    left: -85px;
}
.client-area .owl-nav div:before {
    background: #fff none repeat scroll 0 0;
    content: "";
    height: 100%;
    opacity: 0.2;
    -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=20)";
    position: absolute;
    width: 100%;
    left: 0;
    top: 0;
    border-radius: 0px;
}
.client-area .owl-nav div.owl-next {
    left: auto;
    right: -50px;
}
.client-area .owl-nav i {
    display: table-cell;
    font-size: 30px;
    vertical-align: middle;
    color: #fff;
}
/* ==============================
10. BLOG AREA
===================================*/

.blog-area {
    background: #f5f5f5;
}
.single-blog {
    background: #fff none repeat scroll 0 0;
    margin-top: 50px;
    box-shadow: 0 0 12px 0 rgba(0, 0, 0, 0.12);
    -webkit-box-shadow: 0 0 12px 0 rgba(0, 0, 0, 0.12);
    -moz-box-shadow: 0 0 12px 0 rgba(0, 0, 0, 0.12);
}
.s-blog-detiails {
    padding: 15px 20px 25px;
}
.single-blog img {
    height: 180px;
    width: 100%;
}
.s-blog-meta a {
    color: #666666;
    font-size: 12px;
}
.s-blog-heading {
    font-size: 18px;
    margin-bottom: 0;
    line-height: 27px;
}
.s-blog-heading > a {
    color: #353535;
}
.s-blog-heading > a:hover {
    color: <?php echo $setts[0]->site_button_color;?>
}
.blog-tags a {
    color: <?php echo $setts[0]->site_button_color;?>;
}
.blog-tags > span {
    font-size: 14px;
    text-decoration: underline;
    text-transform: capitalize;
}
.s-blog-detiails > p {
    font-size: 14px;
    margin-top: 5px;
}
.s-blog-detiails .read-more {
    color: #f44336;
    font-size: 14px;
    text-transform: capitalize;
}
.s-blog-detiails .read-more i {
    margin-left: 5px;
    -webkit-transition: .4s;
    transition: .4s;
}
.s-blog-detiails .read-more:hover {
    color: <?php echo $setts[0]->site_button_color;?>;
}
.s-blog-detiails .read-more:hover i {
    margin-left: 9px;
    color: <?php echo $setts[0]->site_button_color;?>
}
.section-title.under-line {
    position: relative;
    padding-bottom: 5px;
}
.section-title.under-line::after {
    position: absolute;
    height: 2px;
    background: <?php echo $setts[0]->site_button_color;?>;
    width: 25%;
    left: 50%;
    top: 100%;
    content: "";
    -webkit-transform: translate(-50%, -50%);
    transform: translate(-50%, -50%)
}
/* ====================================
11. FOOTER AREA
=======================================*/

.footer-area {
    overflow: hidden;
}
.footer-top {
    background: <?php echo $setts[0]->site_secondary_color;?> none repeat scroll 0 0;
    padding: 60px 0;
}
.footer-title {
    color: #fff;
    font-size: 18px;
    text-transform: uppercase;
}
.product-list,
.our-support,
.our-company {
    list-style: outside none none;
    margin: 0;
    padding: 0;
}
.product-list a,
.our-support a,
.our-company a {
    color: #DCDCDC;
    font-size: 14px;
    line-height: 30px;
    font-weight: 500;
}
.home-3-footer .product-list a,
.home-3-footer .our-support a,
.home-3-footer .our-company a,
.home-3-footer .footer-widget > p,
.home-3-footer .community-count {
    font-weight: 400;
}
.home-3-footer .community-count strong {
    color: <?php echo $setts[0]->site_button_color;?>;
    font-weight: 400;
}
.product-list a:hover,
.our-support a:hover,
.our-company a:hover {
    color: <?php echo $setts[0]->site_button_color;?>;
}
.home-3-footer .product-list a:hover,
.home-3-footer .our-support a:hover,
.home-3-footer .our-company a:hover {
    color: <?php echo $setts[0]->site_button_color;?>
}
.footer-widget > p {
    color: #DCDCDC;
    font-size: 14px;
    font-weight: 500;
}
.support-pd {
    padding-left: 40px;
}
.subscribe-form {
    padding-top: 5px;
    position: relative;
}
.subscribe-form input {
    background: #fff none repeat scroll 0 0;
    height: 46px;
    width: 70%;
    border: 0 none;
    color: #000000;
    font-size: 14px;
    border-radius: 3px;
}
.home-3-footer .subscribe-form input {
    background: #ffffff;
    border: 1px solid #cdcdcd;
}
.subscribe-form > button {
    background: <?php echo $setts[0]->site_button_color;?> none repeat scroll 0 0;
    border: medium none;
    color: #fff;
    font-size: 16px;
    padding: 11px 27px;
    position: absolute;
    right: 0;
    text-transform: uppercase;
    font-weight: 700;
   
    border-radius: 3px;
}
.community-count {
    padding-top: 20px;
    display: block;
    font-weight: 500;
	color:#ffffff;
}
.community-count strong {
    color: <?php echo $setts[0]->site_button_color;?>;
    font-size: 20px;
    margin-right: 10px;
}
.footer-buttom {
    background: <?php echo $setts[0]->site_primary_color;?> none repeat scroll 0 0;
    padding: 22px 0;
}
.copy-right > p {
    color: #cccccc;
    font-size: 14px;
    margin: 5px 0 0;
}
.footer-social > ul {
    float: none;
    list-style: outside none none;
    margin: 0;
    padding: 0;
    text-align: right;
}
.footer-social li {
    display: inline-block;
    float: none;
    margin-left: 5px;
    padding: 5px 18px;
    border-radius: 3px;
}
.footer-social a {
    color: #fff;
    font-size: 14px;
    text-transform: capitalize;
}
.footer-social a i {
    margin-right: 10px;
}
.footer-social li.fb {
    background: #3b5998;
}
.footer-social li.gp {
    background: #dd4b39;
}
.footer-social li.be {
    background: #1769ff;
}
.footer-social li.tw {
    background: #1da1f2;
}
/* ================================================
HOME-2 CSS START
====================================================*/

.main-menu-area.menu-2 {
    background: #fff;
}
.main-menu-area.menu-2 .main-menu > nav > ul {
    text-align: right;
}
.main-menu-area.menu-2 .logo {
    padding: 25px 0 0;
}
.main-menu-area.menu-2 .board-item > li {
    padding: 30px 0;
}
.menu-2 .main-menu li > a {
    color: #353535;
    font-weight: 500;
    padding: 40px 7px;
}
.menu-2 .main-menu nav > ul > li:last-child a {
    background: transparent;
    padding: 40px 10px;
    border-radius: 0;
}
.menu-2 .main-menu ul li ul.sub-menu {
    background: #fff none repeat scroll 0 0;
}
.menu-2 .main-menu li > ul > li > a {
    padding: 12px 15px;
}
.avigher-title {
    text-transform: uppercase;
    font-weight: 500;
}
.home-2.overly-bg::before {
    background: #2196f3 none repeat scroll 0 0;
    opacity: 0.9;
    -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=90)";
}
.home-2 .avigher-intro {
    color: #fff;
}
/* PRODUCT AREA */

.product-area {
    background: #f5f5f5;
}
.item-demo.demo-2 img {
    height: 280px;
    width: 100%;
}
.demo-2 {
    padding: 10px;
}
.demo-2 .product-info {
    padding: 30px 0 0;
}
.demo-2 .product-name {
    font-weight: 500;
    margin-bottom: 10px;
}
.demo-2 .product-meta {
    margin-top: 10px;
}
.demo-2 .p-category a {
    font-size: 14px;
    color: #ababab;
    text-transform: capitalize;
}
.demo-2 .product-meta span {
    color: #ababab;
    display: inline-block;
    font-weight: 400;
    margin-right: 30px;
    padding-top: 5px;
}
.demo-2 .product-meta span:last-child {
    margin-right: 0;
    font-weight: 700;
    color: #fff;
    text-align: center;
    line-height: 30px;
    background: <?php echo $setts[0]->site_button_color;?>;
    display: inline-block;
    width: 72px;
    height: 30px;
    text-transform: uppercase;
    float: right;
    padding-top: 0;
}
.storola-tab {
    background: #2da9dc none repeat scroll 0 0;
    border: medium none;
    float: none;
    list-style: outside none none;
    margin: 0 auto 60px;
    max-width: 685px;
    padding: 0;
}
.storola-tab > li {
    display: inline-block;
    float: none;
    margin-left: 5px;
}
.storola-tab > li > a {
    color: #fff;
    display: inline-block;
    font-weight: 700;
    font-size: 18px;
    height: 70px;
    line-height: 1;
    padding-left: 20px;
    padding-top: 25px;
    position: relative;
    text-transform: uppercase;
    width: 160px;
    z-index: 1;
}
.storola-tab > li.active a:before,
.storola-tab > li.active a:after {
    background: <?php echo $setts[0]->site_button_color;?> none repeat scroll 0 0;
    content: "";
    height: 100%;
    position: absolute;
    top: 8px;
    z-index: -1;
}
.storola-tab > li.active a:before {
    width: 90%;
    left: 0;
}
.storola-tab > li.active a:after {
    background: transparent none repeat scroll 0 0;
    border-color: transparent transparent transparent <?php echo $setts[0]->site_button_color;?>;
    border-style: solid;
    border-width: 70px 44px 0 20px;
    right: -48px;
}
.view-btn-wrap {
    margin-top: 30px;
}
/* ========================================
8. SERVICE AREA
===========================================*/

.service-area.overly-bg:before {
    background: #023145 none repeat scroll 0 0;
    opacity: 0.8;
    -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=80)";
}
.service-area.overly-bg {
    padding-top: 80px;
}
.spread-full {
    overflow: hidden;
    cursor: crosshair;
}
.spread-full:hover .service-thumb {
    -webkit-transform: scale(1.1);
    transform: scale(1.1)
}
.service-thumb {
    height: auto;
    margin: 0 auto;
    width: 621px;
    -webkit-transition: .8s;
    transition: .8s;
    -webkit-transform: scale(1);
    transform: scale(1)
}
.service-heading {
    color: #fff;
    font-size: 42px;
    text-transform: uppercase;
}
.service-details > p {
    color: #fff;
    font-size: 15px;
    margin: 10px 0 5px;
}
.service-list {
    padding-top: 20px;
    padding-bottom: 30px;
}
.service-details {
    padding-bottom: 90px;
}
.service-list:after,
.demo-social:after,
.s-blog-details:after,
.single-popular:after,
.single-follow:after,
.article-share:after,
.article-pagination:after,
.single-comment:after,
.cart-details > li:after,
.single-blog:after,
.price-form .form-group:after {
    clear: both;
    content: "";
    display: table;
}
.service-list li {
    display: inline-block;
    float: left;
    margin: 0 8px 13px 0;
}
.service-list a {
    color: #fff;
    padding: 5px;
}
.service-list li.ui a {
    background: <?php echo $setts[0]->site_button_color;?>
}
.service-list li.psd a {
    background: #f9a825
}
.service-list li.wp a {
    background: #304ffe
}
.service-list li.web a {
    background: #43a047
}
.service-list li.theme a {
    background: #00c853
}
.service-list li.br a {
    background: #ff6d00
}
/* ==============================================
Client-2 Area
==================================================*/

.client-2.overly-bg::before {
    background: #363a40 none repeat scroll 0 0;
    opacity: 0.95;
}
/* ================================================
HOME STYLE-3 START
===================================================*/

.header-top.header-3 {
    background: #3b3f41
}
.header-3 .n-sticker {
    font-weight: 500;
}
.header-3 .n-sticker::after {
    position: absolute;
    left: 15px;
    top: 0px;
    content: "Coming Soon :";
    font-size: 14px;
    color: #cecece;
}
.header-3 #sticker-item li {
    margin-left: 100px;
    color: #2da9dc;
    font-weight: 500;
}
.header-3 .h-phone > p {
    color: #cecece
}
/* ========================================
FEATURE ITEM AREA 
===========================================*/

.feature-item-area {
    background: #f5f5f5;
    padding: 100px 0 30px;
}
.feature-product-area h2 {
    margin-bottom: 38px;
}
.feature-item-area .demo-2 .product-info {
    padding: 15px 0 0;
}
.feature-item-area .item-demo.demo-2 img {
    height: 504px;
}
.meta-price-old {
    text-decoration: line-through;
}
.s-feature-info {
    margin-top: 80px;
}
.violet-title {
    border-bottom: 2px solid <?php echo $setts[0]->site_button_color;?>;
    color: <?php echo $setts[0]->site_button_color;?>;
    display: inline-block;
    font-size: 30px;
    margin-bottom: 35px;
    padding-bottom: 4px;
    text-transform: capitalize;
}
.feature-desc h3 {
    font-size: 20px;
}
.feature-desc p {
    max-width: 525px;
    margin-bottom: 65px;
}
.feature-item-area .custom-btn {
    padding: 0;
    width: 150px;
    height: 45px;
    text-align: center;
    line-height: 45px;
}
.feature-item-area .custom-btn.violet {
    margin-right: 10px;
}
.feature-wrap .owl-dots {
    left: 55%;
    position: absolute;
    top: 78%;
    -webkit-transform: translate(-50%, -50%);
    transform: translate(-50%, -50%);
}
.feature-wrap .owl-dots .owl-dot {
    display: inline-block;
}
.feature-wrap .owl-dots .owl-dot span {
    background: #fff;
    width: 16px;
    height: 16px;
    display: block;
    margin: 0 3px;
    border-radius: 50%;
}
.feature-wrap .owl-dots .owl-dot.active span,
.feature-wrap .owl-dots .owl-dot:hover span {
    background: #f44336;
}
/* NEW PRODUCT AREA */

.new-product-area {
    padding-bottom: 100px;
}
.new-product-wrap {
    position: relative;
    padding-bottom: 5px;
}
.new-product-wrap::after {
    position: absolute;
    left: 0;
    top: 45px;
    width: 100%;
    height: 1px;
    content: "";
    background: #ebebeb
}
.client-area.client-3.overly-bg::before {
    background: <?php echo $setts[0]->site_button_color;?> none repeat scroll 0 0;
    opacity: 0.95;
}
.home-3-footer .footer-top {
    background: #e4e4e4 none repeat scroll 0 0;
}
.home-3-footer .footer-title,
.home-3-footer .product-list a,
.home-3-footer .our-support a,
.home-3-footer .our-company a,
.home-3-footer .footer-widget > p {
    color: #616161
}
.sevice-1-area {
    padding: 100px 0;
}
/* =================================================
ABOUT PAGE CSS START HERE
==================================================== */
/* ====================================
12.1 ABOUT PROMO
=======================================*/

.inner-banner-area {
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
}
.promo-area {
    padding: 75px 0;
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
}
.promo-text {
    margin: 0 auto;
    max-width: 750px;
    text-align: center;
}
.promo-text h2 {
    color: #c7c7c7;
    font-size: 30px;
    text-transform: uppercase;
}
.single-promo {
    max-width: 265px;
    margin: 0 auto;
    text-align: center;
}
.single-promo span {
    font-size: 48px;
    color: <?php echo $setts[0]->site_button_color;?>;
}
.single-promo h3 {
    margin-top: 20px;
    font-weight: 500;
}
.single-promo p {
    font-size:15px;
}
.promo-text h4 {
    color: #c7c7c7;
    margin: 0;
    line-height: 27px;
}
.about-breadcrumb {
    background: #e4e4e4 none repeat scroll 0 0;
}
.about-breadcrumb .breadcrumb {
    background: transparent none repeat scroll 0 0;
    margin: 0;
}
.breadcrumb > li {
    font-size: 14px;
    text-transform: capitalize;
}
.breadcrumb > li a {
    color: #818181;
}
.breadcrumb-item.active {
    color: <?php echo $setts[0]->site_button_color;?>;
}
/* ==============================================
12.2 MAIN ABOUT WRAP
=================================================*/

.about-main {
    background: #fff none repeat scroll 0 0;
}
.about-warp-txt h5 {
    font-weight: 500;
    font-size: 16px;
    margin-bottom: 25px;
}
.about-warp-txt > p {
    margin-bottom: 20px;
    font-size: 14px;
}
.about-main .custom-btn {
    margin-top: 15px;
    padding: 16px 70px;
}
.about-wrap-intro div {
    width: calc(51.3% - 15px);
    float: left;
    margin-right: 15px;
    margin-bottom: 15px;
    text-align: center;
    padding: 50px 0 55px;
}
.about-wrap-intro div i {
    font-size: 30px;
    color: #fff;
    margin-bottom: 10px;
}
.about-wrap-intro div h4 {
    color: #fff;
    text-transform: uppercase;
}
.about-wrap-intro div.strategy,
.about-wrap-intro div.ui-ux,
.about-wrap-intro div.deliver {
    margin-right: 0;
}
.about-wrap-intro div.testing {
    width: calc(35% - 15px);
    padding: 95px 0 105px;
}
.about-wrap-intro div.ui-ux,
.about-wrap-intro div.deliver {
    width: calc(67% - 15px);
    float: right;
    padding: 28px 0 25px;
}
.about-wrap-intro div.search {
    background: #6c40b7
}
.about-wrap-intro div.strategy {
    background: #f8a92b
}
.about-wrap-intro div.testing {
    background: #07c655
}
.about-wrap-intro div.ui-ux {
    background: #3754fb
}
.about-wrap-intro div.deliver {
    background: #f34a3d
}

.about-wrap-intro > div {
    position: relative;
    z-index: 1;
}
.about-wrap-intro > div::after {
    background: <?php echo $setts[0]->site_button_color;?> none repeat scroll 0 0;
    content: "";
    height: 1px;
    right: 50%;
    position: absolute;
    top: 50%;
    width: 20px;
    z-index: -1
}
.about-wrap-intro > div.search::after {
  right: -20px;
}
.about-wrap-intro > div.strategy::after {
  left: 40%;
  top: 105%;
  transform: rotate(90deg);
}
.about-wrap-intro > div.ui-ux::after,.about-wrap-intro > div.deliver::after {
  left: -20px;
}
.about-wrap-intro > .testing::after {
    background: transparent none repeat scroll 0 0;
}
/* ==========================================
12.3 TEAM AERA
=============================================*/

.member-thumb {
    float: left;
    width: 248px;
}
.member-thumb > img {
    height: 281px;
    width: 100%;
}
.member-details {
    margin-left: 263px;
    padding: 40px 15px 19px 0;
}
.team-member {
    background: #fff none repeat scroll 0 0;
    box-shadow: 0 0px 12px 0px rgba(0, 0, 0, 0.1);
    -webkit-box-shadow: 0 0px 12px 0px rgba(0, 0, 0, 0.1);
    -moz-box-shadow: 0 0px 12px 0px rgba(0, 0, 0, 0.1);
    margin-bottom: 30px;
    overflow: hidden;
    -webkit-transition: .4s;
    transition: .4s;
}
.team-member:hover {
    box-shadow: 0 0px 12px 0px rgba(0, 0, 0, 0.2);
    -webkit-box-shadow: 0 0px 12px 0px rgba(0, 0, 0, 0.2);
    -moz-box-shadow: 0 0px 12px 0px rgba(0, 0, 0, 0.2);
}
.member-heading > h4 {
    font-weight: 500;
    font-size: 20px;
    margin-bottom: 5px;
}
.member-details > p {
    margin: 20px 0 25px;
    font-size: 14px;
}
.member-social {
    list-style: outside none none;
    margin: 0;
    padding: 0;
}
.member-social li {
    display: inline-block;
    margin-right: 20px;
    position: relative;
}
.member-social li.fb a {
    color: #3b5998
}
.member-social li.tw a {
    color: #1da1f2
}
.member-social li.gp a {
    color: #dd4b39
}
.member-social li.ps a {
    color: #bd081c
}
.member-social li a {
    font-size: 18px;
}
.member-social li:after {
    content: "|";
    left: -15px;
    position: absolute;
    top: -2px;
}
.member-social li:first-child:after {
    content: "";
}
.ab-feature-area {
    background: #fefefe;
}
.ab-feature-area .section-title {
    margin-bottom: 60px;
}
.single-feature > img {
    height: 80px;
    width: auto !important;
    margin: 0 auto;
}
/* =============================================
13. PRODUCT PAGE
=================================================*/

.product-promo {
    padding: 60px 0;
    background-size: cover;
    background-position: center center;
}
.product-p-text {
    margin: 0 auto;
    max-width: 740px;
    text-align: center;
}
.product-p-text > p {
    color: #fff;
    line-height: 24px;
}
.tab-header {
    background: #fff;
    padding: 10px 15px 0;
    margin: 0px 0 30px;
}
.product-tab li {
    display: inline-block;
    position: relative;
    font-weight: 700;
    padding-top: 5px;
}
.product-tab li:first-child::after {
    content: "|";
    position: absolute;
    right: -30px;
    top: 5px;
}
.product-tab li:first-child {
    margin-right: 60px;
}
.product-tab li.active a {
    color: <?php echo $setts[0]->site_button_color;?>;
}
.product-tab li a {
    color: #666666;
    text-transform: uppercase;
}
.tab-viewport > div {
    display: inline-block;
}
.filter-title {
    display: inline-block;
    text-transform: uppercase;
    margin-right: 15px;
}
.filter-form,
.view-tab li {
    display: inline-block;
}
.filter-form {
    margin-right: 20px;
    position: relative;
    z-index: 1;
}
.view-tab li a {
    color: #7a7a7a;
    font-size: 18px
}
.view-tab li {
    background: #ebebeb none repeat scroll 0 0;
    display: inline-block;
    margin-left: 15px;
    padding: 5px 10px;
}
.filter-form select#seltect-opt {
    
    border-radius: 0px;
    -webkit-box-shadow: 0px 1px 3px rgba(0, 0, 0, 0.1);
    -webkit-user-select: none;
    -moz-user-select: none;
    outline: none;
    
    
    
	
   
}
.filter-form select:focus {
    position: relative;
	outline: none;
}
.filter-form select::after {
    position: absolute;
    right: -8px;
    top: 5px;
    content: "\f107";
    z-index: 2;
    width: 40px;
    height: 40px;
    font-family: fontawesome;
}
/* PRODUCT LIST */

.item-demo.item-list > figure {
    float: left;
    width: 30%;
}
.item-demo.item-list::after {
    clear: both;
    content: "";
    display: table;
}
.item-demo.item-list .product-info {
   /* margin-left: 31%;*/
}

.product-header > p {
    max-width: 80%;
}

.item-demo.item-list figure > img {
    height: 270px;
    padding: 15px;
}
.item-list .product-info {
   /* padding-top: 50px; */
}
/* =============================================
14. PRODUCT DETAILS PAGE CSS
=================================================*/

main {
    padding: 50px 0 30px;
}
.product-details {
    background: #f5f5f5;
}
.s-product-thumb img {
    height: 470px;
    width: 100%;
}
.product-title {
    color: #353535;
    font-size: 24px;
    margin: 10px 0px 25px 10px;
}
.s-product-thumb {
    background: #fff none repeat scroll 0 0;
    padding: 10px;
    box-shadow: 0 0 12px 0 rgba(0, 0, 0, 0.1);
    -webkit-box-shadow: 0 0 12px 0 rgba(0, 0, 0, 0.1);
    -moz-box-shadow: 0 0 12px 0 rgba(0, 0, 0, 0.1);
}
.demo-social {
    padding: 15px;
    border: 1px solid #ebebeb;
    margin-top: 30px;
    background: #fff;
}
.p-demo-btn {
    float: left;
}
.p-demo-social {
    float: right;
}

.demo-social .custom-btn_review {
    background: #00AEEF none repeat scroll 0 0;
    -webkit-box-shadow: none;
    box-shadow: none;
    color: #fff;
    text-transform: capitalize;
    font-size: 18px;
    padding: 17px 30px;
}

.demo-social .custom-btn {
    background: <?php echo $setts[0]->site_button_color;?> none repeat scroll 0 0;
    -webkit-box-shadow: none;
    box-shadow: none;
    color: #fff;
    text-transform: capitalize;
    font-size: 18px;
    padding: 17px 30px;
}
.p-demo-social li {
    display: inline-block;
    margin-left: 10px;
}
.p-demo-social li a {
    background: #b7b7b7;
    display: inline-table;
    width: 50px;
    height: 50px;
    color: #fff;
    font-size: 18px;
    text-align: center;
    border-radius: 0px;
}
.p-demo-social li.blue {
    position: relative;
    top: -4px;
}
.p-demo-social li.blue a {
    background: #00aeef none repeat scroll 0 0;
    padding: 10px 15px 12px;
}
.p-demo-social li.blue a i {
    padding-right: 5px;
}
.p-demo-social li a i {
    display: table-cell;
    vertical-align: middle;
}
/* ======================================
14.1 PRODUCT DETAILS TAB
=========================================*/

.s-product-tab {
    background: #fff none repeat scroll 0 0;
    border: 1px solid #ebebeb;
    margin: 30px 0;
    padding-bottom: 20px;
}
.single-product .tab-content {
    margin-top: 45px;
}
.single-product .tab-pane {
    padding: 0 35px;
}
.single-product .nav.nav-tabs {
    background: #e1e1e1 none repeat scroll 0 0;
    border: 0 none;
}
.single-product .nav-tabs > li {
    margin-bottom: 0px;
    position: relative;
}
.single-product .nav-tabs > li > a {
    border: 0 none;
    border-radius: 0;
    color: #000000;
    font-weight: 500;
    padding: 15px 25px;
    text-transform: capitalize;
}
.single-product .nav-tabs > li a:after {
    content: "";
    position: absolute;
    left: -2px;
    top: 0;
    height: 100%;
    width: 1px;
    background: #cccccc;
}
.single-product .nav-tabs > li.active > a:after,
.nav-tabs > li:first-child > a:after {
    background: transparent;
}
.single-product .nav-tabs > li.active > a,
.nav-tabs > li.active > a:focus,
.nav-tabs > li.active > a:hover {
    
   
}
.single-product .item-detail-tab > p {
    font-size: 14px;
    margin-bottom: 15px;
}
.item-details-list {
    list-style: outside none none;
    margin-bottom: 15px;
    padding-left: 40px;
}
.item-details-list > li {
    line-height: 30px;
    font-size: 14px;
}
.item-details-list > li:before {
    color: #cacaca;
    content: "\f111";
    display: inline-block;
    font-family: fontawesome;
    font-size: 14px;
    margin-right: 10px;
}
.item-support > p {
    margin-bottom: 30px;
}
.item-support,
.single-product .add-comment {
    padding-bottom: 30px;
}
.single-product .comment-wrap,
.single-product .ac-wrap {
    border: medium none;
    padding: 0;
}
.single-product .ac-wrap {
    padding: 0;
}
.single-product .add-comment > h3 {
    margin-bottom: 30px;
    text-transform: capitalize;
}
.comment-wrap > li::after,
.about-wrap-intro div::after {
    clear: both;
    content: "";
    display: table;
}
.pro-comment {
    margin-top: 40px;
}
.pro-comment button {
    margin-top: 30px;
}
/* ====================================
14.2 RELATED PRODUCT 
=======================================*/

.related-product {
    padding-bottom: 95px;
}
.related-p-heading > h3 {
    background: #e1e1e1 none repeat scroll 0 0;
    color: #353535;
    font-size: 18px;
    padding: 15px;
    text-transform: uppercase;
    margin-bottom: 30px;
}
.related-p-heading > h3 {
    background: #e1e1e1 none repeat scroll 0 0;
    color: #353535;
    font-size: 18px;
    padding: 20px 15px;
    position: relative;
    text-transform: uppercase;
}
.related-product .owl-nav {
    left: -5px;
    position: absolute;
    top: -82px;
    width: 100%;
}
.related-product .owl-nav div {
    background: #fff;
    cursor: pointer;
    color: #666666;
    display: inline-block;
    font-size: 18px;
    height: 40px;
    opacity: 1;
    -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=100)";
    text-align: center;
    -webkit-transition: all 300ms ease 0s;
    transition: all 300ms ease 0s;
    width: 40px;
    line-height: 40px;
}
.related-product .owl-nav div.owl-prev {
    left: 92%;
    position: absolute;
    right: 0;
}
.related-product .owl-nav div.owl-next {
    position: absolute;
    right: 6px;
}
/* ========================================
14.3 PRODUCT DETEALS SIDEBAR
===========================================*/

.product-widget {
    background: #fff none repeat scroll 0 0;
    border: 1px solid #ebebeb;
    margin-bottom: 30px;
}
.product-widget .currency {
    background: <?php echo $setts[0]->site_button_color;?> none repeat scroll 0 0;
    color: #fff;
    display: block;
    font-size: 30px;
    line-height: 21px;
    padding: 20px;
    text-align: center;
	cursor:default;
	border:none;
	
}
.product-widget .currency:hover {
    color: #fff;
}
/* =======================================
14.4 PRICE INFO WIDGET 
==========================================*/

.price-info {
    padding: 30px;
}
.price-feature {
    list-style: outside none none;
    margin: 0;
    padding: 0;
}
.price-form {
    padding-bottom: 25px;
}
.price-feature > li {
    line-height: 30px;
    padding-left: 0px;
	font-size:15px;
    position: relative;
}
.price-feature > li > .on {
    content: "\f046";
    left: 0px;
    position: absolute;
    font-family: fontawesome;
}


.price-feature > li > .off {
    content: "\f00d" !important;
    left: 0px;
    position: absolute;
    font-family: fontawesome;
}


.price-form .form-group {
    line-height: 30px;
    margin-bottom: 0;
}
.price-form .form-group input {
    height: 15px;
    width: 15px;
}
.price-form .form-group > label {
    color: #666666;
    font-size: 15px;
    font-weight: normal;
}
.price-form .form-group span {
    float: right;
}
.price-info .custom-btn {
    display: block;
    text-align: center;
    padding: 11px 30px;
}
.sells-number > h3 {
    font-size: 30px;
    margin: 0;
    font-weight: 400;
    text-transform: capitalize;
}
.sells-number {
    padding: 20px 30px;
}
.sells-number span {
    color: #f44336;
    font-weight: 700;
    margin: 0 5px;
}

.feature-number
{
 padding: 20px 30px;
}

.feature-number span {
    color: #000000;
    font-weight: 700;
    margin: 0 5px;
}
/* ======================================
14.5 PRODUCT INFORMATION
=========================================*/

.prodect-info-heading {
    background: #e1e1e1 none repeat scroll 0 0;
    color: #353535;
    font-size: 15px;
    padding: 15px 30px;
    text-transform: uppercase;
}
.prodect-information li {
    border-bottom: 1px solid #f4f4f4;
    padding: 15px 30px;
    display: block;
    font-weight: 500;
}
.prodect-information li:last-child {
    border: medium none;
    padding-bottom: 30px;
}
.info-name {
    color: #353535;
    float: left;
    font-size: 14px;
    text-transform: capitalize;
    width: 115px;
	font-weight:bold;
}
.info-value {
    display: block;
    font-size: 13px;
    margin-left: 130px;
    font-weight: 400;
}
.prodect-information label {
    color: #3f3f3f;
    margin-right: 10px;
    font-weight: normal;
    float: left;
}
/* =======================================
15. BLOG PAGE CSS
==========================================*/

.promo-parallax {
    padding: 85px 0;
    background-size: cover;
}
.promo-p-txt {
    text-align: center;
}
.promo-p-txt > h2 {
    color: #fff;
    text-transform: uppercase;
    margin: 0;
    font-size: 30px;
}
/* ==========================================
15.1 SINGLE BLOG ITEM
=============================================*/

.main-content {
    padding: 40px 0 100px;
}
.single-article {
    overflow: hidden;
}
.s-blog-item {
    margin-bottom: 30px;
}
.blog-thumb .overly-bg {
    display: block;
}
.blog-thumb {
    position: relative;
}
.overly-bg > img {
    width: 100%;
    height: 428px;
}
.blog-thumb a.overly-bg:before {
    background: <?php echo $setts[0]->site_button_color;?> none repeat scroll 0 0;
    opacity: .5;
    -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=50)";
}
.blog-thumb div.overly-bg:before {
    background: <?php echo $setts[0]->site_button_color;?> none repeat scroll 0 0;
    opacity: .5;
    -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=50)";
}
.thubm-caption {
    color: #fff;
    display: inline-table;
    font-weight: 500;
    font-size: 48px;
    height: 141px;
    left: 50%;
    line-height: 1;
    padding: 15px 0;
    position: absolute;
    text-align: center;
    text-transform: capitalize;
    top: 50%;
    -webkit-transform: translate(-50%, -50%);
    transform: translate(-50%, -50%);
    width: 372px;
    z-index: 9;
}
.thubm-caption:before {
    background: #fff none repeat scroll 0 0;
    content: "";
    height: 100%;
    left: 50%;
    opacity: 0.5;
    -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=50)";
    position: absolute;
    top: 50%;
    -webkit-transform: translate(-50%, -50%);
    transform: translate(-50%, -50%);
    width: 100%;
}
.thubm-caption:hover {
    color: #fff;
}
.thubm-caption > span {
    display: table-cell;
    vertical-align: middle;
}
.s-blog-item {
    background: #fff none repeat scroll 0 0;
}
.s-blog-details {
    border: 1px solid #ebebeb;
    padding: 20px 30px 30px;
}
.blog-headline,
.s-blog-details .blog-headline a {
    color: #353535;
    font-size: 24px;
    margin-bottom: 8px;
    font-weight: 500;
}
.blog-headline {
    margin-bottom: 10px;
}
.blog-meta a {
    color: #666666;
}
.blog-meta a:hover,
.s-blog-details .blog-headline a:hover {
    color: <?php echo $setts[0]->site_button_color;?>;
}
.blog-meta > span {
    color: #666666;
    font-size: 14px;
    margin-right: 20px;
    position: relative;
}
.blog-meta > span:after {
    content: "|";
    display: inline-block;
    position: absolute;
    right: -14px;
    top: -5px;
}
.blog-meta > span:last-child:after {
    content: "";
}
.blog-meta > span i {
    margin-right: 5px;
}
.s-blog-details > p {
    font-size: 14px;
    margin: 20px 0 33px;
}
.s-blog-item .custom-btn {
    padding: 12px 24px;
}
.post-social li {
    display: inline-block;
    padding-bottom: 8px;
    padding-left: 40px;
    padding-top: 8px;
    position: relative;
}
.post-social li:after {
    background: #ebebeb none repeat scroll 0 0;
    content: "";
    height: 100%;
    left: 20px;
    position: absolute;
    top: 0;
    width: 1px;
}
.post-social li:first-child:after {
    background: transparent;
}
.post-social a {
    color: #737373;
}
.post-social a:hover {
    color: <?php echo $setts[0]->site_button_color;?>;
}
.post-social a i {
    margin: 0 5px;
}
/* ======================================
15.2 PAGER NAVIGATION
=========================================*/

.pager {
    margin: 60px 0 0;
}
.product-area .pager {
    margin: 30px 0 0;
}
.pager > a,
.pager span {
    color: #666666;
    display: inline-block;
    height: 40px;
    line-height: 40px;
    margin: 0 2px;
    width: 40px;
    border: 1px solid transparent;
}
.pager > a:first-child,
.pager > a:last-child {
    background: #fff;
    border: 1px solid #ebebeb;
}
.pager span,
.pager > a:hover {
    background: #f44336;
    border: 1px solid #f44336;
    color: #fff;
}
/* =====================================================
15.3 SIDEBAR AREA CSS
========================================================*/

.sidebar-widget {
    background: #fff none repeat scroll 0 0;
    border: 1px solid #ebebeb;
    margin-bottom: 30px;
}
.search-box > button {
    background: <?php echo $setts[0]->site_button_color;?> none repeat scroll 0 0;
    border: medium none;
    color: #fff;
    height: 58px;
    position: absolute;
    width: 81px;
    right: 0;
    top: 0;
}
.search-box {
    position: relative;
}
.search-box > input {
    border: 1px solid #ebebeb;
    height: 58px;
    width: 280px;
    color: #171d24;
    font-size: 14px;
    font-weight: normal;
}
/* ==============================
15.4 CATEGORY WIDGET
================================*/

.widget-title {
    background: #e1e1e1 none repeat scroll 0 0;
    color: #353535;
    font-size: 16px;
    padding: 15px;
    text-transform: uppercase;
    margin-bottom: 0px;
}
.sidebar-widget > ul {
    list-style: outside none none;
    margin: 0;
    padding: 0;
}
.sidebar-widget > ul > li {
    border-bottom: 1px solid #e1e1e1;
    padding: 8px 0 8px 18px;
}
.sidebar-widget > ul > li:last-child {
    border-bottom: 0 none;
}
.sidebar-widget > ul > li a {
    color: #353535;
    font-size: 14px;
}
.sidebar-widget > ul > li:hover > a {
    color: <?php echo $setts[0]->site_button_color;?>;
    padding-left: 5px;
}
/* ==============================
15.5 POPULAR POST
================================*/

.single-popular {
    padding: 15px 0 15px 18px;
    ;
}
.single-popular:first-child {
    padding-top: 30px;
}
.single-popular:last-child {
    padding-bottom: 30px;
}
.single-popular > a {
    float: left;
}
.single-popular img {
    height: 72px;
    width: 103px;
}
.pp-details {
    margin-left: 113px;
}
.pp-details > h4 a {
    color: #353535;
    -webkit-transition: .4s;
    transition: .4s;
}
.pp-details > h4 {
    line-height: 21px;
    margin-bottom: 0;
    font-size: 16px;
}
.pp-details > span {
    color: #a9a9a9;
    font-size: 14px;
}
.pp-details > h4 a:hover {
    color: <?php echo $setts[0]->site_button_color;?>
}
/* =======================================
15.6 FOLLOW US
==========================================*/

.single-follow {
    border-bottom: 1px solid #e1e1e1;
    padding: 15px 40px 15px 18px;
}
.single-follow:last-child {
    border-bottom: 0 none;
}
.follow-icon {
    float: left;
    display: inline-table
}
.follow-btn {
    border: medium none;
    color: #fff;
    float: right;
    font-weight: 500;
    font-size: 12px;
    height: 30px;
    text-transform: capitalize;
    width: 74px;
    border-radius: 0px;
    margin-top: 5px;
}
.follow-btn.fb {
    background: #3b5998
}
.follow-btn.tw {
    background: #00aced
}
.follow-btn.yt {
    background: #bb0000
}
.follow-icon > span {
    color: #bcbcbc;
    display: table-cell;
    font-size: 30px;
    padding-right: 20px;
    vertical-align: middle;
}
.follow-icon > h4 {
    color: #353535;
    font-size: 18px;
    line-height: 21px;
    margin: 0;
}
.follow-icon h4 span {
    display: block;
    font-size: 12px;
    font-style: italic;
    text-transform: capitalize;
    color: #bcbcbc;
}
/* ======================================
15.7 TAGS WIDGET
========================================*/

.tagclouds {
    padding: 20px 18px;
}
.tagclouds > a {
    border: 1px solid #d7d7d7;
    color: #666666;
    display: inline-block;
    font-size: 14px;
    margin-bottom: 10px;
    margin-right: 5px;
    padding: 2px 7px;
    text-transform: capitalize;
}
.tagclouds > a:hover {
    background: <?php echo $setts[0]->site_button_color;?>;
    border: 1px solid <?php echo $setts[0]->site_button_color;?>;
    color: #fff;
}
/* =========================================
16. SINGLE BLOG PAGE CSS
============================================*/

.s-article-details {
    background: #fff;
    padding: 20px 30px;
    border: 1px solid #ebebeb;
}
.s-article-details > p {
    color: #666666;
    font-size: 14px;
    margin-top: 15px;
    line-height: 21px;
}
.s-article-details img {
    height: 328px;
    margin-right: 20px;
    width: 328px;
}
blockquote {
    /*background: #ebebeb none repeat scroll 0 0;*/
    border: 0 none;
    font-size: 16px;
    line-height: 24px;
    margin: 30px 0;
    padding: 30px;
}
/* =============================
16.1 ARTICLE SHARE
================================*/

.article-share {
    background: #e1e1e1 none repeat scroll 0 0;
    margin-top: 30px;
    padding: 13px 30px 13px;
}
.article-s-list {
    float: right;
}
.article-love {
    margin-top: 5px;
    position: relative;
}
.article-love > span {

    color: #737373;
}
.article-love i {
    margin-right: 10px;
    color: #dd4b39;
}
.article-love:after {
    background: #cccccc none repeat scroll 0 0;
    content: "";
    height: 33px;
    position: absolute;
    right: -23px;
    top: 0;
    width: 1px;
}
.article-s-list li {
    border-radius: 0px;
    color: #353535;
    display: inline-block;
    font-weight: 700;
    margin-left: 5px;
    padding: 5px 10px;
    text-transform: uppercase;
}
.article-s-list li a {
    font-size: 14px;
    color: #fff;
}
.article-s-list li a i {
    margin-right: 5px;
    font-size: 18px;
}
.article-s-list li.fb {
    background: #3b5998;
}
.article-s-list li.gp {
    background: #dd4b39;
}
.article-s-list li.be {
    background: #1769ff;
}
.article-s-list li.tw {
    background: #1da1f2;
}
/* =======================================
16.2 ARTICLE PAGINATION
==========================================*/

.article-pagination {
    padding: 30px 0;
}
.article-pagination li i {
    display: table-cell;
    font-weight: bold;
    margin-right: 10px;
    vertical-align: middle;
}
.article-pagination li span {
    background: #fff none repeat scroll 0 0;
    color: #dd4b39;
    display: inline-table;
    font-size: 20px;
    height: 40px;
    line-height: 40px;
    margin-right: 10px;
    position: relative;
    text-align: center;
    top: 3px;
    -webkit-transition: all 0.4s ease 0s;
    transition: all 0.4s ease 0s;
    width: 40px;
}
.article-pagination li.pull-right span {
    margin-left: 10px;
    margin-right: 0;
}
.article-pagination li span:hover {
    background: #dd4b39;
    color: #fff;
}
.article-pagination li a {
    color: #666666;
    text-transform: uppercase;
    font-weight: 500;
}
/* =======================================
16.3 COMMENT AREA
==========================================*/

.comment-area {
    margin-bottom: 30px;
}
.comment-heading {
    background: #e1e1e1 none repeat scroll 0 0;
    color: #353535;
    font-size: 16px;
    padding: 15px 30px;
    position: relative;
    text-transform: uppercase;
    margin-bottom: 0px;
}
.comment-heading:after {
    background: #cccccc none repeat scroll 0 0;
    content: "";
    height: 33px;
    left: 140px;
    position: absolute;
    top: 13px;
    width: 1px;
}
.comment-heading > span {
    color: #737373;
    font-weight: 500;
    margin-left: 40px;
}
.comment-heading > span i {
    margin-right: 5px;
}
.comment-wrap {
    border: 1px solid #e1e1e1;
    list-style: outside none none;
    margin: 0;
    padding: 30px 30px 0;
    background: #fff;
}
.single-comment {
    position: relative;
    
}
.comment-thumb {
    float: left;
}
.comment-thumb > img {
    height: 70px;
    width: 70px;
	border-radius:50px;
}
.comment-txt {
    margin-left: 95px;
}
.comment-txt .name {
    color: #353535;
    line-height: 21px;
    margin-bottom: 5px;
}
.name > a,.review_datetime {
    color: #666666;
    font-size: 12px;
    margin-left: 10px;
    font-weight: 400;
}
.comment-btn {
    color: <?php echo $setts[0]->site_button_color;?>;
    font-size: 12px;
    position: absolute;
    right: 20px;
    text-transform: capitalize;
    top: 0;
}
.comment-btn i {
    margin-right: 8px;
}
.comment-txt > p {
    color: #737373;
    font-size: 14px;
    line-height: 21px;
}
.comment-area .child {
    list-style: outside none none;
    margin: 0;
}
/* ================================
16.4 ADD A COMMENT
===================================*/

.ac-wrap {
    background: #fff none repeat scroll 0 0;
    padding: 30px;
    border: 1px solid #e1e1e1;
}
.add-comment .comment-heading:after {
    background: transparent none repeat scroll 0 0;
}
.add-comment .form-group {
    margin-bottom: 30px;
}
.add-comment .form-group > input,
.add-comment textarea {
    border: 1px solid #e1e1e1;
}
.add-comment textarea {
    height: 130px;
}
.add-comment .form-group > input {
    height: 50px;
}
.add-comment .custom-btn {
    margin-top: 25px;
    padding: 13px 50px;
}
/* ============================================
17. FAQ PAGE CSS
===============================================*/

.accordion-wrap {
    background: #fff none repeat scroll 0 0;
    padding: 30px;
}
.accordion-wrap .panel-heading {
    background: #fff none repeat scroll 0 0;
    border-radius: 0;
    color: #353535;
    font-family: Robobo-Medium;
    font-size: 18px;
    padding: 15px 0;
}
.accordion-wrap .panel-heading > a:hover {
    color: <?php echo $setts[0]->site_button_color;?>
}
.panel.panel-default {
    overflow: hidden;
}
.panel-group .panel + .panel {
    margin-top: 0;
}
.accordion-wrap .panel-body,
.panel {
    border: 0 none;
    border-bottom: 1px solid #ebebeb;
    -webkit-box-shadow: 0 0 0 rgba(0, 0, 0, 0);
    box-shadow: 0 0 0 rgba(0, 0, 0, 0);
}
.accordion-wrap .panel-body {
    color: #666666;
    font-size: 14px;
    line-height: 21px;
}
.panel-default > .panel-heading + .panel-collapse > .panel-body {
    border: none;
}
.panel-title > a {
    display: block;
    font-family: Roboto;
    font-weight: 500;
    margin-left: 30px;
    text-transform: capitalize;
}
.panel-title a:after {
    content: "\f056";
    font-size: 16px;
    font-family: fontawesome;
    left: 55px;
    position: absolute
}
.panel-title a.collapsed:after {
    content: "\f055";
}
/* ========================================
18. CONTACT PAGE CSS 
===========================================*/

.contact-wrap {
    padding: 50px 50px 0;
    text-align: center;
}
.contact-heading {
    color: #353535;
    font-size: 24px;
    text-transform: uppercase;
}
.contact-wrap > p {
    color: #666666;
    font-size: 16px;
    line-height: 21px;
    margin-bottom: 30px;
}
.contact-wrap input,
.contact-wrap textarea {
    border: 1px solid #ebebeb;
    color: #b6b6b6;
    font-size: 14px;
    font-weight: 400;
}
.contact-wrap textarea {
    height: 180px;
}
.input_top {
    margin-bottom: 20px;
}
.contact-area input {
    height: 60px;
}
.contact-wrap .custom-btn {
    padding: 15px 42px;
    margin-top: 10px;
}
.success {
    padding: 15px;
    margin-bottom: 20px;
    color: #fff;
    background-color: #13A05A;
    border: 1px solid #13A05A;
    border-radius: 0px;
}
.error {
    padding: 15px;
    margin-bottom: 20px;
    color: #fff;
    background-color: #DD5044;
    border: 1px solid #DD5044;
    border-radius: 0px;
}
.form-control:focus {
    border-color: #FF0000;
    -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 8px rgba(255, 0, 0, 0.6);
    box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 8px rgba(255, 0, 0, 0.6);
}
/* ========================================
19. ERROR PAGE CSS 
===========================================*/

.error-heading {
    background: <?php echo $setts[0]->site_button_color;?> none repeat scroll 0 0;
    color: #fff;
    display: inline-block;
    font-size: 30px;
    font-weight: 400;
    padding: 23px 22px;
    text-transform: uppercase;
    margin-left: 35px;
}
.error-area .error {
    background: transparent none repeat scroll 0 0;
    border: 0 none;
    color: #dfdfdf;
    font-size: 300px;
    font-weight: 700;
    line-height: 1;
}
.error-wrap {
    margin: 0 auto;
    max-width: 500px;
    padding-top: 60px;
    text-align: center;
}
.error-wrap > p {
    color: #353535;
    font-size: 16px;
    margin-bottom: 20px;
}
.error-form > input {
    border: 1px solid #e1e1e1;
    color: #ababab;
    font-size: 14px;
    height: 60px;
    border-radius: 0px;
}
.error-form {
    position: relative;
    z-index: 1;
}
.error-form:after {
    content: "\f002";
    position: absolute;
    right: 15px;
    top: 17px;
    font-family: fontawesome;
    font-size: 18px;
    color: #ababab;
}
/* ========================================
20. COMMING SOON PAGE CSS
===========================================*/

.coming-top {
    padding: 100px 0;
}
.coming-top {
    background-position: center center;
    background-repeat: no-repeat;
    background-size: cover;
}
.coming-top.overly-bg::before {
    background: #2c97e9;
    opacity: .9
}
.coming-wrap {
    margin: 0 auto;
    max-width: 730px;
    text-align: center;
}
.c-logo img {
    height: 58px;
}
.c-logo {
    background: transparent;
    margin: 0 auto 60px;
    max-width: 350px;
    padding: 15px 0;
}
.coming-wrap h2 {
    color: #fff;
    font-size: 60px;
    line-height: 36px;
    margin-bottom: 25px;
    text-transform: uppercase;
    font-weight: 400;
}
.coming-wrap h2 span {
    color: <?php echo $setts[0]->site_button_color;?>;
    font-weight: 700;
}
.coming-wrap p {
    color: #fff;
    font-size: 18px;
    font-weight: 500;
    line-height: 27px;
    padding-bottom: 90px;
}
.comming-countown .table-cell {
    background: <?php echo $setts[0]->site_button_color;?> none repeat scroll 0 0;
    color: #fff;
    display: inline-block;
    height: 160px;
    margin-right: 30px;
    position: relative;
    width: 160px;
    padding-top: 50px;
    border-radius: 0px;
}
.comming-countown .table-cell:last-child {
    margin-right: 0;
}
.comming-countown .tab-val {
    font-size: 60px;
    line-height: 36px;
    margin-bottom: 10px;
}
.comming-countown .tab-metr.tab-unit {
    color: #fff;
    font-size: 18px;
    margin: 0;
    text-transform: uppercase;
}
.coming-bottom {
    background: <?php echo $setts[0]->site_button_color;?> none repeat scroll 0 0;
    padding: 30px 0 40px;
}
.coming-form {
    margin: 0 auto;
    max-width: 545px;
    position: relative;
    overflow: hidden;
}
.coming-form input {
    border: 1px solid transparent;
    height: 60px;
    color: #676767;
    font-size: 14px;
    font-weight: 400;
}
.comming-soon-area .custom-btn {
    background: #2196f3 none repeat scroll 0 0;
    border: 0 none;
    border-radius: 0;
    color: #fff;
    font-size: 18px;
    padding: 18px 30px;
    position: absolute;
    right: 0;
    top: 0;
    -webkit-box-shadow: none;
    box-shadow: none;
}
/* ===================================
21. MY ACCOUNT CSS
======================================*/

.loging-wrap,
.register-wrap {
    background-color: #fff;
    padding: 30px 0;
}
.loging-wrap > h3,
.register-wrap > h3 {
    font-size: 24px;
    text-transform: uppercase;
    margin-bottom: 30px;
    color: #353535;
}
.loging-wrap label,
.register-wrap label {
    margin-bottom: 10px;
}
.loging-wrap .form-group,
.register-wrap .form-group {
    margin-bottom: 25px;
}
.loging-wrap .form-group.form-inline {
    display: inline-block;
    float: none;
    margin: 0 18px 0 0;
    text-align: initial;
}
.loging-wrap input,
.register-wrap input {
    background: #f5f5f5;
    border-color: #ebebeb;
    height: 50px;
}
.required {
    color: #d63138;
    margin-left: 2px;
}
.lost-pass {
    display: inline-block;
    float: none;
    margin: 0;
    vertical-align: middle;
}
.lost-pass > a {
    color: #f44336;
    text-transform: capitalize;
    text-decoration: underline;
}
.loging-wrap .inline {
    display: inline-block;
    float: none;
    line-height: 1;
    margin-left: 15px;
    margin-top: 10px;
    vertical-align: middle;
}
.loging-wrap .inline input {
    height: auto;
    margin: 0 6px;
    vertical-align: middle;
    width: auto;
}
.loging-wrap .custom-btn,
.register-wrap .custom-btn {
    padding: 10px 40px;
}
.register-wrap {
    position: relative;
    z-index: 1;
}
.register-wrap::after {
    background: #cccccc none repeat scroll 0 0;
    content: "";
    height: 85%;
    position: absolute;
    right: -25%;
    top: 35px;
    width: 1px;
}
/* ====================================
22. CART PAGE CSS
======================================*/

.cart-header {
    background: #ebebeb;
    text-align: center;
    margin-bottom: 30px;
}
.p-title {
    display: block;
    padding: 10px 0;
    text-transform: uppercase;
    color: #1b222a;
}
.single-cart {
    background: #f5f5f5;
    margin-bottom: 15px;
    padding: 10px;
}
.cart-prev img {
    height: 107px;
    width: 175px;
}
.product-heading {
    padding: 25px 0 25px;
}
.product-heading > p {
    font-weight: 700;
    margin-bottom: 2px;
}
.product-rating {
    font-size: 14px;
}
.product-rating i {
    color: #ffb400;
}
.product-quantity {
    padding-top: 35px;
}
.s-cart-price {
    padding-top: 45px;
    display: block;
    position: relative;
}
.qty-changer {
    background: #fff none repeat scroll 0 0;
    border: 1px solid #ebebeb;
    cursor: pointer;
    display: inline-block;
    font-weight: 700;
    padding: 7px 17px;
    text-align: center;
}
.qty-input {
    background-color: #fff;
    border: 1px solid #ebebeb;
    display: inline-block;
    font-weight: 700;
    height: 40px;
    line-height: 40px;
    text-align: center;
    width: 50px;
}
.cart-remove {
    font-weight: 700;
    position: absolute;
    right: 0;
    cursor: pointer;
    top: 70%;
}

/* ==================================================
PRODUCT COUPON
=====================================================*/

.product-coupon {
    padding: 45px 0 0px;
}
.pc-box {
    position: relative;
    display: table;
    text-align: center;
}
.offer-coupon,
.update-coupon,
.cart-total {
    display: table-cell;
    vertical-align: middle;
    height: 365px;
    background: #f5f5f5;
    padding: 0 40px;
    border: 1px solid #ebebeb;
}
.update-coupon .custom-btn {
    padding: 10px 15px;
}
.offer-coupon {
    text-align: left;
}
.offer-coupon h4 {
    border-bottom: 1px solid #e1e1e1;
    color: #121212;
    display: inline;
    text-transform: uppercase;
    padding-bottom: 10px;
}
.offer-coupon > p {
    color: #5c5c5c;
    margin: 20px 0 25px;
}
.coupon-form {
    position: relative;
}
.coupon-form > input {
    background: #ebebeb none repeat scroll 0 0;
    border: 0 none;
    height: 50px;
    color: #999999;
    font-size: 14px;
    border-radius: 0px;
}
.coupon-form .custom-btn {
    -webkit-box-shadow: none;
    box-shadow: none;
    padding: 13px 15px;
    position: absolute;
    right: 0;
}
.cart-total > h3,
.cart-total strong {
    color: #1b222a;
    font-size: 18px;
    text-transform: uppercase;
}
.cart-total {
    text-align: left;
}
.cart-list {
    border-bottom: 1px solid #949494;
    border-top: 1px solid #949494;
    list-style: outside none none;
    padding: 13px 0;
}
.cart-list > li {
    color: #d63138;
    line-height: 35px;
    text-transform: uppercase;
    font-size: 14px;
}
.cart-list span,
.cart-total span {
    float: right;
}
.cart-total .custom-btn {
    margin-top: 55px;
    padding: 15px 22px;
}
/* =================================
23. CHECK OUT PAGE CSS
====================================*/

.payment-method {
    background: #f5f5f5 none repeat scroll 0 0;
    padding: 30px 40px;
    border: 1px solid #ebebeb;
}
.checkout-area .check-title {
    font-size: 28px;
    color: #353535;
    text-transform: capitalize;
    padding-bottom: 15px;
    
    margin: 0;
}
.billing-details .check-title {
    margin-bottom: 40px;
}
.billing-details label input {
    float: left;
    
    width: auto;
}
.cart-total.pay-cart {
    background: transparent none repeat scroll 0 0;
    border: 0 none;
    display: block;
    height: auto;
    padding: 30px 30px 10px 0;
}
.checkout-area .form-group input,.checkout-area .form-group select {
    font-size: 14px;
	
    
}
.checkout-area .form-group {
   /* margin-bottom: 0px;*/
}
.check-order span {
    float: right;
    color: #666666;
}
.check-order li {
    line-height: 42px;
    font-weight: 500;
    color: #353535
}
.payment-checkbox > input {
    height: auto;
    margin-right: 5px;
    width: auto;
    margin-bottom: 30px;
    color: #353535
}
.checkbox .custom-btn {
    padding: 12px 37px;
}






.loader {
    position: fixed;
    left: 0px;
    top: 0px;
    width: 100%;
    height: 100%;
    z-index: 9999;
    background: url('<?php echo $url;?>/local/images/media/<?php echo $setts[0]->site_loading_url;?>') 50% 50% no-repeat rgb(249,249,249);
    opacity: 1;
	
	
}


.embed-container {
  position: relative;
  padding-bottom: 56.25%;
  overflow: hidden;
}
		
.embed-container iframe,
.embed-container object,
.embed-container embed {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
}
.height5
{
height:5px !important;
}

.height10
{
height:10px !important;
}
.height20
{
height:20px !important;
}
.height30
{
height:30px !important;
}
.height40
{
height:40px !important;
}
.height50
{
height:50px !important;
}

.height100
{
height:100px !important;
}

.clearfix
{
clear:both !important;

}
.paddingoff
{
padding:0px !important;
}
.radiusoff
{
border-radius:0 !important;
}

/*************** PAGINATION *************/

.pagess {
	clear: both;
	float:right;
	
	display: inline;
}

.pagess ul {
	float: left;
}

.pagess ul li {
	float: left;
	display: inline;
	margin-right: 3px;
	text-transform:uppercase;
}

.pagess ul li a {
	padding: 3px 9px 2px;
	background:#22313F !important;
	color: #fff;
}

.pagess ul li.on a {
	background: #FB5353 !important;
	color: #fff;
}

.pagess ul li span span {
	color: #fff;
	padding: 3px 9px 2px;
	background: #454545;
}


/**************** END PAGINATION ***************/







/*************** MP3 PLAYER ****************/

.mediPlayer .control {
    opacity        : 0; 
    pointer-events : none;
    cursor         : pointer;
}

.mediPlayer .not-started .play, .mediPlayer .paused .play {
    opacity : 1;

}

.mediPlayer .playing .pause {
    opacity : 1;

}

.mediPlayer .playing .play {
    opacity : 0;
}

.mediPlayer .ended .stop {
    opacity        : 1;
    pointer-events : none;
}

.mediPlayer .precache-bar .done {
    opacity : 0;
}

.mediPlayer .not-started .progress-bar, .mediPlayer .ended .progress-bar {
    display : none;
}

.mediPlayer .ended .progress-track {
    stroke-opacity : 1;
}

.mediPlayer .progress-bar,
.mediPlayer .precache-bar {
    transition        : stroke-dashoffset 500ms;

    stroke-dasharray  : 298.1371428256714;
    stroke-dashoffset : 298.1371428256714;
}



/******************** END MP3 PLAYER ***************/



.login_btn
{
background:<?php echo $setts[0]->site_secondary_color;?>;
padding:15px 20px 15px 20px;
color:#fff !important;
text-transform:capitalize !important;
}



.dropdown:hover .dropdown-menu {
    display: block;
    margin-top: 0; 
	-webkit-transition: all 0.4s ease 0s;
    transition: all 0.4s ease 0s;
 }
 
 
.panel.panel-default
{
border:1px solid #DDDDDD;
border-radius:0px;
} 
 
.fleft
{
display:inline-block;

}
.loginform input[type="submit"]
{
max-width:120px;
}

.logformer ul li
{
display:inline !important;
list-style:none !important;
}

.loginleft
{
float:left;
margin-top:5px;
}
.loginright
{
float:right;
}

.bold
{
font-weight:bold !important;
}
#item_category
{
min-height:150px;
}
 
.vmiddle
{
vertical-align:middle !important;
}

.black
{
color:#000000 !important;
} 

.close
{
opacity:1 !important;
}
.close:focus
{
outline:none !important;
}


/******* PRICE RANGER ******/


.ui-state-default,
.ui-widget-content .ui-state-default,
.ui-widget-header .ui-state-default {
	border: 1px solid <?php echo $setts[0]->site_button_color;?>;
	background: <?php echo $setts[0]->site_button_color;?>;
	font-weight: bold;
	color: #333333;
}
.ui-state-default a,
.ui-state-default a:link,
.ui-state-default a:visited {
	color: #333333;
	text-decoration: none;
}
.ui-state-hover,
.ui-widget-content .ui-state-hover,
.ui-widget-header .ui-state-hover,
.ui-state-focus,
.ui-widget-content .ui-state-focus,
.ui-widget-header .ui-state-focus {
	border: 1px solid <?php echo $setts[0]->site_button_color;?>;
	background: <?php echo $setts[0]->site_button_color;?>;
	font-weight: bold;
	color: #212121;
}
.ui-state-default:focus, .ui-widget-content .ui-state-default:focus, .ui-widget-header .ui-state-default:focus
{
outline:none !important;
}



/********** PRICE RANGER ***********/



.overflow
{
max-height:200px;
overflow-y:scroll;
padding:10px;
}

.item-search input[type="text"],.jplist-panel input[type="text"]
{
width:100%;
}
.overflow input[type="checkbox"]
{
clear:both;
margin-bottom:10px;
}
.left10
{
margin-left:10px;
}


.nodata
{
font-size:25px;
text-align:center;
color:#000000;
margin-top:50px;

}

.dotted
{
text-overflow: ellipsis;
  overflow: hidden; 
  
  white-space: nowrap;
}


.red
{
color:#FF0000;
}


.payment_type
{
max-width:500px;
}

.disable_button {
   pointer-events: none;
   cursor: default;
}
.disabletxt
{
color:#FF0000;
}

.customwidth
{
max-width:100px;
}

.rateitem input,.tagclouds input
{
width:auto !important;
}


.review-icon span i,.review-icon .my_yellow {
    color: #FDD922;
    display: inline-block;
}

.review-icon i {
    font-size: 17px;
    color: #BEBEC0;
    display: inline-block !important;
}

.alink
{
font-size:20px !important;
font-weight:bold;
color:<?php echo $setts[0]->site_button_color;?> !important;
}

.star_text_hide
{
display:none;
}




/*************Pagination *************/


.turn-page {
  float: right;
  margin-top: 20px;
  font-size: 14px;
  color: #404040;
  padding-bottom: 20px;
}

.turn-page .turn-num {
  float: left;
  color: #8c8c8c;
  margin-top: 4px;
  line-height: 20px;
  display:none;
}

.turn-page .turn-ul {
  float: left;
  
}

.turn-page .turn-ul li {
  list-style: none;
  float: left;
  width: 35px;
  height: 33px;
  line-height: 33px;
  text-align: center;
  border: 1px solid #e6eaeb;
  margin-left: -1px;
  cursor: pointer;
  background:#fff;
}

.turn-page .turn-ul i {
  font-style: normal;
  display: inline-block;
  float: left;
  width: 25px;
}

.turn-page .turn-ul li.tz {
  color: #333;
  font-family: simsun;
}

.turn-page .turn-ul li:hover, .turn-page .turn-ul li:active {
  background: <?php echo $setts[0]->site_button_color;?>;
  color: #fff;
}

.turn-page .turn-ul li.on {
  background: <?php echo $setts[0]->site_button_color;?>;
  color: #fff;
}

.turn-page .turn-ul li.inp {
  width: 36px;
  margin: 0 10px 0 20px;
}

.turn-page .turn-ul li.slh {
  border: none;
  font-size: 16px;
  margin-top: -3px;
}

.turn-page .turn-ul li.slh:active { background: none; }

.turn-page .turn-ul li.inp:active { background: none; }

.turn-page .turn-ul .li-inp {
  width: 36px;
  height: 24px;
  outline: none;
  border: none;
  text-align: center;
}

.rating_move
{
margin-left:30px;
}




/*************Pagination *************/


.order_details .info-title span
{
font-weight:bold;
}

.custom_float
{
float:left;
margin:0 10px 10px;
}

.jplist-panel button.jplist-selected
{
color:#fff !important;
background:<?php echo $setts[0]->site_primary_color;?> !important;
outline:none;
}


.latest_item
{

background: <?php echo $setts[0]->site_button_color;?> none repeat scroll 0 0;
    border-radius: 4px;
    color: #fff;
    
    font-weight: 500;
    font-size: 14px;
    border: 0 none;
    padding: 7px 15px 7px 15px;
	margin-bottom:10px;
    outline:none;


}
.latest_item_grid
{
margin-bottom:30px !important;
text-align:center;
margin-right:30px;
}


/* feedback */


/* carousel */
#quote-carousel 
{
  padding: 0 10px 30px 10px;
  margin-top: 30px 0px 0px;
}

/* Control buttons  */
#quote-carousel .carousel-control
{
  background: none;
  color: #222;
  font-size: 2.3em;
  text-shadow: none;
  margin-top: 80px;
}
/* Previous button  */
#quote-carousel .carousel-control.left 
{
  left: -12px;
}
/* Next button  */
#quote-carousel .carousel-control.right 
{
  right: -12px !important;
}
/* Changes the position of the indicators */
#quote-carousel .carousel-indicators 
{
  right: 50%;
  top: auto;
  bottom: 0px;
  margin-right: -19px;
}
/* Changes the color of the indicators */
#quote-carousel .carousel-indicators li 
{
  background: #c0c0c0;
}
#quote-carousel .carousel-indicators .active 
{
  background: #333333;
}
#quote-carousel img
{
  width: 250px;
  height: 100px
}
/* End carousel */

.item blockquote {
    border-left: none; 
    margin: 0;
}

.item blockquote img {
    margin-bottom: 10px;
}

.item blockquote p:before {
    content: "\f10d";
    font-family: 'Fontawesome';
    float: left;
    margin-right: 10px;
}



/**
  MEDIA QUERIES
*/

/* Small devices (tablets, 768px and up) */
@media (min-width: 768px) { 
    #quote-carousel 
    {
      margin-bottom: 0;
      padding: 0 100px 30px 100px;
      margin-top: 30px;
    }
	
	
    
}

/* Small devices (tablets, up to 768px) */
@media (max-width: 768px) { 
    
    /* Make the indicators larger for easier clicking with fingers/thumb on mobile */
    
    #quote-carousel .carousel-indicators {
        bottom: -20px !important;  
    }
    #quote-carousel .carousel-indicators li {
        display: inline-block;
        margin: 0px 5px;
        width: 15px;
        height: 15px;
    }
    #quote-carousel .carousel-indicators li.active {
        margin: 0px 5px;
        width: 20px;
        height: 20px;
    }
}


@media (min-width:1024px) 
{
.hidedesk
	{
	display:none;
	}
.my-md-4
{
width:30.3% !important;
}

}
/* feedback */

.feedback_user,.social a:hover
{
color:<?php echo $setts[0]->site_button_color;?>;
}

.promo-area
{
background:#F5F5F5;
}
.social a
{
color:#ffffff;
font-size:20px;
margin-left:5px;
margin-right:5px;
}

.custom_alert
{
margin-bottom:0px !important;
padding:10px !important;
font-size:14px;
}
.text_transform
{
text-transform:capitalize;
}
.support_message
{
min-height:150px;
}

.marginbottom_off
{
margin-bottom:0px !important;
}

.customizer
{

    float: left;
    width: 100%;
    height: 400px;
    object-fit: cover;

}

.comment_linkoff
{

float:right;
pointer-events: none;
  cursor: default;
  text-decoration: none;

}
.round_img
{
border-radius:50px;
}

/* blog */

.blog-grids {
    overflow: hidden;
    margin: 0 -15px;
}

.blog-grids .grid {
    background-color: #fff;
    
   
    padding: 15px;
    margin: 20px 15px 15px;
    border-radius: 10px;
    -webkit-box-shadow: 0 0 30px rgba(0, 0, 0, 0.1);
    box-shadow: 0 0 30px rgba(0, 0, 0, 0.1);
}

.entry-media img {
    border-radius: 10px;
    width: 100%;
    max-height: 188px;
}

.entry-body {
    padding: 27px 10px;
}

.entry-body .cat {
    font-family: "Poppins", sans-serif;
    font-size: 12px;
    font-weight: 600;
    color: #6220d9;
    text-transform: uppercase;
}

.entry-body h3 {
    font-size: 21px;
    font-weight: 600;
    line-height: 1.30em;
    margin: 3px 0 0.73em;
	 white-space: nowrap; 
    overflow: hidden;
    text-overflow: ellipsis;
}

.entry-body h3 a {
    color: #000000;
}

.entry-body h3 a:hover {
    color: <?php echo $setts[0]->site_button_color;?>;
    text-decoration: none;
}

.entry-body p {
    margin-bottom: 2em;
    color: #90949a;
    line-height: 1.8em;
}

.read-more-date {
    position: relative;
}

.read-more-date a {
    font-family: "Poppins", sans-serif;
    font-size: 16px;
    
    font-weight: 600;
    color: #000000;
    text-transform: uppercase;
}
.read-more-date a:hover
{
color:<?php echo $setts[0]->site_button_color;?>;
}


.read-more-date .date {
    position: absolute;
    right: 0;
    color: #90949a;
}

.bloglineheight
{
line-height:45px;
}
.blogsidebar
{
text-transform:uppercase;
font-size:22px;
}
.btitles
{
color:#000000;
margin-bottom:5px !important;
line-height:0px !important;
}
.btitles:hover
{
color:<?php echo $setts[0]->site_button_color;?>;
}

.blogerdate
{
color:<?php echo $setts[0]->site_button_color;?>;
}
.cat-pan
{
float:right;
}
.float-left
{
float:left;
}
.float-right
{
float:right;
}

.mp3_boxer
{
border:3px solid #EFF2F8;
border-radius:6px;
}

.share-links li
{
list-style:none;
display:inline-block;
margin-left:5px;
margin-right:5px;

}
.gcolorbg
{
background:<?php echo $setts[0]->site_button_color;?>;

color:#FFFFFF;
font-size:12px;
padding:5px;
border-radius:6px;
}
.gcolorbg:hover,.gcolorbg:focus
{
color:#FFFFFF;
}

.blacker
{
color:#000000;
}
.blacker:hover
{
color:<?php echo $setts[0]->site_button_color;?>;
}

/* blog */
.heart_icon
{
font-size:36px;
color:<?php echo $setts[0]->site_button_color;?>;
margin-top:5px;
}

.wallet_border {
    border: 1px solid #DDDDDD;
    min-height: 200px;
    vertical-align: middle;
}

.review_bottom {
    vertical-align: middle;
    margin-top: 70px;
    margin-bottom: 70px;
}
.review_bottom_two {
    vertical-align: middle;
    margin-top: 70px;
    margin-bottom: 70px;
}
.min_with {
    font-size: 25px;
}

.custombtn_width
{
max-width:100px;
}

.orange
{
color:#FF3300;
}
.green
{
color:#009900;
}

.contact-form .form-group
{
margin-left:-10px !important;
}
.authorbg
{
background:#999999;
color:#FFFFFF;
font-size:10px;
padding:4px;
border-radius:4px;
text-transform:uppercase;
}
.purchasebg
{
background:#000000;
color:#FFFFFF;
font-size:10px;
padding:4px;
border-radius:4px;
text-transform:uppercase;
}

.expiredbg
{
background:#F07E66;
color:#FFFFFF;
font-size:10px;
padding:4px;
border-radius:4px;
text-transform:uppercase;
margin-left:3px;
}
.itemauthor
{
max-width:80px; border-radius:50px;
}
.newbann
{
max-width:90px;
}



.fb-profile img.fb-image-lg{
    z-index: 0;
    width: 100%;  
    margin-bottom: 10px;
}

.fb-image-profile
{
    margin: -90px 10px 0px 50px;
    z-index: 9;
    width: 13%; 
}

@media (max-width:768px)
{
    
.fb-profile-text>h3{
    font-weight: 500;
    font-size:22px;
	margin-top:30px;
	text-transform:capitalize;
	padding-top:30px;
}

.fb-image-profile
{
    margin: -45px 10px 0px 25px;
    z-index: 9;
    width: 13%; 
}
}



/* Tabs panel */
.tabbable-panel {
  border:1px solid #eee;
  padding: 10px;
}

/* Default mode */
.tabbable-line > .nav-tabs {
  border: none;
  margin: 0px;
}
.tabbable-line > .nav-tabs > li {
  margin-right: 2px;
}
.tabbable-line > .nav-tabs > li > a {
  border: 0;
  margin-right: 0;
  color: #737373;
}
.tabbable-line > .nav-tabs > li > a > i {
  color: #a6a6a6;
}
.tabbable-line > .nav-tabs > li.open, .tabbable-line > .nav-tabs > li:hover {
  border-bottom: 4px solid <?php echo $setts[0]->site_button_color;?>;
}
.tabbable-line > .nav-tabs > li.open > a, .tabbable-line > .nav-tabs > li:hover > a {
  border: 0;
  background: none !important;
  color: #333333;
}
.tabbable-line > .nav-tabs > li.open > a > i, .tabbable-line > .nav-tabs > li:hover > a > i {
  color: #a6a6a6;
}
.tabbable-line > .nav-tabs > li.open .dropdown-menu, .tabbable-line > .nav-tabs > li:hover .dropdown-menu {
  margin-top: 0px;
}
.tabbable-line > .nav-tabs > li.active {
  border-bottom: 4px solid #f3565d;
  position: relative;
}
.tabbable-line > .nav-tabs > li.active > a {
  border: 0;
  color: #333333;
}
.tabbable-line > .nav-tabs > li.active > a > i {
  color: #404040;
}
.tabbable-line > .tab-content {
  margin-top: -3px;
  background-color: #fff;
  border: 0;
  border-top: 1px solid #eee;
  padding: 15px 0;
}
.portlet .tabbable-line > .tab-content {
  padding-bottom: 0;
}

/* Below tabs mode */

.tabbable-line.tabs-below > .nav-tabs > li {
  border-top: 4px solid transparent;
}
.tabbable-line.tabs-below > .nav-tabs > li > a {
  margin-top: 0;
}
.tabbable-line.tabs-below > .nav-tabs > li:hover {
  border-bottom: 0;
  border-top: 4px solid <?php echo $setts[0]->site_button_color;?>;
}
.tabbable-line.tabs-below > .nav-tabs > li.active {
  margin-bottom: -2px;
  border-bottom: 0;
  border-top: 4px solid #f3565d;
}
.tabbable-line.tabs-below > .tab-content {
  margin-top: -10px;
  border-top: 0;
  border-bottom: 1px solid #eee;
  padding-bottom: 15px;
}



aside.sidebar .single {
padding: 30px 15px;
margin-top: 40px;
background: #fcfcfc;
border: 1px solid #f0f0f0; }
aside.sidebar .single h3.side-title {
margin: 0;
margin-bottom: 10px;
padding: 0;
font-size: 20px;
color: #333;
text-transform: uppercase; }
aside.sidebar .single h3.side-title:after {
content: '';
width: 60px;
height: 1px;
background: <?php echo $setts[0]->site_button_color;?>;
display: block;
margin-top: 6px; }
.single.contact-info {
background: none;
border: none;

 }
 .single.contact-info li .info p
 {
 margin-top:10px;
 }
.single.contact-info li {
margin-top: 30px; }
.single.contact-info li .icon {
display: block;
float: left;
margin-right: 10px;
width: 50px;
height: 50px;
border-radius: 50%;
border: 1px solid #f0f0f0;
color: <?php echo $setts[0]->site_button_color;?>;
text-align: center;
line-height: 50px; }
.single.contact-info li .info {
overflow: hidden; }

.item-demo img .roundshape
{
border-radius:50px !important;
width:30px !important;
}
.auth_texter
{
color: <?php echo $setts[0]->site_button_color;?> !important;
}
.mobilelogo
{
max-width:150px !important;

}

.aboutDescription,.nicEdit-main 
{
resize: none !important;
overflow-y: scroll !important;
max-height:200px !important; 
}

.feature_item .item img
{
width:110px !important;
height:110px !important;
}

.owl-pagination
{
margin-top:40px;
}

.item-information
{
padding:20px;
}



.ribbon {
  position: absolute;
  left: 10px; top: -5px;
  z-index: 1;
  overflow: hidden;
  width: 75px; height: 75px;
  text-align: right;
}
.ribbon span {
  font-size: 10px;
  font-weight: bold;
  color: #FFF;
  text-transform: uppercase;
  text-align: center;
  line-height: 20px;
  transform: rotate(-45deg);
  -webkit-transform: rotate(-45deg);
  width: 100px;
  display: block;
  background: #79A70A;
  background: linear-gradient(#F70505 0%, #C61E1E 100%);
  box-shadow: 0 3px 10px -5px rgba(0, 0, 0, 1);
  position: absolute;
  top: 19px; left: -21px;
}
.ribbon span::before {
  content: "";
  position: absolute; left: 0px; top: 100%;
  z-index: -1;
  border-left: 3px solid #C61E1E;
  border-right: 3px solid transparent;
  border-bottom: 3px solid transparent;
  border-top: 3px solid #C61E1E;
}
.ribbon span::after {
  content: "";
  position: absolute; right: 0px; top: 100%;
  z-index: -1;
  border-left: 3px solid transparent;
  border-right: 3px solid #C61E1E;
  border-bottom: 3px solid transparent;
  border-top: 3px solid #C61E1E;
}







.ribbon_new {
  position: absolute;
  left: 3px; top: -5px;
  z-index: 1;
  overflow: hidden;
  width: 75px; height: 75px;
  text-align: right;
}
.ribbon_new span {
  font-size: 10px;
  font-weight: bold;
  color: #FFF;
  text-transform: uppercase;
  text-align: center;
  line-height: 20px;
  transform: rotate(-45deg);
  -webkit-transform: rotate(-45deg);
  width: 100px;
  display: block;
  background: #79A70A;
  background: linear-gradient(#F70505 0%, #C61E1E 100%);
  box-shadow: 0 3px 10px -5px rgba(0, 0, 0, 1);
  position: absolute;
  top: 19px; left: -21px;
}
.ribbon_new span::before {
  content: "";
  position: absolute; left: 0px; top: 100%;
  z-index: -1;
  border-left: 3px solid #C61E1E;
  border-right: 3px solid transparent;
  border-bottom: 3px solid transparent;
  border-top: 3px solid #C61E1E;
}
.ribbon_new span::after {
  content: "";
  position: absolute; right: 0px; top: 100%;
  z-index: -1;
  border-left: 3px solid transparent;
  border-right: 3px solid #C61E1E;
  border-bottom: 3px solid transparent;
  border-top: 3px solid #C61E1E;
}

.full_line
{
border-bottom:1px solid #E6E6E6;
width:100%;
}


/* preview */


.full-screen-preview {
    height: 100%;
    padding: 0px;
    margin: 0px;
    overflow: hidden;
}


.preview__header {
    font-size: 12px;
    height: 54px;
    background-color: #262626;
    z-index: 100;
    line-height: 54px;
    margin-bottom: 1px;
}

.preview__avigher-logo {
    float: left;
    padding: 0 20px;
}

.preview__actions {
    float: right;
}

.preview__action--buy, .preview__action--close {
    display: inline-block;
    padding: 0 20px;
}

.preview__action--close {
    border-left: 1px solid #333333;
}

.preview__action--close a {
    color: #999999;
    text-decoration: none;
}

.e-btn--3d.-color-primary {
    -webkit-box-shadow: 0 2px 0 #6f9a37;
    box-shadow: 0 2px 0 #6f9a37;
    position: relative;
}
.e-btn.-color-primary, .-color-primary.e-btn--3d, .-color-primary.e-btn--outline {
    background-color: #82b440;
}
.e-btn--3d {
    -webkit-box-shadow: 0 2px 0 #545454;
    box-shadow: 0 2px 0 #545454;
    position: relative;
}
.e-btn--3d:hover,.e-btn--3d:focus
{
color:#FFFFFF;
}


.e-btn.-size-s, .-size-s.e-btn--3d, .-size-s.e-btn--outline, .e-btn, .e-btn--3d, .e-btn--outline {
    font-size: 14px;
    padding: 5px 20px;
    line-height: 1.5;
}
.e-btn.-color-default, .-color-default.e-btn--3d, .-color-default.e-btn--outline, .e-btn, .e-btn--3d, .e-btn--outline {
    background-color: gray;
    color: white;
}
.e-btn, .e-btn--3d, .e-btn--outline {
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
    -webkit-box-sizing: border-box;
    box-sizing: border-box;
    display: inline-block;
    margin: 0;
    border: none;
    border-radius: 4px;
    font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
    text-align: center;
    text-decoration: none;
    cursor: pointer;
}




.full-screen-preview{height:100%;padding:0px;margin:0px;overflow:hidden}.full-screen-preview__frame{width:100%; height:92%;background-color:white}.full-screen-preview__frame.-ios-fix{width:10px;min-width:100%;-webkit-overflow-scrolling:touch;height:100% !important}.preview__header{font-size:12px;height:54px;background-color:#262626;z-index:100;line-height:54px;margin-bottom:1px}.preview__avigher-logo{float:left;padding:0 20px}.preview__avigher-logo a{display:inline-block;position:absolute;top:5px;text-indent:-9999px;width:180px; background-repeat:no-repeat;background:url(<?php echo $url;?>/local/images/media/<?php echo $setts[0]->site_logo;?>);}@media (max-width: 568px){.preview__avigher-logo{padding:0 10px}.preview__avigher-logo a{position:absolute;top:20px;left:15px;height:14px;width:118px;background-size:118px 14px}}.preview__actions{float:right}.preview__action--buy,.preview__action--close{display:inline-block;padding:0 20px}@media (max-width: 568px){.preview__action--buy{padding:0 10px}}.preview__action--purchase-form{display:inline-block}.preview__action--item-details{display:inline-block}.preview__action--close{border-left:1px solid #333333}.preview__action--close a{color:#999999;text-decoration:none}.preview__action--close a:hover{color:white}.preview__action--close a i{color:white;font-size:10px;margin-right:10px}@media (max-width: 568px){.preview__action--close a i{margin-right:0}}@media (max-width: 568px){.preview__action--close a span{display:none}}.screenshots{padding:80px 10px 25px}.screenshots__thumbnail{display:inline-block;margin:0 10px 20px 0;border:1px solid #333333;line-height:0}.screenshots__thumbnail:hover{border:1px solid #666666}.screenshots__fullsize{display:inline-block;margin:20px 0;border:1px solid #333333;line-height:0}.screenshots__fullsize>img{max-width:100%}.screenshots__description{max-width:1024px;margin-top:20px;color:white}

/* preview */


.profile_headers
{
margin:0 0 5px;
}

.display_no_icon
{
list-style:none;
text-align:left !important;


}

div.cazary
{
width:100% !important;
}

.flag img
{
max-width:30px;
height: 30px;
    object-fit: cover;
	border-radius:50px;
	margin-bottom:5px;
}

.gainer
{
max-width:28px !important;
height: 28px !important;
    object-fit: cover;
	border-radius:50px;
}
.elite_cls
{
max-width:30px;
height: 30px;
object-fit: cover; 
border-radius:50px;   
}
.mz_size
{
max-width:200px;
margin-right:20px;
float:left;

}

	</style>    
        
