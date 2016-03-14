<?php $__env->startSection('content'); ?>
    <div class="row category-list">
        <h1>Article</h1>
        <hr>
        <a href="<?php echo e(url('/admin/article/add')); ?>" class="btn btn-primary new-article btn-block">Add new article</a>
        <hr>
        <?php foreach($posts as $post): ?>
            <div class="well well-sm category-item" id="post<?php echo e($post->id); ?>">
                <a class="category-name pull-left" href="<?php echo e(url('/posts/'.$post->id)); ?>"><?php echo e($post->title); ?></a>
                <span class="pull-right">
                    <a href="<?php echo e(url('/admin/article/'.$post->id.'/edit')); ?>" class="btn btn-primary edit-article">Edit</a>
                    <button class="btn btn-danger delete-article" data-article="<?php echo e($post->id); ?>">Delete</button>
                </span>
            </div>
        <?php endforeach; ?>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>