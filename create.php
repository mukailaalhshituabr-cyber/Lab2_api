<?php
header("Content-Type: application/json");
include "../db.php";

if (!isset($_POST['name']) || !isset($_POST['phone'])) {
    echo json_encode([
        "success" => false,
        "error" => "Missing parameters"
    ]);
    exit;
}

$name = $conn->real_escape_string($_POST['name']);
$phone = $conn->real_escape_string($_POST['phone']);

$sql = "INSERT INTO student (name, phone) VALUES ('$name', '$phone')";

if ($conn->query($sql)) {
    echo json_encode([
        "success" => true,
        "data" => ["id" => $conn->insert_id]
    ]);
} else {
    echo json_encode([
        "success" => false,
        "error" => "Insert failed"
    ]);
}

$conn->close();
?>
