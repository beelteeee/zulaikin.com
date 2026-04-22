<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Лабораторная 7: Операторы и Функции PHP</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 900px; margin: 30px auto; padding: 0 20px; line-height: 1.6; }
        h2 { border-bottom: 2px solid #eee; padding-bottom: 8px; margin-top: 30px; }
        .task { background: #f8f9fa; padding: 15px; border-radius: 8px; margin-bottom: 20px; border-left: 4px solid #007bff; }
    </style>
</head>
<body>
    <h1>Лабораторная работа №7</h1>

    <?php
    echo '<div class="task"><h2>1. Проценты от двух чисел</h2>';
    $x1 = 100; 
    $y1 = 50;  

    $res1 = ($x1 * 0.4) + ($y1 * 0.84);
    echo "Числа: $x1 и $y1<br>Результат: $res1</div>";


    echo '<div class="task"><h2>2. Условие с числом</h2>';
    $num2 = 15;
    if ($num2 > 10) {
        $num2 += 100; 
    } else {
        $num2 -= 30;  
    }
    echo "Результат: $num2</div>";


    echo '<div class="task"><h2>3. Четное или нечетное</h2>';
    $num3 = 7;

    if ($num3 % 2 == 0) {
        $num3 /= 2;
    } else {
        $num3 *= 3;
    }
    echo "Результат: $num3</div>";


    echo '<div class="task"><h2>4. Четверть часа</h2>';
    $min = 35;
    if ($min >= 0 && $min < 15) {
        $q = "первая";
    } elseif ($min >= 15 && $min < 30) {
        $q = "вторая";
    } elseif ($min >= 30 && $min < 45) {
        $q = "третья";
    } else {
        $q = "четвертая";
    }
    echo "$min минут — это $q четверть часа.</div>";


    echo '<div class="task"><h2>5. Время года</h2>';
    $month = 11;
    if ($month >= 3 && $month <= 5) {
        $season = "весна 🌸";
    } elseif ($month >= 6 && $month <= 8) {
        $season = "лето ☀️";
    } elseif ($month >= 9 && $month <= 11) {
        $season = "осень 🍂";
    } else {
        $season = "зима ❄️";
    }
    echo "$month-й месяц — это $season</div>";

    echo '<div class="task"><h2>6. Проверка на 0 или 2</h2>';

    $tests = [5, 0, -3, 2];
    foreach ($tests as $a) {
        $res = $a;
        if ($a == 0 || $a == 2) {
            $res += 7;
        } else {
            $res /= 10;
        }
        echo "Для \$a = $a → результат: $res<br>";
    }
    echo '</div>';

    echo '<div class="task"><h2>7. Перевод секунд</h2>';
    $total_sec = 100000; 
    $days = intdiv($total_sec, 86400);
    $hours = intdiv($total_sec % 86400, 3600);
    $minutes = intdiv(($total_sec % 86400) % 3600, 60);
    $seconds = $total_sec % 60;
    echo "$total_sec сек = $days дн. $hours ч. $minutes мин. $seconds сек.</div>";

    echo '<div class="task"><h2>8. Сложное условие</h2>';
    $num8 = 25;
    if ($num8 >= 50) {
        echo $num8 * $num8;
    } elseif ($num8 > 10 && $num8 < 30) {
        echo 0;
    } else {
        echo "Ошибка";
    }
    echo "</div>";

    echo '<div class="task"><h2>9. Функция квадрата</h2>';
    function getSquare($n) {
        return $n * $n;
    }
    echo "Квадрат 5: " . getSquare(5) . "</div>";


    echo '<div class="task"><h2>10. Функция суммы</h2>';
    function getSum($a, $b) {
        return $a + $b;
    }
    echo "3 + 7 = " . getSum(3, 7) . "</div>";


    echo '<div class="task"><h2>11. Функция вычитания и деления</h2>';
    function calcDiffDiv($x, $y, $z) {
        if ($z == 0) return "Деление на ноль невозможно!";
        return ($x - $y) / $z;
    }
    echo "(10 - 4) / 2 = " . calcDiffDiv(10, 4, 2) . "</div>";


    echo '<div class="task"><h2>12. День недели</h2>';
    function getDayName($d) {

        $days = [1 => "Понедельник", "Вторник", "Среда", "Четверг", "Пятница", "Суббота", "Воскресенье"];
        return isset($days[$d]) ? $days[$d] : "Введите число от 1 до 7";
    }
    echo "День 3: " . getDayName(3) . "</div>";
    ?>
</body>
</html>
