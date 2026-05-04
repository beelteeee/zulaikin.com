<?php

header('Content-Type: application/json; charset=utf-8');

$date = $_GET['date'] ?? '';
if (!$date || !preg_match('/^\d{4}-\d{2}-\d{2}$/', $date)) {
    http_response_code(400);
    echo json_encode(['error' => 'Неверный формат даты. Используйте ГГГГ-ММ-ДД']);
    exit;
}

$timestamp = strtotime($date);
if ($timestamp === false) {
    http_response_code(400);
    echo json_encode(['error' => 'Некорректная дата']);
    exit;
}

$days = ['Воскресенье', 'Понедельник', 'Вторник', 'Среда', 'Четверг', 'Пятница', 'Суббота'];
$dayOfWeek = $days[date('w', $timestamp)];

echo json_encode([
    'date' => $date,
    'weekday' => $dayOfWeek,
    'weekday_num' => (int)date('w', $timestamp)
], JSON_UNESCAPED_UNICODE);
