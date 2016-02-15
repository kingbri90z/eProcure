<?php $__env->startSection('content'); ?>

<h1>Users Admin</h1>

<div class="list-group">

	<?php foreach($users as $user): ?>

  		<a href="/admin/users/<?php echo e($user->id); ?>/edit" class="list-group-item"><?php echo e($user->first_name); ?> <?php echo e($user->last_name); ?></a>

	<?php endforeach; ?>
	<a href="/admin/users/create" class="list-group-item">Create a New User</a>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>