@extends('admin.layouts.base')

@section('title')
    Manage User - Dashboard
@endsection
@section('content')
    <div class="w-full min-h-screen shadow-lg rounded-lg p-4">
        <div class="bg-white shadow-lg rounded-lg p-4">
            <h2 class="text-lg font-medium mb-4">Summary</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                <div class="bg-gray-200 p-4 rounded-lg">
                    <p class="text-sm font-medium text-gray-600">Total Users</p>
                    <p class="text-lg font-bold text-gray-900">{{ $total }}</p>
                </div>
                {{-- <div class="bg-gray-200 p-4 rounded-lg">
                    <p class="text-sm font-medium text-gray-600">Active Users</p>
                    <p class="text-lg font-bold text-gray-900">150</p>
                </div> --}}
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
                    @php
                        $i = 0;
                    @endphp
                    @foreach ($users as $user)
                        <tr class="text-center">
                            <td class="border px-4 py-2">{{ ++$i }}</td>
                            <td class="border px-4 py-2">{{ $user->name }}</td>
                            <td class="border px-4 py-2">{{ $user->email }}</td>
                            <td class="border px-4 py-2">
                                <button class="bg-orange-500 hover:bg-orange-700 text-white py-1 px-3 rounded">
                                    <i class="fa-solid fa-eye fa-xs"></i><span class="text-sm ml-2">Change Password</span>
                                </button>
                            </td>
                            <td class="border px-4 py-2">
                                {{-- wrap the $user into json in this button --}}
                                <button onclick="editAction(this)" data-json="{{ json_encode($user) }}" data-modal-target="defaultModal" data-modal-toggle="defaultModal" class="bg-blue-500 hover:bg-blue-700 text-white py-1 px-3 rounded">
                                    <i class="fa-solid fa-pen-to-square fa-sm"></i>
                                </button>

                                <button class="bg-red-500 hover:bg-red-700 text-white py-1 px-3 rounded ml-2" onclick="deleteUser({{ $user->id }})">
                                    <i class="fa-solid fa-trash fa-sm"></i>
                                </button>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            {{ $users->links() }}
        </div>
    </div>



@endsection




