@extends('layouts.master')

@section('title', 'Bank Accounts List')

@section('headername')
    Bank Accounts List
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card m-b-30">
            <div class="card-body">
                <div class="row">
                    <div class="col-6 col-sm-6 col-lg-6 col-md-6" style="margin-left: 1.5%">
                        <button class="btn btn-danger" type="submit" data-toggle="modal" data-target="#myModal">Withdraw</button>
                        <button class="btn btn-success" type="submit" data-toggle="modal" data-target="#myModal">Deposit</button>
                    </div>
                </div><br>
                <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                    <tr>
                        <th>Bank Name</th>
                        <th>Branch Name</th>
                        <th>Account No</th>
                        <th>Account Title</th>
                        <th>Balance</th>
                    </tr>
                    </thead>


                    <tbody>
           
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
  
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
        <h4 class="modal-title">Deposit</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
        </div>
        <div class="modal-body">
            <div class="form-group">
                <label for="">Select Bank</label>
                <select name="status" id="" required  class="form-control">
                    <option value="">Select</option>
                </select>
            </div>
            <div class="form-group">
                <label for="">Select Account</label>
                <select name="status" id="" required  class="form-control">
                    <option value="">Select</option>
                </select>
            </div>
            <div class="form-group">
                <label for="">Account Title</label>
                <input type="text" name="title" id="" class="form-control" placeholder="Enter Account Title..." required>
            </div>
            <div class="form-group">
                <label for="">Description</label>
                <input type="text" name="desc" id="" class="form-control" placeholder="Enter Description..." required>
            </div>
            <div class="form-group">
                <label for="">Select Date</label>
                <input type="date" name="" id="" class="form-control">
            </div>
            <div class="row" >
                <div class="col-6 col-sm-6 col-lg-6 col-md-6">
                    <button class="btn btn-primary" type="submit">Save</button>
                </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
  
    </div>
  </div>




@endsection

@section('scripts')

    

     <!-- Required datatable js -->
     <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
     <script src="{{ asset('plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
     <!-- Buttons examples -->
     <script src="{{ asset('plugins/datatables/dataTables.buttons.min.js') }}"></script>
     <script src="{{ asset('plugins/datatables/buttons.bootstrap4.min.js') }}"></script>
     <script src="{{ asset('plugins/datatables/jszip.min.js') }}"></script>
     <script src="{{ asset('plugins/datatables/pdfmake.min.js') }}"></script>
     <script src="{{ asset('plugins/datatables/vfs_fonts.js') }}"></script>
     <script src="{{ asset('plugins/datatables/buttons.html5.min.js') }}"></script>
     <script src="{{ asset('plugins/datatables/buttons.print.min.js') }}"></script>
     <script src="{{ asset('plugins/datatables/buttons.colVis.min.js') }}"></script>
     <!-- Responsive examples -->
     <script src="{{ asset('plugins/datatables/dataTables.responsive.min.js') }}"></script>
     <script src="{{ asset('plugins/datatables/responsive.bootstrap4.min.js') }}"></script>

     <!-- Datatable init js -->
     <script src="{{ asset('assets/pages/datatables.init.js') }}"></script>   
    <!-- App js -->
   

    <script>
        $(document).ready(function(){
            alert("Hi");
        });
        </script>
@endsection





