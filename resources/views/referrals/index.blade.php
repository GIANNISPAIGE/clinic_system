@extends('components.admin')

@section('content')
<div class="container mx-auto px-6 py-8">
    <!-- Header Section -->
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-3xl font-bold text-gray-800">📋 Referrals</h2>

        <!-- Search Input -->
        <div class="relative">
            <input type="text" id="searchInput" placeholder="Search Engine..." 
                class="p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
        </div>

        <a href="{{ route('referrals.create') }}" class="bg-gradient-to-r from-blue-500 to-blue-700 hover:from-blue-600 hover:to-blue-800 text-white px-5 py-2 rounded-lg shadow-md transition-transform transform hover:scale-105">
            ➕ Add Referral
        </a>
    </div>

    <!-- Table Section -->
    <div class="overflow-x-auto bg-white shadow-xl rounded-lg border border-gray-300">
        <table class="w-full border-collapse">
            <thead>
                <tr class="bg-blue-600 text-white">
                    <th class="p-4 text-left">#</th>
                    <th class="p-4 text-left">Full Name</th>
                    <th class="p-4 text-left">Address</th>
                    <th class="p-4 text-left">Age</th>
                    <th class="p-4 text-left">Sex</th>
                    <th class="p-4 text-left">Date</th>
                    <th class="p-4 text-left">Instruction</th>
                    <th class="p-4 text-left">Source Clinic</th>
                    <th class="p-4 text-left">Doctor</th>
                    <th class="p-4 text-center">Actions</th>
                </tr>
            </thead>
            <tbody id="referralsTable" class="divide-y divide-gray-200">
                @foreach ($referrals as $index => $referral)
                    <tr class="bg-gray-50 hover:bg-gray-100 transition-colors">
                        <td class="p-4 font-semibold text-gray-700">{{ $index + 1 }}</td>
                        <td class="p-4 referral-name">{{ $referral->full_name }}</td>
                        <td class="p-4">{{ $referral->address }}</td>
                        <td class="p-4">{{ $referral->age }}</td>
                        <td class="p-4">{{ $referral->sex }}</td>
                        <td class="p-4">{{ $referral->date }}</td>
                        <td class="p-4 truncate max-w-xs text-gray-600" title="{{ $referral->instruction }}">
                            {{ Str::limit($referral->instruction, 50) }}
                        </td>
                        <td class="p-4">{{ $referral->source_clinic }}</td>
                        <td class="p-4">{{ $referral->doctor }}</td>
                        <td class="p-4 text-center">
                            <a href="{{ route('referrals.edit', $referral) }}" class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded-lg shadow-md transition-transform transform hover:scale-105">
                                ✏️ Edit
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- JavaScript for Client-side Search -->
<script>
    document.getElementById('searchInput').addEventListener('input', function () {
        let searchValue = this.value.toLowerCase();
        let rows = document.querySelectorAll('#referralsTable tr');

        rows.forEach(row => {
            let name = row.querySelector('.referral-name').textContent.toLowerCase();
            row.style.display = name.includes(searchValue) ? '' : 'none';
        });
    });
</script>
@endsection
