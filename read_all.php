<?php
// THIS MUST BE THE FIRST LINE
header('Content-Type: application/json');

// Include database connection
require_once 'db.php';

try {
    // Query to get all records
    $stmt = $pdo->query("SELECT id, name, phone FROM items ORDER BY id DESC");
    $items = $stmt->fetchAll();
    
    // ALWAYS return JSON
    echo json_encode([
        'success' => true,
        'data' => $items
    ], JSON_PRETTY_PRINT);
    
} catch(PDOException $e) {
    // Error response as JSON
    echo json_encode([
        'success' => false,
        'error' => 'Failed to fetch records'
    ]);
}
?>