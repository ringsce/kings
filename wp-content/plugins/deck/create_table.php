<?php
// File: create_table.php

// Open or create the SQLite3 database
$db = new SQLite3('db/database.sqlite3');

// Enable exceptions for better error handling
$db->enableExceptions(true);

// Create a table to store form data if it doesn't exist
$table_creation_query = "
CREATE TABLE IF NOT EXISTS form_data (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    name TEXT NOT NULL,
    creator TEXT NOT NULL,
    status TEXT NOT NULL,
    last_edit DATE NOT NULL
)";
try {
    $db->exec(table_creation_query);
    echo "Table created or already exists.";
} catch (Exception $e) {
    echo "Error creating table: " . $e->getMessage();
}
