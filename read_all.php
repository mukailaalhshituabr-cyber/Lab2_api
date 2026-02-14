<?php
// THIS MUST BE THE FIRST LINE
header('Content-Type: application/json');

// Include database connection
require_once 'db.php';

try {
    // Query to get all records
    $stmt = $pdo->query("SELECT id, name, phone FROM student ORDER BY id DESC");
    $student = $stmt->fetchAll();
    
    // ALWAYS return JSON
    echo json_encode([
        'success' => true,
        'data' => $student
    ], JSON_PRETTY_PRINT);
    
} catch(PDOException $e) {
    // Error response as JSON
    echo json_encode([
        'success' => false,
        'error' => 'Failed to fetch records'
    ]);
}
?>