		<ul class="list-group">
			<?php echo $__env->make('blocks.tableheader', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		<?php foreach($blocks as $b): ?>
			<?php if($b->need == $blockType): ?>

		  	<li class="list-group-item">
					<div class="row active">
						<div class="col-sm-1 blocks-items symbol" data-title="Symbol"><a href="/blocks/<?php echo e($b->id); ?>"><b><?php echo e($b->symbol); ?></b></a><?php echo e((!empty($b->status) && $b->status == 'archived'  ? " (Closed)" : '')); ?></div>
						<div class="col-sm-1 blocks-items" data-title="Added"><span
									data-hint="Created: <?php echo e($b->created_at); ?> EST"
									class="date hint-bottom hint-anim-d-med"><?php echo e($b->date); ?></span></div>
						<div class="col-sm-1 blocks-items" data-title="Updated"><span
									data-hint="Created: <?php echo e($b->updated_at); ?> EST"
									class="date hint-bottom hint-anim-d-med"><?php echo e($b->updated); ?></span></div>
						<div class="col-sm-1 blocks-items" data-title="Exchange"><?php echo e($b->exchange); ?></div>
						<div class="col-sm-1 blocks-items" data-title="Our Discount" class="numeric"><?php echo e($b->discount); ?></div>
						<div class="col-sm-1 blocks-items" data-title="Target Discount" class="numeric"><?php echo e($b->discount_target); ?></div>
						<div class="col-sm-1 blocks-items" data-title="Shares" class="numeric"><?php echo e($b->number_shares); ?></div>
						<div class="col-sm-1 blocks-items" data-title="Custodian"><?php echo e($b->custodian); ?></div>
						<div class="col-sm-1 blocks-items" data-title="Source"><?php echo e($b->source); ?></div>
						<div class="col-sm-1 blocks-items" data-title="Qilin Rep"><?php echo e($b->rep); ?></div>
						<div class="col-sm-1 blocks-items" data-title="Notes"><button data-id="<?php echo e($b->id); ?>" class="commentsShowHide btn btn-info"><span class="badge">
								<?php if(empty($b->noteCount)): ?>
									+
								<?php else: ?>
									<?php echo e($b->noteCount); ?>

								<?php endif; ?>
								</span></button>
							</div>

						<div class="col-sm-1 blocks-items" data-title="">
							<?php if(!empty($b->status) && $b->status == 'published'): ?>
							<a href="/blocks/<?php echo e($b->id); ?>/edit" class="glyphicon glyphicon-edit"></a>
							<?php endif; ?>
						</div>
						<div class="rows">
							<div class="col-md-12 comments" id="comments_<?php echo e($b->id); ?>">
								<div class="detailBox">
								    <div class="titleBox">
								      <label>Notes</label>
								    </div>
								    <div class="actionBox">
								        <ul class="commentList" data-id="<?php echo e($b->id); ?>"><li>No notes</li></ul>
										<?php if(!empty($b->status) && $b->status == 'published'): ?>
								        <?php echo Form::open(array('url' => 'notes/' . $b->id,'class' => 'form-inline')); ?>


							        	    <div class="form-group">
												<input name="block_id" type="hidden" value="<?php echo e($b->id); ?>">
												<input name="symbol" type="hidden" value="<?php echo e($b->symbol); ?>">
								                <input class="form-control" name="body" type="text" placeholder="Leave a note" required/>
								            </div>
								            <div class="form-group">
								                <button class="btn btn-success">Add</button>
								            </div>
										<?php echo Form::close(); ?>

										<?php endif; ?>
										<?php echo $__env->make('errors.errors', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
								    </div>
								</div>
							</div>
						</div>
					</div>
			</li>
			<?php endif; ?>
		<?php endforeach; ?>
		</ul>