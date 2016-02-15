<div class="form-group">
	<?php echo Form::label('first_name', 'First Name: '); ?>

	<?php echo Form::text('first_name', null, array('class' => 'form-control')); ?>

</div>

<div class="form-group">
	<?php echo Form::label('last_name', 'Last Name: '); ?>

	<?php echo Form::text('last_name', null, array('class' => 'form-control')); ?>

</div>

<div class="form-group">
	<?php echo Form::label('email', 'Email Address: '); ?>

	<?php echo Form::text('email', null, array('class' => 'form-control')); ?>

</div>

<div class="form-group">
	<?php echo Form::label('password', 'Password: '); ?>

	<?php echo Form::text('password', null, array('class' => 'form-control')); ?>

</div>

<?php echo Form::submit($submitButtonText, array('class' => 'btn btn-default')); ?>