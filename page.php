<?php
// page.php — класс главной страницы
class Page
{
    private string $name = "page";
    private string $template;

    public function __construct()
    {
        // Определяем активный пункт меню
        $pageActive = ($this->name === "page") ? "active" : "";
        $blogActive = ($this->name === "blog") ? "active" : "";
        
        $this->template = '
        <!DOCTYPE html>
        <html lang="ru">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Photography Portfolio</title>
            <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;700&display=swap" rel="stylesheet">
            <link rel="stylesheet" href="lab14-portfolio.css">
        </head>
        <body class="page-transition">
            <nav>
                <a href="lab14.php?page=page" class="logo">LENS.</a>
                <div class="nav-links">
                    <a href="lab14.php?page=page" class="' . $pageActive . '">Главная</a>
                    <a href="lab14.php?page=blog" class="' . $blogActive . '">Портфолио</a>
                </div>
            </nav>
            <div class="parallax">
                <div class="parallax-content">
                    <h1>Capture the <span>Moment</span></h1>
                    <p>Профессиональная фотография, которая рассказывает вашу историю</p>
                </div>
            </div>
            <div class="container">
                <h2 class="page-title">О нас</h2>
                <p style="text-align: center; font-size: 18px; color: #999; max-width: 800px; margin: 0 auto; line-height: 1.8;">
                    Мы создаём визуальные истории, которые остаются с вами навсегда. 
                    Каждый кадр — это искусство, каждая фотография — эмоция. 
                    Специализируемся на портретной, свадебной и репортажной съёмке.
                </p>
            </div>
            <footer>
                <p>&copy; 2026 LENS Photography. Все права защищены.</p>
            </footer>
        </body>
        </html>';
    }

    public function render(): void
    {
        echo $this->template;
    }
}