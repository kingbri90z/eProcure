		<ul class="list-group">
			@include('blocks.tableheader')
		@foreach ($blocks as $b)
			@if ($b->need == $blockType)

		  	<li class="list-group-item">
					<div class="row active">
						<div class="col-sm-1 blocks-items symbol" data-title="Symbol"><a href="/blocks/{{$b->id}}"><b>{{$b->symbol}}</b></a>{{  (!empty($b->status) && $b->status == 'archived'  ? " (Closed)" : '')}}</div>
						<div class="col-sm-1 blocks-items" data-title="Added"><span
									data-hint="Created: {{$b->created_at}} EST"
									class="date hint-bottom hint-anim-d-med">{{$b->date}}</span></div>
						<div class="col-sm-1 blocks-items" data-title="Updated"><span
									data-hint="Created: {{$b->updated_at}} EST"
									class="date hint-bottom hint-anim-d-med">{{$b->updated}}</span></div>
						<div class="col-sm-1 blocks-items" data-title="Exchange">{{$b->exchange}}</div>
						<div class="col-sm-1 blocks-items" data-title="Our Discount" class="numeric">{{$b->discount}}</div>
						<div class="col-sm-1 blocks-items" data-title="Target Discount" class="numeric">{{$b->discount_target}}</div>
						<div class="col-sm-1 blocks-items" data-title="Shares" class="numeric">{{$b->number_shares}}</div>
						<div class="col-sm-1 blocks-items" data-title="Custodian">{{$b->custodian}}</div>
						<div class="col-sm-1 blocks-items" data-title="Source">{{$b->source}}</div>
						<div class="col-sm-1 blocks-items" data-title="Qilin Rep">{{$b->rep}}</div>
						<div class="col-sm-1 blocks-items" data-title="Notes"><button data-id="{{$b->id}}" class="commentsShowHide btn btn-info"><span class="badge">
								@if(empty($b->noteCount))
									+
								@else
									{{$b->noteCount}}
								@endif
								</span></button>
							</div>

						<div class="col-sm-1 blocks-items" data-title="">
							@if(!empty($b->status) && $b->status == 'published')
							<a href="/blocks/{{$b->id}}/edit" class="glyphicon glyphicon-edit"></a>
							@endif
						</div>
						<div class="rows">
							<div class="col-md-12 comments" id="comments_{{$b->id}}">
								<div class="detailBox">
								    <div class="titleBox">
								      <label>Notes</label>
								    </div>
								    <div class="actionBox">
								        <ul class="commentList" data-id="{{$b->id}}"><li>No notes</li></ul>
										@if(!empty($b->status) && $b->status == 'published')
								        {!! Form::open(array('url' => 'notes/' . $b->id,'class' => 'form-inline')) !!}

							        	    <div class="form-group">
												<input name="block_id" type="hidden" value="{{$b->id}}">
												<input name="symbol" type="hidden" value="{{$b->symbol}}">
								                <input class="form-control" name="body" type="text" placeholder="Leave a note" required/>
								            </div>
								            <div class="form-group">
								                <button class="btn btn-success">Add</button>
								            </div>
										{!! Form::close() !!}
										@endif
										@include('errors.errors')
								    </div>
								</div>
							</div>
						</div>
					</div>
			</li>
			@endif
		@endforeach
		</ul>