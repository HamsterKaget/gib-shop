<?php $__env->startSection('title', 'Gathering In Bali'); ?>

<?php $__env->startPush('css'); ?>
    <!-- Add Swiper JS and CSS -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <script type="text/javascript" src="<?php echo e(config('midtrans.snap_url')); ?>" data-client-key="<?php echo e(config('midtrans.client_key')); ?>"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="max-w-screen-xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <h1 class="text-3xl font-bold mb-8 text-gray-300">Your Cart</h1>
        <?php
            $total = 0;
        ?>

        <div id="cart-item" class="flex flex-col">

        </div>
        
        <!-- Main modal -->
        <div id="checkoutModal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
            <div class="relative p-4 w-full max-w-md h-full md:h-auto">
                <!-- Modal content -->
                <div class="relative p-4 text-center bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
                    <button type="button" class="text-gray-400 absolute top-2.5 right-2.5 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="checkoutModal">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                    <svg class="w-12 h-12 my-4  mx-auto text-emerald-400 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 21 21">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m6.072 10.072 2 2 6-4m3.586 4.314.9-.9a2 2 0 0 0 0-2.828l-.9-.9a2 2 0 0 1-.586-1.414V5.072a2 2 0 0 0-2-2H13.8a2 2 0 0 1-1.414-.586l-.9-.9a2 2 0 0 0-2.828 0l-.9.9a2 2 0 0 1-1.414.586H5.072a2 2 0 0 0-2 2v1.272a2 2 0 0 1-.586 1.414l-.9.9a2 2 0 0 0 0 2.828l.9.9a2 2 0 0 1 .586 1.414v1.272a2 2 0 0 0 2 2h1.272a2 2 0 0 1 1.414.586l.9.9a2 2 0 0 0 2.828 0l.9-.9a2 2 0 0 1 1.414-.586h1.272a2 2 0 0 0 2-2V13.8a2 2 0 0 1 .586-1.414Z"/>
                    </svg>
                    <p class="mb-4 text-gray-500 dark:text-gray-300">Thank you for ordering the product !<br>Your order has been created, you can complete the transaction by clicking the "pay now" button and you can also pay it later on the dashboard </p>
                    <div class="flex justify-center items-center space-x-4">
                        <button data-modal-toggle="checkoutModal" onclick="getData(); location.href = '/user-dashboard/v2/transactions';" type="button" class="py-2 px-3 text-sm font-medium text-gray-500 bg-white rounded-lg border border-gray-200 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-300 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                            Dashboard
                        </button>
                        <button type="submit" id="pay-button" class="py-2 px-3 text-sm font-medium text-center text-white bg-gray-600 rounded-lg hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-300 dark:bg-gray-500 dark:hover:bg-gray-600 dark:focus:ring-gray-900">
                            Pay Now !
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
<?php $__env->stopSection(); ?>

