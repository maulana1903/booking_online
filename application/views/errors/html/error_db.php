<!DOCTYPE html>
<html>
<head>
  <title>Database Error</title>
  <style>
    body { font-family: Arial; background:#f8f9fa; padding:20px; }
    .error { background:#fff; border-left:5px solid #dc3545; padding:15px; }
    h1 { color:#dc3545; }
    pre { background:#f1f1f1; padding:10px; }
  </style>
</head>
<body>

<div class="error">
  <h1>Terjadi Kesalahan Database</h1>

  <?php if (isset($message)) : ?>
    <p><strong>Pesan:</strong> <?= $message ?></p>
  <?php endif; ?>

  <?php if (isset($heading)) : ?>
    <p><strong>Judul:</strong> <?= $heading ?></p>
  <?php endif; ?>

</div>

</body>
</html>
