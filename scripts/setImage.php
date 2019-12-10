<?php

session_start();
include_once 'class/database.php';

$db = new Database("localhost", "root", "", "opinius");

$idLogged = $db->select("SELECT id from users u JOIN logged_in_users l ON u.id = l.userId", array("id"));
$file = addslashes(file_get_contents($_FILES['file']['tmp_name']));
if (isset($file)) {
    $db->UPDATE("UPDATE users SET image = '$file' WHERE id = $idLogged");
    header("location: ../index.php?site=MyReviews");
}