<?php
// usuwa komentarz z poziomu admina

session_start();

include_once 'class/database.php';
$db = new Database("localhost", "root", "", "opinius");

$idReview = filter_input_array(INPUT_POST)['rem'];
$db->DELETE("DELETE FROM reviews WHERE `id-reviews` = '$idReview'");

if (isset(filter_input_array(INPUT_POST)['rem'])) {
    $_SESSION['rem'] = '<span style="color:red; text-align: center; font-size:16px;">Opinia została usunięta!</span>';
    header("location: ../index.php");
}
