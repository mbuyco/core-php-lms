<?php
require_once(__DIR__ . '/lib/core/config.php');
require_once(__DIR__ . '/lib/login.php');
$data = handle_login();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>$config['title']</title>
</head>
<body>
  <header>
    <h1>Welcome <?= $data['username'] ?></h1>
  </header>
  <section class="content">
    <a href="/logout.php">Logout</a>
  </section>
</body>
</html>
