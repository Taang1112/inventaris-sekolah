<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Peminjaman</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #ffe6f2;
            padding: 20px;
        }

        h2 {
            text-align: center;
            color: #d63384;
        }

        form {
            width: 400px;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0,0,0,0.1);
        }

        label {
            font-weight: bold;
        }

        select, input {
            width: 100%;
            padding: 8px;
            margin: 8px 0 15px 0;
            border: 1px solid #ffb6c1;
            border-radius: 5px;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #ff69b4;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #ff1493;
        }

        .error {
            color: red;
            text-align: center;
        }

        .back {
            display: block;
            text-align: center;
            margin-top: 15px;
            color: #d63384;
            text-decoration: none;
        }
    </style>
</head>
<body>

<h2>Form Tambah Peminjaman</h2>

@if(session('error'))
    <p class="error">{{ session('error') }}</p>
@endif

<form action="{{ route('peminjaman.store') }}" method="POST">
    @csrf

    <label>Guru</label>
    <select name="guru_id" required>
        <option value="">-- Pilih Guru --</option>
        @foreach($guru as $g)
            <option value="{{ $g->guru_id }}">{{ $g->nama_guru }}</option>
        @endforeach
    </select>

    <label>Kelas</label>
    <select name="kelas_id" required>
        <option value="">-- Pilih Kelas --</option>
        @foreach($kelas as $k)
            <option value="{{ $k->kelas_id }}">{{ $k->nama_kelas }}</option>
        @endforeach
    </select>

    <label>Barang</label>
    <select name="barang_id" required>
        <option value="">-- Pilih Barang --</option>
        @foreach($barang as $b)
            <option value="{{ $b->barang_id }}">
                {{ $b->nama_barang }} (Stok: {{ $b->jumlah_tersedia }})
            </option>
        @endforeach
    </select>

    <label>Jumlah Pinjam</label>
    <input type="number" name="jumlah_pinjam" min="1" required>

    <label>Tanggal Pinjam</label>
    <input type="date" name="tanggal_pinjam" required>

    <button type="submit">Simpan</button>
</form>

<a href="{{ route('peminjaman.index') }}" class="back">← Kembali ke Data</a>

</body>
</html>