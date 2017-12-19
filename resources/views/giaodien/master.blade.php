<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>@yield('title')</title>
<base href="{{ asset('') }}">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="@yield('description')">
<meta name="author" content="Master Huy">
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300italic,400italic,600,600italic' rel='stylesheet' type='text/css'>
<link rel="icon" href="public/giaodien/image/logo1.png" alt="logo" width="50" height="20">
<link href='http://fonts.googleapis.com/css?family=Crete+Round' rel='stylesheet' type='text/css'>
<link href="public/giaodien/css/bootstrap.css" rel="stylesheet">
<link href="public/giaodien/css/bootstrap-responsive.css" rel="stylesheet">
<link href="public/giaodien/css/style.css" rel="stylesheet">
<link href="public/giaodien/css/flexslider.css" type="text/css" media="screen" rel="stylesheet"  />
<link href="public/giaodien/css/jquery.fancybox.css" rel="stylesheet">
<link href="public/giaodien/css/cloud-zoom.css" rel="stylesheet">

<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
<!-- fav -->
<link rel="shortcut icon" href="public/giaodien/assets/ico/favicon.html">
</head>
<body>
<!-- Header Start -->
<header>

  @include('giaodien.layout.header')

  <div class="container">

  @include('giaodien.layout.menu')

  </div>
</header>
<!-- Header End -->

<div id="maincontainer">
  <!-- Slider Start-->
  {{-- @include('giaodien.layout.slide') --}}
  <!-- Slider End-->
  
  <!-- Section Start-->
  {{-- @include('giaodien.layout.otherddetail') --}}
  <!-- Section End-->
  
  @yield('content')

<!-- Footer -->
  @include('giaodien.layout.footer')
<!-- javascript
    ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="public/giaodien/js/jquery.js"></script>
<script src="public/giaodien/js/bootstrap.js"></script>
<script src="public/giaodien/js/respond.min.js"></script>
<script src="public/giaodien/js/application.js"></script>
<script src="public/giaodien/js/bootstrap-tooltip.js"></script>
<script defer src="public/giaodien/js/jquery.fancybox.js"></script>
<script defer src="public/giaodien/js/jquery.flexslider.js"></script>
<script type="text/javascript" src="public/giaodien/js/jquery.tweet.js"></script>
<script  src="js/cloud-zoom.1.0.2.js"></script>
<script  type="text/javascript" src="public/giaodien/js/jquery.validate.js"></script>
<script type="text/javascript"  src="public/giaodien/js/jquery.carouFredSel-6.1.0-packed.js"></script>
<script type="text/javascript"  src="public/giaodien/js/jquery.mousewheel.min.js"></script>
<script type="text/javascript"  src="public/giaodien/js/jquery.touchSwipe.min.js"></script>
<script type="text/javascript"  src="public/giaodien/js/jquery.ba-throttle-debounce.min.js"></script>
<script defer src="public/giaodien/js/custom.js"></script>
<script src="public/giaodien/js/myscript.js"></script>
</body>
</html>