<?php
function connect_db() {
    $host = 'MySQL-5.7';
    $db = 'website_db';
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
?>