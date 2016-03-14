<?php $__env->startSection('content'); ?>

    <div class="col-md-9 post-list">
        <h1 class="post-list-title">Article</h1>
        <?php foreach($posts as $post): ?>
            <div class="media post-item">
                <div class="media-body">
                    <h4 class="media-heading">
                        <a href="<?php echo e(url('/article', $post->id)); ?>"><?php echo e($post->title); ?></a>
                    </h4>
                    <div class="post-date">
                        <?php echo e($post->created_at); ?>

                        <span class="shows-count"><i class="fa fa-eye"></i></span><span class="show-num"><?php echo e($post->views_count); ?></span>
                    </div>
                    <div class="media-text">
                        <?php /*<img class="media-object post-img" src="<?php echo e(asset('/images/lena.jpg')); ?>">*/ ?>
                        <div class="post-content">
                            <?php echo e($post->text); ?>

                            <a class="text-link" href="<?php echo e(url('/article', $post->id)); ?>">Читать далее...</a>
                        </div>
                    </div>
                    <div class="media-footer">
                        <a class="pull-left like" data-postid="<?php echo e($post->id); ?>" href="#" title="Like this">
                            <i class="fa fa-thumbs-up"></i> Like
                        </a>
                        <a class="pull-left dislike" data-postid="<?php echo e($post->id); ?>" href="#" title="Dislike this">
                            <i class="fa fa-thumbs-down"></i> Dislike
                        </a>
                        <span class="rating-text">Rating: <span id="rating<?php echo e($post->id); ?>"> <?php echo e($post->rating); ?></span></span>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
        <?php echo e($posts->links()); ?>

    </div>
    <div class="col-md-3">
        <div class="panel panel-default">
            <div class="panel-heading theme-right">Темы</div>
            <div class="panel-body">
                <ul class="nav nav-pills nav-stacked">
                    <?php if(!$activeCategory): ?>
                        <li class="active" role="presentation"><a href="<?php echo e(url('/article')); ?>">Все темы</a></li>
                    <?php else: ?>
                        <li role="presentation"><a href="<?php echo e(url('/article')); ?>">Все темы</a></li>
                    <?php endif; ?>


                    <?php foreach($categories as $category): ?>
                        <?php if($activeCategory == $category->id): ?>
                            <li class="active" role="presentation"><a href="<?php echo e(url('/article?category='.$category->id)); ?>"><?php echo e($category->name); ?></a></li>
                        <?php else: ?>
                            <li role="presentation"><a href="<?php echo e(url('/article?category='.$category->id)); ?>"><?php echo e($category->name); ?></a></li>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>

    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>