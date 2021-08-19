<div class="topbar blue topbar-padding">
  <div class="container"> 
  <a href="/" class="logo two toppadd"><img src="{{ asset('resource/assets/img/1LOGO_MAIN.png') }}" alt="Uni nav Logo" style="height: 100px; width:200px;" /></a>
    <ul class="toplist toppadding">
      {{--  <li ><i class="fa fa-home"></i>&nbsp;&nbsp;<a href="/">Home</a></li>  --}}
      {{--  <li><i class="fa fa-forumbee"></i>&nbsp;&nbsp; <a href="{{ route('joinus') }}">Join Us</a></li>  --}}
      @if(Auth::Check() && !empty($notifis))
        @if (Auth::user()->is_admin==1)
        <li><i class="fa fa-fw fa-tachometer"></i>&nbsp;&nbsp;<a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
        @else 
        <li ><i class="fa fa-user"></i>&nbsp;&nbsp; <a href="/profile"> Profile</a></li>
        <li class="dropdown ">
          <a class="dropdown-toggle webL" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
            <i class="fa fa-bell"></i>
            <span class="badge badge-danger badge-counter count" style="background: rgb(247, 53, 53);"></span>
          </a>

          <div class="dropdown-list dropdown-menu dropdown-menu-right ">
            <h6 class="dropdown-header">
              Notification Center
            </h6>
            @foreach ($notifis as $not)
            <a class="dropdown-item d-flex align-items-center" href="#">
              <div>
                <div class="small text-gray-500">{{ \Carbon\Carbon::parse($not->created_at)->diffForHumans() }}</div>
                <span class="font-weight-bold">
                  {{ $not->about }} 
                </span>
                @if ($not->other_message != '')
                <br>
                <span class="text-danger">@Admin:</span> <span> {{ $not->other_message }}</span>
                @endif
              </div>
            </a>
            <hr>
            @endforeach
            <a class="dropdown-item text-center small text-gray-500" href="/notifications-all">Show All Notification</a>
          </div>
        </li>
        {{-- <li><a href=""><i class="fa fa-bell"></i></a></li> --}}
        @endif
        <li>
          <i class="fa fa-sign-out"></i>&nbsp;&nbsp;<a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                @csrf
            </form>
        </li>
        
      @else 

        <li class="lineright"><a href="{{ route('login') }}">Login</a></li>
        <li><a href="{{ route('register') }}">Register</a></li>

      @endif          
    </ul>
  </div>
</div>
  <div class="clearfix"></div>
  <div id="header">
    <div class="container">
      <div class="navbar navbar-default yamm">
        <div class="navbar-header">
          <button type="button" data-toggle="collapse" data-target="#navbar-collapse-grid" class="navbar-toggle"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
        </div>
        <div id="navbar-collapse-grid" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">

              <li class="dropdown"> <a href="/" class="{{ Route::currentRouteName() == 'index' ? 'active' : '' }}">Home</a></li>
              <li class="dropdown"> <a href="{{ route('howItWorks') }}" class="{{ Route::currentRouteName() == 'howItWorks' ? 'active' : '' }}">How Uninav Works</a></li>
              <li class="dropdown"> <a href="{{ route('whyUK') }}" class="{{ Route::currentRouteName() == 'whyUK' ? 'active' : '' }}">Why UK</a></li>
              {{--  <li class="dropdown"> <a href="{{ route('faq') }}" class="{{ Route::currentRouteName() == 'faq' ? 'active' : '' }}">FAQ</a></li>  --}}
              <li class="dropdown"> <a href="{{ route('about') }}" class="{{ Route::currentRouteName() == 'about' ? 'active' : '' }}">About Us</a></li>

          </ul>
          <a class="btn btn-white btn-xround pull-right top-margin" href="{{ route('contact') }}">Contact Us</a> </div>
      </div>
    </div>
  </div>
  <!--end menu-->
  <div class="clearfix"></div>