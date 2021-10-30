@extends('layouts.master')

@section('title', 'Create Bank Account')

@section('headername')
    Create Bank Account
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
                                        <label for="">Bank Name</label>
                                        <input type="text" name="product_name" id="" class="form-control"  placeholder="Enter Bank name...." required>
                                    </div>
                                </div>
                                    <div class="col-3 col-sm-3 col-lg-3 col-md-3">
                                        <div class="form-group">
                                            <label for="">Branch Name</label>
                                            <input type="text" name="purchase_rate" id="" class="form-control" placeholder="Enter Branch Name..." required>
                                        </div>
                                    </div>   
                            </div>
                            <div class="row">
                                <div class="col-3 col-sm-3 col-lg-3 col-md-3">
                                    <div class="form-group">
                                        <label for="">Account No</label>
                                        <input type="text" name="sale_rate" id="" class="form-control" placeholder="Enter Account No..." required>
                                    </div>
                                </div>
                                <div class="col-3 col-sm-3 col-lg-3 col-md-3">
                                    <div class="form-group">
                                        <label for="">Account Title</label>
                                        <input type="text" name="sale_rate" id="" class="form-control" placeholder="Enter Account Title..." required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-3 col-sm-3 col-lg-3 col-md-3">
                                    <div class="form-group">
                                        <label for="">Status</label>
                                        <select name="status" id="" required  class="form-control">
                                            <option value="">Select</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-3 col-sm-3 col-lg-3 col-md-3">
                                    <div class="form-group">
                                        <label for="">Date</label>
                                        <input type="date" name="date" id="" class="form-control"  required>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-6 col-sm-6 col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <label for="">Opening Balance</label>
                                        <input type="text" name="date" id="" class="form-control" placeholder="$0.0" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6 col-sm-6 col-lg-6 col-md-6">
                                    <button class="btn btn-primary" type="submit">Create</button>
                                </div>
                            </div>
                        </form>
                   </div>
            </div>
        </div>
    </div>
</div>

@endsection