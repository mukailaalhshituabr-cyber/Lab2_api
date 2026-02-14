<?php
header('Content-Type: application/json');

$host = 'localhost';
$dbname = 'mobileapps_2026_mukaila_shittu';     
$username = 'mukaila.shittu';  
$password = 'Adf=Tdd3&Wt';  


$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    echo json_encode([
        "success" => false,
        "error" => "Database connection failed"
    ]);
    exit;
}
?>
