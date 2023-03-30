<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="main.css">
    <title>Login</title>
</head>
<body>
    
    <h1 class="login">Fortnite Fórum</h1>
    
    <div class="login">
  
        <?php
            session_start();
            if(isset($_SESSION['user_id'])) {
                echo '<form action="logout.php"><button>Logout</button></form>';
            } else {
                echo '<a href="register.php"><button>Register</button></a>';
                echo '<a href="log_in.php"><button>Log in</button></a>';
            }
        ?>
    
    </div>
    
</body>
</html>
