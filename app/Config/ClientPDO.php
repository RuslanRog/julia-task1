<?php

namespace App\Config;
use PDO;
use PDOException;


class ClientPDO
{
    private static $instance;
    private $pdo;

    public function __construct()
    {
        // Connect to the database
try {
    $this->pdo = new PDO(
        'mysql:host=localhost' . ';dbname=julia_task_one' . ';charset=utf8',
        'root',
        'root',
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
    );
} catch (PDOException $e) {
    die('Database connection failed: ' . $e->getMessage());
}
    }

    public static function getInstance()
    {
        if (!isset(self::$instance)) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function getClient()
    {
        return $this->pdo;
    }
}
