<?php include '../includes/header.php'; ?>

<main class="main">
    <div class="container">
        <section class="page-section">
            <h1 class="page-title">Контакты</h1>
            
            <div class="content-card">
                <form method="post" class="contact-form" id="contactForm">
                    <div class="form-group">
                        <label for="name" class="form-label">Имя</label>
                        <input type="text" id="name" name="name" class="form-input" placeholder="Введите ваше имя" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" id="email" name="email" class="form-input" placeholder="example@mail.com" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="message" class="form-label">Сообщение</label>
                        <textarea id="message" name="message" class="form-textarea" rows="5" placeholder="Введите ваше сообщение" required></textarea>
                    </div>
                    
                    <button type="submit" class="btn btn-primary">
                        <span>Отправить</span>
                        <svg class="btn-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M22 2L11 13M22 2l-7 20-4-9-9-4 20-7z"/>
                        </svg>
                    </button>
                </form>
            </div>
        </section>
    </div>
</main>

<?php include '../includes/footer.php'; ?>
