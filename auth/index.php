<?php
session_start();

$czyZalogowany = $_SESSION['czyZalogowany'] ?? false;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Auth</title>
</head>
<body>
    <h1>Strona publiczna</h1>

    <?php if(!$czyZalogowany): ?>
    <a href="logowanie.php">Logowanie</a>
    <?php else: ?>
    <a href="wyloguj.php">Wyloguj</a>
    <?php endif; ?>
    <a href="chroniona.php">Strona chroniona</a>
</body>
</html>