<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

require_once 'passwords.php';
require_once 'config.php';

// Zpracování přihlašovacích údajů
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_USERNAME, DB_USERNAME, DB_PASSWORD);

    // Kontrola, zda existuje uživatel se zadaným jménem a heslem
    $stmt = $db->prepare("SELECT * FROM Fórum WHERE username = ? AND password = ?");
    $stmt->execute([$username, $password]);
    $user = $stmt->fetch();

    if ($user) {
        // Přihlášení uživatele
        session_start();
        $_SESSION['user_id'] = $user['ID'];
        header('Location: index.php');
    } else {
        echo 'Nesprávné uživatelské jméno nebo heslo';
    }
}
?>

    