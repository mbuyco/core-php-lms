<?php

namespace CorePhpLms\Repositories;

interface ISQLRepository
{
    public function delete_by_id(int $id): void;
    public function get_by_id(int $id);
    public function get_where(array $where);
    public function insert(array $data): void;
    public function list(int $limit, int $offset): array;
    public function update(int $id, array $data): void;
}
