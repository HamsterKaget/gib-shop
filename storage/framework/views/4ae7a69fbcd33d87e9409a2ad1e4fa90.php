<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="icon" type="image/x-icon" href="<?php echo e(asset('images/Stempel.ico')); ?>">
        <title><?php echo $__env->yieldContent('title'); ?></title>
        <!-- Tailwind CSS -->
        <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css','resources/js/app.js']); ?>
        <?php echo $__env->yieldPushContent('css'); ?>
        <script src="https://kit.fontawesome.com/38ab242903.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-gray-100 font-sans leading-normal tracking-normal">
        
        <?php echo $__env->make('user.partials.new-navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- Page Content -->
        <main class="min-h-screen">
            <?php echo $__env->yieldContent('content'); ?>
        </main>

        <!-- Footer -->
        <?php echo $__env->make('user.partials.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <!-- JavaScript -->
        
        <?php echo $__env->yieldPushContent('js'); ?>
    </body>
</html>
<?php /**PATH /home/hamsterkaget/Development/Web-App/gib-shop/resources/views/user/layouts/app.blade.php ENDPATH**/ ?>