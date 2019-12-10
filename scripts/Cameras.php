<?php

$title = "Aparaty i kamery";

include_once 'class/database.php';
$db = new Database("localhost", "root", "", "opinius");

$reviews = $db->displayReviews("SELECT r.`id-reviews`, name, category, brand, nick, review , star, star2, star3, star4, image FROM `parameters-items` p JOIN reviews r ON `r`.`id-reviews` = p.`id-reviews` JOIN users u ON `u`.`id` = `r`.`id-users` JOIN items i ON `i`.`id-items` = `r`.`id-items` JOIN manufacturers m ON `m`.`id-manufacturers` = `i`.`id-manufacturers` JOIN categories c ON `c`.`id-categories` = `m`.`id-categories` WHERE category= 'Aparaty i kamery' ORDER BY r.`id-reviews`  DESC"  , array("id-reviews", "nick", "name", "category", "brand", "review", "star", "star2", "star3", "star4", "image"));
$reviewsAdmin = $db->selectAdmin("SELECT r.`id-reviews`, name, category, brand, nick, review , star, star2, star3, star4, image FROM `parameters-items` p JOIN reviews r ON `r`.`id-reviews` = p.`id-reviews` JOIN users u ON `u`.`id` = `r`.`id-users` JOIN items i ON `i`.`id-items` = `r`.`id-items` JOIN manufacturers m ON `m`.`id-manufacturers` = `i`.`id-manufacturers` JOIN categories c ON `c`.`id-categories` = `m`.`id-categories` WHERE category= 'Aparaty i kamery' ORDER BY r.`id-reviews`  DESC"  , array("id-reviews", "nick", "name", "category", "brand", "review", "star", "star2", "star3", "star4", "image"));
$status = $db->select("SELECT status from users u JOIN logged_in_users l ON u.id = l.userId", array("status")); // dodane aby funkcja unset działała tylko na odpowiednim statusie użytkownika       
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
                                <select name="sortResolution" class="sortSelectCameras" onchange="this.form.submit()">
                                    <option selected disabled hidden>Sortuj po jakości zdjęć:</option>
                                    <option value="Malejąco">Od najlepszej</option>
                                    <option value="Rosnąco">Od najgorszej</option>                                                    
                                </select>
                            </form> 
                        </div>
                        <div class="textLeft" >   
                            <form method="post">
                                <select name="sortControl" class="sortSelectCameras" onchange="this.form.submit()">
                                    <option selected disabled hidden>Sortuj po funkcjonalności:</option>
                                    <option value="Malejąco">Od najlepszej</option>
                                    <option value="Rosnąco">Od najgorszej</option>                                                    
                                </select>
                            </form> 
                        </div>
          
                        <div class="textLeft" >   
                            <form method="post">
                                <select name="sortZoom" class="sortSelectCameras" onchange="this.form.submit()">
                                    <option selected disabled hidden>Sortuj po wyglądzie:</option>
                                    <option value="Malejąco">Od najlepszej</option>
                                    <option value="Rosnąco">Od najgorszej</option>                                                    
                                </select>
                            </form> 
                        </div>
                        <div class="textLeft" >   
                            <form method="post">
                                <select name="sortMatrix" class="sortSelectCameras" onchange="this.form.submit()">
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
if (isset($_POST['sort']) && $_POST['sort'] === 'Malejąco' && $status == 1 && !isset($_POST['sortControl']) && !isset($_POST['sortResolution']) && !isset($_POST['sortZoom']) && !isset($_POST['sortMatrix'])) { // sortowanie opinii
    $contentLOG .= $sortBest;
}
if (isset($_POST['sort']) && $_POST['sort'] === 'Rosnąco' && $status == 1 && !isset($_POST['sortControl']) && !isset($_POST['sortResolution']) && !isset($_POST['sortZoom']) && !isset($_POST['sortMatrix'])) {
    $contentLOG .= $sortWorst;
}
if (isset($_POST['sort']) && $_POST['sort'] === 'Najnowsze' && $status == 1 && !isset($_POST['sortControl']) && !isset($_POST['sortResolution']) && !isset($_POST['sortZoom']) && !isset($_POST['sortMatrix'])) {
    $contentLOG .= $reviews;
}
if (!isset($_POST['sort']) && $status == 1 && !isset($_POST['sortControl']) && !isset($_POST['sortResolution']) && !isset($_POST['sortZoom']) && !isset($_POST['sortMatrix'])) {
    $contentLOG .= $reviews;
}
if (isset($_POST['sortResolution']) && $_POST['sortResolution'] === 'Malejąco' && $status == 1 && !isset($_POST['sort'])) { 
    $contentLOG .= $sortBestResolution;
}
if (isset($_POST['sortResolution']) && $_POST['sortResolution'] === 'Rosnąco' && $status == 1 && !isset($_POST['sort'])) {
    $contentLOG .= $sortWorstResolution;
}
if (isset($_POST['sortControl']) && $_POST['sortControl'] === 'Malejąco' && $status == 1 && !isset($_POST['sort'])) { 
    $contentLOG .= $sortBestControl;
}
if (isset($_POST['sortControl']) && $_POST['sortControl'] === 'Rosnąco' && $status == 1 && !isset($_POST['sort'])) {
    $contentLOG .= $sortWorstControl;
}
if (isset($_POST['sortZoom']) && $_POST['sortZoom'] === 'Malejąco' && $status == 1 && !isset($_POST['sort'])) {
    $contentLOG .= $sortBestZoom;
}
if (isset($_POST['sortZoom']) && $_POST['sortZoom'] === 'Rosnąco' && $status == 1 && !isset($_POST['sort'])) {
    $contentLOG .= $sortWorstZoom;
}
if (isset($_POST['sortMatrix']) && $_POST['sortMatrix'] === 'Malejąco' && $status == 1 && !isset($_POST['sort'])) { 
    $contentLOG .= $sortBestMatrix;
}
if (isset($_POST['sortMatrix']) && $_POST['sortMatrix'] === 'Rosnąco' && $status == 1 && !isset($_POST['sort'])) {
    $contentLOG .= $sortWorstMatrix;
}
$content = '
                        <h2>Aparaty i kamery</h2><br>                     
                        
                    <div class="textLeft" >   
                            <form method="post">
                                <select name="sortResolution" class="sortSelectCameras" onchange="this.form.submit()">
                                    <option selected disabled hidden>Sortuj po jakości zdjęć:</option>
                                    <option value="Malejąco">Od najlepszej</option>
                                    <option value="Rosnąco">Od najgorszej</option>                                                    
                                </select>
                            </form> 
                        </div>
                        <div class="textLeft" >   
                            <form method="post">
                                <select name="sortControl" class="sortSelectCameras" onchange="this.form.submit()">
                                    <option selected disabled hidden>Sortuj po funkcjonalności:</option>
                                    <option value="Malejąco">Od najlepszej</option>
                                    <option value="Rosnąco">Od najgorszej</option>                                                    
                                </select>
                            </form> 
                        </div>
              
                        <div class="textLeft" >   
                            <form method="post">
                                <select name="sortZoom" class="sortSelectCameras" onchange="this.form.submit()">
                                    <option selected disabled hidden>Sortuj po wyglądzie:</option>
                                    <option value="Malejąco">Od najlepszej</option>
                                    <option value="Rosnąco">Od najgorszej</option>                                                    
                                </select>
                            </form> 
                        </div>
                        <div class="textLeft" >   
                            <form method="post">
                                <select name="sortMatrix" class="sortSelectCameras" onchange="this.form.submit()">
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
if (isset($_POST['sort']) && $_POST['sort'] === 'Malejąco' && !isset($_POST['sortControl']) && !isset($_POST['sortResolution']) && !isset($_POST['sortZoom']) && !isset($_POST['sortMatrix'])) { // sortowanie opinii
    $content .= $sortBest;
}
if (isset($_POST['sort']) && $_POST['sort'] === 'Rosnąco' && !isset($_POST['sortControl']) && !isset($_POST['sortResolution']) && !isset($_POST['sortZoom']) && !isset($_POST['sortMatrix'])) {
    $content .= $sortWorst;
}
if (isset($_POST['sort']) && $_POST['sort'] === 'Najnowsze' && !isset($_POST['sortControl']) && !isset($_POST['sortResolution']) && !isset($_POST['sortZoom']) && !isset($_POST['sortMatrix'])) {
    $content .= $reviews;
}
if (!isset($_POST['sort']) && !isset($_POST['sortControl']) && !isset($_POST['sortResolution']) && !isset($_POST['sortZoom']) && !isset($_POST['sortMatrix'])) {
    $content .= $reviews;
}
if (isset($_POST['sortResolution']) && $_POST['sortResolution'] === 'Malejąco' && !isset($_POST['sort'])) { 
    $content .= $sortBestResolution;
}
if (isset($_POST['sortResolution']) && $_POST['sortResolution'] === 'Rosnąco' && !isset($_POST['sort'])) {
    $content .= $sortWorstResolution;
}
if (isset($_POST['sortControl']) && $_POST['sortControl'] === 'Malejąco' && !isset($_POST['sort'])) { 
    $content .= $sortBestControl;
}
if (isset($_POST['sortControl']) && $_POST['sortControl'] === 'Rosnąco' && !isset($_POST['sort'])) {
    $content .= $sortWorstControl;
}
if (isset($_POST['sortZoom']) && $_POST['sortZoom'] === 'Malejąco' && !isset($_POST['sort'])) {
    $content .= $sortBestZoom;
}
if (isset($_POST['sortZoom']) && $_POST['sortZoom'] === 'Rosnąco' && !isset($_POST['sort'])) {
    $content .= $sortWorstZoom;
}
if (isset($_POST['sortMatrix']) && $_POST['sortMatrix'] === 'Malejąco' && !isset($_POST['sort'])) { 
    $content .= $sortBestMatrix;
}
if (isset($_POST['sortMatrix']) && $_POST['sortMatrix'] === 'Rosnąco' && !isset($_POST['sort'])) {
    $content .= $sortWorstMatrix;
}
                        
