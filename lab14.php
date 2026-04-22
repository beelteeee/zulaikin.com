<?php
// lab14.php — роутер для Лабораторной 14
require_once 'page.php';
require_once 'blog.php';


$current = $_GET['page'] ?? 'page';

if ($current === 'blog') {
    $view = new BlogPage();
} else {
    $view = new Page();
}

$view->render();
