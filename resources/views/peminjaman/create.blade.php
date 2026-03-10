<!DOCTYPE html>
<html>
<head>
    <title>Tambah Peminjaman</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f4f6f9; padding: 40px; }
        .container { background: #fff; padding: 20px; border-radius: 8px; max-width: 500px; margin: auto; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        h2 { margin-bottom: 20px; }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; }
        select, input { width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px; }
        .btn { padding: 10px 15px; border: none; border-radius: 4px; cursor: pointer; color: #fff; }
        .btn-primary { background: #3498db; }
        .error { color: red; font-size: 12px; }
    </style>
</head>
<body>

<div class="container">
    <h2>Tambah Peminjaman</h2>
    <form action="{{ route('peminjaman.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label>Barang</label>
            <select name="barang_id" required>
                @foreach($barang as $item)
                    <option value="{{ $item->barang_id }}">{{ $item->nama_barang }} (Tersedia: {{ $item->jumlah_tersedia }})</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Guru / Peminjam</label>
            <select name="guru_id" required>
                @foreach($guru as $item)
                    <option value="{{ $item->guru_id }}">{{ $item->nama_guru }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Jumlah PINJAM</label>
            <input type="number" name="jumlah_pinjam" min="1" required>
            @error('jumlah_pinjam') <span class="error">{{ $message }}</span> @enderror
        </div>
        <div class="form-group">
            <label>Tanggal Pinjam</label>
            <input type="date" name="tanggal_pinjam" value="{{ date('Y-m-d') }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('peminjaman.index') }}">Batal</a>
    </form>
</div>

</body>
</html>
