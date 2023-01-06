<?php

require_once(__DIR__ . '/IRepository.php');

class BaseRepository implements IRepository
{
    protected AbstractDBDriver $db;
    protected string $table_name;

    public function __construct(AbstractDBDriver $db)
    {
        $this->db = $db;
    }

    public function delete_by_id(int $id): void
    {
        $query = "DELETE FROM `{$this->table_name}` WHERE `id` = {$id}";
        $this->db->exec($query);
    }

    public function get_by_id(int $id)
    {
        $query = "SELECT * FROM `{$this->table_name}` WHERE `id` = {$id}";
        return $this->db->query($query);
    }

    public function get_where(array $where)
    {
        if (!count($where)) {
            return $this->list();
        }
        $query = "SELECT * FROM `{$this->table_name}`" . $this->_parse_where_clause($where);
        return $this->db->query($query, array_values($where));
    }

    public function insert(array $data): void
    {
        $query = "INSERT INTO `{$this->table_name}`";
        if (count($data)) {
            $query .= ' (' . implode(', ', array_keys($data)) . ') VALUES (';
            for ($i = 0; $i < count($data); $i++) {
                $query .= "?, ";
            }
            $query = trim($query, ',') . ')';
        }
        $this->db->exec($query, array_values($data));
    }

    public function list(): array
    {
        return $this->db->query("SELECT * FROM `{$this->table_name}`");
    }

    public function update(int $id, array $data): void
    {
        $query = "UPDATE FROM `{$this->table_name}`" . $this->_parse_set_clause($data);
        $this->db->exec($query, array_values($data));
    }

    private function _parse_set_clause(array $data): string
    {
        $set_list = [];
        $query = " SET ";
        foreach (array_keys($data) as $k) {
            $set_list[] = "`{$k}` = ?";
        }
        return $query . implode(', ', $set_list);
    }

    private function _parse_where_clause(array $where): string
    {
        $where_list = [];
        $query = " WHERE ";
        foreach (array_keys($where) as $k) {
            $where_list[] = "`{$k}` = ?";
        }
        return $query . implode(' AND ', $where_list);
    }
}
