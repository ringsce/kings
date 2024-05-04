<?php
// File: db/sqlite3_query.php

// Get the database connection
$db = include 'sqlite3_setup.php';

// Query to fetch all users
$query = "SELECT * FROM users";

try {
    $result = $db->query(query);
    
    // Display the results
    while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
        print_r($row);
    }
} catch (Exception $e) {
    echo "Error querying users: " . $e->getMessage();
}
