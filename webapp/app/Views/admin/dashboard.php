<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Dashboard Admin</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f8f9fa;
    }
    .card:hover {
      transform: translateY(-5px);
      transition: 0.3s;
    }
    .btn-dark {
      background-color: #212529;
      border: none;
    }
    .btn-dark:hover {
      background-color: #343a40;
    }
  </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Dashboard Admin</a>
    <div class="d-flex">
      <a href="<?= base_url('/logout') ?>" class="btn btn-outline-light btn-sm">Logout</a>
    </div>
  </div>
</nav>

<div class="container my-5">
  <div class="text-center mb-4">
    <h2>Halo, <?= esc($username) ?> 👋</h2>
    <p class="text-muted">Selamat datang di panel admin. Silakan pilih menu di bawah ini:</p>
  </div>

  <!-- Baris Pertama: Anggota -->
  <div class="row justify-content-center">
    <div class="col-md-4 mb-4">
      <div class="card shadow-sm">
        <div class="card-body text-center">
          <h5 class="card-title">Tambah Data Anggota</h5>
          <p class="card-text">Masukkan data anggota DPR baru ke sistem.</p>
          <a href="<?= base_url('admin/anggota/tambah') ?>" class="btn btn-dark w-100">Tambah</a>
        </div>
      </div>
    </div>

    <div class="col-md-4 mb-4">
      <div class="card shadow-sm">
        <div class="card-body text-center">
          <h5 class="card-title">Lihat Data Anggota</h5>
          <p class="card-text">Lihat semua anggota DPR yang sudah terdaftar.</p>
          <a href="<?= base_url('admin/anggota/lihat') ?>" class="btn btn-dark w-100">Lihat</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Baris Kedua: Komponen Gaji -->
  <div class="row justify-content-center mt-3">
    <div class="col-md-4 mb-4">
      <div class="card shadow-sm">
        <div class="card-body text-center">
          <h5 class="card-title">Tambah Komponen Gaji</h5>
          <p class="card-text">Tambahkan komponen gaji atau tunjangan baru ke sistem.</p>
          <a href="<?= base_url('admin/komponen/tambah') ?>" class="btn btn-dark w-100">Tambah</a>
        </div>
      </div>
    </div>

    <div class="col-md-4 mb-4">
      <div class="card shadow-sm">
        <div class="card-body text-center">
          <h5 class="card-title">Lihat Komponen Gaji</h5>
          <p class="card-text">Lihat semua komponen gaji dan tunjangan yang sudah terdaftar.</p>
          <a href="<?= base_url('admin/komponen/lihat') ?>" class="btn btn-dark w-100">Lihat</a>
        </div>
      </div>
    </div>
  </div>

</div>

</body>
</html>