<?php
$menuItems = [
    'Главная' => '/index.php',
    'О нас' => '/pages/about.php',
    'Контакты' => '/pages/contact.php',
    'Добавить' =>' /pages/add_article.php'
];
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zulaikin Site</title>
    <link rel="icon" type="image/svg+xml" href="/assets/images/favicon.svg">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>
    <header>
        <nav class="navbar">
            <div class="container nav-container">
                <a href="/" class="logo">ZULAIKIN<span>.</span></a>
                <button class="nav-toggle" id="navToggle" aria-label="Toggle menu">
                    <span class="hamburger"></span>
                </button>
                <ul class="nav-menu" id="navMenu">
                    <?php foreach ($menuItems as $title => $url): ?>
                        <li class="nav-item">
                            <a href="<?= $url ?>" class="nav-link <?= $_SERVER['REQUEST_URI'] == $url ? 'active' : '' ?>">
                                <?= $title ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </nav>
    </header>
