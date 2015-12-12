<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<title>@yield('title') - APDA</title>
	<link href="https://fonts.googleapis.com/css?family=Raleway:300,400,500,700" rel="stylesheet" type="text/css">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<!-- main css -->
	<link rel="stylesheet" href="{{ asset('assets/usap/sentinelisk/css/bootstrap.min.css') }}">
	<!-- /. main css -->
	<!-- theme css -->
	<link rel="stylesheet" href="{{ asset('assets/usap/sentinelisk/css/bootstrap-theme.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/usap/sentinelisk/css/app.css') }}">
	<!-- /. theme css -->
	<!--  css -->
	@yield('css')
	<!-- /. css -->
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->	
</head>
<body>
	<!-- Navbar -->
	@include('Sentinel::layouts/navbar')
	<!-- ./ navbar -->
	<!-- Container -->
	<div class="container">
		<!-- Notifications -->
		@include('Sentinel::layouts/notifications')
		<!-- ./ notifications -->
		<!-- Content -->
		@yield('content')
		<!-- ./ content -->
	</div>
	<!-- ./ container -->
	<!-- Footer -->
	<footer class="footer">
	    <div class="container">
	    	<p class="copyright pull-left" style="margin-bottom:0px;">&copy; {{ date('Y') }} Hakcipta Terpelihara APDA</p>
	   	</div>
	</footer>
	<!--./ footer-->

	<!-- Javascripts -->
	<script src="{{ asset('assets/usap/sentinelisk/js/jquery-2.1.4.min.js') }}"></script>
	<script src="{{ asset('assets/usap/sentinelisk/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('assets/usap/sentinelisk/js/restfulizer.js') }}"></script> 
	<!-- js -->
	@yield('js')
	<!-- ./ js -->
</body>
</html>
