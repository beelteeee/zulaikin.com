<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Лабораторная 9: Массивы в PHP</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 900px; margin: 30px auto; padding: 0 20px; line-height: 1.6; }
        h2 { border-bottom: 2px solid #eee; padding-bottom: 8px; margin-top: 30px; color: #333; }
        .task { background: #f8f9fa; padding: 15px; border-radius: 8px; margin-bottom: 20px; border-left: 4px solid #6f42c1; }
        code { background: #e9ecef; padding: 2px 5px; border-radius: 4px; color: #d63384; }
    </style>
</head>
<body>
    <h1>Лабораторная работа №9</h1>

    <?php
    echo '<div class="task"><h2>1. array_map: переводим в верхний регистр</h2>';
    $arr1 = ['a', 'b', 'c', 'd', 'e'];
    $upper = array_map('strtoupper', $arr1);
    echo "Исходный: [" . implode(', ', $arr1) . "]<br>";
    echo "Результат: [" . implode(', ', $upper) . "]</div>";

    echo '<div class="task"><h2>2. count: выводим последний элемент</h2>';
    $arr2 = [10, 20, 30, 40, 50];
    $lastIndex = count($arr2) - 1; // -1 т.к. индексация начинается с 0
    echo "Массив: [" . implode(', ', $arr2) . "]<br>";
    echo "Последний элемент: " . $arr2[$lastIndex] . "</div>";


    echo '<div class="task"><h2>3. array_search: проверяем наличие числа 3</h2>';
    $arr3 = [5, 8, 3, 12, 9];
    $key = array_search(3, $arr3);
    echo $key !== false ? "Найдено! Индекс: $key" : "Число 3 не найдено.";
    echo "</div>";

    echo '<div class="task"><h2>4. array_merge: склеиваем два массива</h2>';
    $a4 = [1, 2, 3];
    $b4 = ['a', 'b', 'c'];
    $merged = array_merge($a4, $b4);
    echo "Результат: [" . implode(', ', $merged) . "]</div>";

    echo '<div class="task"><h2>5. array_slice: создаём массив [2, 3, 4]</h2>';
    $arr5 = [1, 2, 3, 4, 5];
    $result5 = array_slice($arr5, 1, 3); // начинаем с индекса 1, берём 3 элемента
    echo "Исходный: [" . implode(', ', $arr5) . "]<br>";
    echo "Срез: [" . implode(', ', $result5) . "]</div>";


    echo '<div class="task"><h2>6. Ключи и значения отдельно</h2>';
    $arr6 = ['a' => 1, 'b' => 2, 'c' => 3];
    $keys = array_keys($arr6);
    $values = array_values($arr6);
    echo "Ключи: [" . implode(', ', $keys) . "]<br>";
    echo "Значения: [" . implode(', ', $values) . "]</div>";


    echo '<div class="task"><h2>7. array_combine: создаём массив из ключей и значений</h2>';
    $k7 = ['a', 'b', 'c'];
    $v7 = [1, 2, 3];
    $combined = array_combine($k7, $v7);
    echo "Результат:<br>" . print_r($combined, true) . "</div>";

    echo '<div class="task"><h2>8. Позиция первого "-"</h2>';
    $arr8 = ['a', '-', 'b', '-', 'c', '-', 'd'];
    $pos = array_search('-', $arr8);
    echo "Индекс первого '-': $pos (считая с нуля)</div>";

    echo '<div class="task"><h2>9. Виды сортировок</h2>';
    $arr9 = ['3' => 'a', '1' => 'c', '2' => 'e', '4' => 'b'];
    echo "<b>Исходный:</b> " . json_encode($arr9) . "<br>";
    
    $as = $arr9; asort($as);  echo "<b>asort (по значениям ↑):</b> " . json_encode($as) . "<br>";
    $ks = $arr9; ksort($ks);  echo "<b>ksort (по ключам ↑):</b> " . json_encode($ks) . "<br>";
    $ars = $arr9; arsort($ars); echo "<b>arsort (по значениям ↓):</b> " . json_encode($ars);
    echo "</div>";


    echo '<div class="task"><h2>10. Сумма цифр строки (без цикла)</h2>';
    $str10 = '1234567890';
    $digits = str_split($str10); // разбиваем строку на массив ['1','2',...]
    $sum = array_sum($digits);   // суммируем (PHP сам превратит строки в числа)
    echo "Строка: '$str10'<br>Сумма: $sum</div>";

    echo '<div class="task"><h2>11. array_fill: 10 букв "x"</h2>';
    $filled = array_fill(0, 10, 'x');
    echo "Массив: [" . implode(', ', $filled) . "]</div>";


    echo '<div class="task"><h2>12. array_intersect: пересечение массивов</h2>';
    $c1 = [1, 2, 3, 4, 5];
    $c2 = [3, 4, 5, 6, 7];
    $common = array_intersect($c1, $c2);
    echo "Общие элементы: [" . implode(', ', $common) . "]</div>";
    ?>
</body>
</html>