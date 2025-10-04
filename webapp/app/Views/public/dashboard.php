<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Publik - Transparansi Gaji DPR</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="bg-light">

    <nav class="navbar navbar-dark bg-dark mb-4">
        <div class="container-fluid">
            <span class="navbar-brand mb-0 h1">Transparansi Gaji DPR</span>
            <a href="/logout" class="btn btn-outline-light">Logout</a>
        </div>
    </nav>

    <div class="container text-center py-5">
        <h1 class="mb-4">Dashboard Publik</h1>
        <p class="text-muted mb-5">Selamat datang di halaman transparansi data DPR. Anda dapat melihat data anggota dan penggajian secara terbuka.</p>

        <div class="row justify-content-center">
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        <h4 class="card-title">📋 Data Anggota DPR</h4>
                        <p class="card-text">Lihat daftar lengkap anggota DPR dan informasi jabatannya.</p>
                        <a href="/public/anggota" class="btn btn-primary w-100">Lihat Data</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        <h4 class="card-title">💰 Data Penggajian</h4>
                        <p class="card-text">Lihat informasi take home pay anggota DPR secara transparan.</p>
                        <a href="/public/penggajian" class="btn btn-success w-100">Lihat Data</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>