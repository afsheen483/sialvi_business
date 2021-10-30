@extends('layouts.master')

@section('title', 'Add Sale')

@section('headername')
    Add Sale
@endsection
@section('content')
<style>
    .error{
        color: red;
    }
</style>
<div class="row">
    <div class="col-12">
        <div class="card m-b-30">
            <div class="card-body">
                   <div class="container">
                       @if (request()->id > 0)
                       <form action="{{ url('sale_update',['id' => $data->id]) }}" method="POST" enctype="multipart/form-data" >
                        @csrf
                        @method('PUT')
                       @else
                       <form action="{{ url('sale_insert') }}" method="POST" enctype="multipart/form-data" id="form">
                        @csrf
                       @endif
                            <div class="row">
                                <div class="col-3 col-sm-3 col-lg-3 col-md-3">
                                    <div class="form-group">
                                        <label for="">Select Product</label>
                                        <select name="product_id" id="" required  class="form-control">
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
                                <div class="col-2 col-sm-2 col-lg-2 col-md-2">
                                    <div class="form-group">
                                        <label for="">Select Client</label>
                                        <select name="client_id" id="" required  class="form-control">
                                            <option value="">Select</option>
                                            @foreach ($client_array as $array)
                                                @if ($data->client_id == $array->id)
                                                <option value="{{ $array->id }}" selected>{{ $array->name }}</option>
                                                @else
                                                <option value="{{ $array->id }}">{{ $array->name }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div> 
                                <div class="form-group">
                                    <label for="">.</label>
                                    <a href="{{ url('client_form',['id'=>0]) }}" class="btn btn-primary form-control btn-floating"><i class="fa fa-plus"></i></a>

                                   </div> 
                                <div class="col-3 col-sm-3 col-lg-3 col-md-3">
                                    <div class="form-group">
                                        <label for="" style="margin-left:20%">Asal Amount</label>
                                        <input type="text" name="sale_amount" id="asal_amount" class="form-control" placeholder="Enter Sale Amount" required value="{{ is_null($data->sale_amount) ? '' : $data->sale_amount }}"  style="margin-left:20%">
                                    </div>
                                </div>
                               
                            </div>
                            <div class="row">
                                <div class="col-3 col-sm-3 col-lg-3 col-md-3">
                                    <div class="form-group">
                                        <label for="">Rent Rate</label>
                                        <input type="text" name="rent_rate" id="rent_rate" class="form-control" placeholder="Enter Rent Rate" required value="{{ is_null($data->rent_rate) ? '' : $data->rent_rate }}">
                                    </div>
                                </div>
                                <div class="col-3 col-sm-3 col-lg-3 col-md-3">
                                    <div class="form-group">
                                        <label for="">No of installments</label>
                                        <input type="text" name="no_of_installments" id="no_of_installments" placeholder="Enter number of installments" class="form-control" required value="{{ is_null($data->no_of_installments) ? '' : $data->no_of_installments }}">
                                    </div>
                                </div>
                              
                                <div class="col-3 col-sm-3 col-lg-3 col-md-3">
                                    <div class="form-group">
                                        <label for="">Advance Amount</label>
                                        <input type="text" name="advance_amount" id="advance_amount" class="form-control" required placeholder="Enter paid amount" value="{{ is_null($data->advance_amount) ? '' : $data->advance_amount }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-3 col-sm-3 col-lg-3 col-md-3">
                                    <div class="form-group">
                                        <label for="">Serial Number</label>
                                        <input type="text" name="serial_num" id="serial_num" class="form-control" placeholder="Enter serial number" required value="{{ is_null($data->serial_num) ? '' : $data->serial_num }}">
                                    </div>
                                </div>
                                <div class="col-3 col-sm-3 col-lg-3 col-md-3">
                                    <div class="form-group">
                                        <label for="">Engine Number</label>
                                        <input type="text" name="engine_num" id="engine_num" class="form-control" required placeholder="Enter engine number" value="{{ is_null($data->engine_num) ? '' : $data->engine_num }}">
                                    </div>
                                </div>
                                <div class="col-3 col-sm-3 col-lg-3 col-md-3">
                                    <div class="form-group">
                                        <label for="">Frame Number</label>
                                        <input type="text" name="frame_num" id="frame_number" class="form-control" required placeholder="Enter frame number" value="{{ is_null($data->frame_number) ? '' : $data->frame_number }}">
                                    </div>
                                </div>
                               
                              
            
                            </div>
                           
                            <div class="row">
                                {{-- <div class="col-3 col-sm-3 col-lg-3 col-md-3">
                                    <div class="form-group">
                                        <label for="">Advocate Name</label>
                                        <input type="text" name="advocate_name" id="" class="form-control" required placeholder="Enter advocate name" value="{{ is_null($data->advocate_name) ? '' : $data->advocate_name }}">
                                    </div>
                                </div> --}}
                                <div class="col-3 col-sm-3 col-lg-3 col-md-3">
                                    <div class="form-group">
                                        <label for="">Date</label>
                                        <input type="date" name="date" id="" class="form-control" required value="{{ is_null($data->date) ? date("Y-m-d")  : $data->date }}" >
                                    </div>
                                </div>
                                <div class="col-3 col-sm-3 col-lg-3 col-md-3">
                                    <div class="form-group">
                                        <label for="">Total Rent</label><br>
                                        <input type="text" name="total_rent" id="total_rent" class="form-control" placeholder="Enter total rent" value="{{ is_null($data->total_rent) ? ""  : $data->total_rent }}">
                                    </div>
                                </div>
                                <div class="col-3 col-sm-3 col-lg-3 col-md-3">
                                    <div class="form-group">
                                        <label for="">Total Amount</label><br>
                                        <input type="text" name="total_amount" id="total_amount" class="form-control" placeholder="Enter total amount" value="{{ is_null($data->total_amount) ? ""  : $data->total_amount }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-3 col-sm-3 col-lg-3 col-md-3">
                                    <div class="form-group">
                                        <label for="">Remaining Asal</label>
                                        <input type="text" name="remaining_asal" id="remaining_asal" class="form-control" required placeholder="Enter asal amount" value="{{ is_null($data->remaining_asal) ? '' : $data->remaining_asal }}">
                                    </div>
                                </div>
                                <div class="col-3 col-sm-3 col-lg-3 col-md-3">
                                    <div class="form-group">
                                        <label for="">Asal Installment</label><br>
                                        <input type="text" name="asal_installment" id="asal_installment" class="form-control" placeholder="Enter final installment" value="{{ is_null($data->asal_installment) ? "0"  : $data->asal_installment }}">
                                    </div>
                                </div>
                                <div class="col-3 col-sm-3 col-lg-3 col-md-3">
                                    <div class="form-group">
                                        <label for="">Final Installment</label><br>
                                        <input type="text" name="installment_amount" id="installment_amount" class="form-control" value="{{ is_null($data->installment_amount) ? "0"  : $data->installment_amount }}">
                                    </div>
                                </div>
                                {{-- <div class="col-3 col-sm-3 col-lg-3 col-md-3">
                                    <div class="form-group">
                                        <label for="">Final Installment</label><br>
                                        <input type="text" name="final_installment" id="final_installment" class="form-control" value="{{ is_null($data->final_installment) ? "0"  : $data->final_installment }}">
                                    </div>
                                </div> --}}
                            </div>
                            <div class="row">
                                
                                <div class="col-3 col-sm-3 col-lg-3 col-md-3">
                                    <div class="form-group">
                                        <label for="">file</label>
                                        <input type="file" name="file" id="">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6 col-sm-6 col-lg-6 col-md-6">
                                    <button class="btn btn-primary" type="submit">Save Sale</button>
                                </div>
                            </div>
                        </form>
                   </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js" type="text/javascript"></script>
<script>

$("#asal_amount,#rent_rate,#no_of_installments,#advance_amount,#remaining_asal,#total_rent,#total_amount,#asal_installment").keyup(function(){
    var asal_amount = $("#asal_amount").val();
    var rent_rate = $("#rent_rate").val();
    var no_of_installments = $("#no_of_installments").val();
    var advance_amount = $("#advance_amount").val();
    var remaining_asal = $("#remaining_asal").val();
    var total_rent = $("#total_rent").val();
    var total_amount = $("#total_amount").val();
    var asal_installment = $("#asal_installment").val();
    var final_installment = $("#final_installment").val();

    var sub = Number(asal_amount) - Number(advance_amount);
    $("#remaining_asal").val(sub);
    console.log(sub);
    var mul = no_of_installments * rent_rate;
    $("#total_rent").val(mul);

    var sum = Number(asal_amount) + Number($("#total_rent").val());
    $("#total_amount").val(sum);

    var div = Number(remaining_asal) / Number(no_of_installments);
    div = isNaN(div) ? '0' : div;

    $("#asal_installment").val(div);


    var sum2 = Number($("#asal_installment").val()) + Number($("#rent_rate").val());
    $("#installment_amount").val(sum2);

}).keyup();

//      var engine_num =  $("#engine_num").val();
    
//    if(!engine_num){
//     $('#form').validate({
//         rules: {            
//             engine_num: {
//                 required: true,
//                 remote: {
//                     url: "{{url('check_engine_number')}}",
//                     type: "post",
//                     data: {
//                         engine_num:$(engine_num).val(),
//                         _token:"{{ csrf_token() }}"
//                         },
//                     dataFilter: function (data) {
//                         var json = JSON.parse(data);
//                         console.log(data);
//                         if (json.msg == "false") {
//                             return "\"" + "Invalid engine number!" + "\"";
//                         } else {
//                             return 'true';
//                         }
//                     }
//                 }
//             }
//         },
//         messages: {            
//             engine_num: {
               
//                 remote: "Invalid engine number!"
//             }
//         }
//     });
//    }
  
   
</script>
@if (request()->id > 0)
<script>
    $(document).ready(function(){
        $("#sale_amount,#no_of_installments,#paid_amount").keyup(function(){
            var sale_amount = $("#sale_amount").val();
            console.log(sale_amount);
            var paid_amount = $("#paid_amount").val();
            var sub = Number(paid_amount) - Number(sale_amount);
            var installments = $("#no_of_installments").val();
            console.log("no_of_installments"+installments);
            var cal = Number(sub) / Number(installments);
            $("#amount").text(cal.toFixed(2));
           
                
       
       
        }).keyup();
        
    });
</script>
@else
<script>
    $(document).ready(function(){
        $("#sale_amount,#no_of_installments,#paid_amount").keyup(function(){
            var sale_amount = $("#sale_amount").val();
            console.log(sale_amount);
            var paid_amount = $("#paid_amount").val();
            console.log("P"+paid_amount);
            var sub = Number(paid_amount) - Number(sale_amount);
            var installments = $("#no_of_installments").val();
            console.log("no_of_installments"+installments);
            var cal = Number(sub) / Number(installments);
            $("#amount").text(cal.toFixed(2));
           
                
       
       
        });
        
    });
</script>
@endif

    <script>
         var serial_num =  $("#serial_num").val();

if(!$serial_num){
    
 $('#form').validate({
     rules: {            
         serial_num: {
             required: true,
             remote: {
                 url: "{{url('check_serial_number')}}",
                 type: "post",
                 data: {
                     serial_num:$(serial_num).val(),
                     _token:"{{ csrf_token() }}"
                     },
                 dataFilter: function (data) {
                     var json = JSON.parse(data);
                     console.log(data);
                     if (json.msg == "false") {
                         return "\"" + "Invalid serial number!" + "\"";
                     } else {
                         return 'true';
                     }
                 }
             }
         }
     },
     messages: {            
         serial_num: {
            
             remote: "Invalid serial number!"
         }
     }
 });
}

    </script>

   
@endsection 