<?php

$title = "Podzespoły";

include_once 'class/database.php';
$db = new Database("localhost", "root", "", "opinius");

$reviews = $db->displayReviews("SELECT r.`id-reviews`, name, category, brand, nick, review , star, star2, star3, star4, image FROM `parameters-items` p JOIN reviews r ON `r`.`id-reviews` = p.`id-reviews` JOIN users u ON `u`.`id` = `r`.`id-users` JOIN items i ON `i`.`id-items` = `r`.`id-items` JOIN manufacturers m ON `m`.`id-manufacturers` = `i`.`id-manufacturers` JOIN categories c ON `c`.`id-categories` = `m`.`id-categories` WHERE category= 'Podzespoły' ORDER BY r.`id-reviews`  DESC"  , array("id-reviews", "nick", "name", "category", "brand", "review", "star", "star2", "star3", "star4", "image"));
$reviewsAdmin = $db->selectAdmin("SELECT r.`id-reviews`, name, category, brand, nick, review , star, star2, star3, star4, image FROM `parameters-items` p JOIN reviews r ON `r`.`id-reviews` = p.`id-reviews` JOIN users u ON `u`.`id` = `r`.`id-users` JOIN items i ON `i`.`id-items` = `r`.`id-items` JOIN manufacturers m ON `m`.`id-manufacturers` = `i`.`id-manufacturers` JOIN categories c ON `c`.`id-categories` = `m`.`id-categories` WHERE category= 'Podzespoły' ORDER BY r.`id-reviews`  DESC"  , array("id-reviews", "nick", "name", "category", "brand", "review", "star", "star2", "star3", "star4", "image"));
$status = $db->select("SELECT status from users u JOIN logged_in_users l ON u.id = l.userId", array("status")); // dodane aby funkcja unset działała tylko na odpowiednim statusie użytkownika       
$sortBest = $db->displayReviews("SELECT r.`id-reviews`, name, category, brand, nick, review , star, star2, star3, star4, image FROM `parameters-items` p JOIN reviews r ON `r`.`id-reviews` = p.`id-reviews` JOIN users u ON `u`.`id` = `r`.`id-users` JOIN items i ON `i`.`id-items` = `r`.`id-items` JOIN manufacturers m ON `m`.`id-manufacturers` = `i`.`id-manufacturers` JOIN categories c ON `c`.`id-categories` = `m`.`id-categories` WHERE category= 'Podzespoły' ORDER BY (star+star2+star3+star4)/4 DESC", array("id-reviews", "nick", "name", "category", "brand", "review", "star", "star2", "star3", "star4", "image"));
$sortWorst = $db->displayReviews("SELECT r.`id-reviews`, name, category, brand, nick, review , star, star2, star3, star4, image FROM `parameters-items` p JOIN reviews r ON `r`.`id-reviews` = p.`id-reviews` JOIN users u ON `u`.`id` = `r`.`id-users` JOIN items i ON `i`.`id-items` = `r`.`id-items` JOIN manufacturers m ON `m`.`id-manufacturers` = `i`.`id-manufacturers` JOIN categories c ON `c`.`id-categories` = `m`.`id-categories` WHERE category= 'Podzespoły' ORDER BY (star+star2+star3+star4)/4", array("id-reviews", "nick", "name", "category", "brand", "review", "star", "star2", "star3", "star4", "image"));
$sortBestAdmin = $db->selectAdmin("SELECT r.`id-reviews`, name, category, brand, nick, review , star, star2, star3, star4, image FROM `parameters-items` p JOIN reviews r ON `r`.`id-reviews` = p.`id-reviews` JOIN users u ON `u`.`id` = `r`.`id-users` JOIN items i ON `i`.`id-items` = `r`.`id-items` JOIN manufacturers m ON `m`.`id-manufacturers` = `i`.`id-manufacturers` JOIN categories c ON `c`.`id-categories` = `m`.`id-categories` WHERE category= 'Podzespoły' ORDER BY (star+star2+star3+star4)/4 DESC", array("id-reviews", "nick", "name", "category", "brand", "review", "star", "star2", "star3", "star4", "image"));
$sortWorstAdmin = $db->selectAdmin("SELECT r.`id-reviews`, name, category, brand, nick, review , star, star2, star3, star4, image FROM `parameters-items` p JOIN reviews r ON `r`.`id-reviews` = p.`id-reviews` JOIN users u ON `u`.`id` = `r`.`id-users` JOIN items i ON `i`.`id-items` = `r`.`id-items` JOIN manufacturers m ON `m`.`id-manufacturers` = `i`.`id-manufacturers` JOIN categories c ON `c`.`id-categories` = `m`.`id-categories` WHERE category= 'Podzespoły' ORDER BY (star+star2+star3+star4)/4", array("id-reviews", "nick", "name", "category", "brand", "review", "star", "star2", "star3", "star4", "image"));
$sortBestSpeed = $db->displayReviews("SELECT r.`id-reviews`, name, category, brand, nick, review , star, star2, star3, star4, image FROM `parameters-items` p JOIN reviews r ON `r`.`id-reviews` = p.`id-reviews` JOIN users u ON `u`.`id` = `r`.`id-users` JOIN items i ON `i`.`id-items` = `r`.`id-items` JOIN manufacturers m ON `m`.`id-manufacturers` = `i`.`id-manufacturers` JOIN categories c ON `c`.`id-categories` = `m`.`id-categories` WHERE category= 'Podzespoły' ORDER BY star DESC", array("id-reviews", "nick", "name", "category", "brand", "review", "star", "star2", "star3", "star4", "image"));
$sortWorstSpeed = $db->displayReviews("SELECT r.`id-reviews`, name, category, brand, nick, review , star, star2, star3, star4, image FROM `parameters-items` p JOIN reviews r ON `r`.`id-reviews` = p.`id-reviews` JOIN users u ON `u`.`id` = `r`.`id-users` JOIN items i ON `i`.`id-items` = `r`.`id-items` JOIN manufacturers m ON `m`.`id-manufacturers` = `i`.`id-manufacturers` JOIN categories c ON `c`.`id-categories` = `m`.`id-categories` WHERE category= 'Podzespoły' ORDER BY star", array("id-reviews", "nick", "name", "category", "brand", "review", "star", "star2", "star3", "star4", "image"));
$sortBestTemperature = $db->displayReviews("SELECT r.`id-reviews`, name, category, brand, nick, review , star, star2, star3, star4, image FROM `parameters-items` p JOIN reviews r ON `r`.`id-reviews` = p.`id-reviews` JOIN users u ON `u`.`id` = `r`.`id-users` JOIN items i ON `i`.`id-items` = `r`.`id-items` JOIN manufacturers m ON `m`.`id-manufacturers` = `i`.`id-manufacturers` JOIN categories c ON `c`.`id-categories` = `m`.`id-categories` WHERE category= 'Podzespoły' ORDER BY star2 DESC", array("id-reviews", "nick", "name", "category", "brand", "review", "star", "star2", "star3", "star4", "image"));
$sortWorstTemperature = $db->displayReviews("SELECT r.`id-reviews`, name, category, brand, nick, review , star, star2, star3, star4, image FROM `parameters-items` p JOIN reviews r ON `r`.`id-reviews` = p.`id-reviews` JOIN users u ON `u`.`id` = `r`.`id-users` JOIN items i ON `i`.`id-items` = `r`.`id-items` JOIN manufacturers m ON `m`.`id-manufacturers` = `i`.`id-manufacturers` JOIN categories c ON `c`.`id-categories` = `m`.`id-categories` WHERE category= 'Podzespoły' ORDER BY star2", array("id-reviews", "nick", "name", "category", "brand", "review", "star", "star2", "star3", "star4", "image"));
$sortBestCompatible = $db->displayReviews("SELECT r.`id-reviews`, name, category, brand, nick, review , star, star2, star3, star4, image FROM `parameters-items` p JOIN reviews r ON `r`.`id-reviews` = p.`id-reviews` JOIN users u ON `u`.`id` = `r`.`id-users` JOIN items i ON `i`.`id-items` = `r`.`id-items` JOIN manufacturers m ON `m`.`id-manufacturers` = `i`.`id-manufacturers` JOIN categories c ON `c`.`id-categories` = `m`.`id-categories` WHERE category= 'Podzespoły' ORDER BY star3 DESC", array("id-reviews", "nick", "name", "category", "brand", "review", "star", "star2", "star3", "star4", "image"));
$sortWorstCompatible = $db->displayReviews("SELECT r.`id-reviews`, name, category, brand, nick, review , star, star2, star3, star4, image FROM `parameters-items` p JOIN reviews r ON `r`.`id-reviews` = p.`id-reviews` JOIN users u ON `u`.`id` = `r`.`id-users` JOIN items i ON `i`.`id-items` = `r`.`id-items` JOIN manufacturers m ON `m`.`id-manufacturers` = `i`.`id-manufacturers` JOIN categories c ON `c`.`id-categories` = `m`.`id-categories` WHERE category= 'Podzespoły' ORDER BY star3", array("id-reviews", "nick", "name", "category", "brand", "review", "star", "star2", "star3", "star4", "image"));
$sortBestAdditional = $db->displayReviews("SELECT r.`id-reviews`, name, category, brand, nick, review , star, star2, star3, star4, image FROM `parameters-items` p JOIN reviews r ON `r`.`id-reviews` = p.`id-reviews` JOIN users u ON `u`.`id` = `r`.`id-users` JOIN items i ON `i`.`id-items` = `r`.`id-items` JOIN manufacturers m ON `m`.`id-manufacturers` = `i`.`id-manufacturers` JOIN categories c ON `c`.`id-categories` = `m`.`id-categories` WHERE category= 'Podzespoły' ORDER BY star4 DESC", array("id-reviews", "nick", "name", "category", "brand", "review", "star", "star2", "star3", "star4", "image"));
$sortWorstAdditional = $db->displayReviews("SELECT r.`id-reviews`, name, category, brand, nick, review , star, star2, star3, star4, image FROM `parameters-items` p JOIN reviews r ON `r`.`id-reviews` = p.`id-reviews` JOIN users u ON `u`.`id` = `r`.`id-users` JOIN items i ON `i`.`id-items` = `r`.`id-items` JOIN manufacturers m ON `m`.`id-manufacturers` = `i`.`id-manufacturers` JOIN categories c ON `c`.`id-categories` = `m`.`id-categories` WHERE category= 'Podzespoły' ORDER BY star4", array("id-reviews", "nick", "name", "category", "brand", "review", "star", "star2", "star3", "star4", "image"));

