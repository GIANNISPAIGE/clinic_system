@extends('components.admin')

@section('title', 'Homes')

@section('content')
<div class="container mx-auto mt-8">
    <h2 class="text-3xl font-bold text-center mb-6 text-gray-800">📊 Patient Address Distribution</h2>

    <div class="bg-white p-6 rounded-lg shadow-lg border border-gray-200">
        <canvas id="addressChart"></canvas>
    </div>

    @if($addresses->isEmpty())
    <div class="text-center text-gray-500 mt-4">
        <p>🚫 No addresses found in the database.</p>
    </div>
    @endif
</div>

<!-- Chart.js Script -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const ctx = document.getElementById('addressChart').getContext('2d');
        const addressData = @json($addresses);

        const labels = Object.keys(addressData);
        const data = Object.values(addressData);

        const gradient = ctx.createLinearGradient(0, 0, 0, 400);
        gradient.addColorStop(0, 'rgba(54, 162, 235, 0.8)');
        gradient.addColorStop(1, 'rgba(75, 192, 192, 0.4)');

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Number of Patients',
                    data: data,
                    backgroundColor: gradient,
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1,
                    borderRadius: 10, // Rounded corners
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    },
                    tooltip: {
                        backgroundColor: '#333',
                        titleFont: { size: 14 },
                        bodyFont: { size: 12 },
                        padding: 10
                    }
                },
                scales: {
                    x: {
                        ticks: { color: "#555", font: { size: 12 } },
                        grid: { display: false }
                    },
                    y: {
                        beginAtZero: true,
                        ticks: { stepSize: 1, color: "#555", font: { size: 12 } },
                        grid: { color: "#ddd" }
                    }
                }
            }
        });
    });
</script>
@endsection



patient index  p




@extends('components.layouts')

@section('title', 'Patient List')

@section('content')
<div class="bg-white p-6 rounded shadow-md">
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-2xl font-bold">Patient List</h2>
    </div>

    @if(session('success'))
        <div class="text-green-600 mt-4 p-2 bg-green-100 border border-green-400 rounded">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-x-auto">
        <table class="w-full border-collapse border border-gray-300 rounded-lg shadow-sm">
            <thead>
                <tr class="bg-gray-200 text-gray-700">
                    <th class="border p-3">ID</th>
                    <th class="border p-3">Name</th>
                    <th class="border p-3">Birthdate</th>
                    <th class="border p-3">Address</th>
                    <th class="border p-3">Email</th>
                    <th class="border p-3">Number</th>
                    <th class="border p-3">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($patients as $index => $patient)
                    <tr class="text-center bg-white hover:bg-gray-100 transition">
                        <td class="border p-3">{{ $loop->iteration }}</td>
                        <td class="border p-3">{{ $patient->firstname }} {{ $patient->lastname }}</td>
                        <td class="border p-3">{{ $patient->birthdate }}</td>
                        <td class="border p-3">{{ $patient->address }}</td>
                        <td class="border p-3">{{ $patient->email }}</td>
                        <td class="border p-3">{{ $patient->number }}</td>
                        <td class="border p-3 space-x-2">
                            <a href="{{ route('patients.edit', $patient) }}" class="text-blue-500 hover:underline">Edit</a>
                            <form action="{{ route('patients.destroy', $patient) }}" method="POST" class="inline">
                                @csrf @method('DELETE')
                                <button type="submit" class="text-red-500 hover:underline">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="flex justify-end mt-4">
        <a href="{{ route('patients.download') }}" 
           class="bg-red-500 text-white px-4 py-2 rounded-lg shadow-md hover:bg-red-600 transition">
           📄 Download PDF
        </a>
    </div>
</div>
@endsection
