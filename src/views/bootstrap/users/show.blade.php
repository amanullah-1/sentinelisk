@extends(config('sentinel.layout'))

@section('title', 'Profil')

@section('content')

    <?php
    	\Carbon\Carbon::setLocale('ms');
        // Determine the edit profile route
        if (($user->email == Sentry::getUser()->email)) {
            $editAction = route('sentinel.profile.edit');
        } else {
            $editAction =  action('\\Sentinel\Controllers\UserController@edit', [$user->hash]);
        }
    ?>

    <div class="row">
    	<div class="col-md-3">
    		<div class="thumbnail text-center">
				<img src="{{ $user->gravatar }}" alt="..." style="width: 100%;" />
				<div class="caption">
					<p>
					<button class="btn btn-primary btn-block" onClick="location.href='{{ $editAction }}'">Kemaskini profil</button>
					</p>
				</div>
			</div>
			<div class="panel panel-default">
				<div class="panel-heading">
					<div class="panel-title">
						Jenis Pengguna
					</div>
				</div>
				<div class="panel-body">
					<?php $userGroups = $user->getGroups(); ?>
					<ul>
				    	@if (count($userGroups) >= 1)
					    	@foreach ($userGroups as $group)
								<li>@if($group['name'] == 'Pengguna')Pengguna Biasa @else {{ $group['name'] }}@endif</li>
							@endforeach
						@else 
							<li>No Group Memberships.</li>
						@endif
				    </ul>
				</div>
			</div>
    	</div>
    	<div class="col-md-9">
    		@if ($user->nama)
		    	<h1><strong> {{ $user->nama }} </strong></h1>
			@endif
			<p>{{ $user->email }} &#8226; Pengguna semenjak {{ $user->created_at->diffForHumans() }}</p>
			<hr />			
			<h4>Sejarah Pengguna</h4>
			<div>
				@foreach($user->revisionHistory->reverse() as $history)
				  @if($history->key == 'nama' && !$history->old_value)
				  @elseif($history->key == 'password')
				        <li> {{ date('d/m/Y', strtotime($history->created_at)) }} - {{ $history->userResponsible()->nama }} mengemaskini katalaluan</li>
				  @else
				  @endif
				@endforeach
			</div>
    	</div>
    </div>
@stop