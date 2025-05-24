<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body class="bg-gradient-to-tr from-slate-100 via-slate-200 to-slate-300 min-h-screen">
<div class="flex">
    {{-- Sidebar --}}
    <div class="w-64 bg-white shadow-md h-screen fixed top-0 left-0 z-10">
        <div class="px-6 py-4 text-xl font-bold text-gray-700 border-b">SISFO SARPRAS</div>
        <nav class="px-4 py-4 space-y-2">
            <a href="{{ route('dashboard') }}" class="block px-4 py-2 rounded bg-blue-200 font-bold">Dashboard</a>
            <a href="{{ route('barang.index') }}" class="block px-4 py-2 rounded hover:bg-blue-100">Kelola Barang</a>
            <a href="{{ route('kategori.index') }}" class="block px-4 py-2 rounded hover:bg-blue-100">Kelola Kategori</a>
            <a href="{{ route('peminjaman.index') }}" class="block px-4 py-2 rounded hover:bg-blue-200">Kelola Peminjaman</a>
            <a href="{{ route('detail-pengembalian.index') }}" class="block px-4 py-2 rounded hover:bg-blue-200">Kelola Pengembalian</a>
            <a href="{{ route('users.index') }}" class="block px-4 py-2 rounded hover:bg-blue-100">Kelola User</a>
            <a href="{{ route('laporan.index') }}" class="block px-4 py-2 rounded hover:bg-blue-200">Laporan</a>
            <form action="{{ route('logout') }}" method="POST" class="mt-4">
                @csrf
                <button type="submit" class="w-full text-left px-4 py-2 rounded hover:bg-red-100 text-red-600 font-semibold">Logout</button>
            </form>
        </nav>
    </div>

    <div class="ml-64 w-full p-6">
        <h1 class="text-3xl font-bold text-gray-800 mb-6">Dashboard</h1>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4 mb-8">
            @foreach ($summaryData as $item)
                <div class="p-4 rounded-2xl text-white shadow-md transform hover:scale-105 transition {{ $item['color'] }}">
                    <div class="text-sm uppercase tracking-wider opacity-80">{{ $item['title'] }}</div>
                    <div class="text-2xl font-bold mt-1">{{ $item['value'] }}</div>
                </div>
            @endforeach
        </div>

        <div class="bg-white p-6 rounded-2xl shadow-md">
            <h2 class="text-xl font-semibold mb-4 text-gray-700">Statistik Bulanan (Dummy)</h2>
            <canvas id="chart" height="100"></canvas>
        </div>
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
