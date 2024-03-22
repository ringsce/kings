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
