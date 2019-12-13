<?php
if (!isset($_SESSION)) {
    session_start();
}
$log = '';
if (isset($_SESSION['log'])) {
    $log = $_SESSION['log'];
}
$sesId = session_id();

$title = "Aparaty i kamery";

include_once 'class/database.php';
$db = new Database("localhost", "root", "", "opinius");

$userIdSession = $db->select('SELECT userId FROM logged_in_users WHERE sessionId = "'.$sesId.'"', array("userId"));
$reviews = $db->displayReviews("SELECT r.`id-reviews`, name, category, brand, nick, review , star, star2, star3, star4, image FROM `parameters-items` p JOIN reviews r ON `r`.`id-reviews` = p.`id-reviews` JOIN users u ON `u`.`id` = `r`.`id-users` JOIN items i ON `i`.`id-items` = `r`.`id-items` JOIN manufacturers m ON `m`.`id-manufacturers` = `i`.`id-manufacturers` JOIN categories c ON `c`.`id-categories` = `m`.`id-categories` WHERE category= 'Aparaty i kamery' ORDER BY r.`id-reviews`  DESC"  , array("id-reviews", "nick", "name", "category", "brand", "review", "star", "star2", "star3", "star4", "image"));
$reviewsAdmin = $db->selectAdmin("SELECT r.`id-reviews`, name, category, brand, nick, review , star, star2, star3, star4, image FROM `parameters-items` p JOIN reviews r ON `r`.`id-reviews` = p.`id-reviews` JOIN users u ON `u`.`id` = `r`.`id-users` JOIN items i ON `i`.`id-items` = `r`.`id-items` JOIN manufacturers m ON `m`.`id-manufacturers` = `i`.`id-manufacturers` JOIN categories c ON `c`.`id-categories` = `m`.`id-categories` WHERE category= 'Aparaty i kamery' ORDER BY r.`id-reviews`  DESC"  , array("id-reviews", "nick", "name", "category", "brand", "review", "star", "star2", "star3", "star4", "image"));
if ($log == True) {
    $status = $db->select("SELECT status from users u JOIN logged_in_users l ON u.id = l.userId WHERE id = " . $userIdSession . "", array("status"));      
} else {
    $status = $db->select("SELECT status from users u JOIN logged_in_users l ON u.id = l.userId", array("status"));
}
$sortBest = $db->displayReviews("SELECT r.`id-reviews`, name, category, brand, nick, review , star, star2, star3, star4, image FROM `parameters-items` p JOIN reviews r ON `r`.`id-reviews` = p.`id-reviews` JOIN users u ON `u`.`id` = `r`.`id-users` JOIN items i ON `i`.`id-items` = `r`.`id-items` JOIN manufacturers m ON `m`.`id-manufacturers` = `i`.`id-manufacturers` JOIN categories c ON `c`.`id-categories` = `m`.`id-categories` WHERE category= 'Aparaty i kamery' ORDER BY (star+star2+star3+star4)/4 DESC", array("id-reviews", "nick", "name", "category", "brand", "review", "star", "star2", "star3", "star4", "image"));
$sortWorst = $db->displayReviews("SELECT r.`id-reviews`, name, category, brand, nick, review , star, star2, star3, star4, image FROM `parameters-items` p JOIN reviews r ON `r`.`id-reviews` = p.`id-reviews` JOIN users u ON `u`.`id` = `r`.`id-users` JOIN items i ON `i`.`id-items` = `r`.`id-items` JOIN manufacturers m ON `m`.`id-manufacturers` = `i`.`id-manufacturers` JOIN categories c ON `c`.`id-categories` = `m`.`id-categories` WHERE category= 'Aparaty i kamery' ORDER BY (star+star2+star3+star4)/4", array("id-reviews", "nick", "name", "category", "brand", "review", "star", "star2", "star3", "star4", "image"));
$sortBestAdmin = $db->selectAdmin("SELECT r.`id-reviews`, name, category, brand, nick, review , star, star2, star3, star4, image FROM `parameters-items` p JOIN reviews r ON `r`.`id-reviews` = p.`id-reviews` JOIN users u ON `u`.`id` = `r`.`id-users` JOIN items i ON `i`.`id-items` = `r`.`id-items` JOIN manufacturers m ON `m`.`id-manufacturers` = `i`.`id-manufacturers` JOIN categories c ON `c`.`id-categories` = `m`.`id-categories` WHERE category= 'Aparaty i kamery' ORDER BY (star+star2+star3+star4)/4 DESC", array("id-reviews", "nick", "name", "category", "brand", "review", "star", "star2", "star3", "star4", "image"));
$sortWorstAdmin = $db->selectAdmin("SELECT r.`id-reviews`, name, category, brand, nick, review , star, star2, star3, star4, image FROM `parameters-items` p JOIN reviews r ON `r`.`id-reviews` = p.`id-reviews` JOIN users u ON `u`.`id` = `r`.`id-users` JOIN items i ON `i`.`id-items` = `r`.`id-items` JOIN manufacturers m ON `m`.`id-manufacturers` = `i`.`id-manufacturers` JOIN categories c ON `c`.`id-categories` = `m`.`id-categories` WHERE category= 'Aparaty i kamery' ORDER BY (star+star2+star3+star4)/4", array("id-reviews", "nick", "name", "category", "brand", "review", "star", "star2", "star3", "star4", "image"));
$sortBestResolution = $db->displayReviews("SELECT r.`id-reviews`, name, category, brand, nick, review , star, star2, star3, star4, image FROM `parameters-items` p JOIN reviews r ON `r`.`id-reviews` = p.`id-reviews` JOIN users u ON `u`.`id` = `r`.`id-users` JOIN items i ON `i`.`id-items` = `r`.`id-items` JOIN manufacturers m ON `m`.`id-manufacturers` = `i`.`id-manufacturers` JOIN categories c ON `c`.`id-categories` = `m`.`id-categories` WHERE category= 'Aparaty i kamery' ORDER BY star DESC", array("id-reviews", "nick", "name", "category", "brand", "review", "star", "star2", "star3", "star4", "image"));
$sortWorstResolution = $db->displayReviews("SELECT r.`id-reviews`, name, category, brand, nick, review , star, star2, star3, star4, image FROM `parameters-items` p JOIN reviews r ON `r`.`id-reviews` = p.`id-reviews` JOIN users u ON `u`.`id` = `r`.`id-users` JOIN items i ON `i`.`id-items` = `r`.`id-items` JOIN manufacturers m ON `m`.`id-manufacturers` = `i`.`id-manufacturers` JOIN categories c ON `c`.`id-categories` = `m`.`id-categories` WHERE category= 'Aparaty i kamery' ORDER BY star", array("id-reviews", "nick", "name", "category", "brand", "review", "star", "star2", "star3", "star4", "image"));
$sortBestControl = $db->displayReviews("SELECT r.`id-reviews`, name, category, brand, nick, review , star, star2, star3, star4, image FROM `parameters-items` p JOIN reviews r ON `r`.`id-reviews` = p.`id-reviews` JOIN users u ON `u`.`id` = `r`.`id-users` JOIN items i ON `i`.`id-items` = `r`.`id-items` JOIN manufacturers m ON `m`.`id-manufacturers` = `i`.`id-manufacturers` JOIN categories c ON `c`.`id-categories` = `m`.`id-categories` WHERE category= 'Aparaty i kamery' ORDER BY star2 DESC", array("id-reviews", "nick", "name", "category", "brand", "review", "star", "star2", "star3", "star4", "image"));
$sortWorstControl = $db->displayReviews("SELECT r.`id-reviews`, name, category, brand, nick, review , star, star2, star3, star4, image FROM `parameters-items` p JOIN reviews r ON `r`.`id-reviews` = p.`id-reviews` JOIN users u ON `u`.`id` = `r`.`id-users` JOIN items i ON `i`.`id-items` = `r`.`id-items` JOIN manufacturers m ON `m`.`id-manufacturers` = `i`.`id-manufacturers` JOIN categories c ON `c`.`id-categories` = `m`.`id-categories` WHERE category= 'Aparaty i kamery' ORDER BY star2", array("id-reviews", "nick", "name", "category", "brand", "review", "star", "star2", "star3", "star4", "image"));
$sortBestZoom = $db->displayReviews("SELECT r.`id-reviews`, name, category, brand, nick, review , star, star2, star3, star4, image FROM `parameters-items` p JOIN reviews r ON `r`.`id-reviews` = p.`id-reviews` JOIN users u ON `u`.`id` = `r`.`id-users` JOIN items i ON `i`.`id-items` = `r`.`id-items` JOIN manufacturers m ON `m`.`id-manufacturers` = `i`.`id-manufacturers` JOIN categories c ON `c`.`id-categories` = `m`.`id-categories` WHERE category= 'Aparaty i kamery' ORDER BY star3 DESC", array("id-reviews", "nick", "name", "category", "brand", "review", "star", "star2", "star3", "star4", "image"));
$sortWorstZoom = $db->displayReviews("SELECT r.`id-reviews`, name, category, brand, nick, review , star, star2, star3, star4, image FROM `parameters-items` p JOIN reviews r ON `r`.`id-reviews` = p.`id-reviews` JOIN users u ON `u`.`id` = `r`.`id-users` JOIN items i ON `i`.`id-items` = `r`.`id-items` JOIN manufacturers m ON `m`.`id-manufacturers` = `i`.`id-manufacturers` JOIN categories c ON `c`.`id-categories` = `m`.`id-categories` WHERE category= 'Aparaty i kamery' ORDER BY star3", array("id-reviews", "nick", "name", "category", "brand", "review", "star", "star2", "star3", "star4", "image"));
$sortBestMatrix = $db->displayReviews("SELECT r.`id-reviews`, name, category, brand, nick, review , star, star2, star3, star4, image FROM `parameters-items` p JOIN reviews r ON `r`.`id-reviews` = p.`id-reviews` JOIN users u ON `u`.`id` = `r`.`id-users` JOIN items i ON `i`.`id-items` = `r`.`id-items` JOIN manufacturers m ON `m`.`id-manufacturers` = `i`.`id-manufacturers` JOIN categories c ON `c`.`id-categories` = `m`.`id-categories` WHERE category= 'Aparaty i kamery' ORDER BY star4 DESC", array("id-reviews", "nick", "name", "category", "brand", "review", "star", "star2", "star3", "star4", "image"));
$sortWorstMatrix = $db->displayReviews("SELECT r.`id-reviews`, name, category, brand, nick, review , star, star2, star3, star4, image FROM `parameters-items` p JOIN reviews r ON `r`.`id-reviews` = p.`id-reviews` JOIN users u ON `u`.`id` = `r`.`id-users` JOIN items i ON `i`.`id-items` = `r`.`id-items` JOIN manufacturers m ON `m`.`id-manufacturers` = `i`.`id-manufacturers` JOIN categories c ON `c`.`id-categories` = `m`.`id-categories` WHERE category= 'Aparaty i kamery' ORDER BY star4", array("id-reviews", "nick", "name", "category", "brand", "review", "star", "star2", "star3", "star4", "image"));



