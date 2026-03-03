<!DOCTYPE html>
<html>
<head>
    <title>Tambah Guru</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h2 class="mb-4">Tambah Guru</h2>

    <a href="{{ route('guru.index') }}" class="btn btn-secondary mb-3">
        ← Kembali
    </a>

    <form action="{{ route('guru.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label">Nama Guru</label>
            <input type="text" name="nama_guru" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">NIP</label>
            <input type="text" name="nip" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">No HP</label>
            <input type="text" name="no_hp" class="form-control">
        </div>

        <button type="submit" class="btn btn-success">
            Simpan
        </button>
    </form>
</div>

</body>
</html>