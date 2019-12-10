<?php

$title = "Komputery i laptopy HP";

include_once 'class/database.php';
$db = new Database("localhost", "root", "", "opinius");

$reviews = $db->displayReviews("SELECT r.`id-reviews`, name, category, brand, nick, review , star, star2, star3, star4, image FROM `parameters-items` p JOIN reviews r ON `r`.`id-reviews` = p.`id-reviews` JOIN users u ON `u`.`id` = `r`.`id-users` JOIN items i ON `i`.`id-items` = `r`.`id-items` JOIN manufacturers m ON `m`.`id-manufacturers` = `i`.`id-manufacturers` JOIN categories c ON `c`.`id-categories` = `m`.`id-categories` WHERE category= 'Komputery i laptopy' AND brand = 'HP' ORDER BY r.`id-reviews`  DESC", array("id-reviews", "nick", "name", "category", "brand", "review", "star", "star2", "star3", "star4", "image"));
$reviewsAdmin = $db->selectAdmin("SELECT r.`id-reviews`, name, category, brand, nick, review , star, star2, star3, star4, image FROM `parameters-items` p JOIN reviews r ON `r`.`id-reviews` = p.`id-reviews` JOIN users u ON `u`.`id` = `r`.`id-users` JOIN items i ON `i`.`id-items` = `r`.`id-items` JOIN manufacturers m ON `m`.`id-manufacturers` = `i`.`id-manufacturers` JOIN categories c ON `c`.`id-categories` = `m`.`id-categories` WHERE category= 'Komputery i laptopy' AND brand = 'HP' ORDER BY r.`id-reviews`  DESC", array("id-reviews", "nick", "name", "category", "brand", "review", "star", "star2", "star3", "star4", "image"));
$status = $db->select("SELECT status from users u JOIN logged_in_users l ON u.id = l.userId", array("status")); // dodane aby funkcja unset działała tylko na odpowiednim statusie użytkownika       
$sortBest = $db->displayReviews("SELECT r.`id-reviews`, name, category, brand, nick, review , star, star2, star3, star4, image FROM `parameters-items` p JOIN reviews r ON `r`.`id-reviews` = p.`id-reviews` JOIN users u ON `u`.`id` = `r`.`id-users` JOIN items i ON `i`.`id-items` = `r`.`id-items` JOIN manufacturers m ON `m`.`id-manufacturers` = `i`.`id-manufacturers` JOIN categories c ON `c`.`id-categories` = `m`.`id-categories` WHERE category= 'Komputery i laptopy' AND brand = 'HP' ORDER BY (star+star2+star3+star4)/4 DESC", array("id-reviews", "nick", "name", "category", "brand", "review", "star", "star2", "star3", "star4", "image"));
$sortWorst = $db->displayReviews("SELECT r.`id-reviews`, name, category, brand, nick, review , star, star2, star3, star4, image FROM `parameters-items` p JOIN reviews r ON `r`.`id-reviews` = p.`id-reviews` JOIN users u ON `u`.`id` = `r`.`id-users` JOIN items i ON `i`.`id-items` = `r`.`id-items` JOIN manufacturers m ON `m`.`id-manufacturers` = `i`.`id-manufacturers` JOIN categories c ON `c`.`id-categories` = `m`.`id-categories` WHERE category= 'Komputery i laptopy' AND brand = 'HP' ORDER BY (star+star2+star3+star4)/4", array("id-reviews", "nick", "name", "category", "brand", "review", "star", "star2", "star3", "star4", "image"));
$sortBestAdmin = $db->selectAdmin("SELECT r.`id-reviews`, name, category, brand, nick, review , star, star2, star3, star4, image FROM `parameters-items` p JOIN reviews r ON `r`.`id-reviews` = p.`id-reviews` JOIN users u ON `u`.`id` = `r`.`id-users` JOIN items i ON `i`.`id-items` = `r`.`id-items` JOIN manufacturers m ON `m`.`id-manufacturers` = `i`.`id-manufacturers` JOIN categories c ON `c`.`id-categories` = `m`.`id-categories` WHERE category= 'Komputery i laptopy' AND brand = 'HP' ORDER BY (star+star2+star3+star4)/4 DESC", array("id-reviews", "nick", "name", "category", "brand", "review", "star", "star2", "star3", "star4", "image"));
$sortWorstAdmin = $db->selectAdmin("SELECT r.`id-reviews`, name, category, brand, nick, review , star, star2, star3, star4, image FROM `parameters-items` p JOIN reviews r ON `r`.`id-reviews` = p.`id-reviews` JOIN users u ON `u`.`id` = `r`.`id-users` JOIN items i ON `i`.`id-items` = `r`.`id-items` JOIN manufacturers m ON `m`.`id-manufacturers` = `i`.`id-manufacturers` JOIN categories c ON `c`.`id-categories` = `m`.`id-categories` WHERE category= 'Komputery i laptopy' AND brand = 'HP' ORDER BY (star+star2+star3+star4)/4", array("id-reviews", "nick", "name", "category", "brand", "review", "star", "star2", "star3", "star4", "image"));
$sortBestCamera = $db->displayReviews("SELECT r.`id-reviews`, name, category, brand, nick, review , star, star2, star3, star4, image FROM `parameters-items` p JOIN reviews r ON `r`.`id-reviews` = p.`id-reviews` JOIN users u ON `u`.`id` = `r`.`id-users` JOIN items i ON `i`.`id-items` = `r`.`id-items` JOIN manufacturers m ON `m`.`id-manufacturers` = `i`.`id-manufacturers` JOIN categories c ON `c`.`id-categories` = `m`.`id-categories` WHERE category= 'Komputery i laptopy' AND brand = 'HP' ORDER BY star DESC", array("id-reviews", "nick", "name", "category", "brand", "review", "star", "star2", "star3", "star4", "image"));
$sortWorstCamera = $db->displayReviews("SELECT r.`id-reviews`, name, category, brand, nick, review , star, star2, star3, star4, image FROM `parameters-items` p JOIN reviews r ON `r`.`id-reviews` = p.`id-reviews` JOIN users u ON `u`.`id` = `r`.`id-users` JOIN items i ON `i`.`id-items` = `r`.`id-items` JOIN manufacturers m ON `m`.`id-manufacturers` = `i`.`id-manufacturers` JOIN categories c ON `c`.`id-categories` = `m`.`id-categories` WHERE category= 'Komputery i laptopy' AND brand = 'HP' ORDER BY star", array("id-reviews", "nick", "name", "category", "brand", "review", "star", "star2", "star3", "star4", "image"));
$sortBestBattery = $db->displayReviews("SELECT r.`id-reviews`, name, category, brand, nick, review , star, star2, star3, star4, image FROM `parameters-items` p JOIN reviews r ON `r`.`id-reviews` = p.`id-reviews` JOIN users u ON `u`.`id` = `r`.`id-users` JOIN items i ON `i`.`id-items` = `r`.`id-items` JOIN manufacturers m ON `m`.`id-manufacturers` = `i`.`id-manufacturers` JOIN categories c ON `c`.`id-categories` = `m`.`id-categories` WHERE category= 'Komputery i laptopy' AND brand = 'HP' ORDER BY star2 DESC", array("id-reviews", "nick", "name", "category", "brand", "review", "star", "star2", "star3", "star4", "image"));
$sortWorstBattery = $db->displayReviews("SELECT r.`id-reviews`, name, category, brand, nick, review , star, star2, star3, star4, image FROM `parameters-items` p JOIN reviews r ON `r`.`id-reviews` = p.`id-reviews` JOIN users u ON `u`.`id` = `r`.`id-users` JOIN items i ON `i`.`id-items` = `r`.`id-items` JOIN manufacturers m ON `m`.`id-manufacturers` = `i`.`id-manufacturers` JOIN categories c ON `c`.`id-categories` = `m`.`id-categories` WHERE category= 'Komputery i laptopy' AND brand = 'HP' ORDER BY star2", array("id-reviews", "nick", "name", "category", "brand", "review", "star", "star2", "star3", "star4", "image"));
$sortBestFunction = $db->displayReviews("SELECT r.`id-reviews`, name, category, brand, nick, review , star, star2, star3, star4, image FROM `parameters-items` p JOIN reviews r ON `r`.`id-reviews` = p.`id-reviews` JOIN users u ON `u`.`id` = `r`.`id-users` JOIN items i ON `i`.`id-items` = `r`.`id-items` JOIN manufacturers m ON `m`.`id-manufacturers` = `i`.`id-manufacturers` JOIN categories c ON `c`.`id-categories` = `m`.`id-categories` WHERE category= 'Komputery i laptopy' AND brand = 'HP' ORDER BY star3 DESC", array("id-reviews", "nick", "name", "category", "brand", "review", "star", "star2", "star3", "star4", "image"));
$sortWorstFunction = $db->displayReviews("SELECT r.`id-reviews`, name, category, brand, nick, review , star, star2, star3, star4, image FROM `parameters-items` p JOIN reviews r ON `r`.`id-reviews` = p.`id-reviews` JOIN users u ON `u`.`id` = `r`.`id-users` JOIN items i ON `i`.`id-items` = `r`.`id-items` JOIN manufacturers m ON `m`.`id-manufacturers` = `i`.`id-manufacturers` JOIN categories c ON `c`.`id-categories` = `m`.`id-categories` WHERE category= 'Komputery i laptopy' AND brand = 'HP' ORDER BY star3", array("id-reviews", "nick", "name", "category", "brand", "review", "star", "star2", "star3", "star4", "image"));
$sortBestLook = $db->displayReviews("SELECT r.`id-reviews`, name, category, brand, nick, review , star, star2, star3, star4, image FROM `parameters-items` p JOIN reviews r ON `r`.`id-reviews` = p.`id-reviews` JOIN users u ON `u`.`id` = `r`.`id-users` JOIN items i ON `i`.`id-items` = `r`.`id-items` JOIN manufacturers m ON `m`.`id-manufacturers` = `i`.`id-manufacturers` JOIN categories c ON `c`.`id-categories` = `m`.`id-categories` WHERE category= 'Komputery i laptopy' AND brand = 'HP' ORDER BY star4 DESC", array("id-reviews", "nick", "name", "category", "brand", "review", "star", "star2", "star3", "star4", "image"));
$sortWorstLook = $db->displayReviews("SELECT r.`id-reviews`, name, category, brand, nick, review , star, star2, star3, star4, image FROM `parameters-items` p JOIN reviews r ON `r`.`id-reviews` = p.`id-reviews` JOIN users u ON `u`.`id` = `r`.`id-users` JOIN items i ON `i`.`id-items` = `r`.`id-items` JOIN manufacturers m ON `m`.`id-manufacturers` = `i`.`id-manufacturers` JOIN categories c ON `c`.`id-categories` = `m`.`id-categories` WHERE category= 'Komputery i laptopy' AND brand = 'HP' ORDER BY star4", array("id-reviews", "nick", "name", "category", "brand", "review", "star", "star2", "star3", "star4", "image"));
$sortBestCameraAdmin = $db->selectAdmin("SELECT r.`id-reviews`, name, category, brand, nick, review , star, star2, star3, star4, image FROM `parameters-items` p JOIN reviews r ON `r`.`id-reviews` = p.`id-reviews` JOIN users u ON `u`.`id` = `r`.`id-users` JOIN items i ON `i`.`id-items` = `r`.`id-items` JOIN manufacturers m ON `m`.`id-manufacturers` = `i`.`id-manufacturers` JOIN categories c ON `c`.`id-categories` = `m`.`id-categories` WHERE category= 'Komputery i laptopy' AND brand = 'HP' ORDER BY star DESC", array("id-reviews", "nick", "name", "category", "brand", "review", "star", "star2", "star3", "star4", "image"));
$sortWorstCameraAdmin = $db->selectAdmin("SELECT r.`id-reviews`, name, category, brand, nick, review , star, star2, star3, star4, image FROM `parameters-items` p JOIN reviews r ON `r`.`id-reviews` = p.`id-reviews` JOIN users u ON `u`.`id` = `r`.`id-users` JOIN items i ON `i`.`id-items` = `r`.`id-items` JOIN manufacturers m ON `m`.`id-manufacturers` = `i`.`id-manufacturers` JOIN categories c ON `c`.`id-categories` = `m`.`id-categories` WHERE category= 'Komputery i laptopy' AND brand = 'HP' ORDER BY star", array("id-reviews", "nick", "name", "category", "brand", "review", "star", "star2", "star3", "star4", "image"));
$sortBestBatteryAdmin = $db->selectAdmin("SELECT r.`id-reviews`, name, category, brand, nick, review , star, star2, star3, star4, image FROM `parameters-items` p JOIN reviews r ON `r`.`id-reviews` = p.`id-reviews` JOIN users u ON `u`.`id` = `r`.`id-users` JOIN items i ON `i`.`id-items` = `r`.`id-items` JOIN manufacturers m ON `m`.`id-manufacturers` = `i`.`id-manufacturers` JOIN categories c ON `c`.`id-categories` = `m`.`id-categories` WHERE category= 'Komputery i laptopy' AND brand = 'HP' ORDER BY star2 DESC", array("id-reviews", "nick", "name", "category", "brand", "review", "star", "star2", "star3", "star4", "image"));
$sortWorstBatteryAdmin = $db->selectAdmin("SELECT r.`id-reviews`, name, category, brand, nick, review , star, star2, star3, star4, image FROM `parameters-items` p JOIN reviews r ON `r`.`id-reviews` = p.`id-reviews` JOIN users u ON `u`.`id` = `r`.`id-users` JOIN items i ON `i`.`id-items` = `r`.`id-items` JOIN manufacturers m ON `m`.`id-manufacturers` = `i`.`id-manufacturers` JOIN categories c ON `c`.`id-categories` = `m`.`id-categories` WHERE category= 'Komputery i laptopy' AND brand = 'HP' ORDER BY star2", array("id-reviews", "nick", "name", "category", "brand", "review", "star", "star2", "star3", "star4", "image"));
$sortBestFunctionAdmin = $db->selectAdmin("SELECT r.`id-reviews`, name, category, brand, nick, review , star, star2, star3, star4, image FROM `parameters-items` p JOIN reviews r ON `r`.`id-reviews` = p.`id-reviews` JOIN users u ON `u`.`id` = `r`.`id-users` JOIN items i ON `i`.`id-items` = `r`.`id-items` JOIN manufacturers m ON `m`.`id-manufacturers` = `i`.`id-manufacturers` JOIN categories c ON `c`.`id-categories` = `m`.`id-categories` WHERE category= 'Komputery i laptopy' AND brand = 'HP' ORDER BY star3 DESC", array("id-reviews", "nick", "name", "category", "brand", "review", "star", "star2", "star3", "star4", "image"));
$sortWorstFunctionAdmin = $db->selectAdmin("SELECT r.`id-reviews`, name, category, brand, nick, review , star, star2, star3, star4, image FROM `parameters-items` p JOIN reviews r ON `r`.`id-reviews` = p.`id-reviews` JOIN users u ON `u`.`id` = `r`.`id-users` JOIN items i ON `i`.`id-items` = `r`.`id-items` JOIN manufacturers m ON `m`.`id-manufacturers` = `i`.`id-manufacturers` JOIN categories c ON `c`.`id-categories` = `m`.`id-categories` WHERE category= 'Komputery i laptopy' AND brand = 'HP' ORDER BY star3", array("id-reviews", "nick", "name", "category", "brand", "review", "star", "star2", "star3", "star4", "image"));
$sortBestLookAdmin = $db->selectAdmin("SELECT r.`id-reviews`, name, category, brand, nick, review , star, star2, star3, star4, image FROM `parameters-items` p JOIN reviews r ON `r`.`id-reviews` = p.`id-reviews` JOIN users u ON `u`.`id` = `r`.`id-users` JOIN items i ON `i`.`id-items` = `r`.`id-items` JOIN manufacturers m ON `m`.`id-manufacturers` = `i`.`id-manufacturers` JOIN categories c ON `c`.`id-categories` = `m`.`id-categories` WHERE category= 'Komputery i laptopy' AND brand = 'HP' ORDER BY star4 DESC", array("id-reviews", "nick", "name", "category", "brand", "review", "star", "star2", "star3", "star4", "image"));
$sortWorstLookAdmin = $db->selectAdmin("SELECT r.`id-reviews`, name, category, brand, nick, review , star, star2, star3, star4, image FROM `parameters-items` p JOIN reviews r ON `r`.`id-reviews` = p.`id-reviews` JOIN users u ON `u`.`id` = `r`.`id-users` JOIN items i ON `i`.`id-items` = `r`.`id-items` JOIN manufacturers m ON `m`.`id-manufacturers` = `i`.`id-manufacturers` JOIN categories c ON `c`.`id-categories` = `m`.`id-categories` WHERE category= 'Komputery i laptopy' AND brand = 'HP' ORDER BY star4", array("id-reviews", "nick", "name", "category", "brand", "review", "star", "star2", "star3", "star4", "image"));

