@extends('layouts.master')

@section('title', 'Product List')

@section('headername')
<a href="{{ url('product_form',['id'=>0]) }}" style="float: right" class="btn btn-primary">+ Add New Product</a>

    Product List
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card m-b-30">
            <div class="card-body">
                <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                    <tr>
                        <th>Product Name</th>
                        <th>Brand</th>
                        <th>Purchase Rate</th>
                        <th>Sale Rate</th>
                        <th>Action</th>
                        
                    </tr>
                    </thead>


                    <tbody>
                        @foreach ($data as $data)
                            <tr>
                                <td>{{ $data->product_name }}</td>
                                <td>{{ $data->brand }}</td>
                                <td>{{ $data->purchase_rate }}</td>
                                <td>{{ $data->sale_rate }}</td>
                                <td>
                                    <a href="{{ url('product_form',['id'=>$data->id]) }}"
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
      var url = "{{url('product_delete')}}/"+delete_id;
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