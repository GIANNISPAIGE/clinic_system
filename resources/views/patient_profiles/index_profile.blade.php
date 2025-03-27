@extends('components.patient')

@section('content')
<div class="max-w-4xl mx-auto bg-green-50 p-8 rounded-lg shadow-lg relative">
    <h1 class="text-3xl font-semibold text-green-700 mb-6 text-left">My Profile</h1>

    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-3 rounded-md mb-6 text-center">
            {{ session('success') }}
        </div>
    @endif

    {{-- Profile Image: Top Right --}}
    @if($patient_profiles->image)
        <div class="absolute top-4 right-4 flex flex-col items-end">
            <img src="{{ asset('storage/' . $patient_profiles->image) }}" 
                 alt="Profile Image" 
                 class="w-40 h-40 object-cover rounded-full shadow-lg border-4 border-green-400">
        </div>
    @endif

    {{-- Profile Information --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="md:col-span-3 space-y-4 bg-white p-6 rounded-lg shadow-md">
            <div class="grid grid-cols-1 gap-4">
                <div class="bg-gray-100 p-4 rounded-md shadow">
                    <p class="text-green-700 font-semibold">First Name</p>
                    <p>{{ $patient_profiles->firstname }}</p>
                </div>
                <div class="bg-gray-100 p-4 rounded-md shadow">
                    <p class="text-green-700 font-semibold">Last Name</p>
                    <p>{{ $patient_profiles->lastname }}</p>
                </div>
                <div class="bg-gray-100 p-4 rounded-md shadow">
                    <p class="text-green-700 font-semibold">Birthdate</p>
                    <p>{{ $patient_profiles->birthdate }}</p>
                </div>
                <div class="bg-gray-100 p-4 rounded-md shadow">
                    <p class="text-green-700 font-semibold">Email</p>
                    <p>{{ $patient_profiles->email }}</p>
                </div>
                <div class="bg-gray-100 p-4 rounded-md shadow">
                    <p class="text-green-700 font-semibold">Number</p>
                    <p>{{ $patient_profiles->number }}</p>
                </div>
                <div class="bg-gray-100 p-4 rounded-md shadow">
                    <p class="text-green-700 font-semibold">Impairments</p>
                    <p>{{ $patient_profiles->impairments }}</p>
                </div>
                <div class="bg-gray-100 p-4 rounded-md shadow">
                    <p class="text-green-700 font-semibold">Barangay</p>
                    <p>{{ $patient_profiles->brgy }}</p>
                </div>
                <div class="bg-gray-100 p-4 rounded-md shadow">
                    <p class="text-green-700 font-semibold">Municipality</p>
                    <p>{{ $patient_profiles->municipality }}</p>
                </div>
                <div class="bg-gray-100 p-4 rounded-md shadow">
                    <p class="text-green-700 font-semibold">Province</p>
                    <p>{{ $patient_profiles->province }}</p>
                </div>
            </div>
        </div>
    </div>

    {{-- Edit Button --}}
    <div class="text-right mt-8">
        <a href="{{ route('patient_profiles.edit') }}" 
           class="px-5 py-2.5 bg-green-600 text-white rounded-lg hover:bg-green-700 transition shadow-md">
            Edit Profile
        </a>
    </div>
</div>
@endsection