$contentLOG = '                       
                        <h2>Komputery i laptopy - HP</h2><br>                       
                        
                        <div class="textLeft" >   
                            <form method="post">
                                <select name="sortCamera" class="sortSelectPhones" onchange="this.form.submit()">
                                    <option selected disabled hidden>Sortuj po funkcjonalności:</option>
                                    <option value="Malejąco">Od najlepszej</option>
                                    <option value="Rosnąco">Od najgorszej</option>                                                    
                                </select>
                            </form> 
                        </div>
                        <div class="textLeft" >   
                            <form method="post">
                                <select name="sortBattery" class="sortSelectPhones" onchange="this.form.submit()">
                                    <option selected disabled hidden>Sortuj po baterii:</option>
                                    <option value="Malejąco">Od najlepszej</option>
                                    <option value="Rosnąco">Od najgorszej</option>                                                    
                                </select>
                            </form> 
                        </div>
                
                        <div class="textLeft" >   
                            <form method="post">
                                <select name="sortFunction" class="sortSelectPhones" onchange="this.form.submit()">
                                    <option selected disabled hidden>Sortuj po zdjęciach:</option>
                                    <option value="Malejąco">Od najlepszej</option>
                                    <option value="Rosnąco">Od najgorszej</option>                                                    
                                </select>
                            </form> 
                        </div>
                        <div class="textLeft" >   
                            <form method="post">
                                <select name="sortLook" class="sortSelectPhones" onchange="this.form.submit()">
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
                        </div>
                        <div style="background: #c6c7c7;width:300px;height: 40px;border-radius: 40px;padding: 10px 10px 10px 10px;">
                            <form method="post">
                                <input type="text" name="search" style="background: #c6c7c7;width:200px;height:20px;border: none;outline: none;float: left;line-height: 40px;" placeholder="Wyszukaj model..."/>
                                <button value="search" onsubmit="this.form.submit()" style="border:none;color: #e84118;float: right;width: 40px;height: 40px;border-radius: 50%;background: #2f3640;display: flex;justify-content: center;align-items: center;color: white;cursor: pointer;">
                                <i class="icon-search"></i>
                                </button>
                            </form> 
                        </div>';

