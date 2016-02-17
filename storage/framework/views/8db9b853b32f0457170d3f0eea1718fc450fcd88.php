<?php $__env->startSection('content'); ?>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Login</div>
				<div class="panel-body">
					<?php if(count($errors) > 0): ?>
						<div class="alert alert-danger">
							<strong>Whoops!</strong> There were some problems with your input.<br><br>
							<ul>
								<?php foreach($errors->all() as $error): ?>
									<li><?php echo e($error); ?></li>
								<?php endforeach; ?>
							</ul>
						</div>
					<?php endif; ?>

					<?php echo csrf_field(); ?>

					<div class="form-group">
                       <div class="col-lg-4 col-lg-offset-4">
                         <a href="<?php echo URL::to('google/authorize'); ?>" class="btn btn-block btn-lg btn-social btn-google">
                            <span class="fa fa-google"></span> Google Sign In
                          </a>
                         </div>
                     </div><br>
				</div>
			</div>
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>