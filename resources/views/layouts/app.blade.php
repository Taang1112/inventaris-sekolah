<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') | Modern Admin</title>
    
    <!-- Font Awesome 6 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    
    <!-- Google Fonts - Inter -->
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

        /* Animated Background */
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

        /* Main Container */
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

        /* Header */
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
            font-size: 24px;
            font-weight: 700;
            background: linear-gradient(145deg, #1e293b, #334155);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            letter-spacing: -0.5px;
        }

        /* Profile Section */
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

        /* Sidebar */
        .sidebar {
            width: 280px;
            background: rgba(255, 255, 255, 0.6);
            backdrop-filter: blur(10px);
            border-right: 1px solid rgba(0, 0, 0, 0.03);
            padding: 0 0 25px 0;
            transition: width 0.3s ease;
        }

        .sidebar.collapsed {
            width: 80px;
        }

        .sidebar.collapsed .sidebar-link span:not(.sidebar-badge),
        .sidebar.collapsed .sidebar-profile .sidebar-user-info {
            display: none;
        }

        .sidebar.collapsed .sidebar-profile {
            justify-content: center;
            padding: 25px 0;
        }

        .sidebar.collapsed .sidebar-badge {
            display: none;
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
            flex-shrink: 0;
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
            overflow-y: auto;
            max-height: calc(100vh - 160px);
        }

        /* Page Header inside Content */
        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            flex-wrap: wrap;
            gap: 20px;
        }

        .page-title {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .page-title h2 {
            font-size: 24px;
            font-weight: 700;
            color: #1e293b;
        }

        .page-title i {
            font-size: 28px;
            color: #4f46e5;
            background: white;
            width: 50px;
            height: 50px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 16px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        }

        .breadcrumb {
            display: flex;
            align-items: center;
            gap: 10px;
            color: #94a3b8;
            font-size: 14px;
        }

        .breadcrumb a {
            color: #64748b;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .breadcrumb a:hover {
            color: #4f46e5;
        }

        .breadcrumb i {
            font-size: 12px;
        }

        /* Footer */
        .app-footer {
            padding: 18px 35px;
            background: rgba(255, 255, 255, 0.6);
            backdrop-filter: blur(5px);
            border-top: 1px solid rgba(0, 0, 0, 0.03);
            font-size: 14px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: #64748b;
        }

        .app-footer a {
            color: #4f46e5;
            text-decoration: none;
            font-weight: 600;
        }

        /* Responsive */
        @media (max-width: 992px) {
            .main-content {
                flex-direction: column;
            }
            
            .sidebar {
                width: 100%;
                border-right: none;
                border-bottom: 1px solid rgba(0, 0, 0, 0.05);
            }

            .sidebar.collapsed {
                width: 100%;
            }

            .sidebar.collapsed .sidebar-link span:not(.sidebar-badge) {
                display: inline;
            }

            .sidebar.collapsed .sidebar-profile .sidebar-user-info {
                display: flex;
            }

            .sidebar-profile {
                display: none;
            }
        }

        @media (max-width: 768px) {
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

            .content {
                padding: 20px;
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

        /* Content Area Styles - akan digunakan di halaman barang */
        @yield('styles')
    </style>
</head>
<body>
    <div class="dashboard-container">
        <!-- Header -->
        <div class="dashboard-header">
            <div class="header-left">
                <div class="menu-toggle" id="menuToggle">
                    <i class="fas fa-bars"></i>
                </div>
                <h1>@yield('header-title', 'Dashboard')</h1>
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

                    <div class="profile-dropdown" id="profileDropdown">
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
            <!-- Sidebar -->
            <div class="sidebar" id="sidebar">
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

                    <!-- Barang -->
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
                <!-- Page Header -->
                <div class="page-header">
                    <div class="page-title">
                        <i class="@yield('page-icon', 'fas fa-box')"></i>
                        <h2>@yield('page-title')</h2>
                    </div>
                    <div class="breadcrumb">
                        <a href="{{ route('dashboard') }}"><i class="fas fa-home"></i> Dashboard</a>
                        <i class="fas fa-chevron-right"></i>
                        <span>@yield('breadcrumb')</span>
                    </div>
                </div>

                <!-- Main Content Yield -->
                @yield('content')
            </div>
        </div>

        <!-- Footer -->
        <div class="app-footer">
            <div>
                <strong>Copyright &copy; 2025</strong> All rights reserved.
            </div>
            <div>
                <a href="#">Privacy Policy</a> | <a href="#">Terms of Service</a>
            </div>
        </div>
    </div>

    <script>
        // Menu Toggle
        document.getElementById('menuToggle').addEventListener('click', function() {
            document.getElementById('sidebar').classList.toggle('collapsed');
        });

        // Profile dropdown click
        document.getElementById('profileDropdown')?.addEventListener('click', function() {
            // Implement dropdown menu here
            console.log('Profile dropdown clicked');
        });

        // Notification click
        document.querySelector('.notification-badge')?.addEventListener('click', function() {
            alert('Notifications panel would open here');
        });

        // Auto hide alerts
        setTimeout(() => {
            const alerts = document.querySelectorAll('.alert-success, .alert-danger, .alert-warning, .alert-info');
            alerts.forEach(alert => {
                alert.style.transition = 'opacity 0.5s ease';
                alert.style.opacity = '0';
                setTimeout(() => alert.remove(), 500);
            });
        }, 3000);
    </script>

    @yield('scripts')
</body>
</html>