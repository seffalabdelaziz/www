<?php
use Illuminate\Support\Facades\Route;
$currentPaths= Route::getFacadeRoot()->current()->uri();	
$url = URL::to("/");

/*$ncounts = DB::table('users')->get();
		foreach($ncounts as $well)
		{
			$we = $well->id;
			$ewe = $well->email;
			DB::update('update shop set user_id="'.$we.'" where seller_email = ?', [$ewe]);
		}*/
?>	
<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                
                <ul class="nav side-menu">
                  <li><a href="<?php echo $url;?>/admin"><i class="fa fa-laptop"></i> Dashboard </a></li>
				   
                   
                   <li><a><i class="fa fa-cog"></i> Settings <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo $url;?>/admin/settings">General Settings </a></li>
                      <li><a href="<?php echo $url;?>/admin/media-settings">Media Settings </a></li>
                       <li><a href="<?php echo $url;?>/admin/email-settings">Email Settings </a></li>
                       <li><a href="<?php echo $url;?>/admin/payment-settings">Payment Settings </a></li>
                       <li><a href="<?php echo $url;?>/admin/badges-settings">Badges Settings </a></li>
                       
                      <?php /*?><li><a href="<?php echo $url;?>/admin/color-settings">Font & Color Settings </a></li><?php */?>
                    </ul>
                  </li>
                  
                  <li><a href="<?php echo $url;?>/admin/currency"><i class="fa fa-sticky-note"></i> Currency </a></li>
                  
                  <li><a href="<?php echo $url;?>/admin/country"><i class="fa fa-sticky-note"></i> Country </a></li>
                   
				  <li><a href="<?php echo $url;?>/admin/users"><i class="fa fa-user"></i> Users </a></li>
				  
                 
                  
    
                  <li><a><i class="fa fa-cog"></i> Category <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo $url;?>/admin/category">Category </a></li>
                      <li><a href="<?php echo $url;?>/admin/subcategory">Sub Category </a></li>
                     
                    </ul>
                  </li>
                  
                  
                  <li><a><i class="fa fa-cog"></i> Framework Category <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo $url;?>/admin/framework_category">Category </a></li>
                      <li><a href="<?php echo $url;?>/admin/framework_subcategory">Sub Category </a></li>
                     
                    </ul>
                  </li>
                  
                  
                  
                  <li><a><i class="fa fa-shopping-cart"></i> Items <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?php echo $url;?>/admin/products">Items </a></li>
                      <li><a href="<?php echo $url;?>/admin/orders"> Order Details </a></li>
                     <li><a href="<?php echo $url;?>/admin/refund"> Dispute Refund </a></li>
                     <li><a href="<?php echo $url;?>/admin/rating"> Ratings & Reviews </a></li>
                     <li><a href="<?php echo $url;?>/admin/report"> Report Items</a></li>
                    </ul>
                  </li>
                  
                  
                   <li><a href="<?php echo $url;?>/admin/withdraw"><i class="fa fa-sticky-note"></i> Withdraw </a></li>
                 
                  <li><a href="<?php echo $url;?>/admin/promo"><i class="fa fa-sticky-note"></i> Promo Box </a></li>
                  
				  
				  <li><a href="<?php echo $url;?>/admin/blog"><i class="fa fa-comments"></i> Blog </a></li>
                  
                  <li><a href="<?php echo $url;?>/admin/pages"><i class="fa fa-sticky-note"></i> Pages </a></li>
                  
                 
                   
                   
                  
                   <li><a href="<?php echo $url;?>/admin/newsletter"><i class="fa fa-user"></i> Newsletter </a></li>
                   
                  
                  
				   <li><a href="<?php echo $url;?>/admin/contact"><i class="fa fa-user"></i> Contact Us </a></li>
				   
                   
                     <li><a href="<?php echo $url;?>/admin/translate"><i class="fa fa-sticky-note"></i> Translate </a></li>    
				    
				   <li><a href="<?php echo $url;?>/admin/language"><i class="fa fa-sticky-note"></i> Language </a></li>
				  
				  
				  
                  
                </ul>
              </div>

            </div>
			
			
			