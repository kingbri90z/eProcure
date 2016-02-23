<div class="form-group">
	<?php echo Form::label('first_name', 'First Name: '); ?></br>
	<?php echo $user->first_name; ?>

</div>

<div class="form-group">
	<?php echo Form::label('last_name', 'Last Name: '); ?></br>
	<?php echo $user->last_name; ?>

</div>

<div class="form-group">
	<?php echo Form::label('email', 'Email Address: '); ?></br>
	<?php echo $user->email; ?>

</div>

<div class="form-group">
	<?php echo Form::label('role', 'Role:'); ?>

    <?php echo e(Form::select('role', [
    	'A'=>'Administrator',
    	'N'=>'Normal'
	], null, ['class' => 'form-control'])); ?>

</div>

<?php echo Form::submit($submitButtonText, array('class' => 'btn btn-default')); ?>