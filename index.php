<?php
require_once(__DIR__ . '/lib/registration.php');

$config = require_once(__DIR__ . '/lib/config.php');
$registration_response = handle_registration();
$html_errors = $registration_response['html_errors'];
$post_data = $registration_response['post_data'];
$success_message = $registration_response['success_message'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title><?= $config['title']; ?></title>
</head>
<body>
  <header>
    <h1>Simple LMS Login</h1>
  </header>
  <section class="content">
    <header>
      <h4>Login or Register</h4>
    </header>
    <?= $success_message; ?>
    <?= $html_errors; ?>
    <form action="/" method="post">
      <div class="form-row">
        <label>Username</label>
        <input name="username" type="text" value="<?= $post_data['username']; ?>">
      </div>
      <div class="form-row">
        <label>Password</label>
        <input name="password" type="password">
      </div>
      <button type="submit">Submit</button>
    </form>
  </section>
</body>
</html>
