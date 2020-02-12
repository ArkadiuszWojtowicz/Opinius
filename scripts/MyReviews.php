<?php

if (!isset($_SESSION)) {
    session_start();
    $sesId = session_id();
}
$log = '';
if (isset($_SESSION['log'])) {
    $log = $_SESSION['log'];
}
$title = "Moje opinie";

include_once 'class/database.php';

$db = new Database("localhost", "root", "", "opinius");

//include_once 'class/userManager.php'; //test
//$um = new UserManager(); //test

$userIdSession = $db->select('SELECT userId FROM logged_in_users WHERE sessionId = "'.$sesId.'"', array("userId"));

$reviews = $db->editReviews("SELECT r.`id-reviews`, name, category, brand, nick, review , star, star2, star3, star4, image FROM `parameters-items` p  JOIN reviews r ON `r`.`id-reviews` = p.`id-reviews` JOIN users u ON `u`.`id` = `r`.`id-users` JOIN items i ON `i`.`id-items` = `r`.`id-items` JOIN manufacturers m ON `m`.`id-manufacturers` = `i`.`id-manufacturers` JOIN categories c ON `c`.`id-categories` = `m`.`id-categories` JOIN logged_in_users l ON l.userId = r.`id-users` WHERE id = ".$userIdSession." ORDER BY r.`id-reviews`  DESC", array("id-reviews", "nick", "name", "category", "brand", "review", "star", "star2", "star3", "star4", "image", "star2", "star3", "star4", "image"));
$reviewsAdmin = $db->selectAdmin("SELECT r.`id-reviews`, name, category, brand, nick, review , star, star2, star3, star4, image FROM `parameters-items` p  JOIN reviews r ON `r`.`id-reviews` = p.`id-reviews` JOIN users u ON `u`.`id` = `r`.`id-users` JOIN items i ON `i`.`id-items` = `r`.`id-items` JOIN manufacturers m ON `m`.`id-manufacturers` = `i`.`id-manufacturers` JOIN categories c ON `c`.`id-categories` = `m`.`id-categories` JOIN logged_in_users l ON l.userId = r.`id-users` WHERE id = ".$userIdSession." ORDER BY r.`id-reviews`  DESC", array("id-reviews", "nick", "name", "category", "brand", "review", "star", "star2", "star3", "star4", "image", "star2", "star3", "star4", "image"));
if ($log == True) {
    $status = $db->select("SELECT status from users u JOIN logged_in_users l ON u.id = l.userId WHERE id = " . $userIdSession . "", array("status")); // dodane aby funkcja unset działała tylko na odpowiednim statusie użytkownika       
} else {
    $status = $db->select("SELECT status from users u JOIN logged_in_users l ON u.id = l.userId", array("status"));
}


$contentAdmin = '';
$contentLOG = '';
$content = '';

$content = '<h2>Tutaj możesz edytować swoje opinie </h2>
            <p>Aby zobaczyć swoje opinie musisz być zalogowany!</p>';

if (isset($_SESSION['editReview']) && $status == 1) { // info o edycji opinii
    $contentLOG .= '<div class="textCenter">' . $_SESSION['editReview'] . '</div>';
    unset($_SESSION['editReview']);
}

if (isset($_SESSION['editReview']) && $status == 2) { // info o edycji opinii
    $contentAdmin .= '<div class="textCenter">' . $_SESSION['editReview'] . '</div>';
    unset($_SESSION['editReview']);
}
$contentLOG .= '<h2>Tutaj możesz edytować swoje opinie </h2><div id="editReview" class="textLeft"></div>' . $reviews;
$contentAdmin .= '<h2>Tutaj możesz edytować swoje opinie </h2>' . $reviewsAdmin;
            