$contentLOG = '                       
                        <h2>Aparaty i kamery</h2><br>                       
                        <div class="textLeft" >   
                            <form method="post">
                                <select name="sort1" class="sortSelectCameras" onchange="this.form.submit()">
                                    <option selected disabled hidden>Sortuj po jakości zdjęć:</option>
                                    <option value="Malejąco">Od najlepszej</option>
                                    <option value="Rosnąco">Od najgorszej</option>                                                    
                                </select>
                            </form> 
                        </div>
                        <div class="textLeft" >   
                            <form method="post">
                                <select name="sort2" class="sortSelectCameras" onchange="this.form.submit()">
                                    <option selected disabled hidden>Sortuj po funkcjonalności:</option>
                                    <option value="Malejąco">Od najlepszej</option>
                                    <option value="Rosnąco">Od najgorszej</option>                                                    
                                </select>
                            </form> 
                        </div>
                        <div class="textLeft" >   
                            <form method="post">
                                <select name="sort3" class="sortSelectCameras" onchange="this.form.submit()">
                                    <option selected disabled hidden>Sortuj po wyglądzie:</option>
                                    <option value="Malejąco">Od najlepszej</option>
                                    <option value="Rosnąco">Od najgorszej</option>                                                    
                                </select>
                            </form> 
                        </div>
                        <div class="textLeft" >   
                            <form method="post">
                                <select name="sort4" class="sortSelectCameras" onchange="this.form.submit()">
                                    <option selected disabled hidden>Sortuj po baterii:</option>
                                    <option value="Malejąco">Od najlepszej</option>
                                    <option value="Rosnąco">Od najgorszej</option>                                                    
                                </select>
                            </form> 
                        </div>
                        <div class="textRight">   
                        <form method="post">
                            <select name="sort" class="sortSelectShort" onchange="this.form.submit()">
                                <option selected disabled hidden>Sortuj opinie:</option>
                                <option value="Najnowsze">Najnowsze</option>
                                <option value="Malejąco">Od najlepszej</option>
                                <option value="Rosnąco">Od najgorszej</option>                                                    
                            </select>
                        </form> 
                    </div>';
