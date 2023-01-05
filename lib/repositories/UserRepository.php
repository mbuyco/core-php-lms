<?php

require_once(__DIR__ . '/../core/constants.php');
require_once(__DIR__ . '/../services/SQLite3Driver.php');
require_once(__DIR__ . '/IRepository.php');

class UserRepository implements IRepository
{
  protected string $table_name = 'users';
  private SQLite3Driver $dbdriver;

  public function __construct()
  {
    $this->dbdriver = new SQLite3Driver(DB_PATH . DB_NAME);
  }

  public function delete(): void
  {
    return;
  }

  public function get_by_id(int $id)
  {
    $query = <<<EOF
      SELECT * FROM `$this->table_name`
      WHERE `id` = $id
      LIMIT 1;
    EOF;
    $result = $this->dbdriver->query($query);

    if (!$result) {
      return NULL;
    }

    return $result->fetchArray();
  }

  public function get_where(array $where)
  {
    if (!isset($where) or !count($where)) {
      return $this->list();
    }

    $query = <<<EOF
      SELECT * FROM `$this->table_name`
    EOF;
    $query_where = [];

    if (isset($where['username']))
    {
      $query_where[] = "`username` LIKE '%{$where['username']}%'";
    }

    if (isset($where['password']))
    {
      $query_where[] = "`password` LIKE '%{$where['password']}%'";
    }

    $query .= " WHERE " . implode(' AND ', $query_where);
    $result = $this->dbdriver->query($query);

    if (!$result) {
      return NULL;
    }

    return $result->fetchArray();
  }

  public function insert(array $data): void
  {
    if (!isset($data['username']) or !isset($data['password']))
    {
      return;
    }

    $query = <<<EOF
      INSERT INTO `$this->table_name` (`username`, `password`)
      VALUES ('{$data['username']}', '{$data['password']}')
    EOF;

    $this->dbdriver->exec($query);
  }

  public function list(): array
  {
    $query = <<<EOF
      SELECT * FROM `$this->table_name`;
    EOF;

    $results = $this->dbdriver->query($query);
    $rows = [];

    while ($row = $results->fetchArray())
    {
      $rows[] = $row;
    }

    return $rows;
  }

  public function update(int $id, array $data): void
  {
    return;
  }
}
