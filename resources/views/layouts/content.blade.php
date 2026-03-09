<main class="app-main">

<div class="app-content-header">
<div class="container-fluid">
<div class="row">

<div class="col-sm-6">
<h3 class="mb-0">Dashboard</h3>
</div>

<div class="col-sm-6">
<ol class="breadcrumb float-sm-end">
<li class="breadcrumb-item"><a href="#">Home</a></li>
<li class="breadcrumb-item active">Dashboard</li>
</ol>
</div>

</div>
</div>
</div>


<div class="app-content">
<div class="container-fluid">

<div class="row">

<!-- Guru -->
<div class="col-lg-6 col-6">
<div class="small-box text-bg-primary">
<div class="inner">
<h3>{{ $guru }}</h3>
<p>Total Guru</p>
</div>

<a href="/guru" class="small-box-footer">
Lihat Data Guru
</a>

</div>
</div>


<!-- Kelas -->
<div class="col-lg-6 col-6">
<div class="small-box text-bg-success">
<div class="inner">
<h3>{{ $kelas }}</h3>
<p>Total Kelas</p>
</div>

<a href="/kelas" class="small-box-footer">
Lihat Data Kelas
</a>

</div>
</div>

<!-- Peminjaman -->
<div class="col-lg-6 col-6">
<div class="small-box text-bg-warning">
<div class="inner">
<h3>{{ $peminjaman }}</h3>
<p>Total Peminjaman</p>
</div>

<a href="/peminjaman" class="small-box-footer">
Lihat Data Peminjaman
</a>

</div>
</div>

</div>


<div class="row">

<div class="col-lg-12">

<div class="card">

<div class="card-header">
<h3 class="card-title">Informasi Sistem</h3>
</div>

<div class="card-body">

<p>Selamat datang di aplikasi <b>Inventaris Sekolah</b>.</p>

<ul>
<li>Total Guru : <b>{{ $guru }}</b></li>
<li>Total Kelas : <b>{{ $kelas }}</b></li>
<li>Total Peminjaman : <b>{{ $peminjaman }}</b></li>
</ul>

</div>

</div>

</div>

</div>


</div>
</div>

</main>