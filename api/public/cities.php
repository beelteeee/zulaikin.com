<?php

require_once 'config.php';
header('Content-Type: application/json; charset=utf-8');

$country = $_GET['country'] ?? '';
if (!$country) {
    http_response_code(400);
    echo json_encode(['error' => 'Параметр country обязателен']);
    exit;
}

$pdo = getDbConnection();
if (!$pdo) {
    http_response_code(500);
    echo json_encode(['error' => 'Ошибка подключения к БД']);
    exit;
}

try {
    $stmt = $pdo->prepare("
        SELECT c.name as city 
        FROM cities c 
        JOIN countries co ON c.country_id = co.id 
        WHERE co.name = :country 
        ORDER BY c.name
    ");
    $stmt->execute([':country' => $country]);
    $cities = $stmt->fetchAll(PDO::FETCH_COLUMN);
    
    echo json_encode([
        'country' => $country,
        'cities' => $cities,
        'count' => count($cities)
    ], JSON_UNESCAPED_UNICODE);
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Ошибка БД: ' . $e->getMessage()]);
}
