<?php
include_once("db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];

    $statement = $database->prepare('INSERT INTO subscribers (email) VALUES (:email)');
    $statement->bindParam(':email', $email);

    if ($statement->execute()) {
        echo "Subscribed successfully.";
    } else {
        echo "Error subscribing.";
    }
}
?>
