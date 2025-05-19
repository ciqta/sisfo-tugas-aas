<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Barang</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
<div class="flex">
    {{-- Sidebar --}}
    <div class="w-64 bg-white shadow-md h-screen fixed top-0 left-0 z-10">
        <div class="px-6 py-4 text-xl font-bold text-gray-700 border-b">SISFO SARPRAS</div>
        <nav class="px-4 py-4 space-y-2">
            <a href="{{ route('dashboard') }}" class="block px-4 py-2 rounded hover:bg-blue-100">Dashboard</a>
            <a href="{{ route('barang.index') }}" class="block px-4 py-2 rounded bg-blue-200 font-bold">Kelola Barang</a>
            <a href="{{ route('kategori.index') }}" class="block px-4 py-2 rounded hover:bg-blue-100">Kelola Kategori</a>
            <a href="{{ route('peminjaman.index') }}" class="block px-4 py-2 rounded hover:bg-blue-200">Kelola Peminjaman</a>
            <a href="{{ route('detail-pengembalian.index') }}" class="block px-4 py-2 rounded hover:bg-blue-200">Kelola Pengembalian</a>
            <a href="{{ route('users.index') }}" class="block px-4 py-2 rounded hover:bg-blue-100">Kelola User</a>
            <form action="{{ route('logout') }}" method="POST" class="mt-4">
                @csrf
                <button type="submit" class="w-full text-left px-4 py-2 rounded hover:bg-red-100 text-red-600 font-semibold">Logout</button>
            </form>
        </nav>
    </div>

    <div class="ml-64 w-full p-6">
        <h1 class="text-2xl font-bold mb-4">Data Barang</h1>
        @if(session('success'))
            <div class="bg-green-100 text-green-800 px-4 py-2 rounded mb-4">{{ session('success') }}</div>
        @endif

        <a href="{{ route('barang.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded mb-4 inline-block">Tambah Barang</a>

        <div class="overflow-auto bg-white rounded shadow">
            <table class="w-full table-auto text-sm">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="p-2">Kode</th>
                        <th class="p-2">Nama</th>
                        <th class="p-2">Kategori</th>
                        <th class="p-2">Stock</th>
                        <th class="p-2">Status</th>
                        <th class="p-2">Kondisi</th>
                        <th class="p-2">Gambar</th>
                        <th class="p-2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($barang as $item)
                        <tr class="border-b">
                            <td class="p-2">{{ $item->kode_barang }}</td>
                            <td class="p-2">{{ $item->nama_barang }}</td>
                            <td class="p-2">{{ $item->kategori->nama_kategori ?? '-' }}</td>
                            <td class="p-2">{{ $item->stock }}</td>
                            <td class="p-2">{{ $item->status }}</td>
                            <td class="p-2">{{ $item->kondisi_barang }}</td>
                            <td class="p-2">
                                @if($item->gambar_barang)
                                    <img src="{{ asset('storage/gambar_barang/' . $item->gambar_barang) }}" width="50">
                                @else -
                                @endif
                            </td>
                            <td class="p-2 flex gap-1">
                                <a href="{{ route('barang.edit', $item->id_barang) }}" class="bg-yellow-500 text-white px-2 py-1 rounded">Edit</a>
                                <form action="{{ route('barang.destroy', $item->id_barang) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus?')">
                                    @csrf @method('DELETE')
                                    <button class="bg-red-600 text-white px-2 py-1 rounded">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>
