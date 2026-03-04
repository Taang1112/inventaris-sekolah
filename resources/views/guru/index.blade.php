<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Guru | Inventaris Sekolah</title>
    
    <!-- Google Fonts: Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Lucide Icons -->
    <script src="https://unpkg.com/lucide@latest"></script>

    <style>
        :root {
            --primary: #6366f1;
            --primary-hover: #4f46e5;
            --bg-body: #f8fafc;
            --text-main: #1e293b;
            --text-muted: #64748b;
            --white: #ffffff;
            --card-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1), 0 2px 4px -2px rgb(0 0 0 / 0.1);
            --border-color: #e2e8f0;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Inter', sans-serif;
        }

        body {
            background-color: var(--bg-body);
            color: var(--text-main);
            padding: 40px 20px;
            line-height: 1.5;
        }

        .container {
            max-width: 1100px;
            margin: 0 auto;
        }

        .header-section {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 32px;
        }

        .header-section h1 {
            font-size: 28px;
            font-weight: 700;
            color: var(--text-main);
            letter-spacing: -0.025em;
        }

        .btn-add {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background-color: var(--primary);
            color: var(--white);
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 8px;
            font-weight: 600;
            font-size: 14px;
            transition: all 0.2s ease;
            box-shadow: 0 4px 6px -1px rgba(99, 102, 241, 0.3);
        }

        .btn-add:hover {
            background-color: var(--primary-hover);
            transform: translateY(-1px);
            box-shadow: 0 6px 10px -1px rgba(99, 102, 241, 0.4);
        }

        .card {
            background: var(--white);
            border-radius: 12px;
            box-shadow: var(--card-shadow);
            border: 1px solid var(--border-color);
            overflow: hidden;
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(12px);
        }

        .table-responsive {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            text-align: left;
        }

        thead {
            background-color: #f1f5f9;
        }

        th {
            padding: 16px 24px;
            font-weight: 600;
            font-size: 13px;
            color: var(--text-muted);
            text-transform: uppercase;
            letter-spacing: 0.05em;
            border-bottom: 1px solid var(--border-color);
        }

        td {
            padding: 18px 24px;
            font-size: 14px;
            border-bottom: 1px solid var(--border-color);
            vertical-align: middle;
        }

        tr:last-child td {
            border-bottom: none;
        }

        tr:hover td {
            background-color: #f8fafc;
        }

        .badge-id {
            background: #f1f5f9;
            padding: 4px 8px;
            border-radius: 6px;
            font-family: monospace;
            font-weight: 600;
            color: var(--text-muted);
        }

        .action-btns {
            display: flex;
            gap: 12px;
        }

        .btn-icon {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 36px;
            height: 36px;
            border-radius: 8px;
            transition: all 0.2s ease;
            border: 1px solid transparent;
            cursor: pointer;
            text-decoration: none;
            background: transparent;
        }

        .btn-edit {
            color: #d97706;
            background-color: #fffbeb;
        }

        .btn-edit:hover {
            background-color: #fef3c7;
            border-color: #fde68a;
        }

        .btn-delete {
            color: #dc2626;
            background-color: #fef2f2;
        }

        .btn-delete:hover {
            background-color: #fee2e2;
            border-color: #fecaca;
        }

        .alert-success {
            background-color: #ecfdf5;
            border: 1px solid #ccebeef;
            color: #065f46;
            padding: 14px 20px;
            border-radius: 10px;
            margin-bottom: 24px;
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 14px;
            font-weight: 500;
        }

        @media (max-width: 640px) {
            .header-section {
                flex-direction: column;
                align-items: flex-start;
                gap: 16px;
            }
            .btn-add {
                width: 100%;
                justify-content: center;
            }
        }
    </style>
</head>
<body>

<div class="container">
    <div class="header-section">
        <h1>Data Guru</h1>
        <a href="{{ route('guru.create') }}" class="btn-add">
            <i data-lucide="plus" size="18"></i>
            Tambah Guru Baru
        </a>
    </div>

    @if(session('success'))
        <div class="alert-success">
            <i data-lucide="check-circle" size="18"></i>
            {{ session('success') }}
        </div>
    @endif

    <div class="card">
        <div class="table-responsive">
            <table>
                <thead>
                    <tr>
                        <th style="width: 80px;">No</th>
                        <th>Nama Lengkap</th>
                        <th>NIP</th>
                        <th>No. Telepon</th>
                        <th style="text-align: right;">Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($guru as $item)
                    <tr>
                        <td><span class="badge-id">{{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}</span></td>
                        <td style="font-weight: 500;">{{ $item->nama_guru }}</td>
                        <td style="color: var(--text-muted);">{{ $item->nip }}</td>
                        <td>{{ $item->no_hp }}</td>
                        <td style="text-align: right;">
                            <div class="action-btns" style="justify-content: flex-end;">
                                <a href="{{ route('guru.edit', $item->guru_id) }}" class="btn-icon btn-edit" title="Edit Data">
                                    <i data-lucide="edit-3" size="18"></i>
                                </a>

                                <form action="{{ route('guru.destroy', $item->guru_id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-icon btn-delete" title="Hapus Data">
                                        <i data-lucide="trash-2" size="18"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" style="text-align: center; padding: 40px; color: var(--text-muted);">
                            Belum ada data guru yang tersedia.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    // Initialize Lucide icons
    lucide.createIcons();
</script>

</body>
</html>
