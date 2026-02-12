<?php
require_once 'db.php';

try {
    $stmt = $pdo->query("SELECT id, name, phone FROM items ORDER BY id DESC");
    $items = $stmt->fetchAll();
    
    echo json_encode([
        'success' => true,
        'data' => $items
    ]);
} catch(PDOException $e) {
    echo json_encode(['success' => false, 'error' => 'Failed to fetch records']);
}
?>