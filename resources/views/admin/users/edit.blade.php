@extends('layouts.master')

@section('title', 'Edit User')

@section('headername')
    
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card m-b-30">
            <div class="card-body">
                <div class='col-lg-8' style="margin-left: 5%">

                    <h1><i class='fa fa-user-plus'></i> Edit {{$user->name}}</h1>
                    <hr>

                    {{ Form::model($user, array('route' => array('users.update', $user->id), 'method' => 'PUT')) }}{{-- Form model binding to automatically populate our fields with user data --}}

                    <div class="container">
                        <div class="row">
                            <div class="col-4 col-sm-4 col-lg-4 col-md-4">
                                <div class="form-group">
                                    {{ Form::label('name', 'Username\Email') }}
                                    {{ Form::text('email', null, ['class' => 'form-control', 'required' => '']) }}
                                </div>
                            </div>

                            <div class="col-4 col-sm-4 col-lg-4 col-md-4">
                                <div class="form-group">
                                    {{ Form::label('contact', 'Contact') }}
                                    {{ Form::text('contact', null, ['class' => 'form-control', 'required' => '']) }}
                                </div>
                            </div>
                        </div>


                        <div class='form-group'>
                            @foreach ($roles as $role)
                                {{ Form::checkbox('roles[]',  $role->id, $user->roles) }}
                                {{ Form::label($role->name, ucfirst($role->name)) }}<br>

                            @endforeach
                        </div>
                        <div class="row">
                            <div class="col-4 col-sm-4 col-lg-4 col-md-4">
                                <div class="form-group">
                                    {{ Form::label('cnic', 'CNIC') }}<br>
                                    {{ Form::text('cnic', null, ['class' => 'form-control', 'required' => '']) }}

                                </div>
                            </div>
                            <div class="col-4 col-sm-4 col-lg-4 col-md-4">
                                <div class="form-group">
                                    {{ Form::label('date', 'Date') }}<br>
                                    {{ Form::date('date', null, ['class' => 'form-control', 'required' => '']) }}

                                </div>
                            </div>
                        </div>




                        <div class="row">
                            <div class="col-4 col-sm-4 col-lg-4 col-md-4">
                                <div class="form-group">
                                    {{ Form::label('password', 'Password') }}<br>
                                    {{ Form::password('password', ['class' => 'form-control']) }}

                                </div>
                            </div>

                            <div class="col-4 col-sm-4 col-lg-4 col-md-4">
                                <div class="form-group">
                                    {{ Form::label('password', 'Confirm Password') }}<br>
                                    {{ Form::password('password_confirmation', ['class' => 'form-control']) }}

                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-8 col-sm-8 col-lg-8 col-md-8">
                                <div class="form-group">
                                    {{ Form::label('address', 'Address') }}<br>
                                    {{ Form::text('address', null, ['class' => 'form-control', 'required' => '']) }}
                                </div>
                            </div>
                        </div>

                        {{ Form::submit('Add', ['class' => 'btn btn-primary']) }}

                        {{ Form::close() }}

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection