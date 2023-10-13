<?php $__env->startSection('title'); ?>
    Edit Profile - Dashboard GIB
<?php $__env->stopSection(); ?>

<?php $__env->startPush('post-css'); ?>
    <script type="text/javascript" src="<?php echo e(config('midtrans.snap_url')); ?>" data-client-key="<?php echo e(config('midtrans.client_key')); ?>"></script>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
<div class="p-4 pb-12 pt-20 sm:ml-72">
    

    <!-- Main App -->
    <div class="container p-8 bg-white mx-auto min-h-96 h-auto min-w-96 w-full rounded-xl shadow-xl dark:bg-slate-800 border-gray-300 border">
        <!-- Table -->
        <div class="flex w-full space-y-2 flex-col items-center justify-center mx-auto">
            <h2 class="text-xl font-extrabold leading-none tracking-tight text-gray-400 md:text-3xl lg:text-4xl dark:text-white">Edit Profile</h2>
            <div class="border border-gray-400 rounded-lg">
                <form id="updateProfileForm" action="" method="POST" class="w-full">
                    <div class="grid grid-cols-1  gap-2.5 w-full mx-auto rounded-xl px-8 pt-4 pb-4">
                        <div>
                            <img class="rounded-full w-24 h-24 mx-auto border-gray-300 shadow-lg border" src="<?php echo e(asset('images/person.png')); ?>" alt="image description">
                        </div>
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Upload file ( Avatar )</label>
                            <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="file_input_help" id="avatar" name="avatar" type="file">
                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">SVG, PNG, JPG, JPEG, WEBP or GIF (Max 4 MB).</p>
                        </div>
                        <div>
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Full Name</label>
                            <div class="flex">
                            <span class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border border-r-0 border-gray-300 rounded-l-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm0 5a3 3 0 1 1 0 6 3 3 0 0 1 0-6Zm0 13a8.949 8.949 0 0 1-4.951-1.488A3.987 3.987 0 0 1 9 13h2a3.987 3.987 0 0 1 3.951 3.512A8.949 8.949 0 0 1 10 18Z"/>
                                </svg>
                            </span>
                            <input type="text" id="name" name="name" class="rounded-none rounded-r-lg bg-gray-50 border border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Ex : Jhon Doe" value="<?php echo e(Auth::user()->name); ?>">
                            </div>
                        </div>
                        <div>
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                            <div class="flex">
                            <span class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border border-r-0 border-gray-300 rounded-l-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="m17.418 3.623-.018-.008a6.713 6.713 0 0 0-2.4-.569V2h1a1 1 0 1 0 0-2h-2a1 1 0 0 0-1 1v2H9.89A6.977 6.977 0 0 1 12 8v5h-2V8A5 5 0 1 0 0 8v6a1 1 0 0 0 1 1h8v4a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1v-4h6a1 1 0 0 0 1-1V8a5 5 0 0 0-2.582-4.377ZM6 12H4a1 1 0 0 1 0-2h2a1 1 0 0 1 0 2Z"/>
                                </svg>
                            </span>
                            <input type="email" name="email" id="email" class="rounded-none rounded-r-lg bg-gray-50 border border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Ex : youremail@example.com" value="<?php echo e(Auth::user()->email); ?>">
                            </div>
                        </div>
                        <div class="">
                            <button type="submit" hidden id="updateButton" data-modal-toggle="confirmModal" class="flex w-full mt-4 items-center justify-center text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-5 text-center dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800" type="button">
                                <svg class="w-4 h-4 mx-2 text-white dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                                    <path d="M4.09 7.586A1 1 0 0 1 5 7h13V6a2 2 0 0 0-2-2h-4.557L9.043.8a2.009 2.009 0 0 0-1.6-.8H2a2 2 0 0 0-2 2v14c.001.154.02.308.058.457L4.09 7.586Z"/>
                                    <path d="M6.05 9 2 17.952c.14.031.281.047.424.048h12.95a.992.992 0 0 0 .909-.594L20 9H6.05Z"/>
                                  </svg>
                            Update Profile
                            </button>
                        </div>
                    </div>
                </form>
                <form id="updatePasswordForm" action="" method="POST" class="w-full border-t border-gray-400">
                    <div class="grid grid-cols-1  gap-2.5 w-full mx-auto rounded-xl px-8 py-4">
                        <div class="grid grid-cols-2 gap-2">
                            <div>
                                <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                                <div class="flex">
                                <span class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border border-r-0 border-gray-300 rounded-l-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 20">
                                        <path d="M14 7h-1.5V4.5a4.5 4.5 0 1 0-9 0V7H2a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2Zm-5 8a1 1 0 1 1-2 0v-3a1 1 0 1 1 2 0v3Zm1.5-8h-5V4.5a2.5 2.5 0 1 1 5 0V7Z"/>
                                    </svg>
                                </span>
                                <input type="password" name="password" id="password" class="rounded-none rounded-r-lg bg-gray-50 border border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="*********">
                                </div>
                            </div>
                            <div>
                                <label for="password_confirmation" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password Confirmation</label>
                                <div class="flex">
                                <span class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border border-r-0 border-gray-300 rounded-l-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 19 20">
                                        <path d="M8 14.5a6.474 6.474 0 0 1 8-6.318V8a1 1 0 0 0-1-1h-2.5V4.5a4.5 4.5 0 1 0-9 0V7H2a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h9.052A6.494 6.494 0 0 1 8 14.5Zm-2.5-10a2.5 2.5 0 1 1 5 0V7h-5V4.5Z"/>
                                        <path d="M14.5 10a4.5 4.5 0 1 0 0 9 4.5 4.5 0 0 0 0-9Zm2.06 6.561a1 1 0 0 1-1.414 0l-1.353-1.354a1 1 0 0 1-.293-.707v-1.858a1 1 0 0 1 2 0v1.444l1.06 1.06a1.001 1.001 0 0 1 0 1.415Z"/>
                                    </svg>
                                </span>
                                <input type="password" name="password_confirmation" id="password_confirmation" class="rounded-none rounded-r-lg bg-gray-50 border border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="*********">
                                </div>
                            </div>
                        </div>
                        <div class="">
                            <button type="submit" hidden id="updateButton" data-modal-toggle="confirmModal" class="flex w-full mt-4 items-center justify-center text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-5 text-center dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800" type="button">
                                <svg class="w-4 h-4 text-white dark:text-white mr-1.5 my-auto" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 20">
                                    <path d="m17.351 3.063-8-3a1.009 1.009 0 0 0-.7 0l-8 3A1 1 0 0 0 0 4a19.394 19.394 0 0 0 8.47 15.848 1 1 0 0 0 1.06 0A19.394 19.394 0 0 0 18 4a1 1 0 0 0-.649-.937Zm-3.644 4.644-5 5A1 1 0 0 1 8 13c-.033 0-.065 0-.1-.005a1 1 0 0 1-.733-.44l-2-3a1 1 0 0 1 1.664-1.11l1.323 1.986 4.138-4.138a1 1 0 0 1 1.414 1.414h.001Z"/>
                                </svg>
                                Reset Password
                            </button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>


