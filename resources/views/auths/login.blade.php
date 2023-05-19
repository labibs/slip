<!doctype html>
<html lang="en" class="fullscreen-bg">

<head>
	<title>Login | PT. Kalisha Utama Ghani</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="{{asset('admin/assets/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('admin/assets/vendor/font-awesome/css/font-awesome.min.css')}}">
	<link rel="stylesheet" href="{{asset('admin/assets/vendor/linearicons/style.css')}}">
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="{{asset('admin/assets/css/main.css')}}">
	<!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
	<link rel="stylesheet" href="{{asset('admin/assets/css/demo.css')}}">
	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
	<!-- ICONS -->
	<link rel="apple-touch-icon" sizes="76x76" href="{{asset('admin/assets/img/jne.jpg')}}">
	<link rel="icon" type="image/png" sizes="96x96" href="{{asset('admin/assets/img/jne.jpg')}}">
</head>

<body>
	<!-- WRAPPER -->
	<div id="wrapper">
	<div class="vertical-align-wrap">
	<div class="vertical-align-middle">
	<div class="auth-box ">
	<div class="left">
	<div class="content">
	<div class="header">
	<div class="logo text-center">
		<img src="{{asset('admin/assets/img/kug.png')}}" alt="Klorofil Logo">
	</div>
		<p class="lead">Silahkan Login</p>
	</div>
	  <form class="form-auth-small" action="/slip/public/postlogin" method="POST">
    {{csrf_field()}}
	<div class="form-group">
	 <label for="signin-email" class="control-label sr-only">Email</label>
		<input name="email" type="email" class="form-control" id="signin-email"  placeholder="CXP ( NIK 8 angka ) @kug.com">
	</div>
	<div class="form-group">
	 <label for="signin-password" class="control-label sr-only">Password</label>
		<input name="password" type="password" class="form-control" id="signin-password"  placeholder="Password">
	</div>
	 <button type="submit" class="btn btn-primary btn-lg btn-block">LOGIN</button>
		  <center>	<a href="https://api.whatsapp.com/send?phone=62895603389395&amp;text=minta%20email%20dan%20password%20untuk%20cek%20slipgaji" class="btn btn-success">Info Email dan Password</a> </center>
		</form>
	</div>
	</div>
	<div class="right">
	<div class="overlay"></div>
	<div class="content text">
	 <h1 class="heading">Sistem Informasi Penggajian Karyawan</h1>
		<p>By Labib Suturi</p>
	</div>
	</div>
	<div class="clearfix"></div>
	</div>
  </div>
  </div>
	</div>
	<!-- END WRAPPER -->
</body>

</html>
