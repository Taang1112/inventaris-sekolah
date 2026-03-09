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

    /* Table Premium */
    .table-container {
        background: white;
        border-radius: 28px;
        overflow: hidden;
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.03);
        border: 1px solid rgba(255, 255, 255, 0.5);
        margin-top: 20px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    thead tr {
        background: linear-gradient(145deg, #f8fafc, #f1f5f9);
    }

    th {
        padding: 20px 18px;
        font-size: 12px;
        font-weight: 600;
        color: #475569;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        text-align: left;
        border-bottom: 1px solid rgba(0, 0, 0, 0.05);
    }

    td {
        padding: 16px 18px;
        color: #1e293b;
        font-size: 14px;
        border-bottom: 1px solid rgba(0, 0, 0, 0.03);
        vertical-align: middle;
    }

    tbody tr {
        transition: all 0.3s ease;
    }

    tbody tr:hover {
        background: #f8faff;
        transform: scale(1.01);
        box-shadow: 0 5px 15px rgba(79, 70, 229, 0.08);
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
        gap: 8px;
    }

    .info-avatar {
        width: 36px;
        height: 36px;
        background: linear-gradient(145deg, #4f46e5, #7c3aed);
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 16px;
        font-weight: 600;
        box-shadow: 0 5px 10px rgba(79, 70, 229, 0.2);
    }

    .info-details {
        display: flex;
        flex-direction: column;
    }

    .info-name {
        font-weight: 600;
        color: #1e293b;
        font-size: 14px;
    }

    .info-label {
        font-size: 11px;
        color: #94a3b8;
    }

    /* Status Badge */
    .status-badge {
        padding: 6px 14px;
        border-radius: 40px;
        font-size: 12px;
        font-weight: 600;
        display: inline-flex;
        align-items: center;
        gap: 6px;
        letter-spacing: 0.3px;
    }

    .status-dipinjam {
        background: linear-gradient(145deg, #f97316, #ea580c);
        color: white;
        box-shadow: 0 5px 12px rgba(249, 115, 22, 0.25);
    }

    .status-dikembalikan {
        background: linear-gradient(145deg, #10b981, #059669);
        color: white;
        box-shadow: 0 5px 12px rgba(16, 185, 129, 0.25);
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
        font-size: 12px;
        font-weight: 600;
        display: inline-flex;
        align-items: center;
        gap: 6px;
        text-decoration: none;
        border: none;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .btn-edit {
        background: linear-gradient(145deg, #f97316, #ea580c);
        color: white;
        box-shadow: 0 5px 12px rgba(249, 115, 22, 0.25);
    }

    .btn-edit:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 18px rgba(249, 115, 22, 0.35);
    }

    .btn-kembali {
        background: linear-gradient(145deg, #10b981, #059669);
        color: white;
        box-shadow: 0 5px 12px rgba(16, 185, 129, 0.25);
    }

    .btn-kembali:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 18px rgba(16, 185, 129, 0.35);
    }

    .btn-delete {
        background: linear-gradient(145deg, #ef4444, #dc2626);
        color: white;
        box-shadow: 0 5px 12px rgba(239, 68, 68, 0.25);
    }

    .btn-delete:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 18px rgba(239, 68, 68, 0.35);
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
    @media (max-width: 1024px) {
        table {
            display: block;
            overflow-x: auto;
        }
        
        .btn-primary {
            width: 100%;
            justify-content: center;
        }
        
        .action-btns {
            flex-direction: column;
            align-items: flex-start;
        }
        
        .info-relasi {
            min-width: 180px;
        }
    }

    @media (max-width: 768px) {
        th, td {
            padding: 12px 10px;
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

    <div style="display: flex; justify-content: flex-end; margin-bottom: 20px;">
        <a href="{{ route('peminjaman.create') }}" class="btn-primary">
            <i class="fas fa-plus"></i> Tambah Peminjaman
        </a>
    </div>

    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Guru</th>
                    <th>Kelas</th>
                    <th>Barang</th>
                    <th>Jumlah</th>
                    <th>Tanggal Pinjam</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($data as $index => $row)
                <tr>
                    <td>
                        <span class="badge-no">{{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}</span>
                    </td>
                    <td>
                        <div class="info-relasi">
                            <div class="info-avatar" style="background: linear-gradient(145deg, #4f46e5, #7c3aed);">
                                {{ substr($row->guru->nama_guru ?? '?', 0, 1) }}
                            </div>
                            <div class="info-details">
                                <span class="info-name">{{ $row->guru->nama_guru ?? '-' }}</span>
                                <span class="info-label">Guru</span>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="info-relasi">
                            <div class="info-avatar" style="background: linear-gradient(145deg, #06b6d4, #0891b2);">
                                {{ substr($row->kelas->nama_kelas ?? '?', 0, 1) }}
                            </div>
                            <div class="info-details">
                                <span class="info-name">{{ $row->kelas->nama_kelas ?? '-' }}</span>
                                <span class="info-label">Kelas</span>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="info-relasi">
                            <div class="info-avatar" style="background: linear-gradient(145deg, #f97316, #ea580c);">
                                {{ substr($row->barang->nama_barang ?? '?', 0, 1) }}
                            </div>
                            <div class="info-details">
                                <span class="info-name">{{ $row->barang->nama_barang ?? '-' }}</span>
                                <span class="info-label">Barang</span>
                            </div>
                        </div>
                    </td>
                    <td>
                        <span style="font-weight: 600; color: #4f46e5;">{{ $row->jumlah_pinjam }}</span>
                    </td>
                    <td>
                        <div style="display: flex; align-items: center; gap: 6px;">
                            <i class="fas fa-calendar-alt" style="color: #94a3b8; font-size: 12px;"></i>
                            {{ \Carbon\Carbon::parse($row->tanggal_pinjam)->format('d M Y') }}
                        </div>
                    </td>
                    <td>
                        @if($row->status == 'dipinjam')
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
                        <div class="action-btns">
                            @if($row->status == 'dipinjam')
                                <a href="{{ route('peminjaman.edit', $row->peminjaman_id) }}" class="btn-action btn-edit" title="Edit Peminjaman">
                                    <i class="fas fa-edit"></i> Edit
                                </a>

                                <a href="{{ route('peminjaman.kembalikan', $row->peminjaman_id) }}" 
                                   class="btn-action btn-kembali" 
                                   title="Kembalikan Barang"
                                   onclick="return confirm('Apakah Anda yakin barang ini sudah dikembalikan?')">
                                    <i class="fas fa-undo-alt"></i> Kembalikan
                                </a>
                            @else
                                <span style="color: #94a3b8; font-style: italic;">-</span>
                            @endif
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="8">
                        <div class="empty-state">
                            <i class="fas fa-book"></i>
                            <p>Belum ada data peminjaman</p>
                            <a href="{{ route('peminjaman.create') }}" class="btn-primary">
                                <i class="fas fa-plus"></i> Tambah Peminjaman Pertama
                            </a>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection