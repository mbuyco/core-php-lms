<?php

interface IDBDriver
{
    public function connect(): void;
    public function exec(string $query, array $params = []): int|false;
    public function prepare(string $query, array $params = []): PDOStatement|false;
    public function query(string $query, array $params = []): array;
}
