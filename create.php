<?php
// THIS MUST BE THE FIRST LINE
header('Content-Type: application/json');

// Include database connection
require_once 'db.php';

// Check if all required fields are present
if (!isset($_POST['name']) || !isset($_POST['phone'])) {
    echo json_encode([
        'success' => false,
        'error' => 'Name and phone are required'
    ]);
    exit;
}

$name = trim($_POST['name']);
$phone = trim($_POST['phone']);

// Validate fields are not empty
if (empty($name) || empty($phone)) {
    echo json_encode([
        'success' => false,
        'error' => 'Name and phone cannot be empty'
    ]);
    exit;
}

try {
    // Insert new record
    $stmt = $pdo->prepare("INSERT INTO items (name, phone) VALUES (?, ?)");
    $stmt->execute([$name, $phone]);
    
    // Get the new record ID
    $newId = $pdo->lastInsertId();
    
    // Return success with new ID (EXACTLY as required)
    echo json_encode([
        'success' => true,
        'data' => [
            'id' => (int)$newId
        ]
    ], JSON_PRETTY_PRINT);
    
} catch(PDOException $e) {
    // Error response
    echo json_encode([
        'success' => false,
        'error' => 'Failed to create record'
    ]);
}
?>