if (isset($_POST['search']) && !isset($_POST['sort']) && $status == 1 && !isset($_POST['sortBattery']) && !isset($_POST['sortCamera']) && !isset($_POST['sortFunction']) && !isset($_POST['sortLook'])) {
    $search = $_POST['search'];
    $sortSearch = $db->displayReviews("SELECT r.`id-reviews`, name, category, brand, nick, review , star, star2, star3, star4, image FROM `parameters-items` p JOIN reviews r ON `r`.`id-reviews` = p.`id-reviews` JOIN users u ON `u`.`id` = `r`.`id-users` JOIN items i ON `i`.`id-items` = `r`.`id-items` JOIN manufacturers m ON `m`.`id-manufacturers` = `i`.`id-manufacturers` JOIN categories c ON `c`.`id-categories` = `m`.`id-categories` WHERE category= 'Komputery i laptopy' AND brand = 'HP' AND name LIKE '%$search%'", array("id-reviews", "nick", "name", "category", "brand", "review", "star", "star2", "star3", "star4", "image"));
    $contentLOG .= $sortSearch;
}
if (isset($_POST['sort']) && $_POST['sort'] === 'Malejąco' && $status == 1 && !isset($_POST['sortBattery']) && !isset($_POST['sortCamera']) && !isset($_POST['sortFunction']) && !isset($_POST['sortLook']) && !isset($_POST['search'])) { // sortowanie opinii
    $contentLOG .= $sortBest;
}
if (isset($_POST['sort']) && $_POST['sort'] === 'Rosnąco' && $status == 1 && !isset($_POST['sortBattery']) && !isset($_POST['sortCamera']) && !isset($_POST['sortFunction']) && !isset($_POST['sortLook']) && !isset($_POST['search'])) {
    $contentLOG .= $sortWorst;
}
if (isset($_POST['sort']) && $_POST['sort'] === 'Najnowsze' && $status == 1 && !isset($_POST['sortBattery']) && !isset($_POST['sortCamera']) && !isset($_POST['sortFunction']) && !isset($_POST['sortLook']) && !isset($_POST['search'])) {
    $contentLOG .= $reviews;
}
if (!isset($_POST['sort']) && $status == 1 && !isset($_POST['sortBattery']) && !isset($_POST['sortCamera']) && !isset($_POST['sortFunction']) && !isset($_POST['sortLook']) && !isset($_POST['search'])) {
    $contentLOG .= $reviews;
}
if (isset($_POST['sortCamera']) && $_POST['sortCamera'] === 'Malejąco' && $status == 1 && !isset($_POST['sort']) && !isset($_POST['search'])) {
    $contentLOG .= $sortBestCamera;
}
if (isset($_POST['sortCamera']) && $_POST['sortCamera'] === 'Rosnąco' && $status == 1 && !isset($_POST['sort']) && !isset($_POST['search'])) {
    $contentLOG .= $sortWorstCamera;
}
if (isset($_POST['sortBattery']) && $_POST['sortBattery'] === 'Malejąco' && $status == 1 && !isset($_POST['sort']) && !isset($_POST['search'])) {
    $contentLOG .= $sortBestBattery;
}
if (isset($_POST['sortBattery']) && $_POST['sortBattery'] === 'Rosnąco' && $status == 1 && !isset($_POST['sort']) && !isset($_POST['search'])) {
    $contentLOG .= $sortWorstBattery;
}
if (isset($_POST['sortFunction']) && $_POST['sortFunction'] === 'Malejąco' && $status == 1 && !isset($_POST['sort']) && !isset($_POST['search'])) {
    $contentLOG .= $sortBestFunction;
}
if (isset($_POST['sortFunction']) && $_POST['sortFunction'] === 'Rosnąco' && $status == 1 && !isset($_POST['sort']) && !isset($_POST['search'])) {
    $contentLOG .= $sortWorstFunction;
}
if (isset($_POST['sortLook']) && $_POST['sortLook'] === 'Malejąco' && $status == 1 && !isset($_POST['sort']) && !isset($_POST['search'])) {
    $contentLOG .= $sortBestLook;
}
if (isset($_POST['sortLook']) && $_POST['sortLook'] === 'Rosnąco' && $status == 1 && !isset($_POST['sort']) && !isset($_POST['search'])) {
    $contentLOG .= $sortWorstLook;
}

