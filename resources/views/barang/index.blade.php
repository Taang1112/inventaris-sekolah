<!DOCTYPE html>
<html>
<head>
    <title>Data Barang</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f9;
            padding: 40px;
        }
        .container {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h2 {
            margin-bottom: 20px;
        }
        .btn {
            padding: 8px 14px;
            text-decoration: none;
            border-radius: 4px;
            font-size: 14px;
        }
        .btn-primary {
            background: #3498db;
            color: #fff;
        }
        .btn-warning {
            background: #f39c12;
            color: #fff;
        }
        .btn-danger {
            background: #e74c3c;
            color: #fff;
            border: none;
            cursor: pointer;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table th, table td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }
        table th {
            background: #f2f2f2;
        }
        .success {
            color: green;
            margin-bottom: 15px;
        }
        .badge {
            padding: 4px 8px;
            border-radius: 4px;
            font-size: 12px;
            color: #fff;
        }
        .badge-success { background: #2ecc71; }
        .badge-danger { background: #e74c3c; }
    </style>
</head>
<body>

<div class="container">
    <h2>Data Barang</h2>

    @if(session('success'))
        <div class="success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('barang.create') }}" class="btn btn-primary">+ Tambah Barang</a>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th>Total</th>
                <th>Tersedia</th>
                <th>Kondisi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($barang as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->kode_barang }}</td>
                <td>{{ $item->nama_barang }}</td>
                <td>{{ $item->jumlah_total }}</td>
                <td>{{ $item->jumlah_tersedia }}</td>
                <td>
                    @if($item->kondisi == 'baik')
                        <span class="badge badge-success">Baik</span>
                    @else
                        <span class="badge badge-danger">Rusak</span>
                    @endif
                </td>
                <td>
                    <a href="{{ route('barang.edit', $item->barang_id) }}" class="btn btn-warning">Edit</a>

                    <form action="{{ route('barang.destroy', $item->barang_id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin hapus?')">
                            Hapus
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

</body>
</html>
