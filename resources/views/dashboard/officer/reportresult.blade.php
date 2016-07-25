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
          <img src="{!!asset('images/officer.png')!!}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          {{--<p>Brian Nelson</p>--}}
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> Procurement Officer</a>
        </div>
      </div>



      <!-- Sidebar Menu -->
      <ul class="sidebar-menu">
        <li class="header">Procurement Officer Dashboard</li>
        <!-- Optionally, you can add icons to the links -->
                <li><a href="/officer/dashboard"><i class="fa fa-dashboard"></i> <span>Dashboard Overview</span></a></li>

        <li><a href="/officer/profile"><i class="fa fa-user"></i> <span>My Account</span></a></li>
       <li ><a href="/dashboard/officer/tenders"><i class="fa fa-ticket"></i> <span>View Tenders</span></a></li>
        <li><a href="/tender/create"><i class="fa fa-plus"></i> <span>Create Tender</span></a></li>
       <li ><a href="/officer/viewbids"><i class="fa fa-exchange"></i> <span>View Bids</span></a></li>
       <li><a href="/officer/contracts"><i class="fa fa-file-o"></i> <span>View Contracts</span></a></li>
       <li><a href="/contract/create"><i class="fa fa-plus-square-o"></i> <span>Create Contract</span></a></li>
               <li class="active"><a href="/officer/reports"><i class="fa fa-file-o"></i> <span>Reports</span></a></li>

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
        Report Result
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
                      @if($report_result[0]->id)
                        <th>ID</th>
                      @endif
                      @if($report_result[0]->title)
                        <th>Title</th>
                         @endif
                         @if($report_result[0]->bid_id)
                        <th>Bid No.</th>
                        @endif
                        @if($report_result[0]->open_date)
                        <th>Bid Start Date</th>
                        @endif
                        @if($report_result[0]->close_date)
                        <th>Bid End Date</th>
                        @endif
                        @if($report_result[0]->category)
                        <th>Classification</th>
                        @endif
                        @if($report_result[0]->description)
                        <th>Description</th>
                        @endif
                        @if($report_result[0]->company)
                         <th>Company</th>
                         @endif
                         @if($report_result[0]->bid_details)
                        <th>Bid Details</th>
                        @endif
                        @if($report_result[0]->estimated_value)
                         <th>Estimated Value</th>
                         @endif
                         @if($report_result[0]->trn)
                      <th>Bidder TRN</th>
                      @endif
                      @if($report_result[0]->email)
                      <th>Bidder Email</th>
                      @endif
                      @if($report_result[0]->contract_open_date)
                     <th>Contract Open Date</th>
                     @endif
                     @if($report_result[0]->contract_close_date)
                     <th>Contract Close Date</th>
                     @endif
                      </tr>
                      </thead>
                      <tbody>
                          @foreach ($report_result as $report)
                      <tr>
                       @if($report_result[0]->id)
                        <td>{{$report->id}}</td>
                        @endif
                        @if($report_result[0]->title)
                        <td>{{$report->title}}</td>
                        @endif
                        @if($report_result[0]->bid_id)
                        <td>{{$report->bid_id}}</td>
                         @endif
                         @if($report_result[0]->open_date)
                        <td>{{$report->open_date}}</td>
                        @endif
                        @if($report_result[0]->close_date)
                        <td>{{$report->close_date}}</td>
                        @endif
                        @if($report_result[0]->category)
                        <td>{{$report->category}}</td>
                         @endif
                         @if($report_result[0]->description)
                        <td>{{$report->description}}</td>
                        @endif
                        @if($report_result[0]->company)
                        <td>{{$report->company}}</td>
                        @endif
                        @if($report_result[0]->bid_details)
                        <td>{{$report->bid_details}}</td>
                         @endif
                          @if($report_result[0]->estimated_value)
                        <td>{{$report->estimated_value}}</td>
                        @endif
                        @if($report_result[0]->trn)
                        <td>{{$report->trn}}</td>
                         @endif
                         @if($report_result[0]->email)
                        <td>{{$report->email}}</td>
                         @endif
                         @if($report_result[0]->contract_open_date)
                        <td>{{$report->contract_open_date}}</td>
                        @endif
                        @if($report_result[0]->contract_close_date)
                        <td>{{$report->contract_close_date}}</td>
                        @endif

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


