<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Обработка формы</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="form-box">
        <?php
        if (isset($_POST['email']) && isset($_POST['password'])) {
            $email = htmlspecialchars($_POST['email']);
            $password = $_POST['password'];
            $name = htmlspecialchars($_POST['name'] ?? 'Гость');

            if (strlen($password) < 6) {
                echo '<div class="error">❌ Пароль слишком короткий (минимум 6 символов).</div>';
            } else {
                echo '<div class="success">✅ Регистрация прошла успешно!</div>';
                echo "<p>Имя: <b>$name</b></p>";
                echo "<p>Email: <b>$email</b></p>";
                echo "<p>Пол: <b>" . htmlspecialchars($_POST['gender'] ?? '-') . "</b></p>";
            }
        } else {
            echo '<div class="error">⚠️ Данные не переданы. Заполните форму.</div>';
        }
        ?>
        <br>
        <a href="index.php">← Вернуться к форме</a>
    </div>
</body>
</html>
