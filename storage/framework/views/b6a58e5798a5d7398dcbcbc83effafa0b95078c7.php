<!DOCTYPE html>
<html>
    <head>
        <title>Team Qilin</title>

        <?php echo Html::style('css/app.css'); ?>


        <?php echo Html::script('js/jquery.min.js'); ?>

        <?php echo Html::script('js/bootstrap.min.js'); ?>


        <style>
        body { padding-top: 60px; }
        @media (max-width: 979px) {
            body { padding-top: 0px; }
        }
        </style>
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
                            <li><a href="/blocks">Add a block</a></li>
                        </ul>
                    </li>
                    <li><a href="">Contact</a></li>
                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </nav>

    <body>
        <div class="container">
            <?php echo $__env->yieldContent('content'); ?>
        </div><!-- /.container -->
    </body>
</html>