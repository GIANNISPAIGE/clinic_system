@extends('components.admin')

@section('title', 'New Patient List (Last 1 Month)')

@section('content')
    <div class="bg-white p-6 rounded shadow-md">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-2xl font-bold">New Patients (Last 1 Week)</h2>
            
            <a href="{{ route('patients.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition">
                Add Patient
            </a>
        </div>

        @if(session('success'))
            <div class="text-green-600 mt-4 p-2 bg-green-100 border border-green-400 rounded">
                {{ session('success') }}
            </div>
        @endif

        <div class="overflow-x-auto">
            <table class="w-full border-collapse border border-gray-400 rounded-lg shadow-sm">
                <thead>
                    <tr class="bg-gray-300 text-gray-700">
                        <th class="border p-3">ID</th>
                        <th class="border p-3">Name</th>
                        <th class="border p-3">Impairments</th>
                        <th class="border p-3">Email</th>
                   
                        <th class="border p-3">Address</th>
                        <th class="border p-3">Number</th>
                        <th class="border p-3">Date Added</th>
                        <th class="border p-3">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($newPatients as $index => $patient)
                        <tr class="text-center bg-white hover:bg-gray-100 transition">
                            <td class="border p-3">{{ $loop->iteration }}</td>
                            <td class="border p-3">{{ $patient->firstname }} {{ $patient->lastname }}</td>
                            <td class="border p-3">{{ $patient->impairments }}</td>
                            <td class="border p-3">{{ $patient->email }}</td>
                            <td class="border p-3">{{ $patient->address }}</td>
                            <td class="border p-3">{{ $patient->number }}</td>
                            <td class="border p-3">{{ $patient->created_at->format('M d, Y') }}</td>
                            <td class="border p-3 flex justify-center space-x-4">
                                <!-- View Button -->
                               
                                <!-- Edit Button -->
                                <a href="{{ route('patients.edit', $patient->id) }}" 
                                    class="text-yellow-500 hover:text-yellow-700 transition">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <path d="M12 20h9" />
                                        <path d="M16.5 3.5a2.121 2.121 0 11-3 3L4 17v3h3l9.5-9.5a2.121 2.121 0 010-3z" />
                                    </svg>
                                </a>

                                <!-- Delete Button -->
                                <form action="{{ route('patients.destroy', $patient->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this patient?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-700 transition">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <path d="M3 6h18" />
                                            <path d="M10 11v6" />
                                            <path d="M14 11v6" />
                                            <path d="M5 6l1 14h12l1-14" />
                                            <path d="M9 6V4a1 1 0 011-1h4a1 1 0 011 1v2" />
                                        </svg>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
