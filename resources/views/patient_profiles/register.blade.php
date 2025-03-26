@extends('components.userroles')

@section('title', 'Register')

@section('header', 'Patient Registration')

@section('content')
<div class="max-w-lg mx-auto mt-10 bg-gradient-to-r from-gray-100 to-gray-200 p-8 rounded-xl shadow-lg border border-gray-300">
    <h2 class="text-3xl font-bold text-center mb-6 text-green-800">Patient Registration</h2>
    
    <form action="{{ route('patient.register.post') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf

        @foreach([
            'firstname' => 'First Name',
            'lastname' => 'Last Name',
            'birthdate' => 'Birthdate',
            'email' => 'Email',
            'number' => 'Phone Number',
            'impairments' => 'Impairments (Optional)',
            'brgy' => 'Barangay',
            'municipality' => 'Municipality',
            'province' => 'Province',
            'password' => 'Password',
            'password_confirmation' => 'Confirm Password'
        ] as $name => $label)
        <div class="relative">
            <input type="{{ $name == 'password' || $name == 'password_confirmation' ? 'password' : ($name == 'email' ? 'email' : ($name == 'birthdate' ? 'date' : 'text')) }}"
                   name="{{ $name }}"
                   id="{{ $name }}"
                   required 
                   class="peer w-full px-4 py-3 border border-gray-400 rounded-lg bg-white shadow-sm focus:outline-none focus:ring-2 focus:ring-green-500 placeholder-transparent"
                   placeholder="{{ $label }}">
            <label for="{{ $name }}" class="absolute left-4 top-3 text-gray-600 text-sm transition-all peer-placeholder-shown:top-4 peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-500 peer-focus:top-2 peer-focus:text-xs peer-focus:text-green-700">
                {{ $label }}
            </label>
        </div>
        @endforeach

        <div class="relative">
            <label class="block text-gray-700 text-sm mb-2">Upload Profile Picture</label>
            <input type="file" name="image" accept="image/*" class="w-full px-4 py-3 border border-gray-400 rounded-lg bg-white shadow-sm focus:outline-none focus:ring-2 focus:ring-green-500">
        </div>

        <button type="submit" class="w-full bg-green-700 text-white py-3 rounded-lg font-semibold hover:bg-green-800 transition duration-200 shadow-md">Register</button>
    </form>

    <p class="mt-6 text-center text-gray-700">Already have an account? 
        <a href="{{ route('patient.login.post') }}" class="text-green-600 font-medium hover:underline">Login</a>
    </p>
</div>
@endsection
