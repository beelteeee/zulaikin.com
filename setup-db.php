<?php
// setup-db.php - Точка входа для настройки БД

// Защита: в продакшене ограничить доступ!
if (php_sapi_name() !== 'cli' && $_SERVER['REMOTE_ADDR'] !== '127.0.0.1') {
    http_response_code(403);
    die('Доступ запрещён');
}

require_once __DIR__ . '/includes/migrate.php';

echo "🚀 Запуск настройки базы данных...\n";
runMigrations();
