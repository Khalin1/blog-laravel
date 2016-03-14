<?php $__env->startSection('content'); ?>
    <h1>Темы</h1>
    <div class="col-md-9">
        <?php foreach($categories as $category): ?>
            <div class="well well-sm"><b><a href="<?php echo e(url('/categories/'.$category->id)); ?>"><?php echo e($category->name); ?></a></b> <span class="pull-right"><?php echo e($category->updated_at); ?></span></div>
        <?php endforeach; ?>

    </div>
    <div class="col-md-3 col-lg-3">
        <b class="center-block">Последние посты</b>
        <ul>
            <li>Category 1</li>
            <li>Category 2</li>
            <li>Category 3</li>
            <li>Category 4</li>
            <li>Category 5</li>
            <li>Category 6</li>
            <li>Category 7</li>
            <li>Category 8</li>
            <li>Category 9</li>
            <li>Category 10</li>
        </ul>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>