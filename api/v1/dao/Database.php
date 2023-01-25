<?php
declare(strict_types=1);

namespace Api\V1\Dao;

use PDO;

class Database {

  private $host;
  private $user;
  private $password;
  private $dbName;
  protected $connection;

  public function __construct()
  {
    $this->host = $_ENV['SERVER'];
    $this->user = $_ENV['DB_USER'];
    $this->password = $_ENV['DB_PASSWORD'];
    $this->dbName = $_ENV['DB_NAME'];
    $this->connect();
  }

  protected function connect(): void
  {
    try {
      $dsn = 'mysql:host='. $this->host . ';dbname=' .$this->dbName;
      $this->connection = new PDO($dsn, $this->user, $this->password);
    } catch (\PDOException $e) {
      throw new \PDOException($e->getMessage(), $e->getCode());
    }
  }

  private function closeConnection(): void
	{
		$this->connection->stmt = null;
		$this->connection = null;
	}

  public function  __destruct()
	{
		$this->closeConnection();
	}
}