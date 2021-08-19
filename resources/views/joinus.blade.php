@extends('layouts.master')
@section('content')

<section>
    <div class="header-inner two">
      <div class="inner text-center">
        <h4 class="title text-white uppercase">We Are Uninav</h4>
        <h5 class="text-white uppercase">Join our forum,explore more about us.</h5>
      </div>
      <div class="overlay bg-opacity-5"></div>
      <img src="https://picsum.photos/1920/650" alt="" class="img-responsive"/> </div>
  </section>
  <!-- end header inner -->
  <div class="clearfix"></div>
  
  <section>
    <div class="pagenation-holder">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <h3>Join Us</h3>
          </div>

          <div class="col-md-6 text-right">
            <div class="pagenation_links"><a href="/add-user-post" class="btn btn-primary text-light" style="color: seashell;">Write Post</a></div> </div>
        </div>
      </div>
    </div>
  </section>
  <!--end section-->
  <div class="clearfix"></div>
  
  <section class="sec-padding">
    <div class="container">
      <div class="row">
        @foreach ($newses as $news)
        <div class="col-md-4 bmargin">
          <div class="blog-holder-12">
            @if ($news->image != '')
            <div class="image-holder">
              <div class="overlay bg-opacity-1">
                <div class="post-date-box three">  {{$news->created_at->format('d')}} <span>{{$news->created_at->format('F-Y')}}</span>  </div>
              </div>
              <img class="img-responsive" alt="" src="{{ asset($news->image) }}" style="height: 200px; width:400px;"> 
            </div>
            @endif
          </div>
          <div class="clearfix"></div>
          <br/>
          <a href="{{ $news->path() }}">
          <h4 class="less-mar1">{!! Str::limit($news->title, 20, '...') !!}</h4>
          </a>
          <div class="blog-post-info"> <span><i class="fa fa-user"></i> {{ $news->user->name }}</span> <span><i class="fa fa-comments-o"></i> {{ App\ForumComment::where('forum_post_id',$news->id)->count() }} Comments</span> <span><i class="fa fa-eye" aria-hidden="true"></i> {{ $news->views }}</span></div>
          <br/>
          <a class="btn btn-border light btn-round btn-small" href="{{ $news->path() }}">Read more</a> 
        </div>
        <!--end item--> 
        @endforeach
        
        {{--  <div class="clearfix"></div>
        <br/>
        <div class=" divider-line solid light margin opacity-7"></div>
        <div class="col-md-12">
        
         <ul class="blog-pagenation">
          <li><a href="#"><i class="fa fa-angle-left"></i></a></li>
          <li><a href="#">1</a></li>
          <li><a class="active" href="#">2</a></li>
          <li><a href="#">3</a></li>
          <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
        </ul>
        
        </div>  --}}

      </div>
    </div>
  </section>
  <!--end item -->
  <div class="clearfix"></div>

@endsection