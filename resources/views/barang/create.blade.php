<!DOCTYPE html>
<html>
<head>
    <title>Tambah Barang</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f9;
            padding: 40px;
        }
        .container {
            background: #fff;
            padding: 25px;
            border-radius: 8px;
            max-width: 500px;
            margin: auto;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h2 {
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-top: 10px;
            font-weight: bold;
        }
        input, select {
            width: 100%;
            padding: 8px;
            margin: 8px 0 15px;
            border-radius: 4px;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }
        .btn {
            padding: 8px 14px;
            border-radius: 4px;
            text-decoration: none;
            font-size: 14px;
            cursor: pointer;
        }
        .btn-primary {
            background: #3498db;
            color: white;
            border: none;
        }
        .btn-secondary {
            background: #7f8c8d;
            color: white;
        }
        .error {
            color: red;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Tambah Barang</h2>

    @if ($errors->any())
        <div class="error">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('barang.store') }}" method="POST">
        @csrf

        <label>Kode Barang</label>
        <input type="text" name="kode_barang" value="{{ old('kode_barang') }}" placeholder="Contoh: BRG001">

        <label>Nama Barang</label>
        <input type="text" name="nama_barang" value="{{ old('nama_barang') }}">

        <label>Jumlah Total</label>
        <input type="number" name="jumlah_total" value="{{ old('jumlah_total', 0) }}">

        <label>Jumlah Tersedia</label>
        <input type="number" name="jumlah_tersedia" value="{{ old('jumlah_tersedia', 0) }}">

        <label>Kondisi</label>
        <select name="kondisi">
            <option value="baik" {{ old('kondisi') == 'baik' ? 'selected' : '' }}>Baik</option>
            <option value="rusak" {{ old('kondisi') == 'rusak' ? 'selected' : '' }}>Rusak</option>
        </select>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('barang.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>

</body>
</html>
