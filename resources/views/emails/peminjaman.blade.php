<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notifikasi Peminjaman Barang</title>
    <style>
        /* Modern Email Styling */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', 'Segoe UI', 'Helvetica', Arial, sans-serif;
            background: linear-gradient(145deg, #f8fafc, #f1f5f9);
            padding: 40px 20px;
            color: #1e293b;
            line-height: 1.5;
        }

        .email-container {
            max-width: 600px;
            margin: 0 auto;
            background: white;
            border-radius: 32px;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
            overflow: hidden;
            border: 1px solid rgba(255, 255, 255, 0.5);
        }

        /* Header */
        .email-header {
            background: linear-gradient(145deg, #4f46e5, #7c3aed);
            padding: 40px 30px;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .email-header::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, transparent 70%);
            animation: rotate 20s linear infinite;
        }

        @keyframes rotate {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }

        .header-icon {
            width: 80px;
            height: 80px;
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(10px);
            border-radius: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            border: 2px solid rgba(255, 255, 255, 0.3);
        }

        .header-icon svg {
            width: 40px;
            height: 40px;
            fill: white;
        }

        .email-header h1 {
            color: white;
            font-size: 28px;
            font-weight: 700;
            letter-spacing: -0.5px;
            margin-bottom: 10px;
            text-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .email-header p {
            color: rgba(255, 255, 255, 0.9);
            font-size: 16px;
        }

        /* Content */
        .email-content {
            padding: 40px 35px;
            background: white;
        }

        .greeting {
            font-size: 18px;
            font-weight: 600;
            color: #1e293b;
            margin-bottom: 25px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .greeting svg {
            width: 24px;
            height: 24px;
            fill: #4f46e5;
        }

        /* Info Card */
        .info-card {
            background: linear-gradient(145deg, #f8fafc, #f1f5f9);
            border-radius: 24px;
            padding: 25px;
            margin-bottom: 30px;
            border-left: 5px solid #4f46e5;
        }

        .info-row {
            display: flex;
            align-items: center;
            padding: 12px 0;
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
        }

        .info-row:last-child {
            border-bottom: none;
        }

        .info-label {
            width: 120px;
            font-size: 14px;
            color: #64748b;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .info-label svg {
            width: 18px;
            height: 18px;
            fill: #4f46e5;
        }

        .info-value {
            flex: 1;
            font-weight: 600;
            color: #1e293b;
            font-size: 15px;
        }

        .info-value.highlight {
            color: #4f46e5;
            font-size: 18px;
        }

        /* Status Badge */
        .status-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 8px 20px;
            border-radius: 40px;
            font-size: 14px;
            font-weight: 600;
            background: linear-gradient(145deg, #f97316, #ea580c);
            color: white;
            box-shadow: 0 4px 12px rgba(249, 115, 22, 0.3);
        }

        .status-badge svg {
            width: 16px;
            height: 16px;
            fill: white;
        }

        /* Detail Grid */
        .detail-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 15px;
            margin: 25px 0;
        }

        .detail-item {
            background: #f8fafc;
            border-radius: 18px;
            padding: 20px;
            text-align: center;
            border: 1px solid #e2e8f0;
        }

        .detail-item .label {
            font-size: 12px;
            color: #64748b;
            margin-bottom: 8px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .detail-item .value {
            font-size: 24px;
            font-weight: 700;
            color: #4f46e5;
        }

        /* Button */
        .btn {
            display: inline-block;
            background: linear-gradient(145deg, #4f46e5, #7c3aed);
            color: white;
            text-decoration: none;
            padding: 16px 32px;
            border-radius: 40px;
            font-weight: 600;
            font-size: 16px;
            margin-top: 30px;
            box-shadow: 0 10px 25px rgba(79, 70, 229, 0.3);
            transition: all 0.3s ease;
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 15px 30px rgba(79, 70, 229, 0.4);
        }

        /* Footer */
        .email-footer {
            padding: 30px 35px;
            background: #f8fafc;
            border-top: 1px solid #e2e8f0;
            text-align: center;
        }

        .email-footer p {
            color: #64748b;
            font-size: 13px;
            margin: 5px 0;
        }

        .footer-line {
            width: 60px;
            height: 3px;
            background: linear-gradient(90deg, #4f46e5, #7c3aed);
            margin: 15px auto;
            border-radius: 3px;
        }

        /* Responsive */
        @media (max-width: 600px) {
            .email-content {
                padding: 30px 20px;
            }
            
            .info-row {
                flex-direction: column;
                align-items: flex-start;
                gap: 5px;
            }
            
            .info-label {
                width: 100%;
            }
            
            .detail-grid {
                grid-template-columns: 1fr;
            }
            
            .btn {
                display: block;
                text-align: center;
            }
        }
    </style>
</head>
<body>
    <div class="email-container">
        <!-- Header -->
        <div class="email-header">
            <div class="header-icon">
                <svg viewBox="0 0 24 24">
                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-6h2v6zm0-8h-2V7h2v2z"/>
                </svg>
            </div>
            <h1>Notifikasi Peminjaman</h1>
            <p>Data peminjaman baru telah dibuat</p>
        </div>

        <!-- Content -->
        <div class="email-content">
            <div class="greeting">
                <svg viewBox="0 0 24 24">
                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-2h2v2zm0-4h-2V7h2v6z"/>
                </svg>
                <span>Halo Admin,</span>
            </div>

            <p style="margin-bottom: 25px; color: #475569;">
                Berikut adalah detail peminjaman barang yang baru saja dilakukan:
            </p>

            <!-- Info Card -->
            <div class="info-card">
                <div class="info-row">
                    <span class="info-label">
                        <svg viewBox="0 0 24 24">
                            <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                        </svg>
                        Guru
                    </span>
                    <span class="info-value">{{ $peminjaman->guru->nama_guru }}</span>
                </div>

                <div class="info-row">
                    <span class="info-label">
                        <svg viewBox="0 0 24 24">
                            <path d="M10 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2v-5l-2-2V5c0-1.1-.9-2-2-2h-5l-2 2zM5 5h3v3H5V5zm0 5h3v3H5v-3zm0 5h3v3H5v-3zm5-10h4v3h-4V5zm0 5h4v3h-4v-3zm0 5h4v3h-4v-3zm5-10h3v3h-3V5zm0 5h3v3h-3v-3zm0 5h3v3h-3v-3z"/>
                        </svg>
                        Kelas
                    </span>
                    <span class="info-value">{{ $peminjaman->kelas->nama_kelas }}</span>
                </div>

                <div class="info-row">
                    <span class="info-label">
                        <svg viewBox="0 0 24 24">
                            <path d="M20 6h-4V4c0-1.1-.9-2-2-2h-4c-1.1 0-2 .9-2 2v2H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V8c0-1.1-.9-2-2-2zM10 4h4v2h-4V4zm10 16H4V10h16v10zm-2-6h-4v2h4v-2z"/>
                        </svg>
                        Barang
                    </span>
                    <span class="info-value">{{ $peminjaman->barang->nama_barang }}</span>
                </div>

                <div class="info-row">
                    <span class="info-label">
                        <svg viewBox="0 0 24 24">
                            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-6h2v6zm0-8h-2V7h2v2z"/>
                        </svg>
                        Jumlah
                    </span>
                    <span class="info-value highlight">{{ $peminjaman->jumlah_pinjam }} unit</span>
                </div>
            </div>

            <!-- Detail Grid -->
            <div class="detail-grid">
                <div class="detail-item">
                    <div class="label">Tanggal Pinjam</div>
                    <div class="value">{{ \Carbon\Carbon::parse($peminjaman->tanggal_pinjam)->format('d/m/Y') }}</div>
                </div>
                <div class="detail-item">
                    <div class="label">Waktu</div>
                    <div class="value">{{ \Carbon\Carbon::parse($peminjaman->tanggal_pinjam)->format('H:i') }} WIB</div>
                </div>
            </div>

            <!-- Status -->
            <div style="text-align: center; margin: 30px 0;">
                <div class="status-badge">
                    <svg viewBox="0 0 24 24">
                        <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                    </svg>
                    <span>{{ strtoupper($peminjaman->status) }}</span>
                </div>
            </div>

            <!-- Info Tambahan -->
            <div style="background: #eef2ff; border-radius: 16px; padding: 20px; margin: 25px 0;">
                <p style="color: #4f46e5; font-size: 13px; margin-bottom: 10px;">
                    <strong>Informasi Penting:</strong>
                </p>
                <ul style="color: #475569; font-size: 13px; margin-left: 20px;">
                    <li>Pastikan barang yang dipinjam dalam kondisi baik</li>
                    <li>Catat tanggal pengembalian untuk monitoring</li>
                    <li>Hubungi guru yang bersangkutan jika ada kendala</li>
                </ul>
            </div>

            <!-- Button -->
            <div style="text-align: center;">
                <a href="{{ route('peminjaman.index') }}" class="btn">
                    <span style="display: flex; align-items: center; justify-content: center; gap: 10px;">
                        <svg viewBox="0 0 24 24" width="18" height="18" fill="white">
                            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-2h2v2zm0-4h-2V7h2v6z"/>
                        </svg>
                        Lihat Detail Peminjaman
                    </span>
                </a>
            </div>
        </div>

        <!-- Footer -->
        <div class="email-footer">
            <div class="footer-line"></div>
            <p>© {{ date('Y') }} Sistem Inventaris Sekolah</p>
            <p>Email ini dikirim secara otomatis, mohon tidak membalas email ini.</p>
            <p style="margin-top: 15px; font-size: 11px;">Dikirim pada: {{ now()->format('d F Y H:i:s') }} WIB</p>
        </div>
    </div>
</body>
</html>