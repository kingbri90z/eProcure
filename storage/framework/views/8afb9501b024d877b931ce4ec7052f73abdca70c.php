<!DOCTYPE html>
<html>
    <head>
        <title>Team Qilin</title>

        <?php echo Html::style('css/app.css'); ?>

        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
        <?php echo Html::style('css/style.css'); ?>


        <?php echo Html::script('js/jquery.min.js'); ?>

        <?php echo Html::script('js/bootstrap.min.js'); ?>

        <?php echo Html::script('js/moment.js'); ?>

        <?php echo Html::script('//code.jquery.com/ui/1.11.1/jquery-ui.js'); ?>



        <style>
        body { padding-top: 60px; }
        @media (max-width: 979px) {
            body { padding-top: 0px; }
        }
        @media  only screen and (max-width: 979px) {
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
                            <li><a href="/blocks">View Active</a></li>
                            <li><a href="/blocks/all">View All</a></li>
                            <li><a href="/blocks/create">Add a block</a></li>
                        </ul>
                    </li>
                    <li><a href="/custodians">Custodians</a></li>
                <?php if(session('is_admin')): ?>
                    <li><a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            Admin
                            <b class="caret"></b>
                            <ul class="dropdown-menu">
                                <li><a href="/admin">Users </a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="/exchanges">Exchanges</a></li>
                                <li><a href="/exchanges/create">Add a Exchange</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="/reps">Reps</a></li>
                                <li><a href="/reps/create">Add a Rep</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="/admin/custodians">Custodians</a></li>
                                <li><a href="/admin/custodians/create">Add a Custodian</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="/admin/symbols">Symbols</a></li>
                                <li><a href="/admin/symbols/add">Add a Symbol</a></li>
                            </ul>
                    </li>
                <?php endif; ?>
                    <li><a href="/logout">Logout </a></li>
                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </nav>

    <body>
        <div class="container content">
            <?php echo $__env->yieldContent('content'); ?>
        </div><!-- /.container -->
    </body>
</html>