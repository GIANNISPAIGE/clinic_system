@extends('components.userroles')

@section('title', 'User Role Selection')

@section('content')
<div class="flex flex-col items-center justify-center min-h-screen px-4 bg-gradient-to-b from-blue-100 to-blue-50 relative overflow-hidden">
    <!-- Background Pattern -->
    <div class="absolute inset-0 bg-opacity-10 bg-blue-300 mix-blend-multiply"></div>
    
    <!-- Logo -->
    <img src="{{ asset('asset/melogo.jpg') }}" alt="Logo" class="relative mb-12 w-32 h-32 sm:w-36 sm:h-36 shadow-md rounded-full border-4 border-white">
    
    <div class="relative flex flex-col items-center space-y-8 max-w-xs sm:max-w-sm md:max-w-md bg-white/80 backdrop-blur-md p-6 rounded-xl shadow-xl border border-gray-300">
        <h2 class="text-2xl font-semibold text-gray-800">Select Your Role</h2>
        
        <!-- Patient Role -->
        <a href="{{ route('patient.login') }}" class="flex items-center justify-center w-52 py-3 bg-teal-500 text-white font-medium rounded-lg shadow-md hover:bg-teal-600 transition-transform transform hover:scale-105 focus:ring-4 focus:ring-teal-300">
            <svg class="w-6 h-6 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A4 4 0 018 16h8a4 4 0 012.879 1.804M12 14V8m0 0a4 4 0 10-8 0m8 0a4 4 0 018 0"></path>
            </svg>
            <span class="text-lg">Patient</span>
        </a>
        
        <!-- Divider -->
        <div class="w-20 h-0.5 bg-gray-400"></div>
        
        <!-- Admin Role -->
        <a href="{{ route('admin.login') }}" class="flex items-center justify-center w-52 py-3 bg-indigo-500 text-white font-medium rounded-lg shadow-md hover:bg-indigo-600 transition-transform transform hover:scale-105 focus:ring-4 focus:ring-indigo-300">
            <svg class="w-6 h-6 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h11m-5-6h5m-5 12h5m-5-6h5m-5 12h5"></path>
            </svg>
            <span class="text-lg">Admin</span>
        </a>
    </div>
</div>
@endsection
