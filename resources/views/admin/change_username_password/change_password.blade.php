@extends('layouts.master')

@section('title', 'Change Password')

@section('headername')
    Change Password
@endsection
@section('content')
    <div class="row">
        <div class="col-12">

            <div class="card m-b-30">
                <div class="card-body">
                    <div class="col-4" style="margin-left: 5%">
                        @if (Session::has('message') == 'password updated successfully')
                             <p class="alert alert-success">{{ Session::get('message') }}</p>
                        @elseif (Session::has('message') == 'new password can not be the old password!' || Session::has('message') == 'old password doesnt matched')
                            <p class="alert alert-danger">{{ Session::get('message') }}</p>
                        @endif
                       </div>
                    <div class="container">
                        <form action="{{ url('change_password') }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div>
                                <h6>Change Password</h6>
                            </div><br>

                           <div style="margin-left: 15%">
                            


                            <div class="col-4 col-sm-4 col-lg-4 col-md-4">
                                <div class="form-group">
                                    <label for="">Old Password</label>
                                    <input  name="old_password" id="" class="form-control" required type="password">
                                </div>
                            </div>

                            <div class="col-4 col-sm-4 col-lg-4 col-md-4">
                                <div class="form-group">
                                    <label for="">New Password</label>
                                    <input  name="new_password" id="" class="form-control" required type="password">
                                </div>
                            </div>
                            <div class="col-4 col-sm-4 col-lg-4 col-md-4">
                                <div class="form-group">
                                    <label>Confirm Password</label>
                                    <input type="password" class="form-control" required name="confirm_password">
                                </div>
                            </div>
                            <div class="col-6 col-sm-6 col-lg-6 col-md-6">
                                <button class="btn btn-primary" type="submit">Save Changes</button>
                            </div>
                           </div>
                           
                    </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>

@endsection
