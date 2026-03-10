<!DOCTYPE html>
<html>
<head>
    <title>Export Barang</title>
    <style>
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid black; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h2>Data Barang</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th>Total</th>
                <th>Tersedia</th>
                <th>Kondisi</th>
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
                <td>{{ $item->kondisi }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
