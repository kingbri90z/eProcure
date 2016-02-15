<?php $__env->startSection('content'); ?>

<h1>Add a new custodian</h1>

<hr>

<?php echo Form::open(array('url' => 'custodians')); ?>


	<?php echo $__env->make('custodians.form', ['submitButtonText' => 'Add a Custodian'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php echo Form::close(); ?>


<?php echo $__env->make('errors.errors', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>