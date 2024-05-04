<?php
// File: db/db_connection.php

// Determine which database to connect to
$database_type = getenv('DATABASE_TYPE'); // Use environment variable to set db type

if ($database_type === 'sqlite3') {
    return include 'sqlite3_connection.php';
} elseif ($database_type === 'mysql') {
    return include 'mysql_connection.php';
} else {
    throw new Exception("Unknown database type: $database_type");
}
