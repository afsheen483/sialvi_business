@extends('layouts.master')

@section('title')
    Sales
@endsection

@section('headername')
<a href="{{ url('sale_form',['id'=>0]) }}" style="float: right" class="btn btn-primary">+ New Sale</a>

    Sales 

@endsection

@section('content')

<div class="row">
    <div class="col-12">
        
        <div class="card m-b-30">
            <div class="card-body">
                @if (request()->filter == 'client_wise_sale')
                <div class="" style="margin-left: 1.45%">
                    <form action="">
                        <div class="row">
                            <div class="col-3">
                                <label for="">Client Wise</label>
                                <select name="status" id="" required  class="form-control">
                                    <option value="">Select</option>
                                </select>
                            </div>
                            <div class="col-3" style="margin-top: 2.6%">
                                
                                <button type="submit" class="btn btn-primary">Search</button>
                            </div>
                        </div>
                    </form>
                </div>
                <br>
                @endif
                
               
                @if (Request::path() == 'sale' || request()->client_id > 0)
                <div class="" style="margin-left: 1.45%">
                    <form action="{{ url('search') }}" method="get">
                        @csrf
                        <div class="row">
                            <div class="col-3">
                                <select name="client_id" id="" class="form-control">
                                    <option value="">Select</option>
                                    @foreach ($client_array as $array)
                                        @if (request()->client_id == $array->id)
                                         <option value="{{ $array->id }}" selected>{{ $array->name }}</option>
                                        @else
                                          <option value="{{ $array->id }}">{{ $array->name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-2">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                            </div>
                        </div>
                    </form>
                    <br>
                </div>
                @endif
                <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                    <tr>
                        <th>Date</th>
                        <th>Product Name</th>
                        {{-- <th>Client Name</th> --}}
                        <th>Contact</th>
                        <th>Rent Rate</th>
                        <th>No of installment</th>
                        <th>Asal Amount</th>
                        <th>Serial Number</th>
                        <th>Engine Number</th>
                        <th>Frame Number</th>
                        <th>Total Rent</th>
                        <th>Total Amount</th>
                        <th>File</th>
                        {{-- <th>Advocate Name</th> --}}
                        <th data-priority="-1">Action</th>
                    </tr>
                    </thead>
                    <tbody> 
                        @foreach ($data as $data)
                            <tr>
                                <td>{{ $data->date  }}</td>
                                <td>{{ $data->product_name  }}</td>
                                {{-- <td>{{ $data->client_name }}</td> --}}
                                <td>{{ $data->contact }}</td>
                                <td>{{ $data->rent_rate  }}</td>
                                <td>{{ $data->no_of_installments  }}</td>
                                <td>{{ $data->sale_amount  }}</td>
                                <td>{{ $data->serial_num  }}</td>
                                <td>{{ $data->engine_num  }}</td>
                                <td>{{ $data->frame_num  }}</td>
                                <td>{{ $data->total_rent  }}</td>
                                <td>{{ $data->total_amount  }}</td>
                                <td><a href="{{ $data->file  }}" target="blank" style="color: blue">File</a></td>
                                {{-- <td>{{ $data->advocate_name  }}</td> --}}
                                <td>
                                    <a href="{{ url('sale_form',['id'=>$data->id]) }}"
                                        style="color: blue;cursor: pointer;"><i class="fa fa-edit"></i></a>&nbsp;
                                        {{-- <a  style="color: red;cursor: pointer;" class="delete_btn" id="{{ $data->id }}"><i class="fa fa-trash"></i></a> --}}
                                        <a  href="{{ url('sale_summary',['id'=>$data->id]) }}" style="color: green;cursor: pointer;" ><i class="fas fa-dollar-sign"></i>
                                        </a>
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
      var url = "{{url('sale_delete')}}/"+delete_id;
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