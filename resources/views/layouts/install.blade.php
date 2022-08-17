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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css"
          integrity="sha256-mmgLkCYLUQbXn0B1SRqzHar6dCnv9oZFPEC1g1cwlkk=" crossorigin="anonymous" />
    <!-- Theme style -->
    <link href="https://cdn.jsdelivr.net/gh/rastikerdar/shabnam-font@v5.0.1/dist/font-face.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ asset('assets/dashboard/css/adminlte.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/dashboard/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/dashboard/plugins/toastr/toastr.min.css') }}">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="{{ asset('assets/dashboard/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/dashboard/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
    <!-- Bootstrap4 Duallistbox -->
    <link rel="stylesheet" href="{{ asset('assets/dashboard/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css') }}">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('assets/dashboard/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/dashboard/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/dashboard/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/dashboard/plugins/daterangepicker/daterangepicker.css') }}">

    @yield('styles', '')
    <link rel="stylesheet" href="{{ asset('assets/dashboard/css/adminlte.rtl.css') }}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!}
        var module = { };
    </script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<style>
    .card-info:not(.card-outline) > .card-header {
        background-color: #dc3545;
    }
    a {
        color: #dc3545
    }
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
    .login-box, .register-box {
         width: 635px;
    }
@media  screen and (max-width:769px){
    .login-box, .register-box {
         width: 335px;
    }
}
</style>

@yield('content')

<script
    src="https://code.jquery.com/jquery-3.4.1.min.js"
    integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
    crossorigin="anonymous"></script>
<script src="https://getbootstrap.com/docs/4.1/assets/js/vendor/popper.min.js"></script>
<!-- Bootstrap 4 -->
<script
    src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
    crossorigin="anonymous"></script>
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
          "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Persian.json"
      },
      "responsive": true,"searching": true, "lengthChange": true, "autoWidth": false, "pageLength": 50,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    
    $("#example3").DataTable({
      "responsive": true,"searching": true, "lengthChange": true, "autoWidth": false, "pageLength": 50,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    
    $("#example").DataTable({
      "responsive": true,"searching": true, "lengthChange": true, "autoWidth": false, "pageLength": 50,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
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
 <script src="https://cdn.ckeditor.com/4.11.2/standard/ckeditor.js"></script>
 <script type="text/javascript">
    CKEDITOR.replace('description', {
     // Load the Farsi interface.
        language: 'fa'
      });
</script>
<script>
    setTimeout(function() {
        $('.alert:not(.no-dismiss)').hide('slow', function(){ $target.remove(); });
    }, 6000);
</script>
@yield('scripts', '')
</body>
</html>
