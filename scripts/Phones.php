<?php
if (!isset($_SESSION)) {
    session_start();
}
$log = '';
if (isset($_SESSION['log'])) {
    $log = $_SESSION['log'];
}
$sesId = session_id();

$title = "Telefony i smartfony";

include_once 'class/database.php';
$db = new Database("localhost", "root", "", "opinius");

$userIdSession = $db->select('SELECT userId FROM logged_in_users WHERE sessionId = "'.$sesId.'"', array("userId"));
$reviews = $db->displayReviews("SELECT r.`id-reviews`, name, category, brand, nick, review , star, star2, star3, star4, image FROM `parameters-items` p JOIN reviews r ON `r`.`id-reviews` = p.`id-reviews` JOIN users u ON `u`.`id` = `r`.`id-users` JOIN items i ON `i`.`id-items` = `r`.`id-items` JOIN manufacturers m ON `m`.`id-manufacturers` = `i`.`id-manufacturers` JOIN categories c ON `c`.`id-categories` = `m`.`id-categories` WHERE category= 'Telefony i smartfony' ORDER BY r.`id-reviews`  DESC"  , array("id-reviews", "nick", "name", "category", "brand", "review", "star", "star2", "star3", "star4", "image"));
$reviewsAdmin = $db->selectAdmin("SELECT r.`id-reviews`, name, category, brand, nick, review , star, star2, star3, star4, image FROM `parameters-items` p JOIN reviews r ON `r`.`id-reviews` = p.`id-reviews` JOIN users u ON `u`.`id` = `r`.`id-users` JOIN items i ON `i`.`id-items` = `r`.`id-items` JOIN manufacturers m ON `m`.`id-manufacturers` = `i`.`id-manufacturers` JOIN categories c ON `c`.`id-categories` = `m`.`id-categories` WHERE category= 'Telefony i smartfony' ORDER BY r.`id-reviews`  DESC"  , array("id-reviews", "nick", "name", "category", "brand", "review", "star", "star2", "star3", "star4", "image"));
if ($log == True) {
    $status = $db->select("SELECT status from users u JOIN logged_in_users l ON u.id = l.userId WHERE id = " . $userIdSession . "", array("status"));      
} else {
    $status = $db->select("SELECT status from users u JOIN logged_in_users l ON u.id = l.userId", array("status"));
} // dodane aby funkcja unset działała tylko na odpowiednim statusie użytkownika       
$sortBest = $db->displayReviews("SELECT r.`id-reviews`, name, category, brand, nick, review , star, star2, star3, star4, image FROM `parameters-items` p JOIN reviews r ON `r`.`id-reviews` = p.`id-reviews` JOIN users u ON `u`.`id` = `r`.`id-users` JOIN items i ON `i`.`id-items` = `r`.`id-items` JOIN manufacturers m ON `m`.`id-manufacturers` = `i`.`id-manufacturers` JOIN categories c ON `c`.`id-categories` = `m`.`id-categories` WHERE category= 'Telefony i smartfony' ORDER BY (star+star2+star3+star4)/4 DESC", array("id-reviews", "nick", "name", "category", "brand", "review", "star", "star2", "star3", "star4", "image"));
$sortWorst = $db->displayReviews("SELECT r.`id-reviews`, name, category, brand, nick, review , star, star2, star3, star4, image FROM `parameters-items` p JOIN reviews r ON `r`.`id-reviews` = p.`id-reviews` JOIN users u ON `u`.`id` = `r`.`id-users` JOIN items i ON `i`.`id-items` = `r`.`id-items` JOIN manufacturers m ON `m`.`id-manufacturers` = `i`.`id-manufacturers` JOIN categories c ON `c`.`id-categories` = `m`.`id-categories` WHERE category= 'Telefony i smartfony' ORDER BY (star+star2+star3+star4)/4", array("id-reviews", "nick", "name", "category", "brand", "review", "star", "star2", "star3", "star4", "image"));
$sortBestAdmin = $db->selectAdmin("SELECT r.`id-reviews`, name, category, brand, nick, review , star, star2, star3, star4, image FROM `parameters-items` p JOIN reviews r ON `r`.`id-reviews` = p.`id-reviews` JOIN users u ON `u`.`id` = `r`.`id-users` JOIN items i ON `i`.`id-items` = `r`.`id-items` JOIN manufacturers m ON `m`.`id-manufacturers` = `i`.`id-manufacturers` JOIN categories c ON `c`.`id-categories` = `m`.`id-categories` WHERE category= 'Telefony i smartfony' ORDER BY (star+star2+star3+star4)/4 DESC", array("id-reviews", "nick", "name", "category", "brand", "review", "star", "star2", "star3", "star4", "image"));
$sortWorstAdmin = $db->selectAdmin("SELECT r.`id-reviews`, name, category, brand, nick, review , star, star2, star3, star4, image FROM `parameters-items` p JOIN reviews r ON `r`.`id-reviews` = p.`id-reviews` JOIN users u ON `u`.`id` = `r`.`id-users` JOIN items i ON `i`.`id-items` = `r`.`id-items` JOIN manufacturers m ON `m`.`id-manufacturers` = `i`.`id-manufacturers` JOIN categories c ON `c`.`id-categories` = `m`.`id-categories` WHERE category= 'Telefony i smartfony' ORDER BY (star+star2+star3+star4)/4", array("id-reviews", "nick", "name", "category", "brand", "review", "star", "star2", "star3", "star4", "image"));
$sortBestCamera = $db->displayReviews("SELECT r.`id-reviews`, name, category, brand, nick, review , star, star2, star3, star4, image FROM `parameters-items` p JOIN reviews r ON `r`.`id-reviews` = p.`id-reviews` JOIN users u ON `u`.`id` = `r`.`id-users` JOIN items i ON `i`.`id-items` = `r`.`id-items` JOIN manufacturers m ON `m`.`id-manufacturers` = `i`.`id-manufacturers` JOIN categories c ON `c`.`id-categories` = `m`.`id-categories` WHERE category= 'Telefony i smartfony' ORDER BY star DESC", array("id-reviews", "nick", "name", "category", "brand", "review", "star", "star2", "star3", "star4", "image"));
$sortWorstCamera = $db->displayReviews("SELECT r.`id-reviews`, name, category, brand, nick, review , star, star2, star3, star4, image FROM `parameters-items` p JOIN reviews r ON `r`.`id-reviews` = p.`id-reviews` JOIN users u ON `u`.`id` = `r`.`id-users` JOIN items i ON `i`.`id-items` = `r`.`id-items` JOIN manufacturers m ON `m`.`id-manufacturers` = `i`.`id-manufacturers` JOIN categories c ON `c`.`id-categories` = `m`.`id-categories` WHERE category= 'Telefony i smartfony' ORDER BY star", array("id-reviews", "nick", "name", "category", "brand", "review", "star", "star2", "star3", "star4", "image"));
$sortBestBattery = $db->displayReviews("SELECT r.`id-reviews`, name, category, brand, nick, review , star, star2, star3, star4, image FROM `parameters-items` p JOIN reviews r ON `r`.`id-reviews` = p.`id-reviews` JOIN users u ON `u`.`id` = `r`.`id-users` JOIN items i ON `i`.`id-items` = `r`.`id-items` JOIN manufacturers m ON `m`.`id-manufacturers` = `i`.`id-manufacturers` JOIN categories c ON `c`.`id-categories` = `m`.`id-categories` WHERE category= 'Telefony i smartfony' ORDER BY star2 DESC", array("id-reviews", "nick", "name", "category", "brand", "review", "star", "star2", "star3", "star4", "image"));
$sortWorstBattery = $db->displayReviews("SELECT r.`id-reviews`, name, category, brand, nick, review , star, star2, star3, star4, image FROM `parameters-items` p JOIN reviews r ON `r`.`id-reviews` = p.`id-reviews` JOIN users u ON `u`.`id` = `r`.`id-users` JOIN items i ON `i`.`id-items` = `r`.`id-items` JOIN manufacturers m ON `m`.`id-manufacturers` = `i`.`id-manufacturers` JOIN categories c ON `c`.`id-categories` = `m`.`id-categories` WHERE category= 'Telefony i smartfony' ORDER BY star2", array("id-reviews", "nick", "name", "category", "brand", "review", "star", "star2", "star3", "star4", "image"));
$sortBestFunction = $db->displayReviews("SELECT r.`id-reviews`, name, category, brand, nick, review , star, star2, star3, star4, image FROM `parameters-items` p JOIN reviews r ON `r`.`id-reviews` = p.`id-reviews` JOIN users u ON `u`.`id` = `r`.`id-users` JOIN items i ON `i`.`id-items` = `r`.`id-items` JOIN manufacturers m ON `m`.`id-manufacturers` = `i`.`id-manufacturers` JOIN categories c ON `c`.`id-categories` = `m`.`id-categories` WHERE category= 'Telefony i smartfony' ORDER BY star3 DESC", array("id-reviews", "nick", "name", "category", "brand", "review", "star", "star2", "star3", "star4", "image"));
$sortWorstFunction = $db->displayReviews("SELECT r.`id-reviews`, name, category, brand, nick, review , star, star2, star3, star4, image FROM `parameters-items` p JOIN reviews r ON `r`.`id-reviews` = p.`id-reviews` JOIN users u ON `u`.`id` = `r`.`id-users` JOIN items i ON `i`.`id-items` = `r`.`id-items` JOIN manufacturers m ON `m`.`id-manufacturers` = `i`.`id-manufacturers` JOIN categories c ON `c`.`id-categories` = `m`.`id-categories` WHERE category= 'Telefony i smartfony' ORDER BY star3", array("id-reviews", "nick", "name", "category", "brand", "review", "star", "star2", "star3", "star4", "image"));
$sortBestLook = $db->displayReviews("SELECT r.`id-reviews`, name, category, brand, nick, review , star, star2, star3, star4, image FROM `parameters-items` p JOIN reviews r ON `r`.`id-reviews` = p.`id-reviews` JOIN users u ON `u`.`id` = `r`.`id-users` JOIN items i ON `i`.`id-items` = `r`.`id-items` JOIN manufacturers m ON `m`.`id-manufacturers` = `i`.`id-manufacturers` JOIN categories c ON `c`.`id-categories` = `m`.`id-categories` WHERE category= 'Telefony i smartfony' ORDER BY star4 DESC", array("id-reviews", "nick", "name", "category", "brand", "review", "star", "star2", "star3", "star4", "image"));
$sortWorstLook = $db->displayReviews("SELECT r.`id-reviews`, name, category, brand, nick, review , star, star2, star3, star4, image FROM `parameters-items` p JOIN reviews r ON `r`.`id-reviews` = p.`id-reviews` JOIN users u ON `u`.`id` = `r`.`id-users` JOIN items i ON `i`.`id-items` = `r`.`id-items` JOIN manufacturers m ON `m`.`id-manufacturers` = `i`.`id-manufacturers` JOIN categories c ON `c`.`id-categories` = `m`.`id-categories` WHERE category= 'Telefony i smartfony' ORDER BY star4", array("id-reviews", "nick", "name", "category", "brand", "review", "star", "star2", "star3", "star4", "image"));
$sortBestCameraAdmin = $db->selectAdmin("SELECT r.`id-reviews`, name, category, brand, nick, review , star, star2, star3, star4, image FROM `parameters-items` p JOIN reviews r ON `r`.`id-reviews` = p.`id-reviews` JOIN users u ON `u`.`id` = `r`.`id-users` JOIN items i ON `i`.`id-items` = `r`.`id-items` JOIN manufacturers m ON `m`.`id-manufacturers` = `i`.`id-manufacturers` JOIN categories c ON `c`.`id-categories` = `m`.`id-categories` WHERE category= 'Telefony i smartfony' ORDER BY star DESC", array("id-reviews", "nick", "name", "category", "brand", "review", "star", "star2", "star3", "star4", "image"));
$sortWorstCameraAdmin = $db->selectAdmin("SELECT r.`id-reviews`, name, category, brand, nick, review , star, star2, star3, star4, image FROM `parameters-items` p JOIN reviews r ON `r`.`id-reviews` = p.`id-reviews` JOIN users u ON `u`.`id` = `r`.`id-users` JOIN items i ON `i`.`id-items` = `r`.`id-items` JOIN manufacturers m ON `m`.`id-manufacturers` = `i`.`id-manufacturers` JOIN categories c ON `c`.`id-categories` = `m`.`id-categories` WHERE category= 'Telefony i smartfony' ORDER BY star", array("id-reviews", "nick", "name", "category", "brand", "review", "star", "star2", "star3", "star4", "image"));
$sortBestBatteryAdmin = $db->selectAdmin("SELECT r.`id-reviews`, name, category, brand, nick, review , star, star2, star3, star4, image FROM `parameters-items` p JOIN reviews r ON `r`.`id-reviews` = p.`id-reviews` JOIN users u ON `u`.`id` = `r`.`id-users` JOIN items i ON `i`.`id-items` = `r`.`id-items` JOIN manufacturers m ON `m`.`id-manufacturers` = `i`.`id-manufacturers` JOIN categories c ON `c`.`id-categories` = `m`.`id-categories` WHERE category= 'Telefony i smartfony' ORDER BY star2 DESC", array("id-reviews", "nick", "name", "category", "brand", "review", "star", "star2", "star3", "star4", "image"));
$sortWorstBatteryAdmin = $db->selectAdmin("SELECT r.`id-reviews`, name, category, brand, nick, review , star, star2, star3, star4, image FROM `parameters-items` p JOIN reviews r ON `r`.`id-reviews` = p.`id-reviews` JOIN users u ON `u`.`id` = `r`.`id-users` JOIN items i ON `i`.`id-items` = `r`.`id-items` JOIN manufacturers m ON `m`.`id-manufacturers` = `i`.`id-manufacturers` JOIN categories c ON `c`.`id-categories` = `m`.`id-categories` WHERE category= 'Telefony i smartfony' ORDER BY star2", array("id-reviews", "nick", "name", "category", "brand", "review", "star", "star2", "star3", "star4", "image"));
$sortBestFunctionAdmin = $db->selectAdmin("SELECT r.`id-reviews`, name, category, brand, nick, review , star, star2, star3, star4, image FROM `parameters-items` p JOIN reviews r ON `r`.`id-reviews` = p.`id-reviews` JOIN users u ON `u`.`id` = `r`.`id-users` JOIN items i ON `i`.`id-items` = `r`.`id-items` JOIN manufacturers m ON `m`.`id-manufacturers` = `i`.`id-manufacturers` JOIN categories c ON `c`.`id-categories` = `m`.`id-categories` WHERE category= 'Telefony i smartfony' ORDER BY star3 DESC", array("id-reviews", "nick", "name", "category", "brand", "review", "star", "star2", "star3", "star4", "image"));
$sortWorstFunctionAdmin = $db->selectAdmin("SELECT r.`id-reviews`, name, category, brand, nick, review , star, star2, star3, star4, image FROM `parameters-items` p JOIN reviews r ON `r`.`id-reviews` = p.`id-reviews` JOIN users u ON `u`.`id` = `r`.`id-users` JOIN items i ON `i`.`id-items` = `r`.`id-items` JOIN manufacturers m ON `m`.`id-manufacturers` = `i`.`id-manufacturers` JOIN categories c ON `c`.`id-categories` = `m`.`id-categories` WHERE category= 'Telefony i smartfony' ORDER BY star3", array("id-reviews", "nick", "name", "category", "brand", "review", "star", "star2", "star3", "star4", "image"));
$sortBestLookAdmin = $db->selectAdmin("SELECT r.`id-reviews`, name, category, brand, nick, review , star, star2, star3, star4, image FROM `parameters-items` p JOIN reviews r ON `r`.`id-reviews` = p.`id-reviews` JOIN users u ON `u`.`id` = `r`.`id-users` JOIN items i ON `i`.`id-items` = `r`.`id-items` JOIN manufacturers m ON `m`.`id-manufacturers` = `i`.`id-manufacturers` JOIN categories c ON `c`.`id-categories` = `m`.`id-categories` WHERE category= 'Telefony i smartfony' ORDER BY star4 DESC", array("id-reviews", "nick", "name", "category", "brand", "review", "star", "star2", "star3", "star4", "image"));
$sortWorstLookAdmin = $db->selectAdmin("SELECT r.`id-reviews`, name, category, brand, nick, review , star, star2, star3, star4, image FROM `parameters-items` p JOIN reviews r ON `r`.`id-reviews` = p.`id-reviews` JOIN users u ON `u`.`id` = `r`.`id-users` JOIN items i ON `i`.`id-items` = `r`.`id-items` JOIN manufacturers m ON `m`.`id-manufacturers` = `i`.`id-manufacturers` JOIN categories c ON `c`.`id-categories` = `m`.`id-categories` WHERE category= 'Telefony i smartfony' ORDER BY star4", array("id-reviews", "nick", "name", "category", "brand", "review", "star", "star2", "star3", "star4", "image"));

