<?php
require_once '../includes/db.php';

$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = trim($_POST['title'] ?? '');
    $content = trim($_POST['content'] ?? '');
    $author = trim($_POST['author'] ?? 'Anonymous');
    
    if (!empty($title) && !empty($content)) {
        $pdo = getDbConnection();
        if ($pdo) {
            try {
                $stmt = $pdo->prepare("INSERT INTO articles (title, content, author) VALUES (:title, :content, :author)");
                $stmt->execute([
                    ':title' => $title,
                    ':content' => $content,
                    ':author' => $author
                ]);
                $message = "<div class='success'>✅ Статья добавлена!</div>";
            } catch (PDOException $e) {
                $message = "<div class='error'>❌ Ошибка: " . htmlspecialchars($e->getMessage()) . "</div>";
            }
        }
    } else {
        $message = "<div class='error'>⚠️ Заполните заголовок и содержание</div>";
    }
}
?>

<?php include '../includes/header.php'; ?>

<main class="main">
    <div class="container">
        <h1 class="page-title">Добавить статью</h1>
        
        <div class="content-card">
            <?= $message ?>
            
            <form method="post" class="contact-form">
                <div class="form-group">
                    <label class="form-label">Заголовок *</label>
                    <input type="text" name="title" class="form-input" required placeholder="Введите заголовок">
                </div>
                
                <div class="form-group">
                    <label class="form-label">Автор</label>
                    <input type="text" name="author" class="form-input" placeholder="Ваше имя">
                </div>
                
                <div class="form-group">
                    <label class="form-label">Содержание *</label>
                    <textarea name="content" class="form-textarea" rows="8" required placeholder="Текст статьи"></textarea>
                </div>
                
                <button type="submit" class="btn btn-primary">Опубликовать</button>
            </form>
            
            <p style="margin-top: 20px; text-align: center;">
                <a href="/articles.php" class="link">👉 Все статьи</a>
            </p>
        </div>
    </div>
</main>

<?php include '../includes/footer.php'; ?>
