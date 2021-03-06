<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="<?php echo e(asset('favicon.jpg')); ?>" >
    <title>Laravel</title>

    <!-- Fonts -->
    <link href="<?php echo e(asset('/css/font-awesome.min.css')); ?>" rel='stylesheet' type='text/css'>

    <!-- Styles -->
    <link href="<?php echo e(asset('/css/bootstrap.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('/css/app.css')); ?>" rel="stylesheet">
    <?php /* <link href="<?php echo e(elixir('css/app.css')); ?>" rel="stylesheet"> */ ?>

    <style>
        body {
            font-family: 'Lato';
        }

        .fa-btn {
            margin-right: 6px;
        }
    </style>
</head>
<body id="app-layout">
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="<?php echo e(url('/admin')); ?>">
                    Administration
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    <li><a href="<?php echo e(url('/')); ?>">Site</a></li>
                    <li><a href="<?php echo e(url('/admin/article')); ?>">Article</a></li>
                    <li><a href="<?php echo e(url('/admin/categories')); ?>">Categories</a></li>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            <?php echo e(Auth::user()->name); ?> <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li><a href="<?php echo e(url('/logout')); ?>"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <?php echo $__env->yieldContent('content'); ?>
    </div>

    <!-- JavaScripts -->
    <script src="<?php echo e(asset('/js/jquery-2.2.1.min.js')); ?>"></script>
    <script src="<?php echo e(asset('/js/bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('/js/admin.js')); ?>"></script>
    <?php /* <script src="<?php echo e(elixir('js/app.js')); ?>"></script> */ ?>
    <input type="hidden" id="token" name="_token" value="<?php echo e(csrf_token()); ?>">
</body>
</html>
