<?php
header('Content-Type: application/json');

require_once 'db.php';

// Check if ID is provided and valid
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    echo json_encode([
        'success' => false,
        'error' => 'Valid ID required'
    ]);
    exit;
}

$id = $_GET['id'];

try {
    $stmt = $pdo->prepare("SELECT id, name, phone FROM items WHERE id = ?");
    $stmt->execute([$id]);
    $item = $stmt->fetch();
    
    if ($item) {
        // Record found - return as JSON
        echo json_encode([
            'success' => true,
            'data' => $item
        ], JSON_PRETTY_PRINT);
    } else {
        // Record not found - return error JSON (EXACTLY as required)
        echo json_encode([
            'success' => false,
            'error' => 'not found'
        ]);
    }
    
} catch(PDOException $e) {
    // Database error
    echo json_encode([
        'success' => false,
        'error' => 'Database error occurred'
    ]);
}
?>