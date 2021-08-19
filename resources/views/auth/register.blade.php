@extends('layouts.master')

@section('content')

<section class="sec-padding">
    <div class="container">
     <div class="row">
     <div class="col-md-7 col-centered">
     <div class="text-box padding-3 border">
     
     <div class="smart-forms smart-container wrap-3">
        
        	<h3>Sign Up</h3>
            
             <div class="spacer-b30">
                <div class="tagline"><span>Sign up  With </span></div>
            </div>                 
        
            <div class="section">
                <a href="/login/facebook" class="button btn-social facebook span-left"> <span><i class="fa fa-facebook"></i></span> Facebook </a>
                {{--  <a href="" class="button btn-social twitter span-left">  <span><i class="fa fa-twitter"></i></span> Twitter </a>  --}}
                <a href="/login/google" class="button btn-social googleplus span-left"> <span><i class="fa fa-google-plus"></i></span> Google+ </a>
            </div> 
            <!-- end section -->

            <div class="spacer-t30 spacer-b30">
                <div class="tagline"><span>Or Sign up with Email </span></div><!-- .tagline -->
            </div>
            
            <form method="POST" action="{{ route('register') }}" id="account">
                @csrf

            	<div class="form-body">
            
                    <div class="section">
                        <label for="names" class="field-label">Your Name</label>
                        <label class="field prepend-icon">
                            <input id="name" type="text" class="gui-input @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                            <span class="field-icon"><i class="fa fa-user"></i></span>  
                        </label>
                        @error('name')
                            <span class="invalid-feedback" role="alert" style="color: red;">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div><!-- end section -->
                                                                   

                    <div class="section">
                    	<label for="email" class="field-label">Email address</label>
                    	<label class="field prepend-icon">
                            <input id="email" type="email" class="form-control gui-input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                            <span class="field-icon"><i class="fa fa-envelope"></i></span>  
                        </label>
                        
                        @error('email')
                        <span class="invalid-feedback" role="alert" style="color: red;">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div><!-- end section -->       

                	<div class="section">
                    	<label for="password" class="field-label">Create a password</label>
                    	<label class="field prepend-icon">
                            <input id="password" type="password" class="gui-input @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                            <span class="field-icon"><i class="fa fa-lock"></i></span>  
                        </label>
                        @error('password')
                            <span class="invalid-feedback" role="alert" style="color: red;">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div><!-- end section -->
                    
                	<div class="section">
                    	<label for="confirmPassword" class="field-label">Confirm your password</label>
                    	<label class="field prepend-icon">
                            <input id="password-confirm" type="password" id="confirmPassword" class="gui-input" name="password_confirmation" required autocomplete="new-password">

                            <span class="field-icon"><i class="fa fa-unlock-alt"></i></span>  
                        </label>
                    </div><!-- end section -->
                    
                            
                    
                    {{--  <div class="section">
                    	<label for="gender" class="field-label">Gender </label>
                        <label class="field select">
                            <select id="gender" name="gender">
                                <option value="">I am...</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                                <option value="other">Other</option>
                            </select>
                            <i class="arrow double"></i>                    
                        </label>  
                    </div><!-- end section -->
                    
                	             
                    
                	<div class="section">
                    	<label for="mobile" class="field-label">Mobile Number </label>
                    	<label class="field prepend-icon">
                        	<input type="tel" name="mobile" id="mobile" class="gui-input" placeholder="+256">
                            <span class="field-icon"><i class="fa fa-phone-square"></i></span>  
                        </label>
                    </div><!-- end section -->  --}}
                                                                          
                    
                	<div class="section">
                        <label class="option">
                            <input type="checkbox" name="check1">
                            <span class="checkbox"></span> 
                            Agree to our <a href="#" class="smart-link"> terms of service </a>                   
                        </label>
                    </div><!-- end section -->                                                                                
                    
                </div><!-- end .form-body section -->
                <div class="form-footer">
                	<button type="submit" class="button btn-primary darkBlue">Create Account</button>
                </div><!-- end .form-footer section -->
            </form>
            
        </div></div></div>
     
     </div>
     <!--end item-->
      
    </div>
  </section>
  <!--end item -->
  <div class="clearfix"></div>

@endsection
