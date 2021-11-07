<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Giày đẹp BIGSHOES</title>
    <link href="{{url('public')}}/frontend/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{url('public')}}/frontend/fonts/font-awesome.min.css" rel="stylesheet">
    <link href="{{url('public')}}/frontend/css/prettyPhoto.css" rel="stylesheet">
    <link href="{{url('public')}}/frontend/css/price-range.css" rel="stylesheet">
    <link href="{{url('public')}}/frontend/css/animate.css" rel="stylesheet">
	<link href="{{url('public')}}/frontend/css/main.css" rel="stylesheet">
	<link href="{{url('public')}}/frontend/css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{url('public')}}/frontend/images/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{url('public')}}/frontend/images/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{url('public')}}/frontend/images/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="{{url('public')}}/frontend/images/apple-touch-icon-57-precomposed.png">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
</head><!--/head-->

<body>
	<header id="header"><!--header-->
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<li><a href="#"><i class="fa fa-phone"></i class> + 0909.009.009</a></li>
								<li><a href="#"><i class="fa fa-envelope"></i> bigshoes@gmail.com</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="social-icons pull-right">
							<ul class="nav navbar-nav">
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
								<li><a href="#"><i class="fa fa-dribbble"></i></a></li>
								<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header_top-->
		
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left">
							<a href="{{route('home.index')}}"><img src="{{url('public')}}/frontend/images/logo1.jpg" alt="" /></a>
						</div>
						<div class="btn-group pull-right">
							<div class="btn-group">
								<button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
									Việt Nam
									<span class="caret"></span>
								</button>
								<ul class="dropdown-menu">
									<li><a href="#">Canada</a></li>
									<li><a href="#">UK</a></li>
								</ul>
							</div>
							
							<div class="btn-group">
								<button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
									VNĐ
									<span class="caret"></span>
								</button>
								<ul class="dropdown-menu">
									<li><a href="#">Canadian Dollar</a></li>
									<li><a href="#">Pound</a></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
								<li><a href="#"><i class="fa fa-user"></i> Tài khoản</a></li>
								<li><a href="{{route('checkout')}}"><i class="fa fa-crosshairs"></i> Thanh toán</a></li>
								<li><a href="{{route('cart.show_cart')}}"><i class="fa fa-shopping-cart"></i> Giỏ hàng</a></li>
								@if(Auth::guard('cus')->check())
								<li><a href="{{route('myorder',Auth::guard('cus')->user()->id)}}"><i class="fa fa-book"></i> Đơn hàng của bạn</a></li>
								<li><a href="{{route('home.logout')}}"><i class="fa fa-lock"></i> Đăng xuất</a></li>
								@else
								<li><a href="{{route('home.login')}}"><i class="fa fa-lock"></i> Đăng nhập</a></li>
								@endif
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
	
		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-9">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li><a href="{{route('home.index')}}" class="active">TRANG CHỦ</a></li>
								<li><a href="{{route('home.about')}}">GIỚI THIỆU</a></li>
								<li class="dropdown"><a href="{{route('home.index')}}">SẢN PHẨM<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
										@foreach($brand as $key => $value)
                                        <li><a href="{{route('related_brand',$value->id)}}">{{$value->brand_name}}</a></li>
										@endforeach
                                    </ul>
                                </li> 
								<li class="dropdown"><a href="#">TIN TỨC<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
										<li><a href="{{route('home.blog')}}">Tin khuyến mãi</a></li>
										<li><a href="{{route('home.blog')}}">Tin thời trang</a></li>
                                    </ul>
                                </li> 
								<li><a href="{{route('home.contact')}}">LIÊN HỆ</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="search_box pull-right">
							<input type="text" placeholder="Tìm kiếm ..."/>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->

	
	

    @yield('content')



  <footer id="footer"><!--Footer-->
		<div class="footer-widget">
			<div class="container">
				<div class="row">
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>VỀ BIGSHOES</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Trang chủ</a></li>
								<li><a href="#">Giới thiệu</a></li>
								<li><a href="#">Sản phẩm</a></li>
								<li><a href="#">Tin tức</a></li>
								<li><a href="#">Liên hệ</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>HỖ TRỢ</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Trung tâm trợ giúp</a></li>
								<li><a href="#">Hướng dẫn mua hàng</a></li>
								<li><a href="#">Hướng dẫn chọn size</a></li>
								<li><a href="#">Giải quyết khiếu nại</a></li>
								<li><a href="#">Liên hệ truyền thông</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>CHÍNH SÁCH</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Chính sách bảo mật</a></li>
								<li><a href="#">Mua hàng và vận chuyển</a></li>
								<li><a href="#">Trả hàng & hoàn tiền</a></li>
								<li><a href="#">Thanh toán & vận chuyển</a></li>
								<li><a href="#">Chính sách bảo hành</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>THEO DÕI CHÚNG TÔI</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">Facebook</a></li>
								<li><a href="#">Instagram</a></li>
								<li><a href="#">Zalo</a></li>
								<li><a href="#">TikTok</a></li>
								<li><a href="#">Shoppe</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-3 col-sm-offset-1">
						<div class="single-widget">
							<h2>TIN KHUYẾN MÃI</h2>
							<form action="#" class="searchform">
								<input type="text" placeholder="Nhập email của bạn ..." />
								<button type="submit" class="btn btn-default"><span style="color:white;font-size:10px">GỬI</span></button>
								<p>Nhập địa chỉ email vào đây để nhận<br />được các tin tức khuyến mãi...</p>
							</form>
						</div>
					</div>
					
				</div>
			</div>
		</div>
		
		<div class="footer-bottom">
			<div class="container">
				<div class="row">
					<p class="pull-left">Copyright © 2021 BIGSHOES Inc. All rights reserved.</p>
					<p class="pull-right">Thiết kế bởi <span><a target="_blank" href="http://www.themeum.com">phongpvpd04144</a></span></p>
				</div>
			</div>
		</div>
		
	</footer><!--/Footer-->
	

  
    <script src="{{url('public')}}/frontend/js/jquery.js"></script>
	<script src="{{url('public')}}/frontend/js/bootstrap.min.js"></script>
	<script src="{{url('public')}}/frontend/js/jquery.scrollUp.min.js"></script>
	<script src="{{url('public')}}/frontend/js/price-range.js"></script>
    <script src="{{url('public')}}/frontend/js/jquery.prettyPhoto.js"></script>
    <script src="{{url('public')}}/frontend/js/main.js"></script>
</body>
</html>