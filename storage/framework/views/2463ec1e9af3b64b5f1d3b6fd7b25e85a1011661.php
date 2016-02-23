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
		<?php foreach($blocks as $block): ?>
			<?php if($block->need == $blockType): ?>

		  	<li class="list-group-item">
				<table>
					<div class="row active">
						<div class="col-sm-1 blocks-items symbol" data-title="Symbol"><b>
							<?php if(session('is_admin')): ?>
								<a href="/blocks/<?php echo e($block->id); ?>/edit"><?php echo e($block->symbol); ?></a>
							<?php else: ?>
								<?php echo e($block->symbol); ?>

							<?php endif; ?>
						</b></div>
						<div class="col-sm-1 blocks-items" data-title="Added"><span class="date" data-hint="Created: <?php echo e($block->created_at); ?> EST" class="hint-bottom hint-anim-d-med"><?php echo e($block->date); ?></span></div>
						<div class="col-sm-1 blocks-items" data-title="Exchange"><?php echo e($block->exchange); ?></div>
						<div class="col-sm-1 blocks-items" data-title="Our Discount" class="numeric"><?php echo e($block->discount); ?></div>
						<div class="col-sm-1 blocks-items" data-title="Target Discount" class="numeric"><?php echo e($block->discount_target); ?></div>
						<div class="col-sm-1 blocks-items" data-title="Shares" class="numeric"><?php echo e($block->number_shares); ?></div>
						<div class="col-sm-1 blocks-items" data-title="Need"><?php echo e($block->need); ?></div>
						<div class="col-sm-1 blocks-items" data-title="Custodian"><?php echo e($block->custodian); ?></div>
						<div class="col-sm-1 blocks-items" data-title="Source"><?php echo e($block->source); ?></div>
						<div class="col-sm-1 blocks-items" data-title="Qilin Rep"><?php echo e($block->rep); ?></div>
						<div class="col-sm-2 blocks-items" data-title="Notes"><button data-id="<?php echo e($block->id); ?>" class="commentsShowHide btn btn-success">+</button></div>
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
			<?php endif; ?>
		<?php endforeach; ?>
		</ul>