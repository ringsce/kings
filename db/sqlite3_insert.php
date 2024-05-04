<?php
// File: db/sqlite3_insert.php

// Get the database connection
$db = include 'sqlite3_setup.php';

// Data to insert into the 'users' table
$users = [
    ['name' => 'John Doe', 'email' => 'john@example.com', 'age' => 30],
    ['name' => 'Jane Smith', 'email' => 'jane@example.com', 'age' => 25],
    ['name' => 'Alice Johnson', 'email' => 'alice@example.com', 'age' => 28],
];

// Prepare the insert statement
$insertQuery = "INSERT INTO users (name, email, age) VALUES (:name, :email, :age)";

try {
    $stmt = $db->prepare($insertQuery);
    
    // Insert each user into the database
    foreach ($users as $user) {
        $stmt->bindValue(':name', $user['name'], SQLITE3_TEXT);
        $stmt->bindValue(':email', $user['email'], SQLITE3_TEXT);
        $stmt->bindValue(':age', $user['age'], SQLITE3_INTEGER);
        $stmt->execute();
    }
    
    echo "Users inserted successfully.";
} catch (Exception $e) {
    echo "Error inserting users: " . $e->getMessage();
}
