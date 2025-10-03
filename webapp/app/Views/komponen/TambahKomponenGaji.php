<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Tambah Komponen Gaji</title>
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
  <h2 class="mb-4 text-center">Tambah Komponen Gaji</h2>

  <?php if (session()->getFlashdata('error')): ?>
    <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
  <?php endif; ?>

  <form action="<?= base_url('admin/komponen/simpan') ?>" method="post" class="card p-4 shadow-sm">

    <div class="mb-3">
      <label for="id_komponen_gaji" class="form-label">ID Komponen Gaji</label>
      <input type="text" name="id_komponen_gaji" class="form-control" required>
    </div>

    <div class="mb-3">
      <label for="nama_komponen" class="form-label">Nama Komponen</label>
      <input type="text" name="nama_komponen" class="form-control" required>
    </div>

    <div class="mb-3">
      <label for="kategori" class="form-label">Kategori</label>
      <select name="kategori" class="form-select" required>
        <option value="">-- Pilih Kategori --</option>
        <option value="Gaji Pokok">Gaji Pokok</option>
        <option value="Tunjangan Melekat">Tunjangan Melekat</option>
        <option value="Tunjangan Lain">Tunjangan Lain</option>
      </select>
    </div>

    <div class="mb-3">
      <label for="jabatan" class="form-label">Jabatan</label>
      <select name="jabatan" class="form-select" required>
        <option value="">-- Pilih Jabatan --</option>
        <option value="Ketua">Ketua</option>
        <option value="Wakil Ketua">Wakil Ketua</option>
        <option value="Anggota">Anggota</option>
      </select>
    </div>

    <div class="mb-3">
      <label for="nominal" class="form-label">Nominal</label>
      <input type="number" name="nominal" class="form-control" step="0.01" required>
    </div>

    <div class="mb-3">
      <label for="satuan" class="form-label">Satuan</label>
      <select name="satuan" class="form-select" required>
        <option value="">-- Pilih Satuan --</option>
        <option value="Bulan">Bulan</option>
        <option value="Hari">Hari</option>
        <option value="Periode">Periode</option>
      </select>
    </div>

    <button type="submit" class="btn btn-dark w-100">Simpan Komponen</button>
  </form>

  <div class="mt-3 text-center">
    <a href="<?= base_url('admin/dashboard') ?>" class="btn btn-secondary">Kembali ke Dashboard</a>
  </div>
</div>

</body>
</html>