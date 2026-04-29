<?php require_once 'includes/db.php'; ?>

<?php include 'includes/header.php'; ?>

<main class="main">
    <div class="container">
        <h1 class="page-title">Статьи</h1>
        
        <div class="content-card">
            <?php
            $page = max(1, (int)($_GET['page'] ?? 1));
            $perPage = 5;
            $offset = ($page - 1) * $perPage;
            
            $pdo = getDbConnection();
            if ($pdo) {
                try {
                    // Общее количество статей
                    $total = $pdo->query("SELECT COUNT(*) FROM articles")->fetchColumn();
                    $totalPages = ceil($total / $perPage);
                    
                    // Получаем статьи с пагинацией
                    $stmt = $pdo->prepare("SELECT id, title, content, author, created_at FROM articles ORDER BY created_at DESC LIMIT :limit OFFSET :offset");
                    $stmt->bindValue(':limit', $perPage, PDO::PARAM_INT);
                    $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
                    $stmt->execute();
                    $articles = $stmt->fetchAll();
                    
                    if ($articles):
                        foreach ($articles as $article):
            ?>
                <article class="article-card">
                    <h3><?= htmlspecialchars($article['title']) ?></h3>
                    <p class="article-meta">
                        <span>✍️ <?= htmlspecialchars($article['author']) ?></span>
                        <span>📅 <?= date('d.m.Y H:i', strtotime($article['created_at'])) ?></span>
                    </p>
                    <p class="article-excerpt">
                        <?= nl2br(htmlspecialchars(mb_strimwidth($article['content'], 0, 200, '...'))) ?>
                    </p>
                    <a href="#" class="link">Читать далее →</a>
                </article>
                <hr style="margin: 2rem 0; border: none; border-top: 1px solid #e2e8f0;">
            <?php 
                        endforeach;
                        
                        // Пагинация
                        if ($totalPages > 1):
            ?>
                <div class="pagination" style="text-align: center; margin-top: 2rem;">
                    <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                        <a href="?page=<?= $i ?>" class="btn <?= $i == $page ? 'btn-primary' : '' ?>" style="margin: 0 5px; padding: 5px 12px; display: inline-block; text-decoration: none;">
                            <?= $i ?>
                        </a>
                    <?php endfor; ?>
                </div>
            <?php endif;
                    
                    else:
            ?>
                <p style="text-align: center; color: #718096;">
                    Пока нет статей. <a href="/pages/add_article.php" class="link">Написать первую</a>
                </p>
            <?php 
                    endif;
                } catch (PDOException $e) {
                    echo "<p class='error'>❌ Ошибка: " . htmlspecialchars($e->getMessage()) . "</p>";
                }
            } else {
                echo "<p class='error'>❌ Не удалось подключиться к БД</p>";
            }
            ?>
            
            <p style="margin-top: 20px; text-align: center;">
                <a href="/pages/add_article.php" class="btn btn-primary" style="display: inline-block;">➕ Добавить статью</a>
            </p>
        </div>
    </div>
</main>

<?php include 'includes/footer.php'; ?>
