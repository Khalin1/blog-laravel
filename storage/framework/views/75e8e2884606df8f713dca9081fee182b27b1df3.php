<?php $__env->startSection('content'); ?>
    <div class="row new-article">
        <h1>Add new Article</h1>
        <hr>
        <form method="post" action="<?php echo e(action('ArticleAdminController@add')); ?>">
            <?php echo csrf_field(); ?>

            <div class="form-group <?php echo e($errors->has('title') ? ' has-error' : ''); ?>">
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control" id="title" placeholder="Title" value="<?php echo e($article->title); ?>">
            </div>
            <div class="form-group <?php echo e($errors->has('category') ? ' has-error' : ''); ?>">
                <label for="category">Title</label>
                <select name="category" id="category" class="form-control">
                    <?php foreach($categories as $category): ?>
                        <?php if($category->id == $active): ?>
                            <option selected="selected" value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
                        <?php else: ?>
                            <option value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group <?php echo e($errors->has('text') ? ' has-error' : ''); ?>">
                <label for="text">Text</label>
                <textarea class="form-control" id="text" name="text" rows="15"><?php echo e($article->text); ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Add</button>
        </form>
        <div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>