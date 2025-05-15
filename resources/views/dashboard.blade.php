<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body class="bg-gray-100 min-h-screen">

    <div class="max-w-7xl mx-auto px-4 py-6">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold">Dashboard</h1>

            {{-- Logout Button (POST form) --}}
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                    class="bg-red-600 hover:bg-red-700 text-white font-semibold px-3 py-2 rounded shadow">
                    Logout
                </button>
            </form>
        </div>

        {{-- Summary Cards --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4 mb-8">
            @foreach ($summaryData as $item)
                <div class="p-4 rounded-xl text-white shadow {{ $item['color'] }}">
                    <div class="text-sm uppercase tracking-wider">{{ $item['title'] }}</div>
                    <div class="text-2xl font-bold mt-1">{{ $item['value'] }}</div>
                </div>
            @endforeach
        </div>

        {{-- Chart Area --}}
        <div class="bg-white p-6 rounded-xl shadow">
            <h2 class="text-xl font-semibold mb-4">Statistik Bulanan (Dummy)</h2>
            <canvas id="chart" height="100"></canvas>
        </div>
    </div>

    <script>
        const ctx = document.getElementById('chart').getContext('2d');
        const chart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: {!! json_encode(array_column($chartData, 'name')) !!},
                datasets: [{
                    label: 'Data',
                    data: {!! json_encode(array_column($chartData, 'value')) !!},
                    borderColor: 'rgba(59, 130, 246, 1)',
                    backgroundColor: 'rgba(59, 130, 246, 0.2)',
                    tension: 0.3,
                    fill: true,
                    pointRadius: 4,
                    pointHoverRadius: 6,
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: { display: false }
                },
                scales: {
                    y: { beginAtZero: true }
                }
            }
        });
    </script>

</body>
</html>
