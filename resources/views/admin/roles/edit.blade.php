@extends('layouts.master')

@section('title', 'Edit Role')

@section('headername')
    Edit Role
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card m-b-30">
            <div class="card-body">
                <div class='col-lg-4 col-lg-offset-4'  style="margin-left: 15%">
                    <h1><i class='fa fa-key'></i> Edit Role: {{$role->name}}</h1>
                    <hr>

                    {{ Form::model($role, array('route' => array('roles.update', $role->id), 'method' => 'PUT')) }}

                    <div class="form-group">
                        {{ Form::label('name', 'Role Name') }}
                        {{ Form::text('name', null, array('class' => 'form-control')) }}
                    </div>

                    <h5><b>Assign Permissions</b></h5>
                    @foreach ($permissions as $permission)

                        {{Form::checkbox('permissions[]',  $permission->id, $role->permissions ) }}
                        {{Form::label($permission->name, ucfirst($permission->name)) }}<br>

                    @endforeach
                    <br>
                    {{ Form::submit('Edit', array('class' => 'btn btn-primary')) }}

                    {{ Form::close() }}    
                </div>
            </div>
        </div>
    </div>
</div>

@endsection