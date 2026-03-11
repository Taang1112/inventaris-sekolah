@extends('layouts.app')

@section('title', 'Data Peminjaman')
@section('header-title', 'Manajemen Peminjaman')
@section('page-title', 'Data Peminjaman')
@section('page-icon', 'fas fa-book')
@section('breadcrumb', 'Data Peminjaman')

@section('styles')
<style>
    /* Alert Success & Error */
    .alert-success {
        background: linear-gradient(145deg, #d1fae5, #a7f3d0);
        color: #065f46;
        padding: 16px 24px;
        border-radius: 20px;
        margin-bottom: 30px;
        display: flex;
        align-items: center;
        gap: 12px;
        font-weight: 500;
        border-left: 5px solid #10b981;
        animation: slideIn 0.3s ease;
    }

    .alert-error {
        background: linear-gradient(145deg, #fee2e2, #fecaca);
        color: #991b1b;
        padding: 16px 24px;
        border-radius: 20px;
        margin-bottom: 30px;
        display: flex;
        align-items: center;
        gap: 12px;
        font-weight: 500;
        border-left: 5px solid #ef4444;
        animation: slideIn 0.3s ease;
    }

    .alert-success i {
        font-size: 20px;
        color: #10b981;
    }

    .alert-error i {
        font-size: 20px;
        color: #ef4444;
    }

    @keyframes slideIn {
        from {
            opacity: 0;
            transform: translateX(-20px);
        }
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

    /* Action Bar */
    .action-bar {
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 15px;
        margin-bottom: 20px;
    }

    .export-buttons {
        display: flex;
        gap: 10px;
        flex-wrap: wrap;
    }

    /* Button Primary */
    .btn-primary {
        background: linear-gradient(145deg, #4f46e5, #7c3aed);
        color: white;
        padding: 12px 28px;
        border-radius: 40px;
        text-decoration: none;
        font-weight: 600;
        font-size: 14px;
        display: inline-flex;
        align-items: center;
        gap: 10px;
        box-shadow: 0 10px 25px rgba(79, 70, 229, 0.3);
        transition: all 0.3s ease;
        border: none;
        cursor: pointer;
    }

    .btn-primary:hover {
        transform: translateY(-3px);
        box-shadow: 0 15px 30px rgba(79, 70, 229, 0.4);
    }

    .btn-primary i {
        font-size: 16px;
    }

    /* Button Export */
    .btn-excel {
        background: linear-gradient(145deg, #10b981, #059669);
        color: white;
        padding: 12px 24px;
        border-radius: 40px;
        text-decoration: none;
        font-weight: 600;
        font-size: 14px;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        box-shadow: 0 10px 25px rgba(16, 185, 129, 0.3);
        transition: all 0.3s ease;
        border: none;
        cursor: pointer;
    }

    .btn-excel:hover {
        transform: translateY(-3px);
        box-shadow: 0 15px 30px rgba(16, 185, 129, 0.4);
    }

    .btn-pdf {
        background: linear-gradient(145deg, #ef4444, #dc2626);
        color: white;
        padding: 12px 24px;
        border-radius: 40px;
        text-decoration: none;
        font-weight: 600;
        font-size: 14px;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        box-shadow: 0 10px 25px rgba(239, 68, 68, 0.3);
        transition: all 0.3s ease;
        border: none;
        cursor: pointer;
    }

    .btn-pdf:hover {
        transform: translateY(-3px);
        box-shadow: 0 15px 30px rgba(239, 68, 68, 0.4);
    }

    /* Table Premium */
    .table-container {
        background: white;
        border-radius: 28px;
        overflow: hidden;
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.03);
        border: 1px solid rgba(255, 255, 255, 0.5);
        margin-top: 20px;
    }

    .table-responsive {
        overflow-x: auto;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        min-width: 1200px;
    }

    thead tr {
        background: linear-gradient(145deg, #4f46e5, #7c3aed);
    }

    th {
        padding: 16px 18px;
        font-size: 12px;
        font-weight: 600;
        color: white;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        text-align: left;
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    }

    td {
        padding: 14px 18px;
        color: #1e293b;
        font-size: 13px;
        border-bottom: 1px solid #e2e8f0;
        vertical-align: middle;
    }

    tbody tr {
        transition: all 0.3s ease;
    }

    tbody tr:hover {
        background: #eef2ff;
    }

    tbody tr:nth-child(even) {
        background-color: #f8fafc;
    }

    /* Badge No */
    .badge-no {
        background: linear-gradient(145deg, #f1f5f9, #e2e8f0);
        padding: 6px 14px;
        border-radius: 30px;
        font-family: 'Inter', monospace;
        font-weight: 600;
        font-size: 12px;
        color: #475569;
        display: inline-block;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.02);
    }

    /* Info Relasi */
    .info-relasi {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .info-avatar {
        width: 36px;
        height: 36px;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 14px;
        font-weight: 600;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        flex-shrink: 0;
    }

    .avatar-guru {
        background: linear-gradient(145deg, #4f46e5, #7c3aed);
    }

    .avatar-kelas {
        background: linear-gradient(145deg, #06b6d4, #0891b2);
    }

    .avatar-barang {
        background: linear-gradient(145deg, #f97316, #ea580c);
    }

    .info-details {
        display: flex;
        flex-direction: column;
    }

    .info-name {
        font-weight: 600;
        color: #1e293b;
        font-size: 13px;
    }

    .info-label {
        font-size: 10px;
        color: #64748b;
    }

    /* Status Badge */
    .status-badge {
        padding: 6px 14px;
        border-radius: 40px;
        font-size: 11px;
        font-weight: 600;
        display: inline-flex;
        align-items: center;
        gap: 6px;
        letter-spacing: 0.3px;
        color: white;
    }

    .status-dipinjam {
        background: linear-gradient(145deg, #f97316, #ea580c);
        box-shadow: 0 4px 10px rgba(249, 115, 22, 0.3);
    }

    .status-dikembalikan {
        background: linear-gradient(145deg, #10b981, #059669);
        box-shadow: 0 4px 10px rgba(16, 185, 129, 0.3);
    }

    /* Tanggal Info */
    .tanggal-info {
        display: flex;
        flex-direction: column;
        gap: 4px;
    }

    .tanggal-item {
        display: flex;
        align-items: center;
        gap: 6px;
        font-size: 11px;
        color: #475569;
    }

    .tanggal-item i {
        color: #4f46e5;
        font-size: 10px;
        width: 14px;
    }

    /* Action Buttons */
    .action-btns {
        display: flex;
        gap: 8px;
        align-items: center;
        flex-wrap: wrap;
    }

    .btn-action {
        padding: 8px 16px;
        border-radius: 30px;
        font-size: 11px;
        font-weight: 600;
        display: inline-flex;
        align-items: center;
        gap: 6px;
        text-decoration: none;
        border: none;
        cursor: pointer;
        transition: all 0.3s ease;
        color: white;
    }

    .btn-edit {
        background: linear-gradient(145deg, #f97316, #ea580c);
        box-shadow: 0 4px 10px rgba(249, 115, 22, 0.25);
    }

    .btn-edit:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 15px rgba(249, 115, 22, 0.35);
    }

    .btn-kembali {
        background: linear-gradient(145deg, #10b981, #059669);
        box-shadow: 0 4px 10px rgba(16, 185, 129, 0.25);
    }

    .btn-kembali:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 15px rgba(16, 185, 129, 0.35);
    }

    .btn-done {
        background: linear-gradient(145deg, #64748b, #475569);
        box-shadow: 0 4px 10px rgba(100, 116, 139, 0.25);
        cursor: not-allowed;
        opacity: 0.7;
    }

    /* Jumlah Pinjam */
    .jumlah-pinjam {
        font-weight: 700;
        color: #4f46e5;
        font-size: 16px;
    }

    /* Empty State */
    .empty-state {
        text-align: center;
        padding: 60px 20px;
        background: #f8fafc;
        border-radius: 28px;
    }

    .empty-state i {
        font-size: 60px;
        color: #cbd5e1;
        margin-bottom: 20px;
    }

    .empty-state p {
        color: #64748b;
        font-size: 16px;
        margin-bottom: 20px;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .action-bar {
            flex-direction: column;
            align-items: flex-start;
        }
        
        .export-buttons {
            width: 100%;
            justify-content: space-between;
        }
        
        .btn-excel, .btn-pdf {
            flex: 1;
            justify-content: center;
        }
        
        .btn-primary {
            width: 100%;
            justify-content: center;
        }
    }
</style>
@endsection

@section('content')
    @if(session('success'))
        <div class="alert-success">
            <i class="fas fa-check-circle"></i>
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert-error">
            <i class="fas fa-exclamation-circle"></i>
            {{ session('error') }}
        </div>
    @endif

    <div class="action-bar">

    @if(auth()->user()->hasRole('user'))
    <a href="{{ route('peminjaman.create') }}" class="btn-primary">
        <i class="fas fa-plus"></i> Tambah Peminjaman
    </a>
   @endif

    <div class="export-buttons">
        <a href="{{ route('peminjaman.export') }}" class="btn-excel" target="_blank">
            <i class="fas fa-file-excel"></i> Export Excel
        </a>
        <a href="{{ route('export.pdf') }}?type=peminjaman" class="btn-pdf" target="_blank">
            <i class="fas fa-file-pdf"></i> Export PDF
        </a>
    </div>

</div>

    <div class="table-container">
        <div class="table-responsive">
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Guru</th>
                        <th>Kelas</th>
                        <th>Barang</th>
                        <th>Jumlah</th>
                        <th>Tanggal Pinjam</th>
                        <th>Tanggal Kembali</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($peminjaman as $index => $p)
                    <tr>
                        <td>
                            <span class="badge-no">{{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}</span>
                        </td>
                        <td>
                            <div class="info-relasi">
                                <div class="info-avatar avatar-guru">
                                    {{ substr($p->guru->nama_guru ?? '?', 0, 1) }}
                                </div>
                                <div class="info-details">
                                    <span class="info-name">{{ $p->guru->nama_guru ?? '-' }}</span>
                                    <span class="info-label">NIP: {{ $p->guru->nip ?? '-' }}</span>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="info-relasi">
                                <div class="info-avatar avatar-kelas">
                                    {{ substr($p->kelas->nama_kelas ?? '?', 0, 1) }}
                                </div>
                                <div class="info-details">
                                    <span class="info-name">{{ $p->kelas->nama_kelas ?? '-' }}</span>
                                    @if($p->kelas && $p->kelas->guru)
                                    <span class="info-label">Wali: {{ $p->kelas->guru->nama_guru ?? '-' }}</span>
                                    @endif
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="info-relasi">
                                <div class="info-avatar avatar-barang">
                                    {{ substr($p->barang->nama_barang ?? '?', 0, 1) }}
                                </div>
                                <div class="info-details">
                                    <span class="info-name">{{ $p->barang->nama_barang ?? '-' }}</span>
                                    <span class="info-label">{{ $p->barang->kode_barang ?? '-' }}</span>
                                </div>
                            </div>
                        </td>
                        <td>
                            <span class="jumlah-pinjam">{{ $p->jumlah_pinjam }}</span>
                        </td>
                        <td>
                            <div class="tanggal-info">
                                <div class="tanggal-item">
                                    <i class="fas fa-calendar-day"></i>
                                    <span>{{ \Carbon\Carbon::parse($p->tanggal_pinjam)->format('d/m/Y') }}</span>
                                </div>
                                <div class="tanggal-item">
                                    <i class="fas fa-clock"></i>
                                    <span>{{ \Carbon\Carbon::parse($p->tanggal_pinjam)->format('H:i') }}</span>
                                </div>
                            </div>
                        </td>
                        <td>
                            @if($p->tanggal_kembali)
                                <div class="tanggal-info">
                                    <div class="tanggal-item">
                                        <i class="fas fa-calendar-check"></i>
                                        <span>{{ \Carbon\Carbon::parse($p->tanggal_kembali)->format('d/m/Y') }}</span>
                                    </div>
                                    <div class="tanggal-item">
                                        <i class="fas fa-clock"></i>
                                        <span>{{ \Carbon\Carbon::parse($p->tanggal_kembali)->format('H:i') }}</span>
                                    </div>
                                </div>
                            @else
                                <span style="color: #94a3b8; font-style: italic;">-</span>
                            @endif
                        </td>
                        <td>
                            @if($p->status == 'dipinjam')
                                <span class="status-badge status-dipinjam">
                                    <i class="fas fa-clock"></i> Dipinjam
                                </span>
                            @else
                                <span class="status-badge status-dikembalikan">
                                    <i class="fas fa-check-circle"></i> Dikembalikan
                                </span>
                            @endif
                        </td>
                        <td>
                           @if(auth()->user()->hasRole('user'))
                            <div class="action-btns">
                                @if($p->status == 'dipinjam')
                                    <a href="{{ route('peminjaman.edit', $p->peminjaman_id) }}" class="btn-action btn-edit" title="Edit Peminjaman">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="{{ route('peminjaman.kembalikan', $p->peminjaman_id) }}" 
                                       class="btn-action btn-kembali" 
                                       title="Kembalikan Barang"
                                       onclick="return confirm('Apakah Anda yakin barang ini sudah dikembalikan?')">
                                        <i class="fas fa-undo-alt"></i>
                                    </a>
                                @else
                                    <span class="btn-action btn-done">
                                        <i class="fas fa-check"></i> Selesai
                                    </span>
                                @endif
                            </div>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="9">
                            <div class="empty-state">
                                <i class="fas fa-book"></i>
                                <p>Belum ada data peminjaman</p>
                               @if(auth()->user()->hasRole('user'))
                                <a href="{{ route('peminjaman.create') }}" class="btn-primary">
                                    <i class="fas fa-plus"></i> Tambah Peminjaman Pertama
                                </a>
                                @endif
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection