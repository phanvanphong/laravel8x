<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<head>
<title>Admin Bigshoes</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Visitors Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- bootstrap-css -->
<link rel="stylesheet" href="css/bootstrap.min.css" >
<!-- //bootstrap-css -->
<!-- Custom CSS -->
<link href="{{asset("public/backend/css/style.css")}}" rel='stylesheet' type='text/css' />
<link href="{{asset("public/backend/css/style-responsive.css")}}" rel="stylesheet"/>
<!-- font CSS -->
<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<!-- font-awesome icons -->
<link rel="stylesheet" href="{{asset("public/backend/css/font.css")}}" type="text/css"/>
<link href="{{asset("public/backend/css/font-awesome.css")}}" rel="stylesheet"> 
<!-- //font-awesome icons -->
<script src="js/jquery2.0.3.min.js"></script>
</head>
<body>
<div class="log-w3">
<div class="w3layouts-main">
	<h2>ĐĂNG NHẬP</h2>
		<form action="" method="post">
			@csrf
			<div class="form-group">
			<input type="email" class="ggg" name="email" placeholder="E-MAIL" >
			@error('email')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
			<input type="password" class="ggg" name="password" placeholder="MẬT KHẨU" >
			@error('password')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror <br>
			<span><input type="checkbox" name="remember_token" />Nhớ tài khoản ?</span>
			<h6><a href="#"> Quên mật khẩu?</a></h6>
				<div class="clearfix"></div>
				<input type="submit" value="XÁC NHẬN" name="">
		</form>
		<p>Bạn chưa có tài khoản ?<a href="{{URL::to('/register')}}">Đăng ký ngay !</a></p>
</div>
</div>
<script src="{{asset("public/backend/js/bootstrap.js")}}"></script>
<script src="{{asset("public/backend/js/jquery.dcjqaccordion.2.7.js")}}"></script>
<script src="{{asset("public/backend/js/scripts.js")}}"></script>
<script src="{{asset("public/backend/js/jquery.slimscroll.js")}}"></script>
<script src="{{asset("public/backend/js/jquery.nicescroll.js")}}"></script>
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
<script src="{{asset("public/backend/js/jquery.scrollTo.js")}}"></script>
</body>
</html>
