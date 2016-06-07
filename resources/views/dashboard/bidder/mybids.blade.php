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
          <img src="{!!asset('images/bidder.png')!!}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>DevCon Manufacturing Ltd</p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> Bidder</a>
        </div>
      </div>



      <!-- Sidebar Menu -->
      <ul class="sidebar-menu">
         <li class="header">Bidder Dashboard</li>
                <!-- Optionally, you can add icons to the links -->
                <li><a href="/bidder/profile"><i class="fa fa-user"></i> <span>Company Profile</span></a></li>
                <li><a href="/dashboard/bidder/tenders"><i class="fa fa-ticket"></i> <span>View Tenders</span></a></li>
                <li class="active"><a href="/bidder/mybids"><i class="fa fa-check"></i> <span>My Bids</span></a></li>
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
        My Bids
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
                        <th>ID</th>
                        <th>Title</th>
                        {{--<th>Entity</th>--}}
                        <th>Start Date</th>
                        <th>End Date</th>
                        {{--<th>Estimated Value</th>--}}
                        <th>Classification</th>
                        {{--<th>Comments</th>--}}
                         <th>State</th>
                         <th>Bid</th>
                      </tr>
                      </thead>
                      <tbody>
                      <tr>
                        <td>1</td>
                        <td>Desktop Computers & Installation
                        </td>
                        {{--<td>Win 95+</td>--}}
                        <td>July 1, 2016</td>
                        <td>July 31, 2016</td>
                        {{--<td>X</td>--}}
                        <td>Goods & Services</td>
                        {{--<td>To be contacted</td>--}}
                       <td>Active</td>
                        <td class="text-center">
                            <a href="#">
                                <button type="button" class="btn btn-block btn-danger"><b>Revoke</b></button>
                            </a>
                        </td>
                        </tr>
                      <tr>
                      <td>2</td>
                      <td>Steel and Lumbers
                      </td>
                      {{--<td>Win 95+</td>--}}
                      <td>May 1, 2016</td>
                      <td>July 31, 2016</td>
                      {{--<td>X</td>--}}
                      <td>Goods</td>
                      {{--<td>To be contacted</td>--}}
                     <td>Active</td>
                      <td class="text-center">
                          <a href="#">
                              <button type="button" class="btn btn-block btn-danger"><b>Revoke</b></button>
                          </a>
                      </td>
                        </tr>
                     <tr>
                       <td>3</td>
                       <td>Sagem Officer Phones
                       </td>
                       {{--<td>Win 95+</td>--}}
                       <td>February 1, 2016</td>
                       <td>August 31, 2016</td>
                       {{--<td>X</td>--}}
                       <td>Goods</td>
                       {{--<td>To be contacted</td>--}}
                      <td>Active</td>
                       <td class="text-center">
                           <a href="#">
                               <button type="button" class="btn btn-block btn-danger"><b>Revoke</b></button>
                           </a>
                       </td>
                       </tr>
                     <tr>
                       <td>4</td>
                           <td>MacBook Computers
                           </td>
                           {{--<td>Win 95+</td>--}}
                           <td>June 1, 2016</td>
                           <td>September 31, 2016</td>
                           {{--<td>X</td>--}}
                           <td>Goods</td>
                           {{--<td>To be contacted</td>--}}
                          <td>Active</td>
                           <td class="text-center">
                               <a href="#">
                                   <button type="button" class="btn btn-block btn-danger"><b>Revoke</b></button>
                               </a>
                           </td>
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


