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
                <h3 class="panel-title" style="padding-top: 0px;">Tukar Katalaluan</h3>
            </div>
            <div class="panel-body">
                <form method="POST" action="{{ route('sentinel.profile.password') }}" accept-charset="UTF-8" class="form-horizontal" role="form">
                    @if(! Sentry::getUser()->hasAccess('pentadbir'))
                    <div class="form-group {{ $errors->has('oldPassword') ? 'has-error' : '' }}">
                        <label for="oldPassword" class="col-sm-3 control-label">Katalaluan Lama</label>
                        <div class="col-sm-5">
                            <input class="form-control" placeholder="" name="oldPassword" value="" id="oldPassword" type="password">
                        </div>
                    </div>
                    @endif
                    <div class="form-group {{ $errors->has('newPassword') ? 'has-error' : '' }}">
                        <label for="newPassword" class="col-sm-3 control-label">Katalaluan Baru</label>
                        <div class="col-sm-5">
                            <input class="form-control" placeholder="" name="newPassword" value="" id="newPassword" type="password">
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('newPassword_confirmation') ? 'has-error' : '' }}">
                        <label for="newPassword_confirmation" class="col-sm-3 control-label">Pengesahan Katalaluan</label>
                        <div class="col-sm-5">
                            <input class="form-control" placeholder="" name="newPassword_confirmation" value="" id="newPassword_confirmation" type="password">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-9">
                            <input name="_token" value="{{ csrf_token() }}" type="hidden">
                            <input class="btn btn-primary" value="Tukar Katalaluan" type="submit">
                            {!! ($errors->has('oldPassword') ? '<br />' . $errors->first('oldPassword') : '') !!}
                            {!! ($errors->has('newPassword') ?  '<br />' . $errors->first('newPassword') : '') !!}
                            {!! ($errors->has('newPassword_confirmation') ? '<br />' . $errors->first('newPassword_confirmation') : '') !!}
                        </div>
                    </div>
                </form>
            </div>
        </div>
	</div>
</div>
@endsection