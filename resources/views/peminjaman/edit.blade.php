<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Peminjaman</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        body {
            font-family: Arial;
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
        }

        select, input {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #ff69b4;
            color: white;
            border: none;
            border-radius: 5px;
        }

        .error {
            color: red;
            text-align: center;
        }
    </style>
</head>
<body>

<h2>Edit Peminjaman</h2>

@if(session('error'))
    <p class="error">{{ session('error') }}</p>
@endif

<form action="{{ route('peminjaman.update', $peminjaman->peminjaman_id) }}" method="POST">
    @csrf
    @method('PUT')

    <label>Guru</label>
    <select name="guru_id">
        @foreach($guru as $g)
            <option value="{{ $g->guru_id }}"
                {{ $peminjaman->guru_id == $g->guru_id ? 'selected' : '' }}>
                {{ $g->nama_guru }}
            </option>
        @endforeach
    </select>

    <label>Kelas</label>
    <select name="kelas_id">
        @foreach($kelas as $k)
            <option value="{{ $k->kelas_id }}"
                {{ $peminjaman->kelas_id == $k->kelas_id ? 'selected' : '' }}>
                {{ $k->nama_kelas }}
            </option>
        @endforeach
    </select>

    <label>Barang</label>
    <select name="barang_id">
        @foreach($barang as $b)
            <option value="{{ $b->barang_id }}"
                {{ $peminjaman->barang_id == $b->barang_id ? 'selected' : '' }}>
                {{ $b->nama_barang }} (Stok: {{ $b->jumlah_tersedia }})
            </option>
        @endforeach
    </select>

    <label>Jumlah Pinjam</label>
    <input type="number" name="jumlah_pinjam"
        value="{{ $peminjaman->jumlah_pinjam }}">

    <label>Tanggal Pinjam</label>
    <input type="date" name="tanggal_pinjam"
        value="{{ $peminjaman->tanggal_pinjam }}">

    <button type="submit">Update</button>
</form>

</body>
</html>