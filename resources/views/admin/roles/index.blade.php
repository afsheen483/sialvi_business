@extends('layouts.master')

@section('title', 'Roles')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card m-b-30">
            <div class="card-body">
                <div class="col-lg-12 col-lg-offset-1">
                    <h1><i class="fa fa-key"></i> Roles

                    <a href="{{ route('users.index') }}" class="btn btn-default pull-right">Users</a>
                    <a href="{{ route('permissions.index') }}" class="btn btn-default pull-right">Permissions</a></h1>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Role</th>
                                    <th>Permissions</th>
                                    <th>Operation</th>
                                </tr>
                            </thead>

                            <tbody>
                              
                            </tbody>

                        </table>
                    </div>

                    <a href="{{ URL::to('roles/create') }}" class="btn btn-success">Add Role</a>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection