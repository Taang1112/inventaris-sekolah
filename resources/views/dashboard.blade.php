@extends('layouts.app')

@section('title', 'Dashboard')
@section('header-title', 'Dashboard')
@section('page-title', 'Dashboard')
@section('page-icon', 'fas fa-chart-pie')
@section('breadcrumb', 'Dashboard')

@section('styles')
<style>
    /* Action Bar */
    .action-bar {
        display: flex;
        justify-content: flex-end;
        align-items: center;
        gap: 15px;
        margin-bottom: 30px;
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

    /* Welcome Banner */
    .welcome-banner {
        background: linear-gradient(145deg, #4f46e5, #7c3aed);
        border-radius: 30px;
        padding: 30px 35px;
        margin-bottom: 35px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        color: white;
        box-shadow: 0 20px 40px rgba(79, 70, 229, 0.3);
    }

    .welcome-text h2 {
        font-size: 28px;
        font-weight: 700;
        margin-bottom: 8px;
    }

    .welcome-text p {
        opacity: 0.9;
        font-size: 15px;
    }

    .welcome-stats {
        display: flex;
        gap: 30px;
    }

    .welcome-stat {
        text-align: center;
    }

    .welcome-stat .number {
        font-size: 28px;
        font-weight: 700;
    }

    .welcome-stat .label {
        font-size: 12px;
        opacity: 0.8;
    }

    /* Stats Grid */
    .stats-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 25px;
        margin-bottom: 40px;
    }

    .stat-card {
        background: white;
        border-radius: 28px;
        padding: 25px;
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.03);
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        position: relative;
        overflow: hidden;
        border: 1px solid rgba(255, 255, 255, 0.5);
    }

    .stat-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 5px;
        background: linear-gradient(90deg, #4f46e5, #7c3aed, #c084fc);
        background-size: 200% 100%;
        animation: gradientMove 4s linear infinite;
    }

    .stat-card:nth-child(2)::before { background: linear-gradient(90deg, #06b6d4, #0891b2, #22d3ee); }
    .stat-card:nth-child(3)::before { background: linear-gradient(90deg, #f97316, #ea580c, #fb923c); }
    .stat-card:nth-child(4)::before { background: linear-gradient(90deg, #10b981, #059669, #34d399); }

    @keyframes gradientMove {
        0% { background-position: 0% 50%; }
        100% { background-position: 200% 50%; }
    }

    .stat-card:hover {
        transform: translateY(-8px) scale(1.02);
        box-shadow: 0 30px 45px rgba(79, 70, 229, 0.15);
    }

    .stat-icon {
        width: 60px;
        height: 60px;
        background: linear-gradient(145deg, #f8faff, #eef2ff);
        border-radius: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 20px;
    }

    .stat-icon i {
        font-size: 28px;
        background: linear-gradient(145deg, #4f46e5, #7c3aed);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .stat-card:nth-child(2) .stat-icon i { background: linear-gradient(145deg, #06b6d4, #0891b2); -webkit-background-clip: text; }
    .stat-card:nth-child(3) .stat-icon i { background: linear-gradient(145deg, #f97316, #ea580c); -webkit-background-clip: text; }
    .stat-card:nth-child(4) .stat-icon i { background: linear-gradient(145deg, #10b981, #059669); -webkit-background-clip: text; }

    .stat-label {
        font-size: 14px;
        font-weight: 500;
        color: #94a3b8;
        letter-spacing: 0.5px;
        margin-bottom: 10px;
    }

    .stat-value {
        font-size: 42px;
        font-weight: 800;
        color: #1e293b;
        line-height: 1;
    }

    /* Info System */
    .info-system {
        background: white;
        border-radius: 32px;
        padding: 35px;
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.03);
        margin-bottom: 30px;
        border: 1px solid rgba(255, 255, 255, 0.5);
    }

    .info-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 25px;
    }

    .info-header h3 {
        font-size: 22px;
        font-weight: 700;
        color: #1e293b;
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .info-header h3 i {
        color: #4f46e5;
        font-size: 24px;
    }

    .info-badge {
        background: #eef2ff;
        color: #4f46e5;
        padding: 8px 18px;
        border-radius: 40px;
        font-size: 13px;
        font-weight: 600;
    }

    .info-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 20px;
    }

    .info-item {
        padding: 25px;
        background: linear-gradient(145deg, #f8fafc, #f1f5f9);
        border-radius: 24px;
        transition: all 0.3s ease;
        border: 1px solid rgba(255, 255, 255, 0.5);
    }

    .info-item:hover {
        transform: translateY(-5px);
        background: white;
        box-shadow: 0 20px 30px rgba(79, 70, 229, 0.08);
        border-color: #4f46e5;
    }

    .info-icon {
        width: 50px;
        height: 50px;
        background: white;
        border-radius: 16px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 20px;
        color: #4f46e5;
        font-size: 22px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.02);
    }

    .info-item h4 {
        font-size: 16px;
        font-weight: 600;
        color: #1e293b;
        margin-bottom: 8px;
    }

    .info-item p {
        font-size: 14px;
        color: #64748b;
        line-height: 1.6;
    }

    .info-progress {
        margin-top: 15px;
        height: 6px;
        background: #e2e8f0;
        border-radius: 10px;
        overflow: hidden;
    }

    .info-progress-bar {
        height: 100%;
        width: 75%;
        background: linear-gradient(90deg, #4f46e5, #7c3aed);
        border-radius: 10px;
    }

    /* Responsive */
    @media (max-width: 1200px) {
        .stats-grid {
            grid-template-columns: repeat(2, 1fr);
        }
        
        .info-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    @media (max-width: 992px) {
        .welcome-banner {
            flex-direction: column;
            text-align: center;
            gap: 20px;
        }
    }

    @media (max-width: 768px) {
        .stats-grid,
        .info-grid {
            grid-template-columns: 1fr;
        }
        
        .action-bar {
            flex-direction: column;
            align-items: flex-start;
        }
        
        .btn-excel, .btn-pdf {
            width: 100%;
            justify-content: center;
        }
    }

    /* Animations */
    .stat-card, .info-item {
        animation: fadeInUp 0.6s ease-out forwards;
        opacity: 0;
    }

    .stat-card:nth-child(1) { animation-delay: 0.1s; }
    .stat-card:nth-child(2) { animation-delay: 0.2s; }
    .stat-card:nth-child(3) { animation-delay: 0.3s; }
    .stat-card:nth-child(4) { animation-delay: 0.4s; }

    .info-item:nth-child(1) { animation-delay: 0.2s; }
    .info-item:nth-child(2) { animation-delay: 0.3s; }
    .info-item:nth-child(3) { animation-delay: 0.4s; }
    .info-item:nth-child(4) { animation-delay: 0.5s; }
    .info-item:nth-child(5) { animation-delay: 0.6s; }
    .info-item:nth-child(6) { animation-delay: 0.7s; }

    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>
@endsection

@section('content')
    <div class="action-bar">
        <a href="{{ route('export.semua') }}" class="btn-excel" target="_blank">
            <i class="fas fa-file-excel"></i> Export Semua Data (Excel)
        </a>
        <a href="{{ route('export.pdf') }}" class="btn-pdf" target="_blank">
            <i class="fas fa-file-pdf"></i> Export Semua Data (PDF)
        </a>
    </div>

    <!-- Welcome Banner -->
    <div class="welcome-banner">
        <div class="welcome-text">
            <h2>Selamat Datang Kembali, Admin! 👋</h2>
            <p>Berikut adalah ringkasan aktivitas sistem Anda hari ini</p>
        </div>
        <div class="welcome-stats">
            <div class="welcome-stat">
                <div class="number">{{ $totalGuru ?? 0 }}</div>
                <div class="label">Total Guru</div>
            </div>
            <div class="welcome-stat">
                <div class="number">{{ $totalKelas ?? 0 }}</div>
                <div class="label">Total Kelas</div>
            </div>
            <div class="welcome-stat">
                <div class="number">{{ $totalBarang ?? 0 }}</div>
                <div class="label">Total Barang</div>
            </div>
            <div class="welcome-stat">
                <div class="number">{{ $peminjamanAktif ?? 0 }}</div>
                <div class="label">Peminjaman Aktif</div>
            </div>
        </div>
    </div>

    <!-- Stats Grid -->
    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-icon">
                <i class="fas fa-box"></i>
            </div>
            <div class="stat-label">Total Barang</div>
            <div class="stat-value">{{ $totalBarang ?? 0 }}</div>
        </div>

        <div class="stat-card">
            <div class="stat-icon">
                <i class="fas fa-chalkboard-teacher"></i>
            </div>
            <div class="stat-label">Total Guru</div>
            <div class="stat-value">{{ $totalGuru ?? 0 }}</div>
        </div>

        <div class="stat-card">
            <div class="stat-icon">
                <i class="fas fa-door-open"></i>
            </div>
            <div class="stat-label">Total Kelas</div>
            <div class="stat-value">{{ $totalKelas ?? 0 }}</div>
        </div>

        <div class="stat-card">
            <div class="stat-icon">
                <i class="fas fa-book"></i>
            </div>
            <div class="stat-label">Peminjaman Aktif</div>
            <div class="stat-value">{{ $peminjamanAktif ?? 0 }}</div>
        </div>
    </div>

    <!-- Informasi Sistem -->
    <div class="info-system">
        <div class="info-header">
            <h3>
                <i class="fas fa-circle-info"></i>
                Informasi Sistem
            </h3>
            <span class="info-badge">
                <i class="fas fa-sync-alt fa-spin"></i> Live
            </span>
        </div>
        <div class="info-grid">
            <div class="info-item">
                <div class="info-icon">
                    <i class="fas fa-server"></i>
                </div>
                <h4>Status Server</h4>
                <p>Online · 99.9% Uptime</p>
                <div class="info-progress">
                    <div class="info-progress-bar" style="width: 99%"></div>
                </div>
            </div>
            <div class="info-item">
                <div class="info-icon">
                    <i class="fas fa-database"></i>
                </div>
                <h4>Database</h4>
                <p>MySQL · 2.3 GB / 5 GB</p>
                <div class="info-progress">
                    <div class="info-progress-bar" style="width: 46%"></div>
                </div>
            </div>
            <div class="info-item">
                <div class="info-icon">
                    <i class="fas fa-shield-alt"></i>
                </div>
                <h4>Keamanan</h4>
                <p>SSL Active · Firewall On</p>
                <div class="info-progress">
                    <div class="info-progress-bar" style="width: 100%"></div>
                </div>
            </div>
            <div class="info-item">
                <div class="info-icon">
                    <i class="fas fa-clock"></i>
                </div>
                <h4>Last Backup</h4>
                <p>Today 02:00 AM</p>
                <div class="info-progress">
                    <div class="info-progress-bar" style="width: 100%"></div>
                </div>
            </div>
            <div class="info-item">
                <div class="info-icon">
                    <i class="fas fa-users-cog"></i>
                </div>
                <h4>Active Users</h4>
                <p>24 Online · 156 Total</p>
                <div class="info-progress">
                    <div class="info-progress-bar" style="width: 15%"></div>
                </div>
            </div>
            <div class="info-item">
                <div class="info-icon">
                    <i class="fas fa-memory"></i>
                </div>
                <h4>Memory Usage</h4>
                <p>45% Used · 8 GB Total</p>
                <div class="info-progress">
                    <div class="info-progress-bar" style="width: 45%"></div>
                </div>
            </div>
        </div>
    </div>
@endsection