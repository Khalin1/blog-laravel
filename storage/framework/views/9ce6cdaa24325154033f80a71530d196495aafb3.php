<?php $__env->startSection('content'); ?>
<h1 class="home-header">Welcome to "Time of Laravel"</h1>
<img class="center-block home-img" src="<?php echo e(asset('/images/laravel.png')); ?>" alt="">
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>