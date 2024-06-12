<?php
include 'script.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $animal = $_POST['animal'];
    $address = $_POST['address'];

    save_feedback($first_name, $last_name, $email, $animal, $address);

    echo "Thank you for your feedback!";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Feedback Form</title>
</head>
<body>
    <h1>Feedback Form</h1>
    <form action="feedback.php" method="post">
        <label for="first_name">First Name:</label><br>
        <input type="text" id="first_name" name="first_name" required><br><br>
        <label for="last_name">Last Name:</label><br>
        <input type="text" id="last_name" name="last_name" required><br><br>
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br><br>
        <label for="animal">Favorite Animal:</label><br>
        <input type="text" id="animal" name="animal" required><br><br>
        <label for="address">Address:</label><br>
        <textarea id="address" name="address" required></textarea><br><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>