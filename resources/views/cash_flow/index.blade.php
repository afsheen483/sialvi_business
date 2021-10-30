@extends('layouts.master')

@section('title')
    Balance Sheet
@endsection

@section('headername')
    Cash Flow
@endsection

@section('content')

{{-- @hasrole('accountant')
<style>
    .content-page {
        margin-left: 0px;
    }

    .footer {
        left: 100px;
    }
</style>
@endhasrole --}}




<div class="row">


    <div class="col-sm-6 col-xl-3">
        <div class="card">
            <div class="card-heading p-3">
                <div class="mini-stat-icon float-right">
                    <i class="fa fa-arrow-up bg-danger  text-white"></i>
                </div>
                <div>
                    <h5 class="font-16">CASH OUT :</h5>
                </div>
                <h3 class="mt-4 debit_total"></h3>
                {{-- <div class="progress mt-4" style="height: 4px;">
                            <div class="progress-bar bg-success" role="progressbar" style="width: 75%" aria-valuenow="75"
                                aria-valuemin="0" aria-valuemax="100"></div>
                        </div> --}}
                {{-- <p class="text-muted mt-2 mb-0">Previous period<span class="float-right">75%</span></p> --}}
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="card">
            <div class="card-heading p-3">
                <div class="mini-stat-icon float-right">
                    <i class="fa fa-arrow-down bg-success  text-white"></i>
                </div>
                <div>
                    <h5 class="font-16">CASH IN :</h5>
                </div>
                <h3 class="mt-4 credit_total"></h3>
                {{-- <div class="progress mt-4" style="height: 4px;">
                    <div class="progress-bar bg-success" role="progressbar" style="width: 75%" aria-valuenow="75"
                        aria-valuemin="0" aria-valuemax="100"></div>
                </div> --}}
                {{-- <p class="text-muted mt-2 mb-0">Previous period<span class="float-right">75%</span></p> --}}
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="card">
            <div class="card-heading p-3">
                <div class="mini-stat-icon float-right">
                    <i class="fas fa-dollar-sign bg-warning  text-white"></i>
                </div>
                <div>
                    <h5 class="font-16">Balance :</h5>
                </div>
                <h3 class="mt-4 balance"></h3>
                {{-- <div class="progress mt-4" style="height: 4px;">
                <div class="progress-bar bg-success" role="progressbar" style="width: 75%" aria-valuenow="75"
                    aria-valuemin="0" aria-valuemax="100"></div>
            </div> --}}
                {{-- <p class="text-muted mt-2 mb-0">Previous period<span class="float-right">75%</span></p> --}}
            </div>
        </div>
    </div>
</div>
<form action="{{ url('get_client') }}" method="get">
    @csrf
    <div class="row">
        <div class="col-lg-2 col-sm-2 col-md-2">

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
        <div class="col-lg-2 col-sm-2 col-md-2" style="margin-left:-2.1%">
            <button type="submit" class="btn btn-info"><i class="fa fa-search" aria-hidden="true"></i>
            </button>
        </div>
</form>
<div class="col-lg-4 col-sm-4 col-md-4">
    <button class="btn btn-success" type="button" data-toggle="modal" data-target="#exampleModalLong" id="cash_in">CASH
        IN</button>
    <button class="btn btn-danger" type="button" data-toggle="modal" data-target="#exampleModalLong" id="cash_out">CASH
        OUT</button>
    <a href="\ledger" class="btn btn-warning">Balance Sheet</a>
    @hasanyrole('accountant|admin')
    {{-- <a href="{{ url('client_form',['id'=>0]) }}" class="btn btn-primary">New Client</a>
    <a href="{{ url('client') }}" class="btn btn-success">View Client</a> --}}
    @endhasanyrole
</div>

</div>


