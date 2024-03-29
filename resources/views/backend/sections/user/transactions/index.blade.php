@extends('backend.layout')

@section('title')
    Transactions - Dashboard GIB
@endsection

@push('post-css')
    <script type="text/javascript" src="{{ config('midtrans.snap_url') }}" data-client-key="{{ config('midtrans.client_key') }}"></script>
@endpush

@section('content')
<div class="p-4 pb-12 pt-20 sm:ml-72">
    <div class="my-4 text-center">
        <h2 class="text-xl font-extrabold leading-none tracking-tight text-gray-900 md:text-3xl lg:text-4xl dark:text-white">Transactions</h2>
        <p class="text-lg max-w-4xl mx-auto font-normal text-gray-500 lg:text-xl dark:text-gray-400">View your Transaction History </p>
    </div>

    <!-- Main App -->
    <div class="container bg-white mx-auto min-h-96 h-auto min-w-96 w-full rounded-xl shadow-xl dark:bg-slate-800 border-gray-300 border">
        <!-- Table -->
        <div class="px-4 py-8">
            <div class="relative overflow-x-auto sm:rounded-lg pb-8">
                <div class="flex">
                    <form id="searchForm" class="mb-1 w-full max-w-md sm:w-sm md:w-md lg:w-lg">
                        <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                                </svg>
                            </div>
                            <input type="search" id="default-search" class="block w-full p-3 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search Mockups, Logos..." required>
                            {{-- <button type="submit" class="text-white absolute right-1.5 bottom-1.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-2.5 py-1.5 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button> --}}
                            <button
                                type="submit"
                                class="text-white absolute right-1.5 bottom-1.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-2.5 py-1.5 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                id="searchButton"
                            >
                                Search
                            </button>
                        </div>
                    </form>
                    {{-- <div class="w-full mx-auto flex justify-end">
                        <caption class="items-end text-lg font-semibold text-left text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                            <button data-modal-target="createModal" data-modal-toggle="createModal" type="button" class="relative inline-flex items-center justify-center p-0.5 mb-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-green-400 to-blue-600 group-hover:from-green-400 group-hover:to-blue-600 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-green-200 dark:focus:ring-green-800">
                                <span class="relative px-3 py-1.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                                    Tambah Data
                                </span>
                            </button>
                        </caption>
                    </div> --}}
                </div>
                <table class="w-full text-sm text-left text-gray-500 border-gray-200 border rounded-t-xl dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 border-gray-200 border dark:bg-gray-700 dark:text-gray-400">
                        <tr class="text-center">
                            <th scope="col" class="px-6 py-3" style="width: 10%">
                                #
                            </th>
                            <th scope="col" class="px-6 py-3" style="width: 25%">
                                Order Code
                            </th>
                            <th scope="col" class="px-6 py-3" style="width: 15%">
                                Total Ammount
                            </th>
                            <th scope="col" class="px-6 py-3" style="width: 20%">
                                Status
                            </th>
                            <th scope="col" class="px-6 py-3" style="width: 15%">
                                Details
                            </th>
                            <th scope="col" class="px-6 py-3" style="width: 15%; min-width: 140px;">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
                <nav aria-label="Page navigation example" class="mt-6 pagination-nav">
                    <ul class="inline-flex -space-x-px text-sm">
                      <li>
                        <a href="#" class="flex items-center justify-center px-3 h-8 ml-0 leading-tight text-gray-500 bg-white border border-gray-300 rounded-l-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Previous</a>
                      </li>
                      <li>
                        <a href="#" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">1</a>
                      </li>
                      <li>
                        <a href="#" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">2</a>
                      </li>
                      <li>
                        <a href="#" aria-current="page" class="flex items-center justify-center px-3 h-8 text-blue-600 border border-gray-300 bg-blue-50 hover:bg-blue-100 hover:text-blue-700 dark:border-gray-700 dark:bg-gray-700 dark:text-white">3</a>
                      </li>
                      <li>
                        <a href="#" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">4</a>
                      </li>
                      <li>
                        <a href="#" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">5</a>
                      </li>
                      <li>
                        <a href="#" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 rounded-r-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Next</a>
                      </li>
                    </ul>
                </nav>
            </div>
        </div>

    </div>
</div>
@endsection


@push('post-js')
<script>
    const assetUrl = @json(asset('storage/'));
</script>

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>


        // Function to check if an item is expired (created more than 1 day ago)
        function isExpired(created_at) {
            const today = new Date();
            const createdDate = new Date(created_at);
            const oneDayInMillis = 24 * 60 * 60 * 1000; // 1 day in milliseconds
            // console.log(today - createdDate > oneDayInMillis)
            return today - createdDate > oneDayInMillis;
        }


    // Function to make the Axios request and append data to the table
    function getData(params, pageUrl = "{{ route('user-dashboard.v2.transactions.getData') }}") {
        axios.get(pageUrl, {
            params: params
        })
            .then(function (response) {
                // Assuming the response data is an array of objects
                const data = response.data;
                // console.log(data.data);

                // Get a reference to the table's tbody
                const tbody = document.querySelector('table tbody');
                tbody.innerHTML = '';
                let i = 0;
                // Function to check if an item is expired

                // Create a template for a table row using a template literal
                const rowTemplate = (item) => `
                    <tr class="bg-white text-center border-b dark:bg-gray-800 dark:border-gray-700">
                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">${++i}</td>
                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">${item.uuid}</td>
                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">${item.total_amount_paid}</td>
                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">${item.status}</td>
                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white"></td>
                        <td class="px-6 py-4 text-center">
                        ${
                            item.status && item.status.toLowerCase() === 'pending' && isExpired(item.created_at)
                                ? `
                                    <button class="border-gray-500 border-2 text-gray-500 py-1 px-3 w-full rounded cursor-not-allowed" disabled>
                                        <span class="text-sm">Expired</span>
                                    </button>`
                                : item.status && item.status.toLowerCase() === 'pending'
                                ? `
                                    <button class="bg-green-500 border-green-500 border-2 text-white py-1 px-3 w-full rounded" onclick="makePayment('${item.snaptoken}')">
                                        <span class="text-sm">Pay Now</span>
                                    </button>`
                                : item.status && item.status.toLowerCase() === 'success'
                                ? `
                                    <div class=" grid grid-cols-2 gap-1">
                                        <button class="border-green-500 border-2 text-green-500 py-1 px-3 w-full rounded cursor-not-allowed" disabled>
                                            <span class="text-sm">Paid</span>
                                        </button>
                                        <a href="{{ route('invoice') }}?uuid=${item.uuid}" class="border-blue-500 border-2 text-blue-500 py-1 px-3 w-full rounded flex justify-center items-center" disabled>
                                            <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 19">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 15h.01M4 12H2a1 1 0 0 0-1 1v4a1 1 0 0 0 1 1h16a1 1 0 0 0 1-1v-4a1 1 0 0 0-1-1h-3M9.5 1v10.93m4-3.93-4 4-4-4"/>
                                            </svg>
                                            <span class="text-sm ml-1">Invoice</span>
                                        </a>
                                    </div>
                                    `
                                : item.status && item.status.toLowerCase() === 'failed'
                                ? `
                                    <button class="border-red-500 border-2 text-red-500 py-1 px-3 w-full rounded cursor-not-allowed" disabled>
                                        <span class="text-sm">Failed</span>
                                    </button>`
                                : ''
                        }




                        </td>
                    </tr>
                `;



                // console.log(data);
                data.data.forEach(function (item) {
                    const newRowHTML = rowTemplate(item);
                    tbody.insertAdjacentHTML('beforeend', newRowHTML);
                });
                generatePaginationControls(data);
            })
            .catch(function (error) {
                console.error('Error fetching data:', error);
            });
    }

    // Call the function to fetch data and append it to the table
    getData();

    // Function to handle input changes and trigger the API request
    function handleInput(event) {
        event.preventDefault();

        const searchInput = document.querySelector('#default-search');
        const searchValue = searchInput.value.trim();

        // Define your params object with the search value
        const params = {
            search: searchValue || null, // Set the default to null if searchValue is empty
        };

        // Call the function to fetch data and append it to the table with the provided params
        getData(params);
    }

    // Add an event listener to the search input to trigger the API request on input change
    const searchInput = document.querySelector('#default-search');
    searchInput.addEventListener('input', debounce(handleInput, 400)); // Adjust the delay as needed (1 second in this case)




    </script>
    <script>
    function makePayment(snapToken) {
        snap.pay(snapToken, {
        onSuccess: function(result) {
            /* You may add your own implementation here */
            // alert("payment success!");
            console.log(result);
            getData();

        },
        onPending: function(result) {
            /* You may add your own implementation here */
            // alert("wating your payment!");
            console.log(result);
            getData();

        },
        onError: function(result) {
            /* You may add your own implementation here */
            // alert("payment failed!");
            console.log(result);
            getData();

        },
        onClose: function() {
            /* You may add your own implementation here */
            // alert('you closed the popup without finishing the payment');
            getData();
        }
        });
    }
    </script>
@endpush
