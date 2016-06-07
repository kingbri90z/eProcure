<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>eProcure | Login</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="{!!asset('css/bootstrap.min.css')!!}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{!!asset('css/AdminLTE.min.css')!!}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{!!asset('css/blue.css')!!}">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition register-page">
<div class="login-box">
  <div class="login-logo">
    <a href="../../index2.html"><b>e</b>Procure</a>
  </div>
  <!-- /.login-logo -->
  @if (count($errors) > 0)
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
  @endif
   @if (session('status'))
      <div class="alert alert-success">
          {{ session('status') }}
      </div>
  @endif
  <div class="login-box-body">
    <p class="login-box-msg">Sign in</p>

    <form action="/user/login" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

      <div class="form-group has-feedback">
        <input type="email" class="form-control" placeholder="Email" name="email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Password" name="password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox"> Remember Me
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>


    <a href="#">I forgot my password</a><br>
    {{--<a href="register.html" class="text-center">Register a new Procurement Officer</a></br>--}}
    {{--<a href="register.html" class="text-center">Register a new Bidder</a>--}}

   </div>
         <div class="col-xs-6"></br>
           <a href="register/officer"><button type="submit" class="btn btn-primary btn-block btn-flat">Officer Registration</button></a>
            </div></br>
            <div class="col-xs-6">
              <a href="register/bidder"><button type="submit" class="btn btn-primary btn-block btn-flat">Bidder Registration</button></a>
          </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->
<!-- /.register-box -->

<!-- jQuery 2.2.0 -->
<script src="{!!asset('js/jQuery-2.2.0.min.js')!!}"></script>
<!-- Bootstrap 3.3.6 -->
<script src="{!!asset('js/bootstrap.min.js')!!}"></script>
<!-- iCheck -->
<script src="{!!asset('js/icheck.min.js')!!}"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
</body>
</html>
