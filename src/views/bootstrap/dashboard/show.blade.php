@extends(config('sentinel.layout'))

@section('title', 'Dashboard')

@section('css')

@stop

@section('content')
<div class="row">
	<div class="col-md-3">
		@include('sentinel.layouts.thumbnail')
	</div>
</div>
@stop

@section('js')

@stop