<!DOCTYPE html>
<html>
<head>
    <title>Data Guru</title>
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
    </style>
</head>
<body>

<div class="container">
    <h2>Data Guru</h2>

    @if(session('success'))
        <div class="success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('guru.create') }}" class="btn btn-primary">+ Tambah Guru</a>
    <a href="{{ route('guru.export.excel') }}" class="btn btn-success">Export Excel</a>
    <a href="{{ route('guru.export.pdf') }}" class="btn btn-danger">Export PDF</a>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Guru</th>
                <th>NIP</th>
                <th>No HP</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($guru as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->nama_guru }}</td>
                <td>{{ $item->nip }}</td>
                <td>{{ $item->no_hp }}</td>
                <td>
                    <a href="{{ route('guru.edit', $item->guru_id) }}" class="btn btn-warning">Edit</a>

                    <form action="{{ route('guru.destroy', $item->guru_id) }}" method="POST" style="display:inline;">
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