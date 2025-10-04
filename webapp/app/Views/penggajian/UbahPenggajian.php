<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>✏️ Ubah Data Penggajian</title>
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
  <div class="card shadow-sm">
    <div class="card-header bg-dark text-white">
      ✏️ Ubah Data Penggajian
    </div>
    <div class="card-body">
      <form action="<?= base_url('admin/penggajian/update/' . $penggajian['id_penggajian']) ?>" method="post">
        
        <!-- Pilih Anggota -->
        <div class="mb-3">
          <label for="id_anggota" class="form-label">Pilih Anggota</label>
          <select name="id_anggota" id="id_anggota" class="form-control" required>
            <?php foreach ($anggota as $a): ?>
              <option value="<?= $a['id_anggota'] ?>" <?= $a['id_anggota'] == $penggajian['id_anggota'] ? 'selected' : '' ?>>
                <?= $a['gelar_depan'] . ' ' . $a['nama_depan'] . ' ' . $a['nama_belakang'] . ' ' . $a['gelar_belakang'] ?>
              </option>
            <?php endforeach; ?>
          </select>
        </div>

        <!-- Pilih Komponen Gaji -->
        <div class="mb-3">
          <label for="id_komponen_gaji" class="form-label">Pilih Komponen Gaji</label>
          <select name="id_komponen_gaji" id="id_komponen_gaji" class="form-control" required>
            <?php foreach ($komponen as $k): ?>
              <option value="<?= $k['id_komponen_gaji'] ?>" <?= $k['id_komponen_gaji'] == $penggajian['id_komponen_gaji'] ? 'selected' : '' ?>>
                <?= $k['nama_komponen'] ?> - Rp <?= number_format($k['nominal'], 0, ',', '.') ?>
              </option>
            <?php endforeach; ?>
          </select>
        </div>

        <!-- Tanggal Penggajian -->
        <div class="mb-3">
          <label for="tanggal_penggajian" class="form-label">Tanggal Penggajian</label>
          <input type="date" name="tanggal_penggajian" id="tanggal_penggajian" class="form-control" value="<?= esc($penggajian['tanggal_penggajian']) ?>">
        </div>

        <!-- Tombol -->
        <div class="d-flex justify-content-between">
          <a href="<?= base_url('admin/penggajian/lihat') ?>" class="btn btn-secondary">⬅️ Kembali</a>
          <button type="submit" class="btn btn-dark">💾 Simpan Perubahan</button>
        </div>
      </form>
    </div>
  </div>
</div>

</body>
</html>