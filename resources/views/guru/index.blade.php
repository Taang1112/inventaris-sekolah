<!DOCTYPE html>
<html>
<head>
    <title>Data Guru</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h2 class="mb-4">Data Guru</h2>

    <a href="{{ route('guru.create') }}" class="btn btn-primary mb-3">
        + Tambah Guru
    </a>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Nama Guru</th>
                <th>NIP</th>
                <th>No HP</th>
                <th width="150">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($guru as $g)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $g->nama_guru }}</td>
                <td>{{ $g->nip }}</td>
                <td>{{ $g->no_hp }}</td>
                <td>
                    <a href="{{ route('guru.edit', $g->id) }}" class="btn btn-warning btn-sm">Edit</a>

                    <form action="{{ route('guru.destroy', $g->id) }}" 
                          method="POST" 
                          style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('Yakin hapus?')" 
                                class="btn btn-danger btn-sm">
                            Hapus
                        </button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="text-center">Data belum ada</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

</body>
</html>