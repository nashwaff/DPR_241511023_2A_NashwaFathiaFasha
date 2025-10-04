<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Lihat Data Penggajian</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="<?= base_url('admin/dashboard') ?>">Dashboard Admin</a>
    <a href="<?= base_url('logout') ?>" class="btn btn-outline-light btn-sm">Logout</a>
  </div>
</nav>

<div class="container mt-5">
  <h2 class="mb-4 text-center">Daftar Data Penggajian</h2>

  <table class="table table-striped table-hover text-center">
    <thead class="table-dark">
      <tr>
        <th>ID Anggota</th>
        <th>Nama Lengkap</th>
        <th>Jabatan</th>
        <th>Total Take Home Pay</th>
        <th>Tanggal Penggajian</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php if (!empty($penggajian)): ?>
        <?php foreach ($penggajian as $p): ?>
          <tr>
            <td><?= esc($p['id_anggota']) ?></td>
            <td><?= esc($p['nama_lengkap']) ?></td>
            <td><?= esc($p['jabatan']) ?></td>
            <td>Rp <?= number_format($p['total_takehomepay'], 0, ',', '.') ?></td>
            <td><?= esc($p['tanggal_penggajian']) ?></td>
            <td>
              <a href="<?= base_url('admin/penggajian/detail/' . $p['id_penggajian']) ?>" class="btn btn-info btn-sm">Detail</a>
              <a href="<?= base_url('admin/penggajian/ubah/' . $p['id_penggajian']) ?>" class="btn btn-warning btn-sm">Ubah</a>
              <a href="<?= base_url('admin/penggajian/hapus/' . $p['id_penggajian']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data penggajian ini?')">Hapus</a>
            </td>
          </tr>
        <?php endforeach; ?>
      <?php else: ?>
        <tr>
          <td colspan="6" class="text-center text-muted">Tidak ada data penggajian ditemukan.</td>
        </tr>
      <?php endif; ?>
    </tbody>
  </table>

  <div class="mt-4 d-flex justify-content-between">
    <a href="<?= base_url('admin/dashboard') ?>" class="btn btn-secondary">Kembali ke Dashboard</a>
    <a href="<?= base_url('admin/penggajian/tambah') ?>" class="btn btn-dark">Tambah Penggajian</a>
</div>

</body>
</html>