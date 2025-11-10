<?php

namespace Framework;
use PDO;
use PDOException;
use PDOStatement;

class Database
{
    // Database connection logic will go here
    protected $conn;

    public function __construct($config)
    {
        // Constructor logic here
        $dsn = "mysql:host={$config['host']};dbname={$config['dbname']};port={$config['port']}";
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
        ];

        try {
            $this->conn = new PDO($dsn, $config['username'], $config['password'], $options);
        } catch (PDOException $e) {
            throw new PDOException("Database connection failed: {$e->getMessage()}");
        }
    }

  /**
   * Query the database
   * 
   * @param string $query
   * 
   * @return PDOStatement
   * @throws PDOException
   */
  public function query($query, $params = [])
  {
    try {
      $stmt = $this->conn->prepare($query);

      // Bind named params
      foreach ($params as $param => $value) {
        $stmt->bindValue(':' . $param, $value);
      }

      $stmt->execute();
      return $stmt;
    } catch (PDOException $e) {
      throw new PDOException("Query failed to execute: {$e->getMessage()}");
    }
  }
}