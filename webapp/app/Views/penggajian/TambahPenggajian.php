<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Tambah Data Penggajian</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light p-5">

<div class="container">
  <div class="card shadow">
    <div class="card-header bg-dark text-white text-center">
      <h4>Tambah Data Penggajian</h4>
    </div>
    <div class="card-body">

      <?php if (session()->getFlashdata('error')): ?>
        <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
      <?php endif; ?>

      <form action="<?= base_url('admin/penggajian/simpan') ?>" method="post">
        <div class="mb-3">
          <label>Pilih Anggota</label>
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
          <label>Pilih Komponen Gaji</label>
          <select name="id_komponen_gaji" class="form-select" required>
            <option value="">-- Pilih Komponen Gaji --</option>
            <?php foreach ($komponen as $k): ?>
              <option value="<?= $k['id_komponen_gaji'] ?>">
                <?= $k['nama_komponen'] ?> - Rp <?= number_format($k['nominal'], 0, ',', '.') ?>
              </option>
            <?php endforeach; ?>
          </select>
        </div>

        <div class="d-flex justify-content-between mt-4">
          <a href="<?= base_url('admin/dashboard') ?>" class="btn btn-secondary">Kembali ke Dashboard</a>
          <button type="submit" class="btn btn-dark">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>

</body>
</html>