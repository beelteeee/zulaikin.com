<?php
// api/public/index.php
// Единая точка входа API

header('Content-Type: application/json; charset=utf-8');


header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Authorization');


if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') exit(0);


$method = $_SERVER['REQUEST_METHOD'];
$path   = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$action = basename($path); // Берем последнее слово из пути

switch ($action) {
    case 'hello':
        echo json_encode(['message' => 'Привет! Я API!', 'status' => 'success']);
        break;

    case 'echo':
        // Читаем тело запроса (если есть)
        $input = json_decode(file_get_contents('php://input'), true);
        echo json_encode([
            'method' => $method,
            'received_data' => $input,
            'headers' => getallheaders()
        ]);
        break;

    case 'date':
        echo json_encode([
            'timestamp' => time(),
            'date' => date('Y-m-d'),
            'time' => date('H:i:s')
        ]);
        break;

    default:
        http_response_code(404);
        echo json_encode(['error' => 'Эта команда не найдена']);
}
