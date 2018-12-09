<?php
namespace App;

use Symfony\Component\Yaml\Yaml;

class DBConfig {

    private static $instance = null;

    private $config = null;

    private function __construct() {
        $content = file_get_contents(__DIR__.'/../config/db.yaml');
        $this->config = Yaml::parse($content);
    }

    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new DBConfig();
        }
        return self::$instance;
    }

    public function getData() {
        return $this->config;
    }

}