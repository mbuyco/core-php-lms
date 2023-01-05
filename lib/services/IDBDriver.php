<?php

interface IDBDriver
{
  public function connect(): void;
  public function exec(string $query);
  public function query(string $query);
}
