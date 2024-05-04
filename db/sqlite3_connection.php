<?php
// File: db/sqlite3_connection.php

try {
    // Connect to SQLite3 database
    $db = new SQLite3('path/to/your/sqlite3.db');

    // Set error reporting mode
    $db->enableExceptions(true);
    
    echo "Connected to SQLite3 database successfully.";
} catch (Exception $e) {
    echo "SQLite3 connection failed: " . $e->getMessage();
    exit();
}

return $db;
