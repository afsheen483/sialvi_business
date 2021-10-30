<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>@yield('title')</title>
    <meta content="Responsive admin theme build on top of Bootstrap 4" name="description" />
    <meta content="Themesdesign" name="author" />
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">

    <!--Morris Chart CSS -->
    <link rel="stylesheet" href="{{ asset('plugins/morris/morris.css') }}">

    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/metismenu.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/icons.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('plugins/datatables/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />

    <!-- Responsive datatable examples -->
    <link href="{{ asset('plugins/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
</head>

<body>

    <!-- Begin page -->
    <div id="wrapper">

        <!-- Top Bar Start -->
        <div class="topbar">

            <!-- LOGO -->
            <div class="topbar-left">
                <a href="index.html" class="logo">
                    <span class="logo-light">
                            <i class="mdi mdi-camera-control"></i> Sialvi Motors
                        </span>
                    <span class="logo-sm">
                            <i class="mdi mdi-camera-control"></i>
                        </span>
                </a>
            </div>
            
         
            <nav class="navbar-custom">
                <ul class="navbar-right list-inline float-right mb-0">

                   
                    <!-- full screen -->
                    <li class="dropdown notification-list list-inline-item d-none d-md-inline-block">
                        <a class="nav-link waves-effect" href="#" id="btn-fullscreen">
                            <i class="mdi mdi-arrow-expand-all noti-icon"></i>
                        </a>
                    </li>
                    <li class="dropdown notification-list list-inline-item d-none d-md-inline-block">
                        {{ Auth::user()->email }}
                         <a class="nav-link waves-effect"
                         href="{{ route('logout') }}"
                         onclick="event.preventDefault();
                                       document.getElementById('logout-form').submit();">
                            &nbsp;
                             <i class=" fas fa-power-off fa-1x text-danger"></i>
                         </a>
                         <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                             @csrf
                         </form>
                     </li>
                  
                </ul>

                <ul class="list-inline menu-left mb-0">
                    <li class="float-left">
                        <button class="button-menu-mobile open-left waves-effect">
                            <i class="mdi mdi-menu"></i>
                        </button>
                    </li>
                   
                </ul>

            </nav>

        </div>
        <!-- Top Bar End -->

        <!-- ========== Left Sidebar Start ========== -->
        <div class="left side-menu">
            <div class="slimscroll-menu" id="remove-scroll">

                <!--- Sidemenu -->
                <div id="sidebar-menu">
                    <!-- Left Menu Start -->
                    <ul class="metismenu" id="side-menu">
                        <li class="menu-title">Menu</li>
                        {{-- <li>
                            <a href="/" class="waves-effect">
                                <i class="icon-accelerator"></i><span> Dashboard </span>
                            </a>
                        </li> --}}
                        <li>
                           
                                {{-- <li><a href="{{ url('product_form',['id'=>0]) }}">Create Product</a></li> --}}
                            <a href="/product" class="waves-effect"><i class="fab fa-product-hunt"></i><span>Products</span></a>
                            
                        </li>
                        <li>
                            <a href="/client" class="waves-effect"><i class="fa fa-user" aria-hidden="true"></i><span>Persons</span></a>
                          
                        </li>
                   
                        <li>
                            <a href="javascript:void(0);" class="waves-effect"><i class="icon-shopping-cart"></i> <span> Purchase <span class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span> </span> </a>
                            <ul class="submenu">
                                {{-- <li><a href="{{ url('purchase_form',['id'=>0]) }}">Create Purchase</a></li> --}}
                                <li><a href="/purchase/view">View Purchase Report</a></li>
                                <li><a href="{{ url('/purchase/supplier') }}">Supplier Purchase Report</a></li>
                                <li><a href="/search_dates/{{ date('Y-d-m') }}">View by Specific Date</a></li>
                          </ul>
                        </li>
                        <li>
                            <a href="javascript:void(0);" class="waves-effect"><i class="icon-pricetag"></i><span> Sales <span class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span> </span></a>
                            <ul class="submenu">
                                {{-- <li><a href="{{ url('/sale_form',['id'=>0]) }}">Create Sales</a></li> --}}
                                <li><a href="{{ url('/sale') }}">View Sales Reports</a></li>
                                <li><a href="/search_date/{{ date('Y-d-m') }}">View by Dates</a></li>
                            </ul>
                        </li>
                        <li>
                            
                                {{-- <li><a href="{{ url('stock_form',['id'=>0]) }}">Create Stock</a></li> --}}
                                <a href="/stock" class="waves-effect">
                                    <i class="fa fa-list-alt" aria-hidden="true"></i><span>Stock</span></a>
                          
                        </li>
                       
                        <li>
                            <a href="/ledger" class="waves-effect">
                                <i class="fa fa-file"></i><span> Cash Flow </span>
                            </a>
                        </li>
                       
                        {{-- <li>
                            <a href="index.html" class="waves-effect">
                                <i class="fa fa-list-alt" aria-hidden="true"></i><span> Stock </span>
                            </a>
                        </li> --}}
                      
                       
                     
                        {{-- <li>
                            <a href="javascript:void(0);" class="waves-effect"><i class="icon-shopping-cart"></i> <span> Bank Account <span class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span> </span> </a>
                            <ul class="submenu">
                                <li><a href="{{ url('/bank_account_form',['id'=>0]) }}">Create Bank Account</a></li>
                                <li><a href="{{ url('/bank_account') }}">View Bank Account</a></li>
                            </ul>
                        </li> --}}

                        {{-- <li>
                            <a href="javascript:void(0);" class="waves-effect"><i class="fas fa-user-alt"></i> <span> User Management <span class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span> </span> </a>
                            <ul class="submenu">
                                <li><a href="/users">Users</a></li>
                                <li><a href="/roles">Roles</a></li>
                                <li><a href="/permissions">Permissions</a></li>
                            </ul>
                        </li> --}}

                        {{-- <li>
                            <a href="javascript:void(0);" class="waves-effect"><i class="icon-profile"></i><span> Clients <span class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span></a>
                            <ul class="submenu">
                                <li><a href="form-elements.html">Create Client</a></li>
                                <li><a href="form-validation.html">View Client</a></li>
                                <li><a href="form-advanced.html">View Clients account</a></li>
                            </ul>
                        </li> --}}
                        {{-- <li>
                            <a href="javascript:void(0);" class="waves-effect"><i class="icon-graph"></i><span> Reports <span class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span> </span></a>
                            <ul class="submenu">
                                <li><a href="email-inbox.html">Expense & Income</a></li>
                                <li><a href="email-compose.html">Client Ledger</a></li>
                                <li><a href="email-compose.html">Supplier Ledger</a></li>
                            </ul>
                        </li> --}}
                        <li>
                            <a href="javascript:void(0);" class="waves-effect"><i class="fas fa-cogs"></i><span> Account Settings <span class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span> </span></a>
                            <ul class="submenu">
                                <li><a href="{{ url('/change_password') }}">Change Password</a></li>
                                <li><a href="{{ url('/change_username') }}">Change Username</a></li>
                        </li>
                      
                    </ul>

                </div>
                <!-- Sidebar -->
                <div class="clearfix"></div>

            </div>
            <!-- Sidebar -left -->

        </div>
        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="content-page">
            <!-- Start content -->
            <div class="content">
                <div class="container-fluid">
                    <div class="page-title-box">
                        <div class="row align-items-center">
                            <div class="col-sm-12">
                                <h4 class="page-title">@yield('headername')</h4>
                            </div>
                        </div>
                        <!-- end row -->
                    </div>
                    <!-- end page-title -->
                    @yield('content')
                    

                </div>
                <!-- container-fluid -->

            </div>
            <!-- content -->

            <footer class="footer">
                © 2021 Sialvi Motors <span class="d-none d-sm-inline-block"> - Crafted with <i class="mdi mdi-heart text-danger"></i> by Codembeded</span>.
            </footer>

        </div>
        <!-- ============================================================== -->
        <!-- End Right content here -->
        <!-- ============================================================== -->

    </div>
    <!-- END wrapper -->

    <!-- jQuery  -->
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/metismenu.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.slimscroll.js') }}"></script>
    <script src="{{ asset('assets/js/waves.min.js') }}"></script>

    <!--Morris Chart-->
    <script src="{{ asset('plugins/morris/morris.min.js') }}"></script>
    <script src="{{ asset('plugins/raphael/raphael.min.js') }}"></script>

    <script src="{{ asset('assets/pages/dashboard.init.js') }}"></script>


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
    <script src="{{ asset('assets/js/app.js') }}"></script>
    @yield('scripts')
</body>

</html>