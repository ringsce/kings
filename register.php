<?php
include_once("db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $email = $_POST["email"];

    $statement = $database->prepare('INSERT INTO users (username, password, email) VALUES (:username, :password, :email)');
    $statement->bindParam(':username', $username);
    $statement->bindParam(':password', $password);
    $statement->bindParam(':email', $email);

    if ($statement->execute()) {
        echo "User registered successfully.";
    } else {
        echo "Error registering user.";
    }
}
?>
