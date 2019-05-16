<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Product Single</title>
 <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
 <meta name="csrf-token" content="{{ csrf_token() }}"> 
 <link rel="shortcut icon" href="{{asset('')}}shopasset/images/logo.png"> 

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,400,700" rel="stylesheet">

  <link rel="stylesheet" href="{{asset('')}}shopasset/css/open-iconic-bootstrap.min.css">
  <link rel="stylesheet" href="{{asset('')}}shopasset/css/animate.css">

  <link rel="stylesheet" href="{{asset('')}}shopasset/css/owl.carousel.min.css">
  <link rel="stylesheet" href="{{asset('')}}shopasset/css/owl.theme.default.min.css">
  <link rel="stylesheet" href="{{asset('')}}shopasset/css/magnific-popup.css">

  <link rel="stylesheet" href="{{asset('')}}shopasset/css/aos.css">

  <link rel="stylesheet" href="{{asset('')}}shopasset/css/ionicons.min.css">

  <link rel="stylesheet" href="{{asset('')}}shopasset/css/bootstrap-datepicker.css">
  <link rel="stylesheet" href="{{asset('')}}shopasset/css/jquery.timepicker.css">


  <link rel="stylesheet" href="{{asset('')}}shopasset/css/flaticon.css">
  <link rel="stylesheet" href="{{asset('')}}shopasset/css/icomoon.css">
  <link rel="stylesheet" href="{{asset('')}}shopasset/css/shoptest.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.css">
</head>
<body>
 <div class="navbar navbar-default navbar-fixed-top" role="navigation">
  <div class="container">
    <div class="navbar-header">
     <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
       <span class="sr-only">Toggle navigation</span>
       <span class="icon-bar"></span>
       <span class="icon-bar"></span>
       <span class="icon-bar"></span>
     </button>
     <a class="navbar-brand" href="#"><img src="{{asset('')}}shopasset/images/logo.png"  ></a>
     <div class="language">
    
      @foreach($language as $value)
      @if(isset($_SESSION['url']))
       <a href="{{asset('')}}shop/<?php if(isset($_SESSION['url'])){echo $_SESSION['url']; }else{echo 'list';}?>/{{$value->summary}}" lang="{{$value->summary}}" class="lang">{{$value->summary}} |</a>
       @endif
       @endforeach
     </div>
   </div>

   <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
     <ul class="nav navbar-nav">
      <li class=""><a href="#">Home</a></li>
      <li><a href="#">Brand</a></li>
      <li class="dropdown"> 
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" >Jelwery <b class="caret"></b></a>
        <ul class="dropdown-menu ftco-animate fadeInUp">
         <li class="menu-item "><a href="#" class="dropdown-toggle" data-toggle="dropdown">Star Ruby  <b class="caret"></b></a>
          <ul class="dropdown-menu ftco-animate fadeInUp">
            <li  class="menu-item"><a href="#">About Star Ruby</a></li>
            <li class="divider"></li>
            <li class="menu-item "><a href="#" class="dropdown-toggle" data-toggle="dropdown">Collection <b class="caret"></b></a>
              <ul class="dropdown-menu ftco-animate fadeInUp">
               <li class="menu-item">
                 <a href="#" >Lotus</a>
               </li><li class="divider"></li>
               <li class="menu-item">
                 <a href="#" >Viet Nam　Motif</a>
               </li><li class="divider"></li>
               <li class="menu-item">
                 <a href="#" >Standard Collection</a>
               </li>
             </ul>
           </li>
         </ul>
       </li>
       <li class="divider"></li>
       <li class="menu-item"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Diamond <b class="caret"></b></a>
        <ul class="dropdown-menu ftco-animate fadeInUp">
          <li class="menu-item"><a href="#">About Diamond</a></li>
          <li class="divider"></li>
          <li class="menu-item"><a href="#">Bridal service</a></li>
        </ul>
      </li>
      <li class="divider"></li>
      <li class="menu-item"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Other <b class="caret"></b></a>
        <ul class="dropdown-menu ftco-animate fadeInUp">
          <li class="menu-item"><a href="#">Gemstone　</a></li>
          <li class="divider"></li>
          <li class="menu-item"><a href="#">Silver accessories</a></li>
        </ul>
      </li>
    </ul>
  </li>
  <li>
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Souvernir <b class="caret"></b></a>
    <ul class="dropdown-menu ftco-animate fadeInUp">
     <li class="menu-item"><a href="#" >StarLotus Original </a>
     </li>
     <li class="divider"></li>
     <li class="menu-item"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Online Shop  <b class="caret"></b></a>
      <ul class="dropdown-menu ftco-animate fadeInUp">
        <li class="menu-item"><a href="#">Food</a></li>
        <li class="divider"></li>
        <li class="menu-item"><a href="#">Drink</a></li>
        <li class="divider"></li>
        <li class="menu-item"><a href="#">Plastic Bag</a></li>
        <li class="divider"></li>
        <li class="menu-item"><a href="#">Others</a></li>
      </ul>
    </li>
  </ul>
