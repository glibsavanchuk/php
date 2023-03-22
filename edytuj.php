<?php
session_start();

$czyZalogowany = $_SESSION['czyZalogowany'] ?? false;
if(!$czyZalogowany)
{
    header("location: logowanie.php");
}

$polaczenie = new PDO('mysql:host=localhost;dbname=2p2','root','');

$id = $_GET['id'] ?? null;
$marka = $_POST['marka'] ?? null;
$model = $_POST['model'] ?? null;
$kolor = $_POST['kolor'] ?? null;

if($marka!=null && $model!=null && $kolor!=null) {
    $polaczenie->query("update samochod set marka='$marka', model='$model', kolor='$kolor' where id=$id");
    header('Location:wyswietl.php');
}

if($id !== null && is_numeric($id)) {
    $stmt = $polaczenie->query("select * from samochod where id=$id");
    $data = $stmt->fetch();
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
        <form method="POST" action="">
            <label for="marka">Marka: </label>
            <input type="text" name="marka" id="marka" value="<?= $data['marka']?>">
            <br>
            <label for="model">Model: </label>
            <input type="text" name="model" id="model" value="<?= $data['model']?>">
            <br>
            <label for="kolor">Kolor: </label>
            <input type="text" name="kolor" id="kolor" value="<?= $data['kolor']?>">
            <br>
            <button type="submit">Edytuj</button>
        </form>
</body>
</html>