@extends('layouts.app')

@section('title', 'Tambah Peminjaman')
@section('header-title', 'Manajemen Peminjaman')
@section('page-title', 'Tambah Peminjaman Baru')
@section('page-icon', 'fas fa-plus-circle')
@section('breadcrumb', 'Tambah Peminjaman')

@section('styles')
<style>
    /* Form Container */
    .form-container {
        background: white;
        border-radius: 28px;
        padding: 35px;
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.03);
        border: 1px solid rgba(255, 255, 255, 0.5);
        max-width: 800px;
        margin: 0 auto;
    }

    /* Error Alert */
    .error-alert {
        background: linear-gradient(145deg, #fee2e2, #fecaca);
        color: #991b1b;
        padding: 20px 24px;
        border-radius: 20px;
        margin-bottom: 30px;
        border-left: 5px solid #ef4444;
    }

    .error-alert ul {
        list-style: none;
        margin-left: 20px;
        margin-top: 10px;
    }

    .error-alert li {
        margin: 8px 0;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .error-alert li i {
        color: #ef4444;
        font-size: 14px;
    }

    .error-alert strong {
        display: block;
        margin-bottom: 5px;
        font-size: 16px;
    }

    /* Form Group */
    .form-group {
        margin-bottom: 25px;
    }

    label {
        display: block;
        font-size: 14px;
        font-weight: 600;
        color: #475569;
        margin-bottom: 8px;
        letter-spacing: 0.3px;
    }

    .input-wrapper {
        position: relative;
        display: flex;
        align-items: center;
    }

    .input-icon {
        position: absolute;
        left: 16px;
        color: #94a3b8;
        font-size: 18px;
        transition: all 0.3s ease;
    }

    input, select {
        width: 100%;
        padding: 16px 20px 16px 50px;
        border: 2px solid #e2e8f0;
        border-radius: 20px;
        font-size: 15px;
        font-family: 'Inter', sans-serif;
        transition: all 0.3s ease;
        background: white;
        color: #1e293b;
    }

    input:focus, select:focus {
        border-color: #4f46e5;
        box-shadow: 0 0 0 4px rgba(79, 70, 229, 0.1);
        outline: none;
    }

    input:focus + .input-icon,
    select:focus + .input-icon {
        color: #4f46e5;
    }

    input:hover, select:hover {
        border-color: #94a3b8;
    }

    /* Select Styling */
    select {
        appearance: none;
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='0 0 24 24' fill='none' stroke='%2394a3b8' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpolyline points='6 9 12 15 18 9'%3E%3C/polyline%3E%3C/svg%3E");
        background-repeat: no-repeat;
        background-position: right 16px center;
        background-size: 16px;
    }

    /* Helper Text */
    .helper-text {
        font-size: 12px;
        color: #94a3b8;
        margin-top: 6px;
        margin-left: 16px;
        display: flex;
        align-items: center;
        gap: 5px;
    }

    .stock-info {
        background: linear-gradient(145deg, #eef2ff, #e0e7ff);
        color: #4f46e5;
        padding: 3px 10px;
        border-radius: 30px;
        font-size: 11px;
        font-weight: 600;
        margin-left: 10px;
    }

    /* Form Actions */
    .form-actions {
        display: flex;
        gap: 15px;
        margin-top: 35px;
    }

    .btn-primary {
        background: linear-gradient(145deg, #4f46e5, #7c3aed);
        color: white;
        padding: 16px 30px;
        border-radius: 40px;
        text-decoration: none;
        font-weight: 600;
        font-size: 15px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        box-shadow: 0 10px 25px rgba(79, 70, 229, 0.3);
        transition: all 0.3s ease;
        border: none;
        cursor: pointer;
        flex: 1;
    }

    .btn-primary:hover {
        transform: translateY(-3px);
        box-shadow: 0 15px 30px rgba(79, 70, 229, 0.4);
    }

    .btn-secondary {
        background: white;
        color: #64748b;
        padding: 16px 30px;
        border-radius: 40px;
        text-decoration: none;
        font-weight: 600;
        font-size: 15px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        border: 2px solid #e2e8f0;
        transition: all 0.3s ease;
        flex: 1;
    }

    .btn-secondary:hover {
        background: #f8fafc;
        border-color: #94a3b8;
        color: #1e293b;
        transform: translateY(-2px);
    }

    /* Info Card */
    .info-card {
        background: linear-gradient(145deg, #eef2ff, #e0e7ff);
        border-radius: 20px;
        padding: 20px;
        margin-bottom: 30px;
        display: flex;
        align-items: center;
        gap: 15px;
        border-left: 5px solid #4f46e5;
    }

    .info-card i {
        font-size: 28px;
        color: #4f46e5;
        background: white;
        width: 50px;
        height: 50px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 16px;
        box-shadow: 0 5px 15px rgba(79, 70, 229, 0.2);
    }

    .info-card p {
        color: #1e293b;
        font-size: 14px;
        line-height: 1.6;
        flex: 1;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .form-container {
            padding: 20px;
        }
        
        .form-actions {
            flex-direction: column;
        }
        
        .info-card {
            flex-direction: column;
            text-align: center;
        }
    }
</style>
@endsection

@section('content')
    <div class="form-container">
        @if(session('error'))
            <div class="error-alert">
                <strong><i class="fas fa-exclamation-triangle"></i> Error:</strong>
                <ul>
                    <li>
                        <i class="fas fa-times-circle"></i>
                        {{ session('error') }}
                    </li>
                </ul>
            </div>
        @endif

        @if ($errors->any())
            <div class="error-alert">
                <strong><i class="fas fa-exclamation-triangle"></i> Terdapat kesalahan:</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>
                            <i class="fas fa-times-circle"></i>
                            {{ $error }}
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="info-card">
            <i class="fas fa-book"></i>
            <p>Isi formulir berikut untuk mencatat peminjaman barang. Pastikan jumlah pinjam tidak melebihi stok tersedia.</p>
        </div>

        <form action="{{ route('peminjaman.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label>Guru <span style="color: #ef4444;">*</span></label>
                <div class="input-wrapper">
                    <i class="fas fa-chalkboard-teacher input-icon"></i>
                    <select name="guru_id" required>
                        <option value="">-- Pilih Guru --</option>
                        @foreach($guru as $g)
                            <option value="{{ $g->guru_id }}" {{ old('guru_id') == $g->guru_id ? 'selected' : '' }}>
                                {{ $g->nama_guru }} (NIP: {{ $g->nip }})
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label>Kelas <span style="color: #ef4444;">*</span></label>
                <div class="input-wrapper">
                    <i class="fas fa-door-open input-icon"></i>
                    <select name="kelas_id" required>
                        <option value="">-- Pilih Kelas --</option>
                        @foreach($kelas as $k)
                            <option value="{{ $k->kelas_id }}" {{ old('kelas_id') == $k->kelas_id ? 'selected' : '' }}>
                                {{ $k->nama_kelas }} 
                                @if($k->guru)
                                    (Wali: {{ $k->guru->nama_guru }})
                                @endif
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label>Barang <span style="color: #ef4444;">*</span></label>
                <div class="input-wrapper">
                    <i class="fas fa-box input-icon"></i>
                    <select name="barang_id" id="barangSelect" required>
                        <option value="">-- Pilih Barang --</option>
                        @foreach($barang as $b)
                            <option value="{{ $b->barang_id }}" 
                                    data-stok="{{ $b->jumlah_tersedia }}"
                                    {{ old('barang_id') == $b->barang_id ? 'selected' : '' }}>
                                {{ $b->nama_barang }} 
                                (Kode: {{ $b->kode_barang }} - Stok: {{ $b->jumlah_tersedia }})
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="helper-text" id="stockInfo">
                    <i class="fas fa-info-circle"></i> Pilih barang untuk melihat stok tersedia
                </div>
            </div>

            <div class="form-group">
                <label>Jumlah Pinjam <span style="color: #ef4444;">*</span></label>
                <div class="input-wrapper">
                    <i class="fas fa-calculator input-icon"></i>
                    <input type="number" name="jumlah_pinjam" id="jumlahPinjam" min="1" value="{{ old('jumlah_pinjam') }}" required>
                </div>
                <div class="helper-text">
                    <i class="fas fa-info-circle"></i> Maksimal stok tersedia: <span id="maxStock">-</span>
                </div>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn-primary">
                    <i class="fas fa-save"></i> Simpan Peminjaman
                </button>
                <a href="{{ route('peminjaman.index') }}" class="btn-secondary">
                    <i class="fas fa-times"></i> Batal
                </a>
            </div>
        </form>
    </div>

    <script>
        document.getElementById('barangSelect')?.addEventListener('change', function() {
            const selected = this.options[this.selectedIndex];
            const stok = selected.dataset.stok;
            const stockInfo = document.getElementById('stockInfo');
            const jumlahInput = document.getElementById('jumlahPinjam');
            const maxStockSpan = document.getElementById('maxStock');
            
            if (stok) {
                stockInfo.innerHTML = `<i class="fas fa-check-circle" style="color: #10b981;"></i> Stok tersedia: <strong>${stok}</strong> barang`;
                jumlahInput.max = stok;
                maxStockSpan.innerText = stok;
                maxStockSpan.style.color = '#4f46e5';
                maxStockSpan.style.fontWeight = '600';
            } else {
                stockInfo.innerHTML = `<i class="fas fa-info-circle"></i> Pilih barang untuk melihat stok tersedia`;
                jumlahInput.max = '';
                maxStockSpan.innerText = '-';
            }
        });

        // Trigger on page load if old value exists
        window.addEventListener('load', function() {
            const event = new Event('change');
            document.getElementById('barangSelect')?.dispatchEvent(event);
        });
    </script>
@endsection