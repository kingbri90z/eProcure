<div class="form-group">
	<?php echo Form::label('name', 'Exchange Name: '); ?>

	<?php echo Form::text('name', null, array('class' => 'form-control')); ?>

</div>
<div class="form-group">
	<?php echo Form::label('abbreviation', 'Abbreviation Name: '); ?>

	<?php echo Form::text('abbreviation', null, array('class' => 'form-control')); ?>

</div>
<?php echo Form::submit($submitButtonText, array('class' => 'btn btn-default')); ?>