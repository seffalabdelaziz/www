@extends('layouts.app')

@section('content')


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
function translate_header($id,$lang) 
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



<div class="promo-area" style="background-image: url(<?php echo $url;?>/local/images/media/<?php echo $setts[0]->site_banner;?>)">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="promo-text">
                        <h2 class="avigher-title bolder fontsize30"><?php echo translate_header( 928, $lang);?></h2>
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
                        <li class="breadcrumb-item"><a href="<?php echo $url;?>"><?php echo translate_header( 40, $lang);?></a>
                        </li>
                        <li class="breadcrumb-item active"><?php echo translate_header( 928, $lang);?></li>
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
    <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading"> <span class="loginleft">
               <?php echo translate_header( 928, $lang);?>	
                </span>
                
                
                <span class="loginright">
               <a class="btn btn-link fleft" href="{{ route('login') }}"><?php echo translate_header( 931, $lang);?></a>
                </span>
                
                <div class="clearfix"></div>
                </div>
                
                
                
                
				<div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}
<div class="clearfix height20"></div>
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label para black"><?php echo translate_header( 427, $lang);?></label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control radiusoff" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label para black"><?php echo translate_header( 430, $lang);?></label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control radiusoff" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label para black"><?php echo translate_header( 433, $lang);?></label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control radiusoff" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label para black"><?php echo translate_header( 934, $lang);?></label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control radiusoff" name="password_confirmation" required>
                            </div>
                        </div>
						
						
						
						 <div class="form-group {{ $errors->has('phone') ? ' has-error' : '' }}">
                            <label for="phoneno" class="col-md-4 control-label para black"><?php echo translate_header( 415, $lang);?></label>

                            <div class="col-md-6">
                                <input id="phone" type="text" class="form-control radiusoff" name="phone" required>
								@if ($errors->has('phone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
						
						
						
						<div class="form-group">
                            <label for="gender" class="col-md-4 control-label para black"><?php echo translate_header( 436, $lang);?></label>

                            <div class="col-md-6">
							<select name="gender" class="form-control radiusoff" required>
							  
							  <option value=""></option>
							   <option value="male"><?php echo translate_header( 937, $lang);?></option>
							   <option value="female"><?php echo translate_header( 940, $lang);?></option>
							</select>
                               
                            </div>
                        </div>
						
                        
                        <div class="form-group {{ $errors->has('g-recaptcha-response') ? ' has-error' : '' }}">
                            <label for="gender" class="col-md-4 control-label para black">Captcha</label>

                            <div class="col-md-6">
						{!! NoCaptcha::display() !!}
						@if ($errors->has('g-recaptcha-response'))
                            <span class="help-block">
                                <strong>The captcha field is required or invalid.</strong>
                            </span>
                        @endif
						 </div>
                        </div>
						
						
						<input type="hidden" name="usertype" value="0">
						
						

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="custom-btn">
                                    <?php echo translate_header( 943, $lang);?>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
				
				
				
				
				
            </div>
        </div>
        <div class="col-md-2"></div>
    </div>
</div>



</div>
</div>
<div class="clearfix"></div>
</main>

@include('footer')
@endsection