</li>
<li class="aa">
  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Customer Support <b class="caret"></b></a>
  <ul class="dropdown-menu ftco-animate fadeInUp">
   <li class="menu-item"><a href="#">FAQ </a>
   </li>
   <li class="divider"></li>
   <li class="menu-item"><a>Contact Us</a></li>
 </ul>
</li>
<li>
  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Contact <b class="caret"></b></a>
  <ul class="dropdown-menu ftco-animate fadeInUp">
   <li class="menu-item"><a href="#">Phone </a></li>
   <li class="divider"></li>
   <li class="menu-item"><a href="#">Facebook </a></li>
   <li class="divider"></li>
   <li class="menu-item"><a href="#">Gmail </a></li>
 </ul>
</li>
</ul>
</div>
  </div>
</div>

<div style="padding: 5%"></div> 

@yield('content')



 Design By Y_S And T
</div>
<script src="{{asset('')}}shopasset/js/jquery.min.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="{{asset('')}}shopasset/js/jquery-migrate-3.0.1.min.js"></script>
<script src="{{asset('')}}shopasset/js/popper.min.js"></script>
<!-- <script src="js/bootstrap.min.js"></script> -->
<script src="{{asset('')}}shopasset/js/jquery.easing.1.3.js"></script>
<script src="{{asset('')}}shopasset/js/jquery.waypoints.min.js"></script>
<script src="{{asset('')}}shopasset/js/jquery.stellar.min.js"></script>
<script src="{{asset('')}}shopasset/js/owl.carousel.min.js"></script>
<script src="{{asset('')}}shopasset/js/jquery.magnific-popup.min.js"></script>
<script src="{{asset('')}}shopasset/js/aos.js"></script>
<script src="{{asset('')}}shopasset/js/jquery.animateNumber.min.js"></script>
<script src="{{asset('')}}shopasset/js/bootstrap-datepicker.js"></script>
<script src="{{asset('')}}shopasset/js/scrollax.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
<!-- <script src="js/google-map.js"></script> -->
<script src="{{asset('')}}shopasset/js/main.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script>
  $(document).ready(function() {
    $('.navbar a.dropdown-toggle').on('click', function(e) {
     var $el = $(this);
     var $parent = $(this).offsetParent(".dropdown-menu");
     $(this).parent("li").toggleClass('open');
     if(!$parent.parent().hasClass('nav')) {
      $el.next().css({"top": $el[0].offsetTop, "left": $parent.outerWidth() - 4});
    }
    $('.nav li.open').not($(this).parents("li")).removeClass("open");
    return false;
  });
     $.ajaxSetup({
      headers:{
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    }); 
  });
$('.owl-carousel').owlCarousel({
  loop: true,
  margin: 10,
  nav: true,
  navText: [
    "<i class='fa fa-caret-left'></i>",
    "<i class='fa fa-caret-right'></i>"
  ],
 
  responsive: {
    0: {
      items: 1
    },
    600: {
      items: 3
    },
    1000: {
      items: 5
    }
  }
})

</script>
  @yield('script')
</body>
</html>