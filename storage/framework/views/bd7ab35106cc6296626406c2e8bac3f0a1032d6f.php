<?php $__env->startSection('content'); ?>
    <h1><?php echo e($post->title); ?></h1>
    <div class="media">
        <div class="media-body">
            <div class="post-date">
                <?php echo e($post->created_at); ?>

                <span class="shows-count"><i class="fa fa-eye"></i></span><span class="show-num"><?php echo e($post->views_count); ?></span>
            </div>
            <div class="media-text">
                <div class="post-content">
                    <?php echo e($post->text); ?>

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
            <div class="comments">
                <h4>Comments (<span class="comment-count"><?php echo e($post->comments->count()); ?></span>)</h4>
                <hr>
                <?php if(Auth::check()): ?>
                    <form method="post" id="addComment" data-article="<?php echo e($post->id); ?>">
                        <div class="form-group">
                            <label for="comment">Comment</label>
                            <textarea name="comment" class="form-control" id="comment" rows="5"></textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary add-comment btn-block">Add</button>
                        </div>
                    </form>
                <?php else: ?>
                    <p class="help-block">You must be authorised</p>
                <?php endif; ?>
                <hr>
                <div class="comment-list">
                    <?php foreach($post->comments as $comment): ?>
                        <div class="panel panel-default">
                            <div class="panel-heading"><?php echo e($comment->user->name); ?>

                                <span class="pull-right">
                                    <?php echo e($comment->created_at); ?>

                                </span>
                            </div>
                            <div class="panel-body">
                                <?php echo e($comment->text); ?>

                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>