<?php
require_once('lib/registration.php');

$page_title = $config['title'] ?: 'Hello World';
$registration_response = handle_registration();
$html_errors = $registration_response['html_errors'];
$post_data = $registration_response['post_data'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title><?= $page_title; ?></title>
</head>
<body>
  <header>
    <h1><?= $page_title; ?></h1>
  </header>
  <section class="content">
    <header>
      <h4>Login or Register</h4>
    </header>
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
