<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | Modern Admin</title>
    
    <!-- Font Awesome 6 (Free) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    
    <!-- Google Fonts - Inter (Modern Font) -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(145deg, #0f172a 0%, #1e293b 50%, #2d3a4f 100%);
            min-height: 100vh;
            padding: 20px;
            position: relative;
            overflow-x: hidden;
        }

        /* Animated Background dengan Partikel Lebih Halus */
        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: 
                radial-gradient(circle at 10% 20%, rgba(99, 102, 241, 0.12) 0%, transparent 35%),
                radial-gradient(circle at 90% 70%, rgba(139, 92, 246, 0.12) 0%, transparent 35%),
                radial-gradient(circle at 30% 80%, rgba(236, 72, 153, 0.08) 0%, transparent 40%),
                radial-gradient(circle at 70% 30%, rgba(59, 130, 246, 0.08) 0%, transparent 40%);
            animation: particleFloat 25s ease-in-out infinite alternate;
            pointer-events: none;
        }

        @keyframes particleFloat {
            0% { transform: scale(1) rotate(0deg); opacity: 0.5; }
            100% { transform: scale(1.15) rotate(2deg); opacity: 0.8; }
        }

        /* Main Container - Premium Glassmorphism */
        .dashboard-container {
            max-width: 1600px;
            margin: 0 auto;
            background: rgba(255, 255, 255, 0.93);
            backdrop-filter: blur(25px);
            -webkit-backdrop-filter: blur(25px);
            border-radius: 48px;
            box-shadow: 
                0 30px 60px -15px rgba(0, 0, 0, 0.5),
                0 0 0 1px rgba(255, 255, 255, 0.2) inset,
                0 0 0 2px rgba(255, 255, 255, 0.1);
            overflow: hidden;
            position: relative;
            z-index: 1;
            animation: slideUp 0.8s cubic-bezier(0.2, 0.9, 0.3, 1.1);
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(40px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Header Section dengan Profile */
        .dashboard-header {
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(10px);
            padding: 20px 35px;
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 20px;
        }

        .header-left {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .menu-toggle {
            width: 45px;
            height: 45px;
            background: white;
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #4f46e5;
            font-size: 20px;
            box-shadow: 0 5px 15px rgba(79, 70, 229, 0.15);
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .menu-toggle:hover {
            background: #4f46e5;
            color: white;
            transform: rotate(90deg);
        }

        .header-left h1 {
            font-size: 28px;
            font-weight: 700;
            background: linear-gradient(145deg, #1e293b, #334155);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            letter-spacing: -0.5px;
            position: relative;
        }

        .header-left h1::after {
            content: 'Admin';
            position: absolute;
            bottom: -18px;
            left: 0;
            font-size: 11px;
            font-weight: 500;
            background: linear-gradient(145deg, #4f46e5, #7c3aed);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            letter-spacing: 1px;
        }

        /* Profile Section Premium */
        .profile-section {
            display: flex;
            align-items: center;
            gap: 30px;
        }

        .nav-links {
            display: flex;
            gap: 10px;
        }

        .nav-links a {
            text-decoration: none;
            color: #64748b;
            font-weight: 500;
            padding: 8px 18px;
            border-radius: 40px;
            transition: all 0.3s ease;
            background: transparent;
            font-size: 14px;
        }

        .nav-links a:hover {
            background: white;
            color: #4f46e5;
            box-shadow: 0 5px 15px rgba(79, 70, 229, 0.1);
        }

        .profile-wrapper {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .notification-badge {
            position: relative;
            width: 45px;
            height: 45px;
            background: white;
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #4f46e5;
            font-size: 18px;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.03);
        }

        .notification-badge:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(79, 70, 229, 0.15);
        }

        .notification-badge::after {
            content: '3';
            position: absolute;
            top: -5px;
            right: -5px;
            width: 20px;
            height: 20px;
            background: linear-gradient(145deg, #ef4444, #dc2626);
            border-radius: 50%;
            color: white;
            font-size: 11px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            border: 2px solid white;
        }

        .profile-dropdown {
            display: flex;
            align-items: center;
            gap: 12px;
            background: white;
            padding: 8px 15px 8px 8px;
            border-radius: 40px;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.03);
        }

        .profile-dropdown:hover {
            box-shadow: 0 10px 25px rgba(79, 70, 229, 0.15);
            transform: translateY(-2px);
        }

        .profile-avatar {
            width: 40px;
            height: 40px;
            background: linear-gradient(145deg, #4f46e5, #7c3aed);
            border-radius: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 600;
            font-size: 16px;
        }

        .profile-info {
            display: flex;
            flex-direction: column;
        }

        .profile-name {
            font-weight: 600;
            color: #1e293b;
            font-size: 14px;
        }

        .profile-role {
            font-size: 11px;
            color: #94a3b8;
            font-weight: 500;
        }

        .profile-dropdown i {
            color: #94a3b8;
            font-size: 12px;
            margin-left: 5px;
            transition: transform 0.3s ease;
        }

        .profile-dropdown:hover i {
            transform: rotate(180deg);
            color: #4f46e5;
        }

        /* Main Content Layout */
        .main-content {
            display: flex;
            min-height: calc(100vh - 160px);
        }

        /* Sidebar Premium */
        .sidebar {
            width: 280px;
            background: rgba(255, 255, 255, 0.6);
            backdrop-filter: blur(10px);
            border-right: 1px solid rgba(0, 0, 0, 0.03);
            padding: 0 0 25px 0;
        }

        /* Sidebar Profile */
        .sidebar-profile {
            padding: 25px 20px 15px 20px;
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .sidebar-avatar {
            width: 48px;
            height: 48px;
            background: linear-gradient(145deg, #4f46e5, #7c3aed);
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 600;
            font-size: 18px;
            box-shadow: 0 10px 20px rgba(79, 70, 229, 0.3);
        }

        .sidebar-user-info {
            display: flex;
            flex-direction: column;
        }

        .sidebar-user-name {
            font-weight: 600;
            color: #1e293b;
            font-size: 15px;
        }

        .sidebar-user-role {
            font-size: 11px;
            color: #94a3b8;
            font-weight: 500;
            margin-top: 2px;
        }

        .sidebar-menu {
            list-style: none;
        }

        .sidebar-item {
            margin-bottom: 5px;
            padding: 0 15px;
        }

        .sidebar-link {
            display: flex;
            align-items: center;
            padding: 14px 20px;
            color: #475569;
            text-decoration: none;
            font-weight: 500;
            border-radius: 18px;
            transition: all 0.3s ease;
            position: relative;
        }

        .sidebar-link i {
            width: 24px;
            margin-right: 15px;
            font-size: 18px;
            color: #94a3b8;
            transition: all 0.3s ease;
        }

        .sidebar-link:hover {
            background: white;
            color: #4f46e5;
            box-shadow: 0 10px 25px rgba(79, 70, 229, 0.1);
        }

        .sidebar-link:hover i {
            color: #4f46e5;
            transform: scale(1.1) translateX(3px);
        }

        .sidebar-link.active {
            background: linear-gradient(145deg, #4f46e5, #7c3aed);
            color: white;
            box-shadow: 0 15px 30px rgba(79, 70, 229, 0.3);
        }

        .sidebar-link.active i {
            color: white;
        }

        .sidebar-link.active .sidebar-badge {
            background: white;
            color: #4f46e5;
        }

        /* Sidebar Badge */
        .sidebar-badge {
            margin-left: auto;
            background: #4f46e5;
            color: white;
            font-size: 11px;
            font-weight: 600;
            padding: 3px 8px;
            border-radius: 40px;
            min-width: 24px;
            text-align: center;
            box-shadow: 0 3px 8px rgba(79, 70, 229, 0.2);
        }

        .sidebar-badge.warning {
            background: linear-gradient(145deg, #f97316, #ea580c);
            box-shadow: 0 3px 8px rgba(249, 115, 22, 0.2);
        }

        /* Sidebar Divider */
        .sidebar-divider {
            height: 1px;
            background: linear-gradient(90deg, transparent, rgba(0, 0, 0, 0.05), transparent);
            margin: 20px 20px;
        }

        /* Logout button special */
        .logout-link {
            background: rgba(239, 68, 68, 0.05);
            color: #ef4444 !important;
        }

        .logout-link i {
            color: #ef4444 !important;
        }

        .logout-link:hover {
            background: #ef4444 !important;
            color: white !important;
            box-shadow: 0 15px 30px rgba(239, 68, 68, 0.3) !important;
        }

        .logout-link:hover i {
            color: white !important;
        }

        /* Content Area */
        .content {
            flex: 1;
            padding: 35px;
            background: rgba(255, 255, 255, 0.4);
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

        /* Stats Grid Premium */
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

        /* Info System Premium */
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

        /* Breadcrumb Premium */
        .breadcrumb {
            padding: 18px 35px;
            background: rgba(255, 255, 255, 0.6);
            backdrop-filter: blur(5px);
            border-top: 1px solid rgba(0, 0, 0, 0.03);
            font-size: 14px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .breadcrumb a {
            color: #64748b;
            text-decoration: none;
            transition: color 0.3s ease;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .breadcrumb a:hover {
            color: #4f46e5;
        }

        .breadcrumb i {
            font-size: 12px;
            color: #94a3b8;
        }

        .breadcrumb span {
            color: #1e293b;
            font-weight: 600;
            background: #eef2ff;
            padding: 5px 12px;
            border-radius: 30px;
        }

        /* Responsive Design */
        @media (max-width: 1200px) {
            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
            }
            
            .info-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 992px) {
            .main-content {
                flex-direction: column;
            }
            
            .sidebar {
                width: 100%;
                border-right: none;
                border-bottom: 1px solid rgba(0, 0, 0, 0.05);
            }
            
            .welcome-banner {
                flex-direction: column;
                text-align: center;
                gap: 20px;
            }

            .sidebar-profile {
                display: none;
            }
        }

        @media (max-width: 768px) {
            .stats-grid,
            .info-grid {
                grid-template-columns: 1fr;
            }
            
            .dashboard-header {
                flex-direction: column;
                text-align: center;
            }
            
            .profile-section {
                flex-direction: column;
                width: 100%;
            }
            
            .nav-links {
                justify-content: center;
            }
            
            .profile-wrapper {
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

        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f5f9;
            border-radius: 10px;
        }

        ::-webkit-scrollbar-thumb {
            background: linear-gradient(145deg, #4f46e5, #7c3aed);
            border-radius: 10px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: linear-gradient(145deg, #7c3aed, #4f46e5);
        }
    </style>
</head>
<body>
    <div class="dashboard-container">
        <!-- Header dengan Profile -->
        <div class="dashboard-header">
            <div class="header-left">
                <div class="menu-toggle">
                    <i class="fas fa-bars"></i>
                </div>
                <h1>Dashboard</h1>
            </div>

            <div class="profile-section">
                <div class="nav-links">
                    <a href="{{ url('/') }}"><i class="fas fa-home"></i> Home</a>
                    <a href="#"><i class="fas fa-envelope"></i> Contact</a>
                </div>

                <div class="profile-wrapper">
                    <div class="notification-badge">
                        <i class="far fa-bell"></i>
                    </div>

                    <div class="profile-dropdown">
                        <div class="profile-avatar">
                            <span>AD</span>
                        </div>
                        <div class="profile-info">
                            <span class="profile-name">Admin User</span>
                            <span class="profile-role">Super Administrator</span>
                        </div>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="main-content">
            <!-- Sidebar Premium dengan Menu Lengkap -->
            <div class="sidebar">
                <!-- Profile Summary di Sidebar -->
                <div class="sidebar-profile">
                    <div class="sidebar-avatar">
                        <span>AD</span>
                    </div>
                    <div class="sidebar-user-info">
                        <span class="sidebar-user-name">Admin User</span>
                        <span class="sidebar-user-role">Super Administrator</span>
                    </div>
                </div>

                <ul class="sidebar-menu">
                    <!-- Dashboard -->
                    <li class="sidebar-item">
                        <a href="{{ route('dashboard') }}" class="sidebar-link {{ Request::routeIs('dashboard') ? 'active' : '' }}">
                            <i class="fas fa-chart-pie"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>

                    <!-- Barang (Urutan Pertama Sesuai Route) -->
                    <li class="sidebar-item">
                        <a href="{{ route('barang.index') }}" class="sidebar-link {{ Request::routeIs('barang.*') ? 'active' : '' }}">
                            <i class="fas fa-box"></i>
                            <span>Barang</span>
                            <span class="sidebar-badge">3</span>
                        </a>
                    </li>

                    <!-- Guru -->
                    <li class="sidebar-item">
                        <a href="{{ route('guru.index') }}" class="sidebar-link {{ Request::routeIs('guru.*') ? 'active' : '' }}">
                            <i class="fas fa-chalkboard-teacher"></i>
                            <span>Guru</span>
                        </a>
                    </li>

                    <!-- Kelas -->
                    <li class="sidebar-item">
                        <a href="{{ route('kelas.index') }}" class="sidebar-link {{ Request::routeIs('kelas.*') ? 'active' : '' }}">
                            <i class="fas fa-door-open"></i>
                            <span>Kelas</span>
                        </a>
                    </li>

                    <!-- Peminjaman -->
                    <li class="sidebar-item">
                        <a href="{{ route('peminjaman.index') }}" class="sidebar-link {{ Request::routeIs('peminjaman.*') ? 'active' : '' }}">
                            <i class="fas fa-book"></i>
                            <span>Peminjaman</span>
                            <span class="sidebar-badge warning">12</span>
                        </a>
                    </li>

                    <!-- Divider -->
                    <li class="sidebar-divider"></li>

                    <!-- Logout -->
                    <li class="sidebar-item">
                        <a href="{{ route('logout') }}" class="sidebar-link logout-link"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="fas fa-sign-out-alt"></i>
                            <span>Logout</span>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>

            <!-- Content Area -->
            <div class="content">
                <!-- Welcome Banner -->
                <div class="welcome-banner">
                    <div class="welcome-text">
                        <h2>Selamat Datang Kembali, Admin! 👋</h2>
                        <p>Berikut adalah ringkasan aktivitas sistem Anda hari ini</p>
                    </div>
                    <div class="welcome-stats">
                        <div class="welcome-stat">
                            <div class="number">12</div>
                            <div class="label">Active Users</div>
                        </div>
                        <div class="welcome-stat">
                            <div class="number">85%</div>
                            <div class="label">System Health</div>
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
                        <div class="stat-value">0</div>
                    </div>

                    <div class="stat-card">
                        <div class="stat-icon">
                            <i class="fas fa-chalkboard-teacher"></i>
                        </div>
                        <div class="stat-label">Total Guru</div>
                        <div class="stat-value">0</div>
                    </div>

                    <div class="stat-card">
                        <div class="stat-icon">
                            <i class="fas fa-door-open"></i>
                        </div>
                        <div class="stat-label">Total Kelas</div>
                        <div class="stat-value">0</div>
                    </div>

                    <div class="stat-card">
                        <div class="stat-icon">
                            <i class="fas fa-book"></i>
                        </div>
                        <div class="stat-label">Peminjaman Aktif</div>
                        <div class="stat-value">0</div>
                    </div>
                </div>

                <!-- Informasi Sistem Premium -->
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
            </div>
        </div>

        <!-- Breadcrumb -->
        <div class="breadcrumb">
            <a href="{{ url('/') }}"><i class="fas fa-home"></i> Home</a>
            <i class="fas fa-chevron-right"></i>
            <span>Dashboard</span>
        </div>
    </div>

    <script>
        // Interactive hover effects
        document.querySelectorAll('.stat-card').forEach(card => {
            card.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-8px) scale(1.02)';
            });
            
            card.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0) scale(1)';
            });
        });

        // Profile dropdown click simulation (just for demo)
        document.querySelector('.profile-dropdown')?.addEventListener('click', function() {
            alert('Profile dropdown would open here');
        });

        // Notification click
        document.querySelector('.notification-badge')?.addEventListener('click', function() {
            alert('Notifications panel would open here');
        });

        // Menu toggle
        document.querySelector('.menu-toggle')?.addEventListener('click', function() {
            document.querySelector('.sidebar')?.classList.toggle('collapsed');
        });

        // Active menu berdasarkan URL
        const currentUrl = window.location.pathname;
        document.querySelectorAll('.sidebar-link').forEach(link => {
            const href = link.getAttribute('href');
            if (href && currentUrl.includes(href) && href !== '{{ route('dashboard') }}') {
                link.classList.add('active');
            }
        });
    </script>
</body>
</html>