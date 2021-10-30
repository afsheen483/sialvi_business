@extends('layouts.master')

@section('title', 'Add Product')

@section('headername')

    @if (request()->id > 0)
        Edit Product
    @else
        Add Product
    @endif
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card m-b-30">
            <div class="card-body">
                   <div class="container">
                       @if (request()->id > 0)
                            <form action="{{ url('product_update',['id'=>$data->id]) }}"  method="POST">
                                @csrf
                                @method('PUT')
                       @else
                            <form action="{{ url('product_insert') }}"  method="POST">
                                @csrf
                       @endif
                        
                            <div class="row">
                                <div class="col-6 col-sm-6 col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <label for="">Product Name</label>
                                        <input type="text" name="product_name" id="" class="form-control" required placeholder="Enter Product name...." value="{{ is_null($data->product_name) ? '' : $data->product_name }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-3 col-sm-3 col-lg-3 col-md-3">
                                    <div class="form-group">
                                        <label for="">Brand</label>
                                        <input type="text" name="brand" id="" class="form-control" placeholder="Enter Brand name" required value="{{ is_null($data->brand) ? '' : $data->brand }}">
                                    </div>
                                </div>
                                <div class="col-3 col-sm-3 col-lg-3 col-md-3">
                                    <div class="form-group">
                                        <label for="">Sale Rate</label>
                                        <input type="text" name="sale_rate" id="" class="form-control"  required placeholder="Enter sale rate" value="{{ is_null($data->sale_rate) ? '' : $data->sale_rate }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6 col-sm-6 col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <label for="">Purchase Rate</label>
                                        <input type="text" name="purchase_rate" id="" class="form-control"  required placeholder="Enter purchase rate" value="{{ is_null($data->purchase_rate) ? '' : $data->purchase_rate }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6 col-sm-6 col-lg-6 col-md-6">
                                    <button class="btn btn-primary" type="submit">Save Product</button>
                                </div>
                            </div>
                        </form>
                   </div>
            </div>
        </div>
    </div>
</div>

@endsection