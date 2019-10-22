<?php

// wstawia nową opinię na stronie głównej
session_start();
include_once 'class/database.php';

$db = new Database("localhost", "root", "", "opinius");

$nick = $db->select("SELECT userName from users u JOIN logged_in_users l ON u.id = l.userId", array("userName"));
$name = $_POST['name'];
$category = $_POST['category'];
$brand = $_POST['brand'];
$review = $_POST['review'];
$rating = $_POST['button'];

$db->INSERT("INSERT INTO items Values(NULL,'$name','$category','$brand','$nick','$review','$rating')");

if (isset($_POST['review'])) {
    $_SESSION['added'] = '<span style="color:green; text-align: center; font-size:16px;">Opinia została dodana!</span>';
    header("location: ../index.php");
}

