@extends('components.admin')

@section('content')
<div class="container">
    <h2   class="text-2xl font-bold">Patient Session Analytics</h2>

    <!-- Filter Selection -->
    <form method="GET" class="mb-3">
        <label for="filter" class="font-semibold">Select View:</label>
        <select name="filter" id="filter" class="form-control w-25 p-2 border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200" onchange="this.form.submit()">
            <option value="monthly" {{ $filter == 'monthly' ? 'selected' : '' }}>Monthly</option>
            <option value="yearly" {{ $filter == 'yearly' ? 'selected' : '' }}>Yearly</option>
        </select>
    </form>

    <canvas id="sessionChart"></canvas>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    var ctx = document.getElementById('sessionChart').getContext('2d');

    var labels = {!! json_encode($data->pluck($filter == 'yearly' ? 'year' : 'month')) !!};
    var dataValues = {!! json_encode($data->pluck('total')) !!};

    // Define 12 distinct colors for months
    var backgroundColors = [
        'rgba(255, 99, 132, 0.6)',  // Red
        'rgba(54, 162, 235, 0.6)',  // Blue
        'rgba(255, 206, 86, 0.6)',  // Yellow
        'rgba(75, 192, 192, 0.6)',  // Teal
        'rgba(153, 102, 255, 0.6)', // Purple
        'rgba(255, 159, 64, 0.6)',  // Orange
        'rgba(231, 76, 60, 0.6)',   // Dark Red
        'rgba(46, 204, 113, 0.6)',  // Green
        'rgba(52, 152, 219, 0.6)',  // Sky Blue
        'rgba(241, 196, 15, 0.6)',  // Gold
        'rgba(230, 126, 34, 0.6)',  // Dark Orange
        'rgba(155, 89, 182, 0.6)'   // Dark Purple
    ];

    var borderColors = [
        'rgba(255, 99, 132, 1)',
        'rgba(54, 162, 235, 1)',
        'rgba(255, 206, 86, 1)',
        'rgba(75, 192, 192, 1)',
        'rgba(153, 102, 255, 1)',
        'rgba(255, 159, 64, 1)',
        'rgba(231, 76, 60, 1)',
        'rgba(46, 204, 113, 1)',
        'rgba(52, 152, 219, 1)',
        'rgba(241, 196, 15, 1)',
        'rgba(230, 126, 34, 1)',
        'rgba(155, 89, 182, 1)'
    ];

    var colors = labels.map((_, i) => backgroundColors[i % 12]);
    var borderColorsSet = labels.map((_, i) => borderColors[i % 12]);

    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: 'Sessions',
                data: dataValues,
                backgroundColor: colors,
                borderColor: borderColorsSet,
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
