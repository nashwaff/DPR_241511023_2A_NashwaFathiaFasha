<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login — ETS Gaji DPR</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
  <div class="container py-5">
    <div class="row justify-content-center">
      <div class="col-md-4">
        <div class="card shadow-sm">
          <div class="card-body">
            <h5 class="mb-3 text-center">Login</h5>
            <?php if(session()->getFlashdata('error')): ?>
              <div class="alert alert-danger"><?= esc(session()->getFlashdata('error')) ?></div>
            <?php endif; ?>
            <?php if(session()->getFlashdata('msg')): ?>
              <div class="alert alert-success"><?= esc(session()->getFlashdata('msg')) ?></div>
            <?php endif; ?>

            <form method="post" action="<?= site_url('login') ?>">
              <?= csrf_field() ?>
              <div class="mb-3">
                <label class="form-label">Username</label>
                <input name="username" class="form-control" required autofocus>
              </div>
              <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control" required>
              </div>
              <button class="btn btn-primary w-100" type="submit">Masuk</button>
            </form>
          </div>
        </div>
        <p class="text-center small mt-3 text-muted">ETS_2A_023</p>
      </div>
    </div>
  </div>
</body>
</html>