<!DOCTYPE html>
<html>
<head>
    <title>Export Peminjaman</title>
    <style>
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid black; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h2>Data Peminjaman</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Barang</th>
                <th>Peminjam</th>
                <th>Jumlah</th>
                <th>Tanggal Pinjam</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($peminjaman as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->barang->nama_barang ?? '-' }}</td>
                <td>{{ $item->guru->nama_guru ?? '-' }}</td>
                <td>{{ $item->jumlah_pinjam }}</td>
                <td>{{ $item->tanggal_pinjam }}</td>
                <td>{{ ucfirst($item->status) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
