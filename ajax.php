<?php

$servername = "MySQL-8.2";
$username = "root";
$password = "";
$dbname = "lab_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $sql = "SELECT id, first_name, last_name, email, animal, address, created_at FROM feedback";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table>";
        echo "<tr><th>ID</th><th>First Name</th><th>Last Name</th><th>Email</th><th>Animal</th><th>Address</th><th>Created At</th></tr>";
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["id"] . "</td>";
            echo "<td>" . $row["first_name"] . "</td>";
            echo "<td>" . $row["last_name"] . "</td>";
            echo "<td>" . $row["email"] . "</td>";
            echo "<td>" . $row["animal"] . "</td>";
            echo "<td>" . $row["address"] . "</td>";
            echo "<td>" . $row["created_at"] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No data found";
    }
}

$conn->close();
?>
