<?php
header("Content-Type: application/json");
include "../db.php";

if (!isset($_POST['id'])) {
    echo json_encode([
        "success" => false,
        "error" => "ID required"
    ]);
    exit;
}

$id = intval($_POST['id']);

$sql = "DELETE FROM items WHERE id=$id";

if ($conn->query($sql) && $conn->affected_rows > 0) {
    echo json_encode([
        "success" => true
    ]);
} else {
    echo json_encode([
        "success" => false,
        "error" => "Delete failed or record not found"
    ]);
}

$conn->close();
?>
