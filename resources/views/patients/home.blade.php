@extends('components.admin')

@section('content')
<div class="container mx-auto p-6 bg-white shadow-md rounded-lg">
    <h2 class="text-3xl font-bold text-gray-800 mb-4">Patient Session Analytics</h2>

    <!-- Filter Selection -->
    <form method="GET" class="mb-6 flex items-center space-x-3">
        <label for="filter" class="text-lg font-medium text-gray-700">Select View:</label>
        <select name="filter" id="filter" class="p-2 border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-300" onchange="this.form.submit()">
            <option value="monthly" {{ $filter == 'monthly' ? 'selected' : '' }}>Monthly</option>
            <option value="yearly" {{ $filter == 'yearly' ? 'selected' : '' }}>Yearly</option>
        </select>
    </form>

    <div class="bg-gray-50 p-4 rounded-lg shadow">
        <canvas id="sessionChart"></canvas>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    var ctx = document.getElementById('sessionChart').getContext('2d');

    var labels = {!! json_encode($data->pluck($filter == 'yearly' ? 'year' : 'month')) !!};
    var dataValues = {!! json_encode($data->pluck('total')) !!};

    var colors = [
        'rgba(255, 99, 180, 0.6)', 'rgba(54, 162, 235, 0.6)',
        'rgba(255, 206, 86, 0.6)', 'rgba(75, 192, 192, 0.6)',
        'rgba(153, 102, 255, 0.6)', 'rgba(255, 159, 64, 0.6)'
    ];

    var borderColors = colors.map(color => color.replace('0.6', '1'));

    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: 'Sessions',
                data: dataValues,
                backgroundColor: colors,
                borderColor: borderColors,
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: { beginAtZero: true }
            }
        }
    });
});
</script>
@endsection
