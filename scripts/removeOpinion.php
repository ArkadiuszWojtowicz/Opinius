<?php
// usuwa komentarz z poziomu admina
include_once 'class/database.php';
$db = new Database("localhost", "root", "", "opinius");

$x = $_POST['rem'];
$db->DELETE("DELETE FROM items WHERE (`id-item` = '$x')");
//$db->rozw("SELECT `id-item` from items ORDER BY `id-item` DESC", array("id-item"));
//$db->rozw("SELECT `id-item`, nick, name, category, review from items ORDER BY `id-item` DESC", array("id-item","nick", "name", "category", "review"));


header("location: ../index.php");