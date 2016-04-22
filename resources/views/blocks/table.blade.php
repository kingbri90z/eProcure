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
					<div class="col-sm-1">Notes</div>
					<div class="col-sm-1"></div>
				</div>
			</li>
		@foreach ($blocks as $b)
			@if ($b->need == $blockType)

		  	<li class="list-group-item">
					<div class="row active">
						<div class="col-sm-1 blocks-items symbol" data-title="Symbol"><a href="/blocks/{{$b->id}}"><b>{{$b->symbol}}</b></a></div>
						<div class="col-sm-1 blocks-items" data-title="Added"><span class="date" data-hint="Created: {{$b->created_at}} EST" class="hint-bottom hint-anim-d-med">{{$b->date}}</span></div>
						<div class="col-sm-1 blocks-items" data-title="Exchange">{{$b->exchange}}</div>
						<div class="col-sm-1 blocks-items" data-title="Our Discount" class="numeric">{{$b->discount}}</div>
						<div class="col-sm-1 blocks-items" data-title="Target Discount" class="numeric">{{$b->discount_target}}</div>
						<div class="col-sm-1 blocks-items" data-title="Shares" class="numeric">{{$b->number_shares}}</div>
						<div class="col-sm-1 blocks-items" data-title="Need">{{$b->need}}</div>
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
								<a href="/blocks/{{$b->id}}/edit" class="glyphicon glyphicon-edit"></a>
						</div>
						<div class="rows">
							<div class="col-md-12 comments" id="comments_{{$b->id}}">
								<div class="detailBox">
								    <div class="titleBox">
								      <label>Notes</label>
								    </div>
								    <div class="actionBox">
								        <ul class="commentList" data-id="{{$b->id}}"></ul>
								        {!! Form::open(array('url' => 'notes/' . $b->id,'class' => 'form-inline')) !!}

							        	    <div class="form-group">
												<input name="block_id" type="hidden" value="{{$b->id}}">
												<input name="symbol" type="hidden" value="{{$b->symbol}}">
								                <input class="form-control" name="body" type="text" placeholder="Leave a note" required/>
								            </div>
								            <div class="form-group">
								                <button class="btn btn-success">Add</button>
								            </div>										{!! Form::close() !!}

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