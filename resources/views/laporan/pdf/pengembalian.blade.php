<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Pengembalian</title>
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
<h3>Laporan Pengembalian</h3>
@if($tanggalAwal && $tanggalAkhir)
<p>Periode: {{ \Carbon\Carbon::parse($tanggalAwal)->format('d M Y') }} - {{ \Carbon\Carbon::parse($tanggalAkhir)->format('d M Y') }}</p>
@endif
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
</body>
</html>