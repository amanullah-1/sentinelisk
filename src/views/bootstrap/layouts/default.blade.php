<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<title>@yield('title') - APDA</title>
	<link href="https://fonts.googleapis.com/css?family=Raleway:300,400,500,700" rel="stylesheet" type="text/css">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<!-- Main CSS -->
	<link rel="stylesheet" href="{{ asset('assets/usap/sentinelisk/css/bootstrap.min.css') }}">
	<!-- Theme CSS -->
	<link rel="stylesheet" href="{{ asset('assets/usap/sentinelisk/css/bootstrap-theme.min.css') }}">
	<style type="text/css">
		html {
			position: relative;
			min-height: 100%;
		}

		body {
			font-family: 'Raleway';
			padding-top: 70px;
			margin-bottom: 60px;
		}
		footer {
		  position: absolute;
		  bottom: 0;
		  width: 100%;
		  /* Set the fixed height of the footer here */
		  /*height: 60px;*/
		  padding: 20px 0;
		  color: #EEEEEE;
		  background-color: #444444;
		}

		.jumbotron {
		  background: url('https://abstracthdwallpapers.files.wordpress.com/2012/07/jelly-bean-android-nexus_7-wallpapers-1680x10501.jpg') no-repeat center center;
		  color: #eeeeee;
		  text-align: center;
		 }

		.home {
			font-weight: bolder;
		}

		.btn-utama {
		    color: #EEEEEE;
		    background-color: #BD4753;
		    border-color: #803C4B;
		}
		.dropdown-submenu {
			position: relative;
			}
		.dropdown-submenu>.dropdown-menu {
			top: 0;
			left: 100%;
			margin-top: -6px;
			margin-left: -1px;
			-webkit-border-radius: 0 6px 6px 6px;
			-moz-border-radius: 0 6px 6px;
			border-radius: 0 6px 6px 6px;
			}
		.dropdown-submenu:hover>.dropdown-menu {
			display: block;
			}
		.dropdown-submenu>a:after {
			display: block;
			content: " ";
			float: right;
			width: 0;
			height: 0;
			border-color: transparent;
			border-style: solid;
			border-width: 5px 0 5px 5px;
			border-left-color: #ccc;
			margin-top: 5px;
			margin-right: -10px;
			}
		.dropdown-submenu:hover>a:after {
			border-left-color: #fff;
			}
		.dropdown-submenu.pull-left {
			float: none;
			}
		.dropdown-submenu.pull-left>.dropdown-menu {
			left: -100%;
			margin-left: 10px;
			-webkit-border-radius: 6px 0 6px 6px;
			-moz-border-radius: 6px 0 6px 6px;
			border-radius: 6px 0 6px 6px;
			}
		* {
			border-radius: 0 !important;
			}
	</style>
	@yield('css')
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

		<!-- Javascripts
		================================================== -->
		<script src="{{ asset('assets/usap/sentinelisk/js/jquery-2.1.4.min.js') }}"></script>
		<script src="{{ asset('assets/usap/sentinelisk/js/bootstrap.min.js') }}"></script>
		<script src="{{ asset('assets/usap/sentinelisk/js/restfulizer.js') }}"></script> 
		<!-- Thanks to Zizaco for the Restfulizer script.  http://zizaco.net  -->
	</body>
</html>
