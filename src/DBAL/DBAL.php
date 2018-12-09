<?php

namespace App\DBAL;

use Symfony\Component\Yaml\Yaml;
use App\DBConfig;
use \PDO;

class DBAL {

    private $db;

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
        $this->query('use ' . $s);
        return $this;
    }

    public function query($sql, $data = []) {
        try {
            $sth = $this->db->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
            $sth->execute($data);
            return $sth->fetchAll();
        } catch(\Exception $e) {
            return null;
        }

    }

    public function selectAll($table) {
        $stmt = $this->db->query('select * from ' . $table);
        return $stmt;
    }

    public function create($sql, $data) {
        return $this->query($sql, $data);
    }

    public function delete($sql, $data) {
        return $this->query($sql, $data);
    }




}