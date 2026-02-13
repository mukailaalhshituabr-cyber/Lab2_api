<?php
// Test different connection possibilities
header('Content-Type: application/json');

$host = 'localhost';
$attempts = [
    ['user' => 'mukaila.shittu', 'pass' => 'Adf=Tdd3&Wt', 'db' => 'mobileapps_2026_mukaila_shittu'],
    ['user' => 'root', 'pass' => '', 'db' => 'mobileapps_2026_mukaila_shittu'],
    ['user' => 'root', 'pass' => 'root', 'db' => 'mobileapps_2026_mukaila_shittu'],
    ['user' => 'mukaila.shittu', 'pass' => '', 'db' => 'mobileapps_2026_mukaila_shittu'],
    ['user' => 'mukaila.shittu', 'pass' => 'mukaila.shittu', 'db' => 'mobileapps_2026_mukaila_shittu'],
];

$results = [];

foreach ($attempts as $attempt) {
    try {
        $pdo = new PDO(
            "mysql:host=$host;charset=utf8mb4", 
            $attempt['user'], 
            $attempt['pass']
        );
        $results[] = [
            'user' => $attempt['user'],
            'success' => true,
            'message' => 'Connected! Now check if database exists'
        ];
        
        // Check if database exists
        $stmt = $pdo->query("SHOW DATABASES LIKE '{$attempt['db']}'");
        if ($stmt->rowCount() > 0) {
            $results[] = [
                'user' => $attempt['user'],
                'database' => $attempt['db'],
                'exists' => true
            ];
        }
        
    } catch(PDOException $e) {
        $results[] = [
            'user' => $attempt['user'],
            'success' => false,
            'error' => $e->getMessage()
        ];
    }
}

echo json_encode($results, JSON_PRETTY_PRINT);
?>