<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laporan Inventaris Sekolah</title>
    <style>
        /* Modern PDF Styling */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', 'Segoe UI', 'Helvetica', sans-serif;
            background: #ffffff;
            padding: 30px 40px;
            color: #1e293b;
            line-height: 1.5;
        }

        /* Header Laporan */
        .report-header {
            text-align: center;
            margin-bottom: 40px;
            padding-bottom: 20px;
            border-bottom: 3px solid #4f46e5;
            position: relative;
        }

        .report-header h1 {
            font-size: 32px;
            font-weight: 800;
            color: #1e293b;
            letter-spacing: -0.5px;
            margin-bottom: 8px;
        }

        .report-header h1 span {
            color: #4f46e5;
        }

        .report-header p {
            color: #64748b;
            font-size: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 20px;
        }

        .report-header p i {
            color: #4f46e5;
            font-style: normal;
            font-weight: 600;
        }

        .header-decoration {
            position: absolute;
            bottom: -3px;
            left: 0;
            width: 100px;
            height: 3px;
            background: linear-gradient(90deg, #4f46e5, #7c3aed, #c084fc);
            border-radius: 3px;
        }

        /* Section Title */
        .section-title {
            margin: 40px 0 20px 0;
            position: relative;
        }

        .section-title h2 {
            font-size: 22px;
            font-weight: 700;
            color: #1e293b;
            display: inline-block;
            padding-right: 30px;
            background: white;
            position: relative;
            z-index: 2;
        }

        .section-title::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 0;
            right: 0;
            height: 2px;
            background: linear-gradient(90deg, #4f46e5, #e2e8f0);
            z-index: 1;
        }

        /* Tables */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 40px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.03);
            border-radius: 16px;
            overflow: hidden;
        }

        thead tr {
            background: linear-gradient(145deg, #4f46e5, #7c3aed);
        }

        th {
            padding: 14px 12px;
            font-size: 13px;
            font-weight: 600;
            color: white;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            text-align: left;
            border: none;
        }

        td {
            padding: 12px;
            font-size: 12px;
            color: #334155;
            border-bottom: 1px solid #e2e8f0;
            border-left: 1px solid #e2e8f0;
            border-right: 1px solid #e2e8f0;
        }

        tr:last-child td {
            border-bottom: 1px solid #e2e8f0;
        }

        tbody tr:nth-child(even) {
            background-color: #f8fafc;
        }

        tbody tr:hover {
            background-color: #eef2ff;
        }

        /* Badge untuk kondisi */
        .badge {
            display: inline-block;
            padding: 4px 12px;
            border-radius: 40px;
            font-size: 11px;
            font-weight: 600;
            letter-spacing: 0.3px;
        }

        .badge-baik {
            background: linear-gradient(145deg, #10b981, #059669);
            color: white;
        }

        .badge-rusak {
            background: linear-gradient(145deg, #ef4444, #dc2626);
            color: white;
        }

        .badge-dipinjam {
            background: linear-gradient(145deg, #f97316, #ea580c);
            color: white;
        }

        .badge-dikembalikan {
            background: linear-gradient(145deg, #10b981, #059669);
            color: white;
        }

        /* Info Relasi untuk foreign keys */
        .relasi-info {
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .relasi-avatar {
            width: 28px;
            height: 28px;
            background: linear-gradient(145deg, #4f46e5, #7c3aed);
            border-radius: 8px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 12px;
            font-weight: 600;
        }

        .relasi-text {
            font-weight: 500;
        }

        .relasi-label {
            font-size: 10px;
            color: #64748b;
            margin-left: 4px;
        }

        /* Tanggal */
        .tanggal-info {
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .tanggal-info i {
            font-size: 12px;
            color: #4f46e5;
            font-style: normal;
            font-weight: 600;
        }

        /* Footer */
        .report-footer {
            margin-top: 50px;
            padding-top: 20px;
            border-top: 2px dashed #cbd5e1;
            display: flex;
            justify-content: space-between;
            color: #64748b;
            font-size: 12px;
        }

        .signature {
            text-align: right;
        }

        .signature-line {
            margin-top: 40px;
            padding-top: 10px;
            border-top: 1px solid #94a3b8;
            width: 200px;
            text-align: center;
        }

        /* Watermark */
        .watermark {
            position: fixed;
            bottom: 30px;
            right: 30px;
            opacity: 0.1;
            font-size: 60px;
            font-weight: 800;
            color: #4f46e5;
            transform: rotate(-15deg);
            z-index: -1;
        }

        /* Responsive */
        @media print {
            body {
                padding: 20px;
            }
            
            .badge {
                -webkit-print-color-adjust: exact;
                print-color-adjust: exact;
            }
            
            th {
                -webkit-print-color-adjust: exact;
                print-color-adjust: exact;
            }
        }
    </style>
</head>
<body>

    <!-- Watermark -->
    <div class="watermark">INVENTARIS</div>

    <!-- Header Laporan -->
    <div class="report-header">
        <h1>LAPORAN <span>INVENTARIS</span> SEKOLAH</h1>
        <p>
            <i>📅</i> Tanggal Cetak: {{ date('d F Y') }} 
            <i>⏰</i> Pukul: {{ date('H:i:s') }} WIB
        </p>
        <div class="header-decoration"></div>
    </div>

    <!-- Data Barang -->
    <div class="section-title">
        <h2>📦 Data Barang</h2>
    </div>

    <table>
        <thead>
            <tr>
                <th style="width: 5%;">No</th>
                <th style="width: 10%;">Kode</th>
                <th style="width: 25%;">Nama Barang</th>
                <th style="width: 10%;">Total</th>
                <th style="width: 10%;">Tersedia</th>
                <th style="width: 15%;">Kondisi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($barang as $index => $b)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td><strong>{{ $b->kode_barang }}</strong></td>
                <td>{{ $b->nama_barang }}</td>
                <td>{{ $b->jumlah_total }}</td>
                <td>{{ $b->jumlah_tersedia }}</td>
                <td>
                    @if($b->kondisi == 'baik')
                        <span class="badge badge-baik">✓ Baik</span>
                    @else
                        <span class="badge badge-rusak">✗ Rusak</span>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Data Guru -->
    <div class="section-title">
        <h2>👨‍🏫 Data Guru</h2>
    </div>

    <table>
        <thead>
            <tr>
                <th style="width: 5%;">No</th>
                <th style="width: 30%;">Nama Guru</th>
                <th style="width: 25%;">NIP</th>
                <th style="width: 25%;">No. Telepon</th>
            </tr>
        </thead>
        <tbody>
            @foreach($guru as $index => $g)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td><strong>{{ $g->nama_guru }}</strong></td>
                <td>{{ $g->nip }}</td>
                <td>
                    <div class="relasi-info">
                        <span class="relasi-avatar">📞</span>
                        <span class="relasi-text">{{ $g->no_hp }}</span>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Data Kelas -->
    <div class="section-title">
        <h2>🚪 Data Kelas</h2>
    </div>

    <table>
        <thead>
            <tr>
                <th style="width: 5%;">No</th>
                <th style="width: 30%;">Nama Kelas</th>
                <th style="width: 40%;">Wali Kelas</th>
            </tr>
        </thead>
        <tbody>
            @foreach($kelas as $index => $k)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td><strong>{{ $k->nama_kelas }}</strong></td>
                <td>
                    @php
                        $waliGuru = $guru->firstWhere('guru_id', $k->guru_id);
                    @endphp
                    @if($waliGuru)
                        <div class="relasi-info">
                            <span class="relasi-avatar">{{ substr($waliGuru->nama_guru, 0, 1) }}</span>
                            <span class="relasi-text">{{ $waliGuru->nama_guru }}</span>
                            <span class="relasi-label">(Wali Kelas)</span>
                        </div>
                    @else
                        <span style="color: #94a3b8;">- Belum ada wali -</span>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Data Peminjaman -->
    <div class="section-title">
        <h2>📚 Data Peminjaman</h2>
    </div>

    <table>
        <thead>
            <tr>
                <th style="width: 4%;">No</th>
                <th style="width: 15%;">Guru</th>
                <th style="width: 12%;">Kelas</th>
                <th style="width: 15%;">Barang</th>
                <th style="width: 6%;">Jml</th>
                <th style="width: 15%;">Tanggal Pinjam</th>
                <th style="width: 10%;">Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($peminjaman as $index => $p)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>
                    @php
                        $guruPinjam = $guru->firstWhere('guru_id', $p->guru_id);
                    @endphp
                    @if($guruPinjam)
                        <div class="relasi-info">
                            <span class="relasi-avatar">{{ substr($guruPinjam->nama_guru, 0, 1) }}</span>
                            <span class="relasi-text">{{ $guruPinjam->nama_guru }}</span>
                        </div>
                    @else
                        ID: {{ $p->guru_id }}
                    @endif
                </td>
                <td>
                    @php
                        $kelasPinjam = $kelas->firstWhere('kelas_id', $p->kelas_id);
                    @endphp
                    @if($kelasPinjam)
                        <div class="relasi-info">
                            <span class="relasi-avatar" style="background: linear-gradient(145deg, #06b6d4, #0891b2);">{{ substr($kelasPinjam->nama_kelas, 0, 1) }}</span>
                            <span class="relasi-text">{{ $kelasPinjam->nama_kelas }}</span>
                        </div>
                    @else
                        ID: {{ $p->kelas_id }}
                    @endif
                </td>
                <td>
                    @php
                        $barangPinjam = $barang->firstWhere('barang_id', $p->barang_id);
                    @endphp
                    @if($barangPinjam)
                        <div class="relasi-info">
                            <span class="relasi-avatar" style="background: linear-gradient(145deg, #f97316, #ea580c);">{{ substr($barangPinjam->nama_barang, 0, 1) }}</span>
                            <span class="relasi-text">{{ $barangPinjam->nama_barang }}</span>
                        </div>
                    @else
                        ID: {{ $p->barang_id }}
                    @endif
                </td>
                <td style="font-weight: 600; color: #4f46e5;">{{ $p->jumlah_pinjam }}</td>
                <td>
                    <div class="tanggal-info">
                        <span>📅</span>
                        {{ \Carbon\Carbon::parse($p->tanggal_pinjam)->format('d/m/Y') }}
                    </div>
                </td>
                <td>
                    @if($p->status == 'dipinjam')
                        <span class="badge badge-dipinjam">⏳ Dipinjam</span>
                    @else
                        <span class="badge badge-dikembalikan">✓ Dikembalikan</span>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Footer -->
    <div class="report-footer">
        <div>
            <strong>Total Data:</strong> 
            Barang: {{ count($barang) }} | 
            Guru: {{ count($guru) }} | 
            Kelas: {{ count($kelas) }} | 
            Peminjaman: {{ count($peminjaman) }}
        </div>
        <div class="signature">
            <div>Kepala Sekolah,</div>
            <div class="signature-line">_________________________</div>
            <div style="margin-top: 5px;">NIP. 196507152010011012</div>
        </div>
    </div>

    <!-- Info Generated -->
    <div style="text-align: center; margin-top: 20px; font-size: 10px; color: #94a3b8;">
        <i>Dokumen ini digenerate secara otomatis pada {{ date('d F Y H:i:s') }} oleh Sistem Inventaris Sekolah</i>
    </div>

</body>
</html>