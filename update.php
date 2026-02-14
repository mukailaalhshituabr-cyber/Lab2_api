<?php
// THIS MUST BE THE FIRST LINE
header('Content-Type: application/json');

// Include database connection
require_once 'db.php';

// Check if all required fields are present
if (!isset($_POST['id']) || !isset($_POST['name']) || !isset($_POST['phone'])) {
    echo json_encode([
        'success' => false,
        'error' => 'ID, name and phone are required'
    ]);
    exit;
}

$id = $_POST['id'];
$name = trim($_POST['name']);
$phone = trim($_POST['phone']);

// Validate input
if (!is_numeric($id) || empty($name) || empty($phone)) {
    echo json_encode([
        'success' => false,
        'error' => 'Invalid input data'
    ]);
    exit;
}

try {
    // Update the record
    $stmt = $pdo->prepare("UPDATE items SET name = ?, phone = ? WHERE id = ?");
    $stmt->execute([$name, $phone, $id]);
    
    if ($stmt->rowCount() > 0) {
        // Update successful - return success JSON
        echo json_encode([
            'success' => true
        ]);
    } else {
        // No record found with that ID
        echo json_encode([
            'success' => false,
            'error' => 'Record not found or no changes made'
        ]);
    }
    
} catch(PDOException $e) {
    // Database error
    echo json_encode([
        'success' => false,
        'error' => 'Failed to update record'
    ]);
}
?>