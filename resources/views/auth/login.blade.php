@extends('layouts.master')

@section('content')


<section class="sec-padding">
    <div class="container">
     <div class="row">
     <div class="col-md-7 col-centered">
     <div class="text-box padding-4 border">
     <div class="smart-forms smart-container wrap-3">
        	<h4 class="uppercase">Sign in</h4>
            <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
            @csrf

            	<div>
                    <div class="spacer-b30">
                    	<div class="tagline"><span>Sign in  With </span></div><!-- .tagline -->
                    </div>                 
                
                	<div class="section">
                        <a href="/login/facebook" class="button btn-social facebook span-left"> <span><i class="fa fa-facebook"></i></span> Facebook </a>
                        {{--  <a href="" class="button btn-social twitter span-left">  <span><i class="fa fa-twitter"></i></span> Twitter </a>  --}}
                        <a href="/login/google" class="button btn-social googleplus span-left"> <span><i class="fa fa-google-plus"></i></span> Google+ </a>
                    </div> 
                    <!-- end section -->
                    
                    <div class="spacer-t30 spacer-b30">
                    	<div class="tagline"><span>Sign in with Email </span></div>
                    </div>
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="section">
                        <label class="field prepend-icon">
                            <input id="email" type="email" class="gui-input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            <span class="field-icon"><i class="fa fa-user"></i></span>  
                        </label>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>                
                    
                	<div class="section">
                    	<label class="field prepend-icon">
                            <input id="password" type="password" class="gui-input @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                            <span class="field-icon"><i class="fa fa-lock"></i></span>  
                        </label>

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div><!-- end section -->  
                    
                	<div class="section">
                        <label class="switch block">
                            <input type="checkbox" name="remember" id="remember" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <span class="switch-label" for="remember" data-on="YES" data-off="NO"></span> 
                            <span> Keep me logged in ?</span>
                        </label>
                    </div><!-- end section -->                                                           
                    
                </div><!-- end .form-body section -->
                <div class="form-footer">
                    <button type="submit" class="button btn-primary darkBlue">Sign in</button>
                    @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    @endif
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
