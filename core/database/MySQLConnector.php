<?php

namespace Core\Database;

class MySQLConnector {
    private $connection;

    public function __construct($host, $user, $password, $database) {
        try {
            $dsn = "mysql:host=$host;dbname=$database;charset=utf8mb4";
            $this->connection = new \PDO($dsn, $user, $password, [
                \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
                \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
                \PDO::ATTR_EMULATE_PREPARES => false,
            ]);
        } catch (\PDOException $e) {
            throw new \Exception("Database connection failed: " . $e->getMessage());
        }
    }

    public function query($sql) {
        return $this->connection->query($sql);
    }

    public function prepare($sql) {
        return $this->connection->prepare($sql);
    }

    public function execute($stmt, $params = []) {
        return $stmt->execute($params);
    }

}