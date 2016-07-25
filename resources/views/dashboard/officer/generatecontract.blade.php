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
      <li class="active"><a href="/contract/create"><i class="fa fa-plus-square-o"></i> <span>Create Contract</span></a></li>
                    <li><a href="/officer/reports"><i class="fa fa-file-o"></i> <span>Reports</span></a></li>

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
        Generate Contract
        {{--<small>Optional description</small>--}}
      </h1>

    </section>

    <!-- Main content -->
<section class="content">

          <div class="row">
            <!-- left column -->
            <div class="col-md-6">
              <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">CONTRACTUAL AGREEMENT</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form" method="POST" action="/officer/contract/generatepdf">
                  <div class="box-body">
                  <div class="form-group">
                    <label for="bid_no">Bid No.</label>
                    <input type="text" class="form-control" id="bid_no" value="{{$contract_data[0]->bid_id}}" name="bid_no" placeholder="Enter Bid Number">
                  </div>
                    {{--<div class="form-group">--}}
                      {{--<label for="Title">Title</label>--}}
                      {{--<input type="text" class="form-control" id="title" placeholder="Enter Title">--}}
                    {{--</div>--}}

                     <div class="form-group">
                      <label for="contractStart">Contract Start Date</label>
                      <input type="date" class="form-control" name="contract_start" id="date">
                         <input type="hidden" class="form-control" name="company"  value="{{$contract_data[0]->company}}">

                    </div>
                    <div class="form-group">
                      <label for="contractEnd">Contract End Date</label>
                      <input type="date" class="form-control" name="contract_end" id="date">
                    </div>
                    {{--<div class="form-group">--}}
                      {{--<label for="Bidget">Bidget Allocation (JMD)</label>--}}
                      {{--<input type="number" class="form-control" id="budget" name="budget_allocation" placeholder="Enter Value">--}}
                    {{--</div>--}}
                    {{--<div class="form-group">--}}
                      {{--<label for="proposedDate">Proposed Date</label>--}}
                      {{--<input type="date" class="form-control" id="date">--}}
                    {{--</div>--}}
                     {{--<div class="form-group">--}}
                       {{--<label>Classification</label>--}}
                       {{--<select class="form-control">--}}
                         {{--<option>Goods</option>--}}
                         {{--<option>Services</option>--}}
                         {{--<option>Goods & Services</option>--}}

                       {{--</select>--}}
                     {{--</div>--}}
                       <div class="form-group">
                         <label>Contract Note</label>
                         <textarea class="form-control" rows="3" cols="50" name="contract_note" placeholder="Enter Details Here">The Agreement, effective [ENTER CONTACT OPENING DATE], is entered into between GOJ and {{$contract_data[0]->company}}.&#13;&#10;WHEREAS, {{$contract_data[0]->company}} is a {{$contract_data[0]->category}} (contractor) in the region; and&#13;&#10;WHEREAS, this GOJ Entity is a public sector entity that will be the recipient of the {{$contract_data[0]->category}} to be provided.&#13;&#10;The provider ({{$contract_data[0]->company}}) is required to comply with the provision of:&#13;&#10;{{$contract_data[0]->bid_details}}&#13;&#10; At an estimated value of ${{$contract_data[0]->estimated_value}} (JMD) &#13;&#10;By the date of, [ENTER CONTRACT CLOSING DATE]&#13;&#10;___________________________&#13;&#10;Signature
                         </textarea>
                       </div>
                  <!-- /.box-body -->

                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary">GENERATE CONTRACT</button>
                  </div>
                </form>
              </div>
              </div>
               </div>
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


