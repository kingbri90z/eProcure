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
		@foreach ($blocks as $block)
			@if ($block->need == $blockType)

		  	<li class="list-group-item">
					<div class="row active">
						<div class="col-sm-1 blocks-items symbol" data-title="Symbol"><a href="/blocks/{{$block->id}}"><b>{{$block->symbol}}</b></a></div>
						<div class="col-sm-1 blocks-items" data-title="Added"><span class="date" data-hint="Created: {{$block->created_at}} EST" class="hint-bottom hint-anim-d-med">{{$block->date}}</span></div>
						<div class="col-sm-1 blocks-items" data-title="Exchange">{{$block->exchange}}</div>
						<div class="col-sm-1 blocks-items" data-title="Our Discount" class="numeric">{{$block->discount}}</div>
						<div class="col-sm-1 blocks-items" data-title="Target Discount" class="numeric">{{$block->discount_target}}</div>
						<div class="col-sm-1 blocks-items" data-title="Shares" class="numeric">{{$block->number_shares}}</div>
						<div class="col-sm-1 blocks-items" data-title="Need">{{$block->need}}</div>
						<div class="col-sm-1 blocks-items" data-title="Custodian">{{$block->custodian}}</div>
						<div class="col-sm-1 blocks-items" data-title="Source">{{$block->source}}</div>
						<div class="col-sm-1 blocks-items" data-title="Qilin Rep">{{$block->rep}}</div>
						<div class="col-sm-1 blocks-items" data-title="Notes"><button data-id="{{$block->id}}" class="commentsShowHide btn btn-info"><span class="badge">
								@if(empty($block->noteCount))
									+
								@else
									{{$block->noteCount}}
								@endif
								</span></button>
							</div>

						<div class="col-sm-1 blocks-items" data-title="">
							@if(session('is_admin'))
								<a href="/blocks/{{$block->id}}/edit" class="glyphicon glyphicon-edit"></a>
							@endif

						</div>
						<div class="rows">
							<div class="col-md-12 comments" id="comments_{{$block->id}}">
								<div class="detailBox">
								    <div class="titleBox">
								      <label>Notes</label>
								    </div>
								    <div class="actionBox">
								        <ul class="commentList" data-id="{{$block->id}}"></ul>
								        {!! Form::open(array('url' => 'notes/' . $block->id,'class' => 'form-inline')) !!}

							        	    <div class="form-group">
												<input name="block_id" type="hidden" value="{{$block->id}}">
												<input name="symbol" type="hidden" value="{{$block->symbol}}">
								                <input class="form-control" name="body" type="text" placeholder="Leave a note" required/>
								            </div>
								            <div class="form-group">
								                <button class="btn btn-success">Add</button>
								            </div>

										{!! Form::close() !!}

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