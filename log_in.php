<?php
    require_once 'actual_login.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="main.css">
    <title>log_in</title>
</head>
<body>
<form method="post" action="actual_login.php" class="register">
        <div class="margin">    
            <label for="username">Username</label>
            <input type="text" name="username"/>
        </div>

        <div class="margin">    
            <label for="password">Password</label>
            <input type="text" name="password">
        </div>  
        
        <button type="submit">Log in</button>
</form>

    
</body>
</html>