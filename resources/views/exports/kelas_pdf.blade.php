<!DOCTYPE html>
<html>
<head>
    <title>Export Kelas</title>
    <style>
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid black; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h2>Data Kelas</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Kelas</th>
                <th>Wali Kelas</th>
            </tr>
        </thead>
        <tbody>
            @foreach($kelas as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->nama_kelas }}</td>
                <td>{{ $item->guru->nama_guru ?? '-' }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
