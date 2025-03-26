@extends('components.admin')

@section('content')
<!-- Heading and Search Bar in the Same Row -->
<div class="flex justify-between items-center mb-6">
     <h2 class="text-2xl font-bold">Appointment Lists</h2>
    <input type="text" id="searchInput" placeholder="Search by name, month, or time" class="border p-2 rounded-lg shadow-sm w-1/2">
</div>

@if(session('success'))
    <div class="bg-green-100 text-green-700 font-medium text-center py-3 px-4 rounded-md mb-4">
        {{ session('success') }}
    </div>
@endif

<div class="flex justify-end mb-6">
    <a href="{{ route('appointments.create') }}" class="bg-blue-600 text-white px-5 py-2 rounded-lg shadow-md hover:bg-blue-700 transition duration-200">
        Add Appointment
    </a>
</div>

<div class="overflow-x-auto">
    <table class="w-full border-collapse border border-gray-300 shadow-md rounded-lg min-w-[900px]" id="appointmentsTable">
        <thead class="bg-gray-200 text-gray-700">
            <tr class="text-left">
                <th class="p-4 border">ID</th>
                <th class="p-4 border">Patient Name</th>
                <th class="p-4 border">Appointment Time</th>
                <th class="p-4 border text-center">Status</th>
                <th class="p-4 border text-center">Actions</th>
                <th class="p-4 border text-center">Delete</th>
            </tr>
        </thead>
        <tbody class="bg-white">
            @foreach($appointments as $index => $appointment)
                <tr class="border hover:bg-gray-50 transition">
                    <td class="p-4 border text-center font-semibold">{{ $index + 1 }}</td>
                    <td class="p-4 border patient-name">{{ $appointment->patient->firstname }} {{ $appointment->patient->lastname }}</td>
                    <td class="p-4 border appointment-time" data-full-date="{{ $appointment->appointment_time }}">
                        {{ \Carbon\Carbon::parse($appointment->appointment_time)->format('F j, Y h:i A') }}
                    </td>
                    <td class="p-4 border text-center font-semibold">
                        @php
                            $statusColors = [
                                'pending' => 'text-yellow-600 bg-yellow-100 px-3 py-1 rounded-full',
                                'canceled' => 'text-red-600 bg-red-100 px-3 py-1 rounded-full',
                                'completed' => 'text-green-600 bg-green-100 px-3 py-1 rounded-full',
                                'rescheduled' => 'text-blue-600 bg-blue-100 px-3 py-1 rounded-full',
                                'unknown' => 'text-gray-600 bg-gray-100 px-3 py-1 rounded-full'
                            ];
                        @endphp
                        <span class="{{ $statusColors[$appointment->status] ?? 'text-gray-600 bg-gray-100 px-3 py-1 rounded-full' }}">
                            {{ ucfirst($appointment->status) }}
                        </span>
                    </td>
                    <td class="p-4 border text-center">
                        <div class="flex flex-wrap gap-2 justify-center">
                            @if($appointment->status == 'pending' || $appointment->status == 'rescheduled')
                                <form action="{{ route('appointments.cancel', $appointment->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <button class="bg-red-500 text-white px-4 py-2 rounded-lg shadow-md hover:bg-red-600 transition duration-200">
                                        Cancel
                                    </button>
                                </form>
                                <form action="{{ route('appointments.complete', $appointment->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <button class="bg-green-500 text-white px-4 py-2 rounded-lg shadow-md hover:bg-green-600 transition duration-200">
                                        Complete
                                    </button>
                                </form>
                            @endif
                            @if($appointment->status == 'pending' || $appointment->status == 'rescheduled')
                                <button onclick="toggleReschedule({{ $appointment->id }})" class="bg-blue-500 text-white px-4 py-2 rounded-lg shadow-md hover:bg-blue-600 transition duration-200">
                                    Reschedule
                                </button>
                            @endif
                        </div>
                        <form id="rescheduleForm-{{ $appointment->id }}" action="{{ route('appointments.reschedule', $appointment->id) }}" method="POST" class="hidden mt-3 text-center">
                            @csrf
                            @method('PUT')
                            <div class="flex flex-col sm:flex-row items-center gap-3">
                                <input type="datetime-local" name="appointment_time" required class="border p-2 rounded-md shadow-sm">
                                <button class="bg-blue-600 text-white px-4 py-2 rounded-lg shadow-md hover:bg-blue-700 transition duration-200">
                                    Confirm
                                </button>
                            </div>
                        </form>
                    </td>
                    <td class="p-4 border text-center">
                        <form action="{{ route('appointments.destroy', $appointment->id) }}" method="POST" onsubmit="return confirmDelete()">
                            @csrf
                            @method('DELETE')
                            <button class="text-red-600 hover:text-red-800 transition duration-200">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash">
                                    <polyline points="3 6 5 6 21 6"></polyline>
                                    <path d="M19 6l-2 14H7L5 6h14zm-9 3v6m4-6v6"></path>
                                </svg>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script>
    document.getElementById('searchInput').addEventListener('keyup', function () {
        let filter = this.value.toLowerCase();
        let rows = document.querySelectorAll('#appointmentsTable tbody tr');

        rows.forEach(row => {
            let name = row.querySelector('.patient-name').textContent.toLowerCase();
            let time = row.querySelector('.appointment-time').textContent.toLowerCase();
            let fullDate = row.querySelector('.appointment-time').getAttribute('data-full-date').toLowerCase();

            if (name.includes(filter) || time.includes(filter) || fullDate.includes(filter)) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    });
</script>
@endsection
