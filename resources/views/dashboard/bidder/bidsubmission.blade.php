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
          {{--<p>DevCon Manufacturing Ltd</p>--}}
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> Bidder</a>
        </div>
      </div>



      <!-- Sidebar Menu -->
      <ul class="sidebar-menu">
         <li class="header">Bidder Dashboard</li>
                <!-- Optionally, you can add icons to the links -->
                 <li><a href="/bidder/profile"><i class="fa fa-user"></i> <span>Company Profile</span></a></li>
                <li class="active"><a href="/dashboard/bidder/tenders"><i class="fa fa-ticket"></i> <span>View Tenders</span></a></li>
                <li><a href="/bidder/mybids"><i class="fa fa-check"></i> <span>My Bids</span></a></li>
                <li><a href="/user/logout"><i class="fa fa-sign-out"></i> <span>Logout</span></a></li> </ul>
<!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Bid Submission
        {{--<small>Optional description</small>--}}
      </h1>

    </section>

    <!-- Main content -->
    <section class="content">


            <div class="row">
              <div class="col-xs-6">


                <div class="box">
                  <div class="box-header">
                    {{--<h3 class="box-title">Data Table With Full Features</h3>--}}
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body">
                        <form action="/bidder/bidsubmission/store" method="post">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                              <div class="form-group has-feedback">
                               <label>Bid No.</label>
                                <input type="text" class="form-control" value="{{$bidno}}" placeholder="Bid No." name="bidno" readonly>
                                {{--<span class="glyphicon glyphicon-envelope form-control-feedback"></span>--}}
                              </div>
                              <div class="form-group has-feedback">
                              <label>Title</label>
                              <input type="text" class="form-control" placeholder="Bid Title" value="{{$tender[0]->Title}}" name="title" readonly>
                            <input type="hidden" value="{{$tender[0]->id}}" name="tender_id" readonly>

                              {{--<span class="glyphicon glyphicon-lock form-control-feedback"></span>--}}
                            </div>
                              <div class="form-group has-feedback">
                               <label>Date</label>
                                <input type="text" class="form-control" placeholder="Date & Time" value="{{date("F j, Y")}}" name="biddate" readonly>
                                {{--<span class="glyphicon glyphicon-lock form-control-feedback"></span>--}}
                              </div>
                              <div class="form-group has-feedback">
                               <label>Company</label>
                              <input type="text" class="form-control" placeholder="Company Name" value="{{$company[0]->Name}}" name="company" readonly>
                              {{--<span class="glyphicon glyphicon-lock form-control-feedback"></span>--}}
                            </div>
                            <div class="form-group has-feedback">
                            <label>Category</label>
                              <input type="text" class="form-control" placeholder="Category" name="category" value="{{$tender[0]->classification}}"readonly>
                              {{--<span class="glyphicon glyphicon-lock form-control-feedback"></span>--}}
                            </div>
                             <div class="form-group has-feedback">
                             <label>Estimated Value (JMD)</label>
                              <input type="text" class="form-control" placeholder="Estimated Value" name="estimatedvalue">
                              {{--<span class="glyphicon glyphicon-lock form-control-feedback"></span>--}}
                            </div>
                            <div class="form-group has-feedback">
                            <label>Bid Details</label>
                            <textarea rows="4" cols="50"  class="form-control" name="bid_details" placeholder="Bid Details">

                            </textarea>
                            </div>
                              <div class="row">
                                <!-- /.col -->
                                <div class="col-xs-4">
                                  <button type="submit" class="btn btn-primary btn-block btn-flat">Submit</button>
                                </div>
                                <!-- /.col -->
                              </div>
                            </form>

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


