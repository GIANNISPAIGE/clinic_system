@extends('components.admin')

@section('title', 'Patient Sessions')

@section('content')
    <div class="container mx-auto mt-4 p-4">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-xl font-semibold">Patient Sessions</h2>
            <div>
                <button id="toggle-view" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">Switch to Calendar</button>
                <a href="{{ route('patient_sessions.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Add Session</a>
            </div>
        </div>

        <!-- Table View -->
        <div id="table-view">
            <div class="overflow-x-auto">
                <table class="w-full border border-gray-300">
                    <thead class="bg-gray-700 text-white">
                        <tr>
                            <th class="p-2 border">ID</th>
                            <th class="p-2 border">Patient Name</th>
                            <th class="p-2 border">Start Date & Time</th>
                            <th class="p-2 border">End Date</th>
                            <th class="p-2 border">Status</th>
                            <th class="p-2 border">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($sessions as $index => $session)
                            <tr class="border-b hover:bg-gray-100">
                                <td class="p-2 border">{{ $index + 1 }}</td>
                                <td class="p-2 border">{{ $session->patient->firstname }} {{ $session->patient->lastname }}</td>
                                <td class="p-2 border">{{ \Carbon\Carbon::parse($session->session_start_date)->format('Y-m-d H:i:s') }}</td>
                                <td class="p-2 border">{{ $session->session_end_date ? \Carbon\Carbon::parse($session->session_end_date)->format('Y-m-d') : 'N/A' }}</td>
                                <td class="p-2 border">{{ $session->session_status }}</td>
                                <td class="p-2 border flex gap-2">
                                    <a href="{{ route('patient_sessions.edit', $session->id) }}" class="bg-yellow-500 text-white px-3 py-1 rounded text-sm hover:bg-yellow-600">Edit</a>
                                    <form action="{{ route('patient_sessions.destroy', $session->id) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded text-sm hover:bg-red-600">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Calendar View (Initially Hidden) -->
        <div id="calendar-view" class="hidden">
            <div id="calendar"></div>
        </div>
    </div>

    <!-- FullCalendar Script -->
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let calendarEl = document.getElementById('calendar');
            let calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                events: '{{ route('patient_sessions.calendar') }}',
                eventClick: function(info) {
                    window.location.href = info.event.url;
                }
            });

            // Toggle between Table and Calendar View
            let toggleButton = document.getElementById('toggle-view');
            let tableView = document.getElementById('table-view');
            let calendarView = document.getElementById('calendar-view');

            toggleButton.addEventListener('click', function() {
                if (tableView.classList.contains('hidden')) {
                    tableView.classList.remove('hidden');
                    calendarView.classList.add('hidden');
                    toggleButton.innerText = 'Switch to Calendar';
                } else {
                    tableView.classList.add('hidden');
                    calendarView.classList.remove('hidden');
                    toggleButton.innerText = 'Switch to Table';
                    calendar.render();
                }
            });
        });
    </script>
@endsection
