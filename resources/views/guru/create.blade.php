<!DOCTYPE html>
<html>
<head>
    <title>Tambah Guru</title>
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
        input {
            width: 100%;
            padding: 8px;
            margin: 8px 0 15px;
            border-radius: 4px;
            border: 1px solid #ccc;
        }
        .btn {
            padding: 8px 14px;
            border-radius: 4px;
            text-decoration: none;
            font-size: 14px;
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
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Tambah Guru</h2>

    @if ($errors->any())
        <div class="error">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('guru.store') }}" method="POST">
        @csrf

        <label>Nama Guru</label>
        <input type="text" name="nama_guru" value="{{ old('nama_guru') }}">

        <label>NIP</label>
        <input type="text" name="nip" value="{{ old('nip') }}">

        <label>No HP</label>
        <input type="text" name="no_hp" value="{{ old('no_hp') }}">

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('guru.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>

</body>
</html>