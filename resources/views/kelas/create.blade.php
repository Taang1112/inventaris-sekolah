<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Tambah Kelas</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-4">

    <h3 class="mb-3">Tambah Kelas</h3>

    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('kelas.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Nama Kelas</label>
                    <input type="text" name="nama_kelas" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Wali Kelas</label>
                    <select name="guru_id" class="form-select" required>
                        <option value="">-- Pilih Guru --</option>
                        @foreach($guru as $g)
                            <option value="{{ $g->guru_id }}">
                                {{ $g->nama_guru }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <button class="btn btn-success">Simpan</button>
                <a href="{{ route('kelas.index') }}" class="btn btn-secondary">Kembali</a>

            </form>
        </div>
    </div>

</div>

</body>
</html>