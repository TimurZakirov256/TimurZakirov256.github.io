<?php
include 'script.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = $_POST['firstName'];
    $last_name = $_POST['lastName'];
    $email = $_POST['email'];
    $animal = $_POST['petType'];
    $address = $_POST['address'];

    $pdo = connect_db();
    $result = save_feedback($first_name, $last_name, $email, $animal, $address, $pdo);

    if ($result) {
        $response = array(
            'message' => 'Thank you for your order!'
        );
    } else {
        $response = array(
            'message' => 'An error occurred while processing your order.'
        );
    }

    header('Content-Type: application/json');
    echo json_encode($response);
    exit;
}
?>