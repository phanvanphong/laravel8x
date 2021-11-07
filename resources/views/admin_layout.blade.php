<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<?php
    $menus = config('menu');
?>


<!DOCTYPE html>
<head>
<title>Admin Bigshoes</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Visitors Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- bootstrap-css -->
<link rel="stylesheet" href="{{asset("public/backend/css/bootstrap.min.css")}}" >
<!-- //bootstrap-css -->
<!-- Custom CSS -->
<link href="{{asset("public/backend/css/style.css")}}" rel='stylesheet' type='text/css' />
<link href="{{asset("public/backend/css/style-responsive.css")}}" rel="stylesheet"/>
<!-- font CSS -->
<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<!-- font-awesome icons -->
<link rel="stylesheet" href="{{asset("public/backend/css/font.css")}}" type="text/css"/>
<link href="{{asset("public/backend/css/font-awesome.css")}}" rel="stylesheet"> 
<link rel="stylesheet" href="{{asset("public/backend/css/morris.css")}}" type="text/css"/>
<!-- calendar -->
<link rel="stylesheet" href="{{asset("public/backend/css/monthly.css")}}">
<!-- //calendar -->
<!-- //font-awesome icons -->
<script src="{{asset("public/backend/js/jquery2.0.3.min.js")}}"></script>
<script src="{{asset("public/backend/js/raphael-min.js")}}"></script>
<script src="{{asset("public/backend/js/morris.js")}}"></script>
<script src="//cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script>

<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">

</head>
<body>
<section id="container">
<!--header start-->
<header class="header fixed-top clearfix">
<!--logo start-->
<div class="brand">
    <a href="{{route('dashboard')}}" class="logo">
        BIGSHOES
    </a>
    <div class="sidebar-toggle-box">
        <div class="fa fa-bars"></div>
    </div>
</div>
<!--logo end-->

<div class="top-nav clearfix">
    <!--search & user info start-->
    <ul class="nav pull-right top-menu">
        <li>
            <input type="text" class="form-control search" placeholder=" Tìm kiếm ...">
        </li>
        <!-- user login dropdown start-->
        <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                <img alt="" src="{{asset("public/backend/images/3.png")}}">
                <span class="username">{{Auth::user()->name}}</span>
                <b class="caret"></b>
            </a>
            <ul class="dropdown-menu extended logout">
                <li><a href="#"><i class=" fa fa-suitcase"></i> Thông tin tài khoản</a></li>
                <li><a href="#"><i class="fa fa-cog"></i> Cài đặt</a></li>
                <li><a href="{{route('logout')}}" onclick="return confirm('Bạn muốn đăng xuất khỏi trang quảng trị ?')"><i class="fa fa-key"></i> Đăng xuất</a></li>
            </ul>
        </li>
    </ul>
    <!--search & user info end-->
</div>
</header>
<!--header end-->
<!--sidebar start-->
<aside>
    <div id="sidebar" class="nav-collapse">
        <!-- sidebar menu start-->
        <div class="leftside-navigation">
            <ul class="sidebar-menu" id="nav-accordion">
                @foreach($menus as $menu)
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa {{$menu['icon']}}"></i>
                        <span>{{$menu['label']}}</span>
                    </a>
                    <!-- Kiểm tra xem có tồn tại items không. Nếu có chạy vòng lặp foreach -->
                    @if(isset($menu['items']))
                    <ul class="sub">
                    @foreach($menu['items'] as $item)
						<li><a href="{{route($item['route'])}}">{{$item['label']}}</a></li>
                    @endforeach
                    </ul>
                    @endif
                </li>
                @endforeach
			

				<li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>QUẢN LÝ FILE</span>
                    </a>
                    <ul class="sub">
						<li><a href="{{route('file')}}">Trình quản lý file</a></li>
                    </ul>
                </li>
    </div>
</aside>
<!--sidebar end-->
<!--main content start-->
<section id="main-content">
	<section class="wrapper">
		
		@yield('admin_content')
		
</section>
 <!-- footer -->
		  <div class="footer">
			<div class="wthree-copyright">
			  <p>© 2021 Bigshoes. Website được thiết kế bởi <a href="http://w3layouts.com">phongpvpd04144</a></p>
			</div>
		  </div>
  <!-- / footer -->
</section>
<!--main content end-->
</section>
<script src="{{asset("public/backend/js/bootstrap.js")}}"></script>
<script src="{{asset("public/backend/js/jquery.dcjqaccordion.2.7.js")}}"></script>
<script src="{{asset("public/backend/js/scripts.js")}}"></script>
<script src="{{asset("public/backend/js/jquery.slimscroll.js")}}"></script>
<script src="{{asset("public/backend/js/jquery.nicescroll.js")}}"></script>
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
<script src="{{asset("public/backend/js/jquery.scrollTo.js")}}"></script>
<!-- morris JavaScript -->	

</body>
</html>
