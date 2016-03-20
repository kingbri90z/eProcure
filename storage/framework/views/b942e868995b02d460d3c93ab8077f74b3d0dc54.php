<div class="form-group">
	<?php echo Form::label('name', 'Rep Name: '); ?>

	<?php echo Form::text('name', null, array('class' => 'form-control')); ?>

</div>

<?php echo Form::submit($submitButtonText, array('class' => 'btn btn-default')); ?>