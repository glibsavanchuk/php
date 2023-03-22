<?php
session_start();

$czyZalogowany = $_SESSION['czyZalogowany'] ?? false;

if(!$czyZalogowany) {
    header('Location: logowanie.php');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Strona chroniona</title>
</head>
<body>
    <h1>Witaj</h1>

    <a href="index.php">Index</a>
</body>
</html>