@extends('layouts.master')

@section('title', 'Purchase List')

@section('headername')
    <a href="{{ url('purchase_form',['id'=>0]) }}" style="float: right" class="btn btn-primary">+ New Purchase</a>
    Purchase 
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card m-b-30">
            <div class="card-body">
                @if (request()->date || request()->to_date || request()->from_date)
                <div class="" style="margin-left: 1.45%">
                    <form action="{{ url('search_between_dates') }}" action="get">
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
                <br>
                @endif
                <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                    <tr>
                        <th>Date</th>
                        <th>Product Name</th>
                        <th>Person Name</th>
                        <th>Purchase Amount</th>
                        <th>Paid Amount</th>
                        <th>Serial Number</th>
                        <th>Engine Number</th>
                        <th>IS Sold</th>
                        <th>Action</th>
                        
                    </tr>
                    </thead>


                    <tbody>
                        @foreach ($data as $data)
                            <tr>
                                <td>{{ $data->date }}</td>
                                <td>{{ $data->product_name }}</td>
                                <td>{{ $data->name }}</td>
                                <td>{{ $data->purchase_amount }}</td>
                                <td>{{ $data->paid_amount }}</td>
                                <td>{{ $data->serial_num }}</td>
                                <td>{{ $data->engine_num }}</td>
                                <td>@if ($data->is_sold == 0)
                                    {{ "NOT SOLD" }}
                                @else
                                    {{ "SOLD" }}
                                @endif</td>
                                <td>
                                    <a href="{{ url('purchase_form',['id'=>$data->id]) }}"
                                        style="color: blue;cursor: pointer;"><i class="fa fa-edit"></i></a>&nbsp;
                                        <a  style="color: red;cursor: pointer;" class="delete_btn" id="{{ $data->id }}"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
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
      var url = "{{url('purchase_delete')}}/"+delete_id;
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

   });
</script>
@endsection