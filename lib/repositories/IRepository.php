<?php

interface IRepository
{
  public function delete(): void;
  public function get_by_id(int $id);
  public function get_where(array $where);
  public function insert(array $data): void;
  public function list(): array;
  public function update(int $id, array $data): void;
}
