<?php
include 'script.php';

$items = get_items();
header('Content-Type: application/json');
echo json_encode($items);
