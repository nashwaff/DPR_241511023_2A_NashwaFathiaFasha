<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Tambah Data Penggajian</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
  <h2 class="text-center mb-4">💰 Tambah Data Penggajian</h2>

  <?php if (session()->getFlashdata('error')): ?>
    <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
  <?php endif; ?>

  <form action="<?= base_url('admin/penggajian/simpan') ?>" method="post">
    <div class="mb-3">
      <label for="id_anggota" class="form-label">Pilih Anggota</label>
      <select name="id_anggota" class="form-select" required>
        <option value="">-- Pilih Anggota --</option>
        <?php foreach ($anggota as $a): ?>
          <option value="<?= $a['id_anggota'] ?>">
            <?= $a['nama_depan'] . ' ' . $a['nama_belakang'] ?> (<?= $a['jabatan'] ?>)
          </option>
        <?php endforeach; ?>
      </select>
    </div>

    <div class="mb-3">
      <label for="id_komponen_gaji" class="form-label">Pilih Komponen Gaji</label>
      <select name="id_komponen_gaji" class="form-select" required>
        <option value="">-- Pilih Komponen Gaji --</option>
        <?php foreach ($komponen as $k): ?>
          <option value="<?= $k['id_komponen_gaji'] ?>">
            <?= $k['nama_komponen'] ?> - Rp <?= number_format($k['nominal'], 0, ',', '.') ?>
          </option>
        <?php endforeach; ?>
      </select>
    </div>

    <button type="submit" class="btn btn-dark w-100">💾 Simpan Penggajian</button>
    <a href="<?= base_url('admin/dashboard') ?>" class="btn btn-secondary w-100 mt-2">⬅️ Kembali ke Dashboard</a>
  </form>
</div>

</body>
</html>