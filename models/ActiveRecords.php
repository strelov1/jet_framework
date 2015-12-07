<?php

namespace Models;

use App\Db;

abstract class ActiveRecords
{
    protected $db_link;

    public function __construct()
    {
        $this->db_link = new Db();
    }

    public function getAll()
    {
        $sql = 'SELECT * FROM ' . $this->tableName();
        return $this->db_link->findAll($sql);
    }

    public function getOne($id_col)
    {
        $sql = 'SELECT * FROM ' . $this->tableName() . ' WHERE `id`= \'' . (int)$id_col . '\'';
        return $this->db_link->findOne($sql);
    }

    public function add($objekt)
    {
        $columns = [];
        $values = [];
        foreach ($objekt as $key => $value) {
            $columns[] = $key;
            if ($value == null) {
                $values[] = "NULL";
            } else {
                $values[] = "'$value'";
            }
        }

        $columns_s = implode(",", $columns);
        $values_s = implode(",", $values);

        $sql = 'INSERT INTO ' . $this->tableName() . ' (' . $columns_s . ') VALUES (' . $values_s . ')';
        if ($this->db_link->execSql($sql)) {
            return true;
        } else {
            return false;
        }
    }

    public function delete($id_col)
    {
        $sql = 'DELETE FROM `article` WHERE `id` = \'' . $id_col . '\'';
        if ($this->db_link->execSql($sql)) {
            return true;
        } else {
            return false;
        }
    }

    public function save()
    {
        return $this;
    }
}

