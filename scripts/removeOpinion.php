<?php
// usuwa komentarz z poziomu admina
include_once 'class/database.php';
$db = new Database("localhost", "root", "", "opinius");

$x = $_POST['rem'];
$db->DELETE("DELETE FROM items WHERE (`id-item` = '$x')");

if (isset($_POST['rem'])) {
    $_SESSION['rem'] = '<span style="color:green; text-align: center; font-size:16px;">Opinia została usunięta!</span>';
    header("location: ../index.php");
}
