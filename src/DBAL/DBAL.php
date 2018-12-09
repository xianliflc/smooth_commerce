<?php

namespace App\DBAL;

use Symfony\Component\Yaml\Yaml;
use App\DBConfig;
use \PDO;

class DBAL {

    protected $db;

    public function __construct(string $schema = "")
    {
        $config = (DBConfig::getInstance())->getData()['db_config'];
        $schema = !is_null($schema)? $schema : $config['db'] ;
        $dsn = "mysql:host=" . $config['host'].";dbname=" . $schema .";charset=" . $config['charset'];
        $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];
        try {
             $this->db = new PDO($dsn, $config['user'], $config['pass'], $options);
             unset($config);
        } catch (\PDOException $e) {
             throw new \PDOException($e->getMessage(), (int)$e->getCode());
        }


    }

    public function useSchema($s) {
        $this->query('use ' . $a);
        return $this;
    }

    public function query($sql, $data) {
        $stmt = $this->db->query($sql)->fetchAll();
        return $stmt;
    }

    public function selectAll($table) {
        $stmt = $this->db->query('select * from ' . $table)->fetchAll();
        return $stmt;
    }

    public function create($sql, $data) {
        return $this->query($sql, $data);
    }

    public function delete($sql, $data) {
        return $this->query($sql, $data);
    }




}