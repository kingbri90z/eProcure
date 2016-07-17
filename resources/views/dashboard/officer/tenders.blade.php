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
       <li class="active"><a href="/dashboard/officer/tenders"><i class="fa fa-ticket"></i> <span>View Tenders</span></a></li>
        <li><a href="/tender/create"><i class="fa fa-plus"></i> <span>Create Tender</span></a></li>
       <li ><a href="/officer/viewbids"><i class="fa fa-exchange"></i> <span>View Bids</span></a></li>
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
        Available Tenders
        {{--<small>Optional description</small>--}}
      </h1>

    </section>

    <!-- Main content -->
    <section class="content">

            <div class="row">
              <div class="col-xs-12">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

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
                        <th>Comments</th>
                         <th>State</th>
                        <th>No. of Bids</th>
                         <th>Edit</th>
                         <th>Delete</th>
                      </tr>
                      </thead>
                      <tbody>
                          @foreach ($tenders as $tender)
                      <tr>
                        <td>{{$tender['id']}}</td>
                        <td><a href="#" data-toggle="modal" data-target="#{{$tender['id']}}">{{$tender['Title']}}</a></td>
                        <td>{{$tender['open_date']}}</td>
                        <td>{{$tender['close_date']}}</td>
                        <td>{{$tender['classification']}}</td>
                        <td>{{$tender['comments']}}</td>
                        <td>{{$tender['state']}}</td>
                        <td>3</td>
                        <td class="text-center"><a href="#"><i class="glyphicon glyphicon-edit"></i></a></td>
                        <td class="text-center"><a href="#"><i class="glyphicon glyphicon-remove"></i></a></td>

                         <!-- Modal -->
                      <div id="{{$tender['id']}}" class="modal fade" role="dialog">
                        <div class="modal-dialog">

                          <!-- Modal content-->
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h4 class="modal-title">Item Description</h4>
                            </div>
                            <div class="modal-body">
                              <p>{{$tender['description']}}</p>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                          </div>

                        </div>
                      </div>
                      <!--End Modal-->

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


