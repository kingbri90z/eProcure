<?php $__env->startSection('content'); ?>
    <link rel="stylesheet" type="text/css" href="//catc.github.io/simple-hint/stylesheets/simple-hint.css">
    <style type="text/css">
        body {
            padding-right: 0px !important
        }

        .modal-open {
            overflow-y: auto;
        }
        @media  only screen and (max-width: 767px) {


            .table-header{
                position: absolute;
                top: -9999px;
                left: -9999px;
            }

            .blocks-items {
                border-bottom:1px solid #bbb;
                padding-bottom:3px;
                position: relative;
                background-color: #fff;
            }

            .blocks-items::before {
                font-weight: bold;
                content: attr(data-title) ": ";
            }

            .symbol{
                background: #c0c0c0;
                font-size: 2em;
            }
            .list-group-item{
                border:none;
                margin-bottom:4px;
            }

            .comments{
                background-color: #fff
            }
        }


        .detailBox {
            width:100%;
            border:1px solid #bbb;
            margin-top:10px;
        }
        .titleBox {
            background-color:#fdfdfd;
            padding:10px;
        }
        .titleBox label{
            color:#444;
            margin:0;
            display:inline-block;
        }

        .commentBox {
            padding:10px;
            border-top:1px dotted #bbb;
        }
        .commentBox .form-group:first-child, .actionBox .form-group:first-child {
            width:80%;
        }
        .commentBox .form-group:nth-child(2), .actionBox .form-group:nth-child(2) {
            width:18%;
        }
        .actionBox .form-group * {
            width:100%;
        }
        .taskDescription {
            margin-top:10px 0;
        }
        .commentList {
            padding:0;
            list-style:none;
            max-height:200px;
            overflow:auto;
        }
        .commentList li {
            margin:0;
            margin-top:10px;
        }
        .commentList li > div {
            display:table-cell;
        }
        .commenterImage {
            width:30px;
            margin-right:5px;
            height:100%;
            float:left;
        }
        .commenterImage img {
            width:100%;
            border-radius:50%;
        }
        .commentText p {
            margin:0;
        }
        .sub-text {
            color:#aaa;
            font-family:verdana;
            font-size:11px;
        }
        .actionBox {
            border-top:1px dotted #bbb;
            padding:10px;
        }
    </style>
    <h1>Current Blocks</h1>
    <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="buy">
            <ul class="list-group">
                <li class="list-group-item table-header active">
                    <div class="row">
                        <div class="col-sm-1">Symbol</div>
                        <div class="col-sm-1">Added</div>
                        <div class="col-sm-1">Exchange</div>
                        <div class="col-sm-1">Our Disc</div>
                        <div class="col-sm-1">Target Disc</div>
                        <div class="col-sm-1">Shares</div>
                        <div class="col-sm-1">Need</div>
                        <div class="col-sm-1">Custodian</div>
                        <div class="col-sm-1">Source</div>
                        <div class="col-sm-1">Qilin Rep</div>
                        <div class="col-sm-2">Notes</div>
                    </div>
                </li>


                <li class="list-group-item">
                    <table>
                        <div class="row active">
                            <div class="col-sm-1 blocks-items symbol" data-title="Symbol"><b>
                                    <?php if(session('is_admin')): ?>
                                        <a href="/blocks/<?php echo e($blocks->id); ?>/edit"><?php echo e($blocks->symbol); ?></a>
                                    <?php else: ?>
                                        <?php echo e($blocks->symbol); ?>

                                    <?php endif; ?>
                                </b></div>
                            <div class="col-sm-1 blocks-items" data-title="Added"><span class="date" data-hint="Created: <?php echo e($blocks->created_at); ?> EST" class="hint-bottom hint-anim-d-med"><?php echo e($blocks->date); ?></span></div>
                            <div class="col-sm-1 blocks-items" data-title="Exchange"><?php echo e($blocks->exchange); ?></div>
                            <div class="col-sm-1 blocks-items" data-title="Our Discount" class="numeric"><?php echo e($blocks->discount); ?></div>
                            <div class="col-sm-1 blocks-items" data-title="Target Discount" class="numeric"><?php echo e($blocks->discount_target); ?></div>
                            <div class="col-sm-1 blocks-items" data-title="Shares" class="numeric"><?php echo e($blocks->number_shares); ?></div>
                            <div class="col-sm-1 blocks-items" data-title="Need"><?php echo e($blocks->need); ?></div>
                            <div class="col-sm-1 blocks-items" data-title="Custodian"><?php echo e($blocks->custodian); ?></div>
                            <div class="col-sm-1 blocks-items" data-title="Source"><?php echo e($blocks->source); ?></div>
                            <div class="col-sm-1 blocks-items" data-title="Qilin Rep"><?php echo e($blocks->rep); ?></div>
                            <div class="col-sm-1 blocks-items" data-title="Notes"><button id="<?php echo e($blocks->id); ?>" data-id="<?php echo e($blocks->id); ?>" class="commentsShowHide btn btn-success">

                                    <?php if(empty($blocks->noteCount)): ?>
                                        +
                                    <?php else: ?>
                                        <span class="badge"><?php echo e($blocks->noteCount); ?></span>
                                    <?php endif; ?>
                                </button></div>
                            <div class="col-sm-1 blocks-items" data-title="Share"><button id="<?php echo e($blocks->id); ?>"  data-toggle="modal" data-target="#myModal" class="commentsShowHide btn btn-success"><span class="glyphicon glyphicon-share"></span></button></div>
                            <div class="rows">
                                <div class="col-md-12 comments" id="comments_<?php echo e($blocks->id); ?>">
                                    <div class="detailBox">
                                        <div class="titleBox">
                                            <label>Notes</label>
                                        </div>
                                        <div class="actionBox">
                                            <ul class="commentList" data-id="<?php echo e($blocks->id); ?>"></ul>
                                            <?php echo Form::open(array('url' => 'notes/' . $blocks->id,'class' => 'form-inline')); ?>


                                            <div class="form-group">
                                                <input name="block_id" type="hidden" value="<?php echo e($blocks->id); ?>">
                                                <input name="symbol" type="hidden" value="<?php echo e($blocks->symbol); ?>">
                                                <input class="form-control" name="body" type="text" placeholder="Leave a note" required/>
                                            </div>
                                            <div class="form-group">
                                                <button class="btn btn-success">Add</button>
                                            </div>

                                            <?php echo Form::close(); ?>


                                            <?php echo $__env->make('errors.errors', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                        </div>
                                    </div>



                                </div>
                            </div>
                            <div class="row active">
                    </table>
                </li>
            </ul>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Share <?php echo e($blocks->symbol); ?></h4>
                </div>
                <div class="modal-body">
                    <?php echo e($blocks->symbol); ?><br>
                    <?php echo e($blocks->number_shares); ?> shares<br>
                    <?php echo e($blocks->discount_target); ?>% discount<br>
                    1 tranche
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <a href="/blocks" class="btn btn-default btn-lg active" role="button"> <span class="glyphicon glyphicon-arrow-left"></span> Back to blocks</a>

    <script type="text/javascript">
        $( document ).ready(function() {

            $.date = function(dateObject) {
                var d = new Date(dateObject);
                var day = d.getDate();
                var month = d.getMonth() + 1;
                var year = d.getFullYear();
                if (day < 10) {
                    day = "0" + day;
                }
                if (month < 10) {
                    month = "0" + month;
                }
                var date = day + "/" + month + "/" + year;

                return date;
            };

            var id = <?php echo e($blocks->id); ?>;

            $.getJSON( "/notes/" + id, function( data ) {
                var html = '';

                $.each( data, function( key, val ) {
                    console.log(data[key]);
                    html = html + '<div class="commenterImage"><img src="' + data[key].avatar + '" style="width:30px;height:30px" /></div><li><div class="commenterImage"></div><div class="commentText"><p class="">"' + data[key].body + '"</p> <span class="date sub-text" data-hint="Created: ' + data[key].created_at + ' EST" class="hint-bottom hint-anim-d-med"> By ' + data[key].full_name + ' on ' + data[key].date + '</span></div></li>';
                });
                $('.commentList').html(html);
            });
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>