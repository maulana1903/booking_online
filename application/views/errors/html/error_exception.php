<!DOCTYPE html>
<html>
<head>
  <title>Exception Error</title>
  <style>
    body { font-family: Arial; background:#f8f9fa; padding:20px; }
    .error { background:#fff; border-left:5px solid #dc3545; padding:15px; }
    h1 { color:#dc3545; }
    pre { background:#f1f1f1; padding:10px; }
  </style>
</head>
<body>

<div class="error">
  <h1>Terjadi Exception</h1>
  <p><strong>Message:</strong> <?= $message ?></p>
  <p><strong>File:</strong> <?= $file ?></p>
  <p><strong>Line:</strong> <?= $line ?></p>
</div>

</body>
</html>
