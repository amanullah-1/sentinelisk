		<div class="navbar navbar-default navbar-fixed-top">
	      <div class="container">
	        <div class="navbar-header">
	          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	          </button>
	          <a class="navbar-brand" href="{{ route('home') }}"><strong><span style="color:#d9534f;">AP</span><span style="color:#337ab7;">DA</strong></a>
	        </div>
	        <div class="collapse navbar-collapse">
	          	<ul class="nav navbar-nav">
					@if (Sentry::check())
						<li><a href="#">Dashboard</a></li>
					@endif	          		
					@if (Sentry::check() && Sentry::getUser()->hasAccess('pentadbir'))
						<li class="dropdown {{ (Request::is('pentadbir*') ? 'active' : '') }}">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Pentadbir <span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li class="dropdown-submenu">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown">Pengguna</a>
									<ul class="dropdown-menu">
										<li {!! (Request::is('users*') ? 'class="active"' : '') !!}><a href="{{ action('\\Sentinel\Controllers\UserController@index') }}">Senarai Pengguna</a></li>
										<li {!! (Request::is('groups*') ? 'class="active"' : '') !!}><a href="{{ action('\\Sentinel\Controllers\GroupController@index') }}">Kumpulan Pengguna</a></li>
									</ul>
								</li>
							</ul>
						</li>
					@endif
	          </ul>
	          <ul class="nav navbar-nav navbar-right">
	            @if (Sentry::check())
	            <li class="dropdown">
	            	<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Sentry::getUser()->nama }} <span class="caret"></span></a>
	            	<ul class="dropdown-menu" role="menu">
	            		<li>
	            			<a href="{{ route('sentinel.profile.show') }}">Profil</a></li>
	            		<li class="divider"></li>
	            		<li>
							<a href="{{ route('sentinel.logout') }}">Log Keluar</a>
						</li>
	            	</ul>	
	           </li>			
				@else
				<li {!! (Request::is('login') ? 'class="active"' : '') !!}><a href="{{ route('sentinel.login') }}">Log Masuk</a></li>
				<li {!! (Request::is('users/create') ? 'class="active"' : '') !!}><a href="{{ route('sentinel.register.form') }}">Daftar</a></li>
				@endif
	          </ul>
	        </div><!--/.nav-collapse -->
	      </div>
	    </div>