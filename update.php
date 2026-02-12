<?php
require_once 'db.php';

// Check required fields
if (!isset($_POST['id']) || !isset($_POST['name']) || !isset($_POST['phone'])) {
    echo json_encode(['success' => false, 'error' => 'ID, name and phone are required']);
    exit;
}

$id = $_POST['id'];
$name = trim($_POST['name']);
$phone = trim($_POST['phone']);

if (!is_numeric($id) || empty($name) || empty($phone)) {
    echo json_encode(['success' => false, 'error' => 'Invalid input data']);
    exit;
}

try {
    $stmt = $pdo->prepare("UPDATE student SET name = ?, phone = ? WHERE id = ?");
    $stmt->execute([$name, $phone, $id]);
    
    if ($stmt->rowCount() > 0) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'error' => 'Record not found or no changes made']);
    }
} catch(PDOException $e) {
    echo json_encode(['success' => false, 'error' => 'Failed to update record']);
}
?>