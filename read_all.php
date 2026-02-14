<?php
header('Content-Type: application/json');

require_once 'db.php';

try {
    $stmt = $pdo->query("SELECT id, name, phone FROM items ORDER BY id DESC");
    $items = $stmt->fetchAll();
    
    echo json_encode([
        'success' => true,
        'data' => $items
    ], JSON_PRETTY_PRINT);
    
} catch(PDOException $e) {
    echo json_encode([
        'success' => false,
        'error' => 'Failed to fetch records'
    ]);
}
?>