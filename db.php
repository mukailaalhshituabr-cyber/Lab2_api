<?php
header('Content-Type: application/json');

$host = 'localhost';
$dbname = 'mobileapps_2026_mukaila_shittu';     
$username = 'mukaila.shittu';  
$password = 'Adf=Tdd3&Wt';  

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch(PDOException $e) {
    echo json_encode(['success' => false, 'error' => 'Database connection failed']);
    exit;
}
?>