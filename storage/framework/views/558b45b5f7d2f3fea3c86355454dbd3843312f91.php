<?php $__env->startSection('content'); ?>

<h1>Rep Admin</h1>

<div class="list-group">

	<?php foreach($reps as $rep): ?>

  		<a href="/reps/<?php echo e($rep->id); ?>/edit" class="list-group-item"><?php echo e($rep->name); ?></a>

	<?php endforeach; ?>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>