<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan</title>
    <script src="https://cdn.tailwindcss.com "></script>
</head>
<body class="bg-gradient-to-tr from-slate-100 via-slate-200 to-slate-300 min-h-screen">

<div class="flex">
    {{-- Sidebar --}}
    <div class="w-64 bg-white shadow-md h-screen fixed top-0 left-0 z-10">
        <div class="px-6 py-4 text-xl font-bold text-gray-700 border-b">SISFO SARPRAS</div>
        <nav class="px-4 py-4 space-y-2">
            <a href="{{ route('dashboard') }}" class="block px-4 py-2 rounded hover:bg-blue-100">Dashboard</a>
            <a href="{{ route('barang.index') }}" class="block px-4 py-2 rounded hover:bg-blue-100">Kelola Barang</a>
            <a href="{{ route('kategori.index') }}" class="block px-4 py-2 rounded hover:bg-blue-100">Kelola Kategori</a>
            <a href="{{ route('peminjaman.index') }}" class="block px-4 py-2 rounded hover:bg-blue-100">Kelola Peminjaman</a>
            <a href="{{ route('detail-pengembalian.index') }}" class="block px-4 py-2 rounded hover:bg-blue-100">Kelola Pengembalian</a>
            <a href="{{ route('users.index') }}" class="block px-4 py-2 rounded hover:bg-blue-100">Kelola User</a>
            <a href="{{ route('laporan.index') }}" class="block px-4 py-2 rounded bg-blue-200 font-bold">Laporan</a>
            <form action="{{ route('logout') }}" method="POST" class="mt-4">
                @csrf
                <button type="submit" class="w-full text-left px-4 py-2 rounded hover:bg-red-100 text-red-600 font-semibold">Logout</button>
            </form>
        </nav>
    </div>

    {{-- Content --}}
    <div class="ml-64 w-full p-8">
        <h1 class="text-3xl font-bold text-gray-800 mb-6">Laporan</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

            {{-- Laporan Barang --}}
            <div class="bg-white p-6 rounded-2xl shadow-md">
                <h2 class="text-lg font-semibold text-gray-700 mb-4">Laporan Stok Barang</h2>
                <a href="{{ route('laporan.barang') }}" class="block mb-2 text-blue-600 hover:underline">Lihat Laporan</a>
                <div class="flex gap-2">
                    <a href="{{ route('laporan.barang.pdf') }}" class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600">Export PDF</a>
                    <a href="{{ route('laporan.barang.excel') }}" class="px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600">Export Excel</a>
                </div>
            </div>

            {{-- Laporan Peminjaman --}}
            <div class="bg-white p-6 rounded-2xl shadow-md">
                <h2 class="text-lg font-semibold text-gray-700 mb-4">Laporan Peminjaman</h2>
                <a href="{{ route('laporan.peminjaman.form') }}" class="block mb-2 text-blue-600 hover:underline">Lihat Laporan</a>
                <div class="flex gap-2">
                    <a href="{{ route('laporan.peminjaman.pdf', ['tanggal_awal' => request('tanggal_awal'), 'tanggal_akhir' => request('tanggal_akhir')]) }}" class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600">Export PDF</a>
                    <a href="{{ route('laporan.peminjaman.excel', ['tanggal_awal' => request('tanggal_awal'), 'tanggal_akhir' => request('tanggal_akhir')]) }}" class="px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600">Export Excel</a>
                </div>
            </div>

            {{-- Laporan Pengembalian --}}
            <div class="bg-white p-6 rounded-2xl shadow-md">
                <h2 class="text-lg font-semibold text-gray-700 mb-4">Laporan Pengembalian</h2>
                <a href="{{ route('laporan.pengembalian.form') }}" class="block mb-2 text-blue-600 hover:underline">Lihat Laporan</a>
                <div class="flex gap-2">
                    <a href="{{ route('laporan.pengembalian.pdf', ['tanggal_awal' => request('tanggal_awal'), 'tanggal_akhir' => request('tanggal_akhir')]) }}" class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600">Export PDF</a>
                    <a href="{{ route('laporan.pengembalian.excel', ['tanggal_awal' => request('tanggal_awal'), 'tanggal_akhir' => request('tanggal_akhir')]) }}" class="px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600">Export Excel</a>
                </div>
            </div>

        </div>
    </div>
</div>

</body>
</html>