<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Ubah Data Anggota</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<nav class="navbar navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="<?= base_url('admin/dashboard') ?>">Dashboard Admin</a>
    <a href="<?= base_url('logout') ?>" class="btn btn-outline-light btn-sm">Logout</a>
  </div>
</nav>

<div class="container mt-5">
  <div class="card shadow">
    <div class="card-header bg-dark text-white">
      <h4>✏️ Ubah Data Anggota</h4>
    </div>
    <div class="card-body">
      <form action="<?= base_url('admin/anggota/update') ?>" method="post">
        <input type="hidden" name="id_anggota" value="<?= esc($anggota['id_anggota']) ?>">

        <div class="mb-3">
          <label>Gelar Depan</label>
          <input type="text" name="gelar_depan" class="form-control" value="<?= esc($anggota['gelar_depan']) ?>">
        </div>

        <div class="mb-3">
          <label>Nama Depan</label>
          <input type="text" name="nama_depan" class="form-control" value="<?= esc($anggota['nama_depan']) ?>" required>
        </div>

        <div class="mb-3">
          <label>Nama Belakang</label>
          <input type="text" name="nama_belakang" class="form-control" value="<?= esc($anggota['nama_belakang']) ?>" required>
        </div>

        <div class="mb-3">
          <label>Gelar Belakang</label>
          <input type="text" name="gelar_belakang" class="form-control" value="<?= esc($anggota['gelar_belakang']) ?>">
        </div>

        <div class="mb-3">
          <label>Jabatan</label>
          <select name="jabatan" class="form-select" required>
            <option value="Ketua" <?= $anggota['jabatan'] == 'Ketua' ? 'selected' : '' ?>>Ketua</option>
            <option value="Wakil Ketua" <?= $anggota['jabatan'] == 'Wakil Ketua' ? 'selected' : '' ?>>Wakil Ketua</option>
            <option value="Anggota" <?= $anggota['jabatan'] == 'Anggota' ? 'selected' : '' ?>>Anggota</option>
          </select>
        </div>

        <div class="mb-3">
          <label>Status Pernikahan</label>
          <select name="status_pernikahan" class="form-select" required>
            <option value="Kawin" <?= $anggota['status_pernikahan'] == 'Kawin' ? 'selected' : '' ?>>Kawin</option>
            <option value="Belum Kawin" <?= $anggota['status_pernikahan'] == 'Belum Kawin' ? 'selected' : '' ?>>Belum Kawin</option>
            <option value="Cerai Hidup" <?= $anggota['status_pernikahan'] == 'Cerai Hidup' ? 'selected' : '' ?>>Cerai Hidup</option>
            <option value="Cerai Mati" <?= $anggota['status_pernikahan'] == 'Cerai Mati' ? 'selected' : '' ?>>Cerai Mati</option>
          </select>
        </div>

        <div class="mb-3">
          <label>Jumlah Anak</label>
          <input type="number" name="jumlah_anak" class="form-control" min="0" value="<?= esc($anggota['jumlah_anak']) ?>">
        </div>

        <button type="submit" class="btn btn-dark w-100">💾 Simpan Perubahan</button>
      </form>
    </div>
  </div>
</div>

</body>
</html>