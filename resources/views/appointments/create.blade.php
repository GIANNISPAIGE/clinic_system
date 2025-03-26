@extends('components.admin')

@section('content')
<div class="max-w-lg mx-auto bg-white p-8 rounded-lg shadow-lg">
    <h2 class="text-3xl font-semibold text-center text-pink-600 mb-6">
        🗓️ Schedule an Appointment
    </h2>

    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-3 rounded-md text-center mb-6">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('appointments.store') }}" method="POST" class="space-y-4">
        @csrf
        
        <!-- Patient Selection -->
        <div>
            <label class="block text-gray-800 text-sm font-semibold mb-2">
                Select Patient (New in Last 7 Days)
            </label>
            <select name="patient_id" class="border border-gray-300 w-full p-3 rounded-lg focus:ring-2 focus:ring-pink-400 focus:border-pink-500 transition" required>
                <option value="" disabled selected>Select a patient</option>
                @foreach($patients as $patient)
                    <option value="{{ $patient->id }}">
                        {{ $patient->firstname }} {{ $patient->lastname }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Appointment Time -->
        <div>
            <label class="block text-gray-800 text-sm font-semibold mb-2">
                Select Date & Time
            </label>
            <input type="datetime-local" name="appointment_time" 
                class="border border-gray-300 w-full p-3 rounded-lg focus:ring-2 focus:ring-pink-400 focus:border-pink-500 transition" required>
        </div>

        <!-- Buttons -->
        <div class="flex gap-3">
            <button type="submit" 
                class="bg-pink-500 text-white py-3 px-6 rounded-lg w-full font-semibold hover:bg-pink-600 transition-all duration-200 shadow-md">
                ✅ Book Appointment
            </button>
            <a href="{{ route('appointments.index') }}" 
                class="bg-gray-400 text-white py-3 px-6 rounded-lg w-full text-center font-semibold hover:bg-gray-500 transition-all duration-200 shadow-md">
                Cancel
            </a>
        </div>
    </form>
</div>
@endsection
