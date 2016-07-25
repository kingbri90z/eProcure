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
          <li class="active"><a href="/bidder/profile"><i class="fa fa-user"></i> <span>Company Profile</span></a></li>
         <li><a href="/dashboard/bidder/tenders"><i class="fa fa-ticket"></i> <span>View Tenders</span></a></li>
         <li><a href="/bidder/mybids"><i class="fa fa-check"></i> <span>My Bids</span></a></li>
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
        Company Account
        {{--<small>Optional description</small>--}}
      </h1>

    </section>

   <!-- Main content -->
     <section class="content">

       <div class="row">
         <div class="col-md-8">

           <!-- Profile Image -->
           <div class="box box-primary">
             <div class="box-body box-profile">
               <img class="profile-user-img img-responsive img-circle" src="{!!asset('images/bidder.png')!!}" alt="User profile picture">

               <h3 class="profile-username text-center">DevCon Manufacturing Ltd</h3>

               <p class="text-muted text-center">Bidder</p>

               {{--<a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>--}}
             </div>
             <!-- /.box-body -->
           </div>
           <!-- /.box -->

           <!-- About Me Box -->
           <div class="box box-primary">
             <div class="box-header with-border">
               <h3 class="box-title">Details</h3>
             </div>
             <!-- /.box-header -->
             <div class="box-body">
               {{--<strong><i class="fa fa-building-o margin-r-5"></i> Employee ID</strong>--}}

                 {{--<p class="text-muted">--}}
                   {{--9820--}}
                 {{--</p>--}}

                 {{--<hr>--}}
               <strong><i class="fa fa-user margin-r-5"></i> Entity Name</strong>

               <p class="text-muted">
                {{$bidderDetails[0]->Name}}
               </p>

               <hr>
              {{--<strong><i class="fa fa-user margin-r-5"></i> Last Name</strong>--}}

               {{--<p class="text-muted">--}}
                 {{--Nelson--}}
               {{--</p>--}}

               <hr>
               <strong><i class="fa fa-user margin-r-5"></i> Address</strong>

              <p class="text-muted">
                {{$bidderDetails[0]->address}}
              </p>

              <hr>

               <strong><i class="fa fa-envelope margin-r-5"></i> Work Email</strong>

              <p class="text-muted">
                {{$bidderDetails[0]->email}}
              </p>

              <hr>
              <strong><i class="fa fa-phone margin-r-5"></i> Work Phone</strong>

             <p class="text-muted">
                {{$bidderDetails[0]->telephone}}
             </p>

             <hr>
