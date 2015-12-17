<ul class="nav nav-pills nav-stacked">
	<li role="presentation" {!! (Request::is('tetapan/profil') ? 'class="active"' : '') !!}><a href="{{ route('sentinel.profile.edit') }}">Profil</a></li>
	<li role="presentation" {!! (Request::is('tetapan/akaun') ? 'class="active"' : '') !!}><a href="{{ route('sentinel.tetapan.akaun') }}">Akaun</a></li>
	<li role="presentation" {!! (Request::is('tetapan/katalaluan') ? 'class="active"' : '') !!}><a href="{{ route('sentinel.profile.getPassword') }}">Katalaluan</a></li>
</ul>
<div class="clearfix"><br></div>