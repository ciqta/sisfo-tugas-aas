<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Peminjaman</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        h3 {
            text-align: center;
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
    </style>
</head>
<body>
<h3>Laporan Peminjaman</h3>
@if($tanggalAwal && $tanggalAkhir)
<p>Periode: {{ \Carbon\Carbon::parse($tanggalAwal)->format('d M Y') }} - {{ \Carbon\Carbon::parse($tanggalAkhir)->format('d M Y') }}</p>
@endif
<table>
    <thead>
        <tr>
            <th>ID Peminjaman</th>
            <th>Kode Barang</th>
            <th>Nama Barang</th>
            <th>Jumlah</th>
            <th>Tanggal Pinjam</th>
            <th>Tanggal Kembali</th>
            <th>Keperluan</th>
            <th>Kelas</th>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $item)
        <tr>
            <td>{{ $item->peminjaman->id_peminjaman }}</td>
            <td>{{ $item->barang->kode_barang }}</td>
            <td>{{ $item->barang->nama_barang }}</td>
            <td>{{ $item->jumlah }}</td>
            <td>{{ $item->tanggal_pinjam }}</td>
            <td>{{ $item->tanggal_kembali }}</td>
            <td>{{ $item->keperluan }}</td>
            <td>{{ $item->class }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
</body>
</html>