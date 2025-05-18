<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Peminjaman</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container py-5">
        <h1 class="mb-4">Daftar Peminjaman</h1>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @elseif(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <table class="table table-bordered bg-white shadow-sm">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>User</th>
                    <th>Barang</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($peminjaman as $index => $pinjam)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $pinjam->user->username ?? '-' }}</td>
                        <td>
                            <ul class="mb-0">
                                <li>
                                    {{ $pinjam->detail && $pinjam->detail->barang 
                                        ? $pinjam->detail->barang->nama_barang 
                                        : 'Barang tidak ditemukan' }}
                                </li>
                            </ul>
                        </td>
                        <td>
                            <span class="badge bg-{{ $pinjam->status == 'pending' ? 'warning text-dark' : ($pinjam->status == 'approved' ? 'success' : 'danger') }}">
                                {{ ucfirst($pinjam->status) }}
                            </span>
                        </td>
                        <td>
                            @if($pinjam->status == 'pending')
                                <form action="{{ route('peminjaman.approve', $pinjam->id_peminjaman) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-success btn-sm">Approve</button>
                                </form>
                                <form action="{{ route('peminjaman.reject', $pinjam->id_peminjaman) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-danger btn-sm">Reject</button>
                                </form>
                            @else
                                <span class="text-muted">Tindakan selesai</span>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</body>

</html>
