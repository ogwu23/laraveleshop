<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
     <!--     copy from the template    -->

      <link rel="stylesheet" href="{{asset('frontend/css/custom.css')}}">
       <link rel="stylesheet" href="{{asset('frontend/css/bootstrap5.min.css')}}">

      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
      <!-- jquery -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
      <!-- SweetAlert2 -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>


    <!-- Styles -->
    <!--<link href="{{ asset('css/app.css') }}" rel="stylesheet">-->


</head>
<body>




          <div class="main-panel">
            <div class="content-wrapper">
               @yield('content')
            </div>
          </div>





    <script src="{{asset('frontend/js/bootstrap.bundle.mim.js')}}"></script>


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
