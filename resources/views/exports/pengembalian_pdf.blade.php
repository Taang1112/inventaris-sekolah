<!DOCTYPE html>
<html>
<head>
    <title>Export Pengembalian</title>
    <style>
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid black; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h2>Data Pengembalian</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Barang</th>
                <th>Peminjam</th>
                <th>Tanggal Kembali</th>
                <th>Kondisi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pengembalian as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->peminjaman->barang->nama_barang ?? '-' }}</td>
                <td>{{ $item->peminjaman->guru->nama_guru ?? '-' }}</td>
                <td>{{ $item->tanggal_kembali }}</td>
                <td>{{ ucfirst($item->kondisi_kembali) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
