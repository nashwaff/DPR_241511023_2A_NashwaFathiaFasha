<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Daftar Komponen Gaji</title>
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
  <h2 class="mb-4 text-center">Daftar Komponen Gaji & Tunjangan</h2>

  <!-- Form Pencarian -->
  <form method="get" action="<?= base_url('admin/komponen/lihat') ?>" class="mb-4">
    <div class="input-group">
      <input type="text" name="keyword" class="form-control" placeholder="Cari ID, Nama Komponen, Jabatan, dll..." value="<?= esc($_GET['keyword'] ?? '') ?>">
      <button class="btn btn-dark" type="submit">Cari</button>
    </div>
  </form>

  <!-- Tabel Data Komponen -->
  <table class="table table-striped table-hover align-middle">
    <thead class="table-dark">
      <tr>
        <th>ID Komponen</th>
        <th>Nama Komponen</th>
        <th>Kategori</th>
        <th>Jabatan</th>
        <th>Nominal</th>
        <th>Satuan</th>
        <th style="width: 140px;">Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php if (!empty($komponen)): ?>
        <?php foreach ($komponen as $k): ?>
          <tr>
            <td><?= esc($k['id_komponen_gaji']) ?></td>
            <td><?= esc($k['nama_komponen']) ?></td>
            <td><?= esc($k['kategori']) ?></td>
            <td><?= esc($k['jabatan']) ?></td>
            <td>Rp <?= number_format($k['nominal'], 0, ',', '.') ?></td>
            <td><?= esc($k['satuan']) ?></td>
            <td class="text-center">
              <a href="<?= base_url('admin/komponen/ubah/' . $k['id_komponen_gaji']) ?>" class="btn btn-warning btn-sm">Ubah</a>
              <a href="<?= base_url('admin/komponen/hapus/' . $k['id_komponen_gaji']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus komponen ini?')">Hapus</a>

            </td>
          </tr>
        <?php endforeach; ?>
      <?php else: ?>
        <tr>
          <td colspan="7" class="text-center text-muted">Tidak ada data ditemukan.</td>
        </tr>
      <?php endif; ?>
    </tbody>
  </table>

  <!-- Tombol Navigasi -->
  <div class="d-flex justify-content-between mt-4">
    <a href="<?= base_url('admin/dashboard') ?>" class="btn btn-secondary">Kembali ke Dashboard</a>
    <a href="<?= base_url('admin/komponen/tambah') ?>" class="btn btn-dark">Tambah Komponen</a>
  </div>
</div>

</body>
</html>