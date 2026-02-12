<?php
require_once 'db.php';

if (!isset($_POST['id']) || !is_numeric($_POST['id'])) {
    echo json_encode(['success' => false, 'error' => 'Valid ID required']);
    exit;
}

$id = $_POST['id'];

try {
    $stmt = $pdo->prepare("DELETE FROM student WHERE id = ?");
    $stmt->execute([$id]);
    
    if ($stmt->rowCount() > 0) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'error' => 'Record not found']);
    }
} catch(PDOException $e) {
    echo json_encode(['success' => false, 'error' => 'Failed to delete record']);
}
?>