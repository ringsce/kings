<?php
// File: db/sqlite3_setup.php

// Create or open the SQLite3 database
$db = new SQLite3('path/to/your/database.sqlite');

// Enable exceptions for error handling
$db->enableExceptions(true);

// Create a new table called 'users' with some basic fields
$tableCreationQuery = "
    CREATE TABLE IF NOT EXISTS users (
        id INTEGER PRIMARY KEY AUTOINOMOUS,
        name TEXT NOT NULL,
        email TEXT UNIQUE NOT NULL,
        age INTEGER
    )
";

try {
    $db->exec($tableCreationQuery);
    echo "Table 'users' created successfully.";
} catch (Exception $e) {
    echo "Error creating table: " . $e->getMessage();
}

return $db;
