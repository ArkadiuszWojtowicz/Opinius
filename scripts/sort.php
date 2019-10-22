<?php

session_start();
include_once 'class/database.php';

$db = new Database("localhost", "root", "", "opinius");

$sortBest = $db->displayReviews("SELECT `id-item`, nick, name, category, brand, review, star from items ORDER BY `star` DESC", array("id-item", "nick", "name", "category", "brand", "review", "star"));
$sortWorst = $db->displayReviews("SELECT `id-item`, nick, name, category, brand, review, star from items ORDER BY `star`", array("id-item", "nick", "name", "category", "brand", "review", "star"));

$sort123 = $_POST['sort123'];

if(isset($_POST['sort123']) && $_POST['sort123'] === 'Najnowsze') {
    $contentLOG .= $sortBest;
    header("location: ../index.php");
    echo 'xxxx';
}else{
    echo 'yyyy';
//    $contentLOG .= $sortWorst;
}