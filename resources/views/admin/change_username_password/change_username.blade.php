@extends('layouts.master')

@section('title', 'Change Username')

@section('headername')
    Change Username
@endsection
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card m-b-30">
                <div class="card-body">
                    <div class="col-4" style="margin-left: 5%">
                        @if (Session::has('message') == 'username updated successfull')
                             <p class="alert alert-success">{{ Session::get('message') }}</p>
                        @elseif (Session::has('message') == 'new username can not be the old username!' || Session::has('message') == 'old username doesnt matched')
                            <p class="alert alert-danger">{{ Session::get('message') }}</p>
                        @endif
                       </div>
                    <div class="container">
                        <form action="{{ url('change_username') }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div>
                                <h6>Change Username</h6>
                            </div><br>

                           <div style="margin-left: 15%">
                            <div class="col-4 col-sm-4 col-lg-4 col-md-4">
                                <div class="form-group">
                                    <label for="">Old Username</label>
                                    <input type="text" name="old_email" id="" class="form-control" required>
                                </div>
                            </div>


                            <div class="col-4 col-sm-4 col-lg-4 col-md-4">
                                <div class="form-group">
                                    <label for="">New Username</label>
                                    <input type="text" name="new_email" id="" class="form-control" required>
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
