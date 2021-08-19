@extends('layouts.master')
@section('content')


<section>
    <div class="header-inner two">
      <div class="inner text-center">
        <h4 class="title text-white uppercase">Welcome {{ Auth::user()->name }}</h4>
        <h5 class="text-white uppercase">Your Notifications</h5>
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
            <h3>Notifications</h3>
          </div>
          <div class="col-md-6 text-right">
            <div class="pagenation_links"><a href="/student-portal" class="btn btn-primary text-light" style="color: seashell;">Student Portal</a></div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--end section-->
  <div class="clearfix"></div>
  <br>

  
  <section class="sec-padding">
    <div class="container">
    <div class="row">
    
    <div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 col-lg-8 col-lg-offset-2 form-box f1">
          <div class="accordion_holder">
            <div class="accordion_example1"> 
              
              <!-- Section 1 -->
              @if ($notifications->isEmpty())
                  <h4>No notification found</h4>
              @else

                @foreach ($notifications as $not)
                    <div class="accordion_in two  {{ $loop->first ? 'acc_active' : '' }}">
                        <div class="acc_head">{{ $not->about }}  <span style="margin-left: 20px;; margin-right:0;" class="text-right text-primary">{{ \Carbon\Carbon::parse($not->created_at)->diffForHumans() }}</span></div>
                        <div class="acc_content">
                            @if($not->other_message != '')
                                <span class="text-danger">@Admin says: </span> {{ $not->other_message }}
                            @else 
                                {{ $not->about }}
                            @endif
                        </div>
                    </div>
                    <div class="divider-line solid light"></div>
                    <div class="col-divider-margin-4"></div>
                @endforeach
              @endif
              
             
            </div>
          </div>
          <!-- Accordion end --> 
        </div>
    </div>
    </div>
    </section>
    <!-- end section -->
    <div class="clearfix"></div>

  @endsection