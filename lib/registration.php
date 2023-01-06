<?php

require_once(__DIR__ . '/core/constants.php');
require_once(__DIR__ . '/repositories/UserRepository.php');
require_once(__DIR__ . '/core/session.php');
require_once(__DIR__ . '/services/PostgresDriver.php');

function handle_registration(): array
{
  if (!count($_POST))
  {
    return [
      'html_errors' => '',
      'post_data' => [
        'username' => '',
        'password' => '',
      ],
      'success_message' => '',
    ];
  }

  // Validate username / password
  $username = NULL;
  $password = NULL;

  if (isset($_POST['username']) && trim($_POST['username']) != '')
  {
    $username = $_POST['username'];
  }

  if (isset($_POST['password']) && trim($_POST['password']) != '')
  {
    $password = $_POST['password'];
  }

  // Gather status messages
  $errors = [];
  $success_message = '';

  if (!$username)
  {
    $errors['username'] = 'Username is required';
  }
  else if (strlen($username) < 4)
  {
    $errors['username'] = 'Username should at least have 4 characters';
  }

  if (!$password)
  {
    $errors['password'] = 'Password is required';
  }
  else if (strlen($password) < 4)
  {
    $errors['password'] = 'Password should at least have 4 characters';
  }

  // Return errors if existing
  if (count($errors))
  {
    return [
      'html_errors' => html_errors($errors),
      'post_data' => $_POST,
      'success_message' => $success_message,
    ];
  }

  // Access user repository
  $db = new PostgresDriver(DB_NAME, DB_HOST, DB_PASSWORD, DB_USER);
  $user_repository = new UserRepository($db);

  // Check if account exists
  $check_user = $user_repository->get_where([
    'username' => $username,
    'password' => $password,
  ]);

  // Register if user does not exist
  // If user exists, redirect to login.php
  if ($check_user == NULL)
  {
    $user_repository->insert([
      'username' => $username,
      'password' => $password,
    ]);
    $success_message = '<div class="success"><p>Registration successful</p></div>';
    unset($_POST);
  }
  else
  {
    $session_manager = new SessionManager();
    $session_manager->set('username', $username);
    $session_manager->set('password', $password);
    header('Location: dashboard.php');
    exit();
  }


  return [
    'html_errors' => html_errors($errors),
    'post_data' => $_POST,
    'success_message' => $success_message,
  ];
}

function html_errors(array $errors): string
{
  if (empty($errors))
  {
    return '';
  }

  $html = '<div class="error">';

  foreach ($errors as $error)
  {
    $html .= "<p>{$error}</p>";
  }

  $html .= '</div>';

  return $html;
}
