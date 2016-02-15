<?php $__env->startSection('content'); ?>

<style type="text/css">
	.google{
	    background-color: #2196F3;
	    border-color: #2196F3;
	}
	.google:hover{
	    background-color: #42A5F5;
	    border-color:#42A5F5;
	}
</style>


<div class="row">
    <h1>Please sign in:</h1>
    <a href="" class="btn btn-lg btn-primary btn-block google" type="submit">Google</a>
</div>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>