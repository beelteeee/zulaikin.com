<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Лабораторная 12: Исключения и Даты</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 900px; margin: 30px auto; padding: 0 20px; line-height: 1.6; }
        h2 { border-bottom: 2px solid #eee; padding-bottom: 8px; margin-top: 30px; }
        .task { background: #f8f9fa; padding: 15px; border-radius: 8px; margin-bottom: 15px; border-left: 4px solid #dc3545; }
        code { background: #e9ecef; padding: 2px 5px; border-radius: 4px; color: #d63384; }
        form { margin: 10px 0; padding: 10px; background: #e9ecef; border-radius: 5px; }
        input[type="date"] { padding: 5px; }
        button { padding: 6px 12px; cursor: pointer; background: #007bff; color: white; border: none; border-radius: 4px; }
    </style>
</head>
<body>
    <h1>Лабораторная работа №12</h1>

    <h2>🛡️ Часть 1: Обработка исключений</h2>
    <?php
    // 1. Ошибка открытия несуществующего файла
    echo '<div class="task"><h3>1. fopen: несуществующий файл</h3>';
    try {
        // @ подавляет предупреждение, чтобы мы сами выбросили Exception
        $file = @fopen('несуществующий_файл.txt', 'r');
        if ($file === false) {
            throw new Exception("Файл не найден или недоступен для чтения.");
        }
        fclose($file);
    } catch (Exception $e) {
        echo "❌ Ошибка: " . $e->getMessage() . "<br>📍 Строка: " . $e->getLine();
    }
    echo '</div>';

    // 2. Деление на ноль + сохранение в log.txt
    echo '<div class="task"><h3>2. Деление на ноль и запись в log.txt</h3>';
    try {
        $res = 100 / 0; 
    } catch (Throwable $e) { 
        $msg = $e->getMessage();
        file_put_contents('log.txt', date('Y-m-d H:i:s') . " - " . $msg . PHP_EOL, FILE_APPEND);
        echo "❌ Ошибка: $msg<br>✅ Сообщение сохранено в файл log.txt";
    }
    echo '</div>';

    // 3. Доступ к несуществующему элементу массива
    echo '<div class="task"><h3>3. Несуществующий ключ массива</h3>';
    $countries = ['Spain' => 'Madrid', 'Russia' => 'Moscow'];
    try {
        $key = 'Germany';
        if (!array_key_exists($key, $countries)) {
            throw new Exception("Ключ '$key' отсутствует в массиве \$countries.");
        }
        echo "Столица: " . $countries[$key];
    } catch (Exception $e) {
        echo "❌ " . $e->getMessage();
    }
    echo '</div>';

    // 4. Форма сравнения дат (Задание 7 части 2)
    echo '<h2>📅 Часть 2: Работа с датами</h2>';
    
    $d1_val = $d2_val = $bigger_date = '';
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['date1'], $_POST['date2'])) {
        $ts1 = strtotime($_POST['date1']);
        $ts2 = strtotime($_POST['date2']);
        if ($ts1 !== false && $ts2 !== false) {
            $d1_val = $_POST['date1'];
            $d2_val = $_POST['date2'];
            $bigger_date = ($ts1 > $ts2) ? $_POST['date1'] : $_POST['date2'];
        }
    }
    ?>

    <div class="task">
        <h3>7. Сравнение двух дат</h3>
        <form method="post">
            Дата 1: <input type="date" name="date1" value="<?= htmlspecialchars($d1_val) ?>" required>
            Дата 2: <input type="date" name="date2" value="<?= htmlspecialchars($d2_val) ?>" required>
            <button type="submit">Сравнить</button>
        </form>
        <?php if ($bigger_date): ?>
            <p>✅ Большая дата: <b><?= $bigger_date ?></b></p>
        <?php endif; ?>
    </div>

    <?php
    // Остальные задания части 2
    echo '<div class="task"><h3>1. Timestamp для 15.03.2025 10:25:00</h3>';
    echo "Результат: " . mktime(10, 25, 0, 3, 15, 2025) . "</div>";

    echo '<div class="task"><h3>2. Разница в секундах (02.10.1990 08:05:59 → сейчас)</h3>';
    $diff_sec = time() - mktime(8, 5, 59, 10, 2, 1990);
    echo "Результат: <b>$diff_sec</b> сек.</div>";

    echo '<div class="task"><h3>3. Текущая дата-время</h3>';
    echo "Результат: " . date('Y.m.d H:i:s') . "</div>";

    echo '<div class="task"><h3>4. 1 сентября текущего года</h3>';
    echo "Результат: " . date('Y.m.d', mktime(0, 0, 0, 9, 1)) . "</div>";

    echo '<div class="task"><h3>5. День недели 2 февраля 2000</h3>';
    $daysRu = ['Воскресенье', 'Понедельник', 'Вторник', 'Среда', 'Четверг', 'Пятница', 'Суббота'];
    $dayIdx = date('w', mktime(0, 0, 0, 2, 2, 2000));
    echo "Результат: " . $daysRu[$dayIdx] . "</div>";

    echo '<div class="task"><h3>6. Массив дней недели</h3>';
    $week = ['Воскресенье', 'Понедельник', 'Вторник', 'Среда', 'Четверг', 'Пятница', 'Суббота'];
    $today = $week[date('w')];
    $june12 = $week[date('w', mktime(0,0,0,6,12,2016))];
    echo "Сегодня: <b>$today</b><br>12.06.2016 было: <b>$june12</b><br>🎂 Твой ДР: замени числа в <code>date('w', mktime(0,0,0,М,Д,Г))</code></div>";

    echo '<div class="task"><h3>8. Преобразование формата даты</h3>';
    $inputDate = "2025-12-31";
    $formatted = date('d-m-Y', strtotime($inputDate));
    echo "Было: $inputDate → Стало: <b>$formatted</b></div>";

    echo '<div class="task"><h3>9. Манипуляции с датой</h3>';
    $dateObj = date_create_from_format('Y.m.d', '2000.02.03');
    date_modify($dateObj, '+2 days');
    echo "+2 дня: " . date_format($dateObj, 'd.m.Y') . "<br>";
    date_modify($dateObj, '+1 month +3 days');
    echo "+1 мес +3 дня: " . date_format($dateObj, 'd.m.Y') . "<br>";
    date_modify($dateObj, '+1 year');
    echo "+1 год: " . date_format($dateObj, 'd.m.Y') . "<br>";
    date_modify($dateObj, '-3 days');
    echo "-3 дня: " . date_format($dateObj, 'd.m.Y');
    echo "</div>";

    echo '<div class="task"><h3>10. Дней до Нового Года</h3>';
    $now = new DateTime();
    $ny = new DateTime(date('Y-01-01'));
    $ny->add(new DateInterval('P1Y')); 
    $diffObj = $now->diff($ny);
    echo "Осталось: <b>{$diffObj->days}</b> дней</div>";
    ?>
</body>
</html>
