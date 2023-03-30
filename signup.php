<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

require_once 'passwords.php';
require_once 'config.php';

$username = $_POST['username'];
$password = $_POST['password'];
$passwordRepeat = $_POST['passwordRepeat'];

$db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_USERNAME, DB_USERNAME, DB_PASSWORD);

$sql = "SELECT * FROM Fórum WHERE username = '$username'";
$result = $db->query($sql);

if (!empty($username) && !empty($password) && !empty($passwordRepeat)) {
    // Pole jsou vyplněná
    if ($password == $passwordRepeat) {
        // Hesla shodují
        if (is_password_valid($password)) {
            // Heslo je validní
            // Kontrola, zda uživatel již neexistuje
            if ($result->rowCount() == 0) {
                // Uživatel neexistuje, provedeme registraci
                $stmt = $db->prepare("INSERT INTO Fórum (username, password) 
                    VALUES (?, ?);");
                $stmt->execute([$username, $password]);
                header('Location: login.php');

            } else {
                // Uživatel již existuje
                echo 'User carrying this user name already exists';
            }
        } else {
            echo 'Password is not valid';
        }
    } else {
        echo 'Passwords do not match';
    }
} else {
    echo 'Fill up all fields';
}



?>