<?php
// usuwa komentarz z poziomu admina
include_once 'Class/Database.php';
$db = new Database("localhost", "root", "", "klienci");

$x = $_POST['rem'];
$db->DELETE("DELETE FROM produkty WHERE (`id-produkt` = '$x')");
//$db->rozw("SELECT `id-produkt` from produkty ORDER BY `id-produkt` DESC", array("id-produkt"));
//$db->rozw("SELECT `id-produkt`, nick, nazwa, kategoria, opinia from produkty ORDER BY `id-produkt` DESC", array("id-produkt","nick", "nazwa", "kategoria", "opinia"));


header("location: ../index.php");