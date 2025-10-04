<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Ubah Komponen Gaji</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light p-5">

<div class="container">
  <div class="card shadow">
    <div class="card-header bg-dark text-white text-center">
      <h4>Ubah Komponen Gaji</h4>
    </div>
    <div class="card-body">
      <form action="<?= base_url('admin/komponen/update/' . $komponen['id_komponen_gaji']) ?>" method="post">

        <div class="mb-3">
          <label>Nama Komponen</label>
          <input type="text" name="nama_komponen" class="form-control" value="<?= esc($komponen['nama_komponen']) ?>">
        </div>

        <div class="mb-3">
          <label>Kategori</label>
          <select name="kategori" class="form-select">
            <option value="Gaji Pokok" <?= $komponen['kategori'] == 'Gaji Pokok' ? 'selected' : '' ?>>Gaji Pokok</option>
            <option value="Tunjangan Melekat" <?= $komponen['kategori'] == 'Tunjangan Melekat' ? 'selected' : '' ?>>Tunjangan Melekat</option>
            <option value="Tunjangan Lain" <?= $komponen['kategori'] == 'Tunjangan Lain' ? 'selected' : '' ?>>Tunjangan Lain</option>
          </select>
        </div>

        <div class="mb-3">
          <label>Jabatan</label>
          <select name="jabatan" class="form-select">
            <option value="Ketua" <?= $komponen['jabatan'] == 'Ketua' ? 'selected' : '' ?>>Ketua</option>
            <option value="Wakil Ketua" <?= $komponen['jabatan'] == 'Wakil Ketua' ? 'selected' : '' ?>>Wakil Ketua</option>
            <option value="Anggota" <?= $komponen['jabatan'] == 'Anggota' ? 'selected' : '' ?>>Anggota</option>
          </select>
        </div>

        <div class="mb-3">
          <label>Nominal</label>
          <input type="number" name="nominal" class="form-control" value="<?= esc($komponen['nominal']) ?>">
        </div>

        <div class="mb-3">
          <label>Satuan</label>
          <select name="satuan" class="form-select">
            <option value="Bulan" <?= $komponen['satuan'] == 'Bulan' ? 'selected' : '' ?>>Bulan</option>
            <option value="Hari" <?= $komponen['satuan'] == 'Hari' ? 'selected' : '' ?>>Hari</option>
            <option value="Periode" <?= $komponen['satuan'] == 'Periode' ? 'selected' : '' ?>>Periode</option>
          </select>
        </div>

        <div class="d-flex justify-content-between mt-4">
          <a href="<?= base_url('admin/komponen/lihat') ?>" class="btn btn-secondary">Batal</a>
          <button type="submit" class="btn btn-dark">Simpan Perubahan</button>
        </div>

      </form>
    </div>
  </div>
</div>

</body>
</html>
