






















<?php

function connectDatabase() {
    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'task_db';

    try {
        // Create a PDO instance (connection to database)
        $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // Set the PDO error mode to exception
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // Set charset to UTF-8
        $pdo->exec("SET NAMES utf8mb4");

        return $pdo;
    } catch (PDOException $e) {
        die("Connection failed: " . $e->getMessage());
    }
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

    $sql = "UPDATE $table SET " . implode(",", $setClause) . " WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute(array_merge(array_values($data), [$id]));
}

function deleteRecord($pdo, $table, $id) {
    $sql = "DELETE FROM $table WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute([$id]);
}

function selectRecords($pdo, $table, $columns = "*", $where = null) {
    $sql = "SELECT $columns FROM $table";
    if ($where) {
        $sql .= " WHERE $where";
    }
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Example usage:

$pdo = connectDatabase();

// Insert record example
$insertData = ['column1' => 'value1', 'column2' => 'value2'];
insertRecord($pdo, 'your_table', $insertData);

// Update record example
$updateData = ['column1' => 'new_value1', 'column2' => 'new_value2'];
updateRecord($pdo, 'your_table', $updateData, 1);

// Delete record example
deleteRecord($pdo, 'your_table', 1);

// Select record example
$records = selectRecords($pdo, 'your_table', 'column1, column2', 'column1 = "value1"');

// Output the records
foreach ($records as $row) {
    print_r($row);
}

// Close connection (automatically done by PHP at script end)
$pdo = null;
?>
