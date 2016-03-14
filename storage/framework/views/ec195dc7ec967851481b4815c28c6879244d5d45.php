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
                <a class="navbar-brand" href="<?php echo e(url('/')); ?>">
                    #Code
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    <li><a href="<?php echo e(url('/article')); ?>">Article</a></li>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            Language <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li><a href="<?php echo e(url('/ru')); ?>">Russian</a></li>
                            <li><a href="<?php echo e(url('/en')); ?>">English</a></li>
                        </ul>
                    </li>
                    <!-- Authentication Links -->
                    <?php if(Auth::guest()): ?>
                        <li><a href="<?php echo e(url('/login')); ?>">Login</a></li>
                        <li><a href="<?php echo e(url('/register')); ?>">Register</a></li>
                    <?php else: ?>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                <?php echo e(Auth::user()->name); ?> <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="<?php echo e(url('/logout')); ?>"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                            </ul>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <?php echo $__env->yieldContent('content'); ?>
    </div>
    <?php if ( ! (Auth::guest())): ?>
        <input type="hidden" id="token" name="_token" value="<?php echo e(csrf_token()); ?>">
    <?php endif; ?>
    <!-- JavaScripts -->
    <script src="<?php echo e(asset('/js/jquery-2.2.1.min.js')); ?>"></script>
    <script src="<?php echo e(asset('/js/bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('/js/app.js')); ?>"></script>
    <?php /* <script src="<?php echo e(elixir('js/app.js')); ?>"></script> */ ?>
</body>
</html>
