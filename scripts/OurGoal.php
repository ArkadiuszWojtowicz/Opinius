<?php

$title = "Moje opinie";

include_once 'class/database.php';

$db = new Database("localhost", "root", "", "opinius");

$reviews = $db->displayReviews("SELECT `id-item`, nick, name, category, brand, review, star, star2, star3, star4 from items i JOIN users u ON u.userName = i.nick JOIN logged_in_users l ON l.userId = u.id ORDER BY `id-item` DESC", array("id-item", "nick", "name", "category", "brand", "review",  "star", "star2", "star3", "star4", "star2", "star3", "star4"));
$reviewsAdmin = $db->selectAdmin("SELECT `id-item`, nick, name, category, brand, review, star, star2, star3, star4 from items i JOIN users u ON u.userName = i.nick JOIN logged_in_users l ON l.userId = u.id ORDER BY `id-item` DESC", array("id-item", "nick", "name", "category", "brand", "review",  "star", "star2", "star3", "star4", "star2", "star3", "star4"));

$content = '<h2> Moje opinie </h2>
            <p>Aby zobaczyć swoje opinie musisz być zalogowany!</p>';
$contentLOG = '<h2> Moje opinie </h2>' . $reviews;
$contentAdmin = '<h2> Moje opinie </h2>' . $reviewsAdmin;
                        