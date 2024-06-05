<?php

namespace App\Model;

use App\Core\Database;
use PDO;

class Model
{
    protected $db;
    protected $table;
    protected $fillable = [];
    protected $conditions = [];

    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();
    }

    public static function where($conditions)
    {
        $instance = new static();
        $instance->conditions = $conditions;
        return $instance;
    }

    public function first()
    {
        $results = $this->getQueryResults(true);
        return $results ? $results[0] : null;
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

        $stmt->setFetchMode(PDO::FETCH_CLASS, get_called_class());
        return $single ? [$stmt->fetch()] : $stmt->fetchAll();
    }

    public function find($id)
    {
        $stmt = $this->db->prepare('SELECT * FROM ' . $this->table . ' WHERE id = :id');
        $stmt->execute(['id' => $id]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, get_called_class());
        return $stmt->fetch();
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