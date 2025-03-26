@extends('components.admin')

@section('title', 'Edit Patient Session')

@section('content')
    <div class="container mx-auto mt-4 p-4">
        <h2 class="text-xl font-semibold mb-4">Edit Patient Session</h2>
        
        <form action="{{ route('patient_sessions.update', $patientSession->id) }}" method="POST" class="bg-white p-6 rounded-lg shadow-md">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="session_start_date" class="block text-sm font-medium text-gray-700">Start Date & Time</label>
                <input type="datetime-local" name="session_start_date" id="session_start_date" class="w-full p-2 border border-gray-300 rounded" value="{{ \Carbon\Carbon::parse($patientSession->session_start_date)->format('Y-m-d\TH:i') }}" required>
            </div>

            <div class="mb-4">
                <label for="session_end_date" class="block text-sm font-medium text-gray-700">End Date (Optional)</label>
                <input type="date" name="session_end_date" id="session_end_date" class="w-full p-2 border border-gray-300 rounded" value="{{ $patientSession->session_end_date ? \Carbon\Carbon::parse($patientSession->session_end_date)->format('Y-m-d') : '' }}">
            </div>

            <div class="mb-4">
                <label for="session_status" class="block text-sm font-medium text-gray-700">Status</label>
                <select name="session_status" id="session_status" class="w-full p-2 border border-gray-300 rounded" required>
                    <option value="Scheduled" {{ $patientSession->session_status == 'Scheduled' ? 'selected' : '' }}>Scheduled</option>
                    <option value="Ongoing" {{ $patientSession->session_status == 'Ongoing' ? 'selected' : '' }}>Ongoing</option>
                    <option value="Completed" {{ $patientSession->session_status == 'Completed' ? 'selected' : '' }}>Completed</option>
                </select>
            </div>

            <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">Update</button>
        </form>
    </div>
@endsection
