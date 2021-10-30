@extends('layouts.master')

@section('title', 'Users')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card m-b-30">
            <div class="card-body">
                <div class="col-lg-12 col-lg-offset-1">
                    <h1><i class="fa fa-users"></i> User Administration <a href="{{ route('roles.index') }}" class="btn btn-default pull-right">Roles</a>
                    <a href="{{ route('permissions.index') }}" class="btn btn-default pull-right">Permissions</a></h1>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">

                            <thead>
                                <tr>
                                    <th>Username/Email</th>
                                    <th>Conatct</th>
                                    <th>CNIC</th>
                                    <th>Address</th>
                                    <th>Date/Time Added</th>
                                    <th>User Roles</th>
                                    <th>Operations</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->contact }}</td>
                                        <td>{{ $user->cnic }}</td>
                                        <td>{{ $user->address }}</td>
                                        <td>{{ $user->date }}</td>
                                        <td>{{ $user->roles()->pluck('name')->implode(' ')  }}</td>
                                        <td>
                                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-info pull-left" style="margin-right: 3px;">Edit</a>

                                            {!! Form::open(['method' => 'DELETE', 'route' => ['users.destroy', $user->id] ]) !!}
                                            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>

                        </table>
                    </div>
                
                    <a href="{{ route('users.create') }}" class="btn btn-success">Add User</a>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection