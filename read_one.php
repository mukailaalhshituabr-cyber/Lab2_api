<?php
header("Content-Type: application/json");
include "../db.php";

if (!isset($_GET['id'])) {
    echo json_encode([
        "success" => false,
        "error" => "ID required"
    ]);
    exit;
}

$id = intval($_GET['id']);

$sql = "SELECT * FROM items WHERE id = $id";
$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();

    echo json_encode([
        "success" => true,
        "data" => $row
    ]);
} else {
    echo json_encode([
        "success" => false,
        "error" => "not found"
    ]);
}

$conn->close();
?>