$contentAdmin = '                     
                        <h2>Aparaty i kamery</h2><br>                       
                        
                    <div class="textLeft" >   
                            <form method="post">
                                <select name="sortResolution" class="sortSelectCameras" onchange="this.form.submit()">
                                    <option selected disabled hidden>Sortuj po jakości zdjęć:</option>
                                    <option value="Malejąco">Od najlepszej</option>
                                    <option value="Rosnąco">Od najgorszej</option>                                                    
                                </select>
                            </form> 
                        </div>
                        <div class="textLeft" >   
                            <form method="post">
                                <select name="sortControl" class="sortSelectCameras" onchange="this.form.submit()">
                                    <option selected disabled hidden>Sortuj po funkcjonalności:</option>
                                    <option value="Malejąco">Od najlepszej</option>
                                    <option value="Rosnąco">Od najgorszej</option>                                                    
                                </select>
                            </form> 
                        </div>
             
                        <div class="textLeft" >   
                            <form method="post">
                                <select name="sortZoom" class="sortSelectCameras" onchange="this.form.submit()">
                                    <option selected disabled hidden>Sortuj po wyglądzie:</option>
                                    <option value="Malejąco">Od najlepszej</option>
                                    <option value="Rosnąco">Od najgorszej</option>                                                    
                                </select>
                            </form> 
                        </div>
                        <div class="textLeft" >   
                            <form method="post">
                                <select name="sortMatrix" class="sortSelectCameras" onchange="this.form.submit()">
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
if (isset($_POST['sort']) && $_POST['sort'] === 'Malejąco' && $status == 2 && !isset($_POST['sortControl']) && !isset($_POST['sortResolution']) && !isset($_POST['sortZoom']) && !isset($_POST['sortMatrix'])) { // sortowanie opinii
    $contentAdmin .= $sortBest;
}
if (isset($_POST['sort']) && $_POST['sort'] === 'Rosnąco' && $status == 2 && !isset($_POST['sortControl']) && !isset($_POST['sortResolution']) && !isset($_POST['sortZoom']) && !isset($_POST['sortMatrix'])) {
    $contentAdmin .= $sortWorst;
}
if (isset($_POST['sort']) && $_POST['sort'] === 'Najnowsze' && $status == 2 && !isset($_POST['sortControl']) && !isset($_POST['sortResolution']) && !isset($_POST['sortZoom']) && !isset($_POST['sortMatrix'])) {
    $contentAdmin .= $reviews;
}
if (!isset($_POST['sort']) && $status == 2 && !isset($_POST['sortControl']) && !isset($_POST['sortResolution']) && !isset($_POST['sortZoom']) && !isset($_POST['sortMatrix'])) {
    $contentAdmin .= $reviews;
}
if (isset($_POST['sortResolution']) && $_POST['sortResolution'] === 'Malejąco' && $status == 2 && !isset($_POST['sort'])) { 
    $contentAdmin .= $sortBestResolution;
}
if (isset($_POST['sortResolution']) && $_POST['sortResolution'] === 'Rosnąco' && $status == 2 && !isset($_POST['sort'])) {
    $contentAdmin .= $sortWorstResolution;
}
if (isset($_POST['sortControl']) && $_POST['sortControl'] === 'Malejąco' && $status == 2 && !isset($_POST['sort'])) { 
    $contentAdmin .= $sortBestControl;
}
if (isset($_POST['sortControl']) && $_POST['sortControl'] === 'Rosnąco' && $status == 2 && !isset($_POST['sort'])) {
    $contentAdmin .= $sortWorstControl;
}
if (isset($_POST['sortZoom']) && $_POST['sortZoom'] === 'Malejąco' && $status == 2 && !isset($_POST['sort'])) {
    $contentAdmin .= $sortBestZoom;
}
if (isset($_POST['sortZoom']) && $_POST['sortZoom'] === 'Rosnąco' && $status == 2 && !isset($_POST['sort'])) {
    $contentAdmin .= $sortWorstZoom;
}
if (isset($_POST['sortMatrix']) && $_POST['sortMatrix'] === 'Malejąco' && $status == 2 && !isset($_POST['sort'])) { 
    $contentAdmin .= $sortBestMatrix;
}
if (isset($_POST['sortMatrix']) && $_POST['sortMatrix'] === 'Rosnąco' && $status == 2 && !isset($_POST['sort'])) {
    $contentAdmin .= $sortWorstMatrix;
}