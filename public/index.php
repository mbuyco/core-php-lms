<?php
require_once(__DIR__ . '/../lib/registration.php');

$config = require_once(__DIR__ . '/../lib/core/config.php');
$registration_response = handle_registration();
$html_errors = $registration_response['html_errors'];
$post_data = $registration_response['post_data'];
$success_message = $registration_response['success_message'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= $config['title']; ?></title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
</head>
<body>
  <section id="header" class="hero is-primary">
    <div class="hero-body">
      <h1 class="title"><?= $config['title']; ?></h1>
    </div>
  </section>
  <section id="main" class="section">
    <header class="block">
      <p class="title">Login or Register</p>
    </header>
    <form action="/" method="post">
      <div class="form-message">
        <?= $success_message; ?>
        <?= $html_errors; ?>
      </div>
      <div class="field">
        <label class="label">Username</label>
        <div class="control">
          <input class="input" name="username" type="text" value="<?= $post_data['username']; ?>">
        </div>
      </div>
      <div class="field">
        <label class="label">Password</label>
        <input class="input" name="password" type="password">
      </div>
      <button class="button is-primary" type="submit">Submit</button>
    </form>
  </section>
</body>
</html>
