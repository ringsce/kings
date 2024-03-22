<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Files</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
    <h1>Search Files</h1>

    <form id="searchForm" action="" method="GET">
        <input type="text" name="search" id="searchInput" placeholder="Enter keyword">
        <button type="submit">Search</button>
    </form>

    <div id="searchResults">
        <!-- Search results will be displayed here -->
    </div>

    <script>
        $(document).ready(function() {
            // Function to perform search
            function performSearch() {
                var searchTerm = $('#searchInput').val();

                // Perform AJAX request to search.php
                $.ajax({
                    url: 'search.php',
                    type: 'GET',
                    data: { search: searchTerm },
                    success: function(response) {
                        $('#searchResults').html(response);
                    }
                });
            }

            // Perform initial search on page load
            performSearch();

            // Perform search on form submission
            $('#searchForm').submit(function(e) {
                e.preventDefault();
                performSearch();
            });

            // Periodically refresh search results
            setInterval(performSearch, 5000); // Update every 5 seconds (adjust as needed)
        });
    </script>
</body>
</html>
