<footer>
    <div class="footer-content">
        <!-- Logo -->
        <div class="footer-logo">
            <img src="resources/img/ringsce.png" alt="Logo">
        </div>
        <!-- Copyright notice -->
        <div class="footer-copyright">
            &copy; <?php echo date("Y"); ?>  Kreatyve Designs. All rights reserved.
        </div>
        <!-- Three columns -->
        <div class="footer-columns">
            <div class="footer-column">
                <h3>About Us</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
            </div>
            <div class="footer-column">
                <h3>Services</h3>
                <ul>
                    <li>Service 1</li>
                    <li>Service 2</li>
                    <li>Service 3</li>
                </ul>
            </div>
            <div class="footer-column">
                <h3>Contact Us</h3>
                <p>Email: info@example.com</p>
                <p>Phone: 123-456-7890</p>
            </div>
        </div>
    </div>
</footer>

<script>
    // Toggle menu function
    document.getElementById('menuToggle').addEventListener('click', function() {
        var menuContainer = document.getElementById('menuContainer');
        if (menuContainer.style.left === '-200px') {
            menuContainer.style.left = '0';
        } else {
            menuContainer.style.left = '-200px';
        }
    });
</script>

<!-- Font Awesome CDN -->
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</body>
</html>
