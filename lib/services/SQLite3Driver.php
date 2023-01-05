<?php

class SQLite3Driver
{
  public SQLite3 $driver;

  public function __construct(string $db_filename)
  {
    $this->driver = new SQLite3($db_filename);
  }

  public function exec(string $query)
  {
    return $this->driver->exec($query);
  }

  public function last_error_msg(): string
  {
    return $this->driver->lastErrorMsg();
  }

  public function query(string $query)
  {
    return $this->driver->query($query);
  }
}
