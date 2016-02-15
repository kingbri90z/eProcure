<?php $__env->startSection('content'); ?>

<h1>Needs Admin</h1>

<div class="list-group">

	<?php foreach($needs as $need): ?>

  		<a href="/exchanges/<?php echo e($need->id); ?>/edit" class="list-group-item"><?php echo e($need->name); ?></a>

	<?php endforeach; ?>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>