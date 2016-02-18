@extends('layouts.main')

@section('content')
<style type="text/css">

	@media only screen and (max-width: 767px) {


	.table-header{
		position: absolute;
		top: -9999px;
		left: -9999px;
	 }

	.blocks-items {
	 	border-bottom:1px solid #bbb;
	 	padding-bottom:3px;
	 	position: relative;
	 }

	.blocks-items::before {
		font-weight: bold;
		content: attr(data-title) ": ";
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
	@foreach ($blocks as $block)

  	<li class="list-group-item">
		<table>
			<div class="row active">
				<div class="col-sm-1 blocks-items" data-title="Symbol">{{$block->symbol}}</div>
				<div class="col-sm-2 blocks-items" data-title="Exchange">{{$block->exchange}}</div>
				<div class="col-sm-1 blocks-items" data-title="Discount" class="numeric">{{$block->discount}}</div>
				<div class="col-sm-2 blocks-items" data-title="Shares" class="numeric">{{$block->number_shares}}</div>
				<div class="col-sm-1 blocks-items" data-title="Need">{{$block->symbol}}</div>
				<div class="col-sm-2 blocks-items" data-title="Custodian">{{$block->custodian}}</div>
				<div class="col-sm-2 blocks-items" data-title="Qilin Rep">{{$block->rep}}</div>
				<div class="col-sm-1 blocks-items" data-title="Notes"><button data-id="{{$block->id}}" class="commentsShowHide btn btn-success">+</button></div>
				<div class="rows">
					<div class="col-md-12 comments" id="comments_{{$block->id}}">
						<div class="detailBox">
						    <div class="titleBox">
						      <label>Notes</label>
						    </div>
						    <div class="actionBox">
						        <ul class="commentList">
						            <li>
						                <div class="commenterImage">
						                  <img src="http://lorempixel.com/50/50/people/6" />
						                </div>
						                <div class="commentText">
						                    <p class="">Hello this is a test comment.</p> <span class="date sub-text">on March 5th, 2014</span>
						                </div>
						            </li>
						            <li>
						                <div class="commenterImage">
						                  <img src="http://lorempixel.com/50/50/people/7" />
						                </div>
						                <div class="commentText">
						                    <p class="">Hello this is a test comment and this comment is particularly very long and it goes on and on and on.</p> <span class="date sub-text">on March 5th, 2014</span>

						                </div>
						            </li>
						            <li>
						                <div class="commenterImage">
						                  <img src="http://lorempixel.com/50/50/people/9" />
						                </div>
						                <div class="commentText">
						                    <p class="">Hello this is a test comment.</p> <span class="date sub-text">on March 5th, 2014</span>

						                </div>
						            </li>
						        </ul>
						        {!! Form::open(array('url' => 'notes/' . $block->id,'class' => 'form-inline')) !!}

					        	    <div class="form-group">
										<input name="block_id" type="hidden" value="{{$block->id}}">
						                <input class="form-control" name="body" type="text" placeholder="Your comments" required/>
						            </div>
						            <div class="form-group">
						                <button class="btn btn-default">Add</button>
						            </div>

								{!! Form::close() !!}

								@include('errors.errors')
						    </div>
						</div>



					</div>
				</div>
			<div class="row active">
		</table>
	</li>
	@endforeach

</ul>
<script type="text/javascript">
	$( document ).ready(function() {
	    $('.comments').hide();
	    $('.commentsShowHide').click(function(){
	    	var parent = $(this);
	    	var id = parent.attr('data-id');
	    	$('#comments_' + id).toggle("slow",function(){
	    		parent.text(function(i, text){
          			return text === "+" ? "-" : "+";
      			})
	    	});

	    });
	});
</script>
@stop