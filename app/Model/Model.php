<?php

namespace App\Model;

use App\Core\Database;

class Model {
    protected $db;
    protected $table;
    protected $fillable = [];

    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }

    public function get()
    {
        $stmt = $this->db->query('SELECT * FROM ' . $this->table);
        return $stmt->fetchAll();
    }

    public function find($id)
    {
        $stmt = $this->db->prepare('SELECT * FROM ' . $this->table . ' WHERE id = :id');
        $stmt->execute(['id' => $id]);
        return $stmt->fetch();
    }

    public function create($data)
    {
        $columns = '';
        $placeholders = '';

        foreach ($this->fillable as $key) {
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