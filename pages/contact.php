<?php include '../includes/header.php'; ?>

<main>
    <h1>Контакты</h1>
    <form method="post" style="max-width: 400px;">
        <p>
            <label>Имя:</label><br>
            <input type="text" name="name" placeholder="Ваше имя" style="width: 100%; padding: 8px; margin-top: 5px;">
        </p>
        <p>
            <label>Email:</label><br>
            <input type="email" name="email" placeholder="example@mail.com" style="width: 100%; padding: 8px; margin-top: 5px;">
        </p>
        <p>
            <label>Сообщение:</label><br>
            <textarea name="message" rows="4" style="width: 100%; padding: 8px; margin-top: 5px;"></textarea>
        </p>
        <button type="submit" style="padding: 10px 20px; background: #2c3e50; color: #fff; border: none; cursor: pointer;">Отправить</button>
    </form>
</main>

<?php include '../includes/footer.php'; ?>
