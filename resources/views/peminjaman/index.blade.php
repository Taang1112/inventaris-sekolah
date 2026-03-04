<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 30px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .container {
            background: #ffffff;
            padding: 20px;
            border-radius: 6px;
            box-shadow: 0 0 5px rgba(0,0,0,0.1);
        }

        .button {
            display: inline-block;
            padding: 8px 14px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            font-size: 14px;
        }

        .button:hover {
            background-color: #0056b3;
        }

        .btn-success {
            background-color: #28a745;
        }

        .btn-success:hover {
            background-color: #1e7e34;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        table th, table td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
        }

        table th {
            background-color: #f2f2f2;
        }

        .success {
            color: green;
            margin-bottom: 10px;
        }

        .error {
            color: red;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>

<h2>Data Peminjaman Inventaris</h2>

<div class="container">

    @if(session('success'))
        <p class="success">{{ session('success') }}</p>
    @endif

    @if(session('error'))
        <p class="error">{{ session('error') }}</p>
    @endif

    <a href="{{ route('peminjaman.create') }}" class="button">
        + Tambah Peminjaman
    </a>

    <table>
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

        @foreach($data as $index => $row)
        <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ $row->guru->nama_guru }}</td>
            <td>{{ $row->kelas->nama_kelas }}</td>
            <td>{{ $row->barang->nama_barang }}</td>
            <td>{{ $row->jumlah_pinjam }}</td>
            <td>{{ $row->tanggal_pinjam }}</td>
            <td>{{ ucfirst($row->status) }}</td>
            <td>
                @if($row->status == 'dipinjam')
                    <a href="{{ route('peminjaman.edit', $row->peminjaman_id) }}" class="button">
                        Edit
                    </a>

                    <a href="{{ route('peminjaman.kembalikan', $row->peminjaman_id) }}" class="button btn-success">
                        Kembalikan
                    </a>
                @else
                    -
                @endif
            </td>
        </tr>
        @endforeach

    </table>

</div>

</body>
</html>