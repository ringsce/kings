<?php
// File: db/mysql_connection.php

$host = 'your_mysql_host';
$user = 'your_mysql_user';
$pass = 'your_mysql_password';
$dbname = 'your_mysql_dbname';

try {
    // Connect to MySQL database
    $db = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);

    // Set PDO to throw exceptions
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    echo "Connected to MySQL database successfully.";
} catch (PDOException $e) {
    echo "MySQL connection failed: " . $e->getMessage();
    exit();
}

return $db;
