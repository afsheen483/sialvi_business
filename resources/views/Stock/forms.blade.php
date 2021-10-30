@extends('layouts.master')

@section('title', 'Add Stock')

@section('headername')
    Add Stock
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card m-b-30">
            <div class="card-body">
                   <div class="container">
                        <form action="">
                            <div class="row">
                                <div class="col-3 col-sm-3 col-lg-3 col-md-3">
                                    <div class="form-group">
                                        <label for="">Product Name</label>
                                        <select name="status" id="" required  class="form-control">
                                            <option value="">Select</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-3 col-sm-3 col-lg-3 col-md-3">
                                    <div class="form-group">
                                        <label for="">Quantity</label>
                                        <input type="number" name="qty" id="" class="form-control" placeholder="Enter Purchase Rate..." required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6 col-sm-6 col-lg-6 col-md-6">
                                    <button class="btn btn-primary" type="submit">Save Stock</button>
                                </div>
                            </div>
                        </form>
                   </div>
            </div>
        </div>
    </div>
</div>

@endsection