<?php $__env->startSection('title'); ?>
    Manage User - Dashboard
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="w-full min-h-screen shadow-lg rounded-lg p-4">
        <div class="bg-white shadow-lg rounded-lg p-4">
            <h2 class="text-lg font-medium mb-4">Summary</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                <div class="bg-gray-200 p-4 rounded-lg">
                    <p class="text-sm font-medium text-gray-600">Total Users</p>
                    <p class="text-lg font-bold text-gray-900"><?php echo e($total); ?></p>
                </div>
                
            </div>
        </div>

        <div class="bg-white shadow-lg rounded-lg mt-4 p-4">
            <h2 class="text-lg font-medium p-4">User Table</h2>
            <div class="flex justify-end mb-3">
                <button id="createButton" data-modal-target="defaultModal" onclick="createAction()"  class="bg-green-400 hover:bg-green-600 text-white py-1 px-3 rounded">
                    <i class="fa-solid fa-plus fa-sm"></i><span class="ml-1.5">Add New Record</span>
                </button>
                <button id="succesButton" data-modal-target="successModal" data-modal-toggle="successModal" class="hidden bg-green-400 hover:bg-green-600 text-white py-1 px-3 rounded">
                    <i class="fa-solid fa-plus fa-sm"></i><span class="ml-1.5">Show Modal</span>
                </button>
            </div>
            <table class="table-auto w-full">
                <thead>
                    <tr>
                        <th class="border px-4 py-2">#</th>
                        <th class="border px-4 py-2">Name</th>
                        <th class="border px-4 py-2">Email</th>
                        <th class="border px-4 py-2">Password</th>
                        <th class="border px-4 py-2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $i = 0;
                    ?>
                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr class="text-center">
                            <td class="border px-4 py-2"><?php echo e(++$i); ?></td>
                            <td class="border px-4 py-2"><?php echo e($user->name); ?></td>
                            <td class="border px-4 py-2"><?php echo e($user->email); ?></td>
                            <td class="border px-4 py-2">
                                <button class="bg-orange-500 hover:bg-orange-700 text-white py-1 px-3 rounded">
                                    <i class="fa-solid fa-eye fa-xs"></i><span class="text-sm ml-2">Change Password</span>
                                </button>
                            </td>
                            <td class="border px-4 py-2">
                                
                                <button onclick="editAction(this)" data-json="<?php echo e(json_encode($user)); ?>" data-modal-target="defaultModal" data-modal-toggle="defaultModal" class="bg-blue-500 hover:bg-blue-700 text-white py-1 px-3 rounded">
                                    <i class="fa-solid fa-pen-to-square fa-sm"></i>
                                </button>

                                <button class="bg-red-500 hover:bg-red-700 text-white py-1 px-3 rounded ml-2" onclick="deleteUser(<?php echo e($user->id); ?>)">
                                    <i class="fa-solid fa-trash fa-sm"></i>
                                </button>

                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>

            <?php echo e($users->links()); ?>

        </div>
    </div>

    <!-- Create modal -->
    <div id="defaultModal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Form Manage User
                    </h3>
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="defaultModal">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-6 space-y-6">
                    
                    <form id="user-form" method="post" onsubmit="event.preventDefault(); createOrUpdate();">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="_method">
                        <input type="hidden" name="id">
                        
                        <div class="mb-6">
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                            <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                        </div>
                        <div class="mb-6">
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email address</label>
                            <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                        </div>
                        <div class="mb-6" id="password">
                            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                            <input type="password" name="password"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </div>
                        <div class="mb-6" id="password_confirmation">
                            <label for="password_confirmation" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Confirm password</label>
                            <input type="password" name="password_confirmation"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        </div>
                        
                        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                    </form>
                </div>
                <!-- Modal footer -->
                <div class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                    
                </div>
            </div>
        </div>
    </div>

    <!-- Success Modal -->
    <div id="successModal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="successModal">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-6 space-y-6">
                    
                    <div class="flex flex-col items-center justify-center h-full">
                        <div class="rounded-full bg-green-500 p-4">
                            <svg class="h-16 w-16 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                        </div>
                        <h2 class="text-2xl font-bold text-center text-gray-800 mt-4">Success!</h2>
                    </div>
                </div>
                <!-- Modal footer -->
                <div class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                </div>
            </div>
        </div>
    </div>

    <!-- Success Modal -->
    <div id="errorModal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="errorModal">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-6 space-y-6">
                    <div class="flex flex-col items-center justify-center h-full">
                        <div class="rounded-full bg-red-500 p-4">
                        <svg class="h-16 w-16 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                        </div>
                        <h2 class="text-2xl font-bold text-center text-gray-800">Error!</h2>
                    </div>
                </div>
                <!-- Modal footer -->
                <div class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                </div>
            </div>
        </div>
    </div>


