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
<h1>Current Blocks <a href="/blocks/create" class="btn btn-success"> + </a></h1>

<ul class="nav nav-tabs" id="displayTabs">
  <li role="presentation" class="active"><a href="#buy" aria-controls="buy" role="tab" data-toggle="tab">Buy Side</a></li>
  <li role="presentation"><a href="#sell" aria-controls="Sell" role="tab" data-toggle="tab">Sell Side</a></li>
</ul>
<div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="buy">
		<?php echo $__env->make('blocks.table', ['blockType' => 'Buyer'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	</div>
    <div role="tabpanel" class="tab-pane" id="sell">
    	<?php echo $__env->make('blocks.table', ['blockType' => 'Seller'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </div>
</div>
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
			  $.each( data, function( key, val ) {
			    html = html + '<div class="commenterImage"><img src="' + data[key].avatar + '" style="width:30px;height:30px" /></div><li><div class="commenterImage"></div><div class="commentText"><p class="">"' + data[key].body + '"</p> <span class="date sub-text" data-hint="Created: ' + data[key].created_at + ' EST" class="hint-bottom hint-anim-d-med"> By ' + data[key].full_name + ' on ' + data[key].date + '</span></div></li>';
			  });
			$('.commentList[data-id="' + id + '"]').html(html).promise().done(function(){
		    	$('#comments_' + id).toggle("slow",function(){
					console.log(parent);
		    		parent.html(function(i, text){
	          			return text === '<span class="badge">-</span>' ? '<span class="badge">+</span>' : '<span class="badge">-</span>';
	      			})
		    	});
			});

			});
	    });
	});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>