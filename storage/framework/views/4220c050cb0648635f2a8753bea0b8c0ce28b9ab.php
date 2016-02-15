<?php $__env->startSection('content'); ?>

<h1>Custodians Admin</h1>

<div class="list-group">

	<?php foreach($custodians as $custodian): ?>

  		<a href="/custodians/<?php echo e($custodian->id); ?>/edit" class="list-group-item"><?php echo e($custodian->name); ?></a>

	<?php endforeach; ?>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>