$contentLOG = '                       
                        <h2>Telefony i smartfony</h2><br>                       
                        
                        <div class="textLeft" >   
                            <form method="post">
                                <select name="sort1" class="sortSelectPhones" onchange="this.form.submit()">
                                    <option selected disabled hidden>Sortuj po funkcjonalności:</option>
                                    <option value="Malejąco">Od najlepszej</option>
                                    <option value="Rosnąco">Od najgorszej</option>                                                    
                                </select>
                            </form> 
                        </div>
                        <div class="textLeft" >   
                            <form method="post">
                                <select name="sort2" class="sortSelectPhones" onchange="this.form.submit()">
                                    <option selected disabled hidden>Sortuj po baterii:</option>
                                    <option value="Malejąco">Od najlepszej</option>
                                    <option value="Rosnąco">Od najgorszej</option>                                                    
                                </select>
                            </form> 
                        </div>
                
                        <div class="textLeft" >   
                            <form method="post">
                                <select name="sort3" class="sortSelectPhones" onchange="this.form.submit()">
                                    <option selected disabled hidden>Sortuj po zdjęciach:</option>
                                    <option value="Malejąco">Od najlepszej</option>
                                    <option value="Rosnąco">Od najgorszej</option>                                                    
                                </select>
                            </form> 
                        </div>
                        <div class="textLeft" >   
                            <form method="post">
                                <select name="sort4" class="sortSelectPhones" onchange="this.form.submit()">
                                    <option selected disabled hidden>Sortuj po wyświetlaczu:</option>
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
    $contentLOG .= $sortBestCamera;
}
if (isset(filter_input_array(INPUT_POST)['sort1']) && filter_input_array(INPUT_POST)['sort1'] === 'Rosnąco' && $status == 1 && !isset(filter_input_array(INPUT_POST)['sort'])) {
    $contentLOG .= $sortWorstCamera;
}
if (isset(filter_input_array(INPUT_POST)['sort2']) && filter_input_array(INPUT_POST)['sort2'] === 'Malejąco' && $status == 1 && !isset(filter_input_array(INPUT_POST)['sort'])) { 
    $contentLOG .= $sortBestBattery;
}
if (isset(filter_input_array(INPUT_POST)['sort2']) && filter_input_array(INPUT_POST)['sort2'] === 'Rosnąco' && $status == 1 && !isset(filter_input_array(INPUT_POST)['sort'])) {
    $contentLOG .= $sortWorstBattery;
}
if (isset(filter_input_array(INPUT_POST)['sort3']) && filter_input_array(INPUT_POST)['sort3'] === 'Malejąco' && $status == 1 && !isset(filter_input_array(INPUT_POST)['sort'])) {
    $contentLOG .= $sortBestFunction;
}
if (isset(filter_input_array(INPUT_POST)['sort3']) && filter_input_array(INPUT_POST)['sort3'] === 'Rosnąco' && $status == 1 && !isset(filter_input_array(INPUT_POST)['sort'])) {
    $contentLOG .= $sortWorstFunction;
}
if (isset(filter_input_array(INPUT_POST)['sort4']) && filter_input_array(INPUT_POST)['sort4'] === 'Malejąco' && $status == 1 && !isset(filter_input_array(INPUT_POST)['sort'])) { 
    $contentLOG .= $sortBestLook;
}
if (isset(filter_input_array(INPUT_POST)['sort4']) && filter_input_array(INPUT_POST)['sort4'] === 'Rosnąco' && $status == 1 && !isset(filter_input_array(INPUT_POST)['sort'])) {
    $contentLOG .= $sortWorstLook;
}

