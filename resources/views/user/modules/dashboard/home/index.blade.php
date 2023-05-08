@extends('user.layouts.dashboard')

@section('title')
    Dashboard User
@endsection
@section('content')
    <div class="w-full min-h-screen shadow-lg rounded-lg p-4">
        <div class="bg-white shadow-lg rounded-lg p-4">
            <h2 class="text-lg font-medium mb-4">Summary</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                <div class="bg-gray-200 p-4 rounded-lg">
                    {{-- <p class="text-sm font-medium text-gray-600">Total Users</p>
                    <p class="text-lg font-bold text-gray-900">{{ $total }}</p> --}}
                </div>
                {{-- <div class="bg-gray-200 p-4 rounded-lg">
                    <p class="text-sm font-medium text-gray-600">Active Users</p>
                    <p class="text-lg font-bold text-gray-900">150</p>
                </div> --}}
            </div>
        </div>
    </div>



@endsection




