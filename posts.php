<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category View</title>
    <link rel="stylesheet" href="resources/css/styles.css">
</head>
<body>
    <div id="categories">
        <?php
        // Define categories and their respective directories
        $categories = array(
            "New Updates" => "New_Updates",
            "Ekron: Realms" => "Ekron_Realms",
            "Ekron: Samurai Babel" => "Ekron_Samurai_Babel",
            "Ekron: Wars" => "Ekron_Wars",
            "Ekron: Humans" => "Ekron_Humans"
        );

        // Initialize total stats counters
        $totalItems = 0;
        $totalCategories = 0;

        // Loop through each category
        foreach ($categories as $categoryName => $categoryDir) {
            // Increment total categories counter
            $totalCategories++;

            echo "<div class='category'>";
            echo "<h2>$categoryName</h2>";

            // Read Markdown files from the category directory
            $markdownFiles = glob("blog/$categoryDir/*.md");

            // Initialize category stats counters
            $categoryItems = 0;

            // Display up to 5 Markdown files
            $count = 0;
            foreach ($markdownFiles as $markdownFile) {
                if ($count >= 5) {
                    break; // Display only 5 items per category
                }

                // Increment category items counter
                $categoryItems++;
                // Increment total items counter
                $totalItems++;

                // Read the Markdown content
                $markdownContent = file_get_contents($markdownFile);

                // Parse Markdown to HTML (Assuming you have Parsedown library installed)
                require 'Parsedown.php';
                $parsedown = new Parsedown();
                $htmlContent = $parsedown->text($markdownContent);

                // Display the HTML content with bookmark and read buttons
                echo "<div class='markdown-item'>";
                echo $htmlContent;
                echo "<button class='bookmark-btn'>Bookmark</button>";
                echo "<button class='read-btn'>Read</button>";
                echo "</div>";

                $count++;
            }

            // Display category stats
            echo "<p>Items in this category: $categoryItems</p>";

            echo "</div>"; // Close category div
        }

        // Display total stats
        echo "<p>Total categories: $totalCategories</p>";
        echo "<p>Total items: $totalItems</p>";
        ?>
    </div>

    <script>
        // Add event listeners for bookmark and read buttons
        document.querySelectorAll('.bookmark-btn').forEach(function(btn) {
            btn.addEventListener('click', function() {
                // Add bookmark functionality
                alert('Bookmark clicked');
            });
        });

        document.querySelectorAll('.read-btn').forEach(function(btn) {
            btn.addEventListener('click', function() {
                // Add read functionality
                alert('Read clicked');
            });
        });
    </script>
</body>
</html>
