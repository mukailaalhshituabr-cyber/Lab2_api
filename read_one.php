<?php
require_once 'db.php';

try {
    $stmt = $pdo->query("SELECT id, name, phone FROM student ORDER BY id DESC");
    $student = $stmt->fetchAll();
    
    echo json_encode([
        'success' => true,
        'data' => $student
    ]);
} catch(PDOException $e) {
    echo json_encode(['success' => false, 'error' => 'Failed to fetch records']);
}
?>