<?php

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

  // Gather error message
  $errors = [];

  if (!$username)
  {
    $errors['username'] = 'Username is required';
  }
  else if (strlen($username) <= 4)
  {
    $errors['username'] = 'Username should at least have 4 characters';
  }

  if (!$password)
  {
    $errors['password'] = 'Password is required';
  }
  else if (strlen($password) <= 4)
  {
    $errors['password'] = 'Password should at least have 4 characters';
  }

  // Check if account exists
  $data = mock_data();
  $users_data = $data['users'];
  $valid_user = NULL;

  foreach ($users_data as $user)
  {
    if (
      $user['username'] == $username &&
      $user['password'] == $password
    ) {
      $valid_user = $user;
      break;
    }
  }

  // Show error if user does not exist
  // If user exists, redirect to dashboard page
  if ($valid_user == NULL)
  {
    $errors[] = 'Username/password is invalid';
  }
  else
  {
    header('Location: dashboard.php');
    exit();
  }


  return [
    'html_errors' => html_errors($errors),
    'post_data' => $_POST,
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

function mock_data()
{
  return [
    'users' => [
      [
        'username' => 'mrbuyco',
        'password' => 'pw123',
      ],
    ],
  ];
}
