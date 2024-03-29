<!DOCTYPE html>
<html lang="en">
  <head>
   
   @include('admin.title')
    
    @include('admin.style')
    
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            @include('admin.sitename');

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            @include('admin.welcomeuser')
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            @include('admin.menu')
			
			
			
			
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
       @include('admin.top')
		
		<?php $url = URL::to("/"); ?>
		
		
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <!-- top tiles -->
         
		 
		 
		 
		 
		 
		 <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Category</h2>
                    
                    <div class="clearfix"></div>
					
                  </div>
                  
                  
                  <form action="{{ route('admin.category') }}" method="post">
                 
                 {{ csrf_field() }}
				  <div align="right">
                  
                  <?php if(config('global.demosite')=="yes"){?>
					
				   <a href="#" class="btn btn-danger btndisable">Delete All</a>  <span class="disabletxt">( <?php echo config('global.demotxt');?> )</span>
				  <?php } else { ?>
				   <input type="submit" value="Delete All" class="btn btn-danger" id="checkBtn" onClick="return confirm('Are you sure you want to delete?');">
				  <?php } ?>
                  
                  
				  <?php if(config('global.demosite')=="yes"){?>
				  <span class="disabletxt">( <?php echo config('global.demotxt');?> )</span> <a href="#" class="btn btn-primary btndisable">Add Category</a> 
				  <?php } else { ?>
				  <a href="<?php echo $url;?>/admin/addcategory" class="btn btn-primary">Add Category</a>
				  <?php } ?>
                  <div class="x_content">
                   
					
                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                        
                         <th width="10%">
          <button type="button" id="selectAll" class="main">
          <span class="sub"></span> Select All </button></th>
                        
                          <th>Sno</th>
						  <!--<th>Image</th>-->
                          <th>Title</th>
                          <th>Action</th>
                          
                        </tr>
                      </thead>
                      <tbody>
             <?php 
					  $i=1;
					  foreach ($category as $service) { ?>
                      
                      
                        <tr class="gradeX">
                        <td align="center"><input type="checkbox" name="cat_id[]" value="<?php echo $service->id;?>"/></td>
                        
						 <td><?php echo $i;?></td>
						 <?php /*?><?php 
					   $servicephoto="/media/";
						$path ='/local/images'.$servicephoto.$service->image;
						if($service->image!=""){
						?>
						 <td><img src="<?php echo $url.$path;?>" class="thumb" width="70"></td>
						 <?php } else { ?>
						  <td><img src="<?php echo $url.'/local/images/noimage.jpg';?>" class="thumb" width="70"></td>
						 <?php } ?><?php */?>
                          <td><?php echo $service->cat_name;?></td>
                          
						  
						  <td>
						   <?php if(config('global.demosite')=="yes"){?>
						  <a href="#" class="btn btn-success btndisable">Edit</a>  <span class="disabletxt">( <?php echo config('global.demotxt');?> )</span>
				  <?php } else { ?>
						  <a href="<?php echo $url;?>/admin/editcategory/{{ $service->id }}" class="btn btn-success">Edit</a>
						  <?php } ?>
				   <?php if(config('global.demosite')=="yes"){?>
				   <a href="#" class="btn btn-danger btndisable">Delete</a>  <span class="disabletxt">( <?php echo config('global.demotxt');?> )</span>
				  <?php } else { ?>
						 <a href="<?php echo $url;?>/admin/category/{{ $service->id }}" class="btn btn-danger" onClick="return confirm('Are you sure you want to delete this?')">Delete</a>
						 
					 <?php } ?>
						 </td>
                        </tr>
                        
                    
                <?php $i++;} ?>
                                
              </tbody>
                    </table>
					
					
                  </div>
                </div>
                </form>
                
              </div>
			  
			  
			  
		 
		  
		  
		  
        </div>
        <!-- /page content -->

      @include('admin.footer')
      </div>
    </div>

    
	
  </body>
</html>
