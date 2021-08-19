@extends('layouts.master')
@section('content')

<section>
    <div class="header-inner two">
      <div class="inner text-center">
        <h4 class="title text-white uppercase">Uninav-360</h4>
        <h5 class="text-white uppercase">About Us</h5>
      </div>
      <div class="overlay bg-opacity-5"></div>
      <img src="https://picsum.photos/1920/800" alt="" class="img-responsive"/> </div>
  </section>
  <!-- end header inner -->
  <div class="clearfix"></div>
  
  <section>
    <div class="pagenation-holder">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <h3>About Us</h3>
          </div>
          <div class="col-md-6 text-right">
            <div class="pagenation_links"><a href="index.html">Home</a><i> / </i> <a href="index.html">About Us</a></div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--end section-->
  <div class="clearfix"></div>
  
  <section class="sec-padding">
    <div class="container">
      @foreach ($abouts as $about)
      <div class="row">
        
        <div class="col-md-6 col-sm-12 col-xs-12 bmargin">
          <h3 class="uppercase less-mar2">About us</h3>
          <div class="clearfix"></div>
          <br/>
          <p>{!! nl2br($about->texts) !!}</p>
          
        </div>
        <!--end item-->
        
        <div class="col-md-6 col-sm-12 col-xs-12 bmargin"> <img src="{{ asset($about->image) }}" alt="" class="img-responsive"/> </div>
        <!--end item--> 
      </div>
      @endforeach
      
    </div>
  </section>
  <!-- end section -->
  <div class="clearfix"></div>
  
  <section class="parallax-section7">
    <div class="section-overlay">
      <div class="container sec-tpadding-3 sec-bpadding-3">
        <div class="row">
          <div class="col-md-4">
            <div class="feature-box-84 text-center bmargin">
              <h2 class="text-darkblue"><strong>63</strong></h2>
              <h4 class="text-darkblue font-weight-3 uppercase">Countries</h4>
            </div>
          </div>
          <!--end item-->
          
          <div class="col-md-4">
            <div class="feature-box-84 text-center bmargin">
              <h2 class="text-darkblue"><strong>130</strong></h2>
              <h4 class="text-darkblue font-weight-3 uppercase">Universities</h4>
            </div>
          </div>
          <!--end item-->
          
          <div class="col-md-4">
            <div class="feature-box-84 text-center bmargin">
              <h2 class="text-darkblue"><strong>1520</strong></h2>
              <h4 class="text-darkblue font-weight-3 uppercase">Happy Clients</h4>
            </div>
          </div>
          <!--end item--> 
          
        </div>
      </div>
    </div>
  </section>
  <!--end section-->
  <div class="clearfix"></div>
  
@endsection