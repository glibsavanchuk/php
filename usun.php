<?php
session_start();

$czyZalogowany = $_SESSION['czyZalogowany'] ?? false;
if(!$czyZalogowany)
{
    header("location: logowanie.php");
}
else{
$polaczenie = new PDO('mysql:host=localhost;dbname=2p2','root','');

$id = $_GET['id'] ?? null;

if($id != null && is_numeric($id))
{
    $polaczenie->query("DELETE FROM `samochod` WHERE `id` = '$id';");
}

$id = $_POST['id'] ?? null;
if($id != null && is_array($id))
{
    foreach($id as $i)
    {
        $polaczenie->query("DELETE FROM `samochod` WHERE `id` = '$i';");
    }
}
header('location:wyswietl.php');
}
?>