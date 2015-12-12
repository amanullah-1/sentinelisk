@extends(config('sentinel.layout'))

@section('title', 'Log Masuk')

@section('css')

@stop

@section('content')
<div class="row">
    <div class="col-md-4 col-md-offset-4">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panel-title">
                    Log Masuk
                </div>
            </div>
            <div class="panel-body">
                <form method="POST" action="{{ route('sentinel.session.store') }}" accept-charset="UTF-8">
                    <div class="form-group {{ ($errors->has('email')) ? 'has-error' : '' }}">
                        <input class="form-control" placeholder="Email" autofocus="autofocus" name="email" type="text" value="{{ Input::old('email') }}">
                        {{ ($errors->has('email') ? $errors->first('email') : '') }}
                    </div>
                    <div class="form-group {{ ($errors->has('password')) ? 'has-error' : '' }}">
                        <input class="form-control" placeholder="Password" name="password" value="" type="password">
                        {{ ($errors->has('password') ?  $errors->first('password') : '') }}
                    </div>
                    <div class="checkbox">
                        <label>
                            <input name="rememberMe" value="rememberMe" type="checkbox"> Remember Me
                        </label>
                    </div>
                    <input name="_token" value="{{ csrf_token() }}" type="hidden">
                    <input class="btn btn-primary" value="Sign In" type="submit">
                    <a class="btn btn-link" href="{{ route('sentinel.forgot.form') }}">Forgot Password</a>
                </form>
            </div>
        </div>
    </div>
</div>
@stop

@section('js')

@stop
