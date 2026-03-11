<h2>Notifikasi Peminjaman Barang</h2>

<p>Data peminjaman baru telah dibuat.</p>

<ul>
<li>Guru : {{ $peminjaman->guru->nama }}</li>
<li>Kelas : {{ $peminjaman->kelas->nama_kelas }}</li>
<li>Barang : {{ $peminjaman->barang->nama_barang }}</li>
<li>Jumlah : {{ $peminjaman->jumlah_pinjam }}</li>
<li>Tanggal Pinjam : {{ $peminjaman->tanggal_pinjam }}</li>
</ul>

<p>Status : {{ $peminjaman->status }}</p>