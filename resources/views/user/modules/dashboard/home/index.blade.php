@extends('user.layouts.dashboard')

@section('title')
    Dashboard User
@endsection
@section('content')
    <div class="w-full min-h-screen shadow-lg rounded-lg p-4">
        <div class="bg-white shadow-lg rounded-lg p-4 dark:bg-gray-800 dark:border-gray-700">
            <h2 class="text-lg font-medium mb-4">Summary</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                {{-- Counter Total Ticket --}}
                <div class="max-w-sm p-6 py-4 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 flex flex-col items-center text-center hover:bg-blue-50 hover:-translate-y-2 transition-all duration-300">
                    <a href="#">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white"><span id="counter-total-ticket">0</span></h5>
                    </a>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Total Ticket</p>
                    <a href="#" class="inline-flex items-center px-3 py-2 text-xs font-medium text-center text-blue-700 border-blue-700 border rounded-lg hover:bg-blue-700 hover:text-white focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 transition-all duration-300">
                        More Detail
                        <svg aria-hidden="true" class="w-2.5 h-2.5 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    </a>
                </div>
                {{-- Counter Total Price --}}
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
    </div>



@endsection




