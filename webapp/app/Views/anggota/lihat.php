<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Lihat Data Anggota</title>
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
  <h2 class="mb-4 text-center"> Daftar Anggota DPR</h2>

  <!-- Alert pesan sukses atau error -->
  <?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
  <?php elseif (session()->getFlashdata('error')): ?>
    <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
  <?php endif; ?>

  <!-- Form Pencarian -->
  <form method="get" action="<?= base_url('admin/anggota/lihat') ?>" class="mb-4">
    <div class="input-group">
      <input type="text" name="keyword" class="form-control" placeholder="Cari berdasarkan ID, Nama, atau Jabatan..." value="<?= esc($_GET['keyword'] ?? '') ?>">
      <button class="btn btn-dark" type="submit">Cari</button>
    </div>
  </form>

  <!-- Tabel Data Anggota -->
  <table class="table table-striped table-hover align-middle">
    <thead class="table-dark">
      <tr>
        <th>ID Anggota</th>
        <th>Gelar Depan</th>
        <th>Nama Depan</th>
        <th>Nama Belakang</th>
        <th>Gelar Belakang</th>
        <th>Jabatan</th>
        <th>Status Pernikahan</th>
        <th>Jumlah Anak</th>
        <th style="width: 140px;">Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php if (!empty($anggota)): ?>
        <?php foreach ($anggota as $a): ?>
          <tr>
            <td><?= esc($a['id_anggota']) ?></td>
            <td><?= esc($a['gelar_depan']) ?></td>
            <td><?= esc($a['nama_depan']) ?></td>
            <td><?= esc($a['nama_belakang']) ?></td>
            <td><?= esc($a['gelar_belakang']) ?></td>
            <td><?= esc($a['jabatan']) ?></td>
            <td><?= esc($a['status_pernikahan']) ?></td>
            <td><?= esc($a['jumlah_anak']) ?></td>
            <td class="d-flex gap-2">
              <!-- Tombol Ubah -->
            <a href="<?= base_url('admin/anggota/ubah/' . $a['id_anggota']) ?>" 
                class="btn btn-warning btn-sm d-inline-flex align-items-center">
                Ubah
            </a>

            <!-- Tombol Hapus -->
            <a href="<?= base_url('admin/anggota/hapus/' . $a['id_anggota']) ?>" 
                class="btn btn-danger btn-sm d-inline-flex align-items-center"
                onclick="return confirm('Yakin ingin menghapus data <?= esc($a['nama_depan']) ?>? Data ini akan hilang permanen.')">
                Hapus
            </a>
            </td>
              <!-- <a href="<?= base_url('admin/anggota/hapus/' . $a['id_anggota']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?')">🗑️ Hapus</a> -->
            </td>
          </tr>
        <?php endforeach; ?>
      <?php else: ?>
        <tr>
          <td colspan="9" class="text-center text-muted">Tidak ada data ditemukan.</td>
        </tr>
      <?php endif; ?>
    </tbody>
  </table>

  <div class="mt-4 d-flex justify-content-between">
    <a href="<?= base_url('admin/dashboard') ?>" class="btn btn-secondary">Kembali ke Dashboard</a>
    <a href="<?= base_url('admin/anggota/tambah') ?>" class="btn btn-dark">Tambah Anggota</a>
  </div>
</div>

</body>
</html>