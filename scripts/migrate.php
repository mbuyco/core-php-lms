<?php

/**
 * Script for migrating database tables
 */

require_once(__DIR__ . '/../config/constants.php');
require_once(__DIR__ . '/../vendor/autoload.php');

use CorePhpLms\Services\PostgresDBDriver;

if (!defined('MIGRATION_DIR')) {
    define('MIGRATION_DIR', __DIR__ . '/../database/migrations');
}

/**
 * Get migration full file path
 *
 * @param string $migration_file_name Migration SQL file name.
 *
 * @return string Full path to migration SQL file.
 */
function get_migration_file_path(string $migration_file_name): string
{
    return MIGRATION_DIR . "/{$migration_file_name}";
}

$db = new PostgresDBDriver(DB_NAME, DB_HOST, DB_PASSWORD, DB_USER);
$scanned_directory = array_diff(scandir(MIGRATION_DIR), array('..', '.'));

foreach ($scanned_directory as $dir) {
    try {
        $sql = file_get_contents(get_migration_file_path($dir));
        $db->exec($sql);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
