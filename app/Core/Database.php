<?php

namespace App\Core;

use PDO;
class Database
{
    private static $instance;
    private $pdo;

    private function __construct()
    {
    $config = require __DIR__ . '/../../config.php';
    $dbconfig = $config['db'];

    $dsn = "mysql:host={$dbconfig['host']};dbname={$dbconfig['dbname']};charset={$dbconfig['charset']}";

    $options = [
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
    ];

    $this->pdo = new PDO($dsn, $dbconfig['user'], $dbconfig['password'], $options);
    }

    public static function getInstance()
    {
        if (!isset(self::$instance)) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function getConnection()
    {
        return $this->pdo;
    }
}