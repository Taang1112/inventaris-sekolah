@extends('layouts.app')

@section('title', 'Edit Guru')
@section('header-title', 'Manajemen Guru')
@section('page-title', 'Edit Data Guru')
@section('page-icon', 'fas fa-user-edit')
@section('breadcrumb', 'Edit Guru')

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

    input {
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

    input:focus {
        border-color: #4f46e5;
        box-shadow: 0 0 0 4px rgba(79, 70, 229, 0.1);
        outline: none;
    }

    input:focus + .input-icon {
        color: #4f46e5;
    }

    input:hover {
        border-color: #94a3b8;
    }

    /* Readonly input */
    input[readonly] {
        background: #f1f5f9;
        cursor: not-allowed;
        opacity: 0.8;
    }

    /* Helper Text */
    .helper-text {
        font-size: 12px;
        color: #94a3b8;
        margin-top: 6px;
        margin-left: 16px;
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

    .info-card strong {
        color: #4f46e5;
        font-weight: 700;
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
            <i class="fas fa-user-edit"></i>
            <p>Anda sedang mengedit data guru: <strong>{{ $guru->nama_guru }}</strong> (NIP: {{ $guru->nip }})</p>
        </div>

        <form action="{{ route('guru.update', $guru->guru_id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label>Nama Lengkap <span style="color: #ef4444;">*</span></label>
                <div class="input-wrapper">
                    <i class="fas fa-user input-icon"></i>
                    <input type="text" name="nama_guru" value="{{ old('nama_guru', $guru->nama_guru) }}" 
                           placeholder="Masukkan nama lengkap guru" required>
                </div>
            </div>

            <div class="form-group">
                <label>NIP <span style="color: #ef4444;">*</span></label>
                <div class="input-wrapper">
                    <i class="fas fa-id-card input-icon"></i>
                    <input type="text" name="nip" value="{{ old('nip', $guru->nip) }}" 
                           placeholder="Contoh: 198507152010011012" required 
                           {{-- optional: readonly jika NIP tidak boleh diubah --}}
                           >
                </div>
                <div class="helper-text">
                    <i class="fas fa-info-circle"></i> Nomor Induk Pegawai
                </div>
            </div>

            <div class="form-group">
                <label>No. Telepon <span style="color: #ef4444;">*</span></label>
                <div class="input-wrapper">
                    <i class="fas fa-phone-alt input-icon"></i>
                    <input type="text" name="no_hp" value="{{ old('no_hp', $guru->no_hp) }}" 
                           placeholder="Contoh: 081234567890" required>
                </div>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn-primary">
                    <i class="fas fa-save"></i> Update Data Guru
                </button>
                <a href="{{ route('guru.index') }}" class="btn-secondary">
                    <i class="fas fa-times"></i> Batal
                </a>
            </div>
        </form>
    </div>
@endsection