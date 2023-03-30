<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

require_once 'config.php';

session_start();

$db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_USERNAME, DB_USERNAME, DB_PASSWORD);

if (!isset($_COOKIE['count'])) {
    setcookie('count', 0, time() + 3600 * 24 * 30, '/');
}

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    function login(string $username, string $password, $db): bool
    {
        //return $username == USERNAME && $password == PASSWORD;
        $query = $db->query('SELECT * FROM users');
        $users = $query->fetchAll();

        for ($i = 0; $i < count($users); $i++) {
            $user = $users[$i];

            if ($user['username'] == $username && $user['password'] == md5($password)) {
                return true;
            }
        }

        return false;
    }

    if (login($username, $password, $db)) {
        echo 'zadali jste správné údaje';
        $_SESSION['user'] = $username;
        $_SESSION['count'] = 0;
    } else {
        header('Location: index.php');
        die();
    }
}

if (empty($_SESSION['user'])) {
    header('Location: index.php');
    die();
}

$_SESSION['count']++;
setcookie('count', $_COOKIE['count'] + 1, time() + 3600 * 24 * 30, '/');
?>

<h1>Vítej, uživateli <?= $_SESSION['user'] ?></h1>
<p>Na této stránce za tuto relaci jste byl celkem <?= $_SESSION['count'] ?>x</p>
<p>Na této stránce za celou dobu jste byl celkem <?= $_COOKIE['count'] ?>x</p>
<a href="logout.php">Odhlásit se</a>







