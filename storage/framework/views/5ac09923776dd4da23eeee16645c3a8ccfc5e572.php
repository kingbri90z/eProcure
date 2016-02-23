<?php $__env->startSection('content'); ?>

<h1>Users Admin</h1>
  		<div class="container">
          <h2>Registered Users</h2>
          <table class="table table-striped">
            <thead>
              <tr>
                <th>Firstname</th>
                <th>Lastname</th>
                <th>Email</th>
                 <th>Edit</th>
              </tr>
            </thead>
            <tbody>
            <?php foreach($users as $user): ?>
              <tr>
                <td><?php echo e($user->first_name); ?></td>
                <td><?php echo e($user->last_name); ?></td>
                <td><?php echo e($user->email); ?></td>
                <td><a href="/admin/edit/<?php echo e($user->id); ?>" class="glyphicon glyphicon-edit"></a></td>
              </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>







<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>