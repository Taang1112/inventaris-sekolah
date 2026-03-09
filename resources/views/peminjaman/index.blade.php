<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Peminjaman</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f6f8;
            padding: 30px;
        }

        .card {
            background: #ffffff;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 2px 6px rgba(0,0,0,0.08);
        }

        .card-header {
            display: flex;
            flex-direction: column;
            gap: 10px;
            margin-bottom: 15px;
        }

        .card-header h2 {
            margin: 0;
            font-size: 22px;
        }

        .btn {
            display: inline-block;
            width: fit-content;
            padding: 8px 14px;
            background-color: #0d6efd;
            color: #fff;
            text-decoration: none;
            border-radius: 4px;
            font-size: 14px;
        }

        .btn:hover {
            background-color: #0b5ed7;
        }

        .btn-success {
            background-color: #198754;
        }

        .btn-success:hover {
            background-color: #157347;
        }

        .btn-warning {
            background-color: #ffc107;
            color: #000;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        table th {
            background-color: #f1f1f1;
            text-align: left;
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }

        table td {
            padding: 10px;
            border-bottom: 1px solid #eee;
        }

        table tr:hover {
            background-color: #f9f9f9;
        }

        .alert-success {
            background: #d1e7dd;
            color: #0f5132;
            padding: 10px;
            border-radius: 4px;
            margin-bottom: 10px;
        }

        .alert-error {
            background: #f8d7da;
            color: #842029;
            padding: 10px;
            border-radius: 4px;
            margin-bottom: 10px;
        }

        .aksi a {
            margin-right: 5px;
        }
    </style>
</head>
<body>

<div class="card">

    <div class="card-header">
        <h2>Data Peminjaman</h2>

        <a href="{{ route('peminjaman.create') }}" class="btn">
            + Tambah Peminjaman
        </a>
    </div>

    @if(session('success'))
        <div class="alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert-error">
            {{ session('error') }}
        </div>
    @endif

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Guru</th>
                <th>Kelas</th>
                <th>Barang</th>
                <th>Jumlah</th>
                <th>Tanggal Pinjam</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
        @forelse($data as $index => $row)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $row->guru->nama_guru }}</td>
                <td>{{ $row->kelas->nama_kelas }}</td>
                <td>{{ $row->barang->nama_barang }}</td>
                <td>{{ $row->jumlah_pinjam }}</td>
                <td>{{ $row->tanggal_pinjam }}</td>
                <td>{{ ucfirst($row->status) }}</td>
                <td class="aksi">
                    @if($row->status == 'dipinjam')
                        <a href="{{ route('peminjaman.edit', $row->peminjaman_id) }}" class="btn btn-warning">
                            Edit
                        </a>

                        <a href="{{ route('peminjaman.kembalikan', $row->peminjaman_id) }}" class="btn btn-success">
                            Kembalikan
                        </a>
                    @else
                        -
                    @endif
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="8" style="text-align:center;">
                    Data peminjaman belum tersedia
                </td>
            </tr>
        @endforelse
        </tbody>
    </table>

</div>

</body>
</html>