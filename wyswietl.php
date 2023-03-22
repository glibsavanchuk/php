<?php
session_start();

$czyZalogowany = $_SESSION['czyZalogowany'] ?? false;
if(!$czyZalogowany)
{
    header("location: logowanie.php");
}
else{
    $u_id = $_SESSION['u_id'] ?? 0;
    $polaczenie = new PDO('mysql:host=localhost;dbname=2p2','root','');

    $czyZalogowany = $_SESSION['czyZalogowany'] ?? false;

    $stmt = $polaczenie->query("SELECT * FROM samochod WHERE u_id = $u_id");
    $data = $stmt->fetchAll();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Wyswietlanie informacji z baz danych</h1>
    <form method="POST" action="usun.php">
        <table border=1px solid black>
            <tr>
                <?php if($czyZalogowany): ?>
                    <th>wybierz</th>
                <?php endif ?>
                <th>marka</th>
                <th>model</th>
                <th>kolor</th>
                <?php if($czyZalogowany): ?>
                    <th>Usun</th>
                    <th>Edytuj</th>
                <?php endif ?>
            </tr>
            <?php foreach($data as $dane):  ?>
                <tr>
                    <?php if($czyZalogowany): ?>
                        <th><input type="checkbox" name="id[]" value="<?= $dane['id']?>"></th>
                    <?php endif ?>
                    <th><?= $dane['marka']   ?></th>
                    <th><?= $dane['model']   ?></th>
                    <th><?= $dane['kolor']   ?></th>
                    <?php if($czyZalogowany): ?>
                        <th><a href="usun.php?id=<?= $dane['id'] ?>">USUN</a></th>
                        <th><a href="edytuj.php?id=<?= $dane['id'] ?>">EDYTUJ</a></th>
                    <?php endif ?>
                </tr>
            <?php endforeach ?>
            <?php if($czyZalogowany): ?>
                <tr>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th><a href="dodaj.php">dodaj</a></th>
                </tr>
            <?php endif ?>
        </table>
        <?php if($czyZalogowany): ?>
            <button type="submit">usun wybrane</button>
        <?php endif ?>
    </form>
    <?php if(!$czyZalogowany): ?>
        <a href="logowanie.php">Zaloguj się</a>
    <?php endif ?>
    <?php if($czyZalogowany): ?>
        <a href="wyloguj.php">Wyloguj się</a>
    <?php endif ?>
</body>
</html>