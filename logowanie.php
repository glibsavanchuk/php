<?php
session_start();

$czyZalogowany = $_SESSION['czyZalogowany'] ?? false;

$login = $_POST['login'] ?? null;
$haslo = $_POST['haslo'] ?? null;

$blad = [];
if($login !== null && $haslo !== null) {
    $db = new PDO('mysql:host=localhost;dbname=2p2', 'root', '');

    $stmt = $db->query("select * from uzytkownik where login='$login' and haslo='$haslo'");
    $uzytkownik = $stmt->fetch();

    if($uzytkownik) {
        $_SESSION['u_id'] = $uzytkownik['id'];
        $_SESSION['czyZalogowany'] = true;
        header('Location: wyswietl.php');
    }
    else {
        $blad[] = 'Błędne dane logowania';
    }
  
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logowanie</title>
</head>
<body>
    <h1>Logowanie</h1>

    <?php if(!empty($blad)): ?>
    <p><?= implode('<br>', $blad) ?></p>
    <?php endif; ?>

    <form action="logowanie.php" method="post">
        <input type="text" name="login" id="login" placeholder="Login">
        <input type="password" name="haslo" id="haslo" placeholder="Hasło">

        <button type="submit">Zaloguj</button>

    </form>
</body>
</html>