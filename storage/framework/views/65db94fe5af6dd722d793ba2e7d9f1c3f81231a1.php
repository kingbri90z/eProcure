<?php $__env->startSection('content'); ?>

<h1>Edit a Rep: <?php echo $rep->name; ?></h1>

<?php echo Form::model( $rep, ['method' => 'PATCH', 'action' => [ 'repsController@update', $rep->id ]]); ?>


	<?php echo $__env->make('reps.form', ['submitButtonText' => 'Edit a Rep'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php echo Form::close(); ?>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>