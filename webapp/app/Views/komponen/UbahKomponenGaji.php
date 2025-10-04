<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Ubah Komponen Gaji</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
  <h2 class="text-center mb-4">✏️ Ubah Komponen Gaji</h2>

  <form action="<?= base_url('admin/komponen/update/' . $komponen['id_komponen_gaji']) ?>" method="post">
    <div class="mb-3">
      <label>ID Komponen</label>
      <input type="text" name="id_komponen_gaji" class="form-control" value="<?= esc($komponen['id_komponen_gaji']) ?>" readonly>
    </div>
    <div class="mb-3">
      <label>Nama Komponen</label>
      <input type="text" name="nama_komponen" class="form-control" value="<?= esc($komponen['nama_komponen']) ?>" required>
    </div>
    <div class="mb-3">
      <label>Kategori</label>
      <select name="kategori" class="form-control">
        <option value="Gaji Pokok" <?= $komponen['kategori'] == 'Gaji Pokok' ? 'selected' : '' ?>>Gaji Pokok</option>
        <option value="Tunjangan Melekat" <?= $komponen['kategori'] == 'Tunjangan Melekat' ? 'selected' : '' ?>>Tunjangan Melekat</option>
        <option value="Tunjangan Lain" <?= $komponen['kategori'] == 'Tunjangan Lain' ? 'selected' : '' ?>>Tunjangan Lain</option>
      </select>
    </div>
    <div class="mb-3">
      <label>Jabatan</label>
      <select name="jabatan" class="form-control">
        <option value="Ketua" <?= $komponen['jabatan'] == 'Ketua' ? 'selected' : '' ?>>Ketua</option>
        <option value="Wakil Ketua" <?= $komponen['jabatan'] == 'Wakil Ketua' ? 'selected' : '' ?>>Wakil Ketua</option>
        <option value="Anggota" <?= $komponen['jabatan'] == 'Anggota' ? 'selected' : '' ?>>Anggota</option>
      </select>
    </div>
    <div class="mb-3">
      <label>Nominal</label>
      <input type="number" name="nominal" class="form-control" value="<?= esc($komponen['nominal']) ?>" required>
    </div>
    <div class="mb-3">
      <label>Satuan</label>
      <input type="text" name="satuan" class="form-control" value="<?= esc($komponen['satuan']) ?>" required>
    </div>

    <button type="submit" class="btn btn-dark">Simpan Perubahan</button>
    <a href="<?= base_url('admin/komponen/lihat') ?>" class="btn btn-secondary">Batal</a>


  </form>
</div>
</body>
</html>