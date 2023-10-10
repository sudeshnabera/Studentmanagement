<?php
class DB {
    private $host;
    private $username;
    private $password;
    private $database;
    private $conn;

    public function __construct($host, $username, $password, $database) {
        $this->host = $host;
        $this->username = $username;
        $this->password = $password;
        $this->database = $database;
    }

    public function connect() {
        try {
            $dsn = "mysql:host={$this->host};dbname={$this->database};charset=utf8mb4";
            $this->conn = new PDO($dsn, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return true;
        } catch (PDOException $e) {
            die("DB connection failed: " . $e->getMessage());
        }
    }

    public function disconnect() {
        $this->conn = null;
    }

    public function query($sql, $params = []) {
        try {
            $stmt = $this->conn->prepare($sql);
            $stmt->execute($params);
            return $stmt;
        } catch (PDOException $e) {
            die("Query failed: " . $e->getMessage());
        }
    }

    public function fetch($sql, $params = []) {
        try {
            $stmt = $this->query($sql, $params);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Fetch query failed: " . $e->getMessage());
        }
    }

    public function fetchAll($sql, $params = []) {
        try {
            $stmt = $this->query($sql, $params);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Fetch all query failed: " . $e->getMessage());
        }
    }

    public function insert($table, $data) {
        try {
            $columns = implode(", ", array_keys($data));
            $values = ":" . implode(", :", array_keys($data));
            $sql = "INSERT INTO {$table} ({$columns}) VALUES ({$values})";
            $this->query($sql, $data);
            return $this->conn->lastInsertId();
        } catch (PDOException $e) {
            die("Insert query failed: " . $e->getMessage());
        }
    }

    public function update($table, $data, $where) {
        try {
            $set = [];
            foreach ($data as $key => $value) {
                $set[] = "{$key} = :{$key}";
            }
            $set = implode(", ", $set);
            $sql = "UPDATE {$table} SET {$set} WHERE {$where}";
            return $this->query($sql, $data)->rowCount();
        } catch (PDOException $e) {
            die("Update query failed: " . $e->getMessage());
        }
    }

    public function delete($table, $where) {
        try {
            $sql = "DELETE FROM {$table} WHERE {$where}";
            return $this->query($sql)->rowCount();
        } catch (PDOException $e) {
            die("Delete query failed: " . $e->getMessage());
        }
    }
}

// Usage:
// $db = new DB("localhost", "username", "password", "database_name");
// if ($db->connect()) {
//     // Example queries:
//     $result = $db->fetch("SELECT * FROM users WHERE id = :id", ["id" => 1]);
//     $results = $db->fetchAll("SELECT * FROM products");
//     $newUserId = $db->insert("users", ["username" => "newuser", "email" => "newuser@example.com"]);
//     $updatedRows = $db->update("users", ["username" => "updateduser"], "id = :id", ["id" => 2]);
//     $deletedRows = $db->delete("users", "id = :id", ["id" => 3]);

//     $db->disconnect();
// }
?>