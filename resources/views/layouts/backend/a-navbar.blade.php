<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Giga - Pupuk Online</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        
        <!-- token untuk menggunakan metode post pada laravel -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('template/backend/assets/images/favicon.ico') }} ">

        <!-- App css -->
        <link href="{{ asset('template/backend/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('template/backend/assets/css/icons.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('template/backend/assets/css/metismenu.min.css ') }}" rel="stylesheet" type="text/css" />
        <!-- Custom App style -->
        <link href="{{ asset('template/backend/assets/css/style.css ') }}" rel="stylesheet" type="text/css" />

        <script src="{{ asset('template/backend/assets/js/modernizr.min.js ') }}"></script>

        <!-- File Upload CSS -->
        <link href="{{ asset('template/plugins/bootstrap-fileupload/bootstrap-fileupload.css') }}" rel="stylesheet" />

        <link href="{{ asset('template/plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- Responsive datatable examples -->
        <link href="{{ asset('template/plugins/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />

        @yield('forstyle')
    </head>
<body>

    <!-- Begin page -->
    <div id="wrapper">

        <!-- ========== Left Sidebar Start ========== -->
        <div class="left side-menu">

            <div class="slimscroll-menu" id="remove-scroll">
                <!-- LOGO -->
                {{-- <div class="topbar-left">
                    <a href="index.php" class="logo">
                        <span>
                            <img src="{{ asset('template/backend/assets/images/logo.png') }}" alt="" height="22">
                        </span>
                        <i>
                            <img src="{{ asset('template/backend/assets/images/logo_sm.png') }}" alt="" height="28">
                        </i>
                    </a>
                </div> --}}
                <!-- User box -->
                <div class="user-box">
                    
                    <a href="{{url('/')}}" class="logo">
                    <div class="user-img">
                        <img src="{{ asset('template/frontend/giga/giga.png') }}" alt="Giga"  width="50px" />
                    </div>
                    </a>
                    <h5><a href="#">Giga</a> </h5>
                    <p class="text-muted">Admin Head</p>
                </div>

                @include('layouts.backend.sidebar')

                <div class="clearfix"></div>

            </div>
            <!-- Sidebar -left -->

        </div>
        <!-- Left Sidebar End -->



        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->

        <div class="content-page">

            <!-- Top Bar Start -->

            @include('layouts.backend.topbar')
            <!-- Top Bar End -->



            <!-- Start Page content -->
            <div class="content">
                <div class="container-fluid">

                    @yield('content')
                    <!-- end row -->
                </div> <!-- container -->

            </div> <!-- content -->

            <footer class="footer text-right">
                2020 © Highdmin. - Coderthemes.com
            </footer>

        </div> 
        <!-- content-page -->
        <!-- ============================================================== -->
        <!-- End Right content here -->
        <!-- ============================================================== -->
    </div>
    <!-- END wrapper -->

    <!-- jQuery  -->
    @include('layouts.backend.footerstart')

    
<!-- File Upload JS -->
<script src="{{ asset('template/plugins/bootstrap-fileupload/bootstrap-fileupload.js')}}"></script>

<!-- Init Js file -->
<script src="{{ asset('template/backend/assets/pages/jquery.form-advanced.init.js') }}"></script>

  <!-- Required datatable js -->
  <script src="{{ asset('template/plugins/datatables/jquery.dataTables.min.js') }}"></script>
  
  <script src="{{ asset('template/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>

  <!-- Key Tables -->
  <script src="{{ asset('template/plugins/datatables/dataTables.keyTable.min.js') }}"></script>



    <!--FooTable-->
    <script src="{{ asset('template/plugins/footable/js/footable.all.min.js')}}"></script>
    <!--FooTable Example-->
    <script src="{{ asset('template/backend/assets/pages/jquery.footable.js')}}"></script>
    @yield('forscript')

    @include('layouts.backend.footerend')
        <!-- KNOB JS -->
        <!--[if IE]>
        <script type="text/javascript" src="asset/plugins/jquery-knob/excanvas.js"></script>
        <![endif]-->
        {{-- <script src="{{ asset('template/plugins/jquery-knob/jquery.knob.js')}}"></script> --}}

        <!-- Dashboard Init -->
        {{-- <script src="{{ asset('template/backend/assets/pages/jquery.dashboard.init.js')}}"></script> --}}



</body>
</html>