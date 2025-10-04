<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Detail Data Penggajian</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<nav class="navbar navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="<?= base_url('admin/dashboard') ?>">Transparansi Gaji DPR</a>
    <a href="<?= base_url('/logout') ?>" class="btn btn-outline-light btn-sm">Logout</a>
  </div>
</nav>

<div class="container mt-5">
  <h2 class="mb-4 text-center">Detail Data Penggajian</h2>

  <!-- Informasi Anggota -->
  <div class="card shadow-sm mb-4">
    <div class="card-body">
      <h5 class="card-title">Informasi Anggota</h5>
      <<p><strong>Nama Lengkap:</strong> <?= esc($anggota['gelar_depan'] . ' ' . $anggota['nama_depan'] . ' ' . $anggota['nama_belakang'] . ' ' . $anggota['gelar_belakang']) ?></p>
      <p><strong>Jabatan:</strong> <?= esc($anggota['jabatan']) ?></p>
      <p><strong>Tanggal Penggajian:</strong> <?= esc($penggajian['tanggal_penggajian']) ?></p>
    </div>
  </div>

  <!-- Detail Komponen Gaji -->
  <div class="card shadow-sm">
    <div class="card-body">
      <h5 class="card-title mb-3">Komponen Gaji</h5>
      <table class="table table-bordered table-striped">
        <thead class="table-dark">
          <tr>
            <th>Nama Komponen</th>
            <th>Kategori</th>
            <th>Nominal</th>
            <th>Satuan</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td><?= esc($komponen['nama_komponen']) ?></td>
            <td><?= esc($komponen['kategori']) ?></td>
            <td>Rp <?= number_format($komponen['nominal'], 0, ',', '.') ?></td>
            <td><?= esc($komponen['satuan']) ?></td>
          </tr>
        </tbody>
      </table>

      <div class="mt-3">
        <h5>Total Take Home Pay: <strong>Rp <?= number_format($penggajian['total_takehomepay'], 0, ',', '.') ?></strong></h5>
      </div>
    </div>
  </div>

  <div class="mt-4 d-flex justify-content-between">
    <a href="<?= base_url('admin/penggajian/lihat') ?>" class="btn btn-secondary">Kembali ke Daftar Penggajian</a>
  </div>
</div>

</body>
</html>