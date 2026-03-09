<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Peminjaman</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f9;
            margin: 0;
            padding: 0;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .card {
            width: 420px;
            background: #ffffff;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        .card h2 {
            margin-bottom: 20px;
        }

        label {
            font-weight: 500;
        }

        input, select {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            margin-bottom: 15px;
            border: 1px solid #ced4da;
            border-radius: 4px;
        }

        .btn-group {
            display: flex;
            gap: 10px;
        }

        .btn-primary {
            background-color: #0d6efd;
            color: white;
            border: none;
            padding: 8px 15px;
            border-radius: 4px;
            cursor: pointer;
        }

        .btn-primary:hover {
            background-color: #0b5ed7;
        }

        .btn-secondary {
            background-color: #6c757d;
            color: white;
            padding: 8px 15px;
            border-radius: 4px;
            text-decoration: none;
            display: inline-block;
        }

        .btn-secondary:hover {
            background-color: #5c636a;
        }

        .error {
            color: red;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="card">
        <h2>Tambah Peminjaman</h2>

        @if(session('error'))
            <div class="error">
                {{ session('error') }}
            </div>
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

            <div class="btn-group">
                <button type="submit" class="btn-primary">Simpan</button>
                <a href="{{ route('peminjaman.index') }}" class="btn-secondary">Kembali</a>
            </div>

        </form>
    </div>
</div>

</body>
</html>