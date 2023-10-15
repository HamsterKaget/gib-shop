<?php $__env->startPush('css'); ?>
    <!-- @TODO: replace SET_YOUR_CLIENT_KEY_HERE with your client key -->
    
    
    <script type="text/javascript" src="<?php echo e(config('midtrans.snap_url')); ?>" data-client-key="<?php echo e(config('midtrans.client_key')); ?>"></script>
    <!-- Note: replace with src="https://app.midtrans.com/snap/snap.js" for Production environment -->
<?php $__env->stopPush(); ?>
<?php $__env->startSection('title'); ?>
    Dashboard - Transaction
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="w-full min-h-screen shadow-lg rounded-lg p-4">
        <div class="bg-white shadow-lg rounded-lg p-4 dark:bg-gray-800 dark:border-gray-700">
            <h2 class="text-lg font-medium mb-4">Summary</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                
                <div class="max-w-sm p-6 py-4 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 flex flex-col items-center text-center hover:bg-blue-50 hover:-translate-y-2 transition-all duration-300">
                    <a href="#">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white"><span id="counter-total-transaction">0</span></h5>
                    </a>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Total Transaction</p>
                    <a href="#" class="inline-flex items-center px-3 py-2 text-xs font-medium text-center text-blue-700 border-blue-700 border rounded-lg hover:bg-blue-700 hover:text-white focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 transition-all duration-300">
                        More Detail
                        <svg aria-hidden="true" class="w-2.5 h-2.5 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    </a>
                </div>
                
                <div class="max-w-sm p-6 py-4 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 flex flex-col items-center text-center hover:bg-blue-50 hover:-translate-y-2 transition-all duration-300">
                    <a href="#">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white" ><span id="counter-total-price">0</span></h5>
                    </a>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Total Price</p>
                    <a href="#" class="inline-flex items-center px-3 py-2 text-xs font-medium text-center text-blue-700 border-blue-700 border rounded-lg hover:bg-blue-700 hover:text-white focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 transition-all duration-300">
                        More Detail
                        <svg aria-hidden="true" class="w-2.5 h-2.5 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    </a>
                </div>

            </div>
        </div>

        <div class="bg-white shadow-lg rounded-lg mt-4 p-4">
            <h2 class="text-lg font-medium p-4">List Transaction</h2>
            
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 text-center">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th class="border px-4 py-2">#</th>
                            <th class="border px-4 py-2">Order Code</th>
                            <th class="border px-4 py-2">Total Amount</th>
                            <th class="border px-4 py-2">Status</th>
                            <th class="border px-4 py-2">Datetime</th>
                            <th class="border px-4 py-2">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $i = 0;
                        ?>
                        <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            
                            
                            <tr class="odd:bg-white odd:border-b odd:dark:bg-gray-900 odd:dark:border-gray-700 even:border-b even:bg-gray-50 even:dark:bg-gray-800 even:dark:border-gray-700">
                                <td class="border px-4 py-2"><?php echo e(++$i); ?></td>
                                <td class="border px-4 py-2"><?php echo e($order->uuid); ?></td>
                                <td class="border px-4 py-2"><?php echo e($order->total_amount_paid); ?></td>
                                
                                <td class="border-x px-4 py-3 flex items-center justify-normal">
                                    <?php if(strtolower($order->status) === 'pending'): ?>
                                        <span class="flex w-3 h-3 bg-yellow-300 rounded-full mr-3"></span>
                                        <span class="bg-yellow-100 text-yellow-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded w-full dark:bg-gray-700 dark:text-yellow-300 border border-yellow-300">
                                            <?php echo e($order->status); ?>

                                        </span>
                                    <?php elseif(strtolower($order->status) === 'success'): ?>
                                        <span class="flex w-3 h-3 bg-green-500 rounded-full mr-3"></span>
                                        <span class="bg-green-100 text-green-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded w-full dark:bg-gray-700 dark:text-green-400 border border-green-400">
                                            <?php echo e($order->status); ?>

                                        </span>
                                    <?php elseif(strtolower($order->status) === 'failed'): ?>
                                        <span class="flex w-3 h-3 bg-red-500 rounded-full mr-3"></span>
                                        <span class="bg-red-100 text-red-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded w-full dark:bg-gray-700 dark:text-red-400 border border-red-400">
                                            <?php echo e($order->status); ?>

                                        </span>
                                    <?php else: ?>
                                        <span class="flex w-3 h-3 bg-gray-900 rounded-full dark:bg-gray-700 mr-3"></span>
                                        <span class="bg-gray-100 text-gray-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded w-full dark:bg-gray-700 dark:text-gray-400 border border-gray-500">
                                            <?php echo e($order->status); ?>

                                        </span>
                                    <?php endif; ?>
                                </td>

                                <td class="border px-4 py-2"><?php echo e(date_format(date_create($order->created_at),"D, d M Y, H:i:s e")); ?></td>
                                <td class="border px-4 py-2">
                                    <?php if(strtolower($order->status) === "pending"): ?>
                                    <button class="bg-green-500 border-green-500 border-2 text-white py-1 px-3 w-full rounded" onclick="makePayment('<?php echo e($order->snaptoken); ?>')">
                                        <span class="text-sm">Pay Now</span>
                                    </button>
                                    <?php elseif(strtolower($order->status) === "success"): ?>
                                        <button class="border-green-500 border-2 text-green-500 py-1 px-3 w-full rounded cursor-not-allowed" disabled>
                                            <span class="text-sm">Paid</span>
                                        </button>
                                    <?php elseif(strtolower($order->status) === "failed"): ?>
                                        <button class="border-red-500 border-2 text-red-500 py-1 px-3 w-full rounded cursor-not-allowed" disabled>
                                            <span class="text-sm">Failed</span>
                                        </button>
                                    <?php endif; ?>
                                </td>

                                
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>

            
        </div>
    </div>


<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>

<script>
function makePayment(snapToken) {
    snap.pay(snapToken, {
    onSuccess: function(result) {
        /* You may add your own implementation here */
        alert("payment success!");
        console.log(result);
    },
    onPending: function(result) {
        /* You may add your own implementation here */
        alert("wating your payment!");
        console.log(result);
    },
    onError: function(result) {
        /* You may add your own implementation here */
        alert("payment failed!");
        console.log(result);
    },
    onClose: function() {
        /* You may add your own implementation here */
        alert('you closed the popup without finishing the payment');
    }
    });
}
</script>

<?php $__env->stopPush(); ?>




<?php echo $__env->make('user.layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\radja\OneDrive\Documents\Development\works\gib-shop\resources\views/user/modules/dashboard/transaction/index.blade.php ENDPATH**/ ?>