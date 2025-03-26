@extends('components.admin')

@section('title', 'Patient Details')

@section('content')
<div class="max-w-3xl mx-auto mt-10 bg-white p-8 rounded-lg shadow-lg">
    <h2 class="text-3xl font-bold mb-6 text-center text-blue-600">
        🧑‍⚕️ Patient Details
    </h2>

    <!-- Patient Details Section -->
    <div class="grid grid-cols-2 gap-6 text-gray-700">
        <div>
            <p class="text-sm font-semibold text-gray-500">Name</p>
            <p class="text-base font-medium">
                {{ $patient->firstname }} {{ $patient->lastname }}
            </p>
        </div>

        <div>
            <p class="text-sm font-semibold text-gray-500">Email</p>
            <p class="text-base font-medium">
                {{ $patient->email }}
            </p>
        </div>

        <div>
            <p class="text-sm font-semibold text-gray-500">Phone</p>
            <p class="text-base font-medium">
                {{ $patient->number }}
            </p>
        </div>

        <div>
            <p class="text-sm font-semibold text-gray-500">Birthdate</p>
            <p class="text-base font-medium">
                {{ $patient->birthdate }}
            </p>
        </div>

        <div>
            <p class="text-sm font-semibold text-gray-500">Address</p>
            <p class="text-base font-medium">
                {{ $patient->address }}
            </p>
        </div>

        <div>
            <p class="text-sm font-semibold text-gray-500">Registered On</p>
            <p class="text-base font-medium">
                {{ $patient->created_at->format('M d, Y') }}
            </p>
        </div>
    </div>

    <!-- Back Button -->
    <div class="mt-8 text-center">
        <a href="{{ route('patient.display') }}" 
           class="bg-blue-500 text-white px-6 py-2 rounded-lg shadow-md hover:bg-blue-600 transition">
            ← Back to New Patients
        </a>
    </div>
</div>
@endsection
