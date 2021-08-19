@extends('layouts.master')
@section('content')

<section>
    <div class="pagenation-holder">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <h3>FAQ</h3>
          </div>
          <div class="col-md-6 text-right">
            <div class="pagenation_links"><a href="/">Home</a><i> / </i> <a href="">Faq</a></div>
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
      
      
        <div class="col-md-8 col-sm-12 col-xs-12 bmargin">
            @foreach ($faqs as $faq)
                <h4>Q. {{ $faq->question }}</h4>
                <p>{{ $faq->answer }}</p>
                <div class="divider-line dashed light margin"></div>
            @endforeach

        </div>    
        
        
      </div>
    </div>
  </section>
  <!-- end section -->
  <div class="clearfix"></div>
@endsection