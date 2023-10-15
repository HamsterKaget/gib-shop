<?php $__env->startPush('css'); ?>
    <!-- @TODO: replace SET_YOUR_CLIENT_KEY_HERE with your client key -->
    
    <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="<?php echo e(config('midtrans.client_key')); ?>"></script>
    <!-- Note: replace with src="https://app.midtrans.com/snap/snap.js" for Production environment -->
<?php $__env->stopPush(); ?>
<?php $__env->startSection('title'); ?>
    Dashboard - Transaction
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="w-full min-h-screen shadow-lg rounded-lg p-4">
        <div class="bg-white shadow-lg rounded-lg mt-4 p-4">
            <h2 class="text-lg font-medium p-4">List Ticket</h2>
            <table class="table-auto w-full">
                <thead>
                    <tr>
                        <th class="border px-4 py-2">#</th>
                        <th class="border px-4 py-2">Ticket UUID</th>
                        <th class="border px-4 py-2">Program</th>
                        <th class="border px-4 py-2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $i = 0;
                    ?>
                    <?php $__currentLoopData = $ticket; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        
                        <tr class="text-center">
                            <td class="border px-4 py-2"><?php echo e(++$i); ?></td>
                            <td class="border px-4 py-2"><?php echo e($t->ticket_uuid); ?></td>
                            <td class="border px-4 py-2"><?php echo e($t->program->title); ?></td>
                            
                            <td class="border px-4 py-2">
                                <a target="_blank" href="<?php echo e(route('user-dashboard.ticket.view', ["uuid" => $t->ticket_uuid])); ?>" class="border-green-500 border-2 text-green-500 py-1 px-3 w-full rounded">
                                    <span class="text-sm">View Ticket</span>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>

            
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




<?php echo $__env->make('user.layouts.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\radja\OneDrive\Documents\Development\works\gib-shop\resources\views/user/modules/dashboard/ticket/index.blade.php ENDPATH**/ ?>