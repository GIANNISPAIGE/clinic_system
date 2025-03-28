@extends('components.userroles')

@section('content')
<div class="flex items-center justify-center min-h-screen bg-gradient-to-br from-green-700 to-green-700 p-6">

    <div class="flex flex-col items-center justify-center w-full max-w-5xl space-y-6">
        <div class="flex flex-col items-center w-full">
            <!-- Login Form -->
            <div class="bg-white p-8 rounded-lg shadow-md w-full md:w-96 border-t-4 border-white-500">
                <!-- Back Button with Arrow at the Top -->
               
                <h2 class="text-2xl font-bold text-center mb-6 text-black-9git00">Admin Login</h2>

                @if (session('error'))
                    <p class="text-red-500 text-sm text-center mb-4">{{ session('error') }}</p>
                @endif

                <form action="{{ route('admin.login') }}" method="POST">
                    @csrf
                    <!-- Username -->
                    <div class="mb-4">
                        <label class="block text-gray-600 text-sm font-medium mb-1">Username</label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-3 flex items-center text-green-500">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M10 2a4 4 0 00-4 4v1a4 4 0 008 0V6a4 4 0 00-4-4zm-6 8a6 6 0 0112 0v1a6 6 0 11-12 0v-1z" clip-rule="evenodd"></path>
                                </svg>
                            </span>
                            <input type="text" name="username" placeholder="Enter your username" 
                                class="pl-10 p-3 w-full border border-green-400 rounded focus:ring-2 focus:ring-green-400 focus:outline-none" required>
                        </div>
                    </div>

                    <!-- Password -->
                    <div class="mb-4">
                        <label class="block text-gray-600 text-sm font-medium mb-1">Password</label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-3 flex items-center text-green-500">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M10 2a6 6 0 00-6 6v1a6 6 0 1012 0V8a6 6 0 00-6-6zm-4 8v-1a4 4 0 118 0v1a4 4 0 01-8 0z" clip-rule="evenodd"></path>
                                </svg>
                            </span>
                            <input type="password" name="password" placeholder="Enter your password" 
                                class="pl-10 p-3 w-full border border-green-400 rounded focus:ring-2 focus:ring-green-400 focus:outline-none" required>
                        </div>
                    </div>

                    <!-- Login Button -->
                    <button type="submit" 
                        class="w-full bg-green-500 text-white py-2 rounded text-center block hover:bg-green-600 transition">
                        Login
                    </button>

                    <!-- Cancel Button -->
                    <a href="{{ url('/') }}" 
                        class="w-full bg-gray-500 text-white py-2 rounded text-center block mt-2 hover:bg-gray-600 transition">
                        Cancel
                    </a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection