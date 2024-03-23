<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Settings</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        /* Additional Styles */
        .sidebar {
            position: fixed;
            top: 0;
            left: -250px;
            width: 250px;
            height: 100%;
            background-color: #333;
            transition: all 0.3s ease;
        }

        .sidebar.active {
            left: 0;
        }

        .sidebar ul {
            list-style: none;
            padding: 20px;
        }

        .sidebar ul li {
            margin-bottom: 10px;
        }

        .content {
            margin-left: 250px;
            padding: 20px;
        }

        /* Theme Styles */
        .blue-white {
            background-color: #f0f0ff;
            color: #333;
        }

        .red-grey {
            background-color: #f5f5f5;
            color: #800000;
        }

        .brown-red {
            background-color: #8B4513;
            color: #FF0000;
        }
    </style>
</head>
<body>
    <div class="sidebar" id="sidebar">
        <ul>
            <li><a href="#profile">Profile</a></li>
            <li><a href="#settings">Settings</a></li>
            <li><a href="#theming">Theming</a></li>
        </ul>
    </div>

    <div class="content">
        <h1>User Settings</h1>

        <!-- Profile -->
        <div id="profile">
            <h2>Profile</h2>
            <form action="update_profile.php" method="post">
                <label for="nickname">Nickname:</label>
                <input type="text" id="nickname" name="nickname"><br><br>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email"><br><br>

                <label for="password">Password:</label>
                <input type="password" id="password" name="password"><br><br>

                <input type="submit" value="Update Profile">
            </form>
        </div>

        <!-- Settings -->
        <div id="settings" style="display:none;">
            <h2>Settings</h2>
            <!-- Add settings options here -->
        </div>

        <!-- Theming -->
        <div id="theming" style="display:none;">
            <h2>Theming</h2>
            <form action="update_theme.php" method="post">
                <label for="theme">Choose Theme:</label>
                <select name="theme" id="theme">
                    <option value="blue-white">Blue and White</option>
                    <option value="red-grey">Red and Grey</option>
                    <option value="brown-red">Brown and Red</option>
                </select><br><br>

                <label for="mode">Dark Mode:</label>
                <input type="checkbox" id="mode" name="mode"><br><br>

                <input type="submit" value="Save Theme">
            </form>
        </div>
    </div>

    <footer>
        &copy; 2016 - <?php echo date("Y"); ?> Kreatyve Designs. All rights reserved.
    </footer>

    <script>
        const sidebar = document.getElementById('sidebar');

        function toggleSidebar() {
            sidebar.classList.toggle('active');
        }
    </script>
</body>
</html>
