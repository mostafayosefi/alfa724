<!DOCTYPE html>
<!--
BY WEBITO
-->
<html lang="fa_IR">
<head>
    <meta http-equiv="Content-Type" content="text/html" charset=utf-8>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>کنترل پنل | @yield('title', __('داشبورد'))</title>
    <link rel="stylesheet" href="{{ asset('assets/dashboard/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('assets/css/persianDatepicker.css') }}" />
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('assets/dashboard/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/cdn/webfonts/all.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/cdn/webfonts/all.css') }}" />

    <!-- Theme style -->
    <link href="{{ asset('assets/cdn/fonts/font-face.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ asset('assets/dashboard/css/adminlte.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/dashboard/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/dashboard/plugins/toastr/toastr.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/dashboard/plugins/ionicons/ionicons.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/dashboard/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/dashboard/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
    <!-- Bootstrap4 Duallistbox -->


    <link rel="stylesheet" href="{{ asset('assets/dashboard/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css') }}">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('assets/dashboard/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/dashboard/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/dashboard/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/dashboard/plugins/daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/dashboard/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/cdn/editor/summernote-bs4.min.css')}}">

    <link rel="stylesheet" href="{{ asset('assets/cdn/codemir/codemirror.css')}}">
    <script src="{{ asset('assets/cdn/codemir/codemirror.js')}}"></script>
    <script src="{{ asset('assets/cdn/codemir/javascript.js')}}"></script>

    @yield('styles', '')
    <link rel="stylesheet" href="{{ asset('assets/dashboard/css/adminlte.rtl.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/my_style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/persian_upload/style.css') }}">
  <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!}
        var module = { };
    </script>
    <meta name="csrf-token" content="{{ csrf_token() }}">




</head>
<style>
    /* .card-info:not(.card-outline) > .card-header {
        background-color: #dc3545;
    } */
    /* a {
        color: #dc3545
    } */
    .content-wrapper {
        background: #f9f4f4;
    }
    .small-box .icon > i.fa, .small-box .icon > i.fas, .small-box .icon > i.far, .small-box .icon > i.fab, .small-box .icon > i.glyphicon, .small-box .icon > i.ion {
    font-size: 50px;
    top: 20px;
    }
    .small-box:hover .icon > i.fa, .small-box:hover .icon > i.fas, .small-box:hover .icon > i.far, .small-box:hover .icon > i.fab, .small-box:hover .icon > i.glyphicon, .small-box:hover .icon > i.ion {
    font-size: 57px;
    }
    table th , table td {
    padding :7px !important;
    font-size:13px !important;
    vertical-align: middle !important;
    }
</style>

<style>
    .z-0 {display:none;}
    .text-sm{margin-top:20px; }
    #example1_paginate {display:block }
    #example1_info {display:block }
</style>

<body class="hold-transition sidebar-mini dark-mode">
<div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="{{ route('dashboard.index') }}" class="nav-link">{{ __('داشبورد') }}</a>
            </li>

            <li class="nav-item d-none d-sm-inline-block">
                <a href="{{ route('logout') }}"
                   onclick="event.preventDefault(); document.getElementById('frm-logout').submit();" class="nav-link">{{ __('خروج') }}</a>
            </li>


            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="false">
                <i class="far fa-bell fa-2x mr-md-2"></i>
                <span class="badge badge-warning navbar-badge ">{{ $message_count }}</span>
                </a>

                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" style="left: inherit; right: 0px;">
                <span class="dropdown-item dropdown-header">{{ $message_count }} پیام جدید</span>
                <div class="dropdown-divider"></div>

                @if ($messages)
                @foreach ($messages as $message )
                <a href="{{route('dashboard.admin.message.show',['id'=>$message->id])}}" class="dropdown-item">
                    <i class="fas fa-envelope mr-2"></i> {{ $message->title }} ({{ $message->as->name }})
                    <span class="float-right text-muted text-sm">{{ date_frmat_a($message->created_at) }}</span>
                    </a>
                    <div class="dropdown-divider"></div>
                @endforeach
                @endif


                {{-- <a href="#" class="dropdown-item">
                <i class="fas fa-users mr-2"></i> 8 friend requests
                <span class="float-right text-muted text-sm">12 hours</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                <i class="fas fa-file mr-2"></i> 3 new reports
                <span class="float-right text-muted text-sm">2 days</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                </div>
                </li> --}}


        </ul>




        <p style="position: absolute;left: 15px;top: 18px;color: #969696;">امروز:{{Facades\Verta::now()->format(' %d  %B، %Y')}}</p>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-gray elevation-4">
        <!-- Brand Logo -->
        <a href="{{ route('dashboard.index') }}" class="brand-link">
            <img src="{{ asset("assets/images/logo.png") }}" alt="{{ config('app.name') }}" style=" width: auto;" class="brand-image "
                 style="opacity: .8">
            <span class="brand-text font-weight-light">پنل وبیار</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <a href="{{ route('dashboard.profile.edit') }}">
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="{{ !empty(Auth::user()->picture) ? Auth::user()->picture : asset('assets/images/user.png') }}" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <span class="d-block">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</a>
                    </div>
                </div>
            </a>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    @yield('sidebar')
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">

                    <div class="col-sm-12">
                        <ol class="breadcrumb float-sm-left">
                            @yield('hierarchy')
                        </ol>
                    </div>

                    <div class="col-sm-12">
                        @yield('breadcrumb_extra', '')
                        <h1 class="m-0 text-dark">@yield('title')</h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            @if ($errors->any())
                <div class="row">
                    @foreach ($errors->all() as $error)
                        <div class="col-12">
                            <div class="alert alert-danger">{{ $error }}</div>
                        </div>
                    @endforeach
                </div>
            @endif
            @yield('content')
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Main Footer -->
    <footer class="main-footer">
        <!-- To the right -->
        <div class="float-right d-none d-sm-inline">
            webyar
        </div>
        <!-- Default to the left -->
        <strong>Copyright &copy; 2021.</strong> All rights reserved.
    </footer>
