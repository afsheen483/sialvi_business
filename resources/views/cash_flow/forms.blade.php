@extends('layouts.master')

@section('title')
Cash Flow
@endsection

@section('headername')
Cash Flow
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card m-b-30">
            <div class="card-body">

                <h4 class="mt-0 header-title">Edit Cash Flow</h4>
                <br>
                @if (request()->id > 0)
                <form action="{{ url('update_ledger',['id'=>$data->id]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    @else
                    <form action="{{ url('ledger_insert') }}" method="POST">
                        @csrf
                        @endif
                        <div class="container" style="margin-left:10%">
                            <div class="row">
                                <div class="col-3">
                                    <label>Client Name</label>
                                    <div class="form-group">
                                        <input class="form-control" type="text" placeholder="Contact" name="date"
                                            id="date" value="{{ $data1->name }}" readonly>
                                    </div>
                                </div>

                                <div class="col-3">
                                    <div class="form-group">
                                        <label>Choose Client</label>
                                        <select name="client_id" id="client_id" class="form-control">
                                            <option value="">Select Client</option>
                                            @foreach ($client_array as $array)
                                            @if ( request()->client_id == $array->id)
                                            <option value="{{ $array->id }}" selected>{{ $array->name }}</option>
                                            @else
                                            <option value="{{ $array->id }}">{{ $array->name }}</option>
                                            @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>


                            <div class="row">

                                <div class="col-3">
                                    <label>Date</label>
                                    <div class="form-group">
                                        <input class="form-control" type="date" placeholder="12/12/2000" name="date"
                                            id="date" value="{{ date('Y-m-d', strtotime($data->created_at))}}">
                                    </div>
                                </div>

                               
                            </div>

                            <div class="row">
                                <div class="col-3">
                                    <label>Cash Out</label>
                                    <div class="form-group">
                                        <input class="form-control" type="text" name="debit" id="debit"
                                            value="{{ $data->debit_card }}">
                                    </div>
                                </div>

                                <div class="col-3">
                                    <label>Cash In</label>
                                    <div class="form-group">
                                        <input class="form-control" type="text" id="credit" name="credit"
                                            value="{{ $data->credit_card }}">
                                    </div>
                                </div>
                            </div>



                            <div class="row">
                                <div class="col-6">
                                    <label>Description</label>
                                    <div class="form-group">
                                        <textarea name="description" id="description" cols="85" rows="10"
                                            class="form-control">{{ $data->description }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-3">
                                    <button class="btn btn-success" type="submit" data-toggle="modal"
                                        data-target="#exampleModalLong">Update</button>

                                </div>
                            </div>
                        </div>
            </div>
            </form>
        </div>
    </div>
</div> <!-- end col -->
</div> <!-- end row -->



@endsection

@section('scripts')
{{-- <script>
    $(document).ready(function(){
            $("#client_id").on("change",function(){
                var id = $(this).val();
                var url = "{{url('get_client')}}";
$.ajax({

url : url,
type : 'GET',
cache: false,
data: {_token:'{{ csrf_token() }}',
id:id,
},

success:function(data){
console.log(data[0].open_balance);
$("#open_balance").val(data[0].open_balance);
$("#date").val(data[0].date);
$("#debit").val(data[0].debit_card);
$("#credit").val(data[0].credit_card);
$("#description").val(data[0].description);
$("#id").val(data[0].id);

}
});
});
});
</script> --}}

<script>
    $(document).ready(function(){
          $("#debit").focusout(function(){
             var debit = $(this).val();
             if(debit > 0){
                 $("#credit").val("0");
             }
          });
          $("#credit").focusout(function(){
             var debit = $(this).val();
             if(debit > 0){
                 $("#debit").val("0");
             }
          });
    });
</script>
@endsection