$content = '
                        <h2>Komputery i laptopy - HP</h2><br>                     
                        
                    <div class="textLeft" >   
                            <form method="post">
                                <select name="sortCamera" class="sortSelectPhones" onchange="this.form.submit()">
                                    <option selected disabled hidden>Sortuj po funkcjonalności:</option>
                                    <option value="Malejąco">Od najlepszej</option>
                                    <option value="Rosnąco">Od najgorszej</option>                                                    
                                </select>
                            </form> 
                        </div>
                        <div class="textLeft" >   
                            <form method="post">
                                <select name="sortBattery" class="sortSelectPhones" onchange="this.form.submit()">
                                    <option selected disabled hidden>Sortuj po baterii:</option>
                                    <option value="Malejąco">Od najlepszej</option>
                                    <option value="Rosnąco">Od najgorszej</option>                                                    
                                </select>
                            </form> 
                        </div>
                     
                        <div class="textLeft" >   
                            <form method="post">
                                <select name="sortFunction" class="sortSelectPhones" onchange="this.form.submit()">
                                    <option selected disabled hidden>Sortuj po zdjęciach:</option>
                                    <option value="Malejąco">Od najlepszej</option>
                                    <option value="Rosnąco">Od najgorszej</option>                                                    
                                </select>
                            </form> 
                        </div>
                        <div class="textLeft" >   
                            <form method="post">
                                <select name="sortLook" class="sortSelectPhones" onchange="this.form.submit()">
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
                    </div>
                    <div style="background: #c6c7c7;width:300px;height: 40px;border-radius: 40px;padding: 10px 10px 10px 10px;">
                            <form method="post">
                                <input type="text" name="search" style="background: #c6c7c7;width:200px;height:20px;border: none;outline: none;float: left;line-height: 40px;" placeholder="Wyszukaj model..."/>
                                <button value="search" onsubmit="this.form.submit()" style="border:none;color: #e84118;float: right;width: 40px;height: 40px;border-radius: 50%;background: #2f3640;display: flex;justify-content: center;align-items: center;color: white;cursor: pointer;">
                                <i class="icon-search"></i>
                                </button>
                            </form> 
                        </div>';
