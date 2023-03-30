<?php
session_start();
require_once 'config.php';

// ověření přihlášení uživatele
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

// zkontrolujeme, zda byl formulář odeslán
if(isset($_POST['submit'])) {
    
    // připojíme se k databázi
    $conn = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
    
    // zkontrolujeme, zda se povedlo připojení k databázi
    if($conn === false){
        die("Connection failed: " . mysqli_connect_error());
    }
    
    // získáme hodnoty z formuláře
    $nazev = $_POST['nazev'];
    $text = $_POST['text'];
    
    // získáme ID uživatele z session proměnné
    $user_id = $_SESSION['user_id'];
    
    // vložíme data do tabulky Blok
    $sql = "INSERT INTO Blok (Nazev, Text, ID) VALUES ('$nazev', '$text', '$user_id')";
    if(mysqli_query($conn, $sql)){
        echo "Data byla úspěšně vložena.";
    } else{
        echo "ERROR: Nepodařilo se vložit data do databáze $sql. " . mysqli_error($conn);
    }
    
    // uzavřeme spojení s databází
    mysqli_close($conn);
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Přidat příspěvek na fórum</title>
</head>
<body>
	<h1>Přidat příspěvek na fórum</h1>
	<form method="post" action="add_forum.php">
		<label for="nazev">Název:</label>
		<input type="text" name="nazev" id="nazev"><br><br>
		<label for="text">Text:</label>
		<textarea name="text" id="text"></textarea><br><br>
		<input type="submit" name="submit" value="Přidat">
	</form>
</body>
</html>
