<?php
// File: display_data.php

// Open the SQLite3 database
$db = new SQLite3('db/database.sqlite3');

// Query to fetch all data from the form_data table
$query = "SELECT * FROM form_data";

try {
    $result = $db->query(query);
    
    echo "<h2>Saved Data</h2>";
    echo "<table border='1'>";
    echo "<tr><th>ID</th><th>Name</th><th>Creator</th><th>Status</th><th>Last Edit</th></tr>";
    
    // Loop through and display the results
    while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row['id']) . "</td>";
        echo "<td>" . htmlspecialchars($row['name']) . "</td>";
        echo "<td>" . htmlspecialchars($row['creator']) . "</td>";
        echo "<td>" . htmlspecialchars($row['status']) . "</td>";
        echo "<td>" . htmlspecialchars($row['last_edit']) . "</td>";
        echo "</tr>";
    }
    
    echo "</table>";
} catch (Exception $e) {
    echo "Error querying data: " . $e->getMessage();
}
