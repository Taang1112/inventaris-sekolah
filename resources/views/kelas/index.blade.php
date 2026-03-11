@extends('layouts.app')

@section('title', 'Data Kelas')
@section('header-title', 'Manajemen Kelas')
@section('page-title', 'Data Kelas')
@section('page-icon', 'fas fa-door-open')
@section('breadcrumb', 'Data Kelas')

@section('styles')
<style>
    /* Alert Success */
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

    .alert-success i {
        font-size: 20px;
        color: #10b981;
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

    table {
        width: 100%;
        border-collapse: collapse;
    }

    thead tr {
        background: linear-gradient(145deg, #f8fafc, #f1f5f9);
    }

    th {
        padding: 20px 24px;
        font-size: 13px;
        font-weight: 600;
        color: #475569;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        text-align: left;
        border-bottom: 1px solid rgba(0, 0, 0, 0.05);
    }

    td {
        padding: 18px 24px;
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

    /* Wali Kelas Info */
    .wali-info {
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .wali-avatar {
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

    .wali-details {
        display: flex;
        flex-direction: column;
    }

    .wali-name {
        font-weight: 600;
        color: #1e293b;
    }

    .wali-label {
        font-size: 11px;
        color: #94a3b8;
    }

    /* Action Buttons */
    .action-btns {
        display: flex;
        gap: 8px;
        align-items: center;
        flex-wrap: wrap;
        justify-content: flex-end;
    }

    .btn-icon {
        width: 40px;
        height: 40px;
        border-radius: 14px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
        border: none;
        cursor: pointer;
        text-decoration: none;
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

    .btn-edit i {
        font-size: 18px;
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

    .btn-delete i {
        font-size: 18px;
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
        
        table {
            display: block;
            overflow-x: auto;
        }
        
        .btn-primary {
            width: 100%;
            justify-content: center;
        }
        
        .action-btns {
            justify-content: flex-start;
        }
        
        .wali-info {
            flex-direction: column;
            align-items: flex-start;
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

    <div class="action-bar">
        <a href="{{ route('kelas.create') }}" class="btn-primary">
            <i class="fas fa-plus"></i> Tambah Kelas Baru
        </a>

        <div class="export-buttons">
            <a href="{{ route('kelas.export') }}" class="btn-excel" target="_blank">
                <i class="fas fa-file-excel"></i> Export Excel
            </a>
        </div>
    </div>

    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th style="width: 80px;">No</th>
                    <th>Nama Kelas</th>
                    <th>Wali Kelas</th>
                    <th style="text-align: right;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($kelas as $index => $k)
                <tr>
                    <td>
                        <span class="badge-no">{{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}</span>
                    </td>
                    <td style="font-weight: 600;">
                        <div style="display: flex; align-items: center; gap: 10px;">
                            <i class="fas fa-door-open" style="color: #4f46e5; font-size: 18px;"></i>
                            {{ $k->nama_kelas }}
                        </div>
                    </td>
                    <td>
                        @if($k->guru)
                            <div class="wali-info">
                                <div class="wali-avatar">
                                    {{ substr($k->guru->nama_guru, 0, 1) }}
                                </div>
                                <div class="wali-details">
                                    <span class="wali-name">{{ $k->guru->nama_guru }}</span>
                                    <span class="wali-label">Wali Kelas</span>
                                </div>
                            </div>
                        @else
                            <span style="color: #94a3b8; font-style: italic;">
                                <i class="fas fa-minus-circle"></i> Belum ada wali
                            </span>
                        @endif
                    </td>
                    <td style="text-align: right;">
                        <div class="action-btns">
                            <a href="{{ route('kelas.edit', $k->kelas_id) }}" class="btn-icon btn-edit" title="Edit Data">
                                <i class="fas fa-edit"></i>
                            </a>

                            <form action="{{ route('kelas.destroy', $k->kelas_id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus kelas ini?')" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-icon btn-delete" title="Hapus Data">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4">
                        <div class="empty-state">
                            <i class="fas fa-door-open"></i>
                            <p>Belum ada data kelas yang tersedia</p>
                            <a href="{{ route('kelas.create') }}" class="btn-primary">
                                <i class="fas fa-plus"></i> Tambah Kelas Pertama
                            </a>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection