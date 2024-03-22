<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results</title>
</head>
<body>
    <h1>Search Results</h1>
    <div class="search-results">
        <?php
        // Get the search query from the URL
        $query = isset($_GET['query']) ? $_GET['query'] : '';
        
        // Directory where indexed files are stored
        $directory = __DIR__ . '/indexed_files/';
        
        // Search through files in the directory
        $files = scandir($directory);
        foreach ($files as $file) {
            if ($file !== '.' && $file !== '..') {
                // Read file contents
                $content = file_get_contents($directory . $file);
                
                // Check if query exists in file content
                if (stripos($content, $query) !== false) {
                    // Display link to file
                    echo "<a href='indexed_files/$file'>$file</a><br>";
                }
            }
        }
        ?>
    </div>
</body>
</html>
