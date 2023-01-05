<?php

require_once(__DIR__ . '/../lib/core/constants.php');
require_once(__DIR__ . '/../lib/services/SQLite3Driver.php');

$sqlite_driver = new SQLite3Driver(DB_PATH . DB_NAME);
$sql = file_get_contents(__DIR__ . './../data/schema.sql');
$sqlite_driver->exec($sql);
