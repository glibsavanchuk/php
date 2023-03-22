<?php
session_start();

$czyZalogowany = $_SESSION['czyZalogowany'] ?? false;
if(!$czyZalogowany)
{
    header("location: logowanie.php");
}

$polaczenie = new PDO('mysql:host=localhost;dbname=2p2','root','');

$marka = $_POST['marka'] ?? null;
$model = $_POST['model'] ?? null;
$kolor = $_POST['kolor'] ?? null;
$cena = $_POST['cena'] ?? null;

if($marka != null && $model != null && $kolor != null && $cena != null)
{
    $polaczenie->query("INSERT INTO samochod (`id`, `marka`, `model`, `kolor`, `cena`) VALUES (NULL, '$marka', '$model', '$kolor', '$cena')");
    header('location:wyswietl.php');
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
        <input type="text" name="marka" id="marka">
        <br>
        <label for="model">Model: </label>
        <input type="text" name="model" id="model">
        <br>
        <label for="kolor">Kolor: </label>
        <input type="text" name="kolor" id="kolor">
        <br>
        <label for="cena">Cena: </label>
        <input type="text" name="cena" id="cena">
        <br>
        <button type="submit">Dodaj</button>
    </form>
</body>
</html>