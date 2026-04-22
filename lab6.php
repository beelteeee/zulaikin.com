<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Лабораторная 6: Переменные в PHP</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 800px; margin: 30px auto; line-height: 1.6; }
        h2 { border-bottom: 2px solid #ddd; padding-bottom: 5px; margin-top: 25px; }
        .result { background: #f9f9f9; padding: 10px; border-left: 4px solid #4CAF50; margin: 10px 0; }
    </style>
</head>
<body>
    <h1>Лабораторная работа №6</h1>

    <?php
  
    $str = "Привет, мир!";     
    $num = 42;                
    $bool = true;               
    $empty = null;           

    echo '<div class="result"><strong>1. Переменные и типы:</strong><br>';
    echo 'Строка: ' . $str . ' | Тип: ' . gettype($str) . '<br>';
    echo 'Число: ' . $num . ' | Тип: ' . gettype($num) . '<br>';
    echo 'Логическое: ' . ($bool ? 'true' : 'false') . ' | Тип: ' . gettype($bool) . '<br>';
    echo 'Пустое: null | Тип: ' . gettype($empty) . '</div>';

     $surname = "Зулайкин"; 
    echo "<h2>2. Заголовок с фамилией:</h2>";
    echo "<h1>{$surname}</h1>";

    
    $condition =true; 
    echo "<h2>3. Условие:</h2>";
    if ($condition) {
        echo '<div class="result"><p>Это абзац с текстом, который появляется, когда условие истинно. </p></div>';
    } else {
        
        echo '<div class="result"><p>Условие ложно! Вот картинка:</p>';
        echo '<img src="/images/cat.gif" alt="Гифка" width="300"></div>';
    }

    
    $a = 5;
    $s = $a * $a;
    echo "<h2>4. Площадь квадрата (сторона {$a}):</h2>";
    echo "S = {$s}<br>";

 
    $a_rect = 4;
    $b_rect = 6;
    $p = 2 * ($a_rect + $b_rect);
    echo "<h2>5. Периметр прямоугольника (a={$a_rect}, b={$b_rect}):</h2>";
    echo "P = {$p}<br>";


    echo "<h2>6. Курсив:</h2>";
    echo "<i>Этот текст написан курсивом с помощью тега &lt;i&gt;.</i><br>";


    echo "<h2>7. Столбец чисел:</h2>";
    for ($i = 1; $i <= 9; $i++) {
        echo "{$i}<br>";
    }


    $text = "Программирование";
    $lastChar = $text[-1]; // В PHP можно писать [-1] для последнего символа
    echo "<h2>8. Последний символ строки \"{$text}\":</h2>";
    echo "\"{$lastChar}\"<br>";


    $num2 = 47;
    $num2 += 7;  
    $num2 -= 18; 
    $num2 *= 10; 
    $num2 /= 15; 
    echo "<h2>9. Упрощённый код:</h2>";
    echo "Результат: {$num2}<br>";

    
    $secondsInDay = 60 * 60 * 24;
    echo "<h2>10. Количество секунд в сутках:</h2>";
    echo "{$secondsInDay} секунд<br>";
    ?>
</body>
</html>