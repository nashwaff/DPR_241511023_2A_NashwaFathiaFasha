<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Transparansi Gaji DPR</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f8f9fa;
    }
    .dashboard-title {
      font-weight: 700;
      font-size: 2rem;
      text-align: left;
      margin-top: 40px;
      margin-bottom: 50px;
    }
    .card {
      height: 270px;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
      border: none;
      border-radius: 15px;
      transition: all 0.3s ease;
      padding: 25px 20px;
    }
    .card:hover {
      transform: translateY(-7px);
      box-shadow: 0px 8px 20px rgba(0,0,0,0.15);
    }
    .card-title {
      font-size: 1.7rem;
      font-weight: 700;
      margin-bottom: 20px;
    }
    .card-text {
      font-size: 1rem;
      color: #6c757d;
      margin-bottom: 30px;
      min-height: 50px;
    }
    .btn-dark {
      background-color: #212529;
      border: none;
      font-size: 1.05rem;
      font-weight: 500;
      padding: 10px 0;
      border-radius: 8px;
      transition: 0.3s;
    }
    .btn-dark:hover {
      background-color: #343a40;
      transform: scale(1.03);
    }
  </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Transparansi Gaji DPR</a>
    <div class="d-flex">
      <a href="<?= base_url('/logout') ?>" class="btn btn-outline-light btn-sm">Logout</a>
    </div>
  </div>
</nav>

<!-- Dashboard Title -->
<div class="container my-5">
  <h2 class="dashboard-title">Dashboard Admin</h2>

  <!-- Row: 3 Cards -->
  <div class="row justify-content-between">

    <!-- Data Anggota -->
    <div class="col-md-4 mb-4">
      <div class="card shadow-sm text-center">
        <div class="card-body d-flex flex-column justify-content-between">
          <h5 class="card-title">📋 Data Anggota</h5>
          <p class="card-text">Lihat, kelola, dan perbarui seluruh data anggota DPR secara terstruktur.</p>
          <a href="<?= base_url('admin/anggota/lihat') ?>" class="btn btn-dark w-100">Kelola</a>
        </div>
      </div>
    </div>

    <!-- Komponen Gaji -->
    <div class="col-md-4 mb-4">
      <div class="card shadow-sm text-center">
        <div class="card-body d-flex flex-column justify-content-between">
          <h5 class="card-title">💰 Komponen Gaji</h5>
          <p class="card-text">Atur seluruh komponen gaji dan tunjangan yang berlaku bagi anggota DPR.</p>
          <a href="<?= base_url('admin/komponen/lihat') ?>" class="btn btn-dark w-100">Kelola</a>
        </div>
      </div>
    </div>

    <!-- Data Penggajian -->
    <div class="col-md-4 mb-4">
      <div class="card shadow-sm text-center">
        <div class="card-body d-flex flex-column justify-content-between">
          <h5 class="card-title">📊 Data Penggajian</h5>
          <p class="card-text">Kelola data penggajian secara menyeluruh, termasuk perhitungan Take Home Pay.</p>
          <a href="<?= base_url('admin/penggajian/lihat') ?>" class="btn btn-dark w-100">Kelola</a>
        </div>
      </div>
    </div>

  </div>
</div>

</body>
</html>