<!-- Modal -->
<form action="/save_transaction" method="POST">
    @csrf
    <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{-- /<input type="text" class="g" name="id" hidden value="{{ is_null(request()->client_id) ? '' : request()->client_id }}">
                    --}}
                    <input type="text" name="ledger_id" id="ledger_id" hidden>

                    <div class="form-group">
                        <label for="">Client</label>
                        <select name="client_id" id="client_id" class="form-control" required>
                            <option value="">Select Client</option>
                            @foreach ($client_array as $arr)
                            <option value="{{ $arr->id }}">{{ $arr->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group" id="purchase_id">
                        <label for="">Purchase</label>
                        <select name="purchase_id"  class="form-control">
                                 <option value="">Select Pucrhase</option>
                            @foreach ($purchase_array as $arr)
                                <option value="{{ $arr->id }}">{{"PR - ".$arr->id }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group" id="sale_id">
                        <label for="">Sale</label>
                        <select name="sale_id"  class="form-control">
                            <option value="">Select Sale</option>
                            @foreach ($sale_array as $arr)
                            <option value="{{ $arr->id }}">{{"SL - ".$arr->id }}</option>
                            @endforeach
                        </select>
                    </div>

                    <label>Amount</label>
                    <div class="form-group">
                        <input class="form-control" type="text" id="credit" name="amount" value="">
                    </div>
                    <label>Description</label>
                    <div class="form-group">
                        <input class="form-control" type="text" id="credit" name="desc" value="">
                    </div>
                    <label>Date</label>
                    <div class="form-group">
                        <input class="form-control" type="date" id="credit" name="date" value="{{ date('Y-m-d') }}">
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


<div>
    <form action="{{ url('cash_flow_search') }}" action="get">
        @csrf
        <div class="row">
            <div class="col-2">
                <label for="">To Date</label>
                 <input type="date" name="to_date" id="" class="form-control">
            </div>
            <div class="col-2">
                <label for="">End Date</label>
                <input type="date" name="from_date" id="" class="form-control">
           </div>
            <div class="col-2" style="margin-top: 2%">
                <button type="submit" class="btn btn-primary">Search</button>
            </div>
        </div>
    </form>
</div>
{{-- Main Content --}}
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap"
                    style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Purchase ID</th>
                            <th>Sale ID</th>
                            <th>Type</th>
                            <th>Date</th>
                            <th>Description</th>
                           
                            <th style="color: red">Cash Out <i class="fa fa-arrow-up" aria-hidden="true"></i></th>
                            <th style="color: green">Cash In <i class="fa fa-arrow-down" aria-hidden="true"></i></th>
                            {{-- <th style="color: yellowgreen">Balance $</th> --}}
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>


                        @foreach ($data as $d)
                        <tr>
                            <td class="n">{{ $d->name }}</td>
                            <td>{{ $d->purchase_id }}</td>
                            <td>{{ $d->sale_id }}</td>
                            <td class="n">{{ $d->c_type }}</td>
                            <td class="a">{{ $d->date }}</td>
                            <td class="b">{{ $d->description }}</td>
                           
                            
                            <td class="c debit">{{ $d->debit_card }}</td>
                            <td class="d credit">{{ $d->credit_card }}</td>
                            {{-- <td class="e">{{ $d->open_balance }}</td> --}}
                            <td>
                                <a href="{{ url('/ledger_create',['id'=> $d->id]) }}" style="color: blue;cursor:
                             pointer;"><i class="fa fa-edit"></i></a>&nbsp;&nbsp;
                                <a style="color: red;cursor: pointer;" class="delete_btn" id="{{ $d->id }}"><i
                                        class="fa fa-trash"></i></a>

                            </td>

                        </tr>
                        @endforeach



                    </tbody>
                </table>

            </div>
        </div>
    </div> <!-- end col -->
</div>



@endsection
@section('scripts')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    $(document).ready(function(){
        $('.delete_btn').on('click',function () {
          var delete_id = $(this).attr("id");
          var th=$(this);
          console.log(delete_id);
          var url = "{{url('ledger_delete')}}/"+delete_id;
          Swal.fire({
							  title: 'Are you sure?',
							  text: "You won't be able to revert this!",
							  type: 'warning',
							  showCancelButton: true,
							  confirmButtonColor: '#3085d6',
							  cancelButtonColor: '#d33',
							  confirmButtonText: 'Yes, delete it!'
							}).then(function(result){
                if (result.isConfirmed)  
                  {
                      $.ajax({
                      
                        url : url,
                        type : 'PUT',
                        cache: false,
                        data: {_token:'{{ csrf_token() }}'},
                        success:function(data){
                         if (data == 1) {
                          Swal.fire({
                                title:'Deleted!',
                                text:'Your file and data has been deleted.',
                                type: 'success',
                              })
                              th.parents('tr').hide();

                            }
                          else{
                                Swal.fire({
                                    title: 'Oopps!',
                                    text: "something went wrong!",
                                    type: 'warning',
                          			})
                          		}
                         }
                        
                        });
                }
              });
               
        });



            jQuery(':button').click(function () {
    if (this.id == 'cash_in') {
        var cash_in = 1;
                $('#ledger_id').val(cash_in);
                $('#exampleModalLongTitle').text('New Cash In');
                $("#purchase_id").hide();
    }
    else if (this.id == 'cash_out') {
        $('#ledger_id').val("");
                var cash_out = 0;
                $('#ledger_id').val(cash_out);
                $('#exampleModalLongTitle').text('New Cash Out');
                $("#sale_id").hide();
    }
});


var sum = 0;
            $(".debit").each(function(){
                var val = $(this).text();
                console.log(val);
                sum += Number(val);
            });
            console.log(sum);
            $(".debit_total").text(sum.toFixed(2));

            var sum2 = 0;
            $(".credit").each(function(){
                var val2 = $(this).text();
                console.log(val2);
                sum2+= Number(val2);
            });
            //console.log(sum2);
            var balance = Number(sum) - Number(sum2);
            $(".credit_total").text(sum2.toFixed(2));
            $(".balance").text(balance.toFixed(2));
            // change client
            $("#client_id").on("change",function(){
                var id = $(this).val();
                $(".g").val(id);
            });
       });



</script>
@endsection