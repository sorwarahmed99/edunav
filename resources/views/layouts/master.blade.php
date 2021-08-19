<!doctype html>
<!--[if IE 7 ]>    <html lang="en-gb" class="isie ie7 oldie no-js"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en-gb" class="isie ie8 oldie no-js"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en-gb" class="isie ie9 no-js"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<!--<![endif]-->
<!--<![endif]-->
<html lang="en">
<head>
<title>Uni-nav</title>
<meta charset="utf-8">
<!-- Meta -->

<meta name="keywords" content="" />
<meta name="author" content="">
<meta name="robots" content="" />
<meta name="description" content="" />

<!-- this styles only adds some repairs on idevices  -->
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="csrf-token" content="{{ csrf_token() }}">

<!-- Favicon -->
{{--  <link rel="shortcut icon" href="images/favicon.ico">  --}}

<!-- Google fonts - witch you want to use - (rest you can just remove) -->
<link href='https://fonts.googleapis.com/css?family=Roboto:100,200,300,400,500,600,700,800,900' rel='stylesheet' type='text/css'>

<!--[if lt IE 9]>
<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

<!-- stylesheets -->
<link rel="stylesheet" media="screen" href="{{ asset('assets/js/bootstrap/bootstrap.min.css') }}" type="text/css" />
<link rel="stylesheet" href="{{ asset('assets/js/mainmenu/menu.css') }}" type="text/css" />
<link rel="stylesheet" href="{{ asset('assets/css/default.css') }}" type="text/css" />
<link rel="stylesheet" href="{{ asset('assets/css/layouts.css') }}" type="text/css" />
<link rel="stylesheet" href="{{ asset('assets/css/shortcodes.css') }}" type="text/css" />
<link rel="stylesheet" media="screen" href="{{ asset('assets/css/responsive-leyouts.css') }}" type="text/css" />
<link rel="stylesheet" href="{{ asset('assets/js/masterslider/style/masterslider.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/css/font-awesome/css/font-awesome.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/Simple-Line-Icons-Webfont/simple-line-icons.css') }}" media="screen" />
<link rel="stylesheet" href="{{ asset('assets/css/et-line-font/et-line-font.css') }}">
<link href="{{ asset('assets/js/animations/css/animations.min.css') }}" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" type="text/css" href="{{ asset('assets/js/cubeportfolio/cubeportfolio.min.css') }}">
<link href="{{ asset('assets/js/owl-carousel/owl.carousel.css') }}" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('assets/js/ytplayer/ytplayer.css') }}" />

<link rel="stylesheet" type="text/css" href="{{ asset('assets/js/smart-forms/smart-forms.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/js/tabs/assets/css/responsive-tabs.css') }}">

</head>

<body>

<div class="site_wrapper">
 @include('include.navigation')

 @yield('content')
 
  <section class="section-fulldark sec-padding">
    <div class="container">
      <div class="row">
        <div class="col-md-3 col-sm-12 colmargin clearfix">
          <h4 class="uppercase footer-title less-mar3">Find Us</h4>
          <div class="footer-title-bottomstrip"></div>
          <div class="clearfix"></div>
          {{-- <div class="footer-logo"><h1>Uni-nav360</h1></div> --}}

          <ul class="address-info no-border">
            <li>Address: Office 52, 58 Peregrine Road, Hainault, IIford, Essex, IG6 3SZ, <br> United Kingdom</li>
            <li><i class="fa fa-whatsapp"></i> Whatsapp: +44 7916 873773</li>
            <li><i class="fa fa-whatsapp"></i> Whatsapp:  +44 7575 451051</li>
            <li class="last"><i class="fa fa-envelope"></i> Email: support@uninav.co.uk</li>
          </ul>
        </div>
        <!--end item-->
        
        <div class="col-md-3 col-sm-12 colmargin clearfix">
          <h4 class="uppercase footer-title less-mar3">Quick Links</h4>
          <div class="footer-title-bottomstrip"></div>
          <div class="clearfix"></div>
            <ul class="usefull-links tex-left no-border">
              <li><a href="/"><i class="fa fa-angle-right"></i> Home</a></li>
              <li><a href="/why-uk"><i class="fa fa-angle-right"></i> Why UK</a></li>
              <li><a href="/how-uni-nav-works"><i class="fa fa-angle-right"></i> How Uni-nav Works</a></li>
              <li><a href="/faq"><i class="fa fa-angle-right"></i> FAQ</a></li>
              <li><a href="/about-us"><i class="fa fa-angle-right"></i> About Us</a></li>
              <li><a href="/contact-us"><i class="fa fa-angle-right"></i> Contact Us</a></li>
            </ul>
        </div>
        <!--end item-->
        
        <div class="col-md-3 col-sm-12 colmargin tex-left clearfix">
          <h4 class="uppercase footer-title less-mar3">useful links</h4>
          <div class="footer-title-bottomstrip"></div>
          <div class="clearfix"></div>
          <ul class="usefull-links tex-left no-border">
            <li><a href="/join-us"><i class="fa fa-angle-right"></i> Join Our Forum</a></li>
            <li><a href="/login"><i class="fa fa-angle-right"></i> Login</a></li>
            <li><a href="/register"><i class="fa fa-angle-right"></i> Sign up</a></li>
            <li><a href="/privacy-policy"><i class="fa fa-angle-right"></i> Privacy Policy </a></li>
            <li><a href="/terms-and-condition"><i class="fa fa-angle-right"></i> Terms & Condition </a></li>
          </ul>
        </div>
        <!--end item--> 

        <div class="col-md-3 col-sm-12 colmargin clearfix">
          <h4 class="uppercase footer-title less-mar3">About Uni-nav</h4>
          <div class="footer-title-bottomstrip"></div>
          <div class="clearfix"></div>
          Uninav provides academic and visa counselling services for prospective undergraduate and postgraduate degree students willing to study in UK. Let us fulfil your dreams of pursuing higher studies abroad. 
        </div>
        <!--end item-->
        
      </div>
    </div>
  </section>
  <!--end section-->
  <div class="clearfix"></div>
  
  <section class="section-copyrights section-less-padding">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <span>Copyright © {{ date('Y') }} <a href="/">Uni-nav</a> | Design & Developed By <a href="http://www.desseinlab.com/" class="text-white">Dessein Lab</a> </span></div>
        </div>
      </div>
    </div>
  </section>
  <a href="#" class="scrollup"></a> 
  
