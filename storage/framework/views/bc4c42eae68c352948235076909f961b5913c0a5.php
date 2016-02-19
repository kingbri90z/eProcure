<?php $__env->startSection('content'); ?>
<link rel="stylesheet" type="text/css" href="//catc.github.io/simple-hint/stylesheets/simple-hint.css">
<style type="text/css">

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
		background: #c0c0c0;
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


<ul class="list-group">
	<li class="list-group-item table-header active">
		<div class="row">
			<div class="col-sm-1">Symbol</div>
			<div class="col-sm-2">Exchange</div>
			<div class="col-sm-1">Discount</div>
			<div class="col-sm-2">Shares</div>
			<div class="col-sm-1">Need</div>
			<div class="col-sm-2">Custodian</div>
			<div class="col-sm-2">Qilin Rep</div>
			<div class="col-sm-1">Notes</div>
		</div>
	</li>
	<?php foreach($blocks as $block): ?>

  	<li class="list-group-item">
		<table>
			<div class="row active">
				<div class="col-sm-1 blocks-items symbol" data-title="Symbol"><?php echo e($block->symbol); ?></div>
				<div class="col-sm-2 blocks-items" data-title="Exchange"><?php echo e($block->exchange); ?></div>
				<div class="col-sm-1 blocks-items" data-title="Discount" class="numeric"><?php echo e($block->discount); ?></div>
				<div class="col-sm-2 blocks-items" data-title="Shares" class="numeric"><?php echo e($block->number_shares); ?></div>
				<div class="col-sm-1 blocks-items" data-title="Need"><?php echo e($block->symbol); ?></div>
				<div class="col-sm-2 blocks-items" data-title="Custodian"><?php echo e($block->custodian); ?></div>
				<div class="col-sm-2 blocks-items" data-title="Qilin Rep"><?php echo e($block->rep); ?></div>
				<div class="col-sm-1 blocks-items" data-title="Notes"><button data-id="<?php echo e($block->id); ?>" class="commentsShowHide btn btn-success">+</button></div>
				<div class="rows">
					<div class="col-md-12 comments" id="comments_<?php echo e($block->id); ?>">
						<div class="detailBox">
						    <div class="titleBox">
						      <label>Notes</label>
						    </div>
						    <div class="actionBox">
						        <ul class="commentList" data-id="<?php echo e($block->id); ?>"></ul>
						        <?php echo Form::open(array('url' => 'notes/' . $block->id,'class' => 'form-inline')); ?>


					        	    <div class="form-group">
										<input name="block_id" type="hidden" value="<?php echo e($block->id); ?>">
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
	<?php endforeach; ?>

</ul>
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

	    $('.comments').hide();
	    $('.commentsShowHide').click(function(){
	    	var parent = $(this);
	    	var id = parent.attr('data-id');

			$.getJSON( "/notes/" + id, function( data ) {
			  var html = '';
			  console.log(data);
			  $.each( data, function( key, val ) {
			  	console.log(data[key]);
			    html = html + '<div class="commenterImage"><img src="' + data[key].avatar + '" style="width:30px;height:30px" /></div><li><div class="commenterImage"></div><div class="commentText"><p class="">"' + data[key].body + '"</p> <span class="date sub-text" data-hint="Created: ' + data[key].created_at + ' EST" class="hint-bottom hint-anim-d-med">on ' + data[key].date + '</span></div></li>';

			  });
			  $('.commentList[data-id="' + id + '"]').html(html);

			});

	    	$('#comments_' + id).toggle("slow",function(){
	    		parent.text(function(i, text){
          			return text === "+" ? "-" : "+";
      			})
	    	});

	    });
	});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>