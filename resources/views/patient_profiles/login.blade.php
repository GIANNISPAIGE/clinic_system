@extends('components.userroles')

@section('content')
<div class="flex items-center justify-center min-h-screen bg-gradient-to-br from-green-700 to-green-700 p-6 ">
    <div class="flex flex-col items-center w-full max-w-md">
        
        <div class="bg-white p-8 rounded-lg shadow-lg w-full border-t-4 border-green-600 ">
            <a href="{{ url('/') }}" class="flex items-center text-gray-600 hover:text-gray-800 mb-6">
                <svg class="w-6 h-6 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M10 15a1 1 0 01-.7-.3l-4-4a1 1 0 010-1.4l4-4a1 1 0 111.4 1.4L7.4 10l3.3 3.3a1 1 0 01-.7 1.7z" clip-rule="evenodd"></path>
                </svg>
                <span class="text-lg font-semibold">Back</span>
            </a>
            
            <h2 class="text-2xl font-bold text-center mb-10 text-black-700">Login</h2>

            <form action="{{ route('patient.login.post') }}" method="POST">
                @csrf
                
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-medium mb-1">Email</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-3 flex items-center text-green-500">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M10 2a4 4 0 00-4 4v1a4 4 0 008 0V6a4 4 0 00-4-4zm-6 8a6 6 0 0112 0v1a6 6 0 11-12 0v-1z" clip-rule="evenodd"></path>
                            </svg>
                        </span>
                        <input type="email" name="email" placeholder="Enter your email" 
                            class="pl-10 p-3 w-full border border-green-400 rounded focus:ring-2 focus:ring-green-500 focus:outline-none" required>
                    </div>
                    @error('email')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-medium mb-1">Password</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-3 flex items-center text-green-500">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M10 2a6 6 0 00-6 6v1a6 6 0 1012 0V8a6 6 0 00-6-6zm-4 8v-1a4 4 0 118 0v1a4 4 0 01-8 0z" clip-rule="evenodd"></path>
                            </svg>
                        </span>
                        <input type="password" name="password" placeholder="Enter your password" 
                            class="pl-10 p-3 w-full border border-green-400 rounded focus:ring-2 focus:ring-green-500 focus:outline-none" required>
                    </div>
                    @error('password')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit"
                    class="w-full bg-green-600 text-white py-2 rounded text-center block hover:bg-green-700 transition">
                    Login
                </button>

                <p class="text-center text-sm text-gray-600 mt-4">
                    Don't have an account? 
                    <a href="{{ route('patient.register') }}" class="text-green-600 font-semibold hover:underline">Register here</a>
                </p>
            </form>
        </div>
    </div>
</div>
@endsection