<strong><i class="fa fa-phone margin-r-5"></i> Mobile Phone</strong>

             <p class="text-muted">
                {{$bidderDetails[0]->mobile}}
             </p>
                          <hr>

             <strong><i class="fa fa-phone margin-r-5"></i>Fax</strong>

                          <p class="text-muted">
                             {{$bidderDetails[0]->fax}}
                          </p>
                                       <hr>


               {{--<strong><i class="fa fa-file-text-o margin-r-5"></i> Notes</strong>--}}

               {{--<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>--}}
             </div>
             <!-- /.box-body -->
           </div>
           <!-- /.box -->
         </div>
         <!-- /.col -->
         {{--<div class="col-md-9">--}}
           {{--<div class="nav-tabs-custom">--}}
             {{--<ul class="nav nav-tabs">--}}
               {{--<li class="active"><a href="#activity" data-toggle="tab">Activity</a></li>--}}

             {{--</ul>--}}
             {{--<div class="tab-content">--}}
               {{--<div class="active tab-pane" id="activity">--}}
                 {{--<!-- Post -->--}}
                 {{--<div class="post">--}}
                   {{--<div class="user-block">--}}
                     {{--<img class="img-circle img-bordered-sm" src="{!!asset('images/bidder.png')!!}" alt="user image">--}}
                         {{--<span class="username">--}}
                           {{--<a href="#">DevCon Manufacturing Ltd</a>--}}
                           {{--<a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>--}}
                         {{--</span>--}}
                     {{--<span class="description">Public - 7:30 PM today</span>--}}
                   {{--</div>--}}
                   {{--<!-- /.user-block -->--}}
                   {{--<p>--}}
                     {{--Lorem ipsum represents a long-held tradition for designers,--}}
                     {{--typographers and the like. Some people hate it and argue for--}}
                     {{--its demise, but others ignore the hate as they create awesome--}}
                     {{--tools to help create filler text for everyone from bacon lovers--}}
                     {{--to Charlie Sheen fans.--}}
                   {{--</p>--}}
                   {{--<ul class="list-inline">--}}
                     {{--<li><a href="#" class="link-black text-sm"><i class="fa fa-share margin-r-5"></i> Share</a></li>--}}
                     {{--<li><a href="#" class="link-black text-sm"><i class="fa fa-thumbs-o-up margin-r-5"></i> Like</a>--}}
                     {{--</li>--}}
                     {{--<li class="pull-right">--}}
                       {{--<a href="#" class="link-black text-sm"><i class="fa fa-comments-o margin-r-5"></i> Comments--}}
                         {{--(5)</a></li>--}}
                   {{--</ul>--}}

                   {{--<input class="form-control input-sm" type="text" placeholder="Type a comment">--}}
                 {{--</div>--}}
                 {{--<!-- /.post -->--}}
 {{--<div class="post">--}}
                   {{--<div class="user-block">--}}
                     {{--<img class="img-circle img-bordered-sm" src="{!!asset('images/bidder.png')!!}" alt="user image">--}}
                         {{--<span class="username">--}}
                           {{--<a href="#">DevCon Manufacturing Ltd</a>--}}
                           {{--<a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>--}}
                         {{--</span>--}}
                     {{--<span class="description">Public - 7:30 PM today</span>--}}
                   {{--</div>--}}
                   {{--<!-- /.user-block -->--}}
                   {{--<p>--}}
                     {{--Lorem ipsum represents a long-held tradition for designers,--}}
                     {{--typographers and the like. Some people hate it and argue for--}}
                     {{--its demise, but others ignore the hate as they create awesome--}}
                     {{--tools to help create filler text for everyone from bacon lovers--}}
                     {{--to Charlie Sheen fans.--}}
                   {{--</p>--}}
                   {{--<ul class="list-inline">--}}
                     {{--<li><a href="#" class="link-black text-sm"><i class="fa fa-share margin-r-5"></i> Share</a></li>--}}
                     {{--<li><a href="#" class="link-black text-sm"><i class="fa fa-thumbs-o-up margin-r-5"></i> Like</a>--}}
                     {{--</li>--}}
                     {{--<li class="pull-right">--}}
                       {{--<a href="#" class="link-black text-sm"><i class="fa fa-comments-o margin-r-5"></i> Comments--}}
                         {{--(5)</a></li>--}}
                   {{--</ul>--}}

                   {{--<input class="form-control input-sm" type="text" placeholder="Type a comment">--}}
                 {{--</div>--}}
                  {{--<div class="post">--}}
                                    {{--<div class="user-block">--}}
                                      {{--<img class="img-circle img-bordered-sm" src="{!!asset('images/bidder.png')!!}" alt="user image">--}}
                                          {{--<span class="username">--}}
                                            {{--<a href="#">DevCon Manufacturing Ltd</a>--}}
                                            {{--<a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>--}}
                                          {{--</span>--}}
                                      {{--<span class="description">Public - 7:30 PM today</span>--}}
                                    {{--</div>--}}
                                    {{--<!-- /.user-block -->--}}
                                    {{--<p>--}}
                                      {{--Lorem ipsum represents a long-held tradition for designers,--}}
                                      {{--typographers and the like. Some people hate it and argue for--}}
                                      {{--its demise, but others ignore the hate as they create awesome--}}
                                      {{--tools to help create filler text for everyone from bacon lovers--}}
                                      {{--to Charlie Sheen fans.--}}
                                    {{--</p>--}}
                                    {{--<ul class="list-inline">--}}
                                      {{--<li><a href="#" class="link-black text-sm"><i class="fa fa-share margin-r-5"></i> Share</a></li>--}}
                                      {{--<li><a href="#" class="link-black text-sm"><i class="fa fa-thumbs-o-up margin-r-5"></i> Like</a>--}}
                                      {{--</li>--}}
                                      {{--<li class="pull-right">--}}
                                        {{--<a href="#" class="link-black text-sm"><i class="fa fa-comments-o margin-r-5"></i> Comments--}}
                                          {{--(5)</a></li>--}}
                                    {{--</ul>--}}

                                    {{--<input class="form-control input-sm" type="text" placeholder="Type a comment">--}}
                                  {{--</div>--}}
               {{--</div>--}}

             {{--</div>--}}
             {{--<!-- /.tab-content -->--}}
           {{--</div>--}}
           {{--<!-- /.nav-tabs-custom -->--}}
         {{--</div>--}}
         <!-- /.col -->
       </div>
       <!-- /.row -->

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


