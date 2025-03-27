@extends('components.userroles')

@section('title', 'Register')

@section('header', 'Patient Registration')

@section('content')
<div class="max-w-lg mx-auto mt-10 bg-white p-8 rounded-xl shadow-lg border border-gray-200">
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
            'province' => 'Province'
        ] as $name => $label)
        <div class="relative">
            <input type="{{ $name == 'email' ? 'email' : ($name == 'birthdate' ? 'date' : 'text') }}"
                   name="{{ $name }}"
                   id="{{ $name }}"
                   required 
                   class="peer w-full px-4 pt-5 pb-2 border border-gray-300 rounded-lg bg-white shadow-sm focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-all">
            <label for="{{ $name }}" class="absolute left-4 top-3 text-green-600 text-sm transition-all peer-placeholder-shown:top-4 peer-placeholder-shown:text-base peer-placeholder-shown:text-green-600 peer-focus:top-2 peer-focus:text-xs peer-focus:text-green-700">
                {{ $label }}
            </label>
        </div>
        @endforeach

        <!-- Password Field with Toggle Icon -->
        @foreach([
            'password' => 'Password',
            'password_confirmation' => 'Confirm Password'
        ] as $name => $label)
        <div class="relative">
            <input type="password"
                   name="{{ $name }}"
                   id="{{ $name }}"
                   required 
                   class="peer w-full px-4 pt-5 pb-2 border border-gray-300 rounded-lg bg-white shadow-sm focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-all">
            <label for="{{ $name }}" class="absolute left-4 top-3 text-green-600 text-sm transition-all peer-placeholder-shown:top-4 peer-placeholder-shown:text-base peer-placeholder-shown:text-green-600 peer-focus:top-2 peer-focus:text-xs peer-focus:text-green-700">
                {{ $label }}
            </label>
            <!-- Eye Icon -->
            <span class="absolute right-4 top-3 cursor-pointer text-black hover:text-gray-900" onclick="togglePassword('{{ $name }}')">
                <i id="{{ $name }}_icon" class="fas fa-eye"></i>
            </span>
        </div>
        @endforeach

        <!-- Password Match Indicator -->
        <p id="password-match" class="text-sm font-semibold text-red-500 hidden">Passwords do not match</p>

        <div class="relative">
            <label class="block text-gray-700 text-sm mb-2">Upload Profile Picture</label>
            <input type="file" name="image" accept="image/*" class="w-full px-4 py-3 border border-gray-300 rounded-lg bg-white shadow-sm focus:outline-none focus:ring-2 focus:ring-green-500">
        </div>

        <button type="submit" class="w-full bg-green-700 text-white py-3 rounded-lg font-semibold hover:bg-green-800 transition duration-200 shadow-md">Register</button>
    </form>

    <p class="mt-6 text-center text-gray-700">Already have an account? 
        <a href="{{ route('patient.login.post') }}" class="text-green-600 font-medium hover:underline">Login</a>
    </p>
</div>

<script>
    function togglePassword(field) {
        const input = document.getElementById(field);
        const icon = document.getElementById(field + "_icon");
        if (input.type === "password") {
            input.type = "text";
            icon.classList.replace("fa-eye", "fa-eye-slash");
        } else {
            input.type = "password";
            icon.classList.replace("fa-eye-slash", "fa-eye");
        }
    }

    // Password Match Validation
    document.getElementById("password_confirmation").addEventListener("input", function() {
        const password = document.getElementById("password").value;
        const confirmPassword = this.value;
        const matchText = document.getElementById("password-match");

        if (password !== confirmPassword) {
            matchText.classList.remove("hidden");
        } else {
            matchText.classList.add("hidden");
        }
    });
</script>

@endsection
