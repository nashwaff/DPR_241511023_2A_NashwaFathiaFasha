<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Data Penggajian DPR</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="bg-light">

    <div class="container py-5">
        <h2 class="text-center mb-4">💰 Data Penggajian Anggota DPR</h2>

        <div class="table-responsive shadow-sm">
            <table class="table table-striped table-bordered align-middle">
                <thead class="table-dark text-center">
                    <tr>
                        <th>ID Anggota</th>
                        <th>Nama Lengkap</th>
                        <th>Jabatan</th>
                        <th>Total Take Home Pay</th>
                        <th>Tanggal Penggajian</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    <?php if (!empty($penggajian)): ?>
                        <?php foreach ($penggajian as $p): ?>
                            <tr>
                                <td><?= esc($p['id_anggota']) ?></td>
                                <td><?= esc($p['nama_lengkap']) ?></td>
                                <td><?= esc($p['jabatan']) ?></td>
                                <td>Rp <?= number_format($p['total_takehomepay'], 2, ',', '.') ?></td>
                                <td><?= esc($p['tanggal_penggajian']) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="5" class="text-center text-muted">Tidak ada data penggajian.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <div class="text-center mt-4">
            <a href="/logout" class="btn btn-danger">Logout</a>
        </div>
    </div>

</body>
</html>