</div>


<script type="text/javascript" src="{{ asset('assets/js/universal/jquery.js') }}"></script> 
<script src="{{ asset('assets/js/bootstrap/bootstrap.min.js') }}" type="text/javascript"></script> 
<script src="{{ asset('assets/js/mainmenu/customeUI.js') }}"></script> 
<script src="{{ asset('assets/js/mainmenu/jquery.sticky.js') }}"></script> 
<script src="{{ asset('assets/js/masterslider/masterslider.min.js') }}"></script> 

<script type="text/javascript">
(function($) {
 "use strict";
	var slider = new MasterSlider();
	// adds Arrows navigation control to the slider.
	slider.control('arrows');
	slider.control('bullets');
	
	slider.setup('masterslider' , {
		 width:1600,    // slider standard width
		 height:650,   // slider standard height
		 space:0,
		 speed:45,
		 layout:'fullwidth',
		 loop:true,
		 preload:0,
		 autoplay:true,
		 view:"parallaxMask"
	});
})(jQuery);
</script> 

<script>
  $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });

  $(document).ready(function(){
      
      function load_unseen_notification(view = '')
      {
        $.ajax({
        
        url:"{{ route('fetch') }}",
        method:"POST",
        data:{view:view},
        dataType:"json",
        success:function(data)
        {
          //console.log(data);
          $('.list').html(data.notification);

          if(data.unseen_notification > 0)
          {
            $('.count').html(data.unseen_notification);
          }
        }
        });
      }
      
      load_unseen_notification();
      
      
      $(document).on('click', '.webL', function(){
        $('.count').html('');
        load_unseen_notification('yes');
      });
      
      setInterval(function(){ 
        load_unseen_notification();
      }, 5000);
  });

</script>

<script>
  $(document).ready(function(){
    $("#showIelts").click(function(){
      $(".ielts").slideDown('slow').show();
    });	
    $("#hideIelts").click(function(){
      $(".ielts").slideDown('slow').hide();
    });					      
  });

  
</script>
<script type="text/javascript" src="{{ asset('assets/js/ytplayer/jquery.mb.YTPlayer.js') }}"></script> 
<script type="text/javascript" src="{{ asset('assets/js/ytplayer/elementvideo-custom.js') }}"></script> 
<script type="text/javascript" src="{{ asset('assets/js/ytplayer/play-pause-btn.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/cubeportfolio/jquery.cubeportfolio.min.js') }}"></script> 
<script type="text/javascript" src="{{ asset('assets/js/cubeportfolio/main.js') }}"></script> 
<script src="{{ asset('assets/js/animations/js/animations.min.js') }}" type="text/javascript"></script> 
<script src="{{ asset('assets/js/animations/js/appear.min.js') }}" type="text/javascript"></script> 
<script src="{{ asset('assets/js/scrolltotop/totop.js') }}"></script> 
<script src="{{ asset('assets/js/owl-carousel/owl.carousel.js') }}"></script> 
<script src="{{ asset('assets/js/owl-carousel/custom.js') }}"></script> 
<script src="{{ asset('assets/js/tabs/assets/js/responsive-tabs.min.js') }}" type="text/javascript"></script>  

<script type="text/javascript" src="{{ asset('assets/js/tabs/smk-accordion.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/tabs/custom.js') }}"></script> 
<script src="{{ asset('assets/js/scripts/functions.js') }}" type="text/javascript"></script>
@include('sweetalert::alert') 


</body>
</html>