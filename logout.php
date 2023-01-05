<?php

require_once(__DIR__ . '/lib/session.php');

$session_manager = new SessionManager();
$session_manager->clear();

header('Location: index.php');
exit();
