<!DOCTYPE html>
<html>
<head>
    <title>Data Pengembalian</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f4f6f9; padding: 40px; }
        .container { background: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        h2 { margin-bottom: 20px; }
        .btn { padding: 8px 14px; text-decoration: none; border-radius: 4px; font-size: 14px; }
        .btn-primary { background: #3498db; color: #fff; }
        .btn-success { background: #27ae60; color: #fff; }
        .btn-danger { background: #e74c3c; color: #fff; border: none; cursor: pointer; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        table th, table td { padding: 10px; border-bottom: 1px solid #ddd; text-align: left; }
        table th { background: #f2f2f2; }
        .success { color: green; margin-bottom: 15px; }
        .badge { padding: 4px 8px; border-radius: 4px; font-size: 12px; color: #fff; }
        .badge-success { background: #2ecc71; }
        .badge-danger { background: #e74c3c; }
    </style>
</head>
<body>

<div class="container">
    <h2>Data Pengembalian</h2>

    @if(session('success'))
        <div class="success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('pengembalian.create') }}" class="btn btn-primary">+ Tambah Pengembalian</a>
    <a href="{{ route('pengembalian.export.excel') }}" class="btn btn-success">Export Excel</a>
    <a href="{{ route('pengembalian.export.pdf') }}" class="btn btn-danger">Export PDF</a>

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
                <td>
                    @if($item->kondisi_kembali == 'baik')
                        <span class="badge badge-success">Baik</span>
                    @else
                        <span class="badge badge-danger">Rusak</span>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

</body>
</html>
