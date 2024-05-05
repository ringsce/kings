<?php
// File: process_form.php

// Check if form data is submitted via POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the data from the POST request
    $name = $_POST['name'];
    $creator = $_POST['creator'];
    $status = $_POST['status'];
    $last_edit = $_POST['last_edit'];

    // Open the SQLite3 database
    $db = new SQLite3('db/database.sqlite3');

    // Prepare the insert query
    $insert_query = "INSERT INTO form_data (name, creator, status, last_edit) VALUES (:name, :creator, :status, :last_edit)";
    try {
        $stmt = $db->prepare($insert_query);
        $stmt->bindValue(':name', $name, SQLITE3_TEXT);
        $stmt->bindValue(':creator', $creator, SQLITE3_TEXT);
        $stmt->bindValue(':status', $status, SQLITE3_TEXT);
        $stmt->bindValue(':last_edit', $last_edit, SQLITE3_TEXT);
        $stmt->execute();
        echo "Data inserted successfully.";
    } catch (Exception $e) {
        echo "Error inserting data: " . $e->getMessage();
    }
} else {
    echo "Invalid request method.";
}
