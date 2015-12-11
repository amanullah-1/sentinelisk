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
	<link rel="stylesheet" href="{{ asset('packages/rydurham/sentinel/css/bootstrap.min.css') }}">
	<!-- Theme CSS -->
	<link rel="stylesheet" href="{{ asset('packages/rydurham/sentinel/css/bootstrap-theme.min.css') }}">
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
		<div class="navbar navbar-inverse navbar-fixed-top">
	      <div class="container">
	        <div class="navbar-header">
	          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	          </button>
	          <a class="navbar-brand" href="{{ route('home') }}">APDA</a>
	        </div>
	        <div class="collapse navbar-collapse">
	          <ul class="nav navbar-nav">
				@if (Sentry::check() && Sentry::getUser()->hasAccess('admin'))
					<li {!! (Request::is('users*') ? 'class="active"' : '') !!}><a href="{{ action('\\Sentinel\Controllers\UserController@index') }}">Users</a></li>
					<li {!! (Request::is('groups*') ? 'class="active"' : '') !!}><a href="{{ action('\\Sentinel\Controllers\GroupController@index') }}">Groups</a></li>
				@endif
	          </ul>
	          <ul class="nav navbar-nav navbar-right">
	            @if (Sentry::check())
				<li {!! (Request::is('profile') ? 'class="active"' : '') !!}><a href="{{ route('sentinel.profile.show') }}">{{ Sentry::getUser()->email }}</a>
				</li>
				<li>
					<a href="{{ route('sentinel.logout') }}">Logout</a>
				</li>
				@else
				<li {!! (Request::is('login') ? 'class="active"' : '') !!}><a href="{{ route('sentinel.login') }}">Login</a></li>
				<li {!! (Request::is('users/create') ? 'class="active"' : '') !!}><a href="{{ route('sentinel.register.form') }}">Register</a></li>
				@endif
	          </ul>
	        </div><!--/.nav-collapse -->
	      </div>
	    </div>
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
		<footer class="footer">
	        <div class="container">
	            <p class="copyright pull-left" style="margin-bottom:0px;">&copy; {{ date('Y') }} Hakcipta Terpelihara APDA | <a href="http://www.adk.gov.my/" target="_blank" style="color: #BC5451; text-decoration: none;">Agensi Antidadah Kebangsaan</a></p>
	        </div>
	    </footer><!--//footer-->

		<!-- Javascripts
		================================================== -->
		<script src="{{ asset('packages/rydurham/sentinel/js/jquery-2.1.3.min.js') }}"></script>
		<script src="{{ asset('packages/rydurham/sentinel/js/bootstrap.min.js') }}"></script>
		<script src="{{ asset('packages/rydurham/sentinel/js/restfulizer.js') }}"></script> 
		<!-- Thanks to Zizaco for the Restfulizer script.  http://zizaco.net  -->
	</body>
</html>
