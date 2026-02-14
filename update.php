<?php
header("Content-Type: application/json");
include "../db.php";

if (!isset($_POST['id']) || !isset($_POST['name']) || !isset($_POST['phone'])) {
    echo json_encode([
        "success" => false,
        "error" => "Missing parameters"
    ]);
    exit;
}

$id = intval($_POST['id']);
$name = $conn->real_escape_string($_POST['name']);
$phone = $conn->real_escape_string($_POST['phone']);

$sql = "UPDATE items SET name='$name', phone='$phone' WHERE id=$id";

if ($conn->query($sql) && $conn->affected_rows > 0) {
    echo json_encode([
        "success" => true
    ]);
} else {
    echo json_encode([
        "success" => false,
        "error" => "Update failed or record not found"
    ]);
}

$conn->close();
?>
