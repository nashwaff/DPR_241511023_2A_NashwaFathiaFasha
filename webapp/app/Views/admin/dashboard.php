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

  <div class="row justify-content-center">
    <!-- Tambah Data Anggota -->
    <div class="col-md-4 mb-4">
      <div class="card shadow-sm">
        <div class="card-body text-center">
          <h5 class="card-title">Tambah Data Anggota</h5>
          <p class="card-text">Masukkan data anggota DPR baru ke sistem.</p>
          <a href="<?= base_url('admin/anggota/tambah') ?>" class="btn btn-dark w-100">Tambah</a>
        </div>
      </div>
    </div>

    <!-- Lihat Data Anggota -->
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
</div>

</body>
</html>