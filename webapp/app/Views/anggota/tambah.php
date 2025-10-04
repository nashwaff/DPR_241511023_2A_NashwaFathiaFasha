<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Data Anggota</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light p-5">

<div class="container">
    <div class="card shadow">
        <div class="card-header bg-dark text-white text-center">
            <h4>Tambah Data Anggota</h4>
        </div>
        <div class="card-body">

            <?php if(session()->getFlashdata('errors')): ?>
                <div class="alert alert-danger">
                    <ul>
                        <?php foreach(session()->getFlashdata('errors') as $error): ?>
                            <li><?= esc($error) ?></li>
                        <?php endforeach ?>
                    </ul>
                </div>
            <?php endif; ?>

            <form action="<?= base_url('/admin/anggota/simpan') ?>" method="post">
                <div class="mb-3">
                    <label>ID Anggota</label>
                    <input type="number" name="id_anggota" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Gelar Depan</label>
                    <input type="text" name="gelar_depan" class="form-control">
                </div>
                <div class="mb-3">
                    <label>Nama Depan</label>
                    <input type="text" name="nama_depan" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Nama Belakang</label>
                    <input type="text" name="nama_belakang" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Gelar Belakang</label>
                    <input type="text" name="gelar_belakang" class="form-control">
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
                    <label>Status Pernikahan</label>
                    <select name="status_pernikahan" class="form-select" required>
                        <option value="">-- Pilih Status --</option>
                        <option value="Kawin">Kawin</option>
                        <option value="Belum Kawin">Belum Kawin</option>
                        <option value="Cerai Hidup">Cerai Hidup</option>
                        <option value="Cerai Mati">Cerai Mati</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label>Jumlah Anak</label>
                    <input type="number" name="jumlah_anak" class="form-control" min="0" value="0">
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