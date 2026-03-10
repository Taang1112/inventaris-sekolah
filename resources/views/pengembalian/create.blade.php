<!DOCTYPE html>
<html>
<head>
    <title>Tambah Pengembalian</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f4f6f9; padding: 40px; }
        .container { background: #fff; padding: 20px; border-radius: 8px; max-width: 500px; margin: auto; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        h2 { margin-bottom: 20px; }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; }
        select, input { width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px; }
        .btn { padding: 10px 15px; border: none; border-radius: 4px; cursor: pointer; color: #fff; }
        .btn-primary { background: #3498db; }
    </style>
</head>
<body>

<div class="container">
    <h2>Tambah Pengembalian</h2>
    <form action="{{ route('pengembalian.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label>Data Peminjaman</label>
            <select name="peminjaman_id" required>
                @foreach($peminjaman as $item)
                    <option value="{{ $item->peminjaman_id }}">
                        {{ $item->barang->nama_barang }} - {{ $item->guru->nama_guru }} ({{ $item->jumlah_pinjam }})
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Tanggal Kembali</label>
            <input type="date" name="tanggal_kembali" value="{{ date('Y-m-d') }}" required>
        </div>
        <div class="form-group">
            <label>Kondisi Kembali</label>
            <select name="kondisi_kembali" required>
                <option value="baik">Baik</option>
                <option value="rusak">Rusak</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('pengembalian.index') }}">Batal</a>
    </form>
</div>

</body>
</html>
