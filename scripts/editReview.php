<?php
// usuwa komentarz z poziomu admina

if (!isset($_SESSION)) {
    session_start();
}


include_once 'class/database.php';
$db = new Database("localhost", "root", "", "opinius");

$reviews = $db->displayReviews("SELECT r.`id-reviews`, name, category, brand, nick, review , star, star2, star3, star4, image FROM `parameters-items` p JOIN reviews r ON `r`.`id-reviews` = p.`id-reviews` JOIN users u ON `u`.`id` = `r`.`id-users` JOIN items i ON `i`.`id-items` = `r`.`id-items` JOIN manufacturers m ON `m`.`id-manufacturers` = `i`.`id-manufacturers` JOIN categories c ON `c`.`id-categories` = `m`.`id-categories` ORDER BY r.`id-reviews`  DESC", array("id-reviews", "nick", "name", "category", "brand", "review", "star", "star2", "star3", "star4", "image"));
$contentAdmin = '';
$contentLOG = '';
$content = '';

$editID = $_POST['editID'];
$edit = $_POST['edit'];
$editReview = $_POST['editReview'];
$db->UPDATE("UPDATE reviews SET review = '$editReview' WHERE `id-reviews` = $edit");

$contentLOG .= '<form action ="scripts/editReview.php" method="post"><textarea rows="8" style="width:94%;margin-top:10px;background-color:#efefef;" name="editReview" class="textLeft" required></textarea>\n\
                <button type="submit" value="" name="edit">Zatwierdź</button></form>';

if (isset($_POST['editReview'])) {
    $_SESSION['editReview'] = '<span style="color:green; text-align: center; font-size:16px;">Opinia została edytowana!</span>';
    header("location: ../index.php?site=MyReviews");
}
