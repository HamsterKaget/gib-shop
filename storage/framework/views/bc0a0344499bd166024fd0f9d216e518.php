<?php $__env->startSection('title', 'Gathering In Bali'); ?>

<?php $__env->startPush('css'); ?>
    <!-- Add Swiper JS and CSS -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="max-w-screen-xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <h1 class="text-3xl font-bold mb-8">Your Cart</h1>
        <?php
            $total = 0;
        ?>
        <?php if($cart && count($cart->Details) > 0): ?>
        <div class="flex flex-col">
            
            
                <?php $__currentLoopData = $cart->Details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="flex flex-col md:flex-row md:items-start border-b-2 py-4">
                    <div class="w-full md:w-1/3">
                        <img src="<?php echo e(asset($detail->Program->thumbnail)); ?>" alt="<?php echo e($detail->Program->name); ?>" class="h-64 mx-auto w-auto rounded-lg object-cover shadow-lg">
                    </div>
                    <div class="flex flex-col justify-between items-start w-full md:w-2/3 px-4">
                        <div class="flex flex-col items-start">
                            <h2 class="font-bold text-2xl"><?php echo e($detail->Program->title); ?></h2>
                            
                            <div class="flex items-center mb-2">
                                <span class="font-bold text-gray-700 mr-2">Quantity:</span>
                                <span><?php echo e($detail->quantity); ?></span>
                            </div>
                            <?php $__currentLoopData = $detail->Options; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="flex items-center">
                                <span class="font-bold text-gray-700 mr-2"><?php echo e($option->ProgramOption->options); ?>:</span>
                                <span><?php echo e($option->OptionValue->value); ?></span>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                            <div class="flex items-center w-full">
                                <span class="font-bold text-gray-700 mr-2">Price:</span>
                                <?php
                                    $total += $detail->Program->price * $detail->quantity;
                                ?>
                                <span>Rp <?php echo e($detail->Program->price * $detail->quantity); ?></span>
                            </div>
                        </div>
                        <div class="flex flex-col">
                            
                            
                            <form action="<?php echo e(route('cart.remove', $detail->id)); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Remove</button>
                            </form>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            
        </div>
        <div class="flex justify-between items-start mt-8">
            <span class="font-bold text-lg">Total:</span>
            <div class="flex flex-col space-y-2">
                <span class="font-bold text-lg">Rp <?php echo e($total); ?></span>
                <a href="<?php echo e(route('checkout.index')); ?>" class="bg-green-500 text-white hover:bg-green-700 py-2 px-4 rounded-lg shadow-lg text-sm text-center">Checkout</a>
                
            </div>
        </div>
        <?php else: ?>
        <p class="text-lg">Your cart is currently empty.</p>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('js'); ?>
    <script>
    var swiper = new Swiper('.swiper-container', {
        // Optional parameters
        loop: true,
        autoplay: {
            delay: 5000,
        },
    });
    </script>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('user.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\radja\OneDrive\Documents\Development\works\gib-shop\resources\views/user/modules/cart/index.blade.php ENDPATH**/ ?>