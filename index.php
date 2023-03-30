<?php
session_start();
require_once 'config.php';

// připojení k databázi
$conn = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

// kontrola připojení k databázi
if ($conn === false) {
    die("Connection failed: " . mysqli_connect_error());
}

// získání dat z tabulky Blok a propojené tabulky Fórum
$sql = "SELECT b.Nazev, b.Text, f.username FROM Blok b JOIN Fórum f ON b.ID = f.ID";
$result = mysqli_query($conn, $sql);

// uložení dat do pole
$data = array();
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }
}

// uzavření spojení s databází
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="main.css">
    <title>Forum</title>
</head>
<body>
    <Header>
        <a class="user" href="login.php"><img src="image-removebg-preview.png" alt="User" id="login"></a>
        <div id="odkazy">
            <a href="index.php"><p>Home</p></a>
            <a href="aboutus.php"><p>About us</p></a>
        </div>
    </Header>

    <div class="main">
        <h1>Fortnite Fórum</h1>

        
        <a href="add_forum.php"><button>Přidat fórum</button></a>
     

        <?php foreach ($data as $row): ?>
            <div class="blok">
                <h2> <?php echo $row['username']; ?></h2>
                <h3><?php echo $row['Nazev']; ?></h3>
                <p><?php echo $row['Text']; ?></p>
                
            </div>
        <?php endforeach; ?>

    </div>
</body>
</html>
