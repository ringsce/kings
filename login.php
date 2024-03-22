<?php
include_once("db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $statement = $database->prepare('SELECT * FROM users WHERE username = :username');
    $statement->bindParam(':username', $username);
    $result = $statement->execute()->fetchArray(SQLITE3_ASSOC);

    if ($result && password_verify($password, $result['password'])) {
        echo "Login successful.";
    } else {
        echo "Invalid username or password.";
    }
}
?>