</div>
<!-- ./wrapper -->
<form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
    {{ csrf_field() }}
</form>
<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{ asset('assets/cdn/jquery-3.4.1.min.js')}}" ></script>
<script src="{{ asset('assets/cdn/popper.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script
    src="{{ asset('assets/cdn/bootstrap.min.js')}}" ></script>
<!-- AdminLTE App -->
<script src="{{ asset('assets/dashboard/js/adminlte.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $(".custom-file-input").on("change", function () {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });
    });
    //Timepicker

</script>
<script src="{{ asset('assets/dashboard/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('assets/dashboard/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{ asset('assets/dashboard/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{ asset('assets/dashboard/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{ asset('assets/dashboard/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{ asset('assets/dashboard/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{ asset('assets/dashboard/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<script src="{{ asset('assets/dashboard/plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{ asset('assets/dashboard/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{ asset('assets/dashboard/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
<script src="{{ asset('assets/dashboard/plugins/toastr/toastr.min.js')}}"></script>
<script src="{{ asset('assets/dashboard/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('assets/js/persianDatepicker.js') }}"></script>
<script src="{{ asset('assets/dashboard/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script type="text/javascript">
    $(function() {
        function updateContinuityIsEnabled(element) {
            let $continuity = $(element).closest('.modal').find('[name=continuity]');
            let first_val = $(element).closest('.modal').find('input[name=start_date]').val();
            let second_val = $(element).closest('.modal').find('input[name=finish_date]').val();
            if (first_val && first_val == second_val)
                $continuity.prop('disabled', true).val('').change();
            else
                $continuity.prop('disabled', false);
        }
        $('.should_disable').prop('disabled', true).val('').change();
        $('input[name=start_date]').on('change input', updateContinuityIsEnabled);
        $('input[name=finish_date]').on('change input', updateContinuityIsEnabled);
        $("#date, #date1").persianDatepicker({
            onSelect: updateContinuityIsEnabled,
        });

        $('.todo-list').sortable({
        placeholder: 'sort-highlight',
        handle: '.handle',
        forcePlaceholderSize: true,
        zIndex: 999999
         });
    });

</script>
 <script>
  $(function () {

    $("#example1").DataTable({
    "language": {
          "url": "{{ asset('assets/cdn/Persian.json')}}"
      },
      "responsive": true,"searching": true, "lengthChange": true, "autoWidth": false, "pageLength": 50,
    //   "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

    $("#example3").DataTable({
     "language": {
          "url": "{{ asset('assets/cdn/Persian.json')}}"
      },
      "responsive": true,"searching": true, "lengthChange": true, "autoWidth": false, "pageLength": 50,
    //   "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

    $("#example").DataTable({
      "language": {
          "url": "{{ asset('assets/cdn/Persian.json')}}"
      },
      "responsive": true,"searching": true, "lengthChange": true, "autoWidth": false, "pageLength": 50,
    //   "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

    $('.toastrDefaultSuccess').click(function() {
      toastr.error('شما حضوری خود را ثبت کرده اید')
    });
    $('.toastrDefaultInfo').click(function() {
      toastr.info('درحال پردازش درخواست')
    });
    $('.toastrDefaultWarning').click(function() {
      toastr.error('شما یک پیام خوانده نشده دارید')
    });
  });
 </script>


<script src="{{ asset('assets/cdn/editor/summernote-bs4.min.js')}}"></script>


<script src="{{ asset('assets/dashboard/plugins/select2/js/select2.full.min.js') }}"></script>


<script>
    $(function () {
      //Initialize Select2 Elements
      $('.select2').select2()

      //Initialize Select2 Elements
      $('.select2bs4').select2({
        theme: 'bootstrap4'
      })

    })

  </script>

{{--
<script>
    $(function () {
      $('#summernote').summernote()
      CodeMirror.fromTextArea(document.getElementById("summernote"), {
        mode: "htmlmixed",
        theme: "monokai"
      });
    })
  </script> --}}



 {{-- <script src="https://cdn.ckeditor.com/ckeditor5/35.1.0/standard/ckeditor.js"></script> --}}


 {{-- <script src="https://cdn.ckeditor.com/4.11.2/standard/ckeditor.js"></script> --}}
 {{-- <script src="{{ asset('assets/cdn/ckeditor.js')}}"></script> --}}
 {{-- <script type="text/javascript">
    CKEDITOR.replace('description', {
        language: 'fa'
      });
</script> --}}
<script>
    setTimeout(function() {
        $('.alert:not(.no-dismiss)').hide('slow', function(){ $target.remove(); });
    }, 6000);
</script>
@yield('scripts', '')



{{-- <script src="{{ asset('assets/persian_upload/jquery.min.js')}}"></script> --}}
{{-- <script src="{{ asset('assets/persian_upload/global.js')}}"></script> --}}

@yield('myscript')
</body>
</html>
