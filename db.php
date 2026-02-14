<?php
header('Content-Type: application/json');

$host = 'localhost';
$dbname = 'mobileapps_2026_mukaila_shittu';     
$username = 'mukaila.shittu';  
$password = 'Adf=Tdd3&Wt';  

try {
    // Create PDO connection
    $pdo = new PDO(
        "mysql:host=$host;dbname=$dbname;charset=utf8mb4",
        $username,
        $password,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false
        ]
    );
} catch(PDOException $e) {
    // ALWAYS return JSON even for errors
    echo json_encode([
        'success' => false,
        'error' => 'Database connection failed'
    ]);
    exit;
}
?>