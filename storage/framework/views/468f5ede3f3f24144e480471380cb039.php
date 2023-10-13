<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title><?php echo $__env->yieldContent('title', 'Shop Gathering in Bali | Dashboard'); ?></title>

        <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css','resources/js/app.js']); ?>

        <?php echo $__env->yieldPushContent('pre-css'); ?>
        <?php echo $__env->yieldPushContent('post-css'); ?>
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    </head>


    <body class=" bg-slate-50">
        <?php echo $__env->make('backend.layout.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <?php echo $__env->yieldContent('content'); ?>


        <?php echo $__env->yieldPushContent('pre-js'); ?>
        <?php echo app('Illuminate\Foundation\Vite')(['resources/js/helper.js']); ?>
        <script src="/helper.js"></script>
        
        <?php echo $__env->yieldPushContent('post-js'); ?>
      </body>
</html>
<?php /**PATH /home/hamsterkaget/Development/Web-App/gib-shop/resources/views/backend/layout.blade.php ENDPATH**/ ?>