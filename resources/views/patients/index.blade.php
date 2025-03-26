@extends('components.admin')

@section('title', 'Patient List')

@section('content')
<div class="bg-white p-6 rounded-lg shadow-lg">
    <div class="flex justify-between items-center mb-6">
         <h2 class="text-2xl font-bold"> Patient List</h2>
        <input type="text" id="searchInput" placeholder="Search patient..." 
               class="border border-gray-300 p-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
    </div>

    @if(session('success'))
        <div class="text-green-600 mt-4 p-3 bg-green-100 border border-green-400 rounded-lg shadow-sm">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-hidden rounded-lg shadow-lg">
        <table class="w-full border-collapse border border-gray-300 rounded-lg">
            <thead>
                <tr class="bg-blue-500 text-white">
                    <th class="border p-4 text-left">ID</th>
                    <th class="border p-4 text-left">Name</th>
                    <th class="border p-4 text-center">Actions</th>
                </tr>
            </thead>
            <tbody id="patientTable" class="bg-white divide-y divide-gray-200">
                @foreach ($patients as $index => $patient)
                    <tr class="hover:bg-gray-100 transition">
                        <td class="border p-4 text-gray-700 font-semibold">{{ $loop->iteration }}</td>
                        <td class="border p-4 patient-name">
                            <a href="{{ route('patients.show', $patient) }}" class="text-black font-medium hover:underline">
                                {{ $patient->firstname }} {{ $patient->lastname }}
                            </a>
                        </td>
                        <td class="border p-4 text-center space-x-3">
                            <a href="{{ route('patients.edit', $patient) }}" class="text-green-500 hover:opacity-75">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 inline" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M17.414 2.586a2 2 0 00-2.828 0L4 13.172V16h2.828l10.586-10.586a2 2 0 000-2.828zM14 4l2 2-9.172 9.172H5v-2.828L14 4z" />
                                </svg>
                            </a>
                            <form action="{{ route('patients.destroy', $patient) }}" method="POST" class="inline">
                                @csrf @method('DELETE')
                                <button type="submit" class="text-red-500 hover:opacity-75">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 inline" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M6 8a1 1 0 011-1h6a1 1 0 011 1v7a1 1 0 01-1 1H7a1 1 0 01-1-1V8zm3-5a1 1 0 011 1h2a1 1 0 011-1h3a1 1 0 110 2H4a1 1 0 110-2h3z" clip-rule="evenodd" />
                                    </svg>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="flex justify-end mt-6">
        <a href="{{ route('patients.download') }}" 
           class="bg-red-600 text-white px-5 py-2.5 rounded-lg shadow-md hover:bg-red-700 transition font-semibold">
           📄 Download PDF
        </a>
    </div>
</div>

<script>
    document.getElementById('searchInput').addEventListener('keyup', function () {
        let filter = this.value.toLowerCase();
        let rows = document.querySelectorAll('#patientTable tr');
        
        rows.forEach(row => {
            let name = row.querySelector('.patient-name').textContent.toLowerCase();
            row.style.display = name.includes(filter) ? '' : 'none';
        });
    });
</script>
@endsection
