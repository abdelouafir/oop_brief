<?php 
?>
<?php

class Database {

    private $host = 'localhost';
    private $db_name = 'fut';
    private $username = 'root';
    private $password = '';
    private $conn;

    public function getConnection() {
        $this->conn = null;
        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $exception) {
            echo "Connection error: " . $exception->getMessage();
        }
        return $this->conn;
    }

    function insertRecord($pdo, $table, $data) {
        $columns = implode(",", array_keys($data));
        $placeholders = implode(",", array_fill(0, count($data), "?"));
    
        $sql = "INSERT INTO $table ($columns) VALUES ($placeholders)";
        $stmt = $pdo->prepare($sql);
        return $stmt->execute(array_values($data));
    }
    
    function updateRecord($pdo, $table, $data, $id) {
        $setClause = [];
        foreach ($data as $key => $value) {
            $setClause[] = "$key = ?";
        }
    
        $sql = "UPDATE $table SET " . implode(",", $setClause) . " WHERE playerID = ?";
        $stmt = $pdo->prepare($sql);
        return $stmt->execute(array_merge(array_values($data), [$id]));
    }

    function deleteRecord($pdo, $table, $id) {
        $sql = "DELETE FROM $table WHERE playerID = ?";
        $stmt = $pdo->prepare($sql);
        return $stmt->execute([$id]);
    }

    // SELECT with pins params
    function select($table, $columns = "*", $conditions = null, $params = []) {
        $query = "SELECT $columns FROM $table";
        if ($conditions) {
            $query .= " WHERE $conditions";
        }

        $stmt = $this->conn->prepare($query);
        $stmt->execute($params);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    


}

// // Example usage
// $database = new Database();
// $conn = $database->getConnection();

// // Adding a new player
// echo $database->ajouteJoueur('Cristiano Ronaldo', 38, 'Forward');

// // Retrieving a player by ID
// print_r($database->retourneJoueur(1));
