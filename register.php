<?php
session_start();

if (!empty($_SESSION['user'])) {
    header('Location: dashboard.php');
    die();
}
?>

<!DOCTYPE html> 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="main.css">
    <title>Register</title>
</head>
<body>
<form method="post" action="signup.php" class="register">
    <div>
        <div class="margin">    
            <label for="username">Username</label>
            <input type="text" name="username"/>
        </div>

        <div class="margin">    
            <label for="password">Password</label>
            <input type="text" name="password">
        </div>

        <div class="margin">    
            <label for="passwordRepeat">Password again</label>
            <input type="text" name="passwordRepeat">
        </div> 
        
        
        <button type="submit">Register</button>
        <p>The password must contain digits, upper and lower case letters and must be at least 8 characters long.</p>
    </div>
</form>
</body>
</html>