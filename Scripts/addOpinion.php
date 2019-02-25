<?php
// wstawia nową opinię na stronie głównej
session_start();
include_once 'Class/Database.php';

$db = new Database("localhost", "root", "", "klienci");

$nick = $db->select("SELECT userName from users u JOIN logged_in_users l ON u.id = l.userId", array("userName"));
$nazwa = $_POST['nazwa'];
$kategoria = $_POST['kategoria'];
$opinia = $_POST['opinia'];

$db->INSERT("INSERT INTO produkty Values(NULL,'$nazwa','$kategoria','$nick','$opinia')");

if (isset($_POST['opinia'])) {
    $_SESSION['added'] = '<span style="color:green; text-align: center; font-size:16px;">Opinia została dodana!</span>';
    header("location: ../index.php");
}

