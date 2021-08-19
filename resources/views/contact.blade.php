@extends('layouts.master')
@section('content')

<section>
    <div class="pagenation-holder">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <h3>Contact us</h3>
          </div>
          <div class="col-md-6 text-right">
            <div class="pagenation_links"><a href="/">Home</a><i> / </i> <a href="index.html">Contact us</a></div>
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
         
      <div class="col-md-8">
        <div class="smart-forms bmargin">
           
            <h3>Contact Us now</h3>
            <p>We are responsible for your messages,contact us now and we will get back to you as soon as possible.</p>
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
      
      
      <div class="col-md-4">
      <br/>
          <h4>Address Info</h4>
          Office 52, 58 Peregrine Road, Hainault, 
          <br>
          IIford, Essex, IG6 3SZ, United Kingdom
          <br>
          <br>
          Whatsapp: +44 7916 873773 <br>
          Whatsapp:  +44 7575 451051
            <br>
            <br />
            E-mail: <a href="mailto:support@uninav.co.uk">support@uninav.co.uk</a><br />
            Web: <a href="http://uninav.co.uk/">http://www.uninav.co.uk/</a>
            <div class="clearfix"></div>
            
		
        </div>  
      </div>
    </div>
  </section>
  <!--end section-->
  <div class="clearfix"></div>

<section id="googleMap" class="google-map p-0">
  <div class="container-fluid">
    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1238.8928794456226!2d0.120177!3d51.608814!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47d8a38d70e5350d%3A0xc60bc7f56962c245!2s52%2C%2058%20Peregrine%20Rd%2C%20Hainault%2C%20Ilford%2C%20UK!5e0!3m2!1sen!2sbd!4v1593549954032!5m2!1sen!2sbd" frameborder="0" style="border:0; width:100%; height:400px;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>  </div>
</section>
@endsection