if (isset($_POST['search']) && !isset($_POST['sort']) && $status != 1 && $status != 2 && !isset($_POST['sortBattery']) && !isset($_POST['sortCamera']) && !isset($_POST['sortFunction']) && !isset($_POST['sortLook'])) {
    $search = $_POST['search'];
    $sortSearch = $db->displayReviews("SELECT r.`id-reviews`, name, category, brand, nick, review , star, star2, star3, star4, image FROM `parameters-items` p JOIN reviews r ON `r`.`id-reviews` = p.`id-reviews` JOIN users u ON `u`.`id` = `r`.`id-users` JOIN items i ON `i`.`id-items` = `r`.`id-items` JOIN manufacturers m ON `m`.`id-manufacturers` = `i`.`id-manufacturers` JOIN categories c ON `c`.`id-categories` = `m`.`id-categories` WHERE category= 'Komputery i laptopy' AND brand = 'HP' AND name LIKE '%$search%'", array("id-reviews", "nick", "name", "category", "brand", "review", "star", "star2", "star3", "star4", "image"));
    $content .= $sortSearch;
}
if (isset($_POST['sort']) && $_POST['sort'] === 'Malejąco' && !isset($_POST['sortBattery']) && !isset($_POST['sortCamera']) && !isset($_POST['sortFunction']) && !isset($_POST['sortLook']) && !isset($_POST['search'])) { // sortowanie opinii
    $content .= $sortBest;
}
if (isset($_POST['sort']) && $_POST['sort'] === 'Rosnąco' && !isset($_POST['sortBattery']) && !isset($_POST['sortCamera']) && !isset($_POST['sortFunction']) && !isset($_POST['sortLook']) && !isset($_POST['search'])) {
    $content .= $sortWorst;
}
if (isset($_POST['sort']) && $_POST['sort'] === 'Najnowsze' && !isset($_POST['sortBattery']) && !isset($_POST['sortCamera']) && !isset($_POST['sortFunction']) && !isset($_POST['sortLook']) && !isset($_POST['search'])) {
    $content .= $reviews;
}
if (!isset($_POST['sort']) && !isset($_POST['sortBattery']) && !isset($_POST['sortCamera']) && !isset($_POST['sortFunction']) && !isset($_POST['sortLook']) && !isset($_POST['search'])) {
    $content .= $reviews;
}
if (isset($_POST['sortCamera']) && $_POST['sortCamera'] === 'Malejąco' && !isset($_POST['sort']) && !isset($_POST['search'])) {
    $content .= $sortBestCamera;
}
if (isset($_POST['sortCamera']) && $_POST['sortCamera'] === 'Rosnąco' && !isset($_POST['sort']) && !isset($_POST['search'])) {
    $content .= $sortWorstCamera;
}
if (isset($_POST['sortBattery']) && $_POST['sortBattery'] === 'Malejąco' && !isset($_POST['sort']) && !isset($_POST['search'])) {
    $content .= $sortBestBattery;
}
if (isset($_POST['sortBattery']) && $_POST['sortBattery'] === 'Rosnąco' && !isset($_POST['sort']) && !isset($_POST['search'])) {
    $content .= $sortWorstBattery;
}
if (isset($_POST['sortFunction']) && $_POST['sortFunction'] === 'Malejąco' && !isset($_POST['sort']) && !isset($_POST['search'])) {
    $content .= $sortBestFunction;
}
if (isset($_POST['sortFunction']) && $_POST['sortFunction'] === 'Rosnąco' && !isset($_POST['sort']) && !isset($_POST['search'])) {
    $content .= $sortWorstFunction;
}
if (isset($_POST['sortLook']) && $_POST['sortLook'] === 'Malejąco' && !isset($_POST['sort']) && !isset($_POST['search'])) {
    $content .= $sortBestLook;
}
if (isset($_POST['sortLook']) && $_POST['sortLook'] === 'Rosnąco' && !isset($_POST['sort']) && !isset($_POST['search'])) {
    $content .= $sortWorstLook;
}

