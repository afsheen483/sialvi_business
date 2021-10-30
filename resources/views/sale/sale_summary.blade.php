@extends('layouts.master')

@section('title')
    Sale Summary
@endsection

@section('headername')
<a href="{{ url('receive_installment',['id'=>0]) }}" style="float: right" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">+ Receive Installment</a>

    Sale Summary 

@endsection

@section('content')

<div class="row">
    <div class="col-md-12 col-lg-12 col-sm-12 col-xm-12 col-xl-12">
        <div class="card m-b-30">
            <div class="card-body">
                <div class="col-lg-10 col-md-10 col-sm-10 offset-lg-0 offset-md-2 offset-sm-1 pt-lg-0 pt-3">
                    <div id="cart" class="bg-white rounded">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="h6">{{ "SL-".$data[0]->id }}{{ " " }}Sale Summary</div>
                            <div class="h6" style="float: right"> <a href="{{ url('sale_form',['id'=>request()->id]) }}">Edit</a> </div>
                        </div>
                        <div class="d-flex jusitfy-content-between align-items-center pt-3 pb-2 border-bottom">
                            
                            <div class="d-flex flex-column px-3" style="margin-left:8%"> <b class="h6">Product</b> <a href="#" class="h6 text-primary">{{ $data[0]->product_name }}</a> </div>
                            <div class="d-flex flex-column px-3" style="margin-left:15%"> <b class="h6">Client</b> <a href="#" class="h6 text-primary">{{ $data[0]->client_name }}</a> </div>
                            <div class="d-flex flex-column px-3" style="margin-left:14%"> <b class="h6">Contact</b> <a href="#" class="h6 text-primary">{{ $data[0]->contact }}</a> </div>
                            
                        </div>
                        <div class="d-flex jusitfy-content-between align-items-center pt-3 pb-2 border-bottom">
                            
                            <div class="d-flex flex-column px-3" style="margin-left: 8%"> <b class="h6">Asal Amount: {{ " " }} {{ " " }} {{ $data[0]->sale_amount }}</b>  </div>
                            <div class="d-flex flex-column px-3" style="margin-left: 8%"> <b class="h6">Received Asal: {{ " " }} {{ " " }} {{ $received_asal }}</b>  </div>
                            <div class="d-flex flex-column px-3" style="margin-left: 8%"> <b class="h6">Remaining Asal: {{ " " }} {{ " " }} {{ $remaining_asal }}</b>  </div>
                        </div>
                        <div class="d-flex jusitfy-content-between align-items-center pt-3 pb-2 border-bottom">
                            
                            <div class="d-flex flex-column px-3" style="margin-left: 8%"> <b class="h6">Total Rent: {{ " " }} {{ " " }} {{ $data[0]->total_rent  }}</b>  </div>
                            <div class="d-flex flex-column px-3" style="margin-left: 10.7%"> <b class="h6">Received Rent: {{ " " }} {{ " " }} {{ $total_received_rent }}</b>  </div>
                            <div class="d-flex flex-column px-3" style="margin-left: 8.6%"> <b class="h6">Remaining Rent: {{ " " }} {{ " " }} {{ $remaining_rent }}</b>  </div>
                        </div>
                        <div class="d-flex jusitfy-content-between align-items-center pt-3 pb-2 border-bottom">

                            <div class="d-flex flex-column px-3" style="margin-left: 8%"> <b class="h6">Engine Number: {{ " " }} {{ " " }} {{ $data[0]->engine_num }}</b>  </div>
                            <div class="d-flex flex-column px-3" style="margin-left: 2.3%"> <b class="h6">Serial Number: {{ " " }} {{ " " }} {{ $data[0]->serial_num }}</b>  </div>
                            <div class="d-flex flex-column px-3" style="margin-left: 3.1%"> <b class="h6">Frame Number: {{ " " }} {{ " " }} {{ $data[0]->frame_num }}</b>  </div>
                        </div>
                        <div >
                            <table class="table" style="margin-left: 5%">
                                <tr>
                                    
                                    <td><b class="h6">Advance Amount</b></td>
                                    <td><b class="h6">{{ $data[0]->advance_amount }}</b></td>
                                    <td><b class="h6">Total Amount</b></td>
                                   <td><b class="h6">{{ $data[0]->total_amount }}</b></td>
                                    
                                </tr>
                                <tr>
                                   
                                   <td><b class="h6">Final Installment Amount</b></td>
                                   <td><b class="h6">{{ $data[0]->installment_amount }}</b></td>
                                   <td><b class="h6">No of Installments</b></td>
                                    <td><b class="h6">{{ $data[0]->no_of_installments }}</b></td>
                                </tr>
                                <tr>
                                   
                                    
                                    <td><b class="h6">Rent Rate</b></td>
                                    <td class="rent_r"><b class="h6">{{ $data[0]->rent_rate }}</b></td>
                                    <td><b class="h6">Asal Installment</b></td>
                                    <td class="int_a"><b class="h6">{{ $data[0]->asal_installment }}</b></td>
                                </tr>
                            </table>
                         
                        </div>
                             
                       
                    </div>
                </div>
              
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        
        <div class="card m-b-30">
            <div class="card-body">
              
              
              
                <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                    <tr>
                        <th>Date</th>
                        <th>Description</th>
                        <th>Debit</th>
                        <th>Credit</th>
                        <th>Balance</th>
                    </tr>
                    </thead>
                    <tbody> 
                        @foreach ($payment as $item)
                        <tr>
                            <td>{{ $item->date }}</td>
                            <td>{{ $item->description }}</td>
                            <td>{{ $item->debit_card }}</td>
                            <td>{{ $item->credit_card }}</td>
                            <td>{{ "0" }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div> <!-- end col -->
</div> 



  <!-- Modal -->
<form action="{{ url('receive_installment_store') }}" method="post">
    @csrf
    <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Receive Installment</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {{-- /<input type="text" class="g" name="id" hidden value="{{ is_null(request()->client_id) ? '' : request()->client_id }}">
                --}}
                <input type="text" name="client_id" value="{{ $data[0]->client_id }}" hidden>
                <input type="text" name="sale_id" id="sale_id" value="{{ request()->id }}" hidden>
               <label for="">Rent Rate</label>&nbsp;&nbsp;&nbsp;
               <span id="rent_rate"></span>
               <div class="form-group">
                  <input type="text" name="rent_rate" placeholder="Enter rent rate you received" class="form-control">
               </div>
               <label for="">Installment</label>&nbsp;&nbsp;&nbsp;
               <span id="installment"></span>
               <div class="form-group">
                  <input type="text" name="installment" placeholder="Enter installment you received" class="form-control">
               </div>
               
                <label>Description</label>
                <div class="form-group">
                    <input class="form-control" type="text" id="credit" name="description" value="">
                </div>
                <label>Date</label>
                <div class="form-group">
                    <input class="form-control" type="date"  name="date" value="{{ date('Y-m-d') }}">
                </div>
              
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
  </div>
</form>
@endsection

@section('scripts')
    <script>
        $(document).ready(function(){
            var installment = $(".int_a").text();
            var rent_rate = $(".rent_r").text();
            $("#installment").text(installment);
            $("#rent_rate").text(rent_rate);
        });
    </script>
@endsection