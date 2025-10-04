<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Daftar Anggota DPR</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="bg-light">

    <div class="container py-5">
        <h2 class="text-center mb-4">Daftar Anggota DPR</h2>

        <!-- Pencarian -->
        <form method="get" action="" class="mb-4">
            <div class="input-group">
                <input type="text" name="keyword" class="form-control" placeholder="Cari berdasarkan ID, Nama, atau Jabatan..." value="<?= esc($_GET['keyword'] ?? '') ?>">
                <button type="submit" class="btn btn-primary">Cari</button>
            </div>
        </form>

        <!-- Tabel Data Anggota -->
        <div class="table-responsive shadow-sm">
            <table class="table table-striped table-bordered align-middle">
                <thead class="table-dark text-center">
                    <tr>
                        <th>ID Anggota</th>
                        <th>Gelar Depan</th>
                        <th>Nama Depan</th>
                        <th>Nama Belakang</th>
                        <th>Gelar Belakang</th>
                        <th>Jabatan</th>
                        <th>Status Pernikahan</th>
                        <th>Jumlah Anak</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    <?php if (!empty($anggota)): ?>
                        <?php foreach ($anggota as $a): ?>
                            <tr>
                                <td><?= esc($a['id_anggota']) ?></td>
                                <td><?= esc($a['gelar_depan']) ?></td>
                                <td><?= esc($a['nama_depan']) ?></td>
                                <td><?= esc($a['nama_belakang']) ?></td>
                                <td><?= esc($a['gelar_belakang']) ?></td>
                                <td><?= esc($a['jabatan']) ?></td>
                                <td><?= esc($a['status_pernikahan']) ?></td>
                                <td><?= esc($a['jumlah_anak']) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="8" class="text-center text-muted">Tidak ada data anggota.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <!-- Tombol Logout -->
        <div class="text-center mt-4">
            <a href="/logout" class="btn btn-danger">Logout</a>
        </div>
    </div>
</body>
</html>