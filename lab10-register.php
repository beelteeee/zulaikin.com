<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Регистрация</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="form-box">
        <h2>📝 Регистрация</h2>
        <form action="action.php" method="post">
            <label for="name">Имя:</label>
            <input type="text" id="name" name="name" required placeholder="Введите имя">

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required placeholder="example@mail.com">

            <label for="password">Пароль:</label>
            <input type="password" id="password" name="password" required placeholder="Минимум 6 символов">

            <label for="gender">Пол:</label>
            <select id="gender" name="gender">
                <option value="male">Мужской</option>
                <option value="female">Женский</option>
                <option value="other">Не указан</option>
            </select>

            <button type="submit">Зарегистрироваться</button>
        </form>
    </div>
</body>
</html>
