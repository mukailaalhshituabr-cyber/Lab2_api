<?php
// THIS MUST BE THE FIRST LINE
header('Content-Type: application/json');

// Include database connection
require_once 'db.php';

// Check if ID is provided
if (!isset($_POST['id']) || !is_numeric($_POST['id'])) {
    echo json_encode([
        'success' => false,
        'error' => 'Valid ID required'
    ]);
    exit;
}

$id = $_POST['id'];

try {
    // Delete the record
    $stmt = $pdo->prepare("DELETE FROM items WHERE id = ?");
    $stmt->execute([$id]);
    
    if ($stmt->rowCount() > 0) {
        // Delete successful
        echo json_encode([
            'success' => true
        ]);
    } else {
        // No record found with that ID
        echo json_encode([
            'success' => false,
            'error' => 'Record not found'
        ]);
    }
    
} catch(PDOException $e) {
    // Database error
    echo json_encode([
        'success' => false,
        'error' => 'Failed to delete record'
    ]);
}
?>