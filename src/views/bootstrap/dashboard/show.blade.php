@extends(config('sentinel.layout'))

@section('title', 'Dashboard')

@section('css')

@stop

@section('content')
<div class="row">
	<div class="col-md-3">
		<div class="thumbnail">
			<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTkOyLRxFiNWFtmRqerC-0OOoXAzmS-hwbh4XF5bLeAuUCDoZLk" alt="..." style="width: 100%;">
			<div class="caption">
				<h3 style="text-align:center;">{{ $user->nama }}</h3>
			</div>
		</div>
	</div>
</div>
@stop

@section('js')

@stop