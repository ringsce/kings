<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Server Status</title>
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

    <style>
        .online { color: green; }
        .offline { color: red; }
    </style>
</head>
<body>
    <h1>Server Status</h1>
    <div class="menu-toggle" id="menuToggle">&#9776;</div>

    <!-- Sidebar -->
    <?php include_once 'sidebar.php'; ?>
    
   
    

    <?php
    // Function to check if a port is open
    function checkPort($host, $port) {
        $connection = @fsockopen($host, $port);
        if (is_resource($connection)) {
            fclose($connection);
            return true;
        } else {
            return false;
        }
    }

    // Check Apache status
    $apacheStatus = checkPort('localhost', 80) ? '<span class="online">Online</span>' : '<span class="offline">Offline</span>';

    // Check MySQL status
    $mysqlStatus = checkPort('localhost', 3306) ? '<span class="online">Online</span>' : '<span class="offline">Offline</span>';

    // Check Gerrit status
    $gerritStatus = checkPort('localhost', 8080) ? '<span class="online">Online</span>' : '<span class="offline">Offline</span>';

    // Check website status (assuming it's hosted on localhost)
    $websiteStatus = checkPort('localhost', 80) ? '<span class="online">Online</span>' : '<span class="offline">Offline</span>';
    ?>

    <p>Apache: <?php echo $apacheStatus; ?></p>
    <p>MySQL: <?php echo $mysqlStatus; ?></p>
    <p>Gerrit: <?php echo $gerritStatus; ?></p>
    <p>Website: <?php echo $websiteStatus; ?></p>


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
