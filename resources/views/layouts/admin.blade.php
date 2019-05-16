<!doctype html>
<html class="no-js" lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Star Lotus</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="{{asset('')}}shopasset/images/logo.png">
    <!-- favicon
      ============================================ -->
      <link rel="shortcut icon" type="image/x-icon" href="">
    <!-- Google Fonts
      ============================================ -->
      <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
    <!-- Bootstrap CSS
      ============================================ -->
      <link rel="stylesheet" href="{{asset('admin/css/bootstrap.min.css')}}">
    <!-- Bootstrap CSS
      ============================================ -->
      <link rel="stylesheet" href="{{asset('admin/css/font-awesome.min.css')}}">
      
      <link rel="stylesheet" href="{{asset('admin/css/owl.transitions.css')}}">
    <!-- animate CSS
      ============================================ -->
      <link rel="stylesheet" href="{{asset('admin/css/animate.css')}}">

    <!-- meanmenu icon CSS
      ============================================ -->
      <link rel="stylesheet" href="{{asset('admin/css/meanmenu.min.css')}}">
    <!-- main CSS
      ============================================ -->
      <link rel="stylesheet" href="{{asset('admin/css/main.css')}}">
    <!-- educate icon CSS
      ============================================ -->
      <link rel="stylesheet" href="{{asset('admin/css/educate-custon-icon.css')}}">
    <!-- morrisjs CSS
      ============================================ -->
      <link rel="stylesheet" href="{{asset('admin/css/morris.css')}}">
    <!-- mCustomScrollbar CSS
      ============================================ -->
      <link rel="stylesheet" href="{{asset('admin/css/jquery.mCustomScrollbar.min.css')}}">
    <!-- metisMenu CSS
      ============================================ -->
      <link rel="stylesheet" href="{{asset('admin/css/metisMenu/metisMenu.min.css')}}">
      <link rel="stylesheet" href="{{asset('admin/css/metisMenu/metisMenu-vertical.css')}}">
    <!-- calendar CSS
      ============================================ -->
      <link rel="stylesheet" href="{{asset('admin/css/calendar/fullcalendar.min.css')}}">
      <link rel="stylesheet" href="{{asset('admin/css/calendar/fullcalendar.print.min.css')}}">
    <!-- style CSS
      ============================================ -->
      <link rel="stylesheet" href="{{asset('admin/css/style.css')}}">
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <!-- responsive CSS
      ============================================ -->
      <link rel="stylesheet" href="{{asset('admin/css/responsive.css')}}">
    <!-- modernizr JS
      ============================================ -->

      <!-- datatable  -->
      <link rel="stylesheet" href="http://cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
      <!-- toastr -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">

      <script src="{{asset('admin/js/modernizr-2.8.3.min.js')}}"></script>
      <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/css/fileinput.css" media="all" rel="stylesheet" type="text/css"/>
    </head>
    <style type="text/css">
    .file-drop-zone {
      height: 300px !important;

    }
    .process-wrap {
      width: 100%;
      display: block;
      float: left;
    }

    .process {
      position: relative;
      float: left;
      width: 33.333%;
      z-index: 0;
    }
    .process:after {
      position: absolute;
      top: 35%;
      right: -37%;
      content: '';
      width: 100%;
      height: 1px;
      background: #f0f0f0;
      z-index: -1; 
    }
    .process:last-child:after {
      display: none;
    }
    .process p {
      position: relative;
      width: 80px;
      height: 80px;
      display: table;
      border: 2px solid #fafafa;
      margin: 0 auto;
      margin-bottom: 20px;
      background: #fff;
      z-index: 1;
      font-weight: 400;
      -webkit-border-radius: 50%;
      -moz-border-radius: 50%;
      -ms-border-radius: 50%;
      border-radius: 50%;
    }
    .process p span {
      display: table-cell;
      vertical-align: middle;
    }
    .process h3 {
      margin-bottom: 0;
      font-size: 12px;
      text-transform: uppercase;
      letter-spacing: 1px;
    }
    .process.active p {
      border: 2px solid #f0f0f0; 
    }
    .process.active p span {
      color: #FFC300;
    }
  </style>
  <body>

    <div class="left-sidebar-pro">
      <nav id="sidebar" class="">
        <div class="sidebar-header">
          <a href="index.html"><img class="" src="{{asset('')}}shopasset/images/logo.png" alt="" /></a>
          <strong><a href="index.html"><img src="" alt="" /></a></strong>
        </div>
        <div class="left-custom-menu-adp-wrap comment-scrollbar">
          <nav class="sidebar-nav left-sidebar-menu-pro">
            <ul class="metismenu" id="menu1">
              <li>
                <a  href="{{asset('/category/list')}}" aria-expanded="false" title="Danh Mục"> <i class="fas fa-bars"></i> <span class="mini-click-non">Quản lí Danh Mục</span></a>
              </li>
              <li>
                <a  href="{{asset('/product/list')}}" aria-expanded="false" title="Sản Phẩm"> <i class="fas fa-cart-arrow-down" ></i><span class="mini-click-non">Quản lí Sản Phẩm</span></a>
              </li>
              <li>
                <a  href="{{asset('/news/list')}}" aria-expanded="false" title="Tin Tức" > <i class="fas fa-newspaper"></i><span class="mini-click-non">Quản lí Tin Tức</span></a>
              </li>
              <li>
                <a  href="{{asset('/sale/list')}}" aria-expanded="false" title=" Bán Hàng"> <i class="fa fa-shopping-basket"></i><span class="mini-click-non">Quản lí Bán Hàng</span></a>
              </li>
              <li>
                <a  href="{{asset('/statistic/list')}}" aria-expanded="false" title=" Thống Kê"><i class="fa fa-area-chart" aria-hidden="true"></i><span class="mini-click-non">Quản lí Thống Kê</span></a>
              </li>

            </ul>
          </nav>
        </div>
      </nav>
    </div>
    <!-- End Left menu area -->
    <!-- Start Welcome area -->
    <div class="all-content-wrapper">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="logo-pro">
              <a href="index.html"><img class="main-logo" src="img/logo/logo.png" alt="" /></a>
            </div>
          </div>
        </div>
      </div>
      <div class="header-advance-area">
        <div class="header-top-area">
          <div class="container-fluid">
            <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="header-top-wraper">
                  <div class="row">
                    <div class="col-lg-1 col-md-0 col-sm-1 col-xs-12">
                      <div class="menu-switcher-pro">
                        <button type="button" id="sidebarCollapse" class="btn bar-button-pro header-drl-controller-btn btn-info navbar-btn">
                          <i class="fas fa-home"></i>
                        </button>
                      </div>
                    </div>
                    <div class="col-lg-6 col-md-7 col-sm-6 col-xs-12">
                      <div class="header-top-menu tabl-d-n">

                      </div>
                    </div>
                    <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                      <div class="header-right-info">
                        <ul class="nav navbar-nav mai-top-nav">
                          <li class="nav-item dropdown ">
                            <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle" style="padding:0; color:white">{{ Auth::user()->name }} <span class="angle-down-topmenu"></span></a>
                            <div role="menu" class="dropdown-menu animated zoomIn">

                             <a class="dropdown-item btn-default btn" href="{{ route('logout') }}"
                             onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                             {{ __('Logout') }}
                           </a>

                           <form id="logout-form" action="{{ route('logout') }}" method="POST" >
                            @csrf
                          </form>

                        </div>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Mobile Menu start -->
    <div class="mobile-menu-area">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="mobile-menu">
              <nav id="dropdown">
                <ul class="mobile-menu-nav">
                  <li><a href="#">Quản lí Danh mục</a></li>
                  <li><a href="#">Quản lí sản phẩm</a></li>
                  <li><a href="#">Quản lí Tin tức </a></li>
                  <li><a href="#">Quản lí Bán Hàng</a></li>
                </ul>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Mobile Menu end -->
    <div class="breadcome-area">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="breadcome-list">
              <div class="row">
                                    <!-- <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="breadcome-heading">
                                            <form role="search" class="sr-input-func">
                                                <input type="text" placeholder="Search..." class="search-int form-control">
                                                <a href="#"><i class="fa fa-search"></i></a>
                                            </form>
                                        </div>
                                      </div> -->
                                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ">
                                        <ul class="breadcome-menu">
                                          <li><a href="#">Home</a> <span class="bread-slash">/</span>
                                          </li>
                                          <li><span class="bread-blod">@yield("page")</span>
                                          </li>
                                        </ul>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="container-fluid">
                          @yield("content_admin")
                        </div>


                        <div class="footer-copyright-area">
                          <div class="container-fluid">
                            <div class="row">
                              <div class="col-lg-12">
                                <div class="footer-copy-right">
                                  <p>Copyright © 5/2019. All rights reserved. Template by <a href="https://www.facebook.com/yelloww.strawberry">QT</a></p>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      @yield("ahihi")

    <!-- jquery
      ============================================ -->
      <script src="{{asset('admin/js/jquery-1.12.4.min.js')}}"></script>

      <!-- Latest compiled and minified CSS & JS -->

    <!-- bootstrap JS
      ============================================ -->
      <script src="{{asset('admin/js/bootstrap.min.js')}}"></script>
    <!-- wow JS
      ============================================ -->
      <script src="{{asset('admin/js/wow.min.js')}}"></script>
    <!-- price-slider JS
      ============================================ -->
      <script src="{{asset('admin/js/jquery-price-slider.js')}}"></script>
    <!-- meanmenu JS
      ============================================ -->
      <script src="{{asset('admin/js/jquery.meanmenu.js')}}"></script>
    <!-- owl.carousel JS
      ============================================ -->
      <script src="{{asset('admin/js/owl.carousel.min.js')}}"></script>
    <!-- sticky JS
      ============================================ -->
      <script src="{{asset('admin/js/jquery.sticky.js')}}"></script>
    <!-- scrollUp JS
      ============================================ -->
      <script src="{{asset('admin/js/jquery.scrollUp.min.js')}}"></script>
    <!-- counterup JS
      ============================================ -->
      <script src="{{asset('admin/js/counterup/jquery.counterup.min.js')}}"></script>
      <script src="{{asset('admin/js/counterup/waypoints.min.js')}}"></script>
      <script src="{{asset('admin/js/counterup/counterup-active.js')}}"></script>
    <!-- mCustomScrollbar JS
      ============================================ -->
      <script src="{{asset('admin/js/scrollbar/jquery.mCustomScrollbar.concat.min.js')}}"></script>
      <script src="{{asset('admin/js/scrollbar/mCustomScrollbar-active.js')}}"></script>
    <!-- metisMenu JS
      ============================================ -->
      <script src="{{asset('admin/js/metisMenu/metisMenu.min.js')}}"></script>
      <script src="{{asset('admin/js/metisMenu/metisMenu-active.js')}}"></script>
    <!-- morrisjs JS
      ============================================ -->
      <script src="{{asset('admin/js/morrisjs/raphael-min.js')}}"></script>
      <script src="{{asset('admin/js/morrisjs/morris.js')}}"></script>
      <script src="{{asset('admin/js/morrisjs/home3-active.js')}}"></script>

    <!-- plugins JS
      ============================================ -->
      <script src="{{asset('admin/js/plugins.js')}}"></script>
    <!-- main JS
      ============================================ -->
      <script src="{{asset('admin/js/main.js')}}"></script>
    <!-- tawk chat JS
      ============================================ -->
      <!-- datatable -->
      <script src="http://cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
      <!-- toastr -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
      {{-- ckeditor --}}
      <script src="https://cdn.ckeditor.com/4.11.4/standard/ckeditor.js"></script>
      {{-- sweetalert --}}
      <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/js/fileinput.js" type="text/javascript"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/themes/fa/theme.js" type="text/javascript"></script>
    </body>
    @yield('script')
    </html>

