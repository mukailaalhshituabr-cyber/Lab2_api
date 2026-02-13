<?php
header('Content-Type: application/json');

$host = 'localhost';
$dbname = 'mobileapps_2026_mukaila_shittu';     
$username = 'mukaila.shittu';  
$password = 'Adf=Tdd3&Wt';  

try {
    // Add error reporting for debugging
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    
} catch(PDOException $e) {
    // This will show in browser - perfect for screenshot!
    echo json_encode([
        'success' => false, 
        'error' => 'Database connection failed',
        'debug' => $e->getMessage()  // This shows WHY it failed
    ]);
    exit;
}
?>