<?php $__env->startSection('content'); ?>

<h1>Users Admin</h1>

<div class="list-group">

	<?php foreach($users as $user): ?>

  		<a href="/admin/users/<?php echo e($user->id); ?>" class="list-group-item"><?php echo e($user->first_name); ?> <?php echo e($user->last_name); ?></a>

	<?php endforeach; ?>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>