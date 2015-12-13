@extends(config('sentinel.layout'))

@section('title', 'Lupa Katalaluan')

@section('css')

@stop

@section('content')
<div class="row">
    <div class="col-md-4 col-md-offset-4">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panel-title">
                    Lupa Katalaluan anda?
                </div>
            </div>
            <div class="panel-body">
                <form method="POST" action="{{ route('sentinel.reset.request') }}" accept-charset="UTF-8">
                    <div class="form-group {{ ($errors->has('email')) ? 'has-error' : '' }}">
                        <p>Masukkan alamat e-mel yang berkaitan dengan akaun anda, dan kami akan emailkan pautan untuk menetapkan semula kata laluan anda.</p>
                        <input class="form-control" placeholder="E-mail" autofocus="autofocus" name="email" type="text" value="{{ Input::old('name') }}">
                        {!! ($errors->has('email') ? '<span class="help-block">'.$errors->first('email') : '') !!}
                    </div>
                    <input name="_token" value="{{ csrf_token() }}" type="hidden">
                    <input class="btn btn-primary btn-block" value="Hantar Pautan Menetapkan-semula" type="submit">
                </form>
            </div>
        </div>        
    </div>
</div>

@stop