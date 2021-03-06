<?php

$title = "Urządzenia peryferyjne DeskJet";

include_once 'class/database.php';
$db = new Database("localhost", "root", "", "opinius");

$reviews = $db->displayReviews("SELECT `id-item`, nick, name, category, brand, review, star, star2, star3, star4 from items WHERE category= 'Urządzenia peryferyjne' AND brand = 'DeskJet' ORDER BY `id-item` DESC"  , array("id-item","nick","name","category", "brand","review",  "star", "star2", "star3", "star4"));
$reviewsAdmin = $db->selectAdmin("SELECT `id-item`, nick, name, category, brand, review, star, star2, star3, star4 from items WHERE category= 'Urządzenia peryferyjne' AND brand = 'DeskJet' ORDER BY `id-item` DESC"  , array("id-item","nick","name","category", "brand","review",  "star", "star2", "star3", "star4"));
$status = $db->select("SELECT status from users u JOIN logged_in_users l ON u.id = l.userId", array("status")); // dodane aby funkcja unset działała tylko na odpowiednim statusie użytkownika       
$sortBest = $db->displayReviews("SELECT `id-item`, nick, name, category, brand, review, star, star2, star3, star4 from items WHERE category= 'Urządzenia peryferyjne' AND brand = 'DeskJet' ORDER BY (star+star2+star3+star4)/4 DESC", array("id-item", "nick", "name", "category", "brand", "review",  "star", "star2", "star3", "star4"));
$sortWorst = $db->displayReviews("SELECT `id-item`, nick, name, category, brand, review, star, star2, star3, star4 from items WHERE category= 'Urządzenia peryferyjne' AND brand = 'DeskJet' ORDER BY (star+star2+star3+star4)/4", array("id-item", "nick", "name", "category", "brand", "review",  "star", "star2", "star3", "star4"));
$sortBestAdmin = $db->selectAdmin("SELECT `id-item`, nick, name, category, brand, review, star, star2, star3, star4 from items WHERE category= 'Urządzenia peryferyjne' AND brand = 'DeskJet' ORDER BY (star+star2+star3+star4)/4 DESC", array("id-item", "nick", "name", "category", "brand", "review",  "star", "star2", "star3", "star4"));
$sortWorstAdmin = $db->selectAdmin("SELECT `id-item`, nick, name, category, brand, review, star, star2, star3, star4 from items WHERE category= 'Urządzenia peryferyjne' AND brand = 'DeskJet' ORDER BY (star+star2+star3+star4)/4", array("id-item", "nick", "name", "category", "brand", "review",  "star", "star2", "star3", "star4"));

$contentLOG = '                       
                        <h2>Urządzenia peryferyjne - DeskJet</h2><br>                       
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
    $contentLOG .= $reviews;
}
if (!isset($_POST['sort']) && $status == 1) {
    $contentLOG .= $reviews;
}
$content = '
                        <h2>Urządzenia peryferyjne - DeskJet</h2><br>                     
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
    $content .= $reviews;
}
if (!isset($_POST['sort'])) {
    $content .= $reviews;
}
                        
$contentAdmin = '                       
                        <h2>Urządzenia peryferyjne - DeskJet</h2><br>                       
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
    $contentAdmin .= $reviewsAdmin;
}
if (!isset($_POST['sort']) && $status == 2) {
    $contentAdmin .= $reviewsAdmin;
}