@extends('layouts.master')

@section('title', 'Permissions')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card m-b-30">
            <div class="card-body">
                    <div class="col-lg-12 col-lg-offset-1">
                        <h1><i class="fa fa-key"></i>Available Permissions

                        <a href="{{ route('users.index') }}" class="btn btn-default pull-right">Users</a>
                        <a href="{{ route('roles.index') }}" class="btn btn-default pull-right">Roles</a></h1>
                        <hr>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">

                                <thead>
                                    <tr>
                                        <th>Permissions</th>
                                        <th>Operation</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  
                                </tbody>
                            </table>
                        </div>

                        <a href="{{ URL::to('permissions/create') }}" class="btn btn-success">Add Permission</a>

                    </div>
            </div>
        </div>
    </div>
</div>


@endsection