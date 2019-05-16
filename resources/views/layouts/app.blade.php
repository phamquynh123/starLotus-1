<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title></title>

  <!-- Scripts -->
 
<link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <link rel="icon" type="image/png" href="{{ asset('')}}admin/img/favicon.ico"/>
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="{{ asset('')}}admin/css/bootstrap.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="{{ asset('')}}admin/css/font-awesome.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="{{ asset('')}}admin/css/animate.css">
<!--===============================================================================================-->  
  <link rel="stylesheet" type="text/css" href="{{ asset('')}}admin/css/hamburgers.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="{{ asset('')}}admin/css/select2.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="{{ asset('')}}admin/css/util.css">
  <link rel="stylesheet" type="text/css" href="{{ asset('')}}admin/css/mainL.css">
  
</head>
<body>
  <main class="py-4">
    @yield('content1')
  </main>
  
</body>
  <script src="{{ asset('')}}admin/js/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
  <script src="{{ asset('')}}admin/js/popper.js"></script>
  <script src="{{ asset('')}}admin/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
  <script src="{{ asset('')}}admin/js/select2.min.js"></script>
<!--===============================================================================================-->
  <script src="{{ asset('')}}admin/js/tilt.jquery.min.js"></script>
  <script >
    $('.js-tilt').tilt({
      scale: 1.1
    })
  </script>
<!--===============================================================================================-->
  {{-- <script src="{{ asset('')}}admin/js/main.js"></script> --}}
</html>
