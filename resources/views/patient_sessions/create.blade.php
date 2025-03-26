@extends('components.admin')

@section('title', 'Add Patient Session')

@section('content')
    <div class="container mx-auto mt-4 p-4">
        <h2 class="text-xl font-semibold mb-4">Add Patient Session</h2>
        
        <form action="{{ route('patient_sessions.store') }}" method="POST" class="bg-white p-6 rounded-lg shadow-md">
            @csrf

            <div class="mb-4">
                <label for="patient_id" class="block text-sm font-medium text-gray-700">Patient</label>
                <select name="patient_id" id="patient_id" class="border w-full p-2 rounded focus:ring-2 focus:ring-pink-400" required>
                    <option value="" disabled selected>Select a patient (Registered within 1 week)</option>
                    @foreach($patients as $patient)
                        <option value="{{ $patient->id }}" {{ old('patient_id') == $patient->id ? 'selected' : '' }}>
                            {{ $patient->firstname }} {{ $patient->lastname }}
                        </option>
                    @endforeach
                </select>
                @error('patient_id')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="session_start_date" class="block text-sm font-medium text-gray-700">Start Date & Time</label>
                <input type="datetime-local" name="session_start_date" id="session_start_date" class="w-full p-2 border border-gray-300 rounded" required value="{{ old('session_start_date') }}">
                @error('session_start_date')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="session_end_date" class="block text-sm font-medium text-gray-700">End Date (Optional)</label>
                <input type="date" name="session_end_date" id="session_end_date" class="w-full p-2 border border-gray-300 rounded" value="{{ old('session_end_date') }}">
                @error('session_end_date')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="session_status" class="block text-sm font-medium text-gray-700">Status</label>
                <select name="session_status" id="session_status" class="w-full p-2 border border-gray-300 rounded" required>
                    <option value="Scheduled" {{ old('session_status') == 'Scheduled' ? 'selected' : '' }}>Scheduled</option>
                    <option value="Ongoing" {{ old('session_status') == 'Ongoing' ? 'selected' : '' }}>Ongoing</option>
                    <option value="Completed" {{ old('session_status') == 'Completed' ? 'selected' : '' }}>Completed</option>
                </select>
                @error('session_status')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex justify-end space-x-4">
                <a href="{{ route('patient_sessions.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-600 transition-all">
                    Cancel
                </a>
                <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600 transition-all">
                    Save Session
                </button>
            </div>
        </form>
    </div>

    <script>
        document.getElementById('session_start_date').addEventListener('change', function() {
            let startDate = new Date(this.value);
            startDate.setHours(startDate.getHours() + 1);
            document.getElementById('session_end_date').value = startDate.toISOString().split('T')[0];
        });
    </script>
@endsection