<?php
include 'script.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $image_url = $_POST['image_url'];
    $description = $_POST['description'];
    $link = $_POST['link'];

    $pdo = connect_db();
    $stmt = $pdo->prepare("INSERT INTO items (title, image_url, description, link) VALUES (?, ?, ?, ?)");
    $stmt->execute([$title, $image_url, $description, $link]);

    header('Location: index.php');
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Item</title>
</head>
<body>
    <h1>Add Item</h1>
    <form action="add_item.php" method="post">
        <label for="title">Title:</label><br>
        <input type="text" id="title" name="title" required><br><br>
        <label for="image_url">Image URL:</label><br>
        <input type="text" id="image_url" name="image_url" required><br><br>
        <label for="description">Description:</label><br>
        <textarea id="description" name="description" required></textarea><br><br>
        <label for="link">Link:</label><br>
        <input type="text" id="link" name="link" required><br><br>
        <input type="submit" value="Add Item">
    </form>
</body>
</html>