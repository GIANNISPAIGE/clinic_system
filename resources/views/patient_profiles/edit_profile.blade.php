@extends('components.patient')

@section('content')
<div class="max-w-3xl mx-auto bg-green-50 p-6 rounded-lg shadow-md">
    <h2 class="text-2xl font-semibold text-green-700 mb-4">Edit Profile</h2>

    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-3 rounded-md mb-4">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('patient_profiles.update') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label class="text-green-700 font-semibold">First Name:</label>
            <input type="text" name="firstname" value="{{ old('firstname', $patient_profiles->firstname) }}" class="w-full p-2 border border-green-300 rounded-md" required>
        </div>

        <div>
            <label class="text-green-700 font-semibold">Last Name:</label>
            <input type="text" name="lastname" value="{{ old('lastname', $patient_profiles->lastname) }}" class="w-full p-2 border border-green-300 rounded-md" required>
        </div>

        <div>
            <label class="text-green-700 font-semibold">Birthdate:</label>
            <input type="date" name="birthdate" value="{{ old('birthdate', $patient_profiles->birthdate) }}" class="w-full p-2 border border-green-300 rounded-md" required>
        </div>

        <div>
            <label class="text-green-700 font-semibold">Email:</label>
            <input type="email" name="email" value="{{ old('email', $patient_profiles->email) }}" class="w-full p-2 border border-green-300 rounded-md" required>
        </div>

        <div>
            <label class="text-green-700 font-semibold">Number:</label>
            <input type="text" name="number" value="{{ old('number', $patient_profiles->number) }}" class="w-full p-2 border border-green-300 rounded-md" required>
        </div>

        <div>
            <label class="text-green-700 font-semibold">Impairments:</label>
            <input type="text" name="impairments" value="{{ old('impairments', $patient_profiles->impairments) }}" class="w-full p-2 border border-green-300 rounded-md">
        </div>

        <div>
            <label class="text-green-700 font-semibold">Barangay:</label>
            <input type="text" name="brgy" value="{{ old('brgy', $patient_profiles->brgy) }}" class="w-full p-2 border border-green-300 rounded-md" required>
        </div>

        <div>
            <label class="text-green-700 font-semibold">Municipality:</label>
            <input type="text" name="municipality" value="{{ old('municipality', $patient_profiles->municipality) }}" class="w-full p-2 border border-green-300 rounded-md" required>
        </div>

        <div>
            <label class="text-green-700 font-semibold">Province:</label>
            <input type="text" name="province" value="{{ old('province', $patient_profiles->province) }}" class="w-full p-2 border border-green-300 rounded-md" required>
        </div>

        <div>
            <label class="text-green-700 font-semibold">Profile Image:</label>
            <input type="file" name="image" class="w-full p-2 border border-green-300 rounded-md">
            @if($patient_profiles->image)
                <p class="text-green-700 mt-2">Current Image:</p>
                <img src="{{ asset('storage/' . $patient_profiles->image) }}" alt="Profile Image" class="w-24 h-24 object-cover rounded-full shadow-md">
            @endif
        </div>

        <div>
            <label class="text-green-700 font-semibold">New Password (optional):</label>
            <input type="password" name="password" class="w-full p-2 border border-green-300 rounded-md">
        </div>

        <div>
            <label class="text-green-700 font-semibold">Confirm Password:</label>
            <input type="password" name="password_confirmation" class="w-full p-2 border border-green-300 rounded-md">
        </div>

        <button type="submit" class="w-full py-2 bg-green-600 text-white font-semibold rounded-md hover:bg-green-700 transition">
            Update Profile
        </button>
    </form>
</div>
@endsection
