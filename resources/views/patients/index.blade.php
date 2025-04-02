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
                        <td class="border p-4 text-center space-x-3 flex justify-center items-center">
                            <a href="{{ route('patients.edit', $patient) }}" class="text-green-500 hover:opacity-75" title="Edit">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M4 20h16v2H4v-2zm16.728-13.555l-2.173-2.173a2 2 0 0 0-2.83 0l-8.719 8.719a2 2 0 0 0-.492.855L6 17.82V20h2.18l1.975-.515a2 2 0 0 0 .855-.492l8.719-8.719a2 2 0 0 0 0-2.83zM15 5.585l3.415 3.415-1.414 1.414L13.586 7l1.414-1.415z"/>
                                </svg>
                            </a>
                            <form action="{{ route('patients.destroy', $patient) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this patient?');">
                                @csrf @method('DELETE')
                                <button type="submit" class="text-red-500 hover:opacity-75" title="Delete">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 24 24" fill="currentColor">
                                        <path d="M9 3V4H4V6h16V4h-5V3h-6zm-4 6v12c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V9H5zm4 3h2v7H9v-7zm4 0h2v7h-2v-7z"/>
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