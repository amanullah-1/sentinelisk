@extends(config('sentinel.layout'))

@section('title', 'Kemaskini Profil')

@section('content')

<?php
    // Pull the custom fields from config
    $isProfileUpdate = ($user->email == Sentry::getUser()->email);
    $customFields = config('sentinel.additional_user_fields');

    // Determine the form post route
    if ($isProfileUpdate) {
        $profileFormAction = route('sentinel.profile.update');
        $passwordFormAction = route('sentinel.profile.password');
    } else {
        $profileFormAction =  route('sentinel.users.update', $user->hash);
        $passwordFormAction = route('sentinel.password.change', $user->hash);
    }
?>

<div class="row">
    @if (is_null($user->nama))
    <div class="col-md-12">
        <div class="alert alert-info">
            <strong>Perhatian:</strong> Sila lengkapkan profil @if ($isProfileUpdate) Anda @else {{ $user->email }} @endif
        </div>
    </div>
    @endif
    <div class="col-md-3">
        @if (Sentry::getUser()->hasAccess('pentadbir') && ($user->hash != Sentry::getUser()->hash))
            @include('sentinel.layouts.thumbnail')
        @else
            @include('sentinel.layouts.sidebar')
        @endif
        
    </div>
    <div class="col-md-9">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title" style="padding-top: 0px;">
                    Profil
                    @if ($isProfileUpdate)
                        Anda
                    @else
                        {{ $user->nama }}
                    @endif
                </h3>
            </div>
            <div class="panel-body">
                @if (! empty($customFields))
                <form method="POST" action="{{ $profileFormAction }}" accept-charset="UTF-8" class="form-horizontal" role="form">
                    <input name="_method" value="PUT" type="hidden">
                    <input name="_token" value="{{ csrf_token() }}" type="hidden">
                    @foreach(config('sentinel.additional_user_fields') as $field => $rules)
                    <div class="form-group {{ ($errors->has($field)) ? 'has-error' : '' }}" for="{{ $field }}">
                        <label for="{{ $field }}" class="col-sm-3 control-label">{{ ucwords(str_replace('_',' ',$field)) }}</label>
                        <div class="col-sm-5">
                            <input class="form-control" name="{{ $field }}" type="text" value="{{ Input::old($field) ? Input::old($field) : $user->$field }}">
                            {{ ($errors->has($field) ? $errors->first($field) : '') }}
                        </div>
                    </div>
                    @endforeach
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-10">
                            <input class="btn btn-primary" value="Hantar Perubahan" type="submit">
                        </div>
                    </div>
                </form>
                @endif
            </div>
        </div>
        @if (Sentry::getUser()->hasAccess('pentadbir') && ($user->hash != Sentry::getUser()->hash))
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panel-title">
                    Jenis Pengguna
                </div>
            </div>
            <div class="panel-body">
                <form method="POST" action="{{ route('sentinel.users.memberships', $user->hash) }}" accept-charset="UTF-8" class="form-horizontal" role="form">
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-10">
                            @foreach($groups as $group)
                                <label class="checkbox-inline">
                                    <input type="checkbox" name="groups[{{ $group->name }}]" value="1" {{ ($user->inGroup($group) ? 'checked' : '') }}> {{ $group->name }}
                                </label>
                            @endforeach
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-10">
                            <input name="_token" value="{{ csrf_token() }}" type="hidden">
                            <input class="btn btn-primary" value="Update Memberships" type="submit">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title" style="padding-top: 0px;">Tukar Katalaluan</h3>
            </div>
            <div class="panel-body">
                <form method="POST" action="{{ $passwordFormAction }}" accept-charset="UTF-8" class="form-horizontal" role="form">
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
        @endif
    </div>
</div>
@stop