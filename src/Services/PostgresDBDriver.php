<?php

require_once(__DIR__ . '/AbstractDBDriver.php');

class PostgresDBDriver extends AbstractDBDriver
{
    public function connect(): void
    {
        $dbdriver_type = 'pgsql';
        $dsn = "{$dbdriver_type}:dbname={$this->dbname};host={$this->host}";
        $this->pdo = new PDO($dsn, $this->user, $this->password);
    }
}
