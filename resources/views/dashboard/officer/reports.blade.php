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
          <p>Brian Nelson</p>
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
      <li><a href="/officer/viewbids"><i class="fa fa-exchange"></i> <span>View Bids</span></a></li>
      <li><a href="/officer/contracts"><i class="fa fa-file-o"></i> <span>View Contracts</span></a></li>
      <li ><a href="/contract/create"><i class="fa fa-plus-square-o"></i> <span>Create Contract</span></a></li>
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
Report Generation
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
            <h4></h4>
            <form role="form" method="POST" action="/officer/generatereport" >
                  <div class="box-body">
                  <div class="form-group col-xs-3">
                    <label for="bid_start_range">Bid Start Range (JMD)</label>
                    <input type="number" class="form-control" id="bid_start_range"  name="bid_start_range" placeholder="Start Range">

                      <label for="bid_end_range">Bid End Range (JMD)</label>
                      <input type="number" class="form-control" name="bid_end_range" id="bid_end_range" placeholder="Bid End Range"><br>
                    </div>
                     <div class="form-group col-xs-3">
                                        <label for="bid_category">Bid Category</label>
                    <select name="classification" class="form-control">
                    <option></option>
                        <option value="Goods & Services">Goods & Services</option>
                        <option value="Goods">Goods</option>
                        <option value="Services">Services</option>
                    </select>
                          <label for="bid_title">Bid Title</label>
                          <input type="text" class="form-control" name="bid_title"  placeholder="Enter Bid Tile"><br>
                        </div>
                    <div class="form-group col-xs-3">
                            <label for="bid_start_date">Bid Start Date</label>
                            <input type="date" class="form-control" id="bid_start_date"  name="bid_start_date" placeholder="Start Range">

                              <label for="bid_close_date">Bid End Date</label>
                              <input type="date" class="form-control" name="bid_end_date" id="bid_end_date" placeholder="Bid End Range"><br>
                            </div>
                        <div class="form-group col-xs-3">
                        <label for="bidder_email">Bidder's Email</label>
                        <input type="text" class="form-control" id="bidder_email"  name="bidder_email" placeholder="Bidder's Email">

                          <label for="bidder_trn">Bidder's TRN</label>
                          <input type="text" class="form-control" name="bidder_trn" id="bid_trn" placeholder="Bidder's TRN"><br>
                        </div>
                                <div class="form-group col-xs-3">
                        <label for="contract_open_date">Contract Open Date</label>
                        <input type="date" class="form-control" id="contract_open_date"  name="contract_close_date" placeholder="Contract Open Date">

                          <label for="contract_close_date">Contract Close Date</label>
                          <input type="date" class="form-control" name="contract_close_date" id="contract_close_date" placeholder="Contract Close Date"><br>
                        </div>
<div class="form-group col-xs-3">
                        <label for="bidder_join_from">Bidder Join Date - From</label>
                        <input type="date" class="form-control" id="bidder_join_from"  name="bidder_join_from" placeholder="Bidder Join Date From">

                          <label for="bidder_join_to">Bidder Join Date - To</label>
                          <input type="date" class="form-control" name="bidder_join_to" id="bidder_join_to" placeholder="Bidder Join Date To"><br>
                        </div>
<br><br><br><br><br><br><br><br><br><br><br><br><br>
<br><br>

                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary">GENERATE REPORT</button>
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


@endsection