if (isset(filter_input_array(INPUT_POST)['sort']) && filter_input_array(INPUT_POST)['sort'] === 'Malejąco' && $status == 1 && !isset(filter_input_array(INPUT_POST)['sort2']) && !isset(filter_input_array(INPUT_POST)['sort1']) && !isset(filter_input_array(INPUT_POST)['sort3']) && !isset(filter_input_array(INPUT_POST)['sort4'])) { // sortowanie opinii
    $contentLOG .= $sortBest;
}
if (isset(filter_input_array(INPUT_POST)['sort']) && filter_input_array(INPUT_POST)['sort'] === 'Rosnąco' && $status == 1 && !isset(filter_input_array(INPUT_POST)['sort2']) && !isset(filter_input_array(INPUT_POST)['sort1']) && !isset(filter_input_array(INPUT_POST)['sort3']) && !isset(filter_input_array(INPUT_POST)['sort4'])) {
    $contentLOG .= $sortWorst;
}
if (isset(filter_input_array(INPUT_POST)['sort']) && filter_input_array(INPUT_POST)['sort'] === 'Najnowsze' && $status == 1 && !isset(filter_input_array(INPUT_POST)['sort2']) && !isset(filter_input_array(INPUT_POST)['sort1']) && !isset(filter_input_array(INPUT_POST)['sort3']) && !isset(filter_input_array(INPUT_POST)['sort4'])) {
    $contentLOG .= $reviews;
}
if (!isset(filter_input_array(INPUT_POST)['sort']) && $status == 1 && !isset(filter_input_array(INPUT_POST)['sort2']) && !isset(filter_input_array(INPUT_POST)['sort1']) && !isset(filter_input_array(INPUT_POST)['sort3']) && !isset(filter_input_array(INPUT_POST)['sort4'])) {
    $contentLOG .= $reviews;
}
if (isset(filter_input_array(INPUT_POST)['sort1']) && filter_input_array(INPUT_POST)['sort1'] === 'Malejąco' && $status == 1 && !isset(filter_input_array(INPUT_POST)['sort'])) { 
    $contentLOG .= $sortBestResolution;
}
if (isset(filter_input_array(INPUT_POST)['sort1']) && filter_input_array(INPUT_POST)['sort1'] === 'Rosnąco' && $status == 1 && !isset(filter_input_array(INPUT_POST)['sort'])) {
    $contentLOG .= $sortWorstResolution;
}
if (isset(filter_input_array(INPUT_POST)['sort2']) && filter_input_array(INPUT_POST)['sort2'] === 'Malejąco' && $status == 1 && !isset(filter_input_array(INPUT_POST)['sort'])) { 
    $contentLOG .= $sortBestControl;
}
if (isset(filter_input_array(INPUT_POST)['sort2']) && filter_input_array(INPUT_POST)['sort2'] === 'Rosnąco' && $status == 1 && !isset(filter_input_array(INPUT_POST)['sort'])) {
    $contentLOG .= $sortWorstControl;
}
if (isset(filter_input_array(INPUT_POST)['sort3']) && filter_input_array(INPUT_POST)['sort3'] === 'Malejąco' && $status == 1 && !isset(filter_input_array(INPUT_POST)['sort'])) {
    $contentLOG .= $sortBestZoom;
}
if (isset(filter_input_array(INPUT_POST)['sort3']) && filter_input_array(INPUT_POST)['sort3'] === 'Rosnąco' && $status == 1 && !isset(filter_input_array(INPUT_POST)['sort'])) {
    $contentLOG .= $sortWorstZoom;
}
if (isset(filter_input_array(INPUT_POST)['sort4']) && filter_input_array(INPUT_POST)['sort4'] === 'Malejąco' && $status == 1 && !isset(filter_input_array(INPUT_POST)['sort'])) { 
    $contentLOG .= $sortBestMatrix;
}
if (isset(filter_input_array(INPUT_POST)['sort4']) && filter_input_array(INPUT_POST)['sort4'] === 'Rosnąco' && $status == 1 && !isset(filter_input_array(INPUT_POST)['sort'])) {
    $contentLOG .= $sortWorstMatrix;
}
$content = '
                        <h2>Aparaty i kamery</h2><br>                     
                        
                    <div class="textLeft" >   
                            <form method="post">
                                <select name="sort1" class="sortSelectCameras" onchange="this.form.submit()">
                                    <option selected disabled hidden>Sortuj po jakości zdjęć:</option>
                                    <option value="Malejąco">Od najlepszej</option>
                                    <option value="Rosnąco">Od najgorszej</option>                                                    
                                </select>
                            </form> 
                        </div>
                        <div class="textLeft" >   
                            <form method="post">
                                <select name="sort2" class="sortSelectCameras" onchange="this.form.submit()">
                                    <option selected disabled hidden>Sortuj po funkcjonalności:</option>
                                    <option value="Malejąco">Od najlepszej</option>
                                    <option value="Rosnąco">Od najgorszej</option>                                                    
                                </select>
                            </form> 
                        </div>
              
                        <div class="textLeft" >   
                            <form method="post">
                                <select name="sort3" class="sortSelectCameras" onchange="this.form.submit()">
                                    <option selected disabled hidden>Sortuj po wyglądzie:</option>
                                    <option value="Malejąco">Od najlepszej</option>
                                    <option value="Rosnąco">Od najgorszej</option>                                                    
                                </select>
                            </form> 
                        </div>
                        <div class="textLeft" >   
                            <form method="post">
                                <select name="sort4" class="sortSelectCameras" onchange="this.form.submit()">
                                    <option selected disabled hidden>Sortuj po baterii:</option>
                                    <option value="Malejąco">Od najlepszej</option>
                                    <option value="Rosnąco">Od najgorszej</option>                                                    
                                </select>
                            </form> 
                        </div>
                        <div class="textRight">   
                        <form method="post">
                            <select name="sort" class="sortSelectShort" onchange="this.form.submit()">
                                <option selected disabled hidden>Sortuj opinie:</option>
                                <option value="Najnowsze">Najnowsze</option>
                                <option value="Malejąco">Od najlepszej</option>
                                <option value="Rosnąco">Od najgorszej</option>                                                    
                            </select>
                        </form> 
                    </div>';
