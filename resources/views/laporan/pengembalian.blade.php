<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Pengembalian</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css " rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }
        .container {
            margin-top: 50px;
        }
        h3 {
            color: #343a40;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #dee2e6;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f1f3f5;
        }
        a {
            color: #007bff;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input[type="date"] {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
        }
        button {
            padding: 10px 15px;
            background-color: #007bff;
            color: white;
            border: none;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
<div class="container">
    <h3>Laporan Pengembalian</h3>
    <form action="{{ route('laporan.pengembalian.filter') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="tanggal_awal">Tanggal Awal</label>
            <input type="date" id="tanggal_awal" name="tanggal_awal" value="{{ old('tanggal_awal', $tanggalAwal ?? '') }}">
        </div>
        <div class="form-group">
            <label for="tanggal_akhir">Tanggal Akhir</label>
            <input type="date" id="tanggal_akhir" name="tanggal_akhir" value="{{ old('tanggal_akhir', $tanggalAkhir ?? '') }}">
        </div>
        <button type="submit">Filter</button>
    </form>
    <br>
    <table>
        <thead>
            <tr>
                <th>ID Pengembalian</th>
                <th>ID Peminjaman</th>
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th>Jumlah</th>
                <th>Tanggal Pengembalian</th>
                <th>Kondisi</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $item)
            <tr>
                <td>{{ $item->id_detail_pengembalian }}</td>
                <td>{{ $item->id_peminjaman }}</td>
                <td>{{ $item->barang->kode_barang }}</td>
                <td>{{ $item->barang->nama_barang }}</td>
                <td>{{ $item->jumlah }}</td>
                <td>{{ $item->tanggal_pengembalian }}</td>
                <td>{{ $item->kondisi }}</td>
                <td>{{ $item->keterangan }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <br>
    <form action="{{ route('laporan.pengembalian.pdf') }}" method="POST">
        @csrf
        <input type="hidden" name="tanggal_awal" value="{{ $tanggalAwal ?? '' }}">
        <input type="hidden" name="tanggal_akhir" value="{{ $tanggalAkhir ?? '' }}">
        <button type="submit">Export PDF</button>
    </form>
    <form action="{{ route('laporan.pengembalian.excel') }}" method="POST">
        @csrf
        <input type="hidden" name="tanggal_awal" value="{{ $tanggalAwal ?? '' }}">
        <input type="hidden" name="tanggal_akhir" value="{{ $tanggalAkhir ?? '' }}">
        <button type="submit">Export Excel</button>
    </form>
</div>
</body>
</html>