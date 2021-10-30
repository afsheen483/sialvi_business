@extends('layouts.master')

@section('title', 'Purchase')

@section('headername')
    @if (request()->id > 0)
        Edit Purchase
    @else
        Add Purchase
    @endif
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card m-b-30">
            <div class="card-body">
                   <div class="container">
                       @if (request()->id > 0)
                            <form action="{{ url('purchase_update',['id'=>$data->id]) }}"  method="POST">
                                @csrf
                                @method('PUT')
                       @else
                            <form action="{{ url('purchase_insert') }}"  method="POST">
                                @csrf
                       @endif
                        
                            <div class="row">
                                <div class="col-3 col-sm-3 col-lg-3 col-md-3">
                                    <div class="form-group">
                                        <label for="">Product Name</label>
                                        <select name="product_id" id="" class="form-control">
                                            <option value="">Select</option>
                                            @foreach ($product_array as $array)
                                                @if ($data->product_id == $array->id)
                                                  <option value="{{ $array->id }}" selected>{{ $array->product_name }}</option>
                                                @else
                                                    <option value="{{ $array->id }}">{{ $array->product_name }}</option>
                                                @endif
                                                    
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-3 col-sm-3 col-lg-3 col-md-3">
                                    <div class="form-group">
                                        <label for="">Select Vendor</label>
                                        <select name="client_id" id="" required  class="form-control">
                                            <option value="">Select</option>
                                            @foreach ($vendor_array as $array)
                                                @if ($data->client_id == $array->id)
                                                <option value="{{ $array->id }}" selected>{{ $array->name }}</option>
                                                @else
                                                <option value="{{ $array->id }}">{{ $array->name }}</option>
                                                @endif
                                            @endforeach
                                        </select>

                                    </div>

                                </div>
                                <div>
                                   <div class="form-group">
                                    <label for="">.</label>
                                    <a href="{{ url('client_form',['id'=>0]) }}" class="btn btn-primary form-control btn-floating"><i class="fa fa-plus"></i></a>

                                   </div>
                                </div>
                                
                            </div>
                            <div class="row">
                                <div class="col-3 col-sm-3 col-lg-3 col-md-3">
                                    <div class="form-group">
                                        <label for="">Serial Number</label>
                                        <input type="text" name="serial_num" id="" class="form-control" placeholder="Enter Serial Number" required value="{{ is_null($data->serial_num) ? '' : $data->serial_num }}">
                                    </div>
                                </div>
                                <div class="col-3 col-sm-3 col-lg-3 col-md-3">
                                    <div class="form-group">
                                        <label for="">Engine Number</label>
                                        <input type="text" name="engine_num" id="" class="form-control"  required placeholder="Enter sale rate" value="{{ is_null($data->engine_num) ? '' : $data->engine_num }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-3 col-sm-3 col-lg-3 col-md-3">
                                    <div class="form-group">
                                        <label for="">Purchase Amount</label>
                                        <input type="text" name="purchase_amount" id="" class="form-control" placeholder="Enter purchase amount" required value="{{ is_null($data->purchase_amount) ? '' : $data->purchase_amount }}">
                                    </div>
                                </div>
                                <div class="col-3 col-sm-3 col-lg-3 col-md-3">
                                    <div class="form-group">
                                        <label for="">Paid Amount</label>
                                        <input type="text" name="paid_amount" id="" class="form-control"  required placeholder="Enter paid amount" value="{{ is_null($data->paid_amount) ? '' : $data->paid_amount }}">
                                    </div>
                                </div>
                            </div>
                          
                            <div class="row">
                                <div class="col-6 col-sm-6 col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <label for="">date</label>
                                        <input type="date" name="date" id="" class="form-control"  required value="{{ is_null($data->date) ? date("Y-m-d") : $data->date }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                {{-- <div class="col-3 col-sm-3 col-lg-3 col-md-3">
                                    <div class="form-group">
                                        
                                        <input type="radio" name="is_sold" id="" value="1">
                                        <label for="">is sold</label>
                                    </div>
                                </div> --}}
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