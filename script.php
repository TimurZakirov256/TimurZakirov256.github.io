<?php
function connect_db() {
    $host = 'MySQL-8.2';
    $db = 'lab_db';
    $user = 'root';
    $pass = ''; 


    try {
        $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    } catch (PDOException $e) {
        die("Could not connect to the database $db :" . $e->getMessage());
    }
}

function get_items() {
    $pdo = connect_db();
    $stmt = $pdo->query('SELECT * FROM items');
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function save_feedback($first_name, $last_name, $email, $animal, $address, $pdo) {
    try {
        $stmt = $pdo->prepare("INSERT INTO feedback (first_name, last_name, email, animal, address) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$first_name, $last_name, $email, $animal, $address]);
        return true;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        return false;
    }
}
?>