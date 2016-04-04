<div class="form-group">
	<?php echo Form::label('symbol', 'Symbol Name: '); ?>

	<?php echo Form::text('symbol', null, array('class' => 'form-control')); ?>

</div>

<div class="form-group">
	<?php echo Form::label('discount', 'Our Discount: '); ?>

	<?php echo Form::text('discount', null, array('class' => 'form-control')); ?>

</div>
<div class="form-group">
	<?php echo Form::label('discount_target', 'Target Discount: '); ?>

	<?php echo Form::text('discount_target', null, array('class' => 'form-control')); ?>

</div>
<div class="form-group">
	<?php echo Form::label('number_shares', 'Number of Shares: '); ?>

	<?php echo Form::text('number_shares', null, array('class' => 'form-control')); ?>

</div>
<div class="form-group">
	<?php echo e(Form::label('need_id', 'Need a: ')); ?>

	<?php echo e(Form::select('need_id', $needs, null, ['class' => 'form-control'])); ?>

</div>
<div class="form-group">
	<?php echo e(Form::label('exchange_id', 'Exchange: ')); ?>

	<?php echo e(Form::select('exchange_id', $exchanges, null, ['class' => 'form-control'])); ?>

</div>
<div class="form-group">
	<?php echo e(Form::label('custodian_id', 'Custodian: ')); ?>

	<?php echo e(Form::select('custodian_id', $custodians, null, ['class' => 'form-control'])); ?>

</div>
<div class="form-group">
	<?php echo e(Form::label('source_id', 'Source: ')); ?>

	<?php echo e(Form::select('source_id', $sources, null, ['class' => 'form-control'])); ?>

</div>
<div class="form-group">
	<?php echo e(Form::label('rep_id', 'Qilin Rep: ')); ?>

	<?php echo e(Form::select('rep_id', $reps, null, ['class' => 'form-control'])); ?>

</div>
<?php if(session('is_admin')): ?>
<div class="form-group">
	<?php echo Form::label('status', 'Status:'); ?>

    <?php echo e(Form::select('status', [
    	'unpublished'=>'Unpublished',
    	'published'=>'Published',
    	'archived'=>'Archived'
    	], 'published', ['class' => 'form-control'])); ?>

</div>
<?php else: ?>
	<?php echo e(Form::hidden('status', 'published')); ?>

<?php endif; ?>

<?php echo Form::submit($submitButtonText, array('class' => 'btn btn-primary')); ?>

</br></br>
<script>
	$(function()
	{
		$( "#symbol" ).autocomplete({
			source: "/symbols/autocomplete",
			minLength: 1,
			select: function(event, ui) {
				$('#symbol').val(ui.item.value);
			}
		});
	});
</script>