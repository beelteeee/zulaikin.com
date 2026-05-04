<?php

header('Content-Type: application/json; charset=utf-8');

$date1 = $_GET['date1'] ?? '';
$date2 = $_GET['date2'] ?? '';

if (!preg_match('/^\d{4}-\d{2}-\d{2}$/', $date1) || !preg_match('/^\d{4}-\d{2}-\d{2}$/', $date2)) {
    http_response_code(400);
    echo json_encode(['error' => 'Неверный формат. Используйте ГГГГ-ММ-ДД']);
    exit;
}

$ts1 = strtotime($date1);
$ts2 = strtotime($date2);

if ($ts1 === false || $ts2 === false) {
    http_response_code(400);
    echo json_encode(['error' => 'Некорректная дата']);
    exit;
}

$diff = abs($ts2 - $ts1);
$days = (int)($diff / 86400);

echo json_encode([
    'date1' => $date1,
    'date2' => $date2,
    'days_between' => $days
], JSON_UNESCAPED_UNICODE);
