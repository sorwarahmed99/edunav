@extends('layouts.master')
@section('content')

<section>
    <div class="header-inner two">
      <div class="inner text-center">
        <h4 class="title text-white uppercase">Forum Discussion</h4>
        <h5 class="text-white uppercase">{{ $post->title }}</h5>
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
            <h3>Forum Discussion</h3>
          </div>
          <div class="col-md-6 text-right">
            <div class="pagenation_links"><a href="/">Home</a><i> / </i> <a href="/">Join Us</a> <i> / </i> {{ $post->title }}</div>
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
          <div class="col-md-12 bmargin">
            <div class="blog-holder-12">
              @if ($post->image != '')
                <div class="image-holder">
                  <div class="overlay bg-opacity-1">
                    <div class="post-date-box three"> {{$post->created_at->format('d')}} <span>{{$post->created_at->format('F-Y')}}</span> </div>
                  </div>
                  <img class="img-responsive" alt="" src="{{ asset($post->image) }}"> 
                </div>
              @endif
            </div>
            <div class="clearfix"></div>
            <br/>
            <a href="#">
            <h4 class="less-mar1">{{ $post->title }}</h4>
            </a>
            <div class="blog-post-info"> <span><i class="fa fa-user"></i> {{ $post->user->name }}</span> <span><i class="fa fa-comments-o"></i> {{ App\ForumComment::where('forum_post_id',$post->id)->count() }} Comments</span> <span><i class="fa fa-eye" aria-hidden="true"></i> {{ $post->views }}</span> <span><i class="fa fa-clock-o"></i> {{$post->created_at->format('d-F-Y')}}</span></div>
            <br/>
            <p>
              {!! nl2br($post->description) !!}
            </p>

            {{--  <br/>
            <h4 class="less-mar3"><a href="#">Share this Article</a></h4>
            <br/>
            <ul class="social-icons-2">
              <li><a href="https://twitter.com/codelayers"><i class="fa fa-twitter"></i></a></li>
              <li><a href="https://www.facebook.com/codelayers"><i class="fa fa-facebook"></i></a></li>
              <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
              <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
              <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
            </ul>
            <div class="clearfix"></div>
            <br/>  --}}
            <h4 class="less-mar3"><a href="#">{{ App\ForumComment::where('forum_post_id',$post->id)->count() }} Comments</a></h4>
            <br/>

            @foreach ($comments as $comment)
                <div class="blog1-post-info-box">
                    <div class="text-box border padding-3">
                        <div class="iconbox-medium left round overflow-hidden"><img src="{{ asset('assets/images/avatar.png') }}" alt="" class="img-responsive"/></div>
                        <div class="text-box-right more-padding-2">
                            <h5 class="less-mar2">{{ $comment->user->name }}</h5>
                            <div class="blog1-post-info"> <span>{{ $comment->created_at }}</span></div>
                            <p class="paddtop1">{{ $comment->comment }}</p>
                        </div>
                    </div>
                </div>
                <!--end item-->
            @endforeach
            
            <div class="clearfix"></div>
            <br/>
            <br/>
            <br/>
           
            <div class="smart-forms bmargin">
              <h4>Post a Comment</h4>
              <form method="POST" action="{{ route('postComment') }}">
                @CSRF
                <div>
                  <div class="section">
                    <label class="field prepend-icon">
                      <textarea class="gui-textarea" id="sendermessage" name="comment" placeholder="Write your comment..."></textarea>
                      <span class="field-icon"><i class="fa fa-comments"></i></span> <span class="input-hint"> <strong>Hint:</strong> Please enter between 80 - 300 characters. Use <b>@</b> to mention</span> </label>
                  </div>
                  <input type="hidden" name="forum_post_id" value="{{ $post->id }}">
                </div>
                <!-- end .form-body section -->
                <div class="form-footer">
                  <button type="submit" class="button btn-primary darkBlue">Submit</button>
                  <button type="reset" class="button"> Cancel </button>
                </div>
              </form>
            </div>
        </div>            
    </div>
          
                <div class="col-md-4 col-sm-12 col-xs-12 bmargin">
                    <div class="col-md-12 col-sm-12 col-xs-12 nopadding bmargin">
                        <h5>Search</h5>
                        <div class="clearfix"></div>
                        <input class="blog1-sidebar-serch_input" type="search" placeholder="Search....">
                        <input name="" value="Submit" class="blog1-sidebar-serch-submit" type="submit">
                    </div>
                    <div class="clearfix"></div>
                    <br/>
                    <div class="col-md-12 col-sm-12 col-xs-12 nopadding bmargin">
                        <h5>Latest Posts</h5>
                        <div class="clearfix"></div>

                        @foreach ($latest as $l)
                            <div class="sidebar-posts">
                                <div class="image-left"><img src="{{ asset($l->image) }}" alt="" style="height: 60px; width:60px;" /></div>
                                <div class="text-box-right">
                                <h6 class="less-mar3 nopadding"><a href="{{ $l->path() }}">{!! Str::limit($l->title, 15, '...') !!}</a></h6>
                                <div class="post-info"> <span><i class="fa fa-user" aria-hidden="true"></i>  {{ $l->user->name }}</span><span> <i class="fa fa-clock-o" aria-hidden="true"></i> {{$l->created_at->format('d-F')}}</span> </div>
                                </div>
                            </div>
                            <!--end item-->
                        @endforeach
                    </div>  
                </div>       
            </div>
        </div>
    </div>
</section>
  <!-- end section -->
<div class="clearfix"></div>
  
@endsection