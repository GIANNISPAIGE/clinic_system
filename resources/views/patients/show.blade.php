@extends('components.admin')

@section('title', 'Patient Details')

@section('content')
<div class="max-w-3xl mx-auto mt-10 bg-white p-10 rounded-2xl shadow-xl border border-gray-300">
    <h2 class="text-3xl font-bold mb-8 text-center text-blue-700 flex items-center justify-center gap-3">
        <span class="text-5xl">🧑‍⚕️</span> Patient Details
    </h2>

    <!-- Patient Details Section -->
    <div class="grid grid-cols-2 gap-x-8 gap-y-6 text-gray-900">
        <div>
            <p class="text-xs font-semibold text-gray-500 uppercase">Name</p>
            <p class="text-lg font-semibold">{{ $patient->firstname }} {{ $patient->lastname }}</p>
        </div>
        <div>
            <p class="text-xs font-semibold text-gray-500 uppercase">Impairments</p>
            <p class="text-lg font-semibold">{{ $patient->impairments }}</p>
        </div>
        <div>
            <p class="text-xs font-semibold text-gray-500 uppercase">Email</p>
            <p class="text-lg font-semibold">{{ $patient->email }}</p>
        </div>
        <div>
            <p class="text-xs font-semibold text-gray-500 uppercase">Phone</p>
            <p class="text-lg font-semibold">{{ $patient->number }}</p>
        </div>
        <div>
            <p class="text-xs font-semibold text-gray-500 uppercase">Birthdate</p>
            <p class="text-lg font-semibold">{{ $patient->birthdate }}</p>
        </div>
        <div>
            <p class="text-xs font-semibold text-gray-500 uppercase">Address</p>
            <p class="text-lg font-semibold">{{ $patient->address }}</p>
        </div>
        <div class="col-span-2">
            <p class="text-xs font-semibold text-gray-500 uppercase">Registered On</p>
            <p class="text-lg font-semibold">{{ $patient->created_at->format('M d, Y') }}</p>
        </div>
    </div>

    <!-- Back Button -->
    <div class="mt-10 flex justify-end">
        <a href="{{ route('patients.index') }}" 
           class="bg-blue-600 text-white px-6 py-2 rounded-lg shadow-md hover:bg-blue-700 transition-all duration-200 transform hover:scale-105">
            Back
        </a>
    </div>
</div>
@endsection