if (isset(filter_input_array(INPUT_POST)['sort']) && filter_input_array(INPUT_POST)['sort'] === 'Malejąco' && !isset(filter_input_array(INPUT_POST)['sort2']) && !isset(filter_input_array(INPUT_POST)['sort1']) && !isset(filter_input_array(INPUT_POST)['sort3']) && !isset(filter_input_array(INPUT_POST)['sort4'])) { // sortowanie opinii
    $content .= $sortBest;
}
if (isset(filter_input_array(INPUT_POST)['sort']) && filter_input_array(INPUT_POST)['sort'] === 'Rosnąco' && !isset(filter_input_array(INPUT_POST)['sort2']) && !isset(filter_input_array(INPUT_POST)['sort1']) && !isset(filter_input_array(INPUT_POST)['sort3']) && !isset(filter_input_array(INPUT_POST)['sort4'])) {
    $content .= $sortWorst;
}
if (isset(filter_input_array(INPUT_POST)['sort']) && filter_input_array(INPUT_POST)['sort'] === 'Najnowsze' && !isset(filter_input_array(INPUT_POST)['sort2']) && !isset(filter_input_array(INPUT_POST)['sort1']) && !isset(filter_input_array(INPUT_POST)['sort3']) && !isset(filter_input_array(INPUT_POST)['sort4'])) {
    $content .= $reviews;
}
if (!isset(filter_input_array(INPUT_POST)['sort']) && !isset(filter_input_array(INPUT_POST)['sort2']) && !isset(filter_input_array(INPUT_POST)['sort1']) && !isset(filter_input_array(INPUT_POST)['sort3']) && !isset(filter_input_array(INPUT_POST)['sort4'])) {
    $content .= $reviews;
}
if (isset(filter_input_array(INPUT_POST)['sort1']) && filter_input_array(INPUT_POST)['sort1'] === 'Malejąco' && !isset(filter_input_array(INPUT_POST)['sort'])) { 
    $content .= $sortBestResolution;
}
if (isset(filter_input_array(INPUT_POST)['sort1']) && filter_input_array(INPUT_POST)['sort1'] === 'Rosnąco' && !isset(filter_input_array(INPUT_POST)['sort'])) {
    $content .= $sortWorstResolution;
}
if (isset(filter_input_array(INPUT_POST)['sort2']) && filter_input_array(INPUT_POST)['sort2'] === 'Malejąco' && !isset(filter_input_array(INPUT_POST)['sort'])) { 
    $content .= $sortBestControl;
}
if (isset(filter_input_array(INPUT_POST)['sort2']) && filter_input_array(INPUT_POST)['sort2'] === 'Rosnąco' && !isset(filter_input_array(INPUT_POST)['sort'])) {
    $content .= $sortWorstControl;
}
if (isset(filter_input_array(INPUT_POST)['sort3']) && filter_input_array(INPUT_POST)['sort3'] === 'Malejąco' && !isset(filter_input_array(INPUT_POST)['sort'])) {
    $content .= $sortBestZoom;
}
if (isset(filter_input_array(INPUT_POST)['sort3']) && filter_input_array(INPUT_POST)['sort3'] === 'Rosnąco' && !isset(filter_input_array(INPUT_POST)['sort'])) {
    $content .= $sortWorstZoom;
}
if (isset(filter_input_array(INPUT_POST)['sort4']) && filter_input_array(INPUT_POST)['sort4'] === 'Malejąco' && !isset(filter_input_array(INPUT_POST)['sort'])) { 
    $content .= $sortBestMatrix;
}
if (isset(filter_input_array(INPUT_POST)['sort4']) && filter_input_array(INPUT_POST)['sort4'] === 'Rosnąco' && !isset(filter_input_array(INPUT_POST)['sort'])) {
    $content .= $sortWorstMatrix;
}
                        
