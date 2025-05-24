<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Kelola Peminjaman - SISFO SARPRAS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">

    <div class="flex">
        {{-- Sidebar --}}
        <div class="w-64 bg-white shadow-md h-screen fixed top-0 left-0 z-10">
            <div class="px-6 py-4 text-xl font-bold text-gray-700 border-b">SISFO SARPRAS</div>
            <nav class="px-4 py-4 space-y-2">
                <a href="{{ route('dashboard') }}" class="block px-4 py-2 rounded hover:bg-blue-100 font-semibold">Dashboard</a>
                <a href="{{ route('barang.index') }}" class="block px-4 py-2 rounded hover:bg-blue-100">Kelola Barang</a>
                <a href="{{ route('kategori.index') }}" class="block px-4 py-2 rounded hover:bg-blue-100">Kelola Kategori</a>
                <a href="{{ route('peminjaman.index') }}" class="block px-4 py-2 rounded bg-blue-200 font-bold">Kelola Peminjaman</a>
                <a href="{{ route('detail-pengembalian.index') }}" class="block px-4 py-2 rounded hover:bg-blue-100">Kelola Pengembalian</a>
                <a href="{{ route('users.index') }}" class="block px-4 py-2 rounded hover:bg-blue-100">Kelola User</a>
                <a href="{{ route('laporan.index') }}" class="block px-4 py-2 rounded hover:bg-blue-200">Laporan</a>    
                <form action="{{ route('logout') }}" method="POST" class="mt-4">
                    @csrf
                    <button type="submit"
                        class="w-full text-left px-4 py-2 rounded hover:bg-red-100 text-red-600 font-semibold">Logout</button>
                </form>
            </nav>
        </div>

        {{-- Konten Utama --}}
        <div class="flex-1 ml-64 p-8">
            <h1 class="text-2xl font-bold mb-6">Data Peminjaman</h1>

            @if(session('success'))
                <div class="mb-4 p-3 bg-green-100 text-green-700 rounded">{{ session('success') }}</div>
            @elseif(session('error'))
                <div class="mb-4 p-3 bg-red-100 text-red-700 rounded">{{ session('error') }}</div>
            @endif

            <div class="overflow-x-auto bg-white shadow rounded-lg p-4">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-100 text-left text-sm font-medium text-gray-700">
                        <tr>
                            <th class="px-4 py-2">#</th>
                            <th class="px-4 py-2">User</th>
                            <th class="px-4 py-2">Barang</th>
                            <th class="px-4 py-2">Status</th>
                            <th class="px-4 py-2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 text-sm">
                        @forelse ($peminjaman as $index => $pinjam)
                        <tr>
                            <td class="px-4 py-2">{{ $index + 1 }}</td>
                            <td class="px-4 py-2">{{ $pinjam->user->username ?? '-' }}</td>
                            <td class="px-4 py-2">
                                {{ $pinjam->detail && $pinjam->detail->barang ? $pinjam->detail->barang->nama_barang : 'Barang tidak ditemukan' }}
                            </td>
                            <td class="px-4 py-2">
                                @if ($pinjam->status === 'approved')
                                    <span class="text-green-600 font-semibold">Disetujui</span>
                                @elseif ($pinjam->status === 'rejected')
                                    <span class="text-red-600 font-semibold">Ditolak</span>
                                @else
                                    <span class="text-yellow-600 font-semibold">Menunggu</span>
                                @endif
                            </td>
                            <td class="px-4 py-2 space-x-2" id="action-{{ $pinjam->id_peminjaman }}">
                                @if ($pinjam->status === 'pending')
                                    <form action="{{ route('peminjaman.approve', $pinjam->id_peminjaman) }}" method="POST"
                                        class="inline-block" onsubmit="return handleAction(event, {{ $pinjam->id_peminjaman }})">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit"
                                            class="bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600 text-xs">Setujui</button>
                                    </form>
                                    <form action="{{ route('peminjaman.reject', $pinjam->id_peminjaman) }}" method="POST"
                                        class="inline-block" onsubmit="return handleAction(event, {{ $pinjam->id_peminjaman }})">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit"
                                            class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600 text-xs">Tolak</button>
                                    </form>
                                @else
                                    <span class="text-gray-500 text-sm italic">Tindakan telah selesai</span>
                                @endif
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center px-4 py-4 text-gray-500">Tidak ada data peminjaman.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        function handleAction(event, id) {
            event.preventDefault();
            const form = event.target;
            const td = document.getElementById('action-' + id);

            fetch(form.action, {
                method: 'POST',
                body: new FormData(form),
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content
                }
            }).then(response => {
                if (response.ok) {
                    td.innerHTML = '<span class="text-gray-500 text-sm italic">Tindakan telah selesai</span>';
                } else {
                    alert('Terjadi kesalahan saat memproses permintaan.');
                }
            });

            return false;
        }
    </script>

</body>

</html>
