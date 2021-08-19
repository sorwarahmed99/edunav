@extends('layouts.master')
@section('content')

  <!-- masterslider -->
  <div class="master-slider ms-skin-default" id="masterslider"> 
    @foreach ($sliders as $slider)
    <div class="ms-slide slide-2" data-delay="9">
      
      <img src="{{ asset($slider->slider_image) }}" data-src="{{ asset($slider->slider_image) }}" alt=""/>
            
      <h3 class="ms-layer text59"
			style="left: 230px;top: 245px;"
			data-type="text"
			data-delay="400"
			data-ease="easeOutExpo"
			data-duration="1230"
			data-effect="scale(1.5,1.6)"> {{ $slider->slider_title }} </h3>
            
      <h3 class="ms-layer text3"
        	style="left: 230px; top: 340px;"
            data-type="text"
            data-effect="top(45)"
            data-duration="700"
            data-delay="1000"
            data-ease="easeOutExpo"> {!! nl2br($slider->slider_description) !!} </h3>
                    
    </div>
    <!-- end slide 1 -->
    @endforeach
    
   
  </div>
  <!-- end of masterslider -->
  <div class="clearfix"></div>

  
    <!--end item-->
  
  <section class="section-grey section-less-padding">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="carousel_holder">
              <div id="owl-demo5" class="owl-carousel">
                @foreach ($universities as $uni)
                  <div class="item"><img src="{{ asset($uni->image) }}" alt=""></div>
                @endforeach
                
              </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--end section -->
  <div class="clearfix"></div>

  <section class=" section-light sec-padding">
    <div class="container">
      <div class="row">
        <div class="col-xs-12 text-center">
          <h2 class="section-title">News & Events</h2>
          <div class="title-line-4 dark align-center"></div>
        </div>
        @foreach ($newses as $news)
        <div class="col-md-4 col-sm-6">
          <div class="blog-holder1 noborder bmargin">
            <div class="image-holder">
              <div class="post-date-box violet"> {{$news->created_at->format('d')}} <span>{{$news->created_at->format('F-Y')}}</span> </div>
              <img src="{{ asset($news->image) }}" alt="" class="img-responsive"/ style="height: 260px; width:360px;"> 
            </div>
            <div class="content-box">
              <h4 class="less-mar2"><a href="{{ $news->path() }}">{{ $news->title }}</a></h4>
              <div class="blog-post-info"> <span><i class="fa fa-user"></i> By Admin</span> <span><i class="fa fa-comments-o"></i> 0 </span> </div>
              <br/>
              <p>{{ $news->subtitle }}</p>
              <br/>
              <a class="btn btn-border light btn-round btn-small" href="{{ $news->path() }}">Read more</a>
            </div>
          </div>
        </div>
        @endforeach
      
      </div>
    </div>
  </section>
  <!--end section-->
  <div class=" clearfix"></div>
  
  <section class="section-darkblue section-less-padding">
    <div class="container">
      <div class="row">
        <div class="col-md-9">
          <h3 class="text-white">PURSUE YOUR DREAMS</h3>
          <p class="text-white">Uninav provides academic and visa counselling services for prospective undergraduate and postgraduate degree students willing to study in UK. Let us fulfil your dreams of pursuing higher studies abroad. </p>
        </div>
        <div class="col-md-3">
          <div class="margin-top2"></div>
          <a class="btn btn-border white-2 btn-large pull-right" href="/about-us">Read more</a></div>
      </div>
    </div>
  </section>
  <!--end section-->

  {{--  <section class="section-light sec-padding">
    <div class="container">
      <div class="row">
        <div class="col-xs-12 text-center">
          <h2 class="section-title bmargin">What our clients Say</h2>
        </div>
        <br>
        <br>

        <div class=" clearfix"></div>

        @foreach ($clients as $client)
        <div class="col-md-4 col-sm-6">
          <div class="testimonials-holder two bmargin">				
            <div class="image-left"><div class="img-inner overflow-hidden"><img src="{{ asset($client->image) }}" alt="" class="img-responsive"/></div></div>
            <div class="text-box-right">
              <p><img src="assets/images/site-img13.png" alt=""/> {{ $client->message }}</p>
              <br/>
              <h6 class="nomargin">{{ $client->client_name }}</h6>
              <span><span class="text-darkBlue">- {{ $client->designation }}</span></span> 
            </div>
          </div>
        </div>
        @endforeach
       

      </div>
    </div>
  </section>  --}}
  <!--end section-->
  <div class=" clearfix"></div>
  
  <section>
    <div class="videobgholder">
      <div id="wrapper">
        <div id="customElement">
          <div class="container-fluid nopadding">
            <div class="video-overlay bg-opacity-5">
              <div class="container video-toppadd video-bopadd">
                <div class="col-md-8 col-centered text-center">
                  <button id="togglePlay" class="command vbutton pause" onclick="jQuery('#video').YTPTogglePlay(changeLabel)">Pause</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <a id="video" class="player" data-property="{videoURL:'v8oA0J3fAnQ',containment:'#customElement', showControls:false, autoPlay:true, loop:true, vol:50, mute:true, startAt:1,  stopAt:109, opacity:1, addRaster:true, quality:'hd720', optimizeDisplay:true}">My video</a> </div>
  </section>
  <!--end section-->
  <div class="clearfix"></div>
  
  <section class="sec-padding">
    <div class="container">
      <div class="row">
         
      <div class="col-md-8">
        <div class="smart-forms bmargin">
           
            <h3>Contact Us</h3>
            <p>Contact us now, we are responsible for your message and we will get back to you as soon as possible.</p>
            <br/>
            <br/>
            
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
                <button type="submit" class="button btn-primary darkBlue">Submit</button>
                <button type="reset" class="button"> Cancel </button>
              </div>
              <!-- end .form-footer section -->
            </form>
          </div>
          <!-- end .smart-forms section --> 
      </div>
      
      
      <div class="col-md-4">
      <br/>
          <h4>Address Info</h4>
            Office 52, 58 Peregrine Road, Hainault, 
            <br>
            IIford, Essex, IG6 3SZ, United Kingdom
            <br>
             Whatsapp: +44 7916 873773
            <br> Whatsapp:  +44 7575 451051
            <br />
            <br>
            E-mail: <a href="mailto:support@uninav.co.uk">support@uninav.co.uk</a><br/>
            <div class="clearfix"></div>
		<br/><br/>
        <h4>Find the Address</h4>
       
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d357.9900553392906!2d0.11997441007923416!3d51.60881505873064!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47d8a38d70e5350d%3A0xf4ab330bbc6b26bf!2s58%20Peregrine%20Rd%2C%20Hainault%2C%20Ilford%2C%20UK!5e0!3m2!1sen!2sbd!4v1593547671578!5m2!1sen!2sbd" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
       
        </div>  
      </div>
    </div>
  </section>
  <!--end section-->
  <div class="clearfix"></div>
  
@endsection