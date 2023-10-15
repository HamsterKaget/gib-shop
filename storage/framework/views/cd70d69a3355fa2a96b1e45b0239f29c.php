<?php $__env->startSection('title', 'Checkout'); ?>

<?php $__env->startPush('css'); ?>
    <!-- @TODO: replace SET_YOUR_CLIENT_KEY_HERE with your client key -->
    
    <script type="text/javascript" src="<?php echo e(config('midtrans.snap_url')); ?>" data-client-key="<?php echo e(config('midtrans.client_key')); ?>"></script>
    <!-- Note: replace with src="https://app.midtrans.com/snap/snap.js" for Production environment -->
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    

    <div class="w-screen">
        <section class="bg-slate-50 dark:bg-gray-900">
            <div class="py-8 lg:py-16 px-4 mx-auto max-w-screen-md bg-white">
                <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-center text-gray-900 dark:text-white">Checkout</h2>
                <p class="mb-6 font-light text-center text-gray-500 dark:text-gray-400 sm:text-xl">Here you can review your order, make any necessary changes, and complete your purchase</p>


                <div class="flex flex-col space-y-6 py-4 mb-6 items-center w-full mx-auto bg-gray-100 rounded-lg">
                    <?php
                        $total = 0;
                    ?>
                    <p class="text-center text-gray-500 dark:text-gray-400 sm:text-xl uppercase text-sm font-bold">List Of The Item You Will Buy</p>
                    <?php $__currentLoopData = $cart->Details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                        $total += $detail->Program->price * $detail->quantity;
                    ?>
                        
                        <a href="#" class="flex flex-col items-center shadow-lg bg-white border border-gray-200 rounded-lg md:flex-row md:max-w-xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
                            <img class="object-cover w-full rounded-t-lg h-96 md:h-auto md:w-48 md:rounded-none md:rounded-l-lg" src="<?php echo e(asset($detail->Program->thumbnail)); ?>" alt="">
                            <div class="flex flex-col justify-between p-4 leading-normal">
                                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white"><?php echo e($detail->Program->title); ?></h5>
                                
                                <div class="flex flex-col items-start space-y-1.5">
                                    <?php $__currentLoopData = $detail->Options; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $option): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <span class="bg-gray-100 text-gray-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded mr-2 dark:bg-gray-700 dark:text-gray-400 border border-gray-500">
                                        <i class="fa-solid fa-filter mr-1.5"></i> <?php echo e($option->ProgramOption->options); ?>:
                                        <span class="ml-1.5">
                                            <?php echo e($option->OptionValue->value); ?>

                                        </span>
                                    </span>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <span class="bg-gray-100 text-gray-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded mr-2 dark:bg-gray-700 dark:text-gray-400 border border-gray-500">
                                        <i class="fa-solid fa-tags mr-1.5"></i>
                                        <span class="ml-1.5">
                                            Rp <?php echo e(number_format($detail->Program->price)); ?>

                                        </span>
                                    </span>
                                </div>
                            </div>
                        </a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>

                <form action="<?php echo e(route('checkout.pay')); ?>" method="POST" class="space-y-6">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="cart_id" value="<?php echo e($cart->id); ?>">

                    <div class="grid grid-cols-2 space-x-4">
                        <div>
                            <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">First Name <span class="text-red-600">*</span> </label>
                            <input type="text" name="first_name" id="first_name" class="block p-3 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 shadow-sm focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 dark:shadow-sm-light" required>
                        </div>
                        <div>
                            <label for="last_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Last Name <span class="text-red-600">*</span> </label>
                            <input type="text" name="last_name" id="last_name" class="block p-3 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 shadow-sm focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 dark:shadow-sm-light" required>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 space-x-4">
                        <div>
                            <label for="user_email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Your email <span class="text-red-600">*</span> </label>
                            <input type="email" name="user_email" id="user_email" class="mb-6 bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" disabled value="<?php echo e(Auth::user()->email); ?>" required>
                        </div>
                        <div>
                            <label for="backup_email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Backup Email </label>
                            <input type="email" name="backup_email" id="backup_email" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 shadow-sm focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 dark:shadow-sm-light">
                        </div>
                    </div>
                    <div class="sm:col-span-2">
                        <label for="address" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Your Address</label>
                        <textarea name="address" id="address" rows="6" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg shadow-sm border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"></textarea>
                    </div>

                    <?php
                        $totalPrice = 0;
                    ?>
                    <div class="p-4 bg-green-200 rounded-lg">
                        <div class="flex items-center text-center justify-center">
                            <h3 class="text-lg font-semibold">Payment Details</h3>
                        </div>
                        <div class="bg-red-200 text-xs text-center text-red-600 p-1.5 rounded-sm mb-4">
                            <p><span>* All payments are charged in Rupiah. Please note that currency conversion fees may apply.</span></p>
                        </div>
                        <div class="flex flex-col space-y-1 text-sm">
                            <div class="flex justify-between">
                                <span>Total Product Price</span>
                                <span>Rp <?php echo e(number_format($total)); ?> | $ <?php echo e(number_format(($total / 15000))); ?></span>
                            </div>
                            <div class="flex justify-between">
                                <?php
                                    $percent = 3;
                                    $fee = $total * ($percent / 100);
                                    $totalPrice = $total + $fee;
                                ?>
                                <span>Service Fee (*3%)</span>
                                <span>Rp <?php echo e(number_format($fee)); ?> | $ <?php echo e(number_format(($fee / 15000))); ?></span>
                                <!-- Add more rows for other payment details -->
                            </div>
                            
                        </div>


                    <div class="flex flex-col space-y-2 items-end border-t-2 border-green-950 mt-1.5 pt-1.5">
                        <span class="font-bold text-lg">Rp <?php echo e(number_format($totalPrice)); ?> | $ <?php echo e(number_format(($totalPrice / 15000))); ?><br></span>
                        <?php if(isset($snapToken)): ?>
                            <button id="pay-button" class="bg-green-500 text-white font-bold py-2 px-4 rounded hover:bg-green-600">Pay Now</button>
                        <?php else: ?>
                            <button type="submit" class="-mt-2 bg-green-500 text-white hover:bg-green-700 py-2 px-4 rounded-lg shadow-lg text-sm">Checkout</button>
                        <?php endif; ?>
                    </div>
                    
                </form>
            </div>
        </section>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('js'); ?>

<?php if(isset($snapToken)): ?>
<script>
    var payButton = document.getElementById('pay-button');
    payButton.addEventListener('click', function () {
    snap.pay('<?php echo e($snapToken); ?>', {
        onSuccess: function(result){
        /* You may add your own implementation here */
        alert("payment success!"); console.log(result);
        },
        onPending: function(result){
        /* You may add your own implementation here */
        alert("wating your payment!"); console.log(result);
        },
        onError: function(result){
        /* You may add your own implementation here */
        alert("payment failed!"); console.log(result);
    },
    onClose: function(){
        /* You may add your own implementation here */
        alert('you closed the popup without finishing the payment');
    }
    })
});
</script>
<?php endif; ?>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('user.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\radja\OneDrive\Documents\Development\works\gib-shop\resources\views/user/modules/checkout/index.blade.php ENDPATH**/ ?>