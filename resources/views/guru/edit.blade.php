<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Guru | Inventaris Sekolah</title>
    
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
            --error: #ef4444;
            --success: #10b981;
            --success-hover: #059669;
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
            display: flex;
            justify-content: center;
            align-items: flex-start;
            min-height: 100vh;
        }

        .wrapper {
            width: 100%;
            max-width: 540px;
        }

        .header-section {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 32px;
        }

        .btn-back {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            background: var(--white);
            border: 1px solid var(--border-color);
            border-radius: 10px;
            color: var(--text-main);
            text-decoration: none;
            transition: all 0.2s ease;
        }

        .btn-back:hover {
            background: #f1f5f9;
            transform: translateX(-2px);
        }

        .header-section h1 {
            font-size: 24px;
            font-weight: 700;
            letter-spacing: -0.025em;
        }

        .card {
            background: var(--white);
            border-radius: 16px;
            box-shadow: var(--card-shadow);
            border: 1px solid var(--border-color);
            padding: 32px;
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(12px);
        }

        .form-group {
            margin-bottom: 24px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-size: 14px;
            font-weight: 600;
            color: var(--text-main);
        }

        .form-control {
            width: 100%;
            padding: 12px 16px;
            border-radius: 10px;
            border: 1px solid var(--border-color);
            background-color: #fcfdfe;
            font-size: 15px;
            transition: all 0.2s ease;
            outline: none;
        }

        .form-control:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 4px rgba(99, 102, 241, 0.1);
            background-color: var(--white);
        }

        .alert-error {
            background-color: #fef2f2;
            border: 1px solid #fee2e2;
            color: var(--error);
            padding: 16px;
            border-radius: 12px;
            margin-bottom: 24px;
            font-size: 14px;
        }

        .alert-error ul {
            list-style: none;
            padding-left: 0;
        }

        .alert-error li {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .alert-error li::before {
            content: "";
            display: block;
            width: 4px;
            height: 4px;
            background-color: var(--error);
            border-radius: 50%;
        }

        .btn-submit {
            width: 100%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            background-color: var(--success);
            color: var(--white);
            border: none;
            padding: 14px;
            border-radius: 10px;
            font-weight: 700;
            font-size: 16px;
            cursor: pointer;
            transition: all 0.2s ease;
            box-shadow: 0 4px 6px -1px rgba(16, 185, 129, 0.3);
            margin-top: 8px;
        }

        .btn-submit:hover {
            background-color: var(--success-hover);
            transform: translateY(-1px);
            box-shadow: 0 6px 10px -1px rgba(16, 185, 129, 0.4);
        }

        .btn-submit:active {
            transform: translateY(0);
        }
    </style>
</head>
<body>

<div class="wrapper">
    <div class="header-section">
        <a href="{{ route('guru.index') }}" class="btn-back" title="Kembali">
            <i data-lucide="chevron-left" size="20"></i>
        </a>
        <h1>Edit Data Guru</h1>
    </div>

    @if ($errors->any())
        <div class="alert-error">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card">
        <form action="{{ route('guru.update', $guru->guru_id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="nama_guru">Nama Lengkap Guru</label>
                <input type="text" id="nama_guru" name="nama_guru" class="form-control" placeholder="Contoh: Budi Santoso, S.Pd." value="{{ old('nama_guru', $guru->nama_guru) }}" required autofocus>
            </div>

            <div class="form-group">
                <label for="nip">Nomer Induk Pegawai (NIP)</label>
                <input type="text" id="nip" name="nip" class="form-control" placeholder="Isikan 18 digit NIP" value="{{ old('nip', $guru->nip) }}" required>
            </div>

            <div class="form-group">
                <label for="no_hp">Nomer Telepon / WhatsApp</label>
                <input type="text" id="no_hp" name="no_hp" class="form-control" placeholder="Contoh: 08123456789" value="{{ old('no_hp', $guru->no_hp) }}" required>
            </div>

            <button type="submit" class="btn-submit">
                <i data-lucide="pencil-line" size="20"></i>
                Perbarui Data Guru
            </button>
        </form>
    </div>
</div>

<script>
    // Initialize Lucide icons
    lucide.createIcons();
</script>

</body>
</html>
