		<div class="navbar navbar-default navbar-fixed-top">
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