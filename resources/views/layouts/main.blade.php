<!DOCTYPE html>
<html>
    <head>
        <title>Team Qilin</title>

        {!! Html::style('css/app.css') !!}
        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">

        {!! Html::script('js/jquery.min.js') !!}
        {!! Html::script('js/bootstrap.min.js') !!}
        {!! Html::script('js/moment.js') !!}
        {!! Html::script('//code.jquery.com/ui/1.11.1/jquery-ui.js') !!}


        <style>
        body { padding-top: 60px; }
        @media (max-width: 979px) {
            body { padding-top: 0px; }
        }
        @media only screen and (max-width: 979px) {
         .content { padding-top:65px;}
        }
        </style>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    </head>

    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Team Qilin</a>
            </div>
            <div id="navbar" class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li><a href="/">Home</a></li>
                    <li><a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        Blocks
                        <b class="caret"></b>
                        <ul class="dropdown-menu">
                            <li><a href="/blocks">View All</a></li>
                            <li><a href="/blocks/create">Add a block</a></li>
                        </ul>
                    </li>
                @if(session('is_admin'))
                    <li><a href="/admin">Admin </a></li>
                @endif
                    <li><a href="/logout">Logout </a></li>
                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </nav>

    <body>
        <div class="container content">
            @yield('content')
        </div><!-- /.container -->
    </body>
</html>