<!DOCTYPE html>
<html>
<head>
    <title>Export Guru</title>
    <style>
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid black; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h2>Data Guru</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Guru</th>
                <th>NIP</th>
                <th>No HP</th>
            </tr>
        </thead>
        <tbody>
            @foreach($guru as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->nama_guru }}</td>
                <td>{{ $item->nip }}</td>
                <td>{{ $item->no_hp }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