$content = '
                        <h2>Telefony i smartfony</h2><br>                     
                        
                    <div class="textLeft" >   
                            <form method="post">
                                <select name="sort1" class="sortSelectPhones" onchange="this.form.submit()">
                                    <option selected disabled hidden>Sortuj po funkcjonalności:</option>
                                    <option value="Malejąco">Od najlepszej</option>
                                    <option value="Rosnąco">Od najgorszej</option>                                                    
                                </select>
                            </form> 
                        </div>
                        <div class="textLeft" >   
                            <form method="post">
                                <select name="sort2" class="sortSelectPhones" onchange="this.form.submit()">
                                    <option selected disabled hidden>Sortuj po baterii:</option>
                                    <option value="Malejąco">Od najlepszej</option>
                                    <option value="Rosnąco">Od najgorszej</option>                                                    
                                </select>
                            </form> 
                        </div>
                     
                        <div class="textLeft" >   
                            <form method="post">
                                <select name="sort3" class="sortSelectPhones" onchange="this.form.submit()">
                                    <option selected disabled hidden>Sortuj po zdjęciach:</option>
                                    <option value="Malejąco">Od najlepszej</option>
                                    <option value="Rosnąco">Od najgorszej</option>                                                    
                                </select>
                            </form> 
                        </div>
                        <div class="textLeft" >   
                            <form method="post">
                                <select name="sort4" class="sortSelectPhones" onchange="this.form.submit()">
                                    <option selected disabled hidden>Sortuj po wyświetlaczu:</option>
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
    $content .= $sortBestCamera;
}
if (isset(filter_input_array(INPUT_POST)['sort1']) && filter_input_array(INPUT_POST)['sort1'] === 'Rosnąco' && !isset(filter_input_array(INPUT_POST)['sort'])) {
    $content .= $sortWorstCamera;
}
if (isset(filter_input_array(INPUT_POST)['sort2']) && filter_input_array(INPUT_POST)['sort2'] === 'Malejąco' && !isset(filter_input_array(INPUT_POST)['sort'])) { 
    $content .= $sortBestBattery;
}
if (isset(filter_input_array(INPUT_POST)['sort2']) && filter_input_array(INPUT_POST)['sort2'] === 'Rosnąco' && !isset(filter_input_array(INPUT_POST)['sort'])) {
    $content .= $sortWorstBattery;
}
if (isset(filter_input_array(INPUT_POST)['sort3']) && filter_input_array(INPUT_POST)['sort3'] === 'Malejąco' && !isset(filter_input_array(INPUT_POST)['sort'])) {
    $content .= $sortBestFunction;
}
if (isset(filter_input_array(INPUT_POST)['sort3']) && filter_input_array(INPUT_POST)['sort3'] === 'Rosnąco' && !isset(filter_input_array(INPUT_POST)['sort'])) {
    $content .= $sortWorstFunction;
}
if (isset(filter_input_array(INPUT_POST)['sort4']) && filter_input_array(INPUT_POST)['sort4'] === 'Malejąco' && !isset(filter_input_array(INPUT_POST)['sort'])) { 
    $content .= $sortBestLook;
}
if (isset(filter_input_array(INPUT_POST)['sort4']) && filter_input_array(INPUT_POST)['sort4'] === 'Rosnąco' && !isset(filter_input_array(INPUT_POST)['sort'])) {
    $content .= $sortWorstLook;
}
                        
