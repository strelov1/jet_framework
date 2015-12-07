<?php

namespace App;

use PDO;

class Db
{
    protected $db_link;

    public function __construct()
    {
        if (file_exists(__DIR__ . '/../config/db_config_local.php')) {
            $config = require_once __DIR__ . '/../config/db_config_local.php';
        } else {
            echo 'Нет конфигурационного файла';
        }
        try {
            $this->db_link = new PDO($config['dsn'], $config['user'], $config['password']);
        } catch (PDOException $e) {
            echo 'Подключение не удалось: ' . $e->getMessage();
        }
    }

    public function findAll($sql)
    {
        $ste = $this->db_link->query($sql);
        $results = $ste->fetchAll();
        return $results;
    }

    public function findOne($sql)
    {
        $ste = $this->db_link->query($sql);
        $results = $ste->fetchObject();
        return $results;
    }

    public function add($tablename, $objekt)
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

        $sql = 'INSERT INTO ' . $tablename . ' (' . $columns_s . ') VALUES (' . $values_s . ')';
        if ($this->execSql($sql)) {
            return true;
        } else {
            return false;
        }
    }

    public function execSql($sql)
    {
        if ($this->db_link->exec($sql)) {
            return true;
        } else {
            return false;
        }
    }
}
