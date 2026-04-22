<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Лабораторная 8: Анонимные функции и Строки</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 900px; margin: 30px auto; padding: 0 20px; line-height: 1.6; }
        h2 { border-bottom: 2px solid #eee; padding-bottom: 8px; margin-top: 30px; color: #333; }
        .task { background: #f8f9fa; padding: 15px; border-radius: 8px; margin-bottom: 20px; border-left: 4px solid #28a745; }
        code { background: #e9ecef; padding: 2px 5px; border-radius: 4px; color: #d63384; }
    </style>
</head>
<body>
    <h1>Лабораторная работа №8</h1>

    <?php
    echo '<div class="task"><h2>1. Функция умножения</h2>';
    $mul = function($a, $b) {
        return $a * $b;
    };
    echo "5 * 6 = " . $mul(5, 6);
    echo '</div>';


    echo '<div class="task"><h2>2. Варианты функции m()</h2>';
    

    $m1 = function($a, $b) use ($mul) {
        return $mul($a, $b);
    };
    echo "<p><strong>Вариант А (параметры):</strong> 3 * 4 = " . $m1(3, 4) . "</p>";


    $x = 7;
    $y = 8;
    $m2 = function() use ($x, $y, $mul) {
        return $mul($x, $y);
    };
    echo "<p><strong>Вариант Б (use):</strong> 7 * 8 = " . $m2() . "</p>";
    echo '</div>';

    echo '<div class="task"><h2>3. Функция operation</h2>';
    $operation = function($m, $n, $o) {

        return $o($m, $n);
    };
    

    echo "Operation (10, 5, умножение): " . $operation(10, 5, $mul);
    echo '</div>';


    echo '<div class="task"><h2>4. Своя функция array_map</h2>';
    function myArrayMap($fn, $arr) {
        $newArr = [];
        foreach ($arr as $item) {

            $newArr[] = $fn($item);
        }
        return $newArr;
    }

    $nums = [1, 4, 9, 16];

    $squared = myArrayMap(fn($n) => $n * $n, $nums);
    echo "Исходный: [" . implode(", ", $nums) . "]<br>";
    echo "Квадраты: [" . implode(", ", $squared) . "]";
    echo '</div>';


    echo '<div class="task"><h2>5. Проверка пароля</h2>';
    $password = "secret123"; 
    $len = strlen($password); 
    
    if ($len > 5 && $len < 10) {
        echo "Пароль '$password' подходит (длина: $len).";
    } else {
        echo "Пароль '$password' не подходит. Придумайте другой (длина: $len).";
    }
    echo '</div>';


    echo '<div class="task"><h2>6. Проверка начала строки</h2>';
    $url = "https://zulaikin.com";

    if (strpos($url, 'http://') === 0 || strpos($url, 'https://') === 0) {
        echo "Строка '$url' начинается с http/https: <strong>да</strong>";
    } else {
        echo "Строка '$url' начинается с http/https: <strong>нет</strong>";
    }
    echo '</div>';


    echo '<div class="task"><h2>7. Проверка окончания строки</h2>';
    $file = "photo.png";

    $ext_png = substr($file, -4) === '.png';
    $ext_jpg = substr($file, -4) === '.jpg';
    
    if ($ext_png || $ext_jpg) {
        echo "Файл '$file' является картинкой: <strong>да</strong>";
    } else {
        echo "Файл '$file' является картинкой: <strong>нет</strong>";
    }
    echo '</div>';


    echo '<div class="task"><h2>8. Замена символов</h2>';
    $date = "16.04.2021";
    $newDate = str_replace('.', '-', $date);
    echo "Было: $date → Стало: $newDate";
    echo '</div>';


    echo '<div class="task"><h2>9. explode: Строка в массив</h2>';
    $str = "html css php";
    $arr = explode(" ", $str); // Разбиваем по пробелу
    echo "Массив: [" . implode(", ", $arr) . "]";
    echo '</div>';

    echo '<div class="task"><h2>10. implode: Массив в строку</h2>';
    $tags = ['html', 'css', 'php'];
    $csv = implode(",", $tags); 
    echo "Строка: $csv";
    echo '</div>';
    ?>
</body>
</html>