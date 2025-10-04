<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Ubah Data Penggajian</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light p-5">

<div class="container">
  <div class="card shadow">
    <div class="card-header bg-dark text-white text-center">
      <h4>Ubah Data Penggajian</h4>
    </div>
    <div class="card-body">
      <form action="<?= base_url('admin/penggajian/update/' . $penggajian['id_penggajian']) ?>" method="post">

        <div class="mb-3">
          <label>Pilih Anggota</label>
          <select name="id_anggota" class="form-select">
            <?php foreach ($anggota as $a): ?>
              <option value="<?= $a['id_anggota'] ?>" <?= $penggajian['id_anggota'] == $a['id_anggota'] ? 'selected' : '' ?>>
                <?= $a['nama_depan'] . ' ' . $a['nama_belakang'] ?> (<?= $a['jabatan'] ?>)
              </option>
            <?php endforeach; ?>
          </select>
        </div>

        <div class="mb-3">
          <label>Pilih Komponen Gaji</label>
          <select name="id_komponen_gaji" class="form-select">
            <?php foreach ($komponen as $k): ?>
              <option value="<?= $k['id_komponen_gaji'] ?>" <?= $penggajian['id_komponen_gaji'] == $k['id_komponen_gaji'] ? 'selected' : '' ?>>
                <?= $k['nama_komponen'] ?> - Rp <?= number_format($k['nominal'], 0, ',', '.') ?>
              </option>
            <?php endforeach; ?>
          </select>
        </div>

        <div class="mb-3">
          <label>Tanggal Penggajian</label>
          <input type="date" name="tanggal_penggajian" class="form-control" value="<?= esc($penggajian['tanggal_penggajian']) ?>">
        </div>

        <div class="d-flex justify-content-between mt-4">
          <a href="<?= base_url('admin/penggajian/lihat') ?>" class="btn btn-secondary">Batal</a>
          <button type="submit" class="btn btn-dark">Simpan Perubahan</button>
        </div>

      </form>
    </div>
  </div>
</div>

</body>
</html>