$contentAdmin = '                     
                        <h2>Aparaty i kamery</h2><br>                       
                        
                    <div class="textLeft" >   
                            <form method="post">
                                <select name="sort1" class="sortSelectCameras" onchange="this.form.submit()">
                                    <option selected disabled hidden>Sortuj po jakości zdjęć:</option>
                                    <option value="Malejąco">Od najlepszej</option>
                                    <option value="Rosnąco">Od najgorszej</option>                                                    
                                </select>
                            </form> 
                        </div>
                        <div class="textLeft" >   
                            <form method="post">
                                <select name="sort2" class="sortSelectCameras" onchange="this.form.submit()">
                                    <option selected disabled hidden>Sortuj po funkcjonalności:</option>
                                    <option value="Malejąco">Od najlepszej</option>
                                    <option value="Rosnąco">Od najgorszej</option>                                                    
                                </select>
                            </form> 
                        </div>
             
                        <div class="textLeft" >   
                            <form method="post">
                                <select name="sort3" class="sortSelectCameras" onchange="this.form.submit()">
                                    <option selected disabled hidden>Sortuj po wyglądzie:</option>
                                    <option value="Malejąco">Od najlepszej</option>
                                    <option value="Rosnąco">Od najgorszej</option>                                                    
                                </select>
                            </form> 
                        </div>
                        <div class="textLeft" >   
                            <form method="post">
                                <select name="sort4" class="sortSelectCameras" onchange="this.form.submit()">
                                    <option selected disabled hidden>Sortuj po baterii:</option>
                                    <option value="Malejąco">Od najlepszej</option>
                                    <option value="Rosnąco">Od najgorszej</option>                                                    
                                </select>
                            </form> 
                        </div>
                        <div class="textRight">   
                        <form method="post">
                            <select name="sort" class="sortSelectShort" onchange="this.form.submit()">
                                <option selected disabled hidden>Sortuj opinie:</option>
                                <option value="Najnowsze">Najnowsze</option>
                                <option value="Malejąco">Od najlepszej</option>
                                <option value="Rosnąco">Od najgorszej</option>                                                    
                            </select>
                        </form> 
                    </div>';
