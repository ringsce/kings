<?php
session_start();

// Function to add a bookmark
function addBookmark($url) {
    $_SESSION['bookmarks'][] = $url;
}

// Function to check if a URL is bookmarked
function isBookmarked($url) {
    return in_array($url, $_SESSION['bookmarks'] ?? []);
}

// Check if session bookmarks array is set, if not, initialize it
if (!isset($_SESSION['bookmarks'])) {
    $_SESSION['bookmarks'] = [];
}

// Example usage:
if (isset($_GET['action']) && $_GET['action'] === 'bookmark') {
    $url = $_GET['url'] ?? '';
    if ($url !== '' && !isBookmarked($url)) {
        addBookmark($url);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bookmark Example</title>
</head>
<body>

<h1>Bookmark Example</h1>

<?php
$url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
if (isBookmarked($url)) {
    echo "<p>This page is bookmarked.</p>";
} else {
    echo "<p>This page is not bookmarked. <a href='?action=bookmark&url=$url'>Bookmark it</a>.</p>";
}
?>

</body>
</html>
