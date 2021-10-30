@extends('layouts.master')

@section('title', 'Add Person')

@section('headername')
    @if (request()->id > 0)
        Edit Person
    @else
        Add Person
    @endif
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card m-b-30">
            <div class="card-body">
                   <div class="container">
                       @if (request()->id > 0)
                            <form action="{{ url('client_update',['id'=>$data->id]) }}"  method="POST">
                                @csrf
                                @method('PUT')
                       @else
                            <form action="{{ url('client_insert') }}"  method="POST">
                                @csrf
                       @endif
                        
                            <div class="row">
                                <div class="col-3 col-sm-3 col-lg-3 col-md-3">
                                    <div class="form-group">
                                        <label for="">Client Name</label>
                                        <input type="text" name="name" id="" class="form-control" placeholder="Enter Client name" value="{{ is_null($data->name) ? '' : $data->name }}" required>
                                    </div>
                                </div>
                                <div class="col-3 col-sm-3 col-lg-3 col-md-3">
                                    <div class="form-group">
                                        <label for="">CNIC</label>
                                        <input type="text" name="cnic" id="" class="form-control" placeholder="Enter CNIC"  required value="{{ is_null($data->cnic) ? '' : $data->cnic }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-3 col-sm-3 col-lg-3 col-md-3">
                                    <div class="form-group">
                                        <label for="">Contact</label>
                                        <input type="text" name="contact" id="" class="form-control" placeholder="Enter client contact" required value="{{ is_null($data->contact) ? '' : $data->contact }}">
                                    </div>
                                </div>
                                <div class="col-3 col-sm-3 col-lg-3 col-md-3">
                                    <div class="form-group">
                                        <label for="">Address</label>
                                        <input type="text" name="address" id="" class="form-control"  required placeholder="Enter address rate" value="{{ is_null($data->address) ? '' : $data->address }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-3 col-sm-3 col-lg-3 col-md-3">
                                    <div class="form-group">
                                        <input type="radio" name="client_type" id="" placeholder="Enter purchase amount" required value="client">
                                        <label for="client">Clients</label>
                                        <input type="radio" name="client_type" id=""  placeholder="Enter purchase amount" required value="vendor">
                                        <label for="vendor">Vendors</label>

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6 col-sm-6 col-lg-6 col-md-6">
                                    <button class="btn btn-primary" type="submit">Submit</button>
                                    <a class="btn btn-secondary" href="{{ url()->previous() }}">Back</a>

                                </div>
                            </div>
                        </form>
                   </div>
            </div>
        </div>
    </div>
</div>

@endsection