$contentLOG = '                       
                        <h2>Podzespoły</h2><br>                       
                        
                    <div class="textLeft" >   
                            <form method="post">
                                <select name="sortSpeed" class="sortSelect" onchange="this.form.submit()">
                                    <option selected disabled hidden>Sortuj po wydajności:</option>
                                    <option value="Malejąco">Od najlepszej</option>
                                    <option value="Rosnąco">Od najgorszej</option>                                                    
                                </select>
                            </form> 
                        </div>
                        <div class="textLeft" >   
                            <form method="post">
                                <select name="sortTemperature" class="sortSelect" onchange="this.form.submit()">
                                    <option selected disabled hidden>Sortuj po wykonaniu:</option>
                                    <option value="Malejąco">Od najlepszej</option>
                                    <option value="Rosnąco">Od najgorszej</option>                                                    
                                </select>
                            </form> 
                        </div>
           
                        <div class="textLeft" >   
                            <form method="post">
                                <select name="sortCompatible" class="sortSelect" onchange="this.form.submit()">
                                    <option selected disabled hidden>Sortuj po kulturze pracy:</option>
                                    <option value="Malejąco">Od najlepszej</option>
                                    <option value="Rosnąco">Od najgorszej</option>                                                    
                                </select>
                            </form> 
                        </div>
                        <div class="textLeft" >   
                            <form method="post">
                                <select name="sortAdditional" class="sortSelect" onchange="this.form.submit()">
                                    <option selected disabled hidden>Sortuj po wyglądzie:</option>
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
if (isset($_POST['sort']) && $_POST['sort'] === 'Malejąco' && $status == 1 && !isset($_POST['sortTemperature']) && !isset($_POST['sortSpeed']) && !isset($_POST['sortCompatible']) && !isset($_POST['sortAdditional'])) { // sortowanie opinii
    $contentLOG .= $sortBest;
}
if (isset($_POST['sort']) && $_POST['sort'] === 'Rosnąco' && $status == 1 && !isset($_POST['sortTemperature']) && !isset($_POST['sortSpeed']) && !isset($_POST['sortCompatible']) && !isset($_POST['sortAdditional'])) {
    $contentLOG .= $sortWorst;
}
if (isset($_POST['sort']) && $_POST['sort'] === 'Najnowsze' && $status == 1 && !isset($_POST['sortTemperature']) && !isset($_POST['sortSpeed']) && !isset($_POST['sortCompatible']) && !isset($_POST['sortAdditional'])) {
    $contentLOG .= $reviews;
}
if (!isset($_POST['sort']) && $status == 1 && !isset($_POST['sortTemperature']) && !isset($_POST['sortSpeed']) && !isset($_POST['sortCompatible']) && !isset($_POST['sortAdditional'])) {
    $contentLOG .= $reviews;
}
if (isset($_POST['sortSpeed']) && $_POST['sortSpeed'] === 'Malejąco' && $status == 1 && !isset($_POST['sort'])) { 
    $contentLOG .= $sortBestSpeed;
}
if (isset($_POST['sortSpeed']) && $_POST['sortSpeed'] === 'Rosnąco' && $status == 1 && !isset($_POST['sort'])) {
    $contentLOG .= $sortWorstSpeed;
}
if (isset($_POST['sortTemperature']) && $_POST['sortTemperature'] === 'Malejąco' && $status == 1 && !isset($_POST['sort'])) { 
    $contentLOG .= $sortBestTemperature;
}
if (isset($_POST['sortTemperature']) && $_POST['sortTemperature'] === 'Rosnąco' && $status == 1 && !isset($_POST['sort'])) {
    $contentLOG .= $sortWorstTemperature;
}
if (isset($_POST['sortCompatible']) && $_POST['sortCompatible'] === 'Malejąco' && $status == 1 && !isset($_POST['sort'])) {
    $contentLOG .= $sortBestCompatible;
}
if (isset($_POST['sortCompatible']) && $_POST['sortCompatible'] === 'Rosnąco' && $status == 1 && !isset($_POST['sort'])) {
    $contentLOG .= $sortWorstCompatible;
}
if (isset($_POST['sortAdditional']) && $_POST['sortAdditional'] === 'Malejąco' && $status == 1 && !isset($_POST['sort'])) { 
    $contentLOG .= $sortBestAdditional;
}
if (isset($_POST['sortAdditional']) && $_POST['sortAdditional'] === 'Rosnąco' && $status == 1 && !isset($_POST['sort'])) {
    $contentLOG .= $sortWorstAdditional;
}
$content = '
                        <h2>Podzespoły</h2><br>                     
                        
                    <div class="textLeft" >   
                            <form method="post">
                                <select name="sortSpeed" class="sortSelect" onchange="this.form.submit()">
                                    <option selected disabled hidden>Sortuj po wydajności:</option>
                                    <option value="Malejąco">Od najlepszej</option>
                                    <option value="Rosnąco">Od najgorszej</option>                                                    
                                </select>
                            </form> 
                        </div>
                        <div class="textLeft" >   
                            <form method="post">
                                <select name="sortTemperature" class="sortSelect" onchange="this.form.submit()">
                                    <option selected disabled hidden>Sortuj po wykonaniu:</option>
                                    <option value="Malejąco">Od najlepszej</option>
                                    <option value="Rosnąco">Od najgorszej</option>                                                    
                                </select>
                            </form> 
                        </div>
                
                        <div class="textLeft" >   
                            <form method="post">
                                <select name="sortCompatible" class="sortSelect" onchange="this.form.submit()">
                                    <option selected disabled hidden>Sortuj po kulturze pracy:</option>
                                    <option value="Malejąco">Od najlepszej</option>
                                    <option value="Rosnąco">Od najgorszej</option>                                                    
                                </select>
                            </form> 
                        </div>
                        <div class="textLeft" >   
                            <form method="post">
                                <select name="sortAdditional" class="sortSelect" onchange="this.form.submit()">
                                    <option selected disabled hidden>Sortuj po wyglądzie:</option>
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
if (isset($_POST['sort']) && $_POST['sort'] === 'Malejąco' && !isset($_POST['sortTemperature']) && !isset($_POST['sortSpeed']) && !isset($_POST['sortCompatible']) && !isset($_POST['sortAdditional'])) { // sortowanie opinii
    $content .= $sortBest;
}
if (isset($_POST['sort']) && $_POST['sort'] === 'Rosnąco' && !isset($_POST['sortTemperature']) && !isset($_POST['sortSpeed']) && !isset($_POST['sortCompatible']) && !isset($_POST['sortAdditional'])) {
    $content .= $sortWorst;
}
if (isset($_POST['sort']) && $_POST['sort'] === 'Najnowsze' && !isset($_POST['sortTemperature']) && !isset($_POST['sortSpeed']) && !isset($_POST['sortCompatible']) && !isset($_POST['sortAdditional'])) {
    $content .= $reviews;
}
if (!isset($_POST['sort']) && !isset($_POST['sortTemperature']) && !isset($_POST['sortSpeed']) && !isset($_POST['sortCompatible']) && !isset($_POST['sortAdditional'])) {
    $content .= $reviews;
}
if (isset($_POST['sortSpeed']) && $_POST['sortSpeed'] === 'Malejąco' && !isset($_POST['sort'])) { 
    $content .= $sortBestSpeed;
}
if (isset($_POST['sortSpeed']) && $_POST['sortSpeed'] === 'Rosnąco' && !isset($_POST['sort'])) {
    $content .= $sortWorstSpeed;
}
if (isset($_POST['sortTemperature']) && $_POST['sortTemperature'] === 'Malejąco' && !isset($_POST['sort'])) { 
    $content .= $sortBestTemperature;
}
if (isset($_POST['sortTemperature']) && $_POST['sortTemperature'] === 'Rosnąco' && !isset($_POST['sort'])) {
    $content .= $sortWorstTemperature;
}
if (isset($_POST['sortCompatible']) && $_POST['sortCompatible'] === 'Malejąco' && !isset($_POST['sort'])) {
    $content .= $sortBestCompatible;
}
if (isset($_POST['sortCompatible']) && $_POST['sortCompatible'] === 'Rosnąco' && !isset($_POST['sort'])) {
    $content .= $sortWorstCompatible;
}
if (isset($_POST['sortAdditional']) && $_POST['sortAdditional'] === 'Malejąco' && !isset($_POST['sort'])) { 
    $content .= $sortBestAdditional;
}
if (isset($_POST['sortAdditional']) && $_POST['sortAdditional'] === 'Rosnąco' && !isset($_POST['sort'])) {
    $content .= $sortWorstAdditional;
}

                        
$contentAdmin = '                       
                        <h2>Podzespoły</h2><br>                       
                       
                    <div class="textLeft" >   
                            <form method="post">
                                <select name="sortSpeed" class="sortSelect" onchange="this.form.submit()">
                                    <option selected disabled hidden>Sortuj po wydajności:</option>
                                    <option value="Malejąco">Od najlepszej</option>
                                    <option value="Rosnąco">Od najgorszej</option>                                                    
                                </select>
                            </form> 
                        </div>
                        <div class="textLeft" >   
                            <form method="post">
                                <select name="sortTemperature" class="sortSelect" onchange="this.form.submit()">
                                    <option selected disabled hidden>Sortuj po wykonaniu:</option>
                                    <option value="Malejąco">Od najlepszej</option>
                                    <option value="Rosnąco">Od najgorszej</option>                                                    
                                </select>
                            </form> 
                        </div>
                  
                        <div class="textLeft" >   
                            <form method="post">
                                <select name="sortCompatible" class="sortSelect" onchange="this.form.submit()">
                                    <option selected disabled hidden>Sortuj po kulturze pracy:</option>
                                    <option value="Malejąco">Od najlepszej</option>
                                    <option value="Rosnąco">Od najgorszej</option>                                                    
                                </select>
                            </form> 
                        </div>
                        <div class="textLeft" >   
                            <form method="post">
                                <select name="sortAdditional" class="sortSelect" onchange="this.form.submit()">
                                    <option selected disabled hidden>Sortuj po wyglądzie:</option>
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
if (isset($_POST['sort']) && $_POST['sort'] === 'Malejąco' && $status == 2 && !isset($_POST['sortTemperature']) && !isset($_POST['sortSpeed']) && !isset($_POST['sortCompatible']) && !isset($_POST['sortAdditional'])) { // sortowanie opinii
    $contentAdmin .= $sortBest;
}
if (isset($_POST['sort']) && $_POST['sort'] === 'Rosnąco' && $status == 2 && !isset($_POST['sortTemperature']) && !isset($_POST['sortSpeed']) && !isset($_POST['sortCompatible']) && !isset($_POST['sortAdditional'])) {
    $contentAdmin .= $sortWorst;
}
if (isset($_POST['sort']) && $_POST['sort'] === 'Najnowsze' && $status == 2 && !isset($_POST['sortTemperature']) && !isset($_POST['sortSpeed']) && !isset($_POST['sortCompatible']) && !isset($_POST['sortAdditional'])) {
    $contentAdmin .= $reviews;
}
if (!isset($_POST['sort']) && $status == 2 && !isset($_POST['sortTemperature']) && !isset($_POST['sortSpeed']) && !isset($_POST['sortCompatible']) && !isset($_POST['sortAdditional'])) {
    $contentAdmin .= $reviews;
}
if (isset($_POST['sortSpeed']) && $_POST['sortSpeed'] === 'Malejąco' && $status == 2 && !isset($_POST['sort'])) { 
    $contentAdmin .= $sortBestSpeed;
}
if (isset($_POST['sortSpeed']) && $_POST['sortSpeed'] === 'Rosnąco' && $status == 2 && !isset($_POST['sort'])) {
    $contentAdmin .= $sortWorstSpeed;
}
if (isset($_POST['sortTemperature']) && $_POST['sortTemperature'] === 'Malejąco' && $status == 2 && !isset($_POST['sort'])) { 
    $contentAdmin .= $sortBestTemperature;
}
if (isset($_POST['sortTemperature']) && $_POST['sortTemperature'] === 'Rosnąco' && $status == 2 && !isset($_POST['sort'])) {
    $contentAdmin .= $sortWorstTemperature;
}
if (isset($_POST['sortCompatible']) && $_POST['sortCompatible'] === 'Malejąco' && $status == 2 && !isset($_POST['sort'])) {
    $contentAdmin .= $sortBestCompatible;
}
if (isset($_POST['sortCompatible']) && $_POST['sortCompatible'] === 'Rosnąco' && $status == 2 && !isset($_POST['sort'])) {
    $contentAdmin .= $sortWorstCompatible;
}
if (isset($_POST['sortAdditional']) && $_POST['sortAdditional'] === 'Malejąco' && $status == 2 && !isset($_POST['sort'])) { 
    $contentAdmin .= $sortBestAdditional;
}
if (isset($_POST['sortAdditional']) && $_POST['sortAdditional'] === 'Rosnąco' && $status == 2 && !isset($_POST['sort'])) {
    $contentAdmin .= $sortWorstAdditional;
}