    <footer class="footer">
        <div class="container">
            <p>&copy; <?= date('Y') ?> Сайт Зулайкина. Все права защищены.</p>
        </div>
    </footer>
    
    <script>
        const navToggle = document.getElementById('navToggle');
        const navMenu = document.getElementById('navMenu');
        
        if (navToggle) {
            navToggle.addEventListener('click', () => {
                navMenu.classList.toggle('active');
                navToggle.classList.toggle('active');
            });
        }
    </script>
</body>
</html>
