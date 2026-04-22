<?php
// blog.php
require_once 'page.php';

class BlogPage extends Page
{
    private string $name = "blog";
    private string $template;

    public function __construct()
    {
        $pageActive = ($this->name === "page") ? "active" : "";
        $blogActive = ($this->name === "blog") ? "active" : "";
        
        $this->template = '
        <!DOCTYPE html>
        <html lang="ru">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Portfolio - Photography</title>
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
            <div class="container" style="padding-top: 150px;">
                <h2 class="page-title">Портфолио</h2>
                <div class="portfolio-grid">
                    <div class="portfolio-card">
                        <img src="images/portrait.png" alt="Портретная съёмка">
                        <div class="portfolio-overlay">
                            <h3>Портретная съёмка</h3>
                            <p>Естественные эмоции и характер</p>
                        </div>
                    </div>
                    <div class="portfolio-card">
                        <img src="images/wedding.png" alt="Свадебная фотография">
                        <div class="portfolio-overlay">
                            <h3>Свадебная фотография</h3>
                            <p>Романтика и любовь в каждом кадре</p>
                        </div>
                    </div>
                    <div class="portfolio-card">
                        <img src="images/event.png" alt="Репортаж">
                        <div class="portfolio-overlay">
                            <h3>Репортаж</h3>
                            <p>Живые моменты событий</p>
                        </div>
                    </div>
                    <div class="portfolio-card">
                        <img src="images/fashion.png" alt="Fashion">
                        <div class="portfolio-overlay">
                            <h3>Fashion</h3>
                            <p>Стиль и эстетика</p>
                        </div>
                    </div>
                </div>
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