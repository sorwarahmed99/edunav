@extends('layouts.master')
@section('content')
<section>
    <div class="header-inner two">
      <div class="inner text-center">
        <h4 class="title text-white uppercase">Why UK</h4>
        <h5 class="text-white uppercase">Learn more to shoose uk now over any other country</h5>
      </div>
      <div class="overlay bg-opacity-5"></div>
      <img src="{{ asset("assets/images/university/ukflag.png") }}" alt="" class="img-responsive"/> </div>
  </section>
  <!-- end header inner -->
  <div class="clearfix"></div>
  
  <section>
    <div class="pagenation-holder">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <h3>Why UK</h3>
          </div>
          <div class="col-md-6 text-right">
            <div class="pagenation_links"><a href="index.html">Home</a><i> / </i> <a href="index.html">Why UK</a></div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--end section-->
  <div class="clearfix"></div>
  
  <section class="sec-padding">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12 bmargin">
          <div class="col-md-12 bmargin">
            @foreach ($whys as $uk)
              <div class="blog-holder-12">
                <div class="image-holder">
                  <img class="img-responsive" alt="" src="{{ asset($uk->image) }}"> 
                </div>
              </div>
              <div class="clearfix"></div>
              <br/>
              <a href="#">
              <h4 class="less-mar1">{{ $uk->title }}</h4>
              </a>
              <div class="blog-post-info"> <span><i class="fa fa-user"></i> By Author</span> </div>
              <br/>
              <p>
                {!! nl2br($uk->description) !!}
              </p>
              
            @endforeach
            
            
            {{--  <div class="clearfix"></div>
            <br/>
            <div class="blog1-post-info-box">
              <div class="text-box border padding-3">
                <div class="iconbox-medium left overflow-hidden"><img src="{{ asset("assets/images/university/ukflag.png") }}" alt="" class="img-responsive"/></div>
                <div class="text-box-right more-padding-2">
                  <h4>Why Uk</h4>
                  <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Suspendisse et justo. Praesent mattis commodo augue. </p>
                  <br/>
                  <a class="btn btn-border orange-2 btn-small-2" href="#">Read more</a> </div>
              </div>
            </div>
            <!--end item-->  --}}
            <div class="clearfix"></div>
            <br/>

            <div class="smart-forms bmargin">
              <h4>Contact Us now</h4>
              <form method="POST" action="{{ route('contactForm') }}" id="smart-form">
                @CSRF
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div>
                  <div class="section">
                    <label class="field prepend-icon">
                      <input type="text" name="name" id="sendername" class="gui-input" placeholder="Enter name">
                      <span class="field-icon"><i class="fa fa-user"></i></span> </label>
                  </div>
                  <!-- end section -->
                  
                  <div class="section">
                    <label class="field prepend-icon">
                      <input type="email" name="email" id="emailaddress" class="gui-input" placeholder="Email address">
                      <span class="field-icon"><i class="fa fa-envelope"></i></span> </label>
                  </div>
                  <!-- end section -->
                  {{--                  
                  <div class="section colm colm6">
                    <label class="field prepend-icon">
                      <input type="tel" name="subject" id="telephone" class="gui-input" placeholder="Telephone">
                      <span class="field-icon"><i class="fa fa-phone-square"></i></span> </label>
                  </div>
                  <!-- end section -->  --}}
                  
                  <div class="section">
                    <label class="field prepend-icon">
                      <input type="text" name="subject" id="sendersubject" class="gui-input" placeholder="Enter subjec">
                      <span class="field-icon"><i class="fa fa-lightbulb-o"></i></span> </label>
                  </div>
                  <!-- end section -->
                  
                  <div class="section">
                    <label class="field prepend-icon">
                      <textarea class="gui-textarea" id="sendermessage" name="message" placeholder="Enter message"></textarea>
                      <span class="field-icon"><i class="fa fa-comments"></i></span> <span class="input-hint"> <strong>Hint:</strong> Please enter between 80 - 300 characters.</span> </label>
                  </div>
                  <!-- end section --> 
                  
                
                  
                  <div class="result"></div>
                  <!-- end .result  section --> 
                  
                </div>
                <!-- end .form-body section -->
                <div class="form-footer">
                  <button type="submit" data-btntext-sending="Sending..." class="button btn-primary darkBlue">Submit</button>
                  <button type="reset" class="button"> Cancel </button>
                </div>
                <!-- end .form-footer section -->
              </form>
            </div>
            <!-- end .smart-forms section --> 
            
          </div>
          <!--end item--> 
          
        </div>
        <!--end left column-->
        
      </div>
    </div>
  </section>
  <!-- end section -->
  <div class="clearfix"></div>
  
@endsection