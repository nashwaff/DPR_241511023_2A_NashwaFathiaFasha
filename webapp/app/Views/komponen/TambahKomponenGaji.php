<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Tambah Komponen Gaji</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light p-5">

<div class="container">
  <div class="card shadow">
    <div class="card-header bg-dark text-white text-center">
      <h4>Tambah Komponen Gaji</h4>
    </div>
    <div class="card-body">

      <?php if (session()->getFlashdata('error')): ?>
        <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
      <?php endif; ?>

      <form action="<?= base_url('admin/komponen/simpan') ?>" method="post">
        <div class="mb-3">
          <label>ID Komponen Gaji</label>
          <input type="text" name="id_komponen_gaji" class="form-control" required>
        </div>

        <div class="mb-3">
          <label>Nama Komponen</label>
          <input type="text" name="nama_komponen" class="form-control" required>
        </div>

        <div class="mb-3">
          <label>Kategori</label>
          <select name="kategori" class="form-select" required>
            <option value="">-- Pilih Kategori --</option>
            <option value="Gaji Pokok">Gaji Pokok</option>
            <option value="Tunjangan Melekat">Tunjangan Melekat</option>
            <option value="Tunjangan Lain">Tunjangan Lain</option>
          </select>
        </div>

        <div class="mb-3">
          <label>Jabatan</label>
          <select name="jabatan" class="form-select" required>
            <option value="">-- Pilih Jabatan --</option>
            <option value="Ketua">Ketua</option>
            <option value="Wakil Ketua">Wakil Ketua</option>
            <option value="Anggota">Anggota</option>
          </select>
        </div>

        <div class="mb-3">
          <label>Nominal</label>
          <input type="number" name="nominal" class="form-control" required>
        </div>

        <div class="mb-3">
          <label>Satuan</label>
          <select name="satuan" class="form-select" required>
            <option value="">-- Pilih Satuan --</option>
            <option value="Bulan">Bulan</option>
            <option value="Hari">Hari</option>
            <option value="Periode">Periode</option>
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