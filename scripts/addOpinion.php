<?php

// wstawia nową opinię na stronie głównej
session_start();
include_once 'class/database.php';

$db = new Database("localhost", "root", "", "opinius");

//$nick = $db->select("SELECT userName from users u JOIN logged_in_users l ON u.id = l.userId", array("userName"));
$name = $_POST['name'];
$brand = $_POST['brand'];
$category = $_POST['category'];
$review = $_POST['review'];
//$rating = $_POST['button'];
$detailedButton1 = $_POST['detailedButton1'];
$detailedButton2 = $_POST['detailedButton2'];
$detailedButton3 = $_POST['detailedButton3'];
$detailedButton4 = $_POST['detailedButton4'];

//$db->INSERT("INSERT INTO items Values(NULL,'$itemsName','$category','$brand','$nick','$review','$detailedButton1','$detailedButton2','$detailedButton3','$detailedButton4')");

$idManufacturers = $db->select("SELECT `id-manufacturers` FROM manufacturers m JOIN categories c ON `c`.`id-categories` = `m`.`id-categories` WHERE brand = '$brand' AND category = '$category'", array("id-manufacturers"));
$idUsers = $db->select("SELECT `id` from users u JOIN logged_in_users l ON u.`id` = l.userId", array("id"));
$db->INSERT("INSERT INTO items Values(NULL,'$name','$idManufacturers','$idUsers')");
$idItems = $db->select("SELECT `id-items` FROM items WHERE name = '$name'", array("id-items"));
$db->INSERT("INSERT INTO reviews Values(NULL,'$review','$idUsers','$idItems')");
$idReviews = $db->select("SELECT `id-reviews` FROM reviews WHERE review = '$review'", array("id-reviews"));
$db->INSERT("INSERT INTO `parameters-items` Values(NULL,'$detailedButton1','$detailedButton2','$detailedButton3','$detailedButton4','$idReviews')");


if (isset($_POST['review'])) {
    $_SESSION['added'] = '<span style="color:green; text-align: center; font-size:16px;">Opinia została dodana!</span>';
    header("location: ../index.php");
}

