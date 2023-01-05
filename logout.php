<?php

require_once(__DIR__ . '/lib/core/session.php');

$session_manager = new SessionManager();
$session_manager->clear();

header('Location: index.php');
exit();
