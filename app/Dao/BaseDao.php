<?php

namespace App\Dao;

use App\Core\Database;
use PDO;

class BaseDao
{
    protected $db;
    protected $table;
    protected $fillable = [];
    protected $conditions = [];

    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();
    }

    public function where($conditions)
    {
        $this->conditions = $conditions;
        return $this;
    }

    public function first()
    {
        $results = $this->getQueryResults(true);
        return $results ? $results[0] ?? $results : null;
    }

    public function get()
    {
        return $this->getQueryResults();
    }

    private function getQueryResults($single = false)
    {
        $where = '';
        $params = [];

        foreach ($this->conditions as $column => $value) {
            $where .= $column . ' = :' . $column . ' AND ';
            $params[$column] = $value;
        }

        $where = rtrim($where, ' AND ');
        $sql = 'SELECT * FROM ' . $this->table . ($where ? ' WHERE ' . $where : '');
        $sql .= $single ? ' LIMIT 1' : '';
        $stmt = $this->db->prepare($sql);
        $stmt->execute($params);

        return $single ? $stmt->fetch(PDO::FETCH_ASSOC) : $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function find($id)
    {
        $stmt = $this->db->prepare('SELECT * FROM ' . $this->table . ' WHERE id = :id');
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($data)
    {
        $columns = '';
        $placeholders = '';

        foreach ($this->fillable as $key) {
            if (!isset($data[$key])) {
                continue;
            }

            $columns .= $key . ', ';
            $placeholders .= ':' . $key . ', ';
        }

        $columns = rtrim($columns, ', ');
        $placeholders = rtrim($placeholders, ', ');
        $sql = 'INSERT INTO ' . $this->table . ' (' . $columns . ') VALUES (' . $placeholders . ')';
        $stmt = $this->db->prepare($sql);

        $stmt->execute($data);

        $lastId =  $this->db->lastInsertId();
        return $this->find($lastId);
    }

    public function update($data, $id)
    {
        $columns = '';

        foreach ($this->fillable as $key) {
            if (!isset($data[$key])) {
                continue;
            }
            $columns .= $key . ' = :' . $key . ', ';
        }

        $columns = rtrim($columns, ', ');
        $sql = 'UPDATE ' . $this->table . ' SET ' . $columns . ' WHERE id = :id';
        $data['id'] = $id;

        $stmt = $this->db->prepare($sql);
        $stmt->execute($data);
    }

    public function delete($id)
    {
        $stmt = $this->db->prepare('DELETE FROM ' . $this->table . ' WHERE id = :id');
        $stmt->execute(['id' => $id]);
    }
}