$contentAdmin = '                       
                        <h2>Telefony i smartfony</h2><br>                       
                        
                    <div class="textLeft" >   
                            <form method="post">
                                <select name="sort1" class="sortSelectPhones" onchange="this.form.submit()">
                                    <option selected disabled hidden>Sortuj po funkcjonalności:</option>
                                    <option value="Malejąco">Od najlepszej</option>
                                    <option value="Rosnąco">Od najgorszej</option>                                                    
                                </select>
                            </form> 
                        </div>
                        <div class="textLeft" >   
                            <form method="post">
                                <select name="sort2" class="sortSelectPhones" onchange="this.form.submit()">
                                    <option selected disabled hidden>Sortuj po baterii:</option>
                                    <option value="Malejąco">Od najlepszej</option>
                                    <option value="Rosnąco">Od najgorszej</option>                                                    
                                </select>
                            </form> 
                        </div>
                   
                        <div class="textLeft" >   
                            <form method="post">
                                <select name="sort3" class="sortSelectPhones" onchange="this.form.submit()">
                                    <option selected disabled hidden>Sortuj po zdjęciach:</option>
                                    <option value="Malejąco">Od najlepszej</option>
                                    <option value="Rosnąco">Od najgorszej</option>                                                    
                                </select>
                            </form> 
                        </div>
                        <div class="textLeft" >   
                            <form method="post">
                                <select name="sort4" class="sortSelectPhones" onchange="this.form.submit()">
                                    <option selected disabled hidden>Sortuj po wyświetlaczu:</option>
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
if (isset(filter_input_array(INPUT_POST)['sort']) && filter_input_array(INPUT_POST)['sort'] === 'Malejąco' && $status == 2 && !isset(filter_input_array(INPUT_POST)['sort2']) && !isset(filter_input_array(INPUT_POST)['sort1']) && !isset(filter_input_array(INPUT_POST)['sort3']) && !isset(filter_input_array(INPUT_POST)['sort4'])) { // sortowanie opinii
    $contentAdmin .= $sortBestAdmin;
}
if (isset(filter_input_array(INPUT_POST)['sort']) && filter_input_array(INPUT_POST)['sort'] === 'Rosnąco' && $status == 2 && !isset(filter_input_array(INPUT_POST)['sort2']) && !isset(filter_input_array(INPUT_POST)['sort1']) && !isset(filter_input_array(INPUT_POST)['sort3']) && !isset(filter_input_array(INPUT_POST)['sort4'])) {
    $contentAdmin .= $sortWorstAdmin;
}
if (isset(filter_input_array(INPUT_POST)['sort']) && filter_input_array(INPUT_POST)['sort'] === 'Najnowsze' && $status == 2 && !isset(filter_input_array(INPUT_POST)['sort2']) && !isset(filter_input_array(INPUT_POST)['sort1']) && !isset(filter_input_array(INPUT_POST)['sort3']) && !isset(filter_input_array(INPUT_POST)['sort4'])) {
    $contentAdmin .= $reviewsAdmin;
}
if (!isset(filter_input_array(INPUT_POST)['sort']) && $status == 2 && !isset(filter_input_array(INPUT_POST)['sort2']) && !isset(filter_input_array(INPUT_POST)['sort1']) && !isset(filter_input_array(INPUT_POST)['sort3']) && !isset(filter_input_array(INPUT_POST)['sort4'])) {
    $contentAdmin .= $reviewsAdmin;
}
if (isset(filter_input_array(INPUT_POST)['sort1']) && filter_input_array(INPUT_POST)['sort1'] === 'Malejąco' && $status == 2 && !isset(filter_input_array(INPUT_POST)['sort'])) { 
    $contentAdmin .= $sortBestCameraAdmin;
}
if (isset(filter_input_array(INPUT_POST)['sort1']) && filter_input_array(INPUT_POST)['sort1'] === 'Rosnąco' && $status == 2 && !isset(filter_input_array(INPUT_POST)['sort'])) {
    $contentAdmin .= $sortWorstCameraAdmin;
}
if (isset(filter_input_array(INPUT_POST)['sort2']) && filter_input_array(INPUT_POST)['sort2'] === 'Malejąco' && $status == 2 && !isset(filter_input_array(INPUT_POST)['sort'])) { 
    $contentAdmin .= $sortBestBatteryAdmin;
}
if (isset(filter_input_array(INPUT_POST)['sort2']) && filter_input_array(INPUT_POST)['sort2'] === 'Rosnąco' && $status == 2 && !isset(filter_input_array(INPUT_POST)['sort'])) {
    $contentAdmin .= $sortWorstBatteryAdmin;
}
if (isset(filter_input_array(INPUT_POST)['sort3']) && filter_input_array(INPUT_POST)['sort3'] === 'Malejąco' && $status == 2 && !isset(filter_input_array(INPUT_POST)['sort'])) {
    $contentAdmin .= $sortBestFunctionAdmin;
}
if (isset(filter_input_array(INPUT_POST)['sort3']) && filter_input_array(INPUT_POST)['sort3'] === 'Rosnąco' && $status == 2 && !isset(filter_input_array(INPUT_POST)['sort'])) {
    $contentAdmin .= $sortWorstFunctionAdmin;
}
if (isset(filter_input_array(INPUT_POST)['sort4']) && filter_input_array(INPUT_POST)['sort4'] === 'Malejąco' && $status == 2 && !isset(filter_input_array(INPUT_POST)['sort'])) { 
    $contentAdmin .= $sortBestLookAdmin;
}
if (isset(filter_input_array(INPUT_POST)['sort4']) && filter_input_array(INPUT_POST)['sort4'] === 'Rosnąco' && $status == 2 && !isset(filter_input_array(INPUT_POST)['sort'])) {
    $contentAdmin .= $sortWorstLookAdmin;
}