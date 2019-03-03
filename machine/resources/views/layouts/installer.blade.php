<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Aditya's Laravel Installer</title>
    <!-- Bootstrap core CSS -->
    <link href="{{asset('bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <!-- Custom styles for this template -->
    @yield('stylesheets')
  </head>
  <body>
    <!-- Page Content -->
    <div class="container">
      @yield('content')
    </div>

    <script src="{{asset('jquery/jquery.min.js')}}"></script>
    <script src="{{asset('popper/popper.min.js')}}"></script>
    <script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
    @yield('scripts')
  </body>
</html>