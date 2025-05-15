<!DOCTYPE html>
<html>
<head>
    <title>Edit Barang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">
    <div class="container">
        <h1>Edit Barang</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
            </div>
        @endif

        <form action="{{ route('barang.update', $barang->id_barang) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="kode_barang" class="form-label">Kode Barang</label>
                <input type="text" name="kode_barang" class="form-control" value="{{ $barang->kode_barang }}" required>
            </div>
            <div class="mb-3">
                <label for="nama_barang" class="form-label">Nama Barang</label>
                <input type="text" name="nama_barang" class="form-control" value="{{ $barang->nama_barang }}" required>
            </div>
            <div class="mb-3">
                <label for="id_category" class="form-label">Kategori</label>
                <select name="id_category" class="form-select" required>
                    @foreach($kategori as $kat)
                        <option value="{{ $kat->id_category }}" {{ $barang->id_category == $kat->id_category ? 'selected' : '' }}>
                            {{ $kat->nama_kategori }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="stock" class="form-label">Stock</label>
                <input type="number" name="stock" class="form-control" value="{{ $barang->stock }}" required>
            </div>
            <div class="mb-3">
                <label for="brand" class="form-label">Brand</label>
                <input type="text" name="brand" class="form-control" value="{{ $barang->brand }}">
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select name="status" class="form-select">
                    <option value="tersedia" {{ $barang->status == 'tersedia' ? 'selected' : '' }}>Tersedia</option>
                    <option value="dipinjam" {{ $barang->status == 'dipinjam' ? 'selected' : '' }}>Dipinjam</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="kondisi_barang" class="form-label">Kondisi</label>
                <select name="kondisi_barang" class="form-select">
                    <option value="baik" {{ $barang->kondisi_barang == 'baik' ? 'selected' : '' }}>Baik</option>
                    <option value="rusak" {{ $barang->kondisi_barang == 'rusak' ? 'selected' : '' }}>Rusak</option>
                    <option value="dll" {{ $barang->kondisi_barang == 'dll' ? 'selected' : '' }}>Lainnya</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="gambar_barang" class="form-label">Gambar Barang</label><br>
                @if($barang->gambar_barang)
                    <img src="{{ asset('storage/gambar_barang/' . $barang->gambar_barang) }}" width="80" class="mb-2"><br>
                @endif
                <input type="file" name="gambar_barang" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('barang.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</body>
</html>
