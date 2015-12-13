@extends(config('sentinel.layout'))

@section('title', 'Dashboard')

@section('css')

@stop

@section('content')
<div class="row">
	<div class="col-md-3">
		<div class="thumbnail text-center">
			<img src="{{ $user->gravatar }}" alt="..." style="width: 100%;">
			<div class="caption">
				<h3>{{ $user->nama }}</h3>
				<p>
				<a href="" class="btn btn-link">Papar profil</a><br>
				<a href="" class="btn btn-link">Kemaskini profil</a>
				</p>
			</div>
		</div>
	</div>
</div>
@stop

@section('js')

@stop