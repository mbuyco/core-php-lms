<?php

namespace CorePhpLms\Services;

use PDO;
use PDOStatement;

abstract class AbstractDBDriver implements IDBDriver
{
    protected PDO $pdo;
    protected string $dbname;
    protected string $host;
    protected string $password;
    protected string $user;

    public function __construct(
        string $dbname,
        string $host,
        string $password,
        string $user,
    ) {
        $this->dbname = $dbname;
        $this->host = $host;
        $this->password = $password;
        $this->user = $user;
        $this->connect();
    }

    abstract public function connect(): void;

    public function exec(string $query, array $params = []): int|false
    {
        $stmt = $this->prepare($query, $params);
        return $stmt->rowCount();
    }

    public function query(
        string $query,
        array $params = [],
    ): array {
        $stmt = $this->prepare($query, $params);
        return $stmt->fetchAll($query);
    }

    public function prepare(
        string $query,
        array $params = [],
    ): PDOStatement|false {
        $stmt = $this->pdo->prepare($query);
        $stmt->execute($params);
        return $stmt;
    }
}