$contentAdmin = '                       
                        <h2>Komputery i laptopy - HP</h2><br>                       
                        
                    <div class="textLeft" >   
                            <form method="post">
                                <select name="sortCamera" class="sortSelectPhones" onchange="this.form.submit()">
                                    <option selected disabled hidden>Sortuj po funkcjonalności:</option>
                                    <option value="Malejąco">Od najlepszej</option>
                                    <option value="Rosnąco">Od najgorszej</option>                                                    
                                </select>
                            </form> 
                        </div>
                        <div class="textLeft" >   
                            <form method="post">
                                <select name="sortBattery" class="sortSelectPhones" onchange="this.form.submit()">
                                    <option selected disabled hidden>Sortuj po baterii:</option>
                                    <option value="Malejąco">Od najlepszej</option>
                                    <option value="Rosnąco">Od najgorszej</option>                                                    
                                </select>
                            </form> 
                        </div>
                   
                        <div class="textLeft" >   
                            <form method="post">
                                <select name="sortFunction" class="sortSelectPhones" onchange="this.form.submit()">
                                    <option selected disabled hidden>Sortuj po zdjęciach:</option>
                                    <option value="Malejąco">Od najlepszej</option>
                                    <option value="Rosnąco">Od najgorszej</option>                                                    
                                </select>
                            </form> 
                        </div>
                        <div class="textLeft" >   
                            <form method="post">
                                <select name="sortLook" class="sortSelectPhones" onchange="this.form.submit()">
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
                    </div>
                    <div style="background: #c6c7c7;width:300px;height: 40px;border-radius: 40px;padding: 10px 10px 10px 10px;">
                            <form method="post">
                                <input type="text" name="search" style="background: #c6c7c7;width:200px;height:20px;border: none;outline: none;float: left;line-height: 40px;" placeholder="Wyszukaj model..."/>
                                <button value="search" onsubmit="this.form.submit()" style="border:none;color: #e84118;float: right;width: 40px;height: 40px;border-radius: 50%;background: #2f3640;display: flex;justify-content: center;align-items: center;color: white;cursor: pointer;">
                                <i class="icon-search"></i>
                                </button>
                            </form> 
                        </div>';
