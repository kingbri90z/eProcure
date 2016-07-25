@extends('layout.master')

@section('title','Administrator Dashboard')

@section('content')


  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{!!asset('images/admin.png')!!}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Administrator</p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> Admin</a>
        </div>
      </div>



      <!-- Sidebar Menu -->
      <ul class="sidebar-menu">
         <li class="header">Administrator Dashboard</li>
                <!-- Optionally, you can add icons to the links -->
                <li><a href="/dashboard/admin"><i class="fa fa-user"></i> <span>Manage Users</span></a></li>
               {{--<li class="active"><a href="/dashboard/bidder/tenders"><i class="fa fa-ticket"></i> <span>View Tenders</span></a></li>--}}
               {{--<li ><a href="/bidder/mybids"><i class="fa fa-check"></i> <span>My Bids</span></a></li>--}}
               <li><a href="/user/logout"><i class="fa fa-sign-out"></i> <span>Logout</span></a></li>
</ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
All Users
      </h1>

    </section>

    <!-- Main content -->
    <section class="content">

        
            <div class="row">
              <div class="col-xs-12">


                <div class="box">
                  <div class="box-header">
                    {{--<h3 class="box-title">Data Table With Full Features</h3>--}}
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body">
                    <table id="example1" class="table table-bordered table-hover">
                      <thead>
                      <tr>
                        <th>ID</th>
                        <th>Email</th>
                        <th>User Type</th>
                         <th>Created Date</th>
                        <th>Reset Password</th>
                         <th>Enable Account</th>
                         <th>Disable Account</th>

                      </tr>
                      </thead>
                      <tbody>
                      @foreach($users as $user)
                      <tr>


                        <td>{{$user->id}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->type}}</td>
                        <td>{{date('F d, Y', strtotime($user->created_at))}}</td>
                        <td class="text-center">
                            <a href="#">
                                <button type="button" id="reset" data-user="{{$user->id}}" class="btn btn-sm btn-warning"><b>Reset </b></button>
                            </a>
                        </td>
                        <td class="text-center">
                            <a href="#">
                                <button type="button" id="enable" data-user="{{$user->id}}" class="btn btn-sm btn-success"><b>Enable</b></button>
                            </a>
                        </td>
                         <td class="text-center">
                        <a href="#">
                            <button type="button" id="disable" data-user="{{$user->id}}" class="btn btn-sm btn-danger"><b>Disable</b></button>
                        </a>
                    </td>
                        </tr>
                        @endforeach


                      </tbody>

                    </table>
                  </div>
                  <!-- /.box-body -->
                </div>
                <!-- /.box -->
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->

          <!-- /.content -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<script src="{!!asset('js/jQuery-2.2.0.min.js')!!}"></script>
<script src="{!!asset('js/bootstrap.min.js')!!}"></script>
<script src="{!!asset('js/jquery.dataTables.min.js')!!}"></script>
<script src="{!!asset('js/dataTables.bootstrap.min.js')!!}"></script>
<script src="{!!asset('js/jquery.slimscroll.min.js')!!}"></script>
<script src="{!!asset('js/fastclick.min.js')!!}"></script>
<script src="{!!asset('js/app.js')!!}"></script>
<script src="{!!asset('js/demo.js')!!}"></script>
<script src="{!!asset('js/sweetalert.js')!!}"></script>

<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>

<script>

    $("button#disable").click(function () {

    userId = $(this).data('user');
    var selected = this;
    swal({
    title: "Are you sure?",
    text: "The user will not be able to log into the system.",
    type: "warning",
    showCancelButton: true,
    confirmButtonColor: "#DD6B55",
    confirmButtonText: "Yes, disable it!",
    closeOnConfirm: false
    },
    function (isConfirm) {
    if (isConfirm) {
    $.post("{!!URL::to('/')!!}" + "/disableuser/" + userId).then(function (data) {
    if (data == "success") {
    swal(
        "Done!",
        "User account was successfully disabled.",
        "success");
//        $(selected).closest("tr").hide();

    } else {
    swal(
        "Oops! Something went wrong.",
        "USer account was not disabled.",
        "error");

    }
    });
    }
    });
    }
    );


       $("button#enable").click(function () {
          var userId = $(this).data('user');
          var selected = this;
           $.post("{!!URL::to('/')!!}" + "/enableuser/" + userId).then(function (data) {
           if (data == "success") {
              swal({
              title: "Account was enabled successfully.",
              timer: 2000,
              showConfirmButton: false,
          });
          }
          else
          {
          swal(
              "Oops! Something went wrong.",
              "User account was not enabled.",
              "error");

              }
          })
          });

                $("button#reset").click(function () {

                    userId = $(this).data('user');
                    var selected = this;
                    swal({
                    title: "Are you sure?",
                    text: "The user password will reset to the default password.",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Yes, reset it!",
                    closeOnConfirm: false
                    },
                    function (isConfirm) {
                    if (isConfirm) {
                    $.post("{!!URL::to('/')!!}" + "/resetpassword/" + userId).then(function (data) {
                    if (data == "success") {
                    swal(
                        "Done!",
                        "User password was reset to the default.",
                        "success");
                //        $(selected).closest("tr").hide();

                    } else {
                    swal(
                        "Oops! Something went wrong.",
                        "Unable to reset user password.",
                        "error");

                    }
                    });
                    }
                    });
                    }
                    );

</script>
@endsection


