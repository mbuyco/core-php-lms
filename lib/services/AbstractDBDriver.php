<?php

require_once(__DIR__ . '/IDBDriver.php');

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

  public function exec(string $query): int|false
  {
    return $this->pdo->exec($query);
  }

  public function query(string $query): PDOStatement|false
  {
    return $this->pdo->query($query);
  }
}