<?php $__env->startPush('js'); ?>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>

    // Function to make the Axios request and append data to the table
    function getData(params, pageUrl = "<?php echo e(route('cart.getData')); ?>") {
        const cartItemContainer = document.getElementById("cart-item");
        cartItemContainer.innerHTML = ''
        axios.get(pageUrl, { params: null })
            .then(function (response) {
                const data = response.data;
                if (data.Details && data.Details.length > 0) {
                    // Create the table and its components
                    const table = document.createElement("table");

                    const tbody = document.createElement("tbody");
                    tbody.classList.add("text-gray-500"); // Add your classes here

                    const tfoot = document.createElement("tfoot");
                    tfoot.classList.add("border-t", "border-t-gray-400"); // Add your classes here

                    const thead = document.createElement("thead");
                    thead.classList.add("border-b", "border-b-black", "font-medium"); // Add your classes here

                    thead.innerHTML = `
                        <tr>
                            <td class="text-center" style="padding: 8px; width: 3%">#</td>
                            <td style="padding: 8px;">Product Name</td>
                            <td class="text-left" style="padding: 8px; width: 17%">Amount</td>
                            <td class="text-left" style="padding: 8px; width: 15%">Price</td>
                            <td class="text-center" style="padding: 8px; width: 5%"></td>
                        </tr>
                    `;

                    // Initialize total variable
                    let total = 0;
                    let totalDiscount = 0; // Initialize the total discount


                    // Loop through cart details
                    data.Details.forEach((detail, i) => {
                        let itemDiscount = 0;

                        const row = document.createElement("tr");
                        if (detail.program.discount && detail.program.discount.length > 0) {
                            itemDiscount = detail.program.discount[0].discount * detail.quantity;
                        }

                        // Add the item's discount to the total discount
                        totalDiscount += itemDiscount;
                        row.innerHTML = `
                            <td class="text-black text-center" style="padding: 6px;">${i + 1}.</td>
                            <td style="padding: 6px;">${detail.program.title}</td>
                            <td style="padding: 6px;">
                                <div>
                                    <input type="number" value="${detail.quantity}" id="phone" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="0" required>
                                </div>
                            </td>
                            <td class="text-left" style="padding: 6px;">Rp ${numberFormat(detail.program.price * detail.quantity)}</td>
                            <td style="padding: 6px;">
                                <div class="flex flex-col">
                                    <form action="/cart/remove/${detail.id}" method="POST">
                                        <?php echo csrf_field(); ?>
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" class="">
                                            <svg class="w-5 h-5 text-gray-500 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 20">
                                                <path d="M17 4h-4V2a2 2 0 0 0-2-2H7a2 2 0 0 0-2 2v2H1a1 1 0 0 0 0 2h1v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V6h1a1 1 0 1 0 0-2ZM7 2h4v2H7V2Z"></path>
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        `;

                        // Append the row to the table body
                        tbody.appendChild(row);

                        // Update the total
                        total += detail.program.price * detail.quantity;
                    });

                    // product total
                    const productRow = document.createElement("tr");
                    productRow.innerHTML = `
                        <td style="padding: 2px;"></td>
                        <td style="padding: 2px;" class="text-gray-500 italic">
                            <span class="text-red-700">*</span> Total Product Price
                        </td>
                        <td style="padding: 2px;"></td>
                        <td style="padding: 2px;" class="text-gray-500 italic">+ Rp ${numberFormat(total)}</td>
                        <td style="padding: 2px;"></td>
                    `;
                    tfoot.appendChild(productRow);

                    // discount total
                    const discountRow = document.createElement("tr");
                    discountRow.innerHTML = `
                        <td style="padding: 2px;"></td>
                        <td style="padding: 2px;" class="text-gray-500 italic">
                            <span class="text-red-700">*</span> Total Discount
                        </td>
                        <td style="padding: 2px;"></td>
                        <td style="padding: 2px;" class="text-red-500 italic">- Rp ${numberFormat(total - totalDiscount)}</td>
                        <td style="padding: 2px;"></td>
                    `;
                    tfoot.appendChild(discountRow);

                    // Payment Fee Row
                    const pfee = (total - (total - totalDiscount)) * 0.03;
                    const paymentFeeRow = document.createElement("tr");
                    paymentFeeRow.innerHTML = `
                        <td style="padding: 2px;"></td>
                        <td style="padding: 2px;" class="text-gray-500 italic">
                            <span class="text-red-700">*</span> Payment Fee (3% * Total Amount)
                        </td>
                        <td style="padding: 2px;"></td>
                        <td style="padding: 2px;" class="text-gray-500 italic">+ Rp ${numberFormat(pfee)}</td>
                        <td style="padding: 2px;"></td>
                    `;
                    tfoot.appendChild(paymentFeeRow);

                    // Service Fee Row
                    const sfee = total * 0.005 + 2000; // Adjust this value if needed
                    const serviceFeeRow = document.createElement("tr");
                    serviceFeeRow.innerHTML = `
                        <td style="padding: 2px;"></td>
                        <td style="padding: 2px;" class="text-gray-500 italic decoration-red-700">
                            <span class="text-red-700">*</span> Service Fee (0.5% + Rp 2.000)
                        </td>
                        <td style="padding: 2px;"></td>
                        <td style="padding: 2px;" class="text-gray-500">
                            <span class="ml-1 italic font-medium"> Free</span>
                            <sup class="line-through decoration-red-700 italic text-xs suppers">+ Rp ${numberFormat(sfee)}</sup>
                        </td>
                        <td style="padding: 2px;"></td>
                    `;
                    tfoot.appendChild(serviceFeeRow);

                    // Total All Row
                    const totalAll = total + pfee + 0;
                    const totalAllRow = document.createElement("tr");
                    totalAllRow.classList.add("border-y","border-y-gray-400","border-b-black","font-medium");
                    totalAllRow.style.marginTop = 8;
                    totalAllRow.style.marginBottom = 12;
                    totalAllRow.innerHTML = `
                        <td style="padding: 10px 6px;"></td>
                        <td style="padding: 10px 6px;" class="text-gray-500 italic">Total</td>
                        <td style="padding: 10px 6px;"></td>
                        <td style="padding: 10px 6px;" class="text-gray-500 italic">Rp ${numberFormat(totalAll - (total - totalDiscount))}</td>
                        <td style="padding: 10px 6px;"></td>
                    `;
                    tfoot.appendChild(totalAllRow);

                    const modalCheckout = document.createElement("div");
                    modalCheckout.classList.add("w-full");
                    modalCheckout.innerHTML = `
                        <!-- Modal toggle -->
                        <div class="">
                            <form action="<?php echo e(route('checkout.pay')); ?>" method="POST" class="space-y-6" onsubmit="submitForm(event)">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="cart_id" value="${data.id}">

                                <div class="grid grid-cols-2 space-x-4">
                                    <div>
                                        <label for="first_name" class="block mb-1.5 text-sm font-medium text-gray-900 dark:text-gray-300">Your Full Name <span class="text-red-600">*</span> </label>
                                        <input type="text" name="first_name" id="first_name" value="<?php echo e(Auth::user()->name); ?>" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 shadow-sm focus:ring-gray-500 focus:border-indigo-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-indigo-500 dark:focus:border-indigo-500 dark:shadow-sm-light" required>
                                    </div>
                                    <div>
                                        <label for="user_email" class="block mb-1.5 text-sm font-medium text-gray-900 dark:text-gray-300">Your email <span class="text-red-600">*</span> </label>
                                        <input type="email" name="user_email" id="user_email" class="bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500" disabled value="<?php echo e(Auth::user()->email); ?>" required>
                                    </div>
                                </div>
                                <div class="grid grid-cols-2">
                                    <div class="sm:col-span-2 ml-0">
                                        <label for="address" class="block mb-1.5 text-sm font-medium text-gray-900 dark:text-gray-400">Your Address</label>
                                        <textarea name="address" id="address" rows="6" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg shadow-sm border border-gray-300 focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-indigo-500 dark:focus:border-indigo-500"></textarea>
                                    </div>
                                </div>
                                <div class="flex justify-end m-5 w-full">
                                    <button type="submit" id="checkoutbutton" data-modal-show="checkoutModal" class="flex items-center justify-center text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-5 text-center dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800" type="button">
                                        <svg class="w-4 h-4 mx-2 text-white dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M11.074 4 8.442.408A.95.95 0 0 0 7.014.254L2.926 4h8.148ZM9 13v-1a4 4 0 0 1 4-4h6V6a1 1 0 0 0-1-1H1a1 1 0 0 0-1 1v13a1 1 0 0 0 1 1h17a1 1 0 0 0 1-1v-2h-6a4 4 0 0 1-4-4Z"/>
                                            <path d="M19 10h-6a2 2 0 0 0-2 2v1a2 2 0 0 0 2 2h6a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1Zm-4.5 3.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2ZM12.62 4h2.78L12.539.41a1.086 1.086 0 1 0-1.7 1.352L12.62 4Z"/>
                                        </svg>
                                    Checkout
                                    </button>
                                </div>
                            </form>
                        </div>
                    `;

                    // Append the table components to the table
                    table.appendChild(thead);
                    table.appendChild(tbody);
                    table.appendChild(tfoot);
                    // table.appendChild(modalCheckout);




                    // Append the table to the cart-item element
                    // console.log(cartItemContainer);
                    cartItemContainer.appendChild(table);
                    cartItemContainer.appendChild(modalCheckout);
                    // cartItemContainer.innerHTML = modalCheckout;

                    // Your checkout form can be handled here.
                } else {
                    const emptyCartMessage = document.createElement("p");
                    emptyCartMessage.innerText = "Your cart is currently empty.";
                    const cartItemContainer = document.getElementById("cart-item");
                    cartItemContainer.appendChild(emptyCartMessage);
                }

                function numberFormat(number) {
                    return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                }
            })
            .catch(function (error) {
                const emptyCartMessage = document.createElement("p");
                    emptyCartMessage.innerText = "Your cart is currently empty.";
                    const cartItemContainer = document.getElementById("cart-item");
                    cartItemContainer.appendChild(emptyCartMessage);
                console.error('Error fetching data:', error);
            });
    }


    // Call the function to fetch data and append it to the table
    getData();

    // Define the snapToken variable within the same scope
    let snapToken;

    function submitForm(event) {
        event.preventDefault();
        const form = event.target;
        const formData = new FormData(form);
        // Use Axios to send a POST request to your route
        axios.post('<?php echo e(route('checkout.pay')); ?>', formData)
            .then(response => {
                snapToken = response.data;
                const payButton = document.getElementById('pay-button');
                payButton.addEventListener('click', function () {
                    // console.log(snapToken, response);
                    snap.pay(snapToken, {
                        onSuccess: function(result){
                            /* You may add your own implementation here */
                            // alert("Payment success!");
                            getData();
                            console.log(result);
                            window.location = "https://shop.gatheringinbali.com/user-dashboard/v2/transactions";

                        },
                        onPending: function(result){
                            /* You may add your own implementation here */
                            // alert("Waiting for your payment!");
                            // console.log(result);
                            getData();
                            window.location = "https://shop.gatheringinbali.com/user-dashboard/v2/transactions";
                        },
                        onError: function(result){
                            /* You may add your own implementation here */
                            alert("Payment failed!");
                            getData();
                            console.log(result);
                            window.location = "https://shop.gatheringinbali.com/user-dashboard/v2/transactions";
                        },
                        onClose: function(){
                            /* You may add your own implementation here */
                            alert("You closed the popup without finishing the payment");
                            getData();
                            window.location = "https://shop.gatheringinbali.com/user-dashboard/v2/transactions";
                        }
                    });
                });
                // getData();
            })
            .catch(error => {
                console.error(error);
            });
    }


    </script>


<?php $__env->stopPush(); ?>

<?php echo $__env->make('user.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/hamsterkaget/Development/Web-App/gib-shop/resources/views/user/modules/cart/index.blade.php ENDPATH**/ ?>