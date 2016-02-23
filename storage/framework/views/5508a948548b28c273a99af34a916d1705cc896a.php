<?php $__env->startSection('content'); ?>

<h1>Add a new User</h1>

<hr>

<?php echo Form::open(array('url' => 'admin/users')); ?>


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

<?php echo Form::submit('Add User', array('class' => 'btn btn-default')); ?>


<?php echo Form::close(); ?>


<?php echo $__env->make('errors.errors', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>