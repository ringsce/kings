<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KnL Publishing</title>
    <link rel="stylesheet" href="resources/css/styles.css">
    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
    <div class="menu-toggle" id="menuToggle">&#9776;</div>
    
    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <div class="logo">
            <img src="resources/img/ringsce.png" alt="Logo">
        </div>
        <ul>
            <li><a href="welcome.php">Home</a></li>
            <li><a href="blog">Reader</a></li>
            <li><a href="about.php">About Us</a></li>
            <li><a href="contact.php">Contact Us</a></li>
        </ul>
        <div class="social-icons">
            <!--<a href="#"><i class="fab fa-facebook-f"></i></a>-->
            <a href="https://twitter.com/ringsce"><i class="fab fa-twitter"></i></a>
            <!--<a href="#"><i class="fab fa-instagram"></i></a>-->
            <a href="https://www.linkedin.com/in/plvicente"><i class="fab fa-linkedin-in"></i></a>
        </div>
        <a href="https://liberapay.com/plvicente" class="liberapay-link">Support us on Liberapay</a>
    </div>
    
    <!-- Slideshows -->
    <div class="container">
        <h1>Slideshow Gallery</h1>
        <div class="slideshows">
            <!-- Slideshow 1 -->
            <div class="slideshow">
                <h2>Slideshow 1</h2>
                <!-- Slideshow content -->
            </div>

            <!-- Slideshow 2 -->
            <div class="slideshow">
                <h2>Slideshow 2</h2>
                <!-- Slideshow content -->
            </div>

            <!-- Slideshow 3 -->
            <div class="slideshow">
                <h2>Slideshow 3</h2>
                <!-- Slideshow content -->
            </div>

            <!-- Slideshow 4 -->
            <div class="slideshow">
                <h2>Slideshow 4</h2>
                <!-- Slideshow content -->
            </div>

            <!-- Slideshow 5 -->
            <div class="slideshow">
                <h2>Slideshow 5</h2>
                <!-- Slideshow content -->
            </div>
        </div>
    </div>
    
    <!-- Dark Mode/Light Mode Toggle -->
    <label class="switch">
        <input type="checkbox" id="toggle">
        <span class="slider round"></span>
    </label>

    <script>
        const menuToggle = document.getElementById('menuToggle');
        const sidebar = document.getElementById('sidebar');
        const toggleSwitch = document.getElementById('toggle');
        const container = document.querySelector('.container');

        menuToggle.addEventListener('click', function() {
            sidebar.classList.toggle('active');
        });

        toggleSwitch.addEventListener('change', function() {
            if (this.checked) {
                container.classList.add('dark-mode');
            } else {
                container.classList.remove('dark-mode');
            }
        });
    </script>
</body>
</html>
