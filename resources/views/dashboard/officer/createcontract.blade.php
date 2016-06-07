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
       <li><a href="/tender/create"><i class="fa fa-plus"></i> <span>Create Tender</span></a></li>
      <li><a href="/officer/viewbids"><i class="fa fa-exchange"></i> <span>View Bids</span></a></li>
      <li><a href="/officer/contracts"><i class="fa fa-file-o"></i> <span>View Contracts</span></a></li>
      <li class="active"><a href="/contract/create"><i class="fa fa-plus-square-o"></i> <span>Create Contract</span></a></li>
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
        Create Contract
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
                    <form role="form">
                      <div class="box-body">
                        <div class="form-group">
                          <label for="Title">Title</label>
                          <input type="text" class="form-control" id="title" placeholder="Enter Title">
                        </div>
                         <div class="form-group">
                           <label>Bidder</label>
                           <select class="form-control">
                             <option>option 1</option>
                             <option>option 2</option>
                             <option>option 3</option>
                             <option>option 4</option>
                             <option>option 5</option>
                           </select>
                         </div>

                         <div class="form-group">
                          <label for="openingDate">Opening Date</label>
                          <input type="date" class="form-control" id="date">
                        </div>
                        <div class="form-group">
                          <label for="closingDate">Closing Date</label>
                          <input type="date" class="form-control" id="date">
                        </div>
                        <div class="form-group">
                          <label for="Title">Estimated Value (JMD)</label>
                          <input type="number" class="form-control" id="title" placeholder="Enter Value">
                        </div>
                        {{--<div class="form-group">--}}
                          {{--<label for="proposedDate">Proposed Date</label>--}}
                          {{--<input type="date" class="form-control" id="date">--}}
                        {{--</div>--}}
                         <div class="form-group">
                           <label>Classification</label>
                           <select class="form-control">
                             <option>option 1</option>
                             <option>option 2</option>
                             <option>option 3</option>
                             <option>option 4</option>
                             <option>option 5</option>
                           </select>
                         </div>
                           <div class="form-group">
                             <label>Comments</label>
                             <textarea class="form-control" rows="3" placeholder="Enter comment here"></textarea>
                           </div>
                          <div class="form-group">
                            <label>State</label>
                            <select class="form-control">
                              <option>option 1</option>
                              <option>option 2</option>
                              <option>option 3</option>
                              <option>option 4</option>
                              <option>option 5</option>
                            </select>
                          </div>
                      <!-- /.box-body -->

                      <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
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


