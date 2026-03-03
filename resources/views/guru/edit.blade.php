<!DOCTYPE html>
<html>
<head>
    <title>Edit Guru</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h2 class="mb-4">Edit Guru</h2>

    <a href="{{ route('guru.index') }}" class="btn btn-secondary mb-3">
        ← Kembali
    </a>

    <form action="{{ route('guru.update', $guru->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Nama Guru</label>
            <input type="text" name="nama_guru" 
                   value="{{ $guru->nama_guru }}" 
                   class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">NIP</label>
            <input type="text" name="nip" 
                   value="{{ $guru->nip }}" 
                   class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">No HP</label>
            <input type="text" name="no_hp" 
                   value="{{ $guru->no_hp }}" 
                   class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">
            Update
        </button>
    </form>
</div>

</body>
</html>