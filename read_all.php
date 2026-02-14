<?php
header("Content-Type: application/json");
include "../db.php";

$sql = "SELECT * FROM items";
$result = $conn->query($sql);

$data = [];

if ($result) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }

    echo json_encode([
        "success" => true,
        "data" => $data
    ]);
} else {
    echo json_encode([
        "success" => false,
        "error" => "Query failed"
    ]);
}

$conn->close();
?>