if (isset(filter_input_array(INPUT_POST)['sort']) && filter_input_array(INPUT_POST)['sort'] === 'Malejąco' && $status == 2 && !isset(filter_input_array(INPUT_POST)['sort2']) && !isset(filter_input_array(INPUT_POST)['sort1']) && !isset(filter_input_array(INPUT_POST)['sort3']) && !isset(filter_input_array(INPUT_POST)['sort4']) && !isset(filter_input_array(INPUT_POST)['search'])) { // sortowanie opinii
    $contentAdmin .= $sortBestAdmin;
}
if (isset(filter_input_array(INPUT_POST)['sort']) && filter_input_array(INPUT_POST)['sort'] === 'Rosnąco' && $status == 2 && !isset(filter_input_array(INPUT_POST)['sort2']) && !isset(filter_input_array(INPUT_POST)['sort1']) && !isset(filter_input_array(INPUT_POST)['sort3']) && !isset(filter_input_array(INPUT_POST)['sort4']) && !isset(filter_input_array(INPUT_POST)['search'])) {
    $contentAdmin .= $sortWorstAdmin;
}
if (isset(filter_input_array(INPUT_POST)['sort']) && filter_input_array(INPUT_POST)['sort'] === 'Najnowsze' && $status == 2 && !isset(filter_input_array(INPUT_POST)['sort2']) && !isset(filter_input_array(INPUT_POST)['sort1']) && !isset(filter_input_array(INPUT_POST)['sort3']) && !isset(filter_input_array(INPUT_POST)['sort4']) && !isset(filter_input_array(INPUT_POST)['search'])) {
    $contentAdmin .= $reviewsAdmin;
}
if (!isset(filter_input_array(INPUT_POST)['sort']) && $status == 2 && !isset(filter_input_array(INPUT_POST)['sort2']) && !isset(filter_input_array(INPUT_POST)['sort1']) && !isset(filter_input_array(INPUT_POST)['sort3']) && !isset(filter_input_array(INPUT_POST)['sort4']) && !isset(filter_input_array(INPUT_POST)['search'])) {
    $contentAdmin .= $reviewsAdmin;
}
if (isset(filter_input_array(INPUT_POST)['sort1']) && filter_input_array(INPUT_POST)['sort1'] === 'Malejąco' && $status == 2 && !isset(filter_input_array(INPUT_POST)['sort']) && !isset(filter_input_array(INPUT_POST)['search'])) {
    $contentAdmin .= $sortBestCameraAdmin;
}
if (isset(filter_input_array(INPUT_POST)['sort1']) && filter_input_array(INPUT_POST)['sort1'] === 'Rosnąco' && $status == 2 && !isset(filter_input_array(INPUT_POST)['sort']) && !isset(filter_input_array(INPUT_POST)['search'])) {
    $contentAdmin .= $sortWorstCameraAdmin;
}
if (isset(filter_input_array(INPUT_POST)['sort2']) && filter_input_array(INPUT_POST)['sort2'] === 'Malejąco' && $status == 2 && !isset(filter_input_array(INPUT_POST)['sort']) && !isset(filter_input_array(INPUT_POST)['search'])) {
    $contentAdmin .= $sortBestBatteryAdmin;
}
if (isset(filter_input_array(INPUT_POST)['sort2']) && filter_input_array(INPUT_POST)['sort2'] === 'Rosnąco' && $status == 2 && !isset(filter_input_array(INPUT_POST)['sort']) && !isset(filter_input_array(INPUT_POST)['search'])) {
    $contentAdmin .= $sortWorstBatteryAdmin;
}
if (isset(filter_input_array(INPUT_POST)['sort3']) && filter_input_array(INPUT_POST)['sort3'] === 'Malejąco' && $status == 2 && !isset(filter_input_array(INPUT_POST)['sort']) && !isset(filter_input_array(INPUT_POST)['search'])) {
    $contentAdmin .= $sortBestFunctionAdmin;
}
if (isset(filter_input_array(INPUT_POST)['sort3']) && filter_input_array(INPUT_POST)['sort3'] === 'Rosnąco' && $status == 2 && !isset(filter_input_array(INPUT_POST)['sort']) && !isset(filter_input_array(INPUT_POST)['search'])) {
    $contentAdmin .= $sortWorstFunctionAdmin;
}
if (isset(filter_input_array(INPUT_POST)['sort4']) && filter_input_array(INPUT_POST)['sort4'] === 'Malejąco' && $status == 2 && !isset(filter_input_array(INPUT_POST)['sort']) && !isset(filter_input_array(INPUT_POST)['search'])) {
    $contentAdmin .= $sortBestLookAdmin;
}
if (isset(filter_input_array(INPUT_POST)['sort4']) && filter_input_array(INPUT_POST)['sort4'] === 'Rosnąco' && $status == 2 && !isset(filter_input_array(INPUT_POST)['sort']) && !isset(filter_input_array(INPUT_POST)['search'])) {
    $contentAdmin .= $sortWorstLookAdmin;
}