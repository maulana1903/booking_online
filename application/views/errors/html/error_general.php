<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <title>Error Umum</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #f8f9fa;
      padding: 20px;
    }
    .error-box {
      background: #fff;
      border-left: 6px solid #dc3545;
      padding: 20px;
      border-radius: 4px;
    }
    h1 {
      color: #dc3545;
      margin-top: 0;
    }
    pre {
      background: #f1f1f1;
      padding: 10px;
      overflow-x: auto;
    }
    .small {
      color: #666;
      font-size: 13px;
    }
  </style>
</head>
<body>

<div class="error-box">
  <h1>Terjadi Kesalahan</h1>

  <?php if (isset($heading)) : ?>
    <p><strong>Judul:</strong> <?= $heading ?></p>
  <?php endif; ?>

  <?php if (isset($message)) : ?>
    <p><strong>Pesan:</strong></p>
    <pre><?= $message ?></pre>
  <?php endif; ?>

  <?php if (isset($exception)) : ?>
    <p><strong>Exception:</strong></p>
    <pre><?= $exception->getMessage() ?></pre>

    <p class="small">
      File: <?= $exception->getFile() ?><br>
      Line: <?= $exception->getLine() ?>
    </p>
  <?php endif; ?>

  <p class="small">
    Environment: <?= ENVIRONMENT ?><br>
    Time: <?= date('Y-m-d H:i:s') ?>
  </p>
</div>

</body>
</html>
