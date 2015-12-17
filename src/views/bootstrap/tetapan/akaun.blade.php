@extends(config('sentinel.layout'))

@section('title', 'Tetapan')

@section('content')
<div class="row">
	<div class="col-md-3">
		@include('sentinel.layouts.sidebar')
	</div>
	<div class="col-md-9">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title" style="padding-top: 0px;">Akaun</h3>
			</div>
			<div class="panel-body">
                <form method="POST" action="{{ route('sentinel.users.update') }}" accept-charset="UTF-8" class="form-horizontal" role="form">
                    <input name="_method" value="PUT" type="hidden">
                    <input name="_token" value="{{ csrf_token() }}" type="hidden">
                    <div class="form-group" for="username">
                        <label for="username" class="col-sm-3 control-label">No. MyKad</label>
                        <div class="col-sm-5">
                            <input class="form-control" name="username" type="text" value="{{ $user['username'] }}" readonly />
                            {{ ($errors->has('username') ? $errors->first('username') : '') }}
                        </div>
                    </div>
                    <div class="form-group" for="email">
                        <label for="email" class="col-sm-3 control-label">Email</label>
                        <div class="col-sm-5">
                            <input class="form-control" name="email" type="text" value="{{ $user['email'] }}" readonly />
                            {{ ($errors->has('email') ? $errors->first('email') : '') }}
                        </div>
                    </div>
                </form>
			</div>
		</div>
	</div>
</div>
@endsection