<?php $__env->startPush('post-js'); ?>
<script>
    const assetUrl = <?php echo json_encode(asset('storage/'), 15, 512) ?>;
</script>

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
    // Function to make the Axios request and append data to the table
    // function getData(params, pageUrl = "<?php echo e(route('user-dashboard.v2.transactions.getData')); ?>") {
    //     axios.get(pageUrl, {
    //         params: params
    //     })
    //         .then(function (response) {
    //             // Assuming the response data is an array of objects
    //             const data = response.data;
    //             // console.log(data.data);

    //             // Get a reference to the table's tbody
    //             const tbody = document.querySelector('table tbody');
    //             tbody.innerHTML = '';
    //             let i = 0;

    //             // Create a template for a table row using a template literal
    //             const rowTemplate = (item) => `
    //                 <tr class="bg-white text-center border-b dark:bg-gray-800 dark:border-gray-700">
    //                     <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">${++i}</td>
    //                     <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">${item.uuid}</td>
    //                     <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">${item.total_amount_paid}</td>
    //                     <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">${item.status}</td>
    //                     <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white"></td>
    //                     <td class="px-6 py-4 text-center">
    //                     ${
    //                         item.status.toLowerCase() === 'pending'
    //                             ? `
    //                                 <button class="bg-green-500 border-green-500 border-2 text-white py-1 px-3 w-full rounded" onclick="makePayment('${item.snaptoken}')">
    //                                     <span class="text-sm">Pay Now</span>
    //                                 </button>`
    //                             : item.status.toLowerCase() === 'success'
    //                             ? `
    //                                 <button class="border-green-500 border-2 text-green-500 py-1 px-3 w-full rounded cursor-not-allowed" disabled>
    //                                     <span class="text-sm">Paid</span>
    //                                 </button>`
    //                             : item.status.toLowerCase() === 'failed'
    //                             ? `
    //                                 <button class="border-red-500 border-2 text-red-500 py-1 px-3 w-full rounded cursor-not-allowed" disabled>
    //                                     <span class="text-sm">Failed</span>
    //                                 </button>`
    //                             : ''
    //                     }
    //                     </td>
    //                 </tr>
    //             `;



    //             // console.log(data);
    //             data.data.forEach(function (item) {
    //                 const newRowHTML = rowTemplate(item);
    //                 tbody.insertAdjacentHTML('beforeend', newRowHTML);
    //             });
    //             generatePaginationControls(data);
    //         })
    //         .catch(function (error) {
    //             console.error('Error fetching data:', error);
    //         });
    // }

    // // Call the function to fetch data and append it to the table
    // getData();

    // // Function to handle input changes and trigger the API request
    // function handleInput(event) {
    //     event.preventDefault();

    //     const searchInput = document.querySelector('#default-search');
    //     const searchValue = searchInput.value.trim();

    //     // Define your params object with the search value
    //     const params = {
    //         search: searchValue || null, // Set the default to null if searchValue is empty
    //     };

    //     // Call the function to fetch data and append it to the table with the provided params
    //     getData(params);
    // }

    // // Add an event listener to the search input to trigger the API request on input change
    // const searchInput = document.querySelector('#default-search');
    // searchInput.addEventListener('input', debounce(handleInput, 400)); // Adjust the delay as needed (1 second in this case)




    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('backend.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/hamsterkaget/Development/Web-App/gib-shop/resources/views/backend/sections/user/edit-profile/index.blade.php ENDPATH**/ ?>