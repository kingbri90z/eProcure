<?php $__env->startSection('content'); ?>

<h1>Edit a Custodians: <?php echo $custodian->name; ?></h1>

<?php echo Form::model( $custodian, ['method' => 'PATCH', 'action' => [ 'custodiansController@update', $custodian->id ]]); ?>


	<?php echo $__env->make('custodians.form', ['submitButtonText' => 'Edit a Custodian'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php echo Form::close(); ?>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>