<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
<script>
    const $defaultModal = document.getElementById('defaultModal');
    const defaultModal = new Modal($defaultModal);
    const $successModal = document.getElementById('successModal');
    const successModal = new Modal($successModal);
    const $errorModal = document.getElementById('errorModal');
    const errorModal = new Modal($errorModal);

    function editAction(button) {
        const user = JSON.parse(button.dataset.json);
        document.querySelector('#user-form input[name="name"]').value = user.name;
        document.querySelector('#user-form input[name="email"]').value = user.email;
        document.querySelector('#user-form input[name="_method"]').value = "PUT";
        document.querySelector('#user-form input[name="id"]').value = user.id;
        // Populate other form fields as needed

        // how to hide below
        document.querySelector('#user-form [id="password"]').style.display = "none";
        document.querySelector('#user-form [id="password_confirmation"]').style.display = "none";
    }

    function createAction() {
        document.querySelector('#user-form input[name="_method"]').value = "POST";
        document.querySelector('#user-form input[name="id"]').value = "";
        document.querySelector('#user-form input[name="name"]').value = "";
        document.querySelector('#user-form input[name="email"]').value = "";
        document.querySelector('#user-form input[name="password"]').value = "";
        document.querySelector('#user-form input[name="password_confirmation"]').value = "";
        // Populate other form fields as needed

        document.querySelector('#user-form [id="password"]').style.display = "block";
        document.querySelector('#user-form [id="password_confirmation"]').style.display = "block";
        defaultModal.show();
    }

    function createOrUpdate() {
        const form = document.querySelector('#user-form');
        const id = form.querySelector('input[name="id"]').value;
        const name = form.querySelector('input[name="name"]').value;
        const email = form.querySelector('input[name="email"]').value;
        const password = form.querySelector('input[name="password"]').value;
        const confirmPassword = form.querySelector('input[name="password_confirmation"]').value;

        let url = `<?php echo e(route('dashboard.manage-user.store')); ?>`;
        let method = 'post';

        const methodField = form.querySelector('input[name="_method"]');
        if (methodField) {
            method = methodField.value.toLowerCase();
        }

        axios({
            method: method,
            url: url,
            data: {
                id: id,
                name: name,
                email: email,
                password: password,
                password_confirmation: confirmPassword,
            },
            headers: {
            'X-CSRF-TOKEN': form.querySelector('input[name="_token"]').value,
            },
        })
            .then(response => {
                if(response.data.status == "success") {
                    defaultModal.hide();
                    successModal.show();

                }
            })
            .catch(error => {
                console.error(error);
                defaultModal.hide();
                errorModal.show();
            });
    }

</script>

<script>
    function deleteUser(userId) {
        const form = document.querySelector('#user-form');

        if (confirm('Are you sure you want to delete this user?')) {
            axios({
                method: 'DELETE',
                url: '/dashboard/manage-user',
                data: {
                    id: userId,
                },
                headers: {
                    'X-CSRF-TOKEN': form.querySelector('input[name="_token"]').value,
                },
            })
            .then(response => {
                if(response.data.status == "success") {
                    successModal.show();

                }
            })
            .catch(error => {
                console.error(error);
                defaultModal.hide();
                errorModal.show();
            });
        }
    }
</script>
<?php $__env->stopPush(); ?>




<?php echo $__env->make('admin.layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\radja\OneDrive\Documents\Development\works\gib-shop\resources\views/admin/modules/manage-user/index.blade.php ENDPATH**/ ?>