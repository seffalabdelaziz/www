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
		
		
		
		
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <!-- top tiles -->
         
		 
		 
		 
		 
		 
		 <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  
                  <div class="x_content">
                  
 	@if(Session::has('success'))

	    <div class="alert alert-success">

	      {{ Session::get('success') }}

	    </div>

	@endif


	
	
 	@if(Session::has('error'))

	    <div class="alert alert-danger">

	      {{ Session::get('error') }}

	    </div>

	@endif
                 <?php $url = URL::to("/"); ?>   
                   <form class="form-horizontal form-label-left" role="form" method="POST" action="{{ route('admin.add-country') }}" enctype="multipart/form-data" novalidate>
                     {{ csrf_field() }}  
                      <span class="section">Add Country</span>

                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Country Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="country_name" class="form-control col-md-7 col-xs-12"  name="country_name" value="" required="required" type="text">
                         @if ($errors->has('country_name'))
                                    <span class="help-block" style="color:red;">
                                        <strong>{{ $errors->first('country_name') }}</strong>
                                    </span>
                                @endif
					   </div>
                      </div>
                      
                      
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="logo">Country Flag <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="file" id="country_badges" name="country_badges" class="form-control col-md-7 col-xs-12" required="required">
						  
                        </div>
                      </div>
                      
					 
					  
					  
                     
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          <a href="<?php echo $url;?>/admin/country" class="btn btn-primary">Cancel</a>
                          <button id="send" type="submit" class="btn btn-success">Submit</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
			  
		
		
		
		
		
		
		
		
		
		
		
		
		
		
        <!-- /page content -->

      @include('admin.footer')
      </div>
    </div>

    
	
  </body>
</html>
