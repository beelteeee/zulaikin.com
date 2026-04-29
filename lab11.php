<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Лабораторная 11: Работа с файлами и папками</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 900px; margin: 30px auto; padding: 0 20px; line-height: 1.6; }
        h2 { border-bottom: 2px solid #eee; padding-bottom: 8px; margin-top: 30px; }
        .task { background: #f8f9fa; padding: 15px; border-radius: 8px; margin-bottom: 15px; border-left: 4px solid #0d6efd; }
        code { background: #e9ecef; padding: 2px 5px; border-radius: 4px; color: #d63384; }
    </style>
</head>
<body>
    <h1>Лабораторная работа №11</h1>
    <?php

    $workDir = __DIR__ . '/lab11_workspace';
    if (!is_dir($workDir)) mkdir($workDir, 0775);
    chdir($workDir); // Переходим внутрь неё


    echo '<h2>📂 Часть 1: Файлы</h2>';

    echo '<div class="task"><h3>1. Создать test.txt и записать "Привет, мир!"</h3>';
    $f = fopen('test.txt', 'w');
    fwrite($f, 'Привет, мир!');
    fclose($f);
    echo "✅ Файл создан и записан.</div>";

    echo '<div class="task"><h3>2. Считать данные из test.txt</h3>';
    $f = fopen('test.txt', 'r');
    $text = fgets($f);
    fclose($f);
    echo "Содержимое: <b>$text</b></div>";

    echo '<div class="task"><h3>3. Переименовать test.txt в mir.txt</h3>';
    rename('test.txt', 'mir.txt');
    echo "✅ Переименовано.</div>";

    echo '<div class="task"><h3>4. Создать папку folder и переместить mir.txt туда</h3>';
    mkdir('folder', 0775);
    rename('mir.txt', 'folder/mir.txt');
    echo "✅ Папка создана, файл перемещён.</div>";

    echo '<div class="task"><h3>5. Создать копию world.txt</h3>';
    copy('folder/mir.txt', 'folder/world.txt');
    echo "✅ Копия создана.</div>";

    echo '<div class="task"><h3>6. Размер world.txt</h3>';
    $bytes = filesize('folder/world.txt');
    $mb = $bytes / 1048576;
    $gb = $bytes / 1073741824;
    echo "Размер: <b>$bytes байт</b> | " . number_format($mb, 6) . " МБ | " . number_format($gb, 9) . " ГБ</div>";

    echo '<div class="task"><h3>7. Удалить world.txt</h3>';
    unlink('folder/world.txt');
    echo "✅ Файл удалён.</div>";

    echo '<div class="task"><h3>8. Проверить существование файлов</h3>';
    echo "world.txt: " . (file_exists('folder/world.txt') ? "✅ Есть" : "❌ Удалён") . "<br>";
    echo "mir.txt: " . (file_exists('folder/mir.txt') ? "✅ Есть" : "❌ Нет") . "</div>";


    echo '<h2>📁 Часть 2: Папки</h2>';

    echo '<div class="task"><h3>1. Создать папку test</h3>';
    mkdir('test', 0775);
    echo "✅ Создана.</div>";

    echo '<div class="task"><h3>2. Переименовать test в www</h3>';
    rename('test', 'www');
    echo "✅ Переименована.</div>";

    echo '<div class="task"><h3>3. Удалить папку www</h3>';
    rmdir('www');
    echo "✅ Удалена.</div>";

    echo '<div class="task"><h3>4. Создать папки из массива внутри test</h3>';
    mkdir('test', 0775);
    $subdirs = ['docs', 'images', 'logs'];
    foreach ($subdirs as $dir) {
        mkdir("test/$dir", 0775);
    }
    echo "✅ Созданы: <code>" . implode(', ', $subdirs) . "</code></div>";

    echo '<div class="task"><h3>5. Вывести все .jpg из текущей папки</h3>';

    touch('photo1.jpg'); touch('avatar2.jpg'); touch('readme.txt');
    $jpgs = glob('*.jpg');
    echo empty($jpgs) ? "Файлов .jpg не найдено." : "Найдено: <code>" . implode(', ', $jpgs) . "</code>";
    echo "</div>";
    ?>
</body>
</html>
