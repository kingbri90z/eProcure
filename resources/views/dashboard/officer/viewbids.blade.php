@extends('layout.master')

@section('title','Procurement Officer Dashboard')

@section('content')


  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{!!asset('images/avatar.jpg')!!}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Brian Nelson</p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> Procurement Officer</a>
        </div>
      </div>



      <!-- Sidebar Menu -->
      <ul class="sidebar-menu">
        <li class="header">Procurement Officer Dashboard</li>
        <!-- Optionally, you can add icons to the links -->
         <li><a href="/officer/profile"><i class="fa fa-user"></i> <span>My Account</span></a></li>
        <li ><a href="/dashboard/officer/tenders"><i class="fa fa-ticket"></i> <span>View Tenders</span></a></li>
         <li ><a href="/tender/create"><i class="fa fa-plus"></i> <span>Create Tender</span></a></li>
        <li class="active"><a href="/officer/viewbids"><i class="fa fa-exchange"></i> <span>View Bids</span></a></li>
        <li><a href="/officer/contracts"><i class="fa fa-file-o"></i> <span>View Contracts</span></a></li>
        <li><a href="/contract/create"><i class="fa fa-plus-square-o"></i> <span>Create Contract</span></a></li>
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
        Current Bids
        {{--<small>Optional description</small>--}}
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
                        <th>Bid ID</th>
                        <th>Title of Tender</th>
                        {{--<th>Entity</th>--}}
                        <th>Projected Cost</th>
                        <th>Classification</th>
                         <th>Approve</th>
                         <th>Reject</th>
                      </tr>
                      </thead>
                      <tbody>
                      <tr>
                        <td>1</td>
                        <td>Office Desks
                        </td>
                        {{--<td>Win 95+</td>--}}
                        <td>$50,000</td>
                        <td>Goods</td>
                        <td class="text-center"><a href="#"><i class="glyphicon glyphicon-ok"></i></a></td>
                        <td class="text-center"><a href="#"><i class="glyphicon glyphicon-remove-circle"></i></a></td>
                      </tr>
                      <tr>
                         <td>2</td>
                         <td>Office Desks
                         </td>
                         {{--<td>Win 95+</td>--}}
                         <td>$50,000</td>
                         <td>Goods</td>
                         <td class="text-center"><a href="#"><i class="glyphicon glyphicon-ok"></i></a></td>
                         <td class="text-center"><a href="#"><i class="glyphicon glyphicon-remove-circle"></i></a></td>
                         </tr>
                      <tr>
                         <td>3</td>
                     <td>Office Desks
                     </td>
                     {{--<td>Win 95+</td>--}}
                     <td>$50,000</td>
                     <td>Goods</td>
                     <td class="text-center"><a href="#"><i class="glyphicon glyphicon-ok"></i></a></td>
                     <td class="text-center"><a href="#"><i class="glyphicon glyphicon-remove-circle"></i></a></td>
                    </tr>
                      <tr>
                     <td>4</td>
                     <td>Office Desks
                     </td>
                     {{--<td>Win 95+</td>--}}
                     <td>$50,000</td>
                     <td>Goods</td>
                     <td class="text-center"><a href="#"><i class="glyphicon glyphicon-ok"></i></a></td>
                     <td class="text-center"><a href="#"><i class="glyphicon glyphicon-remove-circle"></i></a></td>
                      </tr>

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

@endsection


