<?php $__env->startSection('content'); ?>

<h1>Edit <?php echo e($user->first_name); ?></h1>

<hr>

<?php echo Form::model( $user, ['method' => 'PATCH', 'action' => [ 'AdminUserController@update', $user->id ]]); ?>


	<?php echo $__env->make('admin.users.form', ['submitButtonText' => 'Edit User'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php echo Form::close(); ?>


<?php echo $__env->make('errors.errors', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>