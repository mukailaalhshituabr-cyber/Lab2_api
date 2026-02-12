<?php
require_once 'db.php';

// Check required fields
if (!isset($_POST['name']) || !isset($_POST['phone'])) {
    echo json_encode(['success' => false, 'error' => 'Name and phone are required']);
    exit;
}

$name = trim($_POST['name']);
$phone = trim($_POST['phone']);

if (empty($name) || empty($phone)) {
    echo json_encode(['success' => false, 'error' => 'Name and phone cannot be empty']);
    exit;
}

try {
    $stmt = $pdo->prepare("INSERT INTO student (name, phone) VALUES (?, ?)");
    $stmt->execute([$name, $phone]);
    
    $newId = $pdo->lastInsertId();
    
    echo json_encode([
        'success' => true,
        'data' => ['id' => $newId]
    ]);
} catch(PDOException $e) {
    echo json_encode(['success' => false, 'error' => 'Failed to create record']);
}
?>