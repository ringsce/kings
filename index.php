<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KnL Publishing</title>
    <link rel="stylesheet" href="resources/css/styles.css">
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
    </style>
</head>

<body>
    <div class="menu-toggle" id="menuToggle">&#9776;</div>
    
    <!-- Sidebar -->
    <?php include_once 'sidebar.php'; ?>
    
    <!-- Slideshows -->
    <?php include_once 'slideshow.php'; ?>
    
    <!-- Dark Mode/Light Mode Toggle -->
    <label class="switch">
        <input type="checkbox" id="toggle">
        <span class="slider round"></span>
    </label>

    <!-- Search Form -->
    <form class="search-form" action="#" method="GET">
        <input type="text" name="search" placeholder="Search">
        <button type="submit">Search</button>
    </form>

    <!-- Login Icon -->
    <div class="login-icon" onclick="toggleDropdown()">👤</div>

    <!-- Dropdown Menu -->
    <div class="dropdown" id="dropdownMenu">
        <a href="#">Login</a>
        <a href="#">Register</a>
        <a href="#">Settings</a>
        <a href="#">Theming</a>
    </div>

    <script src="script.js"></script>
    <script>
        function toggleDropdown() {
            var dropdownMenu = document.getElementById("dropdownMenu");
            dropdownMenu.style.display = dropdownMenu.style.display === "block" ? "none" : "block";
        }
    </script>
</body>
</html>
