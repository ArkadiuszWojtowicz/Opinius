<?php

$title = "Telewizory Manta";

include_once 'class/database.php';
$db = new Database("localhost", "root", "", "opinius");

$opinie = $db->displayReviews("SELECT `id-item`, nick, name, category, brand, review, star from items WHERE category= 'Telewizory' AND brand = 'Manta' ORDER BY `id-item` DESC", array("id-item", "nick", "name", "category", "brand", "review", "star"));
$opinieAdmin = $db->selectAdmin("SELECT `id-item`, nick, name, category, brand, review, star from items WHERE category= 'Telewizory' AND brand = 'Manta' ORDER BY `id-item` DESC", array("id-item", "nick", "name", "category", "brand", "review", "star"));
$status = $db->select("SELECT status from users u JOIN logged_in_users l ON u.id = l.userId", array("status")); // dodane aby funkcja unset działała tylko na odpowiednim statusie użytkownika       
$sortBest = $db->displayReviews("SELECT `id-item`, nick, name, category, brand, review, star from items WHERE category= 'Telewizory' AND brand = 'Manta' ORDER BY `star` DESC", array("id-item", "nick", "name", "category", "brand", "review", "star"));
$sortWorst = $db->displayReviews("SELECT `id-item`, nick, name, category, brand, review, star from items WHERE category= 'Telewizory' AND brand = 'Manta' ORDER BY `star`", array("id-item", "nick", "name", "category", "brand", "review", "star"));
$sortBestAdmin = $db->selectAdmin("SELECT `id-item`, nick, name, category, brand, review, star from items WHERE category= 'Telewizory' AND brand = 'Manta' ORDER BY `star` DESC", array("id-item", "nick", "name", "category", "brand", "review", "star"));
$sortWorstAdmin = $db->selectAdmin("SELECT `id-item`, nick, name, category, brand, review, star from items WHERE category= 'Telewizory' AND brand = 'Manta' ORDER BY `star`", array("id-item", "nick", "name", "category", "brand", "review", "star"));

$contentLOG = '                       
                        <h2>Telewizory Samsung</h2><br>                       
                        <div class="textRight">   
                        <form method="post">
                            <select name="sort" class="sortSelect" onchange="this.form.submit()">
                                <option selected disabled hidden>Sortuj opinie:</option>
                                <option value="Najnowsze">Najnowsze</option>
                                <option value="Malejąco">Od najlepszej</option>
                                <option value="Rosnąco">Od najgorszej</option>                                                    
                            </select>
                        </form> 
                    </div>';

if (isset($_POST['sort']) && $_POST['sort'] === 'Malejąco' && $status == 1) { // sortowanie opinii
    $contentLOG .= $sortBest;
}
if (isset($_POST['sort']) && $_POST['sort'] === 'Rosnąco' && $status == 1) {
    $contentLOG .= $sortWorst;
}
if (isset($_POST['sort']) && $_POST['sort'] === 'Najnowsze' && $status == 1) {
    $contentLOG .= $opinie;
}
if (!isset($_POST['sort']) && !isset($_POST['Samsung']) && $status == 1) {
    $contentLOG .= $opinie;
}

$content = '
                        <h2>Telewizory</h2><br>                     
                        <div class="textRight">   
                        <form method="post">
                            <select name="sort" class="sortSelect" onchange="this.form.submit()">
                                <option selected disabled hidden>Sortuj opinie:</option>
                                <option value="Najnowsze">Najnowsze</option>
                                <option value="Malejąco">Od najlepszej</option>
                                <option value="Rosnąco">Od najgorszej</option>                                                    
                            </select>
                        </form> 
                    </div>';

if (isset($_POST['sort']) && $_POST['sort'] === 'Malejąco') { // sortowanie opinii
    $content .= $sortBest;
}
if (isset($_POST['sort']) && $_POST['sort'] === 'Rosnąco') {
    $content .= $sortWorst;
}
if (isset($_POST['sort']) && $_POST['sort'] === 'Najnowsze') {
    $content .= $opinie;
}
if (!isset($_POST['sort'])) {
    $content .= $opinie;
}

$contentAdmin = '                       
                        <h2>Telewizory</h2><br>                       
                        <div class="textRight">   
                        <form method="post">
                            <select name="sort" class="sortSelect" onchange="this.form.submit()">
                                <option selected disabled hidden>Sortuj opinie:</option>
                                <option value="Najnowsze">Najnowsze</option>
                                <option value="Malejąco">Od najlepszej</option>
                                <option value="Rosnąco">Od najgorszej</option>                                                    
                            </select>
                        </form> 
                    </div>';
if (isset($_POST['sort']) && $_POST['sort'] === 'Malejąco' && $status == 2) { // sortowanie opinii
    $contentAdmin .= $sortBestAdmin;
}
if (isset($_POST['sort']) && $_POST['sort'] === 'Rosnąco' && $status == 2) {
    $contentAdmin .= $sortWorstAdmin;
}
if (isset($_POST['sort']) && $_POST['sort'] === 'Najnowsze' && $status == 2) {
    $contentAdmin .= $opinieAdmin;
}
if (!isset($_POST['sort']) && $status == 2) {
    $contentAdmin .= $opinieAdmin;
}