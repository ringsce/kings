<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KnL Publishing</title>
    <link rel="stylesheet" href="resources/css/styles.css">
    <link rel="stylesheet" href="resources/css/baguetteBox.min.css">
    <link rel="stylesheet" href="resources/css/Merriweather.css">
    
    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        /* Additional Styles */
        .search-form {
            position: absolute;
            top: 20px;
            right: 100px; /* Adjust as needed */
            z-index: 999;
        }

        .login-icon {
            position: absolute;
            top: 20px;
            right: 20px; /* Adjust as needed */
            cursor: pointer;
            color: #fff;
            font-size: 24px;
            z-index: 999;
        }

        /* Dropdown Menu */
        .dropdown {
            position: absolute;
            top: 50px; /* Adjust as needed */
            right: 20px; /* Adjust as needed */
            background-color: #333;
            border-radius: 5px;
            padding: 10px;
            display: none;
            z-index: 999;
        }

        .dropdown a {
            color: #fff;
            text-decoration: none;
            display: block;
            padding: 5px 10px;
        }

        .dropdown a:hover {
            background-color: #555;
        }

        /* Footer Styles */
        footer {
            position: fixed;
            bottom: 0;
            width: 100%;
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 10px 0;
        }

        /* Dark Mode Toggle */
        .dark-mode-toggle {
            position: fixed;
            bottom: 20px;
            right: 90px; /* Adjust as needed */
            z-index: 999;
            color: #fff;
            font-size: 24px;
            cursor: pointer;
        }

        /* Dark Mode Styles */
        body.dark-mode {
            background-color: #333;
            color: #fff;
        }
    </style>
<script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
</head>

<body>
    <div class="menu-toggle" id="menuToggle">&#9776;</div>
    
    <!-- Trending -->
    <?php include_once 'trending.php'; ?>
    
    <!-- Sidebar -->
    <?php include_once 'sidebar.php'; ?>
    
    <!-- Slideshows -->
    <?php include_once 'slideshow.php'; ?>

    <!-- Posts -->
    <!--php include_once ('posts.php'); ?-->
    <php include_once ('posts.php'); ?>
    
    <!-- Dark Mode/Light Mode Toggle -->
    <label class="switch">
        <input type="checkbox" id="toggle">
        <span class="slider round"></span>
    </label>

    <!-- Search Form -->
    <!--<form class="search-form" action="#" method="GET">
        <input type="text" name="search" placeholder="Search">
        <button type="submit">Search</button>
    </form>-->
    <!-- Search Form -->
    <form class="search-form" action="search.php" method="GET">
        <input type="text" name="q" placeholder="Search">
        <select name="category">
            <option value="">All Categories</option>
            <option value="new_news">New News</option>
            <option value="ekron_realms">Ekron: Realms</option>
            <option value="ekron_samurai_babel">Ekron: Samurai Babel</option>
            <option value="ekron_wars">Ekron: Wars</option>
            <option value="ekron_humans">Ekron: Humans</option>
        </select>
        <button type="submit">Search</button>
    </form>


    <!-- Login Icon -->
    <div class="login-icon" onclick="toggleDropdown()">👤</div>

    <!-- Dropdown Menu -->
    <div class="dropdown" id="dropdownMenu">
        <a href="login.php">Login</a>
        <a href="register.php">Register</a>
        <a href="settings.php">Settings</a>
        <a href="theming.php">Theming</a>
    </div>

    <!-- Dark Mode Toggle Button -->
    <div class="dark-mode-toggle" onclick="toggleDarkMode()">
        <i class="fas fa-moon"></i>
    </div>

    <!-- Footer -->
    <footer>
        <div class="footer-columns">
            <!-- Column 1: Logo -->
            <div class="footer-column">
                <img src="resources/img/ringsce.png" alt="Logo" class="logo">
            </div>

            <!-- Column 2: Copyright -->
        <div class="footer-column">
                &copy; 2016 - <?php echo date("Y"); ?> Kreatyve Designs. All Rights Reserved.
        </div>

            <!-- Column 3: Social Media Icons -->
        <div class="footer-column">
            <a href="#" class="social-icon"><i class="fab fa-facebook-f"></i></a>
            <a href="#" class="social-icon"><i class="fab fa-twitter"></i></a>
            <a href="#" class="social-icon"><i class="fab fa-instagram"></i></a>
            <!-- Add more social media links as needed -->
        </div>

        </div>
    </footer>

    <script src="script.js"></script>
    
</body>
</html>
