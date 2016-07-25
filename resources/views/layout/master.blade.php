<!DOCTYPE html>
  <html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>eProcure - @yield('title')</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="{!!asset('css/bootstrap.min.css')!!}">

     <link rel="stylesheet" href="{!!asset('css/sweetalert.css')!!}">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{!!asset('css/AdminLTE.min.css')!!}">
    <link rel="stylesheet" href="{!!asset('css/dataTables.bootstrap.css')!!}">


    <link rel="stylesheet" href="{!!asset('css/skin-blue.min.css')!!}">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
    <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
    @include('partials.header')

            @yield('content')

        @section('footer')
             @include('partials.footer')
        @show


         @section('scripts')
            {{--<!-- jQuery 2.2.0 -->--}}
            {{--<script src="{!!asset('js/jQuery-2.2.0.min.js')!!}"></script>--}}
            {{--<!-- Bootstrap 3.3.6 -->--}}
            {{--<script src="{!!asset('js/bootstrap.min.js')!!}"></script>--}}
            {{--<!-- AdminLTE App -->--}}
            {{--<script src="{!!asset('js/app.min.js')!!}"></script>--}}
         @show
         </div>
    </body>
</html>