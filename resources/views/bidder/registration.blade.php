<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>eProcure | Bidder Registration</title>
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
<div class="register-box">
  <div class="register-logo">
    <a href="/"><b>e</b>Procure</a>
  </div>

  <div class="register-box-body">
    <p class="login-box-msg">Bidder Registration</p>

    <form action="/bidder/store" method="post">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Name of Business" name="business_name">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="email" class="form-control" placeholder="Email" name="email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
            <div class="form-group has-feedback">
         <textarea class="form-control" rows="2" placeholder="Company Address" name="address"></textarea>
      </div>
      <div class="form-group has-feedback">
              <input type="text" class="form-control" placeholder="Business TRN" name="business_trn">
              <span class="glyphicon glyphicon-credit-card form-control-feedback"></span>
            </div>
              <div class="form-group has-feedback">
                          <input type="text" class="form-control"  placeholder="Eg.: (999)999-9999" name="telephone">
                          <span class="glyphicon glyphicon-earphone form-control-feedback"></span>
                        </div>
                           <div class="form-group has-feedback">
                              <input type="text" class="form-control" placeholder="(999)999-9999" name="mobile">
                              <span class="glyphicon glyphicon-phone form-control-feedback"></span>
                            </div>
                             <div class="form-group has-feedback">
                          <input type="text" class="form-control" placeholder="Fax" name="fax">
                          <span class="glyphicon glyphicon-print form-control-feedback"></span>
                        </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Password" name="password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Retype password" name="confirm_password">
        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
      </div>

      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox"> I agree to the <a href="#">terms</a>
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
        </div>
        <!-- /.col -->
      </div>
    </form>



    <a href="/" class="text-center">I am already registered.</a>
  </div>
  <!-- /.form-box -->
</div>
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
