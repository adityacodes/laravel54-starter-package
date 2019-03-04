<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Aditya's Laravel Installer</title>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Bootstrap core CSS -->
    <link href="{{asset('css/app.css')}}" rel="stylesheet">
    <!-- Custom styles for this template -->
    @yield('stylesheets')
  </head>
  <body>
    <!-- Page Content -->
    <div class="container">
      @yield('content')
    </div>

    <script src="{{asset('js/app.js')}}"></script>
    @yield('scripts')
  </body>
</html>