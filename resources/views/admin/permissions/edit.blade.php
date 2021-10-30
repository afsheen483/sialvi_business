@extends('layouts.master')

@section('title', 'Edit Permission')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card m-b-30">
            <div class="card-body">
               
                        <div class='col-lg-4 col-lg-offset-4'  style="margin-left: 15%">

                            <h1><i class='fa fa-key'></i> Edit {{$permission->name}}</h1>
                            {{ Form::model($permission, array('route' => array('permissions.update', $permission->id), 'method' => 'PUT')) }}{{-- Form model binding to automatically populate our fields with permission data --}}

                            <div class="form-group">
                                {{ Form::label('name', 'Permission Name') }}
                                {{ Form::text('name', null, array('class' => 'form-control')) }}
                            </div>
                            <br>
                            {{ Form::submit('Edit', array('class' => 'btn btn-primary')) }}

                            {{ Form::close() }}

                        </div>
            </div>
        </div>
    </div>
</div>

@endsection