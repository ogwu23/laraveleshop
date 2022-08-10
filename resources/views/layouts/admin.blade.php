<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
     <!--     copy from the template    -->
     <!-- plugins:css -->
     <link rel="stylesheet" href="{{asset('admin/assets/vendors/mdi/css/materialdesignicons.min.css')}}">
     <link rel="stylesheet" href="{{asset('admin/assets/vendors/base/vendor.bundle.base.css')}}">
     <!-- endinject -->
     <!-- plugin css for this page -->
     <link rel="stylesheet" href="{{asset('admin/assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css')}}">
     <!-- End plugin css for this page -->
     <!-- inject:css -->
     <link rel="stylesheet" href="{{asset('admin/assets/css/style.css')}}">
     <!-- endinject -->
     <link rel="shortcut icon" href="{{asset('admin/assets/images/favicon.png')}}" />

      <!--<link rel="stylesheet" href="{{asset('admin/css/custom.css')}}">-->


      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
      <!-- jquery -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
      <!-- SweetAlert2 -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>


    <!-- Styles -->
    <!--<link href="{{ asset('css/app.css') }}" rel="stylesheet">-->


</head>
<body>

      <div class="container-scroller">

     @include('layouts.inc.adminnavbar')

        <div class="container-fluid page-body-wrapper">
            @include('layouts.inc.adminsidebar')
          <div class="main-panel">
            <div class="content-wrapper">
               @yield('content')
            </div>

              @include('layouts.inc.adminfooter')
          </div>

        </div>
      </div>


    <!-- include the js from the dashboard template> -->
    <!--   Core JS Files   -->
    <!-- plugins:js -->
    <script src="{{asset('admin/assets/vendors/base/vendor.bundle.base.js')}}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page-->
    <script src="{{asset('admin/assets/vendors/chart.js/Chart.min.js')}}"></script>
    <script src="{{asset('admin/assets/vendors/datatables.net/jquery.dataTables.js')}}"></script>
    <script src="{{asset('admin/assets/vendors/datatables.net-bs4/dataTables.bootstrap4.js')}}"></script>
    <!-- End plugin js for this page-->
    <!-- inject:js -->
    <script src="{{asset('admin/assets/js/off-canvas.js')}}"></script>
    <script src="{{asset('admin/assets/js/hoverable-collapse.js')}}"></script>
    <script src="{{asset('admin/assets/js/template.js')}}"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="{{asset('admin/assets/js/dashboard.js')}}"></script>
    <script src="{{asset('admin/assets/js/data-table.js')}}"></script>
    <script src="{{asset('admin/assets/js/jquery.dataTables.js')}}"></script>
    <script src="{{asset('admin/assets/js/dataTables.bootstrap4.js')}}"></script>
    <!-- End custom js for this page-->

      <!-- add js of sweet Alert-->
      <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        @if(session('status'))
        <script>
          swal("{{session('status')}}", "You clicked the button!", "success");
        </script>
        @endif
        <script>
      $('.delete-confirm').on('click', function (event) {
      event.preventDefault();
      const url = $(this).attr('href');
      swal({
          title: 'Are you sure?',
          text: 'This record and it`s details will be permanantly deleted!',
          icon: 'warning',
          buttons: ["Cancel", "Yes!"],
          }).then(function(value) {
          if (value) {
          window.location.href = url;
        }
      });
     });
     //always run -1.composer require realrashid/sweet-alert
     //2.php artisan sweetalert:publish. run it first before anything else.
</script>
      @yield('scripts')

</body>
</html>
