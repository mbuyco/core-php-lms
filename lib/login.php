<?php

require_once(__DIR__ . '/session.php');

function handle_login(): array
{
  $session_manager = new SessionManager();
  $username = $session_manager->get('username');
  return [
    'username' => $username,
  ];
}

