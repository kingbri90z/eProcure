<?php $__env->startSection('content'); ?>

<h1>Exchanges Admin</h1>

<div class="list-group">

	<?php foreach($exchanges as $exchange): ?>

  		<a href="/exchanges/<?php echo e($exchange->id); ?>/edit" class="list-group-item"><?php echo e($exchange->name); ?></a>

	<?php endforeach; ?>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>