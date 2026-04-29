<?php
// includes/migrate.php - Применение миграций

require_once __DIR__ . '/db.php';

function runMigrations(): void {
    $pdo = getDbConnection();
    if (!$pdo) {
        echo "❌ Не удалось подключиться к БД\n";
        return;
    }
    
    $migrationsDir = __DIR__ . '/../migrations';
    $files = glob($migrationsDir . '/*.sql');
    sort($files);
    
    foreach ($files as $file) {
        $filename = basename($file);
        echo "🔄 Применяем миграцию: $filename\n";
        
        $sql = file_get_contents($file);
        try {
            $pdo->exec($sql);
            echo "✅ Успешно: $filename\n";
        } catch (PDOException $e) {
            echo "❌ Ошибка в $filename: " . $e->getMessage() . "\n";
        }
    }
    echo "🎉 Все миграции применены!\n";
}

// Запуск, если файл открыт напрямую
if (php_sapi_name() === 'cli' && realpath($argv[0]) === realpath(__FILE__)) {
    runMigrations();
}
