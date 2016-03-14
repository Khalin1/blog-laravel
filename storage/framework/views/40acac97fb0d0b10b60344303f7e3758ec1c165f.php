<?php $__env->startSection('content'); ?>
   <h2><?php echo e($category->name); ?></h2>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>