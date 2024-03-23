<div id="trendingPosts">
        <!-- Trending posts will be displayed here -->
    </div>

    <script>
        $(document).ready(function() {
            // Function to fetch trending posts
            function fetchTrendingPosts() {
                // Perform AJAX request to fetch trending posts from the server
                $.ajax({
                    url: 'fetch_trending_posts.php', // Replace with your server-side script to fetch trending posts
                    type: 'GET',
                    success: function(response) {
                        $('#trendingPosts').html(response);
                    },
                    error: function(xhr, status, error) {
                        console.error('Error fetching trending posts:', error);
                    }
                });
            }

            // Perform initial fetch of trending posts on page load
            fetchTrendingPosts();

            // Periodically refresh trending posts
            setInterval(fetchTrendingPosts, 300000); // Update every 5 minutes (adjust as needed)
        });
    </script>