<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Калькулятор</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .calc { max-width: 300px; margin: 20px auto; background: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.1); }
        .calc input[type="number"] { width: 90%; margin-bottom: 10px; }
        .btns { display: grid; grid-template-columns: repeat(4, 1fr); gap: 8px; margin-bottom: 10px; }
        .btns button { padding: 15px; font-size: 18px; background: #2196F3; }
        .btns button:hover { background: #1976D2; }
        .result { font-size: 24px; text-align: center; margin-top: 10px; padding: 10px; background: #e3f2fd; border-radius: 4px; }
    </style>
</head>
<body>
    <div class="calc">
        <h3>🧮 Калькулятор</h3>
        <form method="post">
            <input type="number" step="any" name="num1" placeholder="Число 1" required>
            <input type="number" step="any" name="num2" placeholder="Число 2" required>
            <div class="btns">
                <button type="submit" name="op" value="add">+</button>
                <button type="submit" name="op" value="sub">-</button>
                <button type="submit" name="op" value="mul">×</button>
                <button type="submit" name="op" value="div">÷</button>
            </div>
        </form>

        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['op'])) {
            $a = (float) $_POST['num1'];
            $b = (float) $_POST['num2'];
            $op = $_POST['op'];
            $res = '';

            if ($op === 'div' && $b == 0) {
                $res = '<span style="color:#d9534f">⛔ Деление на ноль невозможно!</span>';
            } else {
                switch ($op) {
                    case 'add': $res = $a + $b; break;
                    case 'sub': $res = $a - $b; break;
                    case 'mul': $res = $a * $b; break;
                    case 'div': $res = $a / $b; break;
                }
                $op_sym = ['add'=>'+', 'sub'=>'-', 'mul'=>'×', 'div'=>'÷'][$op];
                echo "<div class='result'>$a $op_sym $b = <b>$res</b></div>";
            }
        }
        ?>
        <br>
        <a href="index.php">← К регистрации</a>
    </div>
</body>
</html>