if (isset($_POST['search']) && !isset($_POST['sort']) && $status == 2 && !isset($_POST['sortBattery']) && !isset($_POST['sortCamera']) && !isset($_POST['sortFunction']) && !isset($_POST['sortLook'])) {
    $search = $_POST['search'];
    $sortSearchAdmin = $db->selectAdmin("SELECT r.`id-reviews`, name, category, brand, nick, review , star, star2, star3, star4, image FROM `parameters-items` p JOIN reviews r ON `r`.`id-reviews` = p.`id-reviews` JOIN users u ON `u`.`id` = `r`.`id-users` JOIN items i ON `i`.`id-items` = `r`.`id-items` JOIN manufacturers m ON `m`.`id-manufacturers` = `i`.`id-manufacturers` JOIN categories c ON `c`.`id-categories` = `m`.`id-categories` WHERE category= 'Komputery i laptopy' AND brand = 'HP' AND name LIKE '%$search%'", array("id-reviews", "nick", "name", "category", "brand", "review", "star", "star2", "star3", "star4", "image"));
    $contentAdmin .= $sortSearchAdmin;
}
if (isset($_POST['sort']) && $_POST['sort'] === 'Malejąco' && $status == 2 && !isset($_POST['sortBattery']) && !isset($_POST['sortCamera']) && !isset($_POST['sortFunction']) && !isset($_POST['sortLook']) && !isset($_POST['search'])) { // sortowanie opinii
    $contentAdmin .= $sortBestAdmin;
}
if (isset($_POST['sort']) && $_POST['sort'] === 'Rosnąco' && $status == 2 && !isset($_POST['sortBattery']) && !isset($_POST['sortCamera']) && !isset($_POST['sortFunction']) && !isset($_POST['sortLook']) && !isset($_POST['search'])) {
    $contentAdmin .= $sortWorstAdmin;
}
if (isset($_POST['sort']) && $_POST['sort'] === 'Najnowsze' && $status == 2 && !isset($_POST['sortBattery']) && !isset($_POST['sortCamera']) && !isset($_POST['sortFunction']) && !isset($_POST['sortLook']) && !isset($_POST['search'])) {
    $contentAdmin .= $reviewsAdmin;
}
if (!isset($_POST['sort']) && $status == 2 && !isset($_POST['sortBattery']) && !isset($_POST['sortCamera']) && !isset($_POST['sortFunction']) && !isset($_POST['sortLook']) && !isset($_POST['search'])) {
    $contentAdmin .= $reviewsAdmin;
}
if (isset($_POST['sortCamera']) && $_POST['sortCamera'] === 'Malejąco' && $status == 2 && !isset($_POST['sort']) && !isset($_POST['search'])) {
    $contentAdmin .= $sortBestCameraAdmin;
}
if (isset($_POST['sortCamera']) && $_POST['sortCamera'] === 'Rosnąco' && $status == 2 && !isset($_POST['sort']) && !isset($_POST['search'])) {
    $contentAdmin .= $sortWorstCameraAdmin;
}
if (isset($_POST['sortBattery']) && $_POST['sortBattery'] === 'Malejąco' && $status == 2 && !isset($_POST['sort']) && !isset($_POST['search'])) {
    $contentAdmin .= $sortBestBatteryAdmin;
}
if (isset($_POST['sortBattery']) && $_POST['sortBattery'] === 'Rosnąco' && $status == 2 && !isset($_POST['sort']) && !isset($_POST['search'])) {
    $contentAdmin .= $sortWorstBatteryAdmin;
}
if (isset($_POST['sortFunction']) && $_POST['sortFunction'] === 'Malejąco' && $status == 2 && !isset($_POST['sort']) && !isset($_POST['search'])) {
    $contentAdmin .= $sortBestFunctionAdmin;
}
if (isset($_POST['sortFunction']) && $_POST['sortFunction'] === 'Rosnąco' && $status == 2 && !isset($_POST['sort']) && !isset($_POST['search'])) {
    $contentAdmin .= $sortWorstFunctionAdmin;
}
if (isset($_POST['sortLook']) && $_POST['sortLook'] === 'Malejąco' && $status == 2 && !isset($_POST['sort']) && !isset($_POST['search'])) {
    $contentAdmin .= $sortBestLookAdmin;
}
if (isset($_POST['sortLook']) && $_POST['sortLook'] === 'Rosnąco' && $status == 2 && !isset($_POST['sort']) && !isset($_POST['search'])) {
    $contentAdmin .= $sortWorstLookAdmin;
}