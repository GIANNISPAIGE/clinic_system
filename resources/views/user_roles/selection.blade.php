@extends('components.userroles')

@section('title', 'User Role Selection')

@section('content')
<div class="flex flex-col items-center justify-center min-h-screen px-6 bg-gradient-to-b from-green-700 to-green-700 relative overflow-hidden">
    <!-- Background Overlay -->
    <div class="absolute inset-0 bg-green-800 bg-opacity-50"></div>

    <!-- Logo -->
    <div class="relative flex flex-col items-center mb-8">
        <img src="{{ asset('asset/melogo.jpg') }}" alt="Clinic Logo" class="w-32 h-32 sm:w-40 sm:h-40 shadow-xl rounded-full border-4 border-white ring-4 ring-blue-400">
        <h2 class="text-white text-2xl font-semibold mt-4">Welcome to ASP System</h2>
    </div>

    <!-- Role Selection Container -->
    <div class="relative bg-white rounded-lg shadow-2xl p-8 w-full max-w-sm text-center">
        <h3 class="text-gray-700 text-xl font-semibold mb-4">Select Your Role</h3>
        
        <!-- Patient Role -->
        <a href="{{ route('patient.login') }}" class="flex items-center justify-center w-full py-3 bg-teal-500 text-white font-medium rounded-lg shadow-md hover:bg-teal-600 transition-all duration-200 transform hover:scale-105 focus:ring-4 focus:ring-teal-300 mb-5">
            <svg class="w-7 h-7 mr-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A4 4 0 018 16h8a4 4 0 012.879 1.804M12 14V8m0 0a4 4 0 10-8 0m8 0a4 4 0 018 0"></path>
            </svg>
            <span class="text-lg">Patient</span>
        </a>

        <!-- Divider -->
        <div class="relative w-full flex items-center my-4">
            <div class="flex-grow h-px bg-gray-300"></div>
            <span class="px-3 text-gray-500">OR</span>
            <div class="flex-grow h-px bg-gray-300"></div>
        </div>

        <!-- Admin Role -->
        <a href="{{ route('admin.login') }}" class="flex items-center justify-center w-full py-3 bg-indigo-500 text-white font-medium rounded-lg shadow-md hover:bg-indigo-600 transition-all duration-200 transform hover:scale-105 focus:ring-4 focus:ring-indigo-300">
            <svg class="w-7 h-7 mr-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h11m-5-6h5m-5 12h5m-5-6h5m-5 12h5"></path>
            </svg>
            <span class="text-lg">Admin</span>
        </a>
    </div>
</div>
@endsection
