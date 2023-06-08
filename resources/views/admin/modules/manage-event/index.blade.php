@extends('admin.layouts.base')

@push('css')
    <style>
    .ck-editor__editable_inline {
        min-height: 200px;
    }
    </style>

    <script src="https://cdn.ckeditor.com/ckeditor5/38.0.1/classic/ckeditor.js"></script>

@endpush
@section('title')
    Manage Event - Dashboard
@endsection
@section('content')
    <div class="w-full min-h-screen shadow-lg rounded-lg p-4">
        <div class="bg-white shadow-lg rounded-lg p-4">
            <h2 class="text-lg font-medium mb-4">Summary</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                <div class="bg-gray-200 p-4 rounded-lg shadow-lg">
                    <p class="text-sm font-medium text-gray-600">Total Open Events</p>
                    <p class="text-lg font-bold text-gray-900">{{ $total }}</p>
                </div>
                <div class="bg-gray-200 p-4 rounded-lg shadow-lg">
                    <p class="text-sm font-medium text-gray-600">Total Closed Events</p>
                    <p class="text-lg font-bold text-gray-900">{{ $total }}</p>
                </div>
                <div class="bg-gray-200 p-4 rounded-lg shadow-lg">
                    <p class="text-sm font-medium text-gray-600">Total Events</p>
                    <p class="text-lg font-bold text-gray-900">{{ $total }}</p>
                </div>
            </div>
        </div>

        <div class="bg-white shadow-lg rounded-lg mt-4 p-4">
            <h2 class="text-lg font-medium p-4">Event Table</h2>
            <div class="flex justify-end mb-3">
                <button id="createButton" data-modal-target="defaultModal" onclick="createAction()"  class="bg-green-400 hover:bg-green-600 text-white py-1 px-3 rounded">
                    <i class="fa-solid fa-plus fa-sm"></i><span class="ml-1.5">Add New Record</span>
                </button>
                <button id="succesButton" data-modal-target="successModal" data-modal-toggle="successModal" class="hidden bg-green-400 hover:bg-green-600 text-white py-1 px-3 rounded">
                    <i class="fa-solid fa-plus fa-sm"></i><span class="ml-1.5">Show Modal</span>
                </button>
            </div>
            <table id="tableData" class="overflow-x-auto w-full max-w-7xl">
                <thead>
                    <tr>
                        <th class="border px-4 py-2">#</th>
                        <th class="border px-4 py-2">Thumbnail</th>
                        <th class="border px-4 py-2">Title</th>
                        <th class="border px-4 py-2">Description</th>
                        {{-- <th class="border px-4 py-2">Date</th> --}}
                        <th class="border px-4 py-2">Location & Time</th>
                        {{-- <th class="border px-4 py-2">Time</th> --}}
                        <th class="border px-4 py-2">Price & Stock</th>
                        {{-- <th class="border px-4 py-2">Stock</th> --}}
                        <th class="border px-4 py-2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- @php
                        $i = 0;
                    @endphp
                    @foreach ($programs as $program)
                        <tr class="text-center">
                            <td class="border px-4 py-2">{{ ++$i }}</td>
                            <td class="border px-4 py-2">
                                @if (Str::startsWith($program->thumbnail, 'images/produk/'))
                                    <img src="{{ Storage::url($program->thumbnail) }}" alt="thumbnail" class="max-h-36">
                                @else
                                    <img src="{{ asset($program->thumbnail) }}" alt="thumbnail" class="max-h-36">
                                @endif
                            </td>
                            <td class="border px-4 py-2 text-sm max-w-[200px]">{{ $program->title }}</td>
                            <td class="border px-4 py-2">
                                <button onclick="showDescriptionModal(this)" data-json="{{ json_encode($program) }}" class="bg-indigo-500 hover:bg-indigo-700 text-white py-1.5 px-3 rounded flex items-center justify-center mx-auto shadow-lg">
                                    <i class="fa-solid fa-eye fa-2xs"></i><span class="text-xs ml-2">See Description</span>
                                </button>
                            </td>

                            <td class="border px-4 py-2">
                                <div class="flex items-center justify-center flex-col space-y-2">
                                    <span class="bg-gray-100 text-gray-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded mr-2 dark:bg-gray-700 dark:text-gray-400 border border-gray-500">
                                        <i class="fa-solid fa-location-dot"></i>
                                        <span class="ml-1.5">
                                            {{ $program->location }}
                                        </span>
                                    </span>
                                    <span class="bg-gray-100 text-gray-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded mr-2 dark:bg-gray-700 dark:text-gray-400 border border-gray-500">
                                        <i class="fa-solid fa-calendar"></i>
                                        <span class="ml-1.5">
                                            {{ date_format(date_create($program->start_date),"D, d M Y"); }}
                                        </span>
                                    </span>
                                    <span class="bg-gray-100 text-gray-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded mr-2 dark:bg-gray-700 dark:text-gray-400 border border-gray-500">
                                        <i class="fa-solid fa-calendar"></i>
                                        <span class="ml-1.5">
                                            {{ date_format(date_create($program->end_date),"D, d M Y"); }}
                                        </span>
                                    </span>
                                    <span class="bg-gray-100 text-gray-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded mr-2 dark:bg-gray-700 dark:text-gray-400 border border-gray-500">
                                        <i class="fa-solid fa-clock"></i>
                                        <span class="ml-1.5">
                                            {{ $program->time }} </td>
                                        </span>
                                    </span>
                                </div>
                            <td class="border px-4 py-2">
                                <div class="flex items-center justify-center flex-col space-y-2">
                                    <span class="bg-gray-100 text-gray-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded mr-2 dark:bg-gray-700 dark:text-gray-400 border border-gray-500">
                                        <i class="fa-solid fa-cube"></i>
                                        <span class="ml-1.5">
                                            {{ number_format($program->stock) }}
                                        </span>
                                    </span>
                                    <span class="bg-gray-100 text-gray-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded mr-2 dark:bg-gray-700 dark:text-gray-400 border border-gray-500">
                                        <i class="fa-solid fa-tag"></i>
                                        <span class="ml-1.5">
                                            {{ $program->price != 0 ? number_format($program->price) : "Free" }}
                                        </span>
                                    </span>
                                </div>
                            </td>
                            <td class="border px-4 py-2">
                                <div class="flex">
                                    <button onclick="editAction(this)" data-json="{{ json_encode($program) }}" data-modal-target="defaultModal" data-modal-toggle="defaultModal" class="bg-blue-500 hover:bg-blue-700 text-white py-1 px-3 rounded">
                                        <i class="fa-solid fa-pen-to-square fa-sm"></i>
                                    </button>

                                    <button class="bg-red-500 hover:bg-red-700 text-white py-1 px-3 rounded ml-2" onclick="deleteData({{ $program->id }})">
                                        <i class="fa-solid fa-trash fa-sm"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @endforeach --}}
                </tbody>
            </table>

            <div id="pagination"></div>
            {{-- {{ $programs->links() }} --}}
        </div>
    </div>

    <!-- Create modal -->
    <div id="defaultModal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-3xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Form Manage Event
                    </h3>
                    <button onclick="defaultModal.hide()" type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="defaultModal">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-6 space-y-6">
                    {{-- make me form in this div for creating new user in laravel --}}
                    <form id="user-form" action="{{ route('dashboard.manage-event.store') }}" method="POST"
                    onsubmit="createOrUpdate(this, event)" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id">
                        <input type="hidden" name="_method">
                        <div class="mb-6">
                            <label for="category_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title</label>
                            <select name="category_id" id="category_id" required class="block w-full p-2 mb-6 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option value="" disabled selected>Choose a country</option>
                                <option value="1">Main Event</option>
                                <option value="2">Mini Event</option>
                                <option value="3">Free Event</option>
                            </select>
                        </div>
                        <div class="mb-6">
                            <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title</label>
                            <input type="text" name="title" id="title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                        </div>
                        <div class="mb-6">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="thumbnail">Upload file</label>
                            <input name="thumbnail" id="thumbnail" type="file" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400">
                        </div>
                        <div class="mb-6">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                            <div id="editor" style="min-height: 200px">
                            </div>
                        </div>
                        <div class="mb-6">
                            <label for="location" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Location</label>
                            <input type="text" name="location" id="location" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                        </div>
                        <div class="mb-6">
                            <div date-rangepicker class="flex items-center">
                                <div class="relative w-1/2">
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                        <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
                                    </div>
                                    <input name="start_date" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select date start">
                                </div>
                                <span class="mx-4 text-gray-500">to</span>
                                <div class="relative w-1/2">
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                        <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
                                    </div>
                                    <input name="end_date" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select date end">
                                </div>
                            </div>
                        </div>
                        <div class="grid gap-6 mb-6 md:grid-cols-3">
                            <div>
                                <label for="time" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Time</label>
                                <input type="text" id="time" name="time" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                            </div>
                            <div>
                                <label for="stock" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Stock</label>
                                <input type="number" min="0" id="stock" name="stock" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                            </div>
                            <div>
                                <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Price</label>
                                <input type="number" min="0" id="price" name="price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                            </div>
                        </div>
                        <div class="grid gap-6 mb-6 md:grid-cols-2">
                            <div>
                                <label for="slug" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Slug ( URL Costum)</label>
                                <input type="text" required id="slug" name="slug" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                            </div>
                            <div>
                                <label for="eksternal_link" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Eksternal Link (*Diisi jika free event)</label>
                                <input type="text" id="eksternal_link" name="eksternal_link" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                            </div>
                        </div>
                        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                    </form>
                </div>
                <!-- Modal footer -->
                {{-- <div class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600"> --}}
                    {{-- <button data-modal-hide="defaultModal" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">I accept</button>
                    <button data-modal-hide="defaultModal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Decline</button> --}}
                {{-- </div> --}}
            </div>
        </div>
    </div>

    <!-- Description Modal -->
    <div id="descriptionModal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Description Event
                    </h3>
                    <button onclick="descriptionModal.hide()" type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="successModal">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-6 space-y-6">
                    {{-- add like flex with one logo check and succes message, make all the elment is centered --}}
                    <div id="description_event">

                    </div>
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
                    <button onclick="successModal.hide()" type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="successModal">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-6 space-y-6">
                    {{-- add like flex with one logo check and succes message, make all the elment is centered --}}
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
                    <button onclick="errorModal.hide()" type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="errorModal">
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


@endsection

@push('script')
{{-- <script src="https://cdn.ckeditor.com/ckeditor5/37.1.0/classic/ckeditor.js"></script> --}}
<script src="https://code.jquery.com/jquery-3.7.0.slim.min.js" integrity="sha256-tG5mcZUtJsZvyKAxYLVXrmjKBVLd6VpVccqz/r4ypFE=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/datepicker.min.js"></script>

<script>
        const table = {
            baseURL: `{{ route('dashboard.manage-event.table') }}`,
            element: $('#tableData'),
            pagination: $('#pagination'),
            setLoadingState() {
                this.element.find('tbody').html(`
                    <tr class="text-warning">
                        <td colspan="${this.element.find('thead th').length}">
                            <i class="fa fa-fw fa-circle-notch fa-spin"></i> Mohon tunggu, sedang memuat data ...
                        </td>
                    </tr>
                `);
            },
            render(resultJson) {
                let htmlRows = ``;
                let idx = 0;
                console.log(resultJson.data);
                resultJson.data.data.forEach(row => {
                    let status=''
                    if(row.status=="1"){
                        status='<span class="badge bg-success">Aktif</span>'
                    }else{
                        status='<span class="badge bg-danger">Tidak Aktif</span>'
                    }
                    // console.log(row);

                    let htmlRow = $(`
                        <tr class="text-center">
                            <td class="border px-4 py-2">${++idx}</td>
                            <td class="border px-4 py-2">
                                <img id="thumbnail" alt="" class="max-h-36">
                            </td>
                            <td class="border px-4 py-2 text-sm max-w-[200px]" id="title"></td>
                            <td class="border px-4 py-2" id="description_button">

                            </td>

                            <td class="border px-4 py-2">
                                <div class="flex items-center justify-center flex-col space-y-2">
                                    <span class="bg-gray-100 text-gray-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded mr-2 dark:bg-gray-700 dark:text-gray-400 border border-gray-500">
                                        <i class="fa-solid fa-location-dot"></i>
                                        <span class="ml-1.5" id="location">
                                        </span>
                                    </span>
                                    <span class="bg-gray-100 text-gray-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded mr-2 dark:bg-gray-700 dark:text-gray-400 border border-gray-500">
                                        <i class="fa-solid fa-calendar"></i>
                                        <span class="ml-1.5" id="start_date">
                                        </span>
                                    </span>
                                    <span class="bg-gray-100 text-gray-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded mr-2 dark:bg-gray-700 dark:text-gray-400 border border-gray-500">
                                        <i class="fa-solid fa-calendar"></i>
                                        <span class="ml-1.5" id="end_date">
                                        </span>
                                    </span>
                                    <span class="bg-gray-100 text-gray-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded mr-2 dark:bg-gray-700 dark:text-gray-400 border border-gray-500">
                                        <i class="fa-solid fa-clock"></i>
                                        <span class="ml-1.5" id="time">
                                        </span>
                                    </span>
                                </div>
                            </td>
                            <td class="border px-4 py-2">
                                <div class="flex items-center justify-center flex-col space-y-2">
                                    <span class="bg-gray-100 text-gray-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded mr-2 dark:bg-gray-700 dark:text-gray-400 border border-gray-500">
                                        <i class="fa-solid fa-cube"></i>
                                        <span class="ml-1.5" id="stock">
                                        </span>
                                    </span>
                                    <span class="bg-gray-100 text-gray-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded mr-2 dark:bg-gray-700 dark:text-gray-400 border border-gray-500">
                                        <i class="fa-solid fa-tag"></i>
                                        <span class="ml-1.5" id="price">
                                        </span>
                                    </span>
                                </div>
                            </td>
                            <td class="border px-4 py-2">
                                <div class="flex">
                                    <div id="update_button">

                                    </div>

                                    <button class="bg-red-500 hover:bg-red-700 text-white py-1 px-3 rounded ml-2" onclick="deleteData(${row.id})">
                                        <i class="fa-solid fa-trash fa-sm"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    `);

                    // htmlRow.find('#thumbnail').attr('src', `/storage/${row.thumbnail}`);
                    // htmlRow.attr('data-json', encodedJsonData);
                    const jsonData = JSON.stringify(row).replace(/'/g, '&#39;');
                    console.log(jsonData);

                    htmlRow.find('#update_button').html(`
                        <button onclick="editAction(this)" data-json="${jsonData.replace(/"/g, '&quot;')}" data-modal-target="defaultModal" data-modal-toggle="defaultModal" class="bg-blue-500 hover:bg-blue-700 text-white py-1 px-3 rounded">
                            <i class="fa-solid fa-pen-to-square fa-sm"></i>
                        </button>
                    `);

                    htmlRow.find('#description_button').html(`
                        <button onclick="showDescriptionModal(this)" data-json="${jsonData.replace(/"/g, '&quot;')}" class="bg-indigo-500 hover:bg-indigo-700 text-white py-1.5 px-3 rounded flex items-center justify-center mx-auto shadow-lg">
                            <i class="fa-solid fa-eye fa-2xs"></i><span class="text-xs ml-2">See Description</span>
                        </button>
                    `);


                    htmlRow.find('#thumbnail').attr('src', `${row.thumbnail.startsWith('images/produk/') ? '/storage/' : '/'}${row.thumbnail}`);
                    htmlRow.find('#title').text(row.title);
                    htmlRow.find('#location').text(row.location);
                    htmlRow.find('#start_date').text(row.start_date);
                    htmlRow.find('#end_date').text(row.end_date);
                    htmlRow.find('#time').text(row.time);
                    htmlRow.find('#stock').text(row.stock);
                    htmlRow.find('#price').text(row.price);
                    htmlRows += '<tr>' + htmlRow.html() + '</tr>';
                });

                this.element.find('tbody').html(htmlRows);
                this.pagination.html();
            },
            loadDataTables() {
                this.setLoadingState();
                axios({
                    url: this.baseURL,
                    method: 'GET',
                    // params: {
                    //     id: {{ Auth::user()->sekolah_id }}
                    // }
                })
                .then(resultJson => {
                    // console.log(resultJson.data.data.data);
                    this.render(resultJson.data);
                })
                .catch(errorResponse => {
                    // handleErrorRequest(errorResponse);
                    console.log(errorResponse)
                });
            }
        };

        table.loadDataTables();
</script>


<script>
    ClassicEditor
        .create(document.querySelector('#editor'))
        .then(createdEditor => {
        // Store the editor instance in a variable
        editor = createdEditor;
    })
    .catch(error => {
        console.error(error);
    });

</script>
<script>
    // const options = {
    //     onHide: () => {
    //         defaultModal.hide();
    //     },
    // };

    const $descriptionModal = document.getElementById('descriptionModal');
    const descriptionModal = new Modal($descriptionModal);

    function showDescriptionModal(button) {
        console.log(button.dataset.json);
        const data = JSON.parse(button.dataset.json);
        const descriptionEvent = document.querySelector('#description_event');
        descriptionEvent.innerHTML = data.description;
        descriptionModal.show();
    }


    const $defaultModal = document.getElementById('defaultModal');
    const defaultModal = new Modal($defaultModal);
    const $successModal = document.getElementById('successModal');
    const successModal = new Modal($successModal);
    const $errorModal = document.getElementById('errorModal');
    const errorModal = new Modal($errorModal)

    function editAction(button) {
        const data = JSON.parse(button.dataset.json);
        // console.log(data);
        document.querySelector('#user-form input[name="_method"]').value = "PUT";
        document.querySelector('#user-form input[name="id"]').value = data.id;
        document.querySelector('#user-form input[name="title"]').value = data.title;
        document.querySelector('#user-form select[id="category_id"]').value = data.category_id;

        const selectElement = document.querySelector('#user-form select[id="category_id"]');
        for (let i = 0; i < selectElement.options.length; i++) {
            const option = selectElement.options[i];
            if (option.value === data.category_id.toString()) {
                option.selected = true;
                break;
            }
        }

        document.querySelector('#user-form input[name="thumbnail"]').value = "";
        editor.setData(data.description);

        document.querySelector('#user-form input[name="location"]').value = data.location;
        document.querySelector('#user-form input[name="start_date"]').value = data.start_date;
        document.querySelector('#user-form input[name="end_date"]').value = data.end_date;
        document.querySelector('#user-form input[name="time"]').value = data.time;
        document.querySelector('#user-form input[name="stock"]').value = data.stock;
        document.querySelector('#user-form input[name="price"]').value = data.price;
        document.querySelector('#user-form input[name="slug"]').value = data.slug;
        document.querySelector('#user-form input[name="eksternal_link"]').value = data.eksternal_link;
        defaultModal.show();
    }


    function createAction() {
        document.querySelector('#user-form input[name="_method"]').value = "POST";
        document.querySelector('#user-form input[name="id"]').value = "";
        document.querySelector('#user-form input[name="title"]').value = "";
        document.querySelector('#user-form select[id="category_id"]').value = "";
        document.querySelector('#user-form input[name="thumbnail"]').value = "";
        editor.setData("");
        document.querySelector('#user-form input[name="location"]').value = "";
        document.querySelector('#user-form input[name="start_date"]').value = "";
        document.querySelector('#user-form input[name="end_date"]').value = "";
        document.querySelector('#user-form input[name="time"]').value = "";
        document.querySelector('#user-form input[name="stock"]').value = "";
        document.querySelector('#user-form input[name="price"]').value = "";
        document.querySelector('#user-form input[name="slug"]').value = "";
        document.querySelector('#user-form input[name="eksternal_link"]').value = "";

        defaultModal.show();
    }



    const createOrUpdate = (form, event) => {
        event.preventDefault();
        let data = new FormData();

        function getFile(name) {
            let file = $form.find(`[name="${name}"]`)[0];
            if (file && file.files.length > 0) {
                data.append(`${name}`, file.files[0]);
            }
        }

        // !======================================! //
        $form = $(form);

        let url = `{{ route('dashboard.manage-event.store') }}`;
        let method = $form.find('[name="_method"]').val();

        try {
            data.append('_token', $form.find('[name="_token"]').val());
            data.append('_method', $form.find('[name="_method"]').val());
            data.append('id', $form.find('[name="id"]').val());
            data.append('category_id', $form.find('[name="category_id"]').val());
            data.append('title', $form.find('[name="title"]').val());
            getFile("thumbnail");
            data.append('description', editor.getData());
            data.append('start_date', $form.find('[name="start_date"]').val());
            data.append('end_date', $form.find('[name="end_date"]').val());
            data.append('location', $form.find('[name="location"]').val());
            data.append('time', $form.find('[name="time"]').val());
            data.append('stock', $form.find('[name="stock"]').val());
            data.append('price', $form.find('[name="price"]').val());
            data.append('eksternal_link', $form.find('[name="eksternal_link"]').val());
            data.append('slug', $form.find('[name="slug"]').val());
            // console.log('ada');
        } catch (e) {
            console.log(e);
        }

        axios({
            url: $form.attr('action'),
            method: $form.attr('method'),
            data: data,
            headers: {
            'X-CSRF-TOKEN': $form.find('[name="_token"]').val(),
            },
        })
            .then(response => {
                // console.log(response)
                if(response.data.status == "success") {
                    table.loadDataTables();
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
    function deleteData(userId) {
        const form = document.querySelector('#user-form');

        if (confirm('Are you sure you want to delete this user?')) {
            axios({
                method: 'DELETE',
                url: '/dashboard/manage-event',
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
                    table.loadDataTables();
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
@endpush



