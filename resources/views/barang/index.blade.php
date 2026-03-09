@extends('layouts.app')

@section('title', 'Data Barang')
@section('header-title', 'Manajemen Barang')
@section('page-title', 'Data Barang')
@section('page-icon', 'fas fa-box')
@section('breadcrumb', 'Data Barang')

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
        font-size: 13px;
        font-weight: 600;
        color: #475569;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        text-align: left;
        border-bottom: 1px solid rgba(0, 0, 0, 0.05);
    }

    td {
        padding: 18px;
        color: #1e293b;
        font-size: 14px;
        border-bottom: 1px solid rgba(0, 0, 0, 0.03);
    }

    tbody tr {
        transition: all 0.3s ease;
    }

    tbody tr:hover {
        background: #f8faff;
        transform: scale(1.01);
        box-shadow: 0 5px 15px rgba(79, 70, 229, 0.08);
    }

    /* Badge */
    .badge {
        padding: 6px 14px;
        border-radius: 40px;
        font-size: 12px;
        font-weight: 600;
        display: inline-flex;
        align-items: center;
        gap: 6px;
        letter-spacing: 0.3px;
    }

    .badge-success {
        background: linear-gradient(145deg, #10b981, #059669);
        color: white;
        box-shadow: 0 5px 12px rgba(16, 185, 129, 0.3);
    }

    .badge-danger {
        background: linear-gradient(145deg, #ef4444, #dc2626);
        color: white;
        box-shadow: 0 5px 12px rgba(239, 68, 68, 0.3);
    }

    /* Action Buttons */
    .action-buttons {
        display: flex;
        gap: 8px;
        align-items: center;
        flex-wrap: wrap;
    }

    .btn-edit {
        background: linear-gradient(145deg, #f97316, #ea580c);
        color: white;
        padding: 8px 16px;
        border-radius: 30px;
        text-decoration: none;
        font-size: 12px;
        font-weight: 600;
        display: inline-flex;
        align-items: center;
        gap: 6px;
        box-shadow: 0 5px 12px rgba(249, 115, 22, 0.25);
        transition: all 0.3s ease;
        border: none;
        cursor: pointer;
    }

    .btn-edit:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 18px rgba(249, 115, 22, 0.35);
    }

    .btn-delete {
        background: linear-gradient(145deg, #ef4444, #dc2626);
        color: white;
        padding: 8px 16px;
        border-radius: 30px;
        border: none;
        font-size: 12px;
        font-weight: 600;
        display: inline-flex;
        align-items: center;
        gap: 6px;
        box-shadow: 0 5px 12px rgba(239, 68, 68, 0.25);
        transition: all 0.3s ease;
        cursor: pointer;
    }

    .btn-delete:hover {
        transform: translateY(-2px);
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
    @media (max-width: 768px) {
        table {
            display: block;
            overflow-x: auto;
        }
        
        .action-buttons {
            flex-direction: column;
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

    <div style="display: flex; justify-content: flex-end; margin-bottom: 20px;">
        <a href="{{ route('barang.create') }}" class="btn-primary">
            <i class="fas fa-plus"></i> Tambah Barang Baru
        </a>
    </div>

    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode Barang</th>
                    <th>Nama Barang</th>
                    <th>Total</th>
                    <th>Tersedia</th>
                    <th>Kondisi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($barang as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td><strong>{{ $item->kode_barang }}</strong></td>
                    <td>{{ $item->nama_barang }}</td>
                    <td>{{ $item->jumlah_total }}</td>
                    <td>{{ $item->jumlah_tersedia }}</td>
                    <td>
                        @if($item->kondisi == 'baik')
                            <span class="badge badge-success">
                                <i class="fas fa-check-circle"></i> Baik
                            </span>
                        @else
                            <span class="badge badge-danger">
                                <i class="fas fa-exclamation-circle"></i> Rusak
                            </span>
                        @endif
                    </td>
                    <td>
                        <div class="action-buttons">
                            <a href="{{ route('barang.edit', $item->barang_id) }}" class="btn-edit">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <form action="{{ route('barang.destroy', $item->barang_id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-delete" onclick="return confirm('Yakin ingin menghapus barang ini?')">
                                    <i class="fas fa-trash"></i> Hapus
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7">
                        <div class="empty-state">
                            <i class="fas fa-box-open"></i>
                            <p>Belum ada data barang</p>
                            <a href="{{ route('barang.create') }}" class="btn-primary">
                                <i class="fas fa-plus"></i> Tambah Barang Pertama
                            </a>
                        </div>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection