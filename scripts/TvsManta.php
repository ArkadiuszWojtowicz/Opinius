<?php
if (!isset($_SESSION)) {
    session_start();
}
$log = '';
if (isset($_SESSION['log'])) {
    $log = $_SESSION['log'];
}
$sesId = session_id();

$title = "Telewizory Manta";

include_once 'class/database.php';
$db = new Database("localhost", "root", "", "opinius");

$userIdSession = $db->select('SELECT userId FROM logged_in_users WHERE sessionId = "'.$sesId.'"', array("userId"));
$reviews = $db->displayReviews("SELECT r.`id-reviews`, name, category, brand, nick, review , star, star2, star3, star4, image FROM `parameters-items` p JOIN reviews r ON `r`.`id-reviews` = p.`id-reviews` JOIN users u ON `u`.`id` = `r`.`id-users` JOIN items i ON `i`.`id-items` = `r`.`id-items` JOIN manufacturers m ON `m`.`id-manufacturers` = `i`.`id-manufacturers` JOIN categories c ON `c`.`id-categories` = `m`.`id-categories` WHERE category= 'Telewizory' AND brand = 'Manta' ORDER BY r.`id-reviews`  DESC", array("id-reviews", "nick", "name", "category", "brand", "review", "star", "star2", "star3", "star4", "image"));
$reviewsAdmin = $db->selectAdmin("SELECT r.`id-reviews`, name, category, brand, nick, review , star, star2, star3, star4, image FROM `parameters-items` p JOIN reviews r ON `r`.`id-reviews` = p.`id-reviews` JOIN users u ON `u`.`id` = `r`.`id-users` JOIN items i ON `i`.`id-items` = `r`.`id-items` JOIN manufacturers m ON `m`.`id-manufacturers` = `i`.`id-manufacturers` JOIN categories c ON `c`.`id-categories` = `m`.`id-categories` WHERE category= 'Telewizory' AND brand = 'Manta' ORDER BY r.`id-reviews`  DESC", array("id-reviews", "nick", "name", "category", "brand", "review", "star", "star2", "star3", "star4", "image"));
if ($log == True) {
    $status = $db->select("SELECT status from users u JOIN logged_in_users l ON u.id = l.userId WHERE id = " . $userIdSession . "", array("status"));
} else {
    $status = $db->select("SELECT status from users u JOIN logged_in_users l ON u.id = l.userId", array("status"));
} // dodane aby funkcja unset działała tylko na odpowiednim statusie użytkownika       
$sortBest = $db->displayReviews("SELECT r.`id-reviews`, name, category, brand, nick, review , star, star2, star3, star4, image FROM `parameters-items` p JOIN reviews r ON `r`.`id-reviews` = p.`id-reviews` JOIN users u ON `u`.`id` = `r`.`id-users` JOIN items i ON `i`.`id-items` = `r`.`id-items` JOIN manufacturers m ON `m`.`id-manufacturers` = `i`.`id-manufacturers` JOIN categories c ON `c`.`id-categories` = `m`.`id-categories` WHERE category= 'Telewizory' AND brand = 'Manta' ORDER BY (star+star2+star3+star4)/4 DESC", array("id-reviews", "nick", "name", "category", "brand", "review", "star", "star2", "star3", "star4", "image"));
$sortWorst = $db->displayReviews("SELECT r.`id-reviews`, name, category, brand, nick, review , star, star2, star3, star4, image FROM `parameters-items` p JOIN reviews r ON `r`.`id-reviews` = p.`id-reviews` JOIN users u ON `u`.`id` = `r`.`id-users` JOIN items i ON `i`.`id-items` = `r`.`id-items` JOIN manufacturers m ON `m`.`id-manufacturers` = `i`.`id-manufacturers` JOIN categories c ON `c`.`id-categories` = `m`.`id-categories` WHERE category= 'Telewizory' AND brand = 'Manta' ORDER BY (star+star2+star3+star4)/4", array("id-reviews", "nick", "name", "category", "brand", "review", "star", "star2", "star3", "star4", "image"));
$sortBestAdmin = $db->selectAdmin("SELECT r.`id-reviews`, name, category, brand, nick, review , star, star2, star3, star4, image FROM `parameters-items` p JOIN reviews r ON `r`.`id-reviews` = p.`id-reviews` JOIN users u ON `u`.`id` = `r`.`id-users` JOIN items i ON `i`.`id-items` = `r`.`id-items` JOIN manufacturers m ON `m`.`id-manufacturers` = `i`.`id-manufacturers` JOIN categories c ON `c`.`id-categories` = `m`.`id-categories` WHERE category= 'Telewizory' AND brand = 'Manta' ORDER BY (star+star2+star3+star4)/4 DESC", array("id-reviews", "nick", "name", "category", "brand", "review", "star", "star2", "star3", "star4", "image"));
$sortWorstAdmin = $db->selectAdmin("SELECT r.`id-reviews`, name, category, brand, nick, review , star, star2, star3, star4, image FROM `parameters-items` p JOIN reviews r ON `r`.`id-reviews` = p.`id-reviews` JOIN users u ON `u`.`id` = `r`.`id-users` JOIN items i ON `i`.`id-items` = `r`.`id-items` JOIN manufacturers m ON `m`.`id-manufacturers` = `i`.`id-manufacturers` JOIN categories c ON `c`.`id-categories` = `m`.`id-categories` WHERE category= 'Telewizory' AND brand = 'Manta' ORDER BY (star+star2+star3+star4)/4", array("id-reviews", "nick", "name", "category", "brand", "review", "star", "star2", "star3", "star4", "image"));
$sortBestCamera = $db->displayReviews("SELECT r.`id-reviews`, name, category, brand, nick, review , star, star2, star3, star4, image FROM `parameters-items` p JOIN reviews r ON `r`.`id-reviews` = p.`id-reviews` JOIN users u ON `u`.`id` = `r`.`id-users` JOIN items i ON `i`.`id-items` = `r`.`id-items` JOIN manufacturers m ON `m`.`id-manufacturers` = `i`.`id-manufacturers` JOIN categories c ON `c`.`id-categories` = `m`.`id-categories` WHERE category= 'Telewizory' AND brand = 'Manta' ORDER BY star DESC", array("id-reviews", "nick", "name", "category", "brand", "review", "star", "star2", "star3", "star4", "image"));
$sortWorstCamera = $db->displayReviews("SELECT r.`id-reviews`, name, category, brand, nick, review , star, star2, star3, star4, image FROM `parameters-items` p JOIN reviews r ON `r`.`id-reviews` = p.`id-reviews` JOIN users u ON `u`.`id` = `r`.`id-users` JOIN items i ON `i`.`id-items` = `r`.`id-items` JOIN manufacturers m ON `m`.`id-manufacturers` = `i`.`id-manufacturers` JOIN categories c ON `c`.`id-categories` = `m`.`id-categories` WHERE category= 'Telewizory' AND brand = 'Manta' ORDER BY star", array("id-reviews", "nick", "name", "category", "brand", "review", "star", "star2", "star3", "star4", "image"));
$sortBestBattery = $db->displayReviews("SELECT r.`id-reviews`, name, category, brand, nick, review , star, star2, star3, star4, image FROM `parameters-items` p JOIN reviews r ON `r`.`id-reviews` = p.`id-reviews` JOIN users u ON `u`.`id` = `r`.`id-users` JOIN items i ON `i`.`id-items` = `r`.`id-items` JOIN manufacturers m ON `m`.`id-manufacturers` = `i`.`id-manufacturers` JOIN categories c ON `c`.`id-categories` = `m`.`id-categories` WHERE category= 'Telewizory' AND brand = 'Manta' ORDER BY star2 DESC", array("id-reviews", "nick", "name", "category", "brand", "review", "star", "star2", "star3", "star4", "image"));
$sortWorstBattery = $db->displayReviews("SELECT r.`id-reviews`, name, category, brand, nick, review , star, star2, star3, star4, image FROM `parameters-items` p JOIN reviews r ON `r`.`id-reviews` = p.`id-reviews` JOIN users u ON `u`.`id` = `r`.`id-users` JOIN items i ON `i`.`id-items` = `r`.`id-items` JOIN manufacturers m ON `m`.`id-manufacturers` = `i`.`id-manufacturers` JOIN categories c ON `c`.`id-categories` = `m`.`id-categories` WHERE category= 'Telewizory' AND brand = 'Manta' ORDER BY star2", array("id-reviews", "nick", "name", "category", "brand", "review", "star", "star2", "star3", "star4", "image"));
$sortBestFunction = $db->displayReviews("SELECT r.`id-reviews`, name, category, brand, nick, review , star, star2, star3, star4, image FROM `parameters-items` p JOIN reviews r ON `r`.`id-reviews` = p.`id-reviews` JOIN users u ON `u`.`id` = `r`.`id-users` JOIN items i ON `i`.`id-items` = `r`.`id-items` JOIN manufacturers m ON `m`.`id-manufacturers` = `i`.`id-manufacturers` JOIN categories c ON `c`.`id-categories` = `m`.`id-categories` WHERE category= 'Telewizory' AND brand = 'Manta' ORDER BY star3 DESC", array("id-reviews", "nick", "name", "category", "brand", "review", "star", "star2", "star3", "star4", "image"));
$sortWorstFunction = $db->displayReviews("SELECT r.`id-reviews`, name, category, brand, nick, review , star, star2, star3, star4, image FROM `parameters-items` p JOIN reviews r ON `r`.`id-reviews` = p.`id-reviews` JOIN users u ON `u`.`id` = `r`.`id-users` JOIN items i ON `i`.`id-items` = `r`.`id-items` JOIN manufacturers m ON `m`.`id-manufacturers` = `i`.`id-manufacturers` JOIN categories c ON `c`.`id-categories` = `m`.`id-categories` WHERE category= 'Telewizory' AND brand = 'Manta' ORDER BY star3", array("id-reviews", "nick", "name", "category", "brand", "review", "star", "star2", "star3", "star4", "image"));
$sortBestLook = $db->displayReviews("SELECT r.`id-reviews`, name, category, brand, nick, review , star, star2, star3, star4, image FROM `parameters-items` p JOIN reviews r ON `r`.`id-reviews` = p.`id-reviews` JOIN users u ON `u`.`id` = `r`.`id-users` JOIN items i ON `i`.`id-items` = `r`.`id-items` JOIN manufacturers m ON `m`.`id-manufacturers` = `i`.`id-manufacturers` JOIN categories c ON `c`.`id-categories` = `m`.`id-categories` WHERE category= 'Telewizory' AND brand = 'Manta' ORDER BY star4 DESC", array("id-reviews", "nick", "name", "category", "brand", "review", "star", "star2", "star3", "star4", "image"));
$sortWorstLook = $db->displayReviews("SELECT r.`id-reviews`, name, category, brand, nick, review , star, star2, star3, star4, image FROM `parameters-items` p JOIN reviews r ON `r`.`id-reviews` = p.`id-reviews` JOIN users u ON `u`.`id` = `r`.`id-users` JOIN items i ON `i`.`id-items` = `r`.`id-items` JOIN manufacturers m ON `m`.`id-manufacturers` = `i`.`id-manufacturers` JOIN categories c ON `c`.`id-categories` = `m`.`id-categories` WHERE category= 'Telewizory' AND brand = 'Manta' ORDER BY star4", array("id-reviews", "nick", "name", "category", "brand", "review", "star", "star2", "star3", "star4", "image"));
$sortBestCameraAdmin = $db->selectAdmin("SELECT r.`id-reviews`, name, category, brand, nick, review , star, star2, star3, star4, image FROM `parameters-items` p JOIN reviews r ON `r`.`id-reviews` = p.`id-reviews` JOIN users u ON `u`.`id` = `r`.`id-users` JOIN items i ON `i`.`id-items` = `r`.`id-items` JOIN manufacturers m ON `m`.`id-manufacturers` = `i`.`id-manufacturers` JOIN categories c ON `c`.`id-categories` = `m`.`id-categories` WHERE category= 'Telewizory' AND brand = 'Manta' ORDER BY star DESC", array("id-reviews", "nick", "name", "category", "brand", "review", "star", "star2", "star3", "star4", "image"));
$sortWorstCameraAdmin = $db->selectAdmin("SELECT r.`id-reviews`, name, category, brand, nick, review , star, star2, star3, star4, image FROM `parameters-items` p JOIN reviews r ON `r`.`id-reviews` = p.`id-reviews` JOIN users u ON `u`.`id` = `r`.`id-users` JOIN items i ON `i`.`id-items` = `r`.`id-items` JOIN manufacturers m ON `m`.`id-manufacturers` = `i`.`id-manufacturers` JOIN categories c ON `c`.`id-categories` = `m`.`id-categories` WHERE category= 'Telewizory' AND brand = 'Manta' ORDER BY star", array("id-reviews", "nick", "name", "category", "brand", "review", "star", "star2", "star3", "star4", "image"));
$sortBestBatteryAdmin = $db->selectAdmin("SELECT r.`id-reviews`, name, category, brand, nick, review , star, star2, star3, star4, image FROM `parameters-items` p JOIN reviews r ON `r`.`id-reviews` = p.`id-reviews` JOIN users u ON `u`.`id` = `r`.`id-users` JOIN items i ON `i`.`id-items` = `r`.`id-items` JOIN manufacturers m ON `m`.`id-manufacturers` = `i`.`id-manufacturers` JOIN categories c ON `c`.`id-categories` = `m`.`id-categories` WHERE category= 'Telewizory' AND brand = 'Manta' ORDER BY star2 DESC", array("id-reviews", "nick", "name", "category", "brand", "review", "star", "star2", "star3", "star4", "image"));
$sortWorstBatteryAdmin = $db->selectAdmin("SELECT r.`id-reviews`, name, category, brand, nick, review , star, star2, star3, star4, image FROM `parameters-items` p JOIN reviews r ON `r`.`id-reviews` = p.`id-reviews` JOIN users u ON `u`.`id` = `r`.`id-users` JOIN items i ON `i`.`id-items` = `r`.`id-items` JOIN manufacturers m ON `m`.`id-manufacturers` = `i`.`id-manufacturers` JOIN categories c ON `c`.`id-categories` = `m`.`id-categories` WHERE category= 'Telewizory' AND brand = 'Manta' ORDER BY star2", array("id-reviews", "nick", "name", "category", "brand", "review", "star", "star2", "star3", "star4", "image"));
$sortBestFunctionAdmin = $db->selectAdmin("SELECT r.`id-reviews`, name, category, brand, nick, review , star, star2, star3, star4, image FROM `parameters-items` p JOIN reviews r ON `r`.`id-reviews` = p.`id-reviews` JOIN users u ON `u`.`id` = `r`.`id-users` JOIN items i ON `i`.`id-items` = `r`.`id-items` JOIN manufacturers m ON `m`.`id-manufacturers` = `i`.`id-manufacturers` JOIN categories c ON `c`.`id-categories` = `m`.`id-categories` WHERE category= 'Telewizory' AND brand = 'Manta' ORDER BY star3 DESC", array("id-reviews", "nick", "name", "category", "brand", "review", "star", "star2", "star3", "star4", "image"));
$sortWorstFunctionAdmin = $db->selectAdmin("SELECT r.`id-reviews`, name, category, brand, nick, review , star, star2, star3, star4, image FROM `parameters-items` p JOIN reviews r ON `r`.`id-reviews` = p.`id-reviews` JOIN users u ON `u`.`id` = `r`.`id-users` JOIN items i ON `i`.`id-items` = `r`.`id-items` JOIN manufacturers m ON `m`.`id-manufacturers` = `i`.`id-manufacturers` JOIN categories c ON `c`.`id-categories` = `m`.`id-categories` WHERE category= 'Telewizory' AND brand = 'Manta' ORDER BY star3", array("id-reviews", "nick", "name", "category", "brand", "review", "star", "star2", "star3", "star4", "image"));
$sortBestLookAdmin = $db->selectAdmin("SELECT r.`id-reviews`, name, category, brand, nick, review , star, star2, star3, star4, image FROM `parameters-items` p JOIN reviews r ON `r`.`id-reviews` = p.`id-reviews` JOIN users u ON `u`.`id` = `r`.`id-users` JOIN items i ON `i`.`id-items` = `r`.`id-items` JOIN manufacturers m ON `m`.`id-manufacturers` = `i`.`id-manufacturers` JOIN categories c ON `c`.`id-categories` = `m`.`id-categories` WHERE category= 'Telewizory' AND brand = 'Manta' ORDER BY star4 DESC", array("id-reviews", "nick", "name", "category", "brand", "review", "star", "star2", "star3", "star4", "image"));
$sortWorstLookAdmin = $db->selectAdmin("SELECT r.`id-reviews`, name, category, brand, nick, review , star, star2, star3, star4, image FROM `parameters-items` p JOIN reviews r ON `r`.`id-reviews` = p.`id-reviews` JOIN users u ON `u`.`id` = `r`.`id-users` JOIN items i ON `i`.`id-items` = `r`.`id-items` JOIN manufacturers m ON `m`.`id-manufacturers` = `i`.`id-manufacturers` JOIN categories c ON `c`.`id-categories` = `m`.`id-categories` WHERE category= 'Telewizory' AND brand = 'Manta' ORDER BY star4", array("id-reviews", "nick", "name", "category", "brand", "review", "star", "star2", "star3", "star4", "image"));

$contentLOG = '                       
                        <h2>Telewizory - Manta</h2><br>                       
                        <div class="textLeft" >   
                            <form method="post">
                                <select name="sort1" class="sortSelectTvs" onchange="this.form.submit()">
                                    <option selected disabled hidden>Sortuj po obrazie:</option>
                                    <option value="Malejąco">Od najlepszej</option>
                                    <option value="Rosnąco">Od najgorszej</option>                                                    
                                </select>
                            </form> 
                        </div>
                        <div class="textLeft" >   
                            <form method="post">
                                <select name="sort2" class="sortSelectTvs" onchange="this.form.submit()">
                                    <option selected disabled hidden>Sortuj po dźwięku:</option>
                                    <option value="Malejąco">Od najlepszej</option>
                                    <option value="Rosnąco">Od najgorszej</option>                                                    
                                </select>
                            </form> 
                        </div>
                        <div class="textLeft" >   
                            <form method="post">
                                <select name="sort3" class="sortSelectTvs" onchange="this.form.submit()">
                                    <option selected disabled hidden>Sortuj po funkcjonalności:</option>
                                    <option value="Malejąco">Od najlepszej</option>
                                    <option value="Rosnąco">Od najgorszej</option>                                                    
                                </select>
                            </form> 
                        </div>
                        <div class="textLeft" >   
                            <form method="post">
                                <select name="sort4" class="sortSelectTvs" onchange="this.form.submit()">
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
                        </div>
                        <div style="background: #c6c7c7;width:300px;height: 40px;border-radius: 40px;padding: 10px 10px 10px 10px;margin-left:20px;">
                            <form method="post">
                                <input type="text" name="search" style="background: #c6c7c7;width:200px;height:20px;border: none;outline: none;float: left;line-height: 40px;" placeholder="Wyszukaj model..."/>
                                <button value="search" onsubmit="this.form.submit()" style="border:none;color: #e84118;float: right;width: 40px;height: 40px;border-radius: 50%;background: #2f3640;display: flex;justify-content: center;align-items: center;color: white;cursor: pointer;">
                                <i class="icon-search"></i>
                                </button>
                            </form> 
                        </div>';

if (isset(filter_input_array(INPUT_POST)['search']) && !isset(filter_input_array(INPUT_POST)['sort']) && $status == 1 && !isset(filter_input_array(INPUT_POST)['sort2']) && !isset(filter_input_array(INPUT_POST)['sort1']) && !isset(filter_input_array(INPUT_POST)['sort3']) && !isset(filter_input_array(INPUT_POST)['sort4'])) {
    $search = filter_input_array(INPUT_POST)['search'];
    $sortSearch = $db->displayReviews("SELECT r.`id-reviews`, name, category, brand, nick, review , star, star2, star3, star4, image FROM `parameters-items` p JOIN reviews r ON `r`.`id-reviews` = p.`id-reviews` JOIN users u ON `u`.`id` = `r`.`id-users` JOIN items i ON `i`.`id-items` = `r`.`id-items` JOIN manufacturers m ON `m`.`id-manufacturers` = `i`.`id-manufacturers` JOIN categories c ON `c`.`id-categories` = `m`.`id-categories` WHERE category= 'Telewizory' AND brand = 'Manta' AND name LIKE '%$search%'", array("id-reviews", "nick", "name", "category", "brand", "review", "star", "star2", "star3", "star4", "image"));
    $contentLOG .= $sortSearch;
}
if (isset(filter_input_array(INPUT_POST)['sort']) && filter_input_array(INPUT_POST)['sort'] === 'Malejąco' && $status == 1 && !isset(filter_input_array(INPUT_POST)['sort2']) && !isset(filter_input_array(INPUT_POST)['sort1']) && !isset(filter_input_array(INPUT_POST)['sort3']) && !isset(filter_input_array(INPUT_POST)['sort4']) && !isset(filter_input_array(INPUT_POST)['search'])) { // sortowanie opinii
    $contentLOG .= $sortBest;
}
if (isset(filter_input_array(INPUT_POST)['sort']) && filter_input_array(INPUT_POST)['sort'] === 'Rosnąco' && $status == 1 && !isset(filter_input_array(INPUT_POST)['sort2']) && !isset(filter_input_array(INPUT_POST)['sort1']) && !isset(filter_input_array(INPUT_POST)['sort3']) && !isset(filter_input_array(INPUT_POST)['sort4']) && !isset(filter_input_array(INPUT_POST)['search'])) {
    $contentLOG .= $sortWorst;
}
if (isset(filter_input_array(INPUT_POST)['sort']) && filter_input_array(INPUT_POST)['sort'] === 'Najnowsze' && $status == 1 && !isset(filter_input_array(INPUT_POST)['sort2']) && !isset(filter_input_array(INPUT_POST)['sort1']) && !isset(filter_input_array(INPUT_POST)['sort3']) && !isset(filter_input_array(INPUT_POST)['sort4']) && !isset(filter_input_array(INPUT_POST)['search'])) {
    $contentLOG .= $reviews;
}
if (!isset(filter_input_array(INPUT_POST)['sort']) && $status == 1 && !isset(filter_input_array(INPUT_POST)['sort2']) && !isset(filter_input_array(INPUT_POST)['sort1']) && !isset(filter_input_array(INPUT_POST)['sort3']) && !isset(filter_input_array(INPUT_POST)['sort4']) && !isset(filter_input_array(INPUT_POST)['search'])) {
    $contentLOG .= $reviews;
}
if (isset(filter_input_array(INPUT_POST)['sort1']) && filter_input_array(INPUT_POST)['sort1'] === 'Malejąco' && $status == 1 && !isset(filter_input_array(INPUT_POST)['sort']) && !isset(filter_input_array(INPUT_POST)['search'])) {
    $contentLOG .= $sortBestCamera;
}
if (isset(filter_input_array(INPUT_POST)['sort1']) && filter_input_array(INPUT_POST)['sort1'] === 'Rosnąco' && $status == 1 && !isset(filter_input_array(INPUT_POST)['sort']) && !isset(filter_input_array(INPUT_POST)['search'])) {
    $contentLOG .= $sortWorstCamera;
}
if (isset(filter_input_array(INPUT_POST)['sort2']) && filter_input_array(INPUT_POST)['sort2'] === 'Malejąco' && $status == 1 && !isset(filter_input_array(INPUT_POST)['sort']) && !isset(filter_input_array(INPUT_POST)['search'])) {
    $contentLOG .= $sortBestBattery;
}
if (isset(filter_input_array(INPUT_POST)['sort2']) && filter_input_array(INPUT_POST)['sort2'] === 'Rosnąco' && $status == 1 && !isset(filter_input_array(INPUT_POST)['sort']) && !isset(filter_input_array(INPUT_POST)['search'])) {
    $contentLOG .= $sortWorstBattery;
}
if (isset(filter_input_array(INPUT_POST)['sort3']) && filter_input_array(INPUT_POST)['sort3'] === 'Malejąco' && $status == 1 && !isset(filter_input_array(INPUT_POST)['sort']) && !isset(filter_input_array(INPUT_POST)['search'])) {
    $contentLOG .= $sortBestFunction;
}
if (isset(filter_input_array(INPUT_POST)['sort3']) && filter_input_array(INPUT_POST)['sort3'] === 'Rosnąco' && $status == 1 && !isset(filter_input_array(INPUT_POST)['sort']) && !isset(filter_input_array(INPUT_POST)['search'])) {
    $contentLOG .= $sortWorstFunction;
}
if (isset(filter_input_array(INPUT_POST)['sort4']) && filter_input_array(INPUT_POST)['sort4'] === 'Malejąco' && $status == 1 && !isset(filter_input_array(INPUT_POST)['sort']) && !isset(filter_input_array(INPUT_POST)['search'])) {
    $contentLOG .= $sortBestLook;
}
if (isset(filter_input_array(INPUT_POST)['sort4']) && filter_input_array(INPUT_POST)['sort4'] === 'Rosnąco' && $status == 1 && !isset(filter_input_array(INPUT_POST)['sort']) && !isset(filter_input_array(INPUT_POST)['search'])) {
    $contentLOG .= $sortWorstLook;
}

$content = '
                        <h2>Telewizory - Manta</h2><br>                     
                        <div class="textLeft" >   
                            <form method="post">
                                <select name="sort1" class="sortSelectTvs" onchange="this.form.submit()">
                                    <option selected disabled hidden>Sortuj po obrazie:</option>
                                    <option value="Malejąco">Od najlepszej</option>
                                    <option value="Rosnąco">Od najgorszej</option>                                                    
                                </select>
                            </form> 
                        </div>
                        <div class="textLeft" >   
                            <form method="post">
                                <select name="sort2" class="sortSelectTvs" onchange="this.form.submit()">
                                    <option selected disabled hidden>Sortuj po dźwięku:</option>
                                    <option value="Malejąco">Od najlepszej</option>
                                    <option value="Rosnąco">Od najgorszej</option>                                                    
                                </select>
                            </form> 
                        </div>
                        <div class="textLeft" >   
                            <form method="post">
                                <select name="sort3" class="sortSelectTvs" onchange="this.form.submit()">
                                    <option selected disabled hidden>Sortuj po funkcjonalności:</option>
                                    <option value="Malejąco">Od najlepszej</option>
                                    <option value="Rosnąco">Od najgorszej</option>                                                    
                                </select>
                            </form> 
                        </div>
                        <div class="textLeft" >   
                            <form method="post">
                                <select name="sort4" class="sortSelectTvs" onchange="this.form.submit()">
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
                    </div>
                    <div style="background: #c6c7c7;width:300px;height: 40px;border-radius: 40px;padding: 10px 10px 10px 10px;margin-left:20px;">
                            <form method="post">
                                <input type="text" name="search" style="background: #c6c7c7;width:200px;height:20px;border: none;outline: none;float: left;line-height: 40px;" placeholder="Wyszukaj model..."/>
                                <button value="search" onsubmit="this.form.submit()" style="border:none;color: #e84118;float: right;width: 40px;height: 40px;border-radius: 50%;background: #2f3640;display: flex;justify-content: center;align-items: center;color: white;cursor: pointer;">
                                <i class="icon-search"></i>
                                </button>
                            </form> 
                        </div>';
if (isset(filter_input_array(INPUT_POST)['search']) && !isset(filter_input_array(INPUT_POST)['sort']) && $status != 1 && $status != 2 && !isset(filter_input_array(INPUT_POST)['sort2']) && !isset(filter_input_array(INPUT_POST)['sort1']) && !isset(filter_input_array(INPUT_POST)['sort3']) && !isset(filter_input_array(INPUT_POST)['sort4'])) {
    $search = filter_input_array(INPUT_POST)['search'];
    $sortSearch = $db->displayReviews("SELECT r.`id-reviews`, name, category, brand, nick, review , star, star2, star3, star4, image FROM `parameters-items` p JOIN reviews r ON `r`.`id-reviews` = p.`id-reviews` JOIN users u ON `u`.`id` = `r`.`id-users` JOIN items i ON `i`.`id-items` = `r`.`id-items` JOIN manufacturers m ON `m`.`id-manufacturers` = `i`.`id-manufacturers` JOIN categories c ON `c`.`id-categories` = `m`.`id-categories` WHERE category= 'Telewizory' AND brand = 'Manta' AND name LIKE '%$search%'", array("id-reviews", "nick", "name", "category", "brand", "review", "star", "star2", "star3", "star4", "image"));
    $content .= $sortSearch;
}
if (isset(filter_input_array(INPUT_POST)['sort']) && filter_input_array(INPUT_POST)['sort'] === 'Malejąco' && !isset(filter_input_array(INPUT_POST)['sort2']) && !isset(filter_input_array(INPUT_POST)['sort1']) && !isset(filter_input_array(INPUT_POST)['sort3']) && !isset(filter_input_array(INPUT_POST)['sort4']) && !isset(filter_input_array(INPUT_POST)['search'])) { // sortowanie opinii
    $content .= $sortBest;
}
if (isset(filter_input_array(INPUT_POST)['sort']) && filter_input_array(INPUT_POST)['sort'] === 'Rosnąco' && !isset(filter_input_array(INPUT_POST)['sort2']) && !isset(filter_input_array(INPUT_POST)['sort1']) && !isset(filter_input_array(INPUT_POST)['sort3']) && !isset(filter_input_array(INPUT_POST)['sort4']) && !isset(filter_input_array(INPUT_POST)['search'])) {
    $content .= $sortWorst;
}
if (isset(filter_input_array(INPUT_POST)['sort']) && filter_input_array(INPUT_POST)['sort'] === 'Najnowsze' && !isset(filter_input_array(INPUT_POST)['sort2']) && !isset(filter_input_array(INPUT_POST)['sort1']) && !isset(filter_input_array(INPUT_POST)['sort3']) && !isset(filter_input_array(INPUT_POST)['sort4']) && !isset(filter_input_array(INPUT_POST)['search'])) {
    $content .= $reviews;
}
if (!isset(filter_input_array(INPUT_POST)['sort']) && !isset(filter_input_array(INPUT_POST)['sort2']) && !isset(filter_input_array(INPUT_POST)['sort1']) && !isset(filter_input_array(INPUT_POST)['sort3']) && !isset(filter_input_array(INPUT_POST)['sort4']) && !isset(filter_input_array(INPUT_POST)['search'])) {
    $content .= $reviews;
}
if (isset(filter_input_array(INPUT_POST)['sort1']) && filter_input_array(INPUT_POST)['sort1'] === 'Malejąco' && !isset(filter_input_array(INPUT_POST)['sort']) && !isset(filter_input_array(INPUT_POST)['search'])) {
    $content .= $sortBestCamera;
}
if (isset(filter_input_array(INPUT_POST)['sort1']) && filter_input_array(INPUT_POST)['sort1'] === 'Rosnąco' && !isset(filter_input_array(INPUT_POST)['sort']) && !isset(filter_input_array(INPUT_POST)['search'])) {
    $content .= $sortWorstCamera;
}
if (isset(filter_input_array(INPUT_POST)['sort2']) && filter_input_array(INPUT_POST)['sort2'] === 'Malejąco' && !isset(filter_input_array(INPUT_POST)['sort']) && !isset(filter_input_array(INPUT_POST)['search'])) {
    $content .= $sortBestBattery;
}
if (isset(filter_input_array(INPUT_POST)['sort2']) && filter_input_array(INPUT_POST)['sort2'] === 'Rosnąco' && !isset(filter_input_array(INPUT_POST)['sort']) && !isset(filter_input_array(INPUT_POST)['search'])) {
    $content .= $sortWorstBattery;
}
if (isset(filter_input_array(INPUT_POST)['sort3']) && filter_input_array(INPUT_POST)['sort3'] === 'Malejąco' && !isset(filter_input_array(INPUT_POST)['sort']) && !isset(filter_input_array(INPUT_POST)['search'])) {
    $content .= $sortBestFunction;
}
if (isset(filter_input_array(INPUT_POST)['sort3']) && filter_input_array(INPUT_POST)['sort3'] === 'Rosnąco' && !isset(filter_input_array(INPUT_POST)['sort']) && !isset(filter_input_array(INPUT_POST)['search'])) {
    $content .= $sortWorstFunction;
}
if (isset(filter_input_array(INPUT_POST)['sort4']) && filter_input_array(INPUT_POST)['sort4'] === 'Malejąco' && !isset(filter_input_array(INPUT_POST)['sort']) && !isset(filter_input_array(INPUT_POST)['search'])) {
    $content .= $sortBestLook;
}
if (isset(filter_input_array(INPUT_POST)['sort4']) && filter_input_array(INPUT_POST)['sort4'] === 'Rosnąco' && !isset(filter_input_array(INPUT_POST)['sort']) && !isset(filter_input_array(INPUT_POST)['search'])) {
    $content .= $sortWorstLook;
}

$contentAdmin = '                       
                        <h2>Telewizory - Manta</h2><br>                       
                        <div class="textLeft" >   
                            <form method="post">
                                <select name="sort1" class="sortSelectTvs" onchange="this.form.submit()">
                                    <option selected disabled hidden>Sortuj po obrazie:</option>
                                    <option value="Malejąco">Od najlepszej</option>
                                    <option value="Rosnąco">Od najgorszej</option>                                                    
                                </select>
                            </form> 
                        </div>
                        <div class="textLeft" >   
                            <form method="post">
                                <select name="sort2" class="sortSelectTvs" onchange="this.form.submit()">
                                    <option selected disabled hidden>Sortuj po dźwięku:</option>
                                    <option value="Malejąco">Od najlepszej</option>
                                    <option value="Rosnąco">Od najgorszej</option>                                                    
                                </select>
                            </form> 
                        </div>
                        <div class="textLeft" >   
                            <form method="post">
                                <select name="sort3" class="sortSelectTvs" onchange="this.form.submit()">
                                    <option selected disabled hidden>Sortuj po funkcjonalności:</option>
                                    <option value="Malejąco">Od najlepszej</option>
                                    <option value="Rosnąco">Od najgorszej</option>                                                    
                                </select>
                            </form> 
                        </div>
                        <div class="textLeft" >   
                            <form method="post">
                                <select name="sort4" class="sortSelectTvs" onchange="this.form.submit()">
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
                    </div>
                    <div style="background: #c6c7c7;width:300px;height: 40px;border-radius: 40px;padding: 10px 10px 10px 10px;margin-left:20px;">
                            <form method="post">
                                <input type="text" name="search" style="background: #c6c7c7;width:200px;height:20px;border: none;outline: none;float: left;line-height: 40px;" placeholder="Wyszukaj model..."/>
                                <button value="search" onsubmit="this.form.submit()" style="border:none;color: #e84118;float: right;width: 40px;height: 40px;border-radius: 50%;background: #2f3640;display: flex;justify-content: center;align-items: center;color: white;cursor: pointer;">
                                <i class="icon-search"></i>
                                </button>
                            </form> 
                        </div>';
if (isset(filter_input_array(INPUT_POST)['search']) && !isset(filter_input_array(INPUT_POST)['sort']) && $status == 2 && !isset(filter_input_array(INPUT_POST)['sort2']) && !isset(filter_input_array(INPUT_POST)['sort1']) && !isset(filter_input_array(INPUT_POST)['sort3']) && !isset(filter_input_array(INPUT_POST)['sort4'])) {
    $search = filter_input_array(INPUT_POST)['search'];
    $sortSearchAdmin = $db->selectAdmin("SELECT r.`id-reviews`, name, category, brand, nick, review , star, star2, star3, star4, image FROM `parameters-items` p JOIN reviews r ON `r`.`id-reviews` = p.`id-reviews` JOIN users u ON `u`.`id` = `r`.`id-users` JOIN items i ON `i`.`id-items` = `r`.`id-items` JOIN manufacturers m ON `m`.`id-manufacturers` = `i`.`id-manufacturers` JOIN categories c ON `c`.`id-categories` = `m`.`id-categories` WHERE category= 'Telewizory' AND brand = 'Manta' AND name LIKE '%$search%'", array("id-reviews", "nick", "name", "category", "brand", "review", "star", "star2", "star3", "star4", "image"));
    $contentAdmin .= $sortSearchAdmin;
}
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