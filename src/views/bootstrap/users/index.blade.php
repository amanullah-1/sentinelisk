@extends(config('sentinel.layout'))

@section('title', 'Senarai Pengguna')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title pull-left">Senarai Pengguna</h3>
                <button class='btn btn-primary pull-right' href="{{ route('sentinel.users.create') }}">Tambah Pengguna</button>
                <div class="clearfix"></div>            
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Jenis Pengguna</th>
                        <th>Status</th>
                        <th>Options</th>
                        </thead>
                        <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->nama }}</td>
                                <td><a href="{{ route('sentinel.users.show', array($user->hash)) }}">{{ $user->email }}</a></td>
                                <?php 
                                    $userGroups = $user->getGroups(); 
                                ?>
                                <td>
                                    <ul class="list-inline">
                                    @if (count($userGroups) >= 1)
                                        @foreach ($userGroups as $group)
                                            <li>{{ $group['name'] }}</li>
                                        @endforeach
                                    @else 
                                        <li>No Group Memberships.</li>
                                    @endif
                                    </ul>
                                </td>
                                <td>@if($user->status === 'Active')Aktif @else Tidak-aktif @endif </td>
                                <td>
                                    <button class="btn btn-default" type="button" onClick="location.href='{{ route('sentinel.users.edit', array($user->hash)) }}'">Edit</button>
                                    @if ($user->status != 'Suspended')
                                        <button class="btn btn-default" type="button" onClick="location.href='{{ route('sentinel.users.suspend', array($user->hash)) }}'">Suspend</button>
                                    @else
                                        <button class="btn btn-default" type="button" onClick="location.href='{{ route('sentinel.users.unsuspend', array($user->hash)) }}'">Un-Suspend</button>
                                    @endif
                                    @if ($user->status != 'Banned')
                                        <button class="btn btn-default" type="button" onClick="location.href='{{ route('sentinel.users.ban', array($user->hash)) }}'">Ban</button>
                                    @else
                                        <button class="btn btn-default" type="button" onClick="location.href='{{ route('sentinel.users.unban', array($user->hash)) }}'">Un-Ban</button>
                                    @endif
                                    <button class="btn btn-default action_confirm" href="{{ route('sentinel.users.destroy', array($user->hash)) }}" data-token="{{ Session::getToken() }}" data-method="delete">Delete</button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                {!! $users->render() !!}
            </div>
        </div>
    </div>
</div>
@stop
