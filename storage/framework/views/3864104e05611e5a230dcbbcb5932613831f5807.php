<?php $__env->startSection('content'); ?>


<div class="col-sm-6 col-md-5 col-md-offset-4">
<h3>Edit a Block: <?php echo $block->name; ?></h3></br>
<?php echo Form::model( $block, ['method' => 'PATCH', 'action' => [ 'blocksController@update', $block->id ]]); ?>


	<?php echo $__env->make('blocks.form', ['submitButtonText' => 'Edit a Block'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php echo Form::close(); ?>

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>