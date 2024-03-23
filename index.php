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
        <a href="login.php">Login</a>
        <a href="register.php">Register</a>
        <a href="settings.php">Settings</a>
        <a href="theming.php">Theming</a>
    </div>

    <!-- Footer -->
    <footer>
        &copy; 2016 - <?php echo date("Y"); ?> Kreatyve Designs. All Rights Reserved.
    </footer>

    <script src="script.js"></script>
    <script>
        function toggleDropdown() {
            var dropdownMenu = document.getElementById("dropdownMenu");
            dropdownMenu.style.display = dropdownMenu.style.display === "block" ? "none" : "block";
        }
    </script>

    <?php
    // Check if the user has given consent
    function hasConsent() {
        // Check if the consent cookie is set
        return isset($_COOKIE['consent']) && $_COOKIE['consent'] === 'true';
    }

    // Set user consent
    function setConsent() {
        // Set a cookie to store user consent
        setcookie('consent', 'true', time() + (365 * 24 * 60 * 60), '/'); // Expires in 1 year
    }

    // Remove user consent
    function removeConsent() {
        // Remove the consent cookie
        setcookie('consent', '', time() - 3600, '/');
    }

    // Example usage:

    // Check if the user has given consent
    if (hasConsent()) {
        // User has given consent, proceed with data processing
        echo "You have given consent. Processing data...";
    } else {
        // User has not given consent, ask for consent
        echo "Please give your consent to proceed.";
    }

    // Set user consent
    setConsent();

    // Remove user consent
    removeConsent();
    